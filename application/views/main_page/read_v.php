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
<div class="page-banner bg-white">
  <div class="container h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-lg-12 h-100">
      	<img src="<?= base_url('assets') ?>/images/page-banner.png"  style="border: 1px solid #ccc; width:100%; height: 100% !important;">
      </div>
    </div>
  </div>
</div> <!-- .page-banner -->

<div class="page-section pt-4">
	<div class="container animated fadeIn animated-faster" id="menu_document" style="transition: ease 0.3s ;">
		<div class="col-12 p-0 pb-4">
	        <input type="text" id="search" name="search" placeholder="Cari Disini ..." class="input form-control border-primary rounded-pill">
	    </div>
	    <div class="row">
	    	<div class="col-12 col-lg-8 p-0 container-fixed">
				<div id="my_pdf_viewer">
					<div class="px-3">
						<blockquote class="blockquote text-left">
						  <p class="h3 mb-0"><?= $fetchDoc['judul'] ?></p>
						  <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
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
					<div class="container px-4">
						<div class="item text-center p-2 row d-flex h-100">
							<button class="btn btn-primary btn-sm ml-1">Download <i class="fas fa-download"></i></button> 
							<button class="btn btn-primary btn-sm ml-1"><i class="fas fa-bookmark"></i></button> 
							<div class="col text-white row justify-content-center align-self-center"><span>Jump to page :</span></div>
							<input class="col-5 input input-sm form-control" id="current_page" value="1" type="number"/>
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
	    			<div class="btn btn-block btn-primary">Daftar Member</div><br>
	    		<?php }else{ ?>		
	    			<div class="btn btn-block btn-primary">Beli Item Ini</div><br>
	    		<?php } ?>	
	    		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	    		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	    		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	    		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	    		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	    		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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
	    scale = 0.8,
	    canvas = document.getElementById('pdf_renderer'),
	    ctx = canvas.getContext('2d');

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
</script>