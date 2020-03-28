<?php 
session_start();
 include '../../Apps/model/provincemodel.php';
include '../../Apps/common/dbconnection.php';
include '../../Apps/model/customermodel.php';
include '../common/session.php';


 $obpro=new province();
 $resultprovinces=$obpro->displaypProvinces();
 $maxdate=date('Y-m-d', strtotime(' -18 year'));
 $maxdate=date('Y-m-d', strtotime(' -60 year'));

 $url=$_SERVER['HTTP_REFERER'];
 $_SESSION['url']=$url;

 // setcookie("shopping_cart", "", time() - 3600);
?>



<!DOCTYPE html>
<html lang="en">
    <head>


          <script>
   function displayDis(str) {
    var xhttp; 
    if (str == "") {
      document.getElementById("showdistrict").innerHTML = "";
      return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
     // document.getElementById("showFun").innerHTML = '<img src="../images/loading.gif" alt="Please Wait" />';
     if (this.readyState == 4 && this.status == 200) {
      document.getElementById("showdistrict").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "../../Apps/ajax/getDistrict.php?q="+str, true);
  xhttp.send();
}
function displayCities(str) {
  var xhttp; 
  if (str == "") {
    document.getElementById("showcity").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
     // document.getElementById("showFun").innerHTML = '<img src="../images/loading.gif" alt="Please Wait" />';
     if (this.readyState == 4 && this.status == 200) {
      document.getElementById("showcity").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "../../Apps/ajax/getCity.php?q="+str, true);
  xhttp.send();
}
</script>
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

        <?php if(isset($_GET['msg4'])){ 


 echo "<script type='text/javascript'> swal('Success!', 'Your Profile Created Successfully', 'success');</script>";

 
} ?>

<?php if(isset($_GET['msg5'])){ 


 echo "<script type='text/javascript'> swal('Opps!', 'Something went wrong ', 'error');</script>";

 
} ?>
       
       <div id="preloader">
            <div class="loader absolute-center">
                <div class="loader__box"><b class="top"></b></div>
                <div class="loader__box"><b class="top"></b></div>
                <div class="loader__box"><b class="top"></b></div>
            </div>
        </div>
       
        <!--================ Frist hader Area =================-->
<?php include_once('../common/firstheader.php'); ?>  
        <!--================End Footer Area =================-->
        
        <!--================End Footer Area =================-->
 <?php include_once('../common/mainheader.php'); ?>  
        <!--================End Footer Area =================-->
        
        <!--================Banner Area =================-->
        <section class="banner_area">
            <div class="container">
                <div class="banner_content">
                    <h4>Dont have an account?</h4>
                    <h3></h3>
                    <a class="active" href="../view/registercustomer.php">Register</a>
                </div>
            </div>
        </section>
        <!--================End Banner Area =================-->
        
        <!--================Booking Table Area =================-->

    <section class="booking_table_area booking_area_white">
            <div class="container">
             
             <div class="row">
        <div class="col-lg-8 col-md-offset-2">

          <div class="card">
            <div class="card-body">
<div class="card-body m-t-15">
 <form action="../controller/cuslogincontroller.php" method="post">

                <?php if(isset($_GET['msg'])){ ?>
        <div class="alert alert-danger" role="alert">
                <?php 
                    echo base64_decode($_GET['msg']);
                ?>
        </div>
        <?php } ?>                 
                             
            <div class="wrap-input100 validate-input m-b-10" >
               
                <label> Enter Username</label>
                <input name="cus_email" id="cus_email" type="txt" class="form-control" placeholder="Email">
                <span class="text-danger"></span>
            </div>   
 <div class="wrap-input100 validate-input m-b-10">
                <label> Enter Password</label>
               <input name="cus_pwd" id="cus_pwd" type="password" class="form-control" placeholder="Password">
                 <span class="text-danger"></span>
                
            </div>
        
                
                <div class="wrap-input100 validate-input m-b-10">
                                            <button class="login100-form-btn" name="insert" >
              Login
            </button>
             
            </div>
            <div class="text-center w-full p-t-25 p-b-230">
            <a href="../view/registercustomer.php" class="txt1">
              Dont Have an Account? Register Here
            </a>
          </div>  
                </div>

        </form>

            </div>
        </section>

        <!--================End Booking Table Area =================-->
        
        <!--================End Recent Blog Area =================-->
        <?php include_once('../common/mainfooter.php'); ?>  
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