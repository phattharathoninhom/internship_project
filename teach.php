<?php session_start(); ?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลอาจารย์ - ISSWU</title>
    <link rel="stylesheet" href="/internship_project/assets/css/teach.css">
    <link rel="stylesheet" href="/internship_project/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <?php include ('includes/navbar.php'); ?>

    <div class="main-content">
        <div class="container">
            <div class="page-header">
                <h2>คณาจารย์ประจำหลักสูตร</h2>
                <p>คณะมนุษยศาสตร์ หลักสูตรศิลปศาสตรบัณฑิต สาขาวิชาสารสนเทศศึกษา มหาวิทยาลัยศรีนครินทรวิโรฒ</p>
            </div>

            <div class="teacher-grid">
                <!-- อาจารย์ดิษฐ์ -->
                <a href="profile/dit.php" class="teacher-card top-red">
                    <div class="avatar-wrapper">
                        <img src="assets/image/Dit.jpg" alt="อ.ดร.ดิษฐ์">
                    </div>
                    <h3 class="t-name">อ.ดร.ดิษฐ์ สุทธิวงศ์</h3>
                    <p class="t-pos">ประธานหลักสูตร</p>
                    <div class="t-divider"></div>
                    <div class="t-contact">
                        <p><i class="fas fa-phone-alt"></i> 02-649-5000 ต่อ 16508</p>
                        <p><i class="fas fa-envelope"></i> dit@g.swu.ac.th</p>
                    </div>
                </a>

                <!-- อาจารย์ฐิติ -->
                <a href="profile/thiti.php" class="teacher-card">
                    <div class="avatar-wrapper">
                        <img src="assets/image/Thiti.jpg" alt="อ.ดร.ฐิติ">
                    </div>
                    <h3 class="t-name">อ.ดร.ฐิติ อติชาติชยากร</h3>
                    <p class="t-pos">เลขานุการประจำหลักสูตร</p>
                    <div class="t-divider"></div>
                    <div class="t-contact">
                        <p><i class="fas fa-phone-alt"></i> 02-649-5000 ต่อ 16087</p>
                        <p><i class="fas fa-envelope"></i> thitik@g.swu.ac.th</p>
                    </div>
                </a>

                <!-- อาจารย์วิภากร -->
                <a href="profile/vipakorn.php" class="teacher-card">
                    <div class="avatar-wrapper">
                        <img src="assets/image/Vipakorn.jpg" alt="ผศ.ดร.วิภากร">
                    </div>
                    <h3 class="t-name">ผศ.ดร.วิภากร วัฒนสินธุ์</h3>
                    <p class="t-pos">อาจารย์ประจำหลักสูตร</p>
                    <div class="t-divider"></div>
                    <div class="t-contact">
                        <p><i class="fas fa-phone-alt"></i> 02-649-5000 ต่อ 16508</p>
                        <p><i class="fas fa-envelope"></i> vipakorn@g.swu.ac.th</p>
                    </div>
                </a>

                <!-- อาจารย์โชติมา -->
                <a href="profile/chotima.php" class="teacher-card">
                    <div class="avatar-wrapper">
                        <img src="assets/image/Chotima.jpg" alt="อ.โชติมา">
                    </div>
                    <h3 class="t-name">อ.โชติมา วัฒนะ</h3>
                    <p class="t-pos">อาจารย์ประจำหลักสูตร</p>
                    <div class="t-divider"></div>
                    <div class="t-contact">
                        <p><i class="fas fa-phone-alt"></i> 02-649-5000 ต่อ 16508</p>
                        <p><i class="fas fa-envelope"></i> chotimaw@g.swu.ac.th</p>
                    </div>
                </a>

                <!-- อาจารย์โชติมา -->
                <a href="profile/chokthamrong.php" class="teacher-card">
                    <div class="avatar-wrapper">
                        <img src="assets/image/Chokthamrong.jpg" alt="อ.ดร.โชคธำรงค์">
                    </div>
                    <h3 class="t-name">อ.ดร.โชคธำรงค์ จงจอหอ</h3>
                    <p class="t-pos">อาจารย์ประจำหลักสูตร</p>
                    <div class="t-divider"></div>
                    <div class="t-contact">
                        <p><i class="fas fa-phone-alt"></i> 02-649-5000 ต่อ 16292</p>
                        <p><i class="fas fa-envelope"></i> chokthamrong@g.swu.ac.th</p>
                    </div>
                </a>

                <!-- อาจารย์ดุษฎี -->
                <a href="profile/dussadee.php" class="teacher-card">
                    <div class="avatar-wrapper">
                        <img src="assets/image/Dussadee.jpg" alt="ผศ.ดร.ดุษฎี">
                    </div>
                    <h3 class="t-name">ผศ.ดร.ดุษฎี สีวังคำ</h3>
                    <p class="t-pos">อาจารย์ประจำหลักสูตร</p>
                    <div class="t-divider"></div>
                    <div class="t-contact">
                        <p><i class="fas fa-phone-alt"></i> 02-649-5000 ต่อ 16292</p>
                        <p><i class="fas fa-envelope"></i> dussadee@g.swu.ac.th</p>
                    </div>
                </a>

                <!-- อาจารย์ศศิพิมล -->
                <a href="profile/sasipimol.php" class="teacher-card">
                    <div class="avatar-wrapper">
                        <img src="assets/image/Sasipimol.jpg" alt="ผศ.ดร.ศศิพิมล">
                    </div>
                    <h3 class="t-name">ผศ.ดร.ศศิพิมล ประพินพงศกร</h3>
                    <p class="t-pos">อาจารย์ประจำหลักสูตร</p>
                    <div class="t-divider"></div>
                    <div class="t-contact">
                        <p><i class="fas fa-envelope"></i> sasipimol@g.swu.ac.th</p>
                    </div>
                </a>

                <!-- อาจารย์ศุมรรษตรา -->
                <a href="profile/sumattra.php" class="teacher-card">
                    <div class="avatar-wrapper">
                        <img src="assets/image/Sumattra.jpg" alt="อาจารย์ ดร. ศุมรรษตรา แสนวา">
                    </div>
                    <h3 class="t-name">อาจารย์ ดร. ศุมรรษตรา แสนวา</h3>
                    <p class="t-pos">อาจารย์ประจำหลักสูตร</p>
                    <div class="t-divider"></div>
                    <div class="t-contact">
                        <p><i class="fas fa-phone-alt"></i> 085-617-9617</p>
                        <p><i class="fas fa-envelope"></i> sumattra@g.swu.ac.th</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</main>
</body>
</html>