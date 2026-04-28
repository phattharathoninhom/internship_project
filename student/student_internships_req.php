<?php
session_start();
require_once('../includes/connect.php');

/**
 * 1. ACCESS CONTROL & INITIALIZATION
 */
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    header("Location: index.html");
    exit();
}

$session_student_id = $_SESSION['user_id'];
date_default_timezone_set('Asia/Bangkok');

$is_submitted = false;
$error_message = "";
$full_name = "ไม่พบข้อมูลชื่อในระบบ";

/**
 * 2. FETCH STUDENT NAME
 */
$stmt_user = $conn->prepare("SELECT firstName, lastName FROM students WHERE student_id = ?");
$stmt_user->bind_param("s", $session_student_id);
$stmt_user->execute();
$result_user = $stmt_user->get_result();
if ($user_data = $result_user->fetch_assoc()) {
    $full_name = $user_data['firstName'] . " " . $user_data['lastName'];
}
$stmt_user->close();

/**
 * 2.1 FETCH COMPANIES FOR MODAL
 */
$company_list = [];
$res_companies = $conn->query("SELECT company_id, company_name, company_address, tax_id, tel FROM companies");
while ($row = $res_companies->fetch_assoc()) {
    $company_list[] = $row;
}

/**
 * 3. FORM PROCESSING
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $c_id = $_POST['company_id']; 
    $c_name = trim($_POST['company_name']);
    $c_addr = trim($_POST['company_address']);
    $tel = trim($_POST['tel']); 
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $request_date = date("Y-m-d H:i:s");

    // กรณีพิมพ์ชื่อบริษัทเอง (ไม่มี ID) ให้เพิ่มลงตาราง companies ก่อน
    if (empty($c_id)) {
        $new_id = "C" . substr(time(), -5); 
        $stmt_new_com = $conn->prepare("INSERT INTO companies (company_id, company_name, company_address, tel) VALUES (?, ?, ?, ?)");
        $stmt_new_com->bind_param("ssss", $new_id, $c_name, $c_addr, $tel);
        $stmt_new_com->execute();
        $stmt_new_com->close();
        $c_id = $new_id;
    }

    // บันทึกคำขอ (เพิ่มคอลัมน์ tel ลงใน INSERT ถ้าใน DB มีรองรับ)
    // หาก DB ยังไม่มีคอลัมน์ tel ใน internship_request ให้รัน: ALTER TABLE internship_request ADD tel VARCHAR(20);
    $sql = "INSERT INTO internship_request 
            (student_id, company_id, tel, start_date, end_date, request_date, status_code) 
            VALUES (?, ?, ?, ?, ?, ?, 1)";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssss", 
            $session_student_id, 
            $c_id, 
            $tel,
            $start_date, 
            $end_date, 
            $request_date
        );

        if ($stmt->execute()) {
            $is_submitted = true;
        } else {
            $error_message = "เกิดข้อผิดพลาดในการบันทึก: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ยื่นคำขอฝึกงาน | SWU Internship</title>
    <link rel="stylesheet" href="/internship_project/assets/css/style.css">
    <link rel="stylesheet" href="/internship_project/assets/css/student_internships_request.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <?php include('../includes/navbar.php'); ?>

    <div class="req-content">
        <?php if ($is_submitted): ?>
            <div class="alert alert-success">
                <h3 style="margin-top:0;">ส่งคำขอสำเร็จ!</h3>
                <p>ข้อมูลการฝึกงานของคุณถูกส่งเข้าระบบเรียบร้อยแล้ว</p>
                <a href="student_dashboard.php" class="btn-submit" style="display:block; text-decoration:none;">กลับหน้า Dashboard</a>
            </div>
        <?php else: ?>
            <div class="form-card">
                <div class="form-header">
                    <h2 style="color: #9e1a32; margin: 0;">ยื่นคำขอฝึกงานใหม่</h2>
                    <p style="color: #666; margin: 5px 0 0 0;">กรอกข้อมูลสถานประกอบการที่คุณต้องการเข้าฝึกงาน</p>
                </div>

                <?php if ($error_message): ?>
                    <div class="alert alert-error"><?= $error_message; ?></div>
                <?php endif; ?>

                <form action="" method="POST">
                    <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 15px;">
                        <div class="form-group">
                            <label>รหัสนิสิต</label>
                            <input type="text" value="<?= htmlspecialchars($session_student_id); ?>" readonly style="background: #f5f5f5; color: #888;">
                        </div>
                        <div class="form-group">
                            <label>ชื่อ-นามสกุล</label>
                            <input type="text" value="<?= htmlspecialchars($full_name); ?>" readonly style="background: #f5f5f5; color: #888;">
                        </div>
                    </div>

                    <hr style="border: 0; border-top: 1px solid #eee; margin: 10px 0 25px 0;">

                    <div class="form-group">
                        <label>ชื่อสถานประกอบการ <span style="color:red;">*</span></label>
                        <div style="display: flex; gap: 10px;">
                            <input type="text" name="company_name" id="company_name" required placeholder="ชื่อบริษัท" style="flex: 1;">
                            <button type="button" id="btn_search_company" class="btn-submit" style="width: auto; margin-top: 0; padding: 0 20px;">
                                <i class="fa fa-search"></i> ค้นหา
                            </button>
                        </div>
                        <input type="hidden" name="company_id" id="company_id">
                    </div>

                    <div class="form-group">
                        <label>ที่อยู่สถานประกอบการ <span style="color:red;">*</span></label>
                        <textarea name="company_address" id="company_address" required rows="3" placeholder="บ้านเลขที่, ถนน, ซอย, แขวง, เขต, จังหวัด และรหัสไปรษณีย์"></textarea>
                    </div>

                    <div class="form-group">
                        <label>เบอร์โทร <span style="color:red;">*</span></label>
                        <input type="text" name="tel" id="tel" required placeholder="เบอร์โทร">
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                        <div class="form-group">
                            <label>วันที่เริ่มต้น <span style="color:red;">*</span></label>
                            <input type="date" name="start_date" required>
                        </div>
                        <div class="form-group">
                            <label>วันที่สิ้นสุด <span style="color:red;">*</span></label>
                            <input type="date" name="end_date" required>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit">ส่งข้อมูลคำขอ</button>
                    <div style="text-align: center;">
                        <a href="student_dashboard.php" class="btn-secondary">ยกเลิกและกลับหน้าหลัก</a>
                    </div>
                </form>
            </div>
        <?php endif; ?>
    </div>

    <div id="companyModal" class="modal" style="display:none; position: fixed; z-index: 999; left: 0; top: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5);">
        <div class="modal-content" style="background: white; margin: 5% auto; padding: 25px; border-radius: 15px; width: 80%; max-width: 800px; max-height: 85vh; overflow-y: auto;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h3 style="margin:0; color:#9e1a32;">ค้นหาสถานประกอบการ</h3>
                <span id="closeModal" style="cursor:pointer; font-size: 28px;">&times;</span>
            </div>
            <hr>
            <input type="text" id="modalSearchInput" placeholder="         พิมพ์ชื่อบริษัท ID หรือเลขผู้เสียภาษี" style="margin-bottom: 15px; padding: 12px; border-radius: 8px; border: 1px solid #ddd; width: 100%;">
            
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #f8f9fa; border-bottom: 2px solid #eee;">
                        <th style="padding: 10px; text-align: left;">ข้อมูลบริษัท</th>
                        <th style="padding: 10px; text-align: left;">ชื่อบริษัท</th>
                        <th style="padding: 10px; text-align: center;">เลือก</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($company_list as $com): ?>
                    <tr class="company-row" 
                        data-id="<?= $com['company_id']; ?>" 
                        data-name="<?= htmlspecialchars($com['company_name']); ?>"
                        data-address="<?= htmlspecialchars($com['company_address']); ?>"
                        data-tel="<?= htmlspecialchars($com['tel']); ?>" 
                        style="border-bottom: 1px solid #eee;">
                        <td style="padding: 10px;">
                            <small>ID: <?= $com['company_id']; ?></small><br>
                            <small>Tax: <?= $com['tax_id']; ?></small><br>
                            <small>Tel: <?= $com['tel']; ?></small>
                        </td>
                        <td style="padding: 10px;"><?= htmlspecialchars($com['company_name']); ?></td>
                        <td style="padding: 10px; text-align: center;">
                            <button type="button" class="select-company-btn" style="padding: 5px 15px; background: #c40000; color: white; border: none; border-radius: 5px; cursor: pointer;">เลือก</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

<script>
const modal = document.getElementById("companyModal");
const btn = document.getElementById("btn_search_company");
const span = document.getElementById("closeModal");

btn.onclick = () => modal.style.display = "block";
span.onclick = () => modal.style.display = "none";
window.onclick = (event) => { if (event.target == modal) modal.style.display = "none"; }

document.getElementById('modalSearchInput').onkeyup = function() {
    let filter = this.value.toUpperCase();
    let rows = document.querySelectorAll(".company-row");
    rows.forEach(row => {
        let text = row.innerText.toUpperCase();
        row.style.display = text.includes(filter) ? "" : "none";
    });
};

document.querySelectorAll('.select-company-btn').forEach(button => {
    button.onclick = function() {
        let row = this.closest('.company-row');
        document.getElementById('company_id').value = row.dataset.id;
        document.getElementById('company_name').value = row.dataset.name;
        document.getElementById('company_address').value = row.dataset.address;
        document.getElementById('tel').value = row.dataset.tel; 
        modal.style.display = "none";
    };
});
</script>
</body>
</html>