<div class="page-banner bg-white">
  <div class="container h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-lg-12 h-100">
      	<img src="<?= base_url('assets') ?>/images/page-banner.png"  style="border: 1px solid #ccc; width:100%; height: 100% !important;">
      </div>
    </div>
  </div>
</div> <!-- .page-banner -->

<div class="page-section pt-0">

  <div class="container animated fadeIn animated-faster" id="menu_document" style="transition: ease 0.3s ;">
    <div class="row align-items-center">
      <div class="col-md-8 col-xs-4 py-3">
        <input type="text" id="search" name="search" placeholder="Cari Disini ..." class="input form-control border-primary rounded-pill">
      </div>
      <div class="col-md-4 py-3 text-md-right">
        <a href="#" id="open_category" class="btn btn-primary btn-block rounded-pill font-weight-bold">Kategori</a>
      </div>
    </div>
    <style type="text/css">
    	.doc-item{
    		height: 250px !important;
    	}
      .doc-img{
        height: 100%;object-fit: cover;
        object-position: center;
        border: 1px solid #ccc
      }
      .doc-title{
        line-height: 1;
      }
    </style>
    <div class="row mt-3">

    <?php for ($i=0; $i < 8; $i++) { ?>

      <div class="col-md-4 col-lg-3 py-3 mb-3">
        <div class="p-1 recent-document bg-white">
              <div class="row">   
                <div class="doc-item col-6 col-md-12">
                  <a href="<?= base_url('Docs/read') ?>">
                    <img class="doc-img" src="<?= base_url('assets')?>/assets_main/img/portfolio/work-1.jpg" alt="">
                  </a>
                </div>

                <div class="col-6 col-md-12">
                  <div class="subhead"> Dokumen </div>
                  <p class="font-weight-bold doc-title">Startup Accelerator Programmes: B Practice Guide</p>
                  <div class="text-secondary block-ellipsis">
                     Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                     tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                     quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                     consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                     cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                     proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  </div>
                  <div class="mt-3 align-text-bottom text-right">
                    <div class="subhead float-left text-primary"> PDF </div>
                    <button class="btn btn-info btn-circle"><i class="mai-bookmark"></i></button>
                    <button class="btn btn-info btn-circle"><i class="mai-download"></i></button>
                  </div>
                </div>
              </div>
        </div>
      </div>

    <?php } ?>
   
    </div>
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
        <li class="p-2"><a href="#">Food <span>(12)</span></a></li>
        <li class="p-2"><a href="#">Travel <span>(22)</span></a></li>
        <li class="p-2"><a href="#">Lifestyle <span>(37)</span></a></li>
        <li class="p-2"><a href="#">Business <span>(42)</span></a></li>
        <li class="p-2"><a href="#">Adventure <span>(14)</span></a></li>
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
	});
</script>