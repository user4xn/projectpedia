<style> 
.doc-header{
	padding: 20px;
}
.item{
	overflow: hidden;
  	background-color: #333;
}
</style>
<script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.10.377/build/pdf.min.js"> </script>
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

<div class="page-section pt-4">
	<div class="container animated fadeIn animated-faster" id="menu_document" style="transition: ease 0.3s ;">
		<div class="col-12 p-0 pb-4">
	       	<form method="POST" action="<?= site_url('Docs/search') ?>">
	          <input type="text" id="search" name="search" placeholder="Cari Disini ..." class="input form-control border-primary rounded-pill">
	        </form>
	    </div>
	    <div class="row">
	    	<div class="col-12 col-lg-8 p-0 container-fixed">
				<div id="my_pdf_viewer">
					<div class="px-3">
						<nav aria-label="breadcrumb">
						  <ol class="breadcrumb p-0 bg-white">
						    <li class="breadcrumb-item"><a class="text-primary" href="<?= site_url('Docs') ?>">Document</a></li>
						    <li class="breadcrumb-item active" aria-current="page"><?= $fetchDoc['judul'] ?></li>
						  </ol>
						</nav>
						<blockquote class="blockquote text-left">
						  <p class="h3 mb-0"><?= $fetchDoc['judul'] ?></p>
						  <footer class="blockquote-footer">Know everything with <cite title="Source Title">ProjectPedia</cite></footer>
						</blockquote>

						<div>
							<?= $fetchDoc['desc'] ?>
						</div>
						<div class="mt-3 align-text-bottom text-right">
		           <div class="subhead float-left text-primary">
		           	<span class="badge badge-primary"><?= $fetchDoc['jenis'] ?></span>
		           	  <?php if($fetchDoc['harga'] != '0'){ ?>
	                  <div class="badge badge-warning">PREMIUM</div>
	                <?php }else{ ?>
	                  <div class="badge badge-info">FREE</div>
	                <?php } ?>
		           </div>
		           <span class="text-secondary ml-3">Like (378)</span>
		           <button class="btn btn-info btn-circle"><i class="fas fa-thumbs-up"></i></button>
		           <span class="text-secondary ml-3">Dislike (48)</span>
		           <button class="btn btn-info btn-circle"><i class="fas fa-thumbs-down"></i></button>
		        </div>
					</div>
					<div id="navigation_controls" class="container mt-3 px-4"> 
						<div class="item text-center p-2 row">
							<button class="btn btn-primary btn-xs" id="go_previous">Prev</button> 
							<div class="col text-white">Page:<br> <span id="page_num"></span> / <span id="page_count"></span></div>
							<button class="btn btn-primary btn-xs" id="go_next">Next</button> 
						</div>
					</div>
					<div id="canvas_container" class="px-2"> 
						<canvas id="pdf_renderer" style="border: 1px solid #ccc;overflow: auto;width: 100% !important;"></canvas> 
					</div>
					<div class="container px-4 mb-4">
						<div class="item text-center p-2 row d-flex h-100">
							<button class="col-md-3 my-1 btn btn-primary ml-1">Download <i class="fas fa-download"></i></button> 
							<button class="col-md-2 my-1 btn btn-primary ml-1"><i class="fas fa-bookmark"></i></button> 
							<div class="col text-white row my-1 justify-content-center align-self-center"><span>Jump to page :</span></div>
							<input class="col-5 input my-1 form-control" id="goto_page" value="1" type="number"/>
						</div>
					</div>  
				</div>
	    	</div>	
	    	<div class="col-12 col-lg-4">
	    		<div class="h2">
	    		<?php if($fetchDoc['harga'] == '0'){ ?>
	    			Berlangganan Hanya Rp.70.000/Bulan
	    		<?php }else{ ?>		
	    			Harga: Rp.<?= number_format($fetchDoc['harga']) ?>
	    		<?php } ?>		
	    		</div>
	    		<div class="subhead">*Harga diatas sudah termasuk PPN 10%</div>
	    		<?php if($fetchDoc['harga'] == '0'){ ?>
	    			<div class="btn btn-block btn-primary"data-toggle="modal" data-target="#modalSubscribeForm">Daftar Member</div><br>
	    		<?php }else{ ?>		
	    			<div class="btn btn-block btn-primary" data-toggle="modal" data-target="<?php echo $this->session->userdata('login_status') != 'logged_in' ? '#modalLoginForm' : '#modalSubscribeForm'; ?>">Beli Item Ini</div><br>
	    		<?php } ?>	
	    		<div class="container row">
	    			<div class="h4 font-weight-bold">Dokumen Lainnya</div>
	    			<div class="col-md-12 p-0">
	    				<?php foreach($recentDocs as $rDoc){ ?>
	    				<hr>
	    				<div class="row p-3">   
                <div class="doc-item col-6 col-md-12">
                  <a href="<?= base_url('Docs/read/').md5($rDoc['id']).'/'.urlencode((str_replace(' ', '-', $rDoc['judul']))); ?>">
                    <img class="doc-img" src="data:image/png;base64,<?= $rDoc['thumbnail64']; ?>" alt="">
                  </a>
                </div>

                <div class="col-6 col-md-12">
                  <div class="subhead"> 
	    							<div class="badge badge-danger"> <?= $rDoc['jenis']; ?> </div>
                    <?php if($rDoc['harga'] != '0'){ ?>
                      <div class="badge badge-warning">PREMIUM</div>
                    <?php }else{ ?>
                      <div class="badge badge-info">FREE</div>
                    <?php } ?>
                  </div>
                  <p class="font-weight-bold doc-title"><?= $rDoc['judul']; ?></p>
                  <div class="text-secondary block-ellipsis">
                     <?= $rDoc['desc']; ?>
                  </div>
                </div>
              </div>
            	<?php } ?>
	    			</div>
	    		</div>
	    	</div>
		</div>
	</div>
</div>

<script>
	// If absolute URL from the remote server is provided, configure the CORS
	// header on that server.
	var url = '<?= base_url('assets/doc/').$fetchDoc['file'] ?>';

	// Loaded via <script> tag, create shortcut to access PDF.js exports.
	var pdfjsLib = window['pdfjs-dist/build/pdf'];

	var pdfDoc = null,
	    pageNum = 1,
	    pageRendering = false,
	    pageNumPending = null,
	    scale = 2,
	    canvas = document.getElementById('pdf_renderer'),
	    ctx = canvas.getContext('2d');

	var user_type = '<?= $this->session->userdata('tipe_user') ?>';

	var books_type = '<?= $fetchDoc['harga'] ?>';

	/**
	 * Get page info from document, resize canvas accordingly, and render page.
	 * @param num Page number.
	 */
	function renderPage(num) {
	  pageRendering = true;
	  // Using promise to fetch the page
	  pdfDoc.getPage(num).then(function(page) {
	    var viewport = page.getViewport({scale: scale});
	    canvas.height = viewport.height;
	    canvas.width = viewport.width;

	    // Render PDF page into canvas context
	    var renderContext = {
	      canvasContext: ctx,
	      viewport: viewport
	    };
	    var renderTask = page.render(renderContext);

	    // Wait for rendering to finish
	    renderTask.promise.then(function() {
	      pageRendering = false;
	      if (pageNumPending !== null) {
	        // New page rendering is pending
	        renderPage(pageNumPending);
	        pageNumPending = null;
	      }
	    });
	  });

	  // Update page counters
	  document.getElementById('page_num').textContent = num;
	}

	/**
	 * If another page rendering in progress, waits until the rendering is
	 * finised. Otherwise, executes rendering immediately.
	 */
	function queueRenderPage(num) {
	  if (pageRendering) {
	    pageNumPending = num;
	  } else {
	    renderPage(num);
	  }
	}

	/**
	 * Displays previous page.
	 */
	function onPrevPage() {
	  if (pageNum <= 1) {
	    return;
	  }
	  pageNum--;
	  queueRenderPage(pageNum);
	}
	document.getElementById('go_previous').addEventListener('click', onPrevPage);

	/**
	 * Displays next page.
	 */
	function onNextPage() {

	  if (pageNum >= pdfDoc.numPages) {
	    return;
	  }
	  pageNum++;
	  queueRenderPage(pageNum);

	}

	document.getElementById('go_next').addEventListener('click', onNextPage);

	/**
	 * Asynchronously downloads PDF.
	 */
	pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
	  pdfDoc = pdfDoc_;
	  document.getElementById('page_count').textContent = pdfDoc.numPages;

	  // Initial/first page rendering
	  renderPage(pageNum);
	});

	$('#goto_page').bind("enterKey",function(e){
		
		requestedPage = parseInt($(this).val());

   	queueRenderPage(requestedPage);

	});

	$('#goto_page').keyup(function(e){
    if(e.keyCode == 13)
    {
        $(this).trigger("enterKey");
    }
	});
</script>