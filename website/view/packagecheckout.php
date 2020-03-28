
<?php 
include '../../Apps/common/dbconnection.php';
include '../../Apps/model/provincemodel.php';
include '../../Apps/model/customermodel.php';
include '../common/sessionhandling.php';
include '../../Apps/model/offermodel.php';
include '../../Apps/model/checkoutmodel.php';
include '../../Apps/model/packagemodel.php';
include '../common/session.php';
$obc=new checkout();
$obo=new offer();
$obp=new package();


$package_quantity=$_POST['package_quantity'];
$package_id=$_POST['hidden_pid'];
$package_price=$_POST['hidden_pprice'];

$resultpackage=$obp->viewAPackage($package_id);

$rowpackage=$resultpackage->fetch(PDO::FETCH_BOTH);

$_SESSION["pay"]=$package_price;
$_SESSION["package_id"]=$package_id;
$_SESSION["package_qty"]=$package_quantity;

function getDiscount($package_price){

  if($package_price>=7000){

    return .10;
  }elseif ($package_price>=5000) {
    return .075;
  }elseif ($package_price>=1000) {
    return .05;
  }else{

    return 0;
  }
}
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
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" />
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css" rel="stylesheet" />

 <style type="text/css" media="screen">
 .dl-small {
  margin-bottom: 4px;
}

body {
  margin: 0 auto;
  padding: 1em;
  max-width: 800px;
}

.form-control {
  width: auto;
}

.form-control-small {
  width: 100px;
}

.form-control-large {
  width: 310px;
}
</style>
</head>

</head>

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

 <?php }?><!--================End Footer Area =================-->

 <!--================End Footer Area =================-->
 <?php include_once('../common/mainheader.php'); ?>  
 <!--================End Footer Area =================-->

 <div class="clearfix">&nbsp;</div>
 <div class="clearfix">&nbsp;</div>
 <div class="clearfix">&nbsp;</div>
 <div class="clearfix">&nbsp;</div>
 <div class="clearfix">&nbsp;</div>
 <div class="clearfix">&nbsp;</div>
 <div class="clearfix">&nbsp;</div>
 <div class="clearfix">&nbsp;</div>

 <body>



  <br/>

  <div>
    <div>

      <form action="../view/checkout.php" method="post">
        <table class="table">

          <tr>
            <td>
              <span class="quick_book_form_boot"> Package Name :&nbsp; <span class="book_data_span"><?php echo $rowpackage['package_name'];?></span><br/></span>
            </td>
            <td></td>
          </tr>

          <tr>
            <td>
              <span class="quick_book_form_boot"> Package Price:&nbsp;<span class="book_data_span">Rs.<?php echo $package_price;?></span> <span id="free" class="book_data_span"></span><br/></span>
              



            </td>
            <td></td>
          </tr> 
          <tr>
            <td>
              <span class="quick_book_form_boot"> Discount:&nbsp;<span class="book_data_span">

                Rs.<?php $discount=getDiscount($package_price);

                echo $dis=$package_price*$discount;

                $_SESSION["dis"]=$dis;

                ?>



              </span> <span id="free" class="book_data_span"></span><br/></span>
              



            </td>
            <td></td>
          </tr> 

          <tr>
            <td>
              <span class="quick_book_form_boot"> Total:&nbsp;<span class="book_data_span">Rs.<?php echo $totalpackagepay=$package_price-$dis;

              $_SESSION["pay"]=$totalpackagepay;


              ?></span> <span id="free" class="book_data_span"></span><br/></span>
              <br>
  <button type="submit" class="btn btn-success">Proceed</button>


            </td>
            <td></td>
          </tr>




          <tr>    

          </td>




        </tr>

        <tr>

        </tr>
      


      </form>
    </div>
  </div>



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

</body>
</html>