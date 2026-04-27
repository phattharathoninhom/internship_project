<?php
session_start();
require_once('../includes/connect.php');

// ตรวจสอบสิทธิ์ (ต้องเป็นอาจารย์เท่านั้น)
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'teacher') {
    header("Location: ../index.php");
    exit();
}

// รับ ID คำขอจาก URL
if (!isset($_GET['id'])) {
    header("Location: teacher_dashboard.php");
    exit();
}

$req_id = $_GET['id'];

// ดึงข้อมูลคำขอและข้อมูลนิสิตมาโชว์
$sql = "SELECT r.*, s.firstName, s.lastName, s.profile_img, st.status_name 
        FROM internship_request r
        JOIN students s ON r.student_id = s.student_id
        LEFT JOIN status_list st ON r.status_code = st.status_code
        WHERE r.request_id = '$req_id'";

$result = $conn->query($sql);
$data = $result->fetch_assoc();

if (!$data) {
    echo "ไม่พบข้อมูลคำขอ";
    exit();
}
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
                            <span class="label">สถานที่ฝึกงาน:</span>
                            <span class="value"><?= $data['company_name']; ?></span>
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
                    <form action="process_teacher_update.php" method="POST">
                        <input type="hidden" name="request_id" value="<?= $req_id; ?>">

                        <div class="form-group">
                            <label><i class="fa-solid fa-tasks"></i> ปรับปรุงสถานะคำขอ</label>
                            <select name="status_code" class="status-select">
                                <option value="2" <?= $data['status_code'] == 2 ? 'selected' : ''; ?>>รับเรื่องเข้าระบบ</option>   
                                <option value="4" <?= $data['status_code'] == 4 ? 'selected' : ''; ?>>อนุมัติ</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><i class="fa-solid fa-comment-dots"></i> บันทึกนิเทศ</label>
                            <textarea name="advisor_note" rows="5" placeholder="ใส่ข้อความที่ต้องการแจ้งนิสิต หรือบันทึกการนิเทศที่นี่..."><?= $data['advisor_note']; ?></textarea>
                        </div>

                        <button type="submit" class="btn-submit">
                            <i class="fa-solid fa-save"></i> บันทึก
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>