<style type="text/css">
	.primary-input{
		border: 0px;
		border-radius: 0px;
		border-bottom: 2px solid #d3b97e;
	}
	.big-h{
		font-size: 100px;
	}
</style>
<div class="page-section pt-0 mt-5">

<?php if($this->session->flashdata('status') != null){ ?>
  
  <div class="container h-100 animated fadeIn animated-faster mb-5" id="menu_document" style="transition: ease 0.3s ;">
    <div class="align-items-center text-center">
    	<div class="h1 font-weight-bold">Selamat!</div>
    	<div class="subhead">ProjectPedia.com</div>
    	<div class="far fa-check-circle animated rotateIn big-h text-primary my-5"></div>
    	<p class="subhead">Akun anda berhasil dibuat silahkan login untuk melanjutkan.</p>
    	<a href="<?= site_url('Docs') ?>" class="btn btn-primary font-weight-bold mt-4"> Mulai Jelajah!</a>
    </div>
  </div>

<?php }else{ ?>

  <div class="container h-100 animated fadeIn animated-faster" id="menu_document" style="transition: ease 0.3s ;">
    <div class="row align-items-center">
    	<div class="card col-md-8 m-auto p-4 py-5">
    		<div class=" text-center"> 
               <img src="<?= base_url('assets/images/logo.jpeg') ?>">  
               <p class="subhead">Register Member</p>
            </div>

            <div class="col-md-8 m-auto">

            	<form action="<?= site_url('Account/act_register') ?>" method="POST">

		    		<input type="text" name="name" class="form-control primary-input mt-3" placeholder="Nama">
		    		
		    		<input type="email" name="email" class="form-control primary-input mt-3" placeholder="Email">
		    		
		    		<input type="text" name="telp" class="form-control primary-input mt-3" placeholder="No.Handphone">
		    		
		    		<input type="password" name="password" class="form-control primary-input mt-3" id="pass1" placeholder="Password">
		    		
		    		<input type="password" name="confirm_password" class="form-control primary-input mt-3" id="pass2" placeholder="Masukan Kembali Password">


		    		<hr>

		    		<div class="alert alert-danger d-none animated fadeIn" id="alertMessage">Password tidak sesuai !</div>

		    		<input type="checkbox" name="terms" id="agreeCheck"> I Agree to the terms and conditions

		    		<input type="submit" id="submit_btn" name="submit" value="Submit" class="btn btn-primary btn-block mt-3 mb-5" disabled="">
	    		
            	</form>

            </div>
    	</div>
    </div>
  </div>

<?php } ?>

</div>


<script type="text/javascript">
	$(document).ready(function(){
		
			$('#agreeCheck').change(function() {
			    // this will contain a reference to the checkbox   
			    if (this.checked) {
			        // the checkbox is now checked 
					$('#submit_btn').removeAttr('disabled');
			    } else {
			        // the checkbox is now no longer checked
					$('#submit_btn').attr('disabled','true');
			    }
			});

			$('#pass2').on('keyup', function(){
				if($(this).val() != $('#pass1').val()){
					$('#alertMessage').removeClass('d-none');
				}else{
					$('#alertMessage').addClass('d-none');
				}
			});
		
	});
</script>