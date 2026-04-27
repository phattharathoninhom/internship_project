<?php session_start(); ?> <!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประชาสัมพันธ์ - SWU Internship</title>
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <?php include 'includes/navbar.php'; ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<section class="hero-section">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            
            <div class="swiper-slide">
                <div class="slide-content" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://www.swu.ac.th/images/head/2569/0.jpg');">
                    <div class="container"></div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="slide-content" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://www.swu.ac.th/images/head/2569/Prasarnmit.png');">
                    <div class="container"></div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="slide-content" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://www.swu.ac.th/images/head/2569/Ongkharak.png');">
                    <div class="container"></div>
                </div>
            </div>

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>

<script>
    const modal = document.getElementById("announcementModal");
    
    window.onload = function() {
        setTimeout(() => {
            modal.classList.add("active");
        }, 100);
    }

    document.querySelector(".close-modal").onclick = function() {
        modal.classList.remove("active");
        setTimeout(() => { modal.style.display = "none"; }, 400);
    }
</script>

<script>
    const modal = document.getElementById("announcementModal");
    const closeBtn = document.querySelector(".close-modal");

    // ฟังก์ชันสำหรับเปิดป๊อปอัพพร้อมเอฟเฟกต์ Zoom In
    window.onload = function() {
        modal.style.display = "flex";
        setTimeout(() => {
            modal.classList.add("active");
        }, 50);
    };

    function closeModal() {
        modal.classList.remove("active");
        setTimeout(() => {
            modal.style.display = "none";
        }, 400); 
    }

    closeBtn.onclick = closeModal;

    window.onclick = function(event) {
        if (event.target == modal) {
            closeModal();
        }
    };
</script>

<section class="concept-section">
    <div class="container">
        <div class="concept-wrapper">
            <div class="concept-title">
                <h2>กรอบแนวคิด<br>การพัฒนา <span>LOVES</span></h2>
                <p>เป็นการขับเคลื่อนองค์กรเพื่อยกระดับประสิทธิภาพและคุณค่าของมหาวิทยาลัยในทุกมิติ</p>
                <p class="highlight">"สานงานต่อ ก้าวงามใหม่ ใส่ใจประชาคม ค่านิยมเพื่อสังคม"</p>
            </div>

            <div class="concept-cards">
                <div class="c-card">
                    <div class="c-circle">L</div>
                    <div class="c-text"><strong>Learning</strong><br>มุ่งสู่ความเป็นเลิศทางวิชาการ</div>
                </div>
                <div class="c-card">
                    <div class="c-circle">O</div>
                    <div class="c-text"><strong>Opportunity</strong><br>โอกาสของทุกคน</div>
                </div>
                <div class="c-card">
                    <div class="c-circle">V</div>
                    <div class="c-text"><strong>Value Added</strong><br>ยกระดับคุณค่าขององค์กร</div>
                </div>
                <div class="c-card">
                    <div class="c-circle">E</div>
                    <div class="c-text"><strong>Environment</strong><br>พัฒนาศักยภาพเชิงพื้นที่</div>
                </div>
                <div class="c-card">
                    <div class="c-circle">S</div>
                    <div class="c-text"><strong>Social Engagement</strong><br>มหาวิทยาลัยเพื่อสังคม</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="academic-section">
    <div class="container">
        <div class="academic-header">
            <h2>Academic</h2>
            <p>ค้นหาหลักสูตรที่เหมาะกับคุณ พร้อมเปิดโลกแห่งการเรียนรู้ที่มหาวิทยาลัยศรีนครินทรวิโรฒ</p>
        </div>

        <div class="academic-grid">
            <div class="academic-card admission">
                <div class="aca-icon"><i class="fas fa-file-alt"></i></div>
                <h3>Admission</h3>
                <p class="aca-sub">รับสมัครนิสิตใหม่</p>
                <p class="aca-desc">ข้อมูลการสมัครเข้าศึกษา คุณสมบัติ และขั้นตอนการสมัคร</p>
                <div class="aca-arrow"><i class="fas fa-arrow-right"></i></div>
            </div>

            <div class="academic-card undergraduate">
                <div class="aca-icon"><i class="fas fa-graduation-cap"></i></div>
                <h3>ปริญญาตรี</h3>
                <p class="aca-sub">Undergraduate Program</p>
                <p class="aca-desc">หลักสูตรระดับปริญญาตรีทุกสาขาวิชา</p>
                <div class="aca-arrow"><i class="fas fa-arrow-right"></i></div>
            </div>

            <div class="academic-card graduate">
                <div class="aca-icon"><i class="fas fa-book-open"></i></div>
                <h3>บัณฑิตศึกษา</h3>
                <p class="aca-sub">Graduate Program</p>
                <p class="aca-desc">หลักสูตรระดับปริญญาโท และปริญญาเอก เพื่อความเชี่ยวชาญเฉพาะทาง</p>
                <div class="aca-arrow"><i class="fas fa-arrow-right"></i></div>
            </div>

            <div class="academic-card lifelong">
                <div class="aca-icon"><i class="fas fa-infinity"></i></div>
                <h3>Lifelong Learning</h3>
                <p class="aca-sub">การเรียนรู้ตลอดชีวิต</p>
                <p class="aca-desc">หลักสูตรระยะสั้น การพัฒนาทักษะ และการศึกษาต่อเนื่อง</p>
                <div class="aca-arrow"><i class="fas fa-arrow-right"></i></div>
            </div>
        </div>
    </div>
</section>

    <div class="main-content">
        <div class="container">
            
            <div class="page-header">
                <h2>ข่าวสารและกิจกรรม</h2>
                <p>รวมข่าวความเคลื่อนไหว และกิจกรรมภายในรั้ว มศว</p>
            </div>

            <div class="news-grid">
                <div class="news-card featured">
                    <div class="news-image">
                        <div class="news-badge">รอบรั้ว มศว</div>
                        <img src="https://news.swu.ac.th/uploads/images/1776997182_08_-_1.jpg" alt="Featured News">
                    </div>
                    <div class="news-detail">
                        <span class="news-category">ข่าวสาร</span>
                        <span class="news-date">8 เมษายน 2569</span>
                        <h3>ขอแสดงความยินดีกับตัวแทนนิสิต คณะศึกษาศาสตร์ มศว</h3>
                        <p>มหาวิทยาลัยศรีนครินทรวิโรฒ (มศว) ขอแสดงความยินดีกับทีมเกือบเจ๊ง Production ได้แก่ นางสาวจิรัชญา สุวรรณกูฏ นายโชติวิชช...</p>
                        <a href="#" class="read-more">อ่านรายละเอียดเพิ่มเติม</a>
                    </div>
                </div>
            </div>

            <div class="news-row">

                <div class="news-card">
                    <div class="news-image">
                        <img src="https://news.swu.ac.th/uploads/images/1775637681_02_-_1.jpg" alt="News">
                    </div>
                    <div class="news-detail">
                        <span class="news-category">กิจกรรม</span>
                        <span class="news-date">3 เมษายน 2569</span>
                        <h3>ขอแสดงความยินดีกับนางสาวปิยมณฑ์ ชื่นแผ่ว นิสิตคณะวิศวกรรมศาสตร์ มศว</h3>
                        <p>มหาวิทยาลัยศรีนครินทรวิโรฒ (มศว) ขอแสดงความยินดีกับนางสาวปิยมณฑ์ ชื่นแผ่ว นิสิตชั้นปีที่ 3 สาขาวิศวกรรมคอมพิวเตอร์ คณะวิ...</p>
                        <a href="#" class="read-more">อ่านต่อ</a>
                    </div>
                </div>

                <div class="news-card">
                    <div class="news-image">
                        <img src="https://news.swu.ac.th/uploads/images/1773387366_img_2685.jpg" alt="News">
                    </div>
                    <div class="news-detail">
                        <span class="news-category">กิจกรรม</span>
                        <span class="news-date">5 เมษายน 2569</span>
                        <h3>ขอแสดงความยินดีกับนิสิตคณะวิทยาศาสตร์ มศว</h3>
                        <p>มหาวิทยาลัยศรีนครินทรวิโรฒ (มศว) ขอแสดงความยินดีกับนายจักรพันธ์ วงษ์ไทร นิสิตชั้นปีที่ 4 นายปริญญา โพธิ์วิฑูร นิสิตชั้น...</p>
                        <a href="#" class="read-more">อ่านต่อ</a>
                    </div>
                </div>

                <div class="news-card">
                    <div class="news-image">
                        <img src="https://news.swu.ac.th/uploads/images/1773387059_img_2682.jpg" alt="News">
                    </div>
                    <div class="news-detail">
                        <span class="news-category">กิจกรรม</span>
                        <span class="news-date">1 เมษายน 2569</span>
                        <h3>ขอแสดงความยินดีกับนิสิตคณะศึกษาศาสตร์</h3>
                        <p>มหาวิทยาลัยศรีนครินทรวิโรฒ (มศว) ขอแสดงความยินดีกับนายภูรินทร์ อุ่นเดช เอกการศึกษาพิเศษและการสอนภาษาไทย นางสาวชนิภรณ์ คำ...</p>
                        <a href="#" class="read-more">อ่านต่อ</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>