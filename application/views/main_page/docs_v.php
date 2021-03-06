
<div class="container">
  <div class="row justify-content-center align-items-center">
    <div class="col-md-8 text-center text-md-left">
      <div class="h3 font-weight-bold">Soft Opening, Ayo Berlangganan!</div>
      <div>Akses buku dimana saja , kapan saja dengan mudah hanya dengan Rp.70.000/Bulan</div>
      <a href="#" class="btn btn-primary mt-3 font-weight-bold" data-toggle="modal" data-target="<?php echo $this->session->userdata('login_status') != 'logged_in' ? '#modalLoginForm' : '#modalSubscribeForm'; ?>">COBA 30 HARI GRATIS</a>
      <p class="mt-2">Batalkan kapan saja.</p>
    </div>
    <div class="col-md-4">
      <img src="<?= base_url('assets') ?>/images/adsbook.jpg" class="w-100">
    </div>
  </div>
</div>


<div class="page-section pt-0">

  <div class="container animated fadeIn animated-faster" id="menu_document" style="transition: ease 0.3s ;">
    <div class="row align-items-center">
      <div class="col-md-8 col-xs-4 py-3">
        <form method="POST" action="<?= site_url('Docs/search') ?>">
          <input type="text" id="search" name="search" placeholder="Cari Disini ..." class="input form-control border-primary rounded-pill">
        </form>
      </div>
      <div class="col-md-4 py-3 text-md-right">
        <a href="#" id="open_category" class="btn btn-primary btn-block rounded-pill font-weight-bold">Kategori</a>
      </div>
    </div>

    <?php $num = 0; foreach ($randCat as $category){ $num++;?>
      <div class="h4 m-0 ml-1 text-dark mt-3 font-weight-bold"><?= $category['label']; ?></div>
      <div class="row mt-1 owl-carousel" id="owl<?= $num  ?>">
        <?php foreach($docArray[$category['label']] as $indexData){?>
          <div class="the-doc">
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
                        <button class="btn btn-dark btn-circle"><i class="fas fa-bookmark"></i></button>
                        <button class="btn btn-dark btn-circle"><i class="fas fa-download"></i></button>
                      </div>
                    </div>
                  </div>
            </div>
          </div>
        <?php } ?>  
      </div>
    <?php } ?>

  </div> <!-- .container -->
  
  <div class="container d-none pb-5" id="menu_category" style="transition: ease 0.3s ; min-height: 700px;">
    <div class="row align-items-center">
      <div class="col-6 col-md-8 py-3">
        <h2 class="title-section m-0">Kategori</h2>
      </div>
      <div class="col-6 col-md-4 py-3 text-md-right">
        <a href="#" id="close_category" class="btn btn-primary btn-block rounded-pill font-weight-bold">Tutup</a>
      </div>
    </div>
    <ul class="mt-3 categories animated fadeIn animated-faster">
      <?php foreach ($categoryArray as $theCat) { ?>
        <li class="p-2"><a href="<?= site_url('Docs/search/').$theCat['label'] ?>"><?= $theCat['label'] ?> <span><?= $theCat['num_doc'] ?></span></a></li>
      <?php } ?>
    </ul>
  </div> <!-- .container -->

</div> <!-- .page-section -->

<script type="text/javascript">
	$(document).ready(function(){
		$('#open_category').on('click', function(evt){
			evt.preventDefault();
			$('#menu_document').addClass('d-none');
			$('#menu_category').removeClass('d-none');
		});

		$('#close_category').on('click', function(evt){
			evt.preventDefault();
			$('#menu_document').removeClass('d-none');
			$('#menu_category').addClass('d-none');
		});

    $("#owl1, #owl2, #owl3").each( function(){
        $(this).owlCarousel({
            margin:10,
            loop:true,
            autoplay: 3000,
            responsive : {
              // breakpoint from 0 up
              0 : {
                items : 1,
                
              },
              // breakpoint from 480 up
              480 : {
                items : 1,
              
              },
              // breakpoint from 768 up
              768 : {
                items : 3,
              },
              // breakpoint from 768 up
              1024 : {
                items : 4,
              }
            }
        });
    	});
  })
</script>