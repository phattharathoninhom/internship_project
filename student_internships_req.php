<?php
// ไฟล์: process_internship.php

// 1. ตรวจสอบว่ามีการส่งข้อมูลแบบ POST มาหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 2. รับค่าจากฟอร์มและทำความสะอาดข้อมูล (ตัดช่องว่างและป้องกัน XSS)
    $company_name     = isset($_POST['company_name']) ? htmlspecialchars(trim($_POST['company_name'])) : '';
    $company_address  = isset($_POST['company_address']) ? htmlspecialchars(trim($_POST['company_address'])) : '';
    $coordinator_name = isset($_POST['coordinator_name']) ? htmlspecialchars(trim($_POST['coordinator_name'])) : '';
    $start_date       = isset($_POST['start_date']) ? htmlspecialchars(trim($_POST['start_date'])) : '';
    $end_date         = isset($_POST['end_date']) ? htmlspecialchars(trim($_POST['end_date'])) : '';
    $advisor_note     = isset($_POST['advisor_note']) ? htmlspecialchars(trim($_POST['advisor_note'])) : '';

    // 3. สร้างวันที่ยื่นคำร้องอัตโนมัติ 
    // ตั้งค่า Timezone ให้เป็นเวลาประเทศไทย (สำคัญมากเวลาบันทึกลง Database)
    date_default_timezone_set('Asia/Bangkok');
    $submission_date = date("Y-m-d H:i:s");

    // -------------------------------------------------------------------------
    // 4. ส่วนสำหรับนำข้อมูลบันทึกลง Database (นำคอมเมนต์ออกเมื่อเชื่อมต่อ DB แล้ว)
    // -------------------------------------------------------------------------
    
    /*
    // สมมติว่าคุณมีไฟล์ connect.php สำหรับเชื่อมต่อฐานข้อมูล
    require_once 'connect.php'; 

    // ตัวอย่างคำสั่ง SQL (แนะนำให้ใช้ Prepared Statements เพื่อความปลอดภัย)
    $sql = "INSERT INTO internships (company_name, company_address, coordinator_name, start_date, end_date, advisor_note, created_at) 
            VALUES (:company_name, :company_address, :coordinator_name, :start_date, :end_date, :advisor_note, :created_at)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':company_name' => $company_name,
        ':company_address' => $company_address,
        ':coordinator_name' => $coordinator_name,
        ':start_date' => $start_date,
        ':end_date' => $end_date,
        ':advisor_note' => $advisor_note,
        ':created_at' => $submission_date
    ]);
    */

    // -------------------------------------------------------------------------
    // 5. แสดงผลการทำงานชั่วคราว (เมื่อทำระบบจริงอาจเปลี่ยนเป็น redirect ไปหน้าอื่น)
    // -------------------------------------------------------------------------
    echo "<h3>บันทึกข้อมูลสำเร็จ!</h3>";
    echo "<strong>ชื่อสถานประกอบการ:</strong> " . $company_name . "<br>";
    echo "<strong>ที่อยู่:</strong> " . $company_address . "<br>";
    echo "<strong>ชื่อผู้ประสานงาน:</strong> " . $coordinator_name . "<br>";
    echo "<strong>วันที่เริ่มต้นฝึกงาน:</strong> " . $start_date . "<br>";
    echo "<strong>วันที่สิ้นสุดการฝึกงาน:</strong> " . $end_date . "<br>";
    echo "<strong>ความเห็นจากอาจารย์ที่ปรึกษา:</strong> " . $advisor_note . "<br>";
    echo "<strong>วันที่ยื่นคำร้อง:</strong> " . $submission_date . "<br>";

} else {
    // กรณีที่ผู้ใช้แอบพิมพ์ URL เข้ามาหน้านี้โดยตรง ไม่ได้กด Submit ฟอร์ม
    echo "ไม่สามารถเข้าถึงหน้านี้ได้โดยตรง กรุณาส่งข้อมูลผ่านแบบฟอร์ม";
    // หรือเด้งกลับไปหน้าฟอร์ม: header("Location: form_page.php"); exit();
}
?>