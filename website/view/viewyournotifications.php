<?php 


include '../../Apps/common/dbconnection.php';
include '../../Apps/model/customermodel.php';
 include '../../Apps/model/cusnotificationmodel.php';

include '../common/sessionhandling.php';

include '../common/session.php';




$cus_id=$cusinfo['cus_id'];

  $obn= new notification();
  $ru=$obn->viewallCusNotification();    
  $norn=$ru->rowCount(); 


$resultz=$obn->viewallNotificationbyCustomer($cus_id);





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
    
    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="../css/bootstrap-extend.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="../css/master_style.css">

    <!-- Crypto_Admin skins -->
    <link rel="stylesheet" href="../css/_all-skins.css">  

        <link rel="stylesheet" href="../css/bootstrap.min.css"> 
        <script src="../../Apps/js/iziToast.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="../../Apps/css/iziToast.min.css">

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


  <?php 
              if(isset($_GET['msg'])){

                $message=$_GET['msg'];

                if($message==4)

                  echo "<script type='text/javascript'>iziToast.success({

                    message: 'Successfully Changed Details!',
                  });</script>";
                }


                ?>

                  <?php 
              if(isset($_GET['msg'])){

                $message=$_GET['msg'];

                if($message==5)

                  echo "<script type='text/javascript'>iziToast.warning({
    title: 'Opps!',
    message: 'You forgot important data',
});</script>";
                }


                ?>
       
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
        <section class="banner_area">
            <div class="container">
                <div class="banner_content">
                    <h4>Welcome <?php echo $cusinfo['cus_fname']." ".$cusinfo['cus_lname']; ?></h4>
              
                </div>
            </div>
        </section>
        <!--================End Banner Area =================-->
        
        <!--================Booking Table Area =================-->


     <div class="row">
    <div class="col-4">
      <div class="card">
        <div class="card-body">

      <br>

       <h4 class="card-title" align="center">Your Notifications &nbsp; <i class="fas fa-file-export"></i></h4>
     <?php echo $rownot;?>
       <div class="table-responsive m-t-40">
        <table id="example231" class="table table-hover" cellspacing="0" width="50%"">
          <thead class="table-secondary">
            <tr>
              <th>&nbsp;</th>
              <th>Notification ID</th>
              <th>Date and Time</th>
              <th>Sent By</th>
              <th>Status</th>
              <th>&nbsp;</th>

            </tr>
          </thead>
          <tfoot class="table-active">
            <tr>
             <th>&nbsp;</th>
             <th>Notification ID</th>
             <th>Date and Time</th>
             <th>Sent By</th>
             <th>status</th>
             <th>&nbsp;</th>


           </tr>
         </tfoot>
         <tbody>
   <?php
           while ($rownot=$resultz->fetch(PDO::FETCH_BOTH)) {

if($rownot==0){

  echo "No data found";
}
            ?>
    
            <tr>
              <td></td>
              <td><?php echo $rownot['notification_id']; ?></td>
              <td><?php echo $rownot['notification_date']; ?></td>
              <td><?php echo $rownot['role_name']; ?></td>
              <td>


<?php if($rownot['notification_status']=="Seen"){ ?>
              <span class="label label-success">  <?php echo $rownot['notification_status']; ?></span>
<?php }else {?>

<span class="label label-danger">  <?php echo $rownot['notification_status']; ?></span>
<?php }?>
              <td>
                <a href="../view/viewnotification.php?notification_id=<?php echo $rownot['notification_id'];?>">
                <button type="button" class="btn btn-warning">View</button>
</a>

              </td>

            </tr>
      
  <?php } ?>

        </tbody>
      </table>
    </div>
  </div>
</div>
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

            <script src="../js/template.js"></script>
    
    <!-- Crypto_Admin for demo purposes -->
    <script src="../js/demo.js"></script>

        <script src="../js/jquery.min.js"></script>
    
    <!-- popper -->
    <script src="../js/popper.min.js"></script>

    
    <!-- SlimScroll -->
    <script src="../js/jquery.slimscroll.min.js"></script>
    
    <!-- FastClick -->
    <script src="../js/fastclick.js"></script>

<script src="../js/bootstrap.min.js"></script>

<script type="text/javascript" src="../js/validationcustomerprofile.js"></script>
        
    </body>
</html>