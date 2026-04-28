<?php
session_start();
require_once('../includes/connect.php');

// 1. เช็คสิทธิ์ (Teacher เท่านั้น)
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'teacher') {
    header("Location: ../index.html");
    exit();
}

// 2. รับ ID คำขอ
if (!isset($_GET['id'])) {
    header("Location: teacher_dashboard.php");
    exit();
}
$req_id = $_GET['id'];

// 3. ส่วนประมวลผลการบันทึก (เมื่อกดปุ่ม Submit ในหน้าตัวเอง)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_update'])) {
    $status_code = $_POST['status_code'];
    $advisor_note = $_POST['advisor_note'];

    $stmt = $conn->prepare("UPDATE internship_request SET status_code = ?, advisor_note = ? WHERE request_id = ?");
    $stmt->bind_param("isi", $status_code, $advisor_note, $req_id);

    if ($stmt->execute()) {
        echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว'); window.location.href='teacher_dashboard.php';</script>";
        exit();
    } else {
        $error_msg = "เกิดข้อผิดพลาด: " . $conn->error;
    }
}

// 4. ดึงข้อมูลมาโชว์ในฟอร์ม
$sql = "SELECT r.*, s.firstName, s.lastName, s.profile_img, st.status_name 
        FROM internship_request r
        JOIN students s ON r.student_id = s.student_id
        LEFT JOIN status_list st ON r.status_code = st.status_code
        WHERE r.request_id = '$req_id'";
$result = $conn->query($sql);
$data = $result->fetch_assoc();

if (!$data) { echo "ไม่พบข้อมูล"; exit(); }
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการคำขอ - <?= $data['firstName']; ?></title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/teacher_manage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <?php include('../includes/navbar.php'); ?>

    <div class="manage-container">
        <div class="manage-card">
            <div class="manage-header">
                <h2><i class="fa-solid fa-file-signature"></i>คำขอฝึกงาน</h2>
                <a href="teacher_dashboard.php" class="btn-back">ย้อนกลับ</a>
            </div>

            <div class="manage-body">
                <div class="info-section">
                    <div class="student-profile">
                        <img src="../assets/image/students/<?= $data['profile_img'] ?: 'default.jpg'; ?>" alt="Student">
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
                            <span class="label">ผู้ติดต่อ:</span>
                            <span class="value"><?= $data['contact_person']; ?></span>
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
                            <span class="status-text"><?= $data['status_name']; ?></span>
                        </div>
                    </div>
                </div>

                <div class="action-section">
                    <form action="" method="POST">
                        <input type="hidden" name="request_id" value="<?= $req_id; ?>">

                        <div class="form-group">
                            <label><i class="fa-solid fa-tasks"></i> ปรับปรุงสถานะคำขอ</label>
                            <select name="status_code" class="status-select">
                                <option value="1" <?= $data['status_code'] == 1 ? 'selected' : ''; ?>>รับเรื่องเข้าระบบ</option>   
                                <option value="2" <?= $data['status_code'] == 2 ? 'selected' : ''; ?>>อนุมัติ</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><i class="fa-solid fa-comment-dots"></i> บันทึกนิเทศ</label>
                            <textarea name="advisor_note" rows="5" placeholder="พิมพ์ข้อความแจ้งนิสิต..."><?= $data['advisor_note']; ?></textarea>
                        </div>

                        <button type="submit" name="save_update" class="btn-submit">
                            <i class="fa-solid fa-save"></i> บันทึกข้อมูล
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>