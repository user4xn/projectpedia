<div class="page-banner home-banner m-0" style="background-image: url('<?= base_url('assets/images/bookshelf.jpg') ?>')">
 <div class="row align-items-center py-4 justify-content-center h-100 w-100 m-0 bg-primary-transparent">
        <div class="col-lg-7 my-0">
            <div class="h1 mb-4 font-weight-bold text-white w-50 d-none d-md-block d-lg-block d-xl-block">e-Book dan dokumen untuk kebutuhan riset Anda!</div>

            <!-- MOBILE VER -->
            <div class="h1 mb-4 font-weight-bold text-white d-block d-sm-none">e-Book dan dokumen untuk kebutuhan riset Anda!</div>
            <!-- MOBILE VER -->
            <div class="h4 subhead text-white">baca kapan saja dan dimana saja dengan mudah.</div>

            <a href="#" class="btn btn-light btn-block mt-3 w-50 font-weight-bold d-none d-md-block d-lg-block d-xl-block" data-toggle="modal" data-target="#modalLoginForm">COBA 30 HARI GRATIS</a>

            <!-- MOBILE VER -->
            <a href="#" class="btn btn-light btn-block mt-3 font-weight-bold d-block d-sm-none" data-toggle="modal" data-target="#modalLoginForm">COBA 30 HARI GRATIS</a>
            <!-- MOBILE VER -->
            
            <div class="subhead text-white"> Hanya dengan Rp.50.000/Bulan, batalkan kapan saja </div>
        </div>
    </div>
</div> <!-- .page-banner -->

<div class="page-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 py-3">
        <div class="subhead">About Us</div>
        <h2 class="title-section">Kami Adalah <span class="fg-primary">Website Penyedia</span> semua kebutuhan ebook dan dokumen Anda!</h2>

        <p>Ebook, panduan, dan manual cara kerja kami yang terperinci mencakup topik-topik yang relevan dengan dunia yang bergerak cepat saat ini.</p>

        <a href="<?= site_url('Docs') ?>" class="btn btn-primary mt-4">Mulai Membaca!</a>
      </div>
      <div class="col-lg-6 py-3">
        <div class="about-img">
          <img src="<?= base_url('assets')?>/assets_main/img/about.jpg" alt="">
        </div>
      </div>
    </div>
  </div>
</div> <!-- .page-section -->

<div class="page-section">
  <div class="container">
    <div class="text-center">
      <h2 class="title-section mb-0">Berlangganan</h2>
      <div class="subhead mb-4">Untuk Semua Akses eBook dan Dokumen</div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-4 col-xl-3 py-3 mb-3">
        <div class="text-center">
          <div class="img-fluid mb-4">
            <i class="h1 text-primary far fa-bookmark"></i>
          </div>
          <h5>Buku</h5>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 col-xl-3 py-3 mb-3">
        <div class="text-center">
          <div class="img-fluid mb-4">
            <i class="h1 text-primary far fa-file-alt"></i>
          </div>
          <h5>Document</h5>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 col-xl-3 py-3 mb-3">
        <div class="text-center">
          <div class="img-fluid mb-4">
            <i class="h1 text-primary fas fa-book-open"></i>
          </div>
          <h5>Majalah</h5>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 col-xl-3 py-3 mb-3">
        <div class="text-center">
          <div class="img-fluid mb-4">
            <i class="h1 text-primary fas fa-cut"></i>
          </div>
          <h5>SnapShot</h5>
        </div>
      </div>
    </div>
  </div> <!-- .container -->
</div> <!-- .page-section -->

<div class="page-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-8 py-3">
        <h2 class="title-section m-0">Mencari dokumen yang sempurna?</h2>
      </div>
      <div class="col-md-4 py-3 text-md-right">
        <a href="<?= site_url('Docs') ?>" class="btn btn-outline-primary">Cari Dokumen <span class="mai-arrow-forward ml-2"></span></a>
      </div>
    </div>

    <div class="row mt-3">

      <div class="container animated fadeIn animated-faster" id="menu_document" style="transition: ease 0.3s ;">
        
          <div class="row mt-1">
            <?php foreach($getDocs as $indexData){?>
              <div class="col-md-3 the-doc">
                <div class="p-1 recent-document bg-white">
                      <div class="row p-3">   
                        <div class="doc-item col-6 col-md-12">
                          <a href="<?= base_url('Docs/read/').md5($indexData['id']).'/'.urlencode((str_replace(' ', '-', $indexData['judul']))); ?>">
                            <img class="doc-img" src="data:image/png;base64,<?= $indexData['thumbnail64']; ?>" alt="">
                          </a>
                        </div>

                        <div class="col-6 col-md-12">
                          <div class="subhead"> 
                            <?php if($indexData['harga'] != '0'){ ?>
                              <div class="badge badge-warning">PREMIUM</div>
                            <?php }else{ ?>
                              <div class="badge badge-info">FREE</div>
                            <?php } ?>
                          </div>
                          <p class="font-weight-bold doc-title"><?= $indexData['judul']; ?></p>
                          <div class="text-secondary block-ellipsis">
                             <?= $indexData['desc']; ?>
                          </div>
                          <div class="mt-3 align-text-bottom text-right">
                            <div class="subhead float-left text-primary"> <?= $indexData['jenis']; ?> </div>
                            <button class="btn btn-dark btn-sm btn-circle"><i class="fas fa-bookmark"></i></button>
                            <button class="btn btn-dark btn-sm btn-circle"><i class="fas fa-download"></i></button>
                          </div>
                        </div>
                      </div>
                </div>
              </div>
            <?php } ?> 
          </div> 

    </div>
  </div> <!-- .container -->
</div> <!-- .page-section -->