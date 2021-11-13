<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>ProjectPedia - Online Ebook Shop</title>

  <link rel="stylesheet" href="<?= base_url('assets'); ?>/assets_main/css/bootstrap.css">
  
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/assets_main/css/maicons.css">

  <link rel="stylesheet" href="<?= base_url('assets'); ?>/assets_main/vendor/animate/animate.css">

  <link rel="stylesheet" href="<?= base_url('assets'); ?>/assets_main/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="<?= base_url('assets'); ?>/assets_main/vendor/fancybox/css/jquery.fancybox.css">

  <link rel="stylesheet" href="<?= base_url('assets'); ?>/assets_main/css/theme.css">

  <!-- SCRIPT -->

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="<?= base_url('assets'); ?>/assets_main/js/jquery-3.5.1.min.js"></script>

  <script src="<?= base_url('assets'); ?>/assets_main/js/bootstrap.bundle.min.js"></script>

  <script src="<?= base_url('assets'); ?>/assets_main/vendor/owl-carousel/js/owl.carousel.min.js"></script>

  <script src="<?= base_url('assets'); ?>/assets_main/vendor/wow/wow.min.js"></script>

  <script src="<?= base_url('assets'); ?>/assets_main/vendor/fancybox/js/jquery.fancybox.min.js"></script>

  <script src="<?= base_url('assets'); ?>/assets_main/vendor/isotope/isotope.pkgd.min.js"></script>

  <script src="<?= base_url('assets'); ?>/assets_main/js/google-maps.js"></script>

  <script src="<?= base_url('assets'); ?>/assets_main/js/theme.js"></script>

</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>

    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a href="<?= site_url('Main') ?>" class="navbar-brand">Project<span class="text-primary">Pedia.</span></a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarContent">
          <ul class="navbar-nav ml-auto pt-3 pt-lg-0">
            <li class="nav-item <?= $isHere = ($page == 'home') ? 'active' : ''; ?>">
              <a href="<?= site_url('Main') ?>" class="nav-link m-1">Home</a>
            </li>
            <li class="nav-item <?= $isHere = ($page == 'docs') ? 'active' : ''; ?>">
              <a href="<?= site_url('Docs') ?>" class="nav-link m-1">Document</a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('Register') ?>" class="nav-link m-1 btn btn-primary text-white">Register</a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('Login') ?>" class="nav-link m-1 mr-0 btn btn-outline-primary text-primary">Login</a>
            </li>
          </ul>
        </div>
      </div> <!-- .container -->
    </nav> <!-- .navbar -->
  </header>

  <main>

    <?= $konten ?>

  </main>

  <footer class="page-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 py-3">
          <h3>Project<span class="fg-primary">Pedia.</span></h3>
        </div>
        <div class="col-lg-3 py-3">
          <h5>Contact Information</h5>
          <p>301 The Greenhouse, Custard Factory, London, E2 8DY.</p>
          <p>Email: example@mail.com</p>
          <p>Phone: +00 112323980</p>
        </div>
        <div class="col-lg-3 py-3">
          <h5>Company</h5>
          <ul class="footer-menu">
            <li><a href="#">Career</a></li>
            <li><a href="#">Resources</a></li>
            <li><a href="#">News & Feed</a></li>
          </ul>
        </div>
        <div class="col-lg-3 py-3">
          <h5>Newsletter</h5>
          <form action="#">
            <input type="text" class="form-control" placeholder="Enter your email">
            <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>
          </form>
        </div>
      </div>

      <hr>

      <div class="row mt-4">
        <div class="col-md-6">
          <p>Copyright 2021. All Rights Reserved. <script type="text/javascript"></script><a href="https://ProjectPedia.com">ProjectPedia</a></p>
        </div>
        <div class="col-md-6 text-right">
          <div class="sosmed-button">
            <a href="#"><span class="mai-logo-facebook-f"></span></a>
            <a href="#"><span class="mai-logo-twitter"></span></a>
            <a href="#"><span class="mai-logo-youtube"></span></a>
            <a href="#"><span class="mai-logo-linkedin"></span></a>
          </div>
        </div>
      </div>
    </div>
  </footer>

</body>
</html>