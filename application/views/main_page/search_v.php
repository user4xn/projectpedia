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
        <form method="POST" action="<?= site_url('Docs/search') ?>">
          <input type="text" id="search" name="search" placeholder="Cari Disini ..." class="input form-control border-primary rounded-pill">
        </form>
      </div>
      <div class="col-md-4 py-3 text-md-right">
        <a href="#" id="open_category" class="btn btn-primary btn-block rounded-pill font-weight-bold">Kategori</a>
      </div>
    </div>

      <div class="h4 m-0 ml-1 text-dark mt-3 font-weight-bold">Hasil pencarian ..</div>
      <div class="row mt-1">
        <?php foreach($docArray as $indexData){?>
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
                          <div class="badge badge-danger"><?= strtoupper($indexData['label']) ?></div>
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
  })
</script>