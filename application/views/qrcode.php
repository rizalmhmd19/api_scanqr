<!DOCTYPE html>
<html>
<head>
	<title>Generate QR Code</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<div align="center">
		<span>Scan Here!</span>
		<br>
		<br>
		<img src="<?php echo base_url().'assets/images/'.$qr_code;?>">
	</div>
    <div class="center">
        <form method="POST" id="myForm" action="<?=base_url('login/active');?>">
            <input type="text" name="otp" placeholder="OTP">
            <button type="submit">Submit</button>
        </form>
    </div>

</body>
</html>
<script type="text/javascript">
    $("#myForm").submit(function(event){
    event.preventDefault(); //prevent default action 
    var post_url = $(this).attr("action"); //get form action url
    var form_data = $(this).serialize(); //Encode form elements for submission
    
    $.post( post_url, form_data, function(response) {
      var res = JSON.parse(response);
      if(res.data[0].is_login == 1){
        alert("Logging.....");
      }

    });
});
</script>
