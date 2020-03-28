
<?php 


include '../../Apps/common/dbconnection.php';
include '../../Apps/model/provincemodel.php';
include '../../Apps/model/customermodel.php';
include '../common/sessionhandling.php';
include '../../Apps/model/offermodel.php';
include '../../Apps/model/checkoutmodel.php';
include '../common/session.php';

include '../../Apps/model/distancemodel.php';
$obdistance=new distance();
$obc=new checkout();
$obo=new offer();

$resultoffer=$obo->getOfferStatusAndDistance();

$rowoffer=$resultoffer->fetch(PDO::FETCH_BOTH);

$dbstatus=$rowoffer['offer_status'];



$id=$_REQUEST['id'];
$pay=$_SESSION["pay"];

$checkoutdetails=$obc->viewaddressdetails($id);

$row=$checkoutdetails->fetch(PDO::FETCH_BOTH);


$destination=$row['cus_city'];
$origin="Nawagamuwa";

$api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$origin."&destinations=".$destination."&key=AIzaSyDQ_pJ2rpqt4NVTqk1dZlyIqqYqvi8kNUQ");
$data = json_decode($api);




$distance=((int)$data->rows[0]->elements[0]->distance->value / 1000); 

function getdeliveryfee($distance){



  if($distance<=6){

    return 0;
  }elseif ($distance<=11) {
    return 75;
  }elseif ($distance<=15) {
    return 150;
  }
}

// get the distance 1
$resultdistance1=$obdistance->checkdistance1();
$rowdistance1=$resultdistance1->fetch(PDO::FETCH_BOTH);

$to1=$rowdistance1['to_distance'];
$fee1=$rowdistance1['fee'];

// get the distance 2


$resultdistance2=$obdistance->checkdistance2();
$rowdistance2=$resultdistance2->fetch(PDO::FETCH_BOTH);

$to2=$rowdistance2['to_distance'];
$fee2=$rowdistance2['fee'];

//get distance 3
$resultdistance3=$obdistance->checkdistance3();
$rowdistance3=$resultdistance3->fetch(PDO::FETCH_BOTH);

$to3=$rowdistance3['to_distance'];
$fee3=$rowdistance3['fee'];


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
<?php echo $api;
print_r($rowdistance1);

echo $to3;
echo $fee3;

?>
      
        <table class="table">

          <tr>
            <td>
              <span class="quick_book_form_boot">    Customer name: &nbsp;<span class="book_data_span"> <?php echo $row['cus_fname']." ".$row['cus_lname']; ?></span><br/></span>
            </td>
            <td></td>
          </tr>
          <tr>
            <td>
              <span class="quick_book_form_boot">    Email: &nbsp; <span class="book_data_span"><?php echo $row['cus_email'];?></span> <br/></span>
            </td>
            <td>
              <span class="quick_book_form_boot">    Telephone:&nbsp;<span class="book_data_span"><?php echo $row['cus_tel'];?> </span><br/></span>
            </td>
          </tr>
          <tr>
            <td>
             <span class="quick_book_form_boot">   To:&nbsp;<span id="dest" class="book_data_span"><?php echo $destination;?></span><br/></span>
           </td>
           <td>

           </td>
         </tr>
         <tr>
          <td>
            <span class="quick_book_form_boot"> Delivery Date :&nbsp; <span class="book_data_span"><?php echo $row['delivery_date'];?></span><br/></span>
          </td>
          <td></td>
        </tr>

        <tr>
          <td>
            <span class="quick_book_form_boot">   Distance:&nbsp;<span id="dist" class="book_data_span"><?php echo ((int)$data->rows[0]->elements[0]->distance->value / 1000).' Km'; ?></span><br/></span>
          </td>
          <td>
            <span class="quick_book_form_boot">   Time:&nbsp;<span id="dist" class="book_data_span"><?php echo $data->rows[0]->elements[0]->duration->text; ?></span><br/></span>
          </td>


          <td></td>
        </tr>
        <tr>
          <td>
            <span class="quick_book_form_boot">   Order Fee:&nbsp;<span class="book_data_span">Rs.<?php echo $pay;?></span> <span id="free" class="book_data_span"></span><br/></span>


          </td>
          <td></td>
        </tr> 

        <tr>
          <td>
            <br>
            <?php if($distance>15){ ?>


              <span class="quick_book_form_boot alert alert-danger"> No Delivery Availble</span>
              <?php } else {?>  <br>
              <span class="quick_book_form_boot">   Delivery Charges:&nbsp;<span class="book_data_span"><?php 



              if($dbstatus=="Active"){
                $deliverycharge=getdeliveryfee($distance);

              }else{
                $deliverycharge=200;

              }

              if($deliverycharge==0){

                echo "Free Delivery";

              }else{
                echo Rs.$deliverycharge;

                $_SESSION["deliverycharge"]=$deliverycharge;
                ?></span> <span id="free" class="book_data_span"></span><br/></span>


              <?php }?>

            <?php }?>
          </td>
          <td></td>
        </tr>  

        <tr>
          <td>
            <span class="quick_book_form_boot">   Total Order Fee:&nbsp;<span class="book_data_span">Rs.<?php echo $totalfull=$pay+$deliverycharge;

            $_SESSION["fullamount"]=$totalfull;

            ?></span> <span id="free" class="book_data_span"></span><br/></span>


          </td>
          <td></td>
        </tr>  
        <tr>    

        </td>

        <td>
          <br>
          <br>
          <?php if($distance<15){ ?>


           <a href="../controller/checkoutcontroller.php?action=checkoutfinal"> <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</a>

 <a href="../view/payment_success.php"> <input type="image" src="../../Apps/images/cashondelivery.png"  width="150px" height="70px" /></a>
          <?php }else{?>
  <a href="../view/cart1.php"><button  class="btn btn-warning">Go back</button></a>
          <?php }?>
 
          </td>


        </tr>

      <tr>

      </tr>

    </table>





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