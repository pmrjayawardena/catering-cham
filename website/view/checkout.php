
<?php 

include '../../Apps/common/dbconnection.php';
include '../../Apps/model/provincemodel.php';
include '../../Apps/model/customermodel.php';
include '../common/sessionhandling.php';
include '../common/session.php';

$obpro=new province();
$resultprovinces=$obpro->displaypProvinces();

$cus_id =$cusinfo['cus_id'];//To take the user id of the particular person
$obc=new customer();
$resultcustomer = $obc->viewACustomer($cus_id); //to get the specific user details
$rowcustomer=$resultcustomer->fetch(PDO::FETCH_BOTH);

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
<?php if($noc){ 
  ?>


  <?php include_once('../common/firstheaderloggedin.php'); ?>

<?php }else{ ?> 

 <?php include_once('../common/firstheader.php'); ?> 

<?php }?>
<!--================End Footer Area =================-->

<!--================End Footer Area =================-->
<?php include_once('../common/mainheader.php'); ?>  
<!--================End Footer Area =================-->

<!--================Banner Area =================-->
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
<div class="container-fluid">
  <div class="page-header">
    <h1>Checkout <small>Step 2 of 3</small></h1>
  </div>
  <div class="row">
    <div class="col-xs-12">



      <h3>Deliver my order to&hellip;</h3>
      <div class="list-group">
        <div class="list-group-item">
          <div class="list-group-item-heading">          

          </div>
        </div>
        <div class="list-group-item">
          <div class="list-group-item-heading">          
            <div class="row">
              <div class="col-xs-3">
                <div class="radio">
                  <label>
                    <input type="radio" name="optionShipp" id="optionShipp2" value="option2" checked>
                    A new address
                  </label>
                </div>
              </div>
              <div class="col-xs-9">                      
                <form action="../controller/checkoutcontroller.php?action=checkout" method="post">
                  <div class="form-group">
                    <label for="inputname">First Name</label>
                    <input type="text" class="form-control form-control-large" id="cus_fname" name="cus_fname" value="<?php echo $rowcustomer['cus_fname']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="inputname">Last Name</label>
                    <input type="text" class="form-control form-control-large" id="cus_lname"  name="cus_lname" value="<?php echo $rowcustomer['cus_lname']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="inputAddress1">Email</label>
                    <input type="email" class="form-control form-control-large" id="cus_email"  name="cus_email" value="<?php echo $rowcustomer['cus_email']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="inputAddress2">Address</label>
                    <input type="text" class="form-control form-control-large" id="cus_add" name="cus_add" value="<?php echo $rowcustomer['cus_add']; ?>" required>
                  </div>
                  <div class="row">
                    <div class="col-xs-3">
                      <div class="form-group">
                        <label for="inputZip">Customer City</label>
                        <input type="text" class="form-control form-control-small" id="cus_city" name="cus_city" value="<?php echo $rowcustomer['name_en']; ?>" required>
                      </div>
                    </div>
                    <div class="col-xs-9">
                      <div class="form-group">
                        <label for="inputCity">Zip COde</label>
                        <input type="text" class="form-control" id="zip_code" name="zip_code" value="<?php echo $rowcustomer['zip_code']; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputAddress2">Telephone</label>
                    <input type="text" class="form-control form-control-large" id="cus_tel" name="cus_tel" value="<?php echo $rowcustomer['cus_tel']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="inputname">Delivery Date</label>
                    <input type="date" class="form-control form-control-large" id="delivery_date" min="<?php echo date('Y-m-d');?>" name="delivery_date" required>
                  </div>

                  <button class="btn btn-success" type="submit ">Save Address</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
if(isset($_POST["submit"]))
{

  ?>
  <script type="text/javascript">
    alert("click ok to transferring to you in paypal");

    setTimeout(function(){
     window.location="../view/paypal.php";
   },4000);

 </script>
 <?php


}


?>
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
 $(function() {
  $(document).ready(function () {

   var todaysDate = new Date(); // Gets today's date

    // Max date attribute is in "YYYY-MM-DD".  Need to format today's date accordingly
    
    var year = todaysDate.getFullYear(); 						// YYYY
    var month = ("0" + (todaysDate.getMonth() + 1)).slice(-2);	// MM
    var day = ("0" + todaysDate.getDate()).slice(-2);			// DD

   	var minDate = (year +"-"+ month +"-"+ day); // Results in "YYYY-MM-DD" for today's date 

    // Now to set the max date value for the calendar to be today's date
    $('.calendarDate input').attr('min',minDate);

  });
});     $(function () {
  $('input').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
});
</script>

</body>
</html>