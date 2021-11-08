<div class="page-banner bg-white">
  <div class="container h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-lg-12 h-100">
      	<img src="<?= base_url('assets') ?>/images/page-banner.png"  style="border: 1px solid #ccc; width:100%">
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
        <a href="#" id="open_category" class="btn btn-primary rounded-pill font-weight-bold">MENU KATEGORI</a>
      </div>
    </div>
    <style type="text/css">
    	.doc-item{
    		height: 400px !important;
    	}
    </style>
    <div class="row mt-3">

    <?php for ($i=0; $i < 8; $i++) { ?>

      <div class="doc-item col-lg-3 col-md-4 col-xs-2 py-3 mb-3" style="height: 500px">
        <div class="recent-document ">
          <a href="#">
            <img src="<?= base_url('assets')?>/assets_main/img/portfolio/work-1.jpg" style="object-fit: cover;object-position: center;border: 1px solid #ccc" alt="">
          </a>
          <div class="subhead mt-3"> Dokumen </div>
          <p class="title-section t-overflow-elips">Startup Accelerator Programmes: B Practice Guide</p>
          <div class="subhead t-overflow-elips"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      	  </div>
          <div class="mt-2 text-right">
          	<div class="subhead float-left text-primary"> PDF </div>
          	<button class="btn btn-info btn-circle"><i class="mai-bookmark"></i></button>
          	<button class="btn btn-info btn-circle"><i class="mai-download"></i></button>
          </div>
        </div>
      </div>

    <?php } ?>
   
    </div>
  </div> <!-- .container -->
  
  <div class="container d-none pb-5" id="menu_category" style="transition: ease 0.3s ; min-height: 700px;">
    <div class="row align-items-center">
      <div class="col-md-8 py-3">
        <h2 class="title-section m-0">Kategori</h2>
      </div>
      <div class="col-md-4 py-3 text-md-right">
        <a href="#" id="close_category" class="btn btn-primary rounded-pill font-weight-bold">TUTUP MENU</a>
      </div>
    </div>
    <ul class="categories animated fadeIn animated-faster">
        <li><a href="#">Food <span>(12)</span></a></li>
        <li><a href="#">Travel <span>(22)</span></a></li>
        <li><a href="#">Lifestyle <span>(37)</span></a></li>
        <li><a href="#">Business <span>(42)</span></a></li>
        <li><a href="#">Adventure <span>(14)</span></a></li>
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