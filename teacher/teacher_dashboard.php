<?php
session_start();
require_once('../includes/connect.php');

// ตรวจสอบ Login (role ของอาจารย์คือ 'teacher')
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'teacher') {
    header("Location: /internship_project/login.php");
    exit();
}

$teacher_id = $_SESSION['user_id'];

// --- ดึงข้อมูลนิสิตและรายการคำขอ (ตามข้อ 5.1) ---
// ใช้ INNER JOIN เพื่อดึงเฉพาะนิสิตที่มีการส่งคำขอเข้ามาแล้ว
$sql = "SELECT s.*, r.request_id, r.company_name, r.status_code, st.status_name
        FROM internship_request r
        INNER JOIN students s ON r.student_id = s.student_id
        LEFT JOIN status_list st ON r.status_code = st.status_code
        ORDER BY r.request_id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard | SWU Internship</title>
    <link rel="stylesheet" href="/internship_project/assets/css/style.css">
    <link rel="stylesheet" href="/internship_project/assets/css/teacher_dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <?php include('../includes/navbar.php'); ?>

    <div class="teacher-content">
        <div class="header-box">
            <div>
                <h2 style="color: #9e1a32; margin: 0;">ระบบอาจารย์ที่ปรึกษา</h2>
                <p style="margin: 5px 0 0 0; color: #666;">รายการคำขอฝึกงานที่รอดำเนินการ</p>
            </div>
            <div style="text-align: right;">
                <strong>อาจารย์:</strong> <?php echo $_SESSION['name']; ?>
            </div>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>รหัสนิสิต</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>บริษัทที่สมัคร</th>
                        <th>สถานะ</th>
                        <th>รายละเอียด</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result && $result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><strong><?php echo $row['student_id']; ?></strong></td>
                            <td><?php echo $row['firstName'] . " " . $row['lastName']; ?></td>
                            <td><?php echo $row['company_name'] ?? '-'; ?></td>
                            <td>
                                <?php 
                                    $s_code = $row['status_code'];
                                    $status_class = "status-default";
                                    if($s_code == 1) $status_class = "status-1";
                                    else if($s_code == 2) $status_class = "status-2";
                                    else if($s_code == 3) $status_class = "status-3";
                                    else if($s_code == 4) $status_class = "status-4";
                                    else if($s_code == 9) $status_class = "status-9";
                                ?>
                                <span class="status-badge <?php echo $status_class; ?>">
                                    <?php echo $row['status_name'] ?? 'ไม่มีข้อมูล'; ?>
                                </span>
                            </td>
                            <td>
                                <a href="teacher_manage.php?id=<?php echo $row['request_id']; ?>" class="btn-action btn-view">ดูข้อมูล</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="6" style="text-align:center; padding:30px;">ไม่พบรายการคำขอฝึกงาน</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>