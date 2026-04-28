<?php
session_start();
require_once('includes/connect.php');

$sql = "SELECT * FROM students WHERE grade = 1 ORDER BY student_id ASC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลนิสิตปี 1 - SWU Internship</title>
    <link rel="stylesheet" href="assets/css/std.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <?php include 'includes/navbar.php'; ?>

    <div class="main-content">
        <div class="student-list-container">
            <div class="list-header">
                <h2>รายชื่อนิสิตชั้นปีที่ 1</h2>
                <p>ข้อมูลรายชื่อนิสิตสาขาวิชาสารสนเทศศึกษา มหาวิทยาลัยศรีนครินทรวิโรฒ</p>
            </div>

            <div class="table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>รหัสนิสิต</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>GAFE Account</th>
                            <th>ระดับชั้น</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php if ($result && $result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td class="id-col"><?php echo htmlspecialchars($row['student_id']); ?></td>
                <td class="name-col">
                    <?php echo htmlspecialchars($row['firstName'] . " " . $row['lastName']); ?>
                </td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo " ปี " . htmlspecialchars($row['grade']); ?></td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="4" style="text-align:center;">ไม่พบข้อมูลนิสิต</td>
        </tr>
    <?php endif; ?>
</tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>