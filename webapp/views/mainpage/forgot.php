<!DOCTYPE html>


<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if IE 9]>         <html class="ie9 gt-ie8"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="gt-ie8 gt-ie9 not-ie"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>CASH Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <!-- Open Sans font from Google CDN -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Pixel Admin's stylesheets -->
    <link href="<?= base_url() ?>pixeladmin/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>pixeladmin/css/styles_structure.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>pixeladmin/css/pixel-admin.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>pixeladmin/css/widgets.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>pixeladmin/css/rtl.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>pixeladmin/css/themes.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>pixeladmin/css/fileinput/css/fileinput.min.css" rel="stylesheet" type="text/css" media="all" >
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/cash_images/logo_kssb2.png" rel="shortcut icon">


<!-- Get jQuery from Google CDN -->
<!--[if !IE]> -->
    <script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js">'+"<"+"/script>"); </script>
<!-- <![endif]-->
<!--[if lte IE 9]>
    <script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">'+"<"+"/script>"); </script>
<![endif]-->


<script>var init = [];</script>
<!-- Demo script --> 
<!-- <script src="<?= base_url() ?>pixeladmin/assets/demo/demo.js"></script>  -->
<!-- / Demo script -->

<!-- Pixel Admin's javascripts -->

<script src="<?= base_url() ?>pixeladmin/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>pixeladmin/js/pixel-admin.js"></script>
<!-- <script src="<?= base_url() ?>pixeladmin/js/pixel-admin2.js"></script> -->
<script type="text/javascript" src="<?= base_url() ?>pixeladmin/js/date.js"></script>
 <script type="text/javascript" src="<?= base_url() ?>pixeladmin/js/dca.js"></script> 
<script type="text/javascript" src="<?= base_url() ?>pixeladmin/js/javascript.js"></script>
<script type="text/javascript" src="<?= base_url() ?>pixeladmin/js/fileinput/js/fileinput.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
<!-- <script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.js"></script> -->



<!--<script type="text/javascript" src="<?= base_url() ?>pixeladmin/js/jquery-ui-extras.js"></script> -->


<script type="text/javascript">
    init.push(function () {
        // Javascript code here
    })
    window.PixelAdmin.start(init);
</script>





    <!--[if lt IE 9]>
        <script src="<?= base_url() ?>pixeladmin/js/ie.min.js"></script>
    <![endif]-->
</head>
	<body class="light-gray-bg">
    <br>
<?php echo form_open_multipart(base_url()."index.php/mainpage/random/"); ?>

		<div class="templatemo-content-container">
          
            
                       
              <div class="templatemo-content-widget white-bg">
                <br><br>             
                <h2>Forgot Password</h2>
                <br><br>
                    
                <p>To reset your password, enter the email address you use to sign in to Staff Tracking Management System </p>
                <br>
                      <div class="row form-group">
                        <div class="col-lg-3 col-md-3 form-group">            
                          <label for="email">Email address <font color='red' style="font-size:18px">&nbsp;*</font></label>
                          </div><div class="col-lg-5 col-md-5 form-group"> <input type="text" class="form-control" name="email" id="email" autocomplete="off" value="<?php echo set_value('email'); ?>" >                  
                          <?php echo form_error('email','<div style="color:red;display:inline">', '</div>'); ?>
                        </div>
                        
                      </div>

                       <div class="form-group" align="center">
                          
                          <button name="submit" type="submit" class="templatemo-blue-button">Submit</button>
                          
                      </div>

                </div>
        </div>


<?php echo form_close(); ?>
</body>
