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

<!-- Demo script --> 
<!-- <script src="<?= base_url() ?>pixeladmin/pixeladmin/demo/demo.js"></script>  -->
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



<!--<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-extras.js"></script> -->







    <!--[if lt IE 9]>
        <script src="<?= base_url() ?>pixeladmin/js/ie.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
        $(document).ready(function(){
            //Handles menu drop down
            $("#sukses").delay(2500);
            $("#sukses").slideUp(1000); 

            $('.dropdown-menu').find('form').click(function (e) {
                e.stopPropagation();
            });
        });
    </script>


  <body class="light-gray-bg">
    <br>
<?php echo form_open_multipart(base_url()."index.php/mainpage/updatePass/".$uid); ?>

    <div class="templatemo-content-container">
          
            
                       
              <div class="templatemo-content-widget white-bg">
                <br><br>             
                <h2>Change Password</h2>
                <br><br>
                    
                <p style="color:red;"><b>It is recommended that passwords consist of at least six (6) characters and alphanumeric.</b></p><br>
                <!-- <input type="hidden" name="uid" value="<?=$uid?>"> -->

                      <div class="row form-group">
                        <div class="col-lg-2 col-md-2 form-group">            
                          <label for="email">Email address</label>
                          </div><div class="col-lg-5 col-md-5 form-group"> <input type="text" class="form-control" name="email" id="email" value="<?php echo getData("user_email","users","user_id",$uid) ?>" readonly>                  
                        </div>
                      </div>

                      <div class="row form-group">
                        <div class="col-lg-2 col-md-2 form-group">            
                          <label for="currpass">Current Password</label>
                          </div><div class="col-lg-5 col-md-5 form-group"> <input type="password" class="form-control" name="curr_pass" value="<?php echo $this->encrypt->decode(getData("user_pass","users","user_id",$uid)) ?>" readonly id="curr_pass">                   
                          <!-- <font id="error4" style="color:red"> Please Enter Current Password</font> -->
                        </div>
                      </div>

                      <div class="row form-group">
                        <div class="col-lg-2 col-md-2 form-group">            
                          <label for="newpass">New Password </label>
                          </div><div class="col-lg-5 col-md-5 form-group"><input type="password" class="form-control" name="newpass" id="newpass" onkeyup="CheckPasswordStrength(this.value)" >   
                          <span id="password_strength"></span>                
                          <!-- <font id="error5" style="color:red"> Please Enter New Password</font> -->
                        </div>
                      </div>

                      <div class="row form-group">
                        <div class="col-lg-2 col-md-2 form-group">            
                          <label for="pass2">Retype New Password </label>
                          </div><div class="col-lg-5 col-md-5 form-group"><input type="password" class="form-control" name="pass2" id="pass2" onblur="checkPass(this.value)">                   
                          <!-- <font id="error6" style="color:red"> Please Enter New Password</font> -->
                        </div>
                      </div>

                     <!--  <div class="row form-group">  
                    
                      <div class="col-lg-6 col-md-6 form-group">                  
                        <label for="location">Password <font size="1">(minimum 6 character,alphanumeric)</font><font color='red'>*</font><font id="error5" style="color:red"> Please enter Password</font></label>
                        <input type="password" class="form-control" name="pass" id="pass" onblur="chkpswd()">                  
                      </div> 
                      </div>-->

                      <div class="row form-group">
                        <div class="col-lg-7 col-md-7 form-group" align="right">
                          <button name="submit" type="submit" class="templatemo-blue-button">Submit</button>
                          
                        </div>
                      </div>

                       

                </div>
        </div>


<?php echo form_close(); ?>
</body>
<script type="text/javascript">

function chkpswd() {
    var str = document.getElementById('newpass').value;
    if (str.length < 3) {
        alert("Password is too short");
        // document.getElementById("newpass").focus();
        return false;
    } else if (str.length > 50) {
        alert("Password is too_long");
        // document.getElementById("newpass").focus();
        return false;
    } else if (str.search(/\d/) == -1 || str.search(/[a-zA-Z]/) == -1) {
        alert("Password must be alphanumeric");
        // document.getElementById("newpass").focus();
        return false;
    } 
    // alert("oukey!!");
    return ("ok");
}

function chkpass() {
    var str = document.getElementById('newpass').value;
    var str2 = document.getElementById('pass2').value;
    if (str2 != str) {
        alert("Password not match !");
        // document.getElementById("pass2").focus();
        return ("ok");
        // return false;
    }
    // alert("oukey!!");
    return ("ok");
}


function CheckPasswordStrength(password) {
        var password_strength = document.getElementById("password_strength");
    
        //TextBox left blank.
        if (password.length == 0) {
            password_strength.innerHTML = "";
            return;
        }

        else if (password.length < 6) {
            password_strength.innerHTML = "Password is too short";
            password_strength.style.color = "red";
            return;
        }



 
        //Regular Expressions.
        var regex = new Array();
        regex.push("[A-Z]"); //Uppercase Alphabet.
        regex.push("[a-z]"); //Lowercase Alphabet.
        regex.push("[0-9]"); //Digit.
        regex.push("[$@$!%*#?&]"); //Special Character.
 
        var passed = 0;
 
        //Validate for each Regular Expression.
        for (var i = 0; i < regex.length; i++) {
            if (new RegExp(regex[i]).test(password)) {
                passed++;
            }
        }
 
        //Validate for length of Password.
        if (passed > 2 && password.length > 8) {
            passed++;
        }
 
        //Display status.
        var color = "";
        var strength = "";
        switch (passed) {
            case 0:
            case 1:
                strength = "Weak";
                color = "red";
                break;
            case 2:
                strength = "Good";
                color = "darkorange";
                break;
            case 3:
            case 4:
                strength = "Strong";
                color = "green";
                break;
            case 5:
                strength = "Very Strong";
                color = "darkgreen";
                break;
        }
        password_strength.innerHTML = strength;
        password_strength.style.color = color;
    }

function checkPass(vals)
{
  var newpass = document.getElementById('newpass').value;
  if(newpass ==  vals)
  {
    return false;
  }
  else
  {
    alert("Password not match!");
    window.location.reload();
  }
}
</script>