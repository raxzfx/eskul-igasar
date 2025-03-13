<!doctype html>
<html
  lang="en"
  class=" layout-wide  customizer-hide"
  
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    
      <title>Login</title>
    

    
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
    
    <link rel="stylesheet" href="{{asset ("assets/vendor/css/core.css")}}" />
    <link rel="stylesheet" href="{{asset ("assets/css/demo.css")}}" />

    
    <!-- Vendors CSS -->
    
      <link rel="stylesheet" href="{{asset ("assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css")}}" />
    
    <!-- endbuild -->

    
    

    <!-- Page CSS -->
    <!-- Page -->
  <link rel="stylesheet" href="{{asset ('assets/vendor/css/pages/page-auth.css')}}" />

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
    
    <!-- Content -->

  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="card px-sm-6 px-0">
          <div class="card-body">
              <!-- Logo -->
<div class="app-brand justify-content-center mb-6 text-center">
    <a href="index.html" class="app-brand-link d-block">
      <img src="{{ asset('assets/img/logoIgasar.png') }}" alt="Logo IGASAR" width="120" class="mb-3">
      <span class="app-brand-text demo text-heading fw-bold d-block">Login</span>
    </a>
  </div>
            <!-- /Logo -->
            <h4 class="mb-1">Welcome to E-gapind</h4>
            <p class="mb-6">masukan no telpon dan password!</p>

            <form id="formAuthentication" class="mb-6" action="index.html">
              <div class="mb-6">
                <label for="email" class="form-label">No telpon</label>
                <input type="number" class="form-control" id="email" name="email-username" placeholder="masukan no telpon" autofocus />
              </div>
              <div class="mb-6 form-password-toggle">
                <label class="form-label" for="password">Password</label>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                </div>
              </div>
              <div class="mb-8">
                <div class="d-flex justify-content-between">
                  <div class="form-check mb-0">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                  <a href="auth-forgot-password-basic.html">
                    <span>Forgot Password?</span>
                  </a>
                </div>
              </div>
              <div class="mb-6">
                <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
              </div>
            </form>

            <p class="text-center">
              <span>belum memiliki akun?</span>
              <a href="auth-register-basic.html">
                <span>Daftar disini!</span>
              </a>
            </p>
          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>

<!-- / Content -->


    <!-- Core JS -->
    
    
      <script src="{{asset ('assets/vendor/libs/jquery/jquery.js')}}"></script>
    
    <script src="{{asset ('assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset ('assets/vendor/js/bootstrap.js')}}"></script>

    

    
      <script src="{{asset ('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
      
      <script src="{{asset ('assets/vendor/js/menu.js')}}"></script>
    
    <!-- endbuild -->

    <!-- Vendors JS -->
    
    

    <!-- Main JS -->
    
      <script src="{{asset ('assets/js/main.js')}}"></script>
    

    <!-- Page JS -->
    
    
    
      <!-- Place this tag before closing body tag for github widget button. -->
      <script async defer src="https://buttons.github.io/buttons.js"></script>
    
  </body>
</html>

  <!-- beautify ignore:end -->

