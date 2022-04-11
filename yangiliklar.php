<?php

require('backend/config.php');


try {
  $sql = "SELECT title, text, image FROM yangiliklar";
  $data = $conn->query($sql)->fetchAll();
} catch (PDOException $e) {
  echo $e->getMessage();
}

$conn = null;

?>


<!DOCTYPE html>
<html lang="uz">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>
    Yangiliklar - Yangiyo'l tumani 5-sonli Bolalar musiqa va san'at maktabi
  </title>
  <meta content="O'zbekiston Respublikasi Madaniyat Vazirligi Toshkent viloyati Madaniyat boshqarmasi tasarrufidagi Yangiyo'l tumani 5-sonli bolalar musiqa va san'at maktabi" name="description" />
  <meta content="maktabimda,maktab,maktabdagi raqslar,maktab uz,maktab sayti,maktab sahna ko'rinishlari,maktab sayt,maktabi sayti,maktab veb sayti,maktab web sayti" name="keywords" />

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon" />
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet" />
  <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto fs-6"><a href="/">yangiyol-5bmsm.uz</a></h1>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="/">Bosh sahifa</a></li>
          <!--          <li><a href="biz-haqimizda.html">Biz haqimizda</a></li>-->
          <li><a href="rahbariyat.html">Rahbariyat</a></li>
          <li><a href="galareya.html">Galareya</a></li>
          <li><a class="active" href="yangiliklar.php">Yangiliklar</a></li>

          <li class="dropdown">
            <a href="yonalishlar.html"><span>Yo'nalishlar</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="musiqa.html">Musiqa</a></li>
              <li><a href="sanat.html">San'at</a></li>
            </ul>
          </li>
          <li><a href="aloqa.html">Aloqa</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->

      <a href="qabul.php" class="get-started-btn">Qabul</a>
    </div>
  </header>
  <!-- End Header -->

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Yangiliklar</h2>
      </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <?php

          foreach ($data as $news) {
            echo "<div class='col-md-6 d-flex align-items-stretch'>
            <div class='card'>
              <div class='card-img'>
                <img src='/api/public/$news[2]' alt=''>
              </div>
            <div class='card-body'>
              <h5 class='card-title'><a href=''>$news[0]</a></h5>
              <!-- <p class='fst-italic text-center'>Sunday, September 26th at 7:00 pm</p> -->
              <p class='card-text'>$news[1]</p>
            </div>
          </div>
          </div>";
          }

          ?>
        </div>
      </div>
    </section>
    <!-- End Events Section -->
  </main>
  <!-- End #main -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
    document.addEventListener("DOMContentLoaded", async () => {
      const response = await fetch("/api/news");
      const {
        success,
        data
      } = await response.json();
      let app = "";

      data.forEach((news, index) => {
        app += `<div class="col-md-6 d-flex align-items-stretch">
        <div class="card">
          <div class="card-img">
            <img src="/api/public/${news.image}" alt="...">
          </div>
        <div class="card-body">
          <h5 class="card-title"><a href="">${news.title}</a></h5>
          <!-- <p class="fst-italic text-center">Sunday, September 26th at 7:00 pm</p> -->
          <p class="card-text">${news.text}</p>
        </div>
      </div>
      </div>`;
      });

      document.querySelector(".row").innerHTML = app;
    });
  </script>
</body>

</html>