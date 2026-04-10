<?php
// =======================================================================
// 1. ตั้งค่าการเชื่อมต่อฐานข้อมูล (Database Connection)
// =======================================================================
$host = 'localhost';
$dbname = 'internships'; // ชื่อฐานข้อมูลของคุณ
$username = 'root';      // ชื่อผู้ใช้งาน MySQL (ของ XAMPP ปกติคือ root)
$password = '';          // รหัสผ่าน MySQL (ของ XAMPP ปกติให้เว้นว่างไว้)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    // ตั้งค่าให้ PDO แจ้งเตือนเมื่อเกิด Error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("การเชื่อมต่อฐานข้อมูลล้มเหลว: " . $e->getMessage());
}

// =======================================================================
// 2. การประมวลผลข้อมูลเมื่อกดปุ่ม Submit ฟอร์ม
// =======================================================================
date_default_timezone_set('Asia/Bangkok');
$is_submitted = false;
$error_message = "";
$success_title = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // รับค่าจากฟอร์มและตัดช่องว่าง
    $student_id       = isset($_POST['student_id']) ? trim($_POST['student_id']) : '';
    $company_name     = isset($_POST['company_name']) ? trim($_POST['company_name']) : '';
    $company_address  = isset($_POST['company_address']) ? trim($_POST['company_address']) : '';
    $contact_person   = isset($_POST['contact_person']) ? trim($_POST['contact_person']) : '';
    $start_date       = isset($_POST['start_date']) ? trim($_POST['start_date']) : '';
    $end_date         = isset($_POST['end_date']) ? trim($_POST['end_date']) : '';
    
    // วันที่ยื่นคำร้อง (สร้างอัตโนมัติ)
    $request_date     = date("Y-m-d H:i:s");

    try {
        // --- ตรวจสอบว่ามีคำร้องของนิสิตคนนี้อยู่แล้วหรือไม่ ---
        $check_sql = "SELECT request_id FROM internship_request WHERE student_id = :student_id LIMIT 1";
        $stmt_check = $pdo->prepare($check_sql);
        $stmt_check->execute([':student_id' => $student_id]);
        $existing_request = $stmt_check->fetch(PDO::FETCH_ASSOC);

        if ($existing_request) {
            // ---> ถ้ามีข้อมูลอยู่แล้ว : อัปเดตข้อมูลเดิม (UPDATE) <---
            $update_sql = "UPDATE internship_request 
                           SET company_name = :company_name, 
                               company_address = :company_address, 
                               contact_person = :contact_person, 
                               start_date = :start_date, 
                               end_date = :end_date, 
                               request_date = :request_date
                           WHERE student_id = :student_id";
            
            $stmt_update = $pdo->prepare($update_sql);
            $stmt_update->execute([
                ':company_name'    => $company_name,
                ':company_address' => $company_address,
                ':contact_person'  => $contact_person,
                ':start_date'      => $start_date,
                ':end_date'        => $end_date,
                ':request_date'    => $request_date,
                ':student_id'      => $student_id
            ]);
            
            $success_title = "อัปเดตข้อมูลคำร้องสำเร็จ!";
            
        } else {
            // ---> ถ้ายังไม่มีข้อมูล : บันทึกข้อมูลใหม่ (INSERT) <---
            $insert_sql = "INSERT INTO internship_request 
                           (student_id, company_name, company_address, contact_person, start_date, end_date, request_date) 
                           VALUES 
                           (:student_id, :company_name, :company_address, :contact_person, :start_date, :end_date, :request_date)";
            
            $stmt_insert = $pdo->prepare($insert_sql);
            $stmt_insert->execute([
                ':student_id'      => $student_id,
                ':company_name'    => $company_name,
                ':company_address' => $company_address,
                ':contact_person'  => $contact_person,
                ':start_date'      => $start_date,
                ':end_date'        => $end_date,
                ':request_date'    => $request_date
            ]);

            $success_title = "บันทึกคำร้องใหม่สำเร็จ!";
        }

        $is_submitted = true;

    } catch(PDOException $e) {
        // ดักจับ Error กรณีรหัสนิสิตไม่มีในตาราง students (Foreign Key Error)
        if ($e->getCode() == 23000) {
            $error_message = "เกิดข้อผิดพลาด: รหัสนิสิต '$student_id' ไม่มีในระบบฐานข้อมูลนักศึกษา กรุณาตรวจสอบอีกครั้ง";
        } else {
            $error_message = "เกิดข้อผิดพลาดในการทำงาน: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบยื่นคำร้องขอฝึกงาน</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f7f6; margin: 0; padding: 20px; }
        .container { max-width: 600px; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); margin: auto; }
        h2 { text-align: center; color: #333; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #555; }
        input[type="text"], input[type="date"], textarea { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; font-family: inherit; }
        textarea { resize: vertical; height: 100px; }
        .btn-submit { background-color: #28a745; color: white; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer; width: 100%; font-size: 16px; font-weight: bold; }
        .btn-submit:hover { background-color: #218838; }
        .success-box { background-color: #d4edda; border-color: #c3e6cb; color: #155724; padding: 20px; border-radius: 8px; margin-bottom: 20px; line-height: 1.6; }
        .error-box { background-color: #f8d7da; border-color: #f5c6cb; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px; line-height: 1.6; }
        .btn-back { display: inline-block; margin-top: 15px; padding: 10px 15px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px; font-weight: bold; text-align: center;}
        .btn-back:hover { background-color: #0056b3; }
    </style>
</head>
<body>

<div class="container">
    
    <?php if ($error_message): ?>
        <div class="error-box">
            <strong style="font-size: 18px;">❌ ไม่สามารถบันทึกข้อมูลได้</strong><br>
            <?php echo $error_message; ?>
        </div>
    <?php endif; ?>

    <?php if ($is_submitted): ?>
        <div class="success-box">
            <h3 style="margin-top: 0;">✅ <?php echo $success_title; ?></h3>
            <strong>รหัสนิสิต:</strong> <?php echo htmlspecialchars($student_id); ?><br>
            <strong>ชื่อสถานประกอบการ:</strong> <?php echo htmlspecialchars($company_name); ?><br>
            <strong>ผู้ติดต่อ/พี่เลี้ยง:</strong> <?php echo htmlspecialchars($contact_person); ?><br>
            <strong>วันที่เริ่มต้น:</strong> <?php echo htmlspecialchars($start_date); ?><br>
            <strong>วันที่สิ้นสุด:</strong> <?php echo htmlspecialchars($end_date); ?><br>
            <strong>วันที่ทำรายการล่าสุด:</strong> <?php echo htmlspecialchars($request_date); ?><br>
            <br>
            <a href="index.php" class="btn-back">⬅ กลับไปหน้าฟอร์ม</a>
        </div>
    
    <?php else: ?>
        <h2>ยื่น/แก้ไข คำร้องขอฝึกงาน</h2>
        <form action="" method="POST">
            
            <div class="form-group">
                <label for="student_id">รหัสนิสิต <span style="color:red;">*</span> <small style="color:gray;">(หากเคยยื่นแล้ว ระบบจะอัปเดตข้อมูลใหม่ให้)</small></label>
                <input type="text" id="student_id" name="student_id" required placeholder="กรอกรหัสนิสิต 11 หลัก">
            </div>

            <div class="form-group">
                <label for="company_name">ชื่อสถานประกอบการ <span style="color:red;">*</span></label>
                <input type="text" id="company_name" name="company_name" required placeholder="เช่น บริษัท เอบีซี จำกัด">
            </div>

            <div class="form-group">
                <label for="company_address">ที่อยู่สถานประกอบการ <span style="color:red;">*</span></label>
                <textarea id="company_address" name="company_address" required placeholder="กรอกที่อยู่แบบครบถ้วน"></textarea>
            </div>

            <div class="form-group">
                <label for="contact_person">ชื่อผู้ติดต่อ / พี่เลี้ยง <span style="color:red;">*</span></label>
                <input type="text" id="contact_person" name="contact_person" required placeholder="ชื่อ-นามสกุล">
            </div>

            <div class="form-group">
                <label for="start_date">วันที่เริ่มต้นฝึกงาน <span style="color:red;">*</span></label>
                <input type="date" id="start_date" name="start_date" required>
            </div>

            <div class="form-group">
                <label for="end_date">วันที่สิ้นสุดการฝึกงาน <span style="color:red;">*</span></label>
                <input type="date" id="end_date" name="end_date" required>
            </div>

            <button type="submit" class="btn-submit">บันทึกข้อมูล</button>
            
        </form>
    <?php endif; ?>

</div>

</body>
</html>