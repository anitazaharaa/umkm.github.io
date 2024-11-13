<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/img/logo.png">
  <title>
    <?= $title ?>
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="/css/argon-dashboard.css?v=2.1.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-dark position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="/img/logo.png" width="30px" height="30px" class="navbar-brand-img h-100 mx-auto d-block" alt="main_logo">
        <span class="ms-1 font-weight-bold text-center d-block text-center">Sistem Informasi UMKM <br> Kabupaten Tasikmalaya</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link <?= ($navtitle == 'Dashboard') ? 'active' : '' ?>" href="/dashboard">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        <?php if ($role == 'administrator'): ?>
          <li class="nav-item">
            <a class="nav-link <?= ($navtitle == 'Kategori') ? 'active' : '' ?>" href="/kategori">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-tag text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Kategori</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($navtitle == 'Data UMKM') ? 'active' : '' ?>" href="/umkm">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-shop text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Data UMKM</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($navtitle == 'Produk UMKM') ? 'active' : '' ?>" href="/produk">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-app text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Produk UMKM</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($navtitle == 'Laporan UMKM') ? 'active' : '' ?>" href="/laporan">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-paper-diploma text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Laporan UMKM</span>
            </a>
          </li>
        <?php endif; ?>

        <?php if ($role == 'administrator'): ?>
          <li class="nav-item">
            <a class="nav-link <?= ($navtitle == 'User Management') ? 'active' : '' ?>" href="/users">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-world-2 text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">User Management</span>
            </a>
          </li>
        <?php endif; ?>

        <?php if ($role == 'pelaku_umkm'): ?>
        <li class="nav-item">
            <a class="nav-link <?= ($navtitle == 'Produk UMKM') ? 'active' : '' ?>" href="/produk">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-app text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Produk</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($navtitle == 'Pendapatan UMKM') ? 'active' : '' ?>" href="/pendapatan-umkm">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-paper-diploma text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Pendapatan UMKM</span>
            </a>
          </li>
          <?php endif; ?>
          
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account</h6>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($navtitle == 'Profile') ? 'active' : '' ?>" href="/profile">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="/logout">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-button-power text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Logout</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Home</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page"><?= $navtitle ?></li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0"><?= $navtitle ?></h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>           
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
     
    <?= $this->renderSection('content') ?>
      
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-12">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Anita Zahara</a>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  
  <!--   Core JS Files   -->
  <script src="/js/core/popper.min.js"></script>
  <script src="/js/core/bootstrap.min.js"></script>
  <script src="/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="/js/plugins/chartjs.min.js"></script>
  <?= $this->renderSection('chart') ?>
  <?= $this->renderSection('sweetalert') ?>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/js/argon-dashboard.min.js?v=2.1.0"></script>
</body>

</html>