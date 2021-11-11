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

    <?php foreach ($getRandomCategory as $rcat){ 
      $getDoc = $this->db->query('SELECT document.id,judul,file,document.desc,jenis,harga,to_base64(thumbnail) as thumbnail64, created_at, label FROM document JOIN category ON document.id = category.id_document WHERE label = "'.$rcat['label'].'"')->result_array();;
    ?>
      <div class="h4 m-0 ml-1 text-dark mt-3 font-weight-bold"><?= $rcat['label'] ?></div>
      <div class="row mt-1 owl-carousel">
        <?php foreach ($getDoc as $theDoc) { ?>
          <div class="the-doc">
            <div class="p-1 recent-document bg-white">
                  <div class="row p-3">   
                    <div class="doc-item col-6 col-md-12">
                      <a href="<?= base_url('Docs/read/').md5($theDoc['id']).'/'.urlencode((str_replace(' ', '-', $theDoc['judul']))); ?>">
                        <img class="doc-img" src="data:image/png;base64,<?= $theDoc['thumbnail64'] ?>" alt="">
                      </a>
                    </div>

                    <div class="col-6 col-md-12">
                      <div class="subhead"> 
                        <?php if($theDoc['harga'] != '0'){ ?>
                          <div class="badge badge-warning">PREMIUM</div>
                        <?php }else{ ?>
                          <div class="badge badge-info">FREE</div>
                        <?php } ?>
                      </div>
                      <p class="font-weight-bold doc-title"><?= $theDoc['judul'] ?></p>
                      <div class="text-secondary block-ellipsis">
                         <?= $theDoc['desc'] ?>
                      </div>
                      <div class="mt-3 align-text-bottom text-right">
                        <div class="subhead float-left text-primary"> <?= $theDoc['jenis'] ?> </div>
                        <button class="btn btn-info btn-circle"><i class="mai-bookmark"></i></button>
                        <button class="btn btn-info btn-circle"><i class="mai-download"></i></button>
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

    $(".owl-carousel").owlCarousel({
        margin:10,
        loop:true,
        nav:true,
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
</script>