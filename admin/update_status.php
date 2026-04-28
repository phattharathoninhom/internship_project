<?php
session_start();
require_once('../includes/connect.php');

// 1. เช็คสิทธิ์ (Admin หรือ Teacher เท่านั้น)
if (!isset($_SESSION['role']) || ($_SESSION['role'] !== 'admin' && $_SESSION['role'] !== 'teacher')) {
    header("Location: ../index.php");
    exit();
}

// 2. ส่วนประมวลผลเมื่อมีการกดบันทึก (POST)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_action'])) {
    $request_id = $_POST['request_id'];
    $new_status = $_POST['new_status'];
    $note = $_POST['advisor_note'];

    $stmt = $conn->prepare("UPDATE internship_request SET status_code = ?, advisor_note = ? WHERE request_id = ?");
    $stmt->bind_param("isi", $new_status, $note, $request_id);

    if ($stmt->execute()) {
        $target = ($_SESSION['role'] === 'admin') ? 'admin_dashboard.php' : 'teacher_dashboard.php';
        echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว'); window.location.href='$target';</script>";
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

// 3. ดึงข้อมูลมาโชว์ในฟอร์ม (GET)
$req_id = isset($_GET['id']) ? $_GET['id'] : null;
if (!$req_id) {
    header("Location: admin_dashboard.php"); 
    exit();
}

$sql = "SELECT 
            r.*, 
            s.firstName, 
            s.lastName, 
            s.profile_img, 
            st.status_name,
            c.company_name,
            c.company_address,
            c.tel
        FROM internship_request r
        JOIN students s ON r.student_id = s.student_id
        LEFT JOIN status_list st ON r.status_code = st.status_code
        LEFT JOIN companies c ON r.company_id = c.company_id -- เชื่อมตารางบริษัท
        WHERE r.request_id = '$req_id'";

$result = $conn->query($sql);
$data = $result->fetch_assoc();

if (!$data) { echo "ไม่พบข้อมูลคำขอ"; exit(); }
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการสถานะ - <?= $data['firstName']; ?></title>
    
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/teacher_manage.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <?php include('../includes/navbar.php'); ?>

    <div class="manage-container">
        <div class="manage-card">
            <div class="manage-header">
                <h2><i class="fa-solid fa-pen-to-square"></i> จัดการสถานะคำขอ</h2>
                <a href="javascript:history.back()" class="btn-back">
                    <i class="fa-solid fa-arrow-left"></i> ย้อนกลับ
                </a>
            </div>

            <div class="manage-body">
                <div class="info-section">
                    <div class="student-profile">
                        <img src="../assets/image/students/<?= $data['profile_img'] ?: 'default.jpg'; ?>" alt="Profile">
                        <h3><?= $data['firstName'] . " " . $data['lastName']; ?></h3>
                        <p class="sid">รหัสนิสิต: <?= $data['student_id']; ?></p>
                    </div>
                    
                    <div class="request-details">
                        <div class="detail-item">
                            <span class="label">บริษัทที่ฝึกงาน:</span>
                            <span class="value"><?= $data['company_name']; ?></span>
                        </div>
                        <div class="detail-item">
                            <span class="label">ที่อยู่บริษัท:</span>
                            <span class="value"><?= $data['company_address']; ?></span>
                        </div>
                        <div class="detail-item">
                            <span class="label">เบอร์โทร:</span>
                            <span class="value"><?= $data['tel']; ?></span>
                        </div>
                        <div class="detail-item">
                            <span class="label">วันที่ฝึกงาน:</span>
                            <span class="value">
                                <?= date('d/m/Y', strtotime($data['start_date'])); ?> - 
                                <?= date('d/m/Y', strtotime($data['end_date'])); ?>
                            </span>
                        </div>
                        <div class="detail-item">
                            <span class="label">สถานะปัจจุบัน:</span>
                            <span class="status-text" style="color: #9e1a32; background: #fff1f3; padding: 2px 10px; border-radius: 15px;">
                                <?= $data['status_name']; ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="action-section">
                    <form action="update_status.php" method="POST">
                        <input type="hidden" name="request_id" value="<?= $req_id; ?>">
                        <input type="hidden" name="update_action" value="1">

                        <div class="form-group">
                            <label><i class="fa-solid fa-tasks"></i> สถานะ:</label>
                            <select name="new_status" class="status-select" required>
                                <option value="1" <?= $data['status_code'] == 1 ? 'selected' : ''; ?>>รับเรื่องเข้าระบบ</option>
                                <option value="2" <?= $data['status_code'] == 2 ? 'selected' : ''; ?>>อาจารย์ที่ปรึกษาอนุมัติ</option>
                                <option value="3" <?= $data['status_code'] == 3 ? 'selected' : ''; ?>>ออกใบส่งตัวเรียบร้อย</option>
                                <option value="4" <?= $data['status_code'] == 4 ? 'selected' : ''; ?>>ฝึกงานเสร็จสิ้น</option>
                                <option value="9" <?= $data['status_code'] == 9 ? 'selected' : ''; ?>>ยกเลิก</option>
                            </select>
                        </div>

                        <div class="form-group">
                        <label><i class="fa-solid fa-comment-dots"></i> บันทึกนิเทศ:</label>
                            <textarea 
                            name="advisor_note" 
                            rows="6" 
                            placeholder=" "
                            <?php if ($_SESSION['role'] === 'admin') echo 'readonly style="background: #f5f5f5; color: #888; cursor: not-allowed;"'; ?>
                            ><?= $data['advisor_note']; ?></textarea>
                        </div>

                        <button type="submit" class="btn-submit">
                            <i class="fa-solid fa-save"></i> บันทึกข้อมูล
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>