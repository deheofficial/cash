<script type="text/javascript">
	setTimeout(function() {
    $('#success').slideUp('slow');
	}, 3000); // <-- time in milliseconds
</script>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url() ?>assets/template_login/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/template_login/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/template_login/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/template_login/css/style.css">

    <link href="<?= base_url() ?>assets/cash_images/logo_kssb2.png" rel="shortcut icon">

    <title>CASH Management System</title>


    <script type="text/javascript">
function closeRefresh(){
  window.opener.location.reload();
  window.close();
  return false;
}
function closeddd(){
  
  window.close();
  return false;
}

function redirects(url){
  window.location.replace(url);
}
function openWin(urls) {
window.open(urls, "", "width=1000, height=600, scrollbars=yes, status=yes, resizable=yes, top=50, left=160");

}

function openWinRegister(urls) {
window.open(urls, "", "width=1000, height=1000, scrollbars=yes, status=yes, resizable=yes, top=50, left=160");

}

function closeWin() {
    myWindow.close();
} 


</script>
  </head>
  <body style="height: 80%;position:absolute; top:0; bottom:0; right:0; left:0;">
  

  <div class="d-lg-flex half" >
    <div class="bg order-1 order-md-2" style="background-image: url('<?= base_url() ?>assets/template_login/images/bg_2.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3><strong>Log in</strong> to your Account</h3>
            <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
            <br>

            <?php 	
				echo form_open('mainpage/login');?>
				
				
				<?php  if($error=="1"){
	        		?>
	        		
	        		<div class="alert alert-danger" id="success" align="left">
							Invalid Email or Password.
					</div>
					<?php } ?>

	        	

	        	<?php  if($error=="2"){
	        		?>
	        		<div class="alert alert-success" id="success" align="left">
							Your password has been successfully updated.
					</div>
					<?php } ?>

					<?php  if($error=="3"){
	        		?>
	        		<div class="alert alert-danger" id="success" align="left">
							Please log in to proceed.
					</div>
					<?php } ?>
					
					<?php  if($error=="4"){
	        		?>
	        		<div class="alert alert-danger" id="success" align="left">
							Your account has been temporarily suspended, Please contact administrator  !
					</div>
					<?php } ?>

              <div class="form-group first">
                <label for="username">Email</label>
                <input type="text" class="form-control" placeholder="Your Email" name="signin_username" id="username" autocomplete="off">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Your Password" name="signin_password" id="password" autocomplete="off">
              </div>
              
              <div class="d-flex mb-5 " style="text-align: right;">
              
                <span ><a onclick="openWin('<?php echo base_url()."index.php/mainpage/forgot/" ?>')" class="forgot-pass" style="cursor:pointer">Forgot password ?</a></span> 
              </div>

            
              <input type="submit" value="Log in" class="btn btn-block" style="background-color: #005aab; color:white">


          

            </form>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="<?= base_url() ?>assets/template_login/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url() ?>assets/template_login/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/template_login/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/template_login/js/main.js"></script>
  </body>
</html>
<style type="text/css">
.blink_me {
  animation: blinker 1s linear infinite;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}
</style>