<?php session_start(); ?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประวัติอาจารย์ - อาจารย์โชติมา วัฒนะ</title>
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
                        <img src="../assets/image/Chotima.jpg" alt="อาจารย์โชติมา">
                    </div>
                    <div class="profile-title">
                        <h1>อาจารย์โชติมา วัฒนะ</h1>
                        <p class="en-name">MISS CHOTIMA WATANA</p>
                        <p class="tag">อาจารย์</p>
                    </div>
                </div>

                <div class="profile-grid">
                    <div class="profile-sidebar">
                        <div class="info-box">
                            <h3><i class="fas fa-address-card"></i> ข้อมูลส่วนตัว</h3>
                            <p><strong>ตำแหน่งวิชาการ:</strong> อาจารย์</p>
                            <p><strong>ที่ทำงาน:</strong> คณะมนุษยศาสตร์ มหาวิทยาลัยศรีนครินทรวิโรฒ 114 สุขุมวิท 23 กรุงเทพฯ 10110</p>
                            <p><strong>Email:</strong> chotimaw@g.swu.ac.th</p>
                        </div>

                        <div class="info-box" style="margin-top: 20px; border-left-color: #007bff;">
                            <h3><i class="fas fa-search"></i> Research Interests</h3>
                            <p style="font-size: 0.9rem;">- Library Management</p>
                            <p style="font-size: 0.9rem;">- Library Service</p>
                            <p style="font-size: 0.9rem;">- Information Behavior</p>
                        </div>
                    </div>

                    <div class="profile-main">
                        
                        <div class="section">
                            <h3><i class="fas fa-graduation-cap"></i> คุณวุฒิการศึกษา</h3>
                            <table class="edu-table">
                                <thead>
                                    <tr>
                                        <th>วุฒิการศึกษา</th>
                                        <th>สาขาวิชา</th>
                                        <th>สถาบัน</th>
                                        <th>ปีที่สำเร็จการศึกษา</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>ศศ.บ.</td>
                                        <td>สารสนเทศศาสตร์</td>
                                        <td>มหาวิทยาลัยมหาสารคาม</td>
                                        <td>2553</td>
                                    </tr>
                                    <tr>
                                        <td>ศศ.ม.</td>
                                        <td>การจัดการสารสนเทศ</td>
                                        <td>มหาวิทยาลัยขอนแก่น</td>
                                        <td>2557</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="section">
                            <h3><i class="fas fa-briefcase"></i> ประสบการณ์การทำงาน</h3>
                            <ul class="skill-list">
                                <li><strong>มี.ค. 2559 - ปัจจุบัน:</strong> อาจารย์ คณะมนุษยศาสตร์ มหาวิทยาลัยศรีนครินทรวิโรฒ</li>
                                <li><strong>2554 - 2559:</strong> บรรณารักษ์ สำนักวิทยบริการ มหาวิทยาลัยมหาสารคาม</li>
                            </ul>
                        </div>

                        <div class="section">
                            <h3><i class="fas fa-award"></i> Certificates & Training</h3>
                            <ul class="skill-list" style="font-size: 0.9rem;">
                                <li><strong>2025:</strong> IFLA Training Workshop - Measurement & Evaluation of Library Services in Thailand</li>
                                <li><strong>2024:</strong> Erasmus+ICM in Hungary (ทุนแลกเปลี่ยน ณ ประเทศฮังการี 3 เดือน)</li>
                                <li><strong>2021:</strong> Effective Presentations in English (STOU-PUP OUS)</li>
                            </ul>
                        </div>

                        <div class="section">
                            <h3><i class="fas fa-book"></i> ผลงานทางวิชาการ (Selected Publications)</h3>
                            <div class="work-item">
                                <p>Watana, C. (2024). Information Perception about the Prevention of Coronavirus 2019 Epidemic of People in Bangkok. SWU Research and Development Journal.</p>
                                <p>Watana, C. (2021). Social Media Usage Behaviors of Undergraduate Students, Srinakharinwirot University. Library and Information Science Journal.</p>
                                <p>Watana, C., et al. (2020). The Evaluation of Satisfaction toward Teaching and Learning Process by using Kahoot! Program. Journal of Information.</p>
                                <p>Watana, C. (2016). Bookless Library Can be Called Library?. Journal of Information. 15(1): 1-10.</p>
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