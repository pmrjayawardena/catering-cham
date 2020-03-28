<?php
session_start();
$cusInfo=$_SESSION['cusinfo'];//TO identify unique session ID


$session_id=$cusInfo[18];


include '../../Apps/common/dbconnection.php';
include '../../Apps/model/logmodel.php';
include '../common/session.php';
$obcuslog=new log();
$log_status='logout';
$obcuslog->updatecuslog($log_status, $session_id); 

unset( $_SESSION['cusinfo']);
unset( $_SESSION['sid']);
setcookie("shopping_cart", "", time() - 3600);
header("refresh:3,url=../view/index.php");//Redirection
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../img/express-favicon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>RedCaynne Re</title>
<link rel="icon" type="image/png" href="../../Apps/images/icons/slweb.ico"/>
        <!-- Icon css link -->
        <link href="../vendors/material-icon/css/materialdesignicons.min.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <link href="../vendors/linears-icon/style.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="../vendors/bootstrap-selector/bootstrap-select.css" rel="stylesheet">
        <link href="../vendors/bootatrap-date-time/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <link href="../vendors/owl-carousel/assets/owl.carousel.css" rel="stylesheet">
        
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/responsive.css" rel="stylesheet">

        <script src="../../Apps/sweetalert/sweetalert.min.js" ></script>
  <link rel="stylesheet" type="text/css" href="../../Apps/sweetalert/sweetalert.css">



<link rel="stylesheet" type="text/css" href="../../Apps/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../../Apps/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="../../Apps/assets/vendor/animate/animate.css">
<link rel="stylesheet" type="text/css" href="../../Apps/assets/vendor/css-hamburgers/hamburgers.min.css">
<link rel="stylesheet" type="text/css" href="../../Apps/assets/vendor/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="../../Apps/css/util.css">
<link rel="stylesheet" type="text/css" href="../../Apps/css/main.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
<div id="preloader">
            <div class="loader absolute-center">
                <div class="loader__box"><b class="top"></b></div>
                <div class="loader__box"><b class="top"></b></div>
                <div class="loader__box"><b class="top"></b></div>
            </div>
        </div>
       
        <!--================ Frist hader Area =================-->
   <?php if($noc){ 
        ?>

        
        <?php include_once('../common/firstheaderloggedin.php'); ?>

    <?php }else{ ?> 

       <?php include_once('../common/firstheader.php'); ?> 

   <?php }?> 
        <!--================End Footer Area =================-->
        
 <?php include_once('../common/mainheader.php'); ?>  
        <!--================End Footer Area =================-->
        
        <!--================Banner Area =================-->
        <section class="banner_area">
            <div class="container">
                <div class="banner_content">
                 <img src="../img/burger.png" width="150px" height="150px"/>
                </div>
            </div>
        </section>
        <!--================End Banner Area =================-->
        
        <!--================Booking Table Area =================-->
    <div id="main">
          <div id="heading">
              <div class="row">
                
              </div>
          </div>
          <div id="navi">
              <div class="row" >
                  <div class="col-md-4 col-sm-6 paddinga">
                      &nbsp;
                  </div>
                 
              </div>
              
          </div>
     
          <div id="contents">
              <div class="row" >
                 
                      </br>
                      <center>
                      <i><div class="alert alert-warning" >Successfully Logging out <img src="../img/logout.gif" width="150px" height="150px"/>  <a href="../view/login.php" class="">Login</a></div></i>
                      </br></br>
                    
                      </center>
                  </div>
                  <div>&nbsp;</div>
              </div>
          </div>
        <!--================End Booking Table Area =================-->
        
        <!--================End Recent Blog Area =================-->
        
        <!--================End Recent Blog Area =================-->
        
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="../js/jquery-2.1.4.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Extra plugin js -->
        <script src="../vendors/bootstrap-selector/bootstrap-select.js"></script>
        <script src="../vendors/bootatrap-date-time/bootstrap-datetimepicker.min.js"></script>
        <script src="../vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="../vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="../vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="../vendors/countdown/jquery.countdown.js"></script>
        <script src="../vendors/js-calender/zabuto_calendar.min.js"></script>
        
        <script src="../js/theme.js"></script>


          <script src="../assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="../../Apps/assets/vendor/bootstrap/js/popper.js"></script>
  <script src="../../Apps/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="../../Apps/assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="../../Apps/js/main.js"></script> 
 <script src="../../Apps/plugins/iCheck/icheck.min.js"></script>
   <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
        
    </body>
</html>