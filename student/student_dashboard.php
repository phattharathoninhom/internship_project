<?php
session_start();
require_once('../includes/connect.php');

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    header("Location: index.html");
    exit();
}

$student_id = $_SESSION['user_id'];

// 1. ดึงข้อมูลส่วนตัวนิสิต (ดึงแถวเดียว)
$sql_student = "SELECT * FROM students WHERE student_id = '$student_id'";
$res_student = $conn->query($sql_student);
$student = $res_student->fetch_assoc();

// 2. ดึงรายการคำขอฝึกงานทั้งหมด (ดึงทุกแถวที่เคยยื่น)
$sql_req = "SELECT r.*, st.status_name 
            FROM internship_request r
            LEFT JOIN status_list st ON r.status_code = st.status_code
            WHERE r.student_id = '$student_id'
            ORDER BY r.request_date DESC"; // เอาล่าสุดขึ้นก่อน
$result_req = $conn->query($sql_req);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard | SWU Internship</title>
    <link rel="stylesheet" href="/internship_project/assets/css/style.css">
    <link rel="stylesheet" href="/internship_project/assets/css/student_dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <?php include ('../includes/navbar.php'); ?>

    <div class="student-content">
        <div class="profile-card">
    <div style="display: flex; flex-direction: column; align-items: flex-start; gap: 15px;">
        <div class="student-photo-square">
            <?php 
                $img_path = "../assets/image/students/" . $student['profile_img'];
                if (!file_exists($img_path) || empty($student['profile_img'])) {
                    $img_path = "../assets/image/students/default.jpg";
                }
            ?>
            <img src="<?= $img_path; ?>" alt="Student Photo">
        </div>

        <div class="student-info-detail">
            <h2 style="color: #9e1a32; font-size: 1.4em; margin: 0 0 10px 0; width: 100%; text-align: center;">
                ข้อมูลนิสิต
            </h2>
            <div class="info-item">
                <span class="info-label">ชื่อ-นามสกุล:</span>
                <span class="info-value"><?= $student['firstName'] . " " . $student['lastName']; ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">รหัสนิสิต:</span>
                <span class="info-value"><?= $student['student_id']; ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">ชั้นปี:</span>
                <span class="info-value"> ปี 4 </span>
            </div>
            <div class="info-item">
                <span class="info-label">ปีการศึกษา:</span>
                <span class="info-value"> 2569 </span>
            </div>
        </div>
    </div>
    
    
</div>

        <div class="request-section">
            <div class="request-header">
            <h3 style="margin: 0; color: #444;">ประวัติการยื่นคำขอฝึกงาน</h3>
            <a href="student_internships_req.php" class="btn-request">+ ยื่นคำขอใหม่</a>
        </div>
            
            <?php if ($result_req->num_rows > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>วันที่ยื่น</th>
                            <th>สถานประกอบการ</th>
                            <th>สถานะ</th>
                            <th>หมายเหตุจากอาจารย์</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $result_req->fetch_assoc()): ?>
                            <tr>
                                <td style="font-size: 0.9em; color: #666;">
                                    <?= date('d/m/Y', strtotime($row['request_date'])); ?>
                                </td>
                                <td>
                                    <strong style="color: #333;"><?= $row['company_name']; ?></strong><br>
                                    <small style="color: #888;">เริ่ม: <?= date('d/m/Y', strtotime($row['start_date'])); ?></small>
                                </td>
                                <td>
                                    <?php 
                                        $s_code = $row['status_code'];
                                        $class = "status-default";
                                        if($s_code == 1) $class = "status-1";
                                        else if($s_code == 2) $class = "status-2";
                                        else if($s_code == 3) $class = "status-3";
                                        else if($s_code == 4) $class = "status-4";
                                        else if($s_code == 9) $class = "status-9";
                                    ?>
                                    <span class="status-badge <?= $class; ?>">
                                        <?= $row['status_name']; ?>
                                    </span>
                                </td>
                                <td style="font-size: 0.85em; color: #d63384;">
                                    <?= $row['advisor_note'] ? $row['advisor_note'] : '-'; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div style="text-align: center; padding: 40px; color: #999;">
                    <p>ยังไม่มีประวัติการยื่นคำขอฝึกงาน</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php include '../includes/footer.php'; ?>
</body>
</html>