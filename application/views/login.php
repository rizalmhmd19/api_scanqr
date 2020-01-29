<!DOCTYPE html>
<html>
<head>
	<title>Login | QR Code</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?=base_url('assets/template/');?>images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/template/');?>vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/template/');?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/template/');?>vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/template/');?>vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/template/');?>vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/template/');?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/template/');?>css/main.css">
	<!--===============================================================================================-->

	<!--===============================================================================================-->	
	<script src="<?=base_url('assets/template/');?>vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?=base_url('assets/template/');?>vendor/bootstrap/js/popper.js"></script>
	<script src="<?=base_url('assets/template/');?>vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?=base_url('assets/template/');?>vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?=base_url('assets/template/');?>vendor/tilt/tilt.jquery.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?=base_url('assets/template/');?>js/main.js"></script>
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="text-center">
					<h2>Login</h2>
					<label>Scan Here!</label>
				</div>
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo base_url().'assets/images/'.$qr_code;?>" alt="QR-Code">
				</div>
				<div class="form-group col-sm-4">
					<form method="POST" id="myForm" action="<?=base_url('auth/active');?>">
						<label for="otp" class="text-center col-sm-12">Verification</label>
						<input type="password" name="otp" maxlength="5" id="otp" class="form-control text-center" placeholder="Code Verification">
						<button type="submit" class="text-center btn btn-primary mt-2" style="width: 100%">OK</button>
						<?php echo validation_errors(); ?>
					</form>
					<button type="button" class="btn btn-sm" data-toggle="modal" data-target="#exampleModal">Register</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal OTP -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-sm" role="document">
	    <div class="modal-content">
	      <div class="modal-body">
	        <form method="POST" id="register" action="<?=base_url('auth/register');?>">
	          <div class="form-group">
	            <label for="username" class="text-center col-form-label">Username</label>
	            <input type="text" name="username" placeholder="Username" class="text-center form-control" id="username" autofocus>
	          </div>
	          <div class="form-group">
	            <label for="email" class="text-center col-form-label">Email</label>
	            <input type="text" name="email" placeholder="Email" class="text-center form-control" id="email" autofocus>
	          </div>
	          <div class="form-group">
	            <label for="pass" class="text-center col-form-label">Password</label>
	            <input type="password" name="pass" placeholder="Password" class="text-center form-control" id="pass" autofocus>
	          </div>
	          <div class="form-group">
	            <label for="imei" class="text-center col-form-label">IMEI</label>
	            <input type="text" name="imei" placeholder="Password" class="text-center form-control" id="imei" autofocus>
	          </div>
	          <button type="submit" class="text-center btn btn-primary" style="width: 100%">OK</button>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>

</body>
</html>

<script type="text/javascript">
	var load;
	$('.js-tilt').tilt({
		scale: 1.1
	});

	$(document).ready(function(){
		// onReady();
		$('#otp').on('input', function (event) { 
			this.value = this.value.replace(/[^0-9]/g, '');
		});
	});
	function onLoad(){
		var url = "<?=site_url('auth/sign');?>";
		$.get(url,function(data,status){
			console.log(data);
		});
	}
	function onReady(){
		load = setInterval(onLoad,2000);
	}

	$("#myForm").submit(function(event){
	    event.preventDefault(); //prevent default action 
	    var post_url = $(this).attr("action"); //get form action url
	    var form_data = $(this).serialize(); //Encode form elements for submission
	    
	    $.post( post_url, form_data, function(response) {
	    	var res = JSON.parse(response);
	    //   console.log(res.data[0].is_login);
	      if(res.message == "Failed"){
			alert("Verification Code is Wrong!");
	      	window.location.href = '<?=base_url();?>';
			//   console.log("Gagal");
	      }else{
	      	window.location.href = '<?=site_url('dashboard');?>';
			//   console.log("Masuk");
	      }
	  });
	});
</script>