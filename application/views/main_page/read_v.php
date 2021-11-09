<style> 
.doc-header{
	padding: 20px;
}
.floating{
  position:fixed;
  width:160px;
  height:60px;
  bottom:40px;
  right: 50vw;
  z-index: 9999999;
  background-color:#06C;
  color:#FFF;
  text-align:center;
  box-shadow: 2px 2px 3px #999;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"> </script>

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
	    	<div class="col-12 col-lg-8 p-0">
				<div id="my_pdf_viewer">
				<div class="px-3">
					<blockquote class="blockquote text-left">
					  <p class="h3 mb-0">Startup Accelerator Programmes: B Practice Guide</p>
					  <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
					</blockquote>

					<div>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</div>
					<div class="mt-3 align-text-bottom text-right">
	                   <div class="subhead float-left text-primary"> <span class="badge badge-primary">PDF</span> <span class="badge badge-warning">Premium</span></div>
	                   <span class="text-secondary ml-3">Like (378)</span>
	                   <button class="btn btn-info btn-circle"><i class="mai-thumbs-up"></i></button>
	                   <span class="text-secondary ml-3">Dislike (48)</span>
	                   <button class="btn btn-info btn-circle"><i class="mai-thumbs-down"></i></button>
	                </div>
				</div>
				<div id="navigation_controls" class="mt-3 px-2"> 
					<div class="d-flex justify-content-start bd-highlight mb-3 mt-2">
						<input class="input	input-sm form-control" id="current_page" value="1" type="number"/> 
						<button class="btn btn-outline-primary btn-sm ml-1" id="go_previous"><i class="fas fa-chevron-left"></i></button> 
						<button class="btn btn-outline-primary btn-sm ml-1" id="go_next"><i class="fas fa-chevron-right"></i></button> 
						<button class="btn btn-primary btn-sm ml-1" id="zoom_in"><i class="fas fa-bookmark"></i></button> 
						<button class="btn btn-primary btn-sm ml-1" id="zoom_out"><i class="fas fa-download"></i></button> 
					</div>
				</div>
					<div id="canvas_container" class="px-2"> 
						<canvas id="pdf_renderer" style="border: 1px solid #ccc;overflow: auto;width: 100% !important;"></canvas> 
					</div>  
				</div>
	    	</div>	
	    	<div class="col-12 col-lg-4">
	    		<div class="h2">Harga: Rp.67.000</div>
	    		<div class="subhead">*Harga diatas sudah termasuk PPN 10%</div>
	    		<div class="btn btn-block btn-primary">Beli Item Ini</div><br>
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
	var session = 2; 
	var myState = { pdf: null, currentPage: 1, zoom: 1.2 } 
	
	pdfjsLib.getDocument('<?= base_url() ?>/assets/doc/PEP Full.pdf').then((pdf) => {
		myState.pdf = pdf;
		render();
	});

	function render() { 
		myState.pdf.getPage(myState.currentPage).then((page) => { 
			var canvas = document.getElementById("pdf_renderer"); 
			var ctx = canvas.getContext('2d'); 
			var viewport = page.getViewport(myState.zoom); 
			canvas.width = viewport.width; 
			canvas.height = viewport.height; 
			page.render({ 
				canvasContext: ctx, 
				viewport: viewport 
			}); 
		}); 
	}

	document.getElementById('go_previous').addEventListener('click', (e) => { 
		if(myState.pdf == null || myState.currentPage == 1) 
		return; 
		myState.currentPage -= 1; 
		document.getElementById("current_page").value = myState.currentPage; 
		render(); 
	}); 

	document.getElementById('go_next').addEventListener('click', (e) => { 
		if(myState.pdf == null || myState.currentPage > myState.pdf._pdfInfo.numPages) 
		return;

		if(session === 1){
			myState.currentPage += 1; 
			document.getElementById("current_page").value = myState.currentPage; 
			render(); 
		}else{
			if(myState.currentPage < 3){
				myState.currentPage += 1; 
				document.getElementById("current_page").value = myState.currentPage; 
				render(); 	
			}else{
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Masuk Untuk Melanjutkan Membaca',
				  footer: 'Tidak punya akun? <a href=""> Daftar</a>'
				})
			}
		}
	}); 

	document.getElementById('current_page').addEventListener('keypress', (e) => { 
		if(myState.pdf == null) 
		return; // Get key code 
		var code = (e.keyCode ? e.keyCode : e.which); // If key code matches that of the Enter key 
		if(code == 13) 
			{ 
				var desiredPage = document.getElementById('current_page').valueAsNumber; 
				if(desiredPage >= 1 && desiredPage <= myState.pdf._pdfInfo.numPages) { 
					myState.currentPage = desiredPage; 
					document.getElementById("current_page").value = desiredPage; 
					render(); 
				} 
			} 
	}); 

	document.getElementById('zoom_in').addEventListener('click', (e) => { 
		if(myState.pdf == null) 
			return; 
		myState.zoom += 0.1; 
		render(); 
	}); 
	
	document.getElementById('zoom_out').addEventListener('click', (e) => { 
		if(myState.pdf == null) 
			return; 
		
		 	myState.zoom -= 0.1; 
		 	render(); 
		
	});
</script>