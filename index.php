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
                <div class="aca-info-status"><i class="fas fa-info-circle"></i></div>
            </div>

            <div class="academic-card undergraduate">
                <div class="aca-icon"><i class="fas fa-graduation-cap"></i></div>
                <h3>ปริญญาตรี</h3>
                <p class="aca-sub">Undergraduate Program</p>
                <p class="aca-desc">หลักสูตรระดับปริญญาตรีทุกสาขาวิชา</p>
                <div class="aca-info-status"><i class="fas fa-info-circle"></i></div>
            </div>

            <div class="academic-card graduate">
                <div class="aca-icon"><i class="fas fa-book-open"></i></div>
                <h3>บัณฑิตศึกษา</h3>
                <p class="aca-sub">Graduate Program</p>
                <p class="aca-desc">หลักสูตรระดับปริญญาโท และปริญญาเอก เพื่อความเชี่ยวชาญเฉพาะทาง</p>
                <div class="aca-info-status"><i class="fas fa-info-circle"></i></div>
            </div>

            <div class="academic-card lifelong">
                <div class="aca-icon"><i class="fas fa-infinity"></i></div>
                <h3>Lifelong Learning</h3>
                <p class="aca-sub">การเรียนรู้ตลอดชีวิต</p>
                <p class="aca-desc">หลักสูตรระยะสั้น การพัฒนาทักษะ และการศึกษาต่อเนื่อง</p>
                <div class="aca-info-status"><i class="fas fa-info-circle"></i></div>
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
                        <img src="https://scontent-bkk1-2.xx.fbcdn.net/v/t39.30808-6/657563350_1609629606953926_8414444157441255115_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=13d280&_nc_ohc=jbJ677qnYLMQ7kNvwFg0ugS&_nc_oc=Adr_Ic7MOn9dGqeZTwns_uiyUmeFD-nXxo3QC9eS4PGarfJi4Ak-kXtlmwqxxwlMPok&_nc_zt=23&_nc_ht=scontent-bkk1-2.xx&_nc_gid=5V83TDHBgB-UjQcc66pTHw&_nc_ss=7b289&oh=00_Af1JGsQI3h5F3s9FyAwfUDvTDJUMnvWp13bH8CkGSTZ14Q&oe=69F62A9D" alt="Featured News">
                    </div>
                    <div class="news-detail">
                        <span class="news-category">ข่าวสาร</span>
                        <span class="news-date">8 เมษายน 2569</span>
                        <h3>คณะจารย์สาขาวิชาสารสนเทศศึกษาเข้าร่วมโครงการ Humanities together</h3>
                        <p>คณะจารย์สาขาวิชาสารสนเทศศึกษาเข้าร่วมโครงการ Humanities together: Forwarding Human Potential. ณ นีรา รีทรีท โฮเทล สามพราน ระหว่างวันที่ 19-20 มีนาคม 2569</p>
                        <a href="#" class="read-more">อ่านรายละเอียดเพิ่มเติม</a>
                    </div>
                </div>
            </div>

            <div class="news-row">

                <div class="news-card">
                    <div class="news-image">
                        <img src="https://scontent-bkk1-1.xx.fbcdn.net/v/t39.30808-6/655661822_1613297087049223_2758694381761646677_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=7b2446&_nc_ohc=fm3c7J58wskQ7kNvwE0uxZ4&_nc_oc=AdrgBv6BcBb3YaDp37kjjh-8T6FGoYp6qdFpkTzUsCIMRlXfF7nlRIv24prUGGHb7jE&_nc_zt=23&_nc_ht=scontent-bkk1-1.xx&_nc_gid=880Jf2F-nMynNULAjicnVw&_nc_ss=7b289&oh=00_Af3wcwLh1M6kKNPIHw-vuwmeoaf4s16cQxeBGViCLrlZeQ&oe=69F63BEC" alt="News">
                    </div>
                    <div class="news-detail">
                        <span class="news-category">กิจกรรม</span>
                        <span class="news-date">3 เมษายน 2569</span>
                        <h3>นิสิตชั้นปีที่ 4 สาขาวิชาสารสนเทศศึกษาได้เข้าร่วมกิจกรรมแข่งขันสร้างความตระหนักรู้ด้านคดีภัยออนไลน์</h3>
                        <p>เมื่อวันที่ 23 กุมภาพันธ์ 2569 ที่ผ่านมา นิสิตชั้นปีที่ 4 สาขาวิชาสารสนเทศศึกษาได้เข้าร่วมกิจกรรมแข่งขันสร้างความตระหนักรู้ด้านคดีภัยออนไลน์ (รอบชิงชนะเลิศ) Cyber Guar… </p>
                        <a href="#" class="read-more">อ่านต่อ</a>
                    </div>
                </div>

                <div class="news-card">
                    <div class="news-image">
                        <img src="https://scontent-bkk1-1.xx.fbcdn.net/v/t39.30808-6/652631956_1604029914180562_7990886178137577598_n.jpg?stp=dst-jpg_s590x590_tt6&_nc_cat=110&ccb=1-7&_nc_sid=13d280&_nc_ohc=PvXHeJ3SDVgQ7kNvwHV4fZR&_nc_oc=Adp0ec_ioWyI9cHSsDUKulcpRS3kb4Eh7J-ONvcs6jvLXqfkRunhfUDxb5Dfvly19M4&_nc_zt=23&_nc_ht=scontent-bkk1-1.xx&_nc_gid=Us6zds8qdVtdFnJ5dcUJag&_nc_ss=7b289&oh=00_Af0ZINpA37k9SXnFKVILq5X0gwWUEU5lZ9VM5DGtz-hsLQ&oe=69F635B6" alt="News">
                    </div>
                    <div class="news-detail">
                        <span class="news-category">กิจกรรม</span>
                        <span class="news-date">5 เมษายน 2569</span>
                        <h3>โครงการ “พัฒนาระบบสารสนเทศเพื่อการบริหารจัดการองค์กร”</h3>
                        <p>คณะมนุษยศาสตร์ มหาวิทยาลัยศรีนครินทรวิโรฒ จัดโครงการ “พัฒนาระบบสารสนเทศเพื่อการบริหารจัดการองค์กร” ณ ห้อง 38-0301 ชั้น 3 อาคาร 38 คณะมนุษยศา…</p>
                        <a href="#" class="read-more">อ่านต่อ</a>
                    </div>
                </div>

                <div class="news-card">
                    <div class="news-image">
                        <img src="https://scontent-bkk1-2.xx.fbcdn.net/v/t39.30808-6/652453358_1610459463999652_4284026356024296573_n.jpg?stp=dst-jpg_p552x414_tt6&_nc_cat=104&ccb=1-7&_nc_sid=13d280&_nc_ohc=e0tt21LhIPEQ7kNvwHEKS0j&_nc_oc=AdpjrbTR2d1HEDifizm2n91GagqgQSHvvva9-0pAQ14eZenT2dSZJhjuwquAfEAW0UA&_nc_zt=23&_nc_ht=scontent-bkk1-2.xx&_nc_gid=Us6zds8qdVtdFnJ5dcUJag&_nc_ss=7b289&oh=00_Af3sia7NLQqiU9gK1tPifRmQto4E-2ydIbZoMLixYsG0Rw&oe=69F6366E" alt="News">
                    </div>
                    <div class="news-detail">
                        <span class="news-category">กิจกรรม</span>
                        <span class="news-date">1 เมษายน 2569</span>
                        <h3>ทุนวิจัย Fundamental Fund (FF) ประจำปี 2569</h3>
                        <p>ทุนวิจัย Fundamental Fund (FF) ประจำปี 2569 ของคณาจารย์ประจำสาขาวิชาสารสนเทศศึกษา สังกัดกลุ่มสาขาวิชาพัฒนาศักยภาพมนุษย์ …</p>
                        <a href="#" class="read-more">อ่านต่อ</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>