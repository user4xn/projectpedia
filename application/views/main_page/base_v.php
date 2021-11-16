<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>ProjectPedia - Online Ebook Shop</title>

  <link rel="icon" href="<?= base_url('assets') ?>/images/just-logo.ico" type="image/x-icon" />
  
  <link rel="shortcut icon" href="<?= base_url('assets') ?>/images/just-logo.ico" type="image/x-icon" />

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
<style type="text/css">

/* PRELOADER CSS */
.page-loader{
  width: 100%;
  height: 100vh;
  position: fixed;
  background: rgba(255,255,255,1);
  z-index: 1000;
}

.txt{
    color: #666;
    text-align: center;
    top: 40%;
    position: relative;
    text-transform: uppercase;
    letter-spacing: 0.3rem;
    font-weight: bold;
    line-height: 1.5;
}

/* SPINNER ANIMATION */
.spinner {
  position: relative;
  top: 35%;
  width: 80px;
  height: 80px;
  margin: 0 auto;
  background-color: #111;

  border-radius: 100%;  
  -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
  animation: sk-scaleout 1.0s infinite ease-in-out;
}

@-webkit-keyframes sk-scaleout {
  0% { -webkit-transform: scale(0) }
  100% {
    -webkit-transform: scale(1.0);
    opacity: 0;
  }
}

@keyframes sk-scaleout {
  0% { 
    -webkit-transform: scale(0);
    transform: scale(0);
  } 100% {
    -webkit-transform: scale(1.0);
    transform: scale(1.0);
    opacity: 0;
  }
}
.overlay-login {
  position: absolute;
  background: rgba(0,0,0,0.7);
  height: 100%;
  width: 100%;
}
.loading-login {
  height: 0;
  width: 0;
  padding: 15px;
  border: 6px solid #ccc;
  border-right-color: #888;
  border-radius: 22px;
  -webkit-animation: rotate 1s infinite linear;
  /* left, top and position just for the demo! */
  position: absolute;
  left: 45%;
  top: 45%;
}

@-webkit-keyframes rotate {
  /* 100% keyframe for  clockwise. 
     use 0% instead for anticlockwise */
  100% {
    -webkit-transform: rotate(360deg);
  }
}
</style>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <div class="page-loader">
    <div class="spinner"></div>
    <div class="txt"><span class="text-primary">Loading</span><br>project pedia</span></div>
  </div>

  
  <header>

    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a href="<?= site_url('Main') ?>" class="navbar-brand">
          <img src="<?= site_url('assets/images/v-logo.jpg') ?>" style="max-height: 64px !important">
        </a>

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
            <?php if($this->session->userdata('nama') != null){ ?>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link m-1 dropdown-toggle" data-toggle="dropdown">Hi, <?= ucwords($this->session->userdata('nama')) ?></a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">My Ebook</a>
                    <a href="#" class="dropdown-item">Bookmarked Ebook</a>
                </div>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('Account/logout') ?>" class="nav-link m-1 mr-0 btn btn-outline-primary text-primary">Logout</a>
              </li>
            <?php }else{ ?>
              <li class="nav-item">
                <a href="<?= site_url('Account/register') ?>" class="nav-link m-1 btn btn-primary text-white">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link m-1 mr-0 btn btn-outline-primary text-primary" data-toggle="modal" data-target="#modalLoginForm">Login</a>
              </li>
            <?php } ?>
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

<!-- Modal -->
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="container">
          <div class="row">
            <div class="col-md-7 d-none d-md-block p-5 text-center" style="border-right: 1px solid #ccc"> 
               <img src="<?= base_url('assets/images/logo.jpeg') ?>">  
               <p class="subhead">Selamat Datang, Kembali!</p>
            </div>
            <div class="col-md-5 p-0">
              <div id="loaderLogin" class="overlay-login d-none">
                <div class="loading-login"></div>
              </div>
              <div class="p-5">
                  <div class="text-center h3 font-weight-bold mb-4">Masuk ke ProjectPedia.com</div>
                  <label>Email</label>
                  <input type="email" id="email" class="form-control">
                  <label>Password</label>
                  <input type="password" id="password" class="form-control">

                  <center><div class="badge badge-warning my-3 animated fadeIn animated-faster d-none" id="alertLogin">Username / Password Tidak Ditemukan!</div></center>

                  <span class="subhead mt-1">Belum memiliki akun ? <a href="<?= site_url('Account/register') ?>" class="text-primary">Daftar</a></span>
                  <button class="btn btn-outline-primary btn-block mt-2" id="loginBtn">
                    Submit
                    <span class="loader"></span>
                  </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalSubscribeForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="container">
          <div class="row">
            <div class="col-md-7 d-none d-md-block p-5 text-center" style="border-right: 1px solid #ccc"> 
               <img src="<?= base_url('assets/images/logo.jpeg') ?>">  
               <p class="subhead">Berlangganan untuk melanjutkan membaca. <br> Nikmati dokumen, buku, buku audio, dan banyak lagi lainnya tanpa batas </p>
            </div>
            <div class="col-md-5 p-0">
              <div id="loaderLogin" class="overlay-login d-none">
                <div class="loading-login"></div>
              </div>
              <div class="p-5">
                  <div class="text-center h3 font-weight-bold">Hanya Rp.70.000/Bulan</div>
                  <p class="text-center subhead">Batalkan kapan saja.</p>
                  <div class="card">
                    <div class="card-body">
                      <div class="AvailablePaymentMethods-module_innerContent__1xaHt">
                        <div class="mb-3 text-center">
                          <img src="https://static.xendit.co/logos/ovo-logo.svg">
                          <img src="https://static.xendit.co/logos/shopeepay-logo.svg">
                          <img src="https://static.xendit.co/logos/dana-logo.svg">
                          <img src="https://static.xendit.co/logos/linkaja-logo.svg">
                          <img src="https://static.xendit.co/logos/qris-logo.svg">
                          <img src="https://static.xendit.co/logos/kredivo-logo.svg"></div>
                        </div>
                    </div>
                  </div>
                  <button class="btn btn-outline-primary btn-block mt-2" id="paymentBtn">
                    Berlangganan Sekarang
                    <span class="loader"></span>
                  </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(window).on('load',function(){
  $('.page-loader').fadeOut(1000);
});
$(document).ready(function(){

  $('#loginBtn').on('click', function(){

    $('#loaderLogin').removeClass('d-none');
    var email = $('#email').val();
    var password = $('#password').val();

    $.ajax({
      url:'<?= site_url('Account/login_act') ?>',
      type: 'POST',
      data: {email:email, password:password},
      success: function(response){

        console.log(response);

        if(response){
          $('#loaderLogin').fadeOut(2000);
          window.location.href = '<?= site_url('Docs') ?>';
          console.log('top');
        }else{
          $('#loaderLogin').fadeOut(2000);
          $('#email').val('');
          $('#password').val('');
          $('#alertLogin').removeClass('d-none');
          console.log('bot');
        }

      },error: function(errorThrown){

        console.log(errorThrown);

      }
    });

  });

  $('#email').on('keyup', function(){
    $('#alertLogin').addClass('d-none');
  });

});
</script>