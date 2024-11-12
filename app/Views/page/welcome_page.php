<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SiUMKM</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="/img/logo.png" rel="icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/vendor/aos/aos.css" rel="stylesheet">
  <link href="/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="<?= base_url() ?>" class="logo d-flex align-items-center">
        <h1 class="sitename">SiUMKM</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#home" class="active">Home</a></li>
          <li><a href="#tentang">Tentang</a></li>
          <li><a href="#stats">Publikasi UMKM</a></li>
          <li><a href="<?= base_url('login') ?>">Login</a></li>
          <li><a href="<?= base_url('register') ?>">Daftar</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="home" class="hero section dark-background">
      <div class="container">
        <div class="row gy-4 justify-content-between">
          <div class="col-lg-4 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
            <img src="/img/logo.png" class="img-fluid animated" alt="">
          </div>

          <div class="col-lg-6  d-flex flex-column justify-content-center" data-aos="fade-in">
            <h1>Sistem Informasi UMKM <span>Kabupaten Tasikmalaya</span></h1>
            <p>Sistem untuk mempermudah dalam pengambilan keputusan UMKM</p>
            <div class="d-flex">
              <a href="<?= base_url('login') ?>" class="btn-get-started">Login</a>
              <a href="<?= base_url('register') ?>" class="btn-watch-video d-flex align-items-center"><span>Daftar</span></a>
            </div>
          </div>

        </div>
      </div>

      <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
          <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
        </defs>
        <g class="wave1">
          <use xlink:href="#wave-path" x="50" y="3"></use>
        </g>
        <g class="wave2">
          <use xlink:href="#wave-path" x="50" y="0"></use>
        </g>
        <g class="wave3">
          <use xlink:href="#wave-path" x="50" y="9"></use>
        </g>
      </svg>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="tentang" class="about section mb-5">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-xl-center gy-5">

          <div class="col-xl-5 content">
            <h3>Tentang</h3>
            <h2>Sistem Informasi UMKM Kabupaten Tasikmalaya</h2>
            <p>Sebuah aplikasi yang digunakan untuk melakukan managemen terhadap UMKM yang ada di kabupaten Tasikmalaya untuk mempermudah dalam melakukan pengambilan keputusan oleh pimpinan</p>
          </div>

          <div class="col-xl-7">
            <div class="row gy-4 icon-boxes">

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box">
                  <i class="bi bi-buildings"></i>
                  <h3>Pendataan UMKM</h3>
                  <p>Managemen data UMKM yang ada di Kabupaten Tasikmalaya</p>
                </div>
              </div> <!-- End Icon Box -->

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box">
                  <i class="bi bi-clipboard-pulse"></i>
                  <h3>Produk</h3>
                  <p>Produk yang dihasilkan atau dikelola oleh UMKM yang terdaftar</p>
                </div>
              </div> <!-- End Icon Box -->

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box">
                  <i class="bi bi-command"></i>
                  <h3>Akuntable</h3>
                  <p>Semua data dapat dipertanggungjawabkan dan asli kebenarannya</p>
                </div>
              </div> <!-- End Icon Box -->

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="icon-box">
                  <i class="bi bi-graph-up-arrow"></i>
                  <h3>Laporan</h3>
                  <p>Memberikan laporan bulanan dan tahunan untuk rekapitulasi UMKM</p>
                </div>
              </div> <!-- End Icon Box -->

            </div>
          </div>

        </div>
      </div>

    </section><!-- /About Section -->


      </div>

    </section><!-- /Features Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section light-background ">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

        <h1>Publikasi Data UMKM</h1>

          <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center">
            <i class="bi bi-shop"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="<?= $verif ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>UMKM Yang Terverifikasi</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center">
            <i class="bi bi-shop"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="<?= $nonverif ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>UMKM Yang Belum Terverifikasi</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center">
            <i class="bi bi-shop-window"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="<?= $total ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>UMKM Yang Terdaftar</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center">
            <i class="bi bi-basket"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="<?= $total_produk ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Produk UMKM</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Pricing Section -->

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-5">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">SiUMKM</span>
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
        </div>


      </div>
    </div>

    <div class="container copyright text-center mt-5">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">SiUMKM</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Make by <a href="">Anita Zahara</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/php-email-form/validate.js"></script>
  <script src="/vendor/aos/aos.js"></script>
  <script src="/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/vendor/purecounter/purecounter_vanilla.js"></script>


  <!-- Main JS File -->
  <script src="/js/main.js"></script>

</body>

</html>