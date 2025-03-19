<!doctype html>
<html
  lang="en"
  class=" layout-menu-fixed layout-compact "
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
      <title>@yield('title')</title>
      <!-- Canonical SEO -->
        <meta name="description" content="Sneat Free is the best bootstrap 5 dashboard for responsive web apps. Streamline your app development process with ease." />
        <meta name="keywords" content="Sneat free dashboard, Sneat free bootstrap dashboard, free admin, free theme, open source, free, MIT license" />
        <meta property="og:title" content="Sneat Bootstrap Dashboard FREE by ThemeSelection" />
        <meta property="og:type" content="product" />
        <meta property="og:url" content="https://themeselection.com/item/sneat-dashboard-free-bootstrap/" />
        <meta property="og:image" content="https://themeselection.com/wp-content/uploads/edd/2022/07/sneat-bootstrap-html-free-smm-banner.png" />
        <meta property="og:description" content="Sneat Free is the best bootstrap 5 dashboard for responsive web apps. Streamline your app development process with ease." />
        <meta property="og:site_name" content="ThemeSelection" />
        <link rel="canonical" href="https://themeselection.com/item/sneat-dashboard-free-bootstrap/" />
      <!-- ? PROD Only: Google Tag Manager (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
      <script>
        (function (w, d, s, l, i) {
          w[l] = w[l] || [];
          w[l].push({ 'gtm.start': new Date().getTime(), event: 'gtm.js' });
          var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
          j.async = true;
          j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
          f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5DDHKGP');
      </script>
      <!-- End Google Tag Manager -->
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset ('assets/img/favicon/favicon.ico')}}" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset ('assets/vendor/fonts/iconify-icons.css')}}" />
    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->
    <link rel="stylesheet" href="{{asset ('assets/vendor/css/core.css')}}" />
    <link rel="stylesheet" href="{{asset ('assets/css/demo.css')}}" />
    <!-- Vendors CSS -->
      <link rel="stylesheet" href="{{asset ('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <!-- endbuild -->
    <link rel="stylesheet" href="{{asset ('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="{{asset ('assets/vendor/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
      <script src="{{asset ('assets/js/config.js')}}"></script>
  </head>
  <body>
      <!-- ?PROD Only: Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->
    <!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar  ">
  <div class="layout-container">
<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo ">
    <a href="index.html" class="app-brand-link">
      <span class="app-brand-text demo menu-text fw-bold ms-2">E-gapind</span>
    </a>
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="bx bx-chevron-left d-block d-xl-none align-middle"></i>
    </a>
  </div>
  <div class="menu-divider mt-0  "></div>
  <div class="menu-inner-shadow"></div>
  <ul class="menu-inner py-1">
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Admin</span></li>
    <li class="menu-item">
      <a href="{{route('dashboard')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-dashboard"></i>
        <div class="text-truncate" data-i18n="Basic">dashboard</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="javascript:void(0)" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-box"></i>
        <div class="text-truncate" data-i18n="User interface">Data Master</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{route('jurusanTable')}}" class="menu-link">
            <div class="text-truncate" data-i18n="Accordion">jurusan</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{route('siswaTable')}}" class="menu-link">
            <div class="text-truncate" data-i18n="Alerts">siswa</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{route('guruTable')}}" class="menu-link">
            <div class="text-truncate" data-i18n="Badges">guru</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{route('eskulTable')}}" class="menu-link">
            <div class="text-truncate" data-i18n="Buttons">ekstrakurikuler</div>
          </a>
        </li>
      </ul>
    </li>
    <li class="menu-item">
      <a href="javascript:void(0)" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-user-check"></i>
        <div class="text-truncate" data-i18n="Extended UI">kelola eskul</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{route('pendaftaranTable')}}" class="menu-link">
            <div class="text-truncate" data-i18n="Perfect Scrollbar">Pendaftaran</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{route('absensiTable')}}" class="menu-link">
            <div class="text-truncate" data-i18n="Text Divider">absensi</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="extended-ui-text-divider.html" class="menu-link">
            <div class="text-truncate" data-i18n="Text Divider">pemberian nilai</div>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</aside>
<!-- / Menu -->

    <!-- Layout container -->
    <div class="layout-page">

      
      <!-- Content wrapper -->
      <div class="content-wrapper">
        <!-- Content -->
@yield('content')
        <!-- /Content -->

<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
  <div class="container-xxl">
    <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
      <div class="mb-2 mb-md-0">
        ©
        <script>
          document.write(new Date().getFullYear());
        </script>
        , made by raxzFx
      </div>
      <div class="d-none d-lg-inline-block">
        <a href="https://themeselection.com/item/category/admin-templates/" target="_blank" class="footer-link me-4">Admin Templates</a>
          <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>        
        <a href="https://github.com/raxzfx" target="_blank" class="footer-link me-4">Documentation</a>     
          <a href="https://saweria.co/rasyanazra" target="_blank" class="footer-link">Support</a> 
      </div>
    </div>
  </div>
</footer>
<!-- / Footer --> 
        <div class="content-backdrop fade"></div>
      </div>
      <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
  </div>
  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
      <div class="buy-now">
        <a href="https://themeselection.com/item/sneat-dashboard-pro-bootstrap/" target="_blank" class="btn btn-danger btn-buy-now">raxzfx</a>
      </div>
    <!-- Core JS -->
      <script src="{{asset ('assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset ('assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset ('assets/vendor/js/bootstrap.js')}}"></script>
      <script src="{{asset ('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
      <script src="{{asset ('assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->
    <!-- Vendors JS -->
    <script src="{{asset ('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
    <!-- Main JS -->
      <script src="{{asset ('assets/js/main.js')}}"></script>
    <!-- Page JS -->
    <script src="{{asset ('assets/js/dashboards-analytics.js')}}"></script>
      <!-- Place this tag before closing body tag for github widget button. -->
      <script async defer src="https://buttons.github.io/buttons.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  </body>
</html>
