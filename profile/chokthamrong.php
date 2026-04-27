<?php session_start(); ?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประวัติอาจารย์ - ดร.โชคธำรงค์ จงจอหอ</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <?php include ('../includes/navbar.php'); ?>

    <div class="main-content">
        <div class="container">
            <div class="profile-card">
                
                <div class="profile-header">
                    <div class="profile-img-box">
                        <img src="../assets/image/Chokthamrong.jpg" alt="ดร.โชคธำรงค์">
                    </div>
                    <div class="profile-title">
                        <h1>ดร.โชคธำรงค์ จงจอหอ</h1>
                        <p class="en-name">CHOKTHAMRONG CHONGCHORHOR</p>
                        <p class="tag">อาจารย์</p>
                    </div>
                </div>

                <div class="profile-grid">
                    <div class="profile-sidebar">
                        <div class="info-box">
                            <h3><i class="fas fa-address-card"></i> ข้อมูลส่วนตัว</h3>
                            <p><strong>ตำแหน่งวิชาการ:</strong> อาจารย์</p>
                            <p><strong>ที่ทำงาน:</strong> คณะมนุษยศาสตร์ มหาวิทยาลัยศรีนครินทรวิโรฒ 114 ซอยสุขุมวิท 23 แขวงคลองเตยเหนือ เขตวัฒนา กรุงเทพฯ 10110</p>
                            <p><strong>เบอร์โทรศัพท์:</strong> 0-2649-5000 ต่อ 16292</p>
                            <p><strong>Email:</strong> chokthamrong@g.swu.ac.th</p>
                        </div>
                    </div>

                    <div class="profile-main">
                        
                        <div class="section">
                            <h3><i class="fas fa-graduation-cap"></i> คุณวุฒิการศึกษา</h3>
                            <table class="edu-table">
                                <thead>
                                    <tr>
                                        <th>วุฒิ</th>
                                        <th>สาขาวิชา</th>
                                        <th>สถาบัน</th>
                                        <th>ปีที่สำเร็จการศึกษา</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>ศศ.บ.</td>
                                        <td>สารสนเทศศาสตร์</td>
                                        <td>มหาวิทยาลัยขอนแก่น</td>
                                        <td>2549</td>
                                    </tr>
                                    <tr>
                                        <td>ศศ.ม.</td>
                                        <td>การจัดการทรัพยากรชีวภาพ</td>
                                        <td>มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี</td>
                                        <td>2551</td>
                                    </tr>
                                    <tr>
                                        <td>ปร.ด.</td>
                                        <td>สารสนเทศศึกษา</td>
                                        <td>มหาวิทยาลัยขอนแก่น</td>
                                        <td>2560</td>
                                    </tr>
                                    <tr>
                                        <td>วท.ม.</td>
                                        <td>เทคโนโลยีผู้ประกอบการและการจัดการนวัตกรรม</td>
                                        <td>มหาวิทยาลัยนเรศวร</td>
                                        <td>2565</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="section">
                            <h3><i class="fas fa-star"></i> ความเชี่ยวชาญ</h3>
                            <ul class="skill-list">
                                <li>การจัดระบบความรู้ (Knowledge Organization)</li>
                                <li>การสอนสารสนเทศศึกษา</li>
                                <li>ดรรชนีและสาระสังเขป</li>
                                <li>พฤติกรรมสารสนเทศของมนุษย์ (Human Information Behavior)</li>
                            </ul>
                        </div>

                        <div class="section">
                            <h3><i class="fas fa-book"></i> ผลงานทางวิชาการ (คัดเลือก)</h3>
                            <div class="work-item">
                                <strong>บทความวิจัยระดับชาติและนานาชาติ</strong>
                                <p>Chongchorhor, C. & Kabmala, M. (2022). The Development of an Ontology for Thai’s Indigenous Rice Knowledge in Thailand. Journal of Library and Information Studies.</p>
                                <p>โชคธำรงค์ จงจอหอ. (2564). การสังเคราะห์องค์ความรู้จากรายงานวิจัยด้านชุมชนศึกษาในจังหวัดกำแพงเพชร. วารสารวิจัยสมาคมห้องสมุดแห่งประเทศไทยฯ.</p>
                                <p>Chongchorhor, C. & Kabmala, M. (2019). Using Facet Analytico-Synthetic Method for Organizing Thai's Indigenous Rice Knowledge. Kasetsart Journal of Social Sciences.</p>
                            </div>
                            
                            <div class="work-item" style="margin-top: 15px;">
                                <strong>เอกสารคำสอน/ตำรา</strong>
                                <p>โชคธำรงค์ จงจอหอ. (2565). "ความรู้ทั่วไปเกี่ยวกับความฉลาดรู้ทางดิจิทัล". เอกสารคำสอนรายวิชาความฉลาดรู้ทางดิจิทัล สารสนเทศ และสื่อ.</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="profile-footer">
                    <a href="../teach.php" class="btn-back"><i class="fas fa-arrow-left"></i> กลับหน้ารายชื่ออาจารย์</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>