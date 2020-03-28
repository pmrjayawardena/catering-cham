<?php 

include '../../Apps/common/dbconnection.php';
include '../../Apps/model/customermodel.php';
include '../common/sessionhandling.php';
include '../common/session.php';
$cus_id=$cusinfo['cus_id'];
$obc= new customer();
$resultc=$obc->viewPurchaseHistory($cus_id);

$nor=$resultc->rowCount();
$nop =  ceil($nor/5);

if(!isset($_REQUEST['page']) || $_REQUEST['page']==1){
 $start=0;
 $page=1;

}else{
 $page=$_REQUEST['page'];
 $start=$page*5-1;
}
$limit=9;
$resultn=$obc->viewpurchaseLimited($cus_id,$start,$limit);


?>



<!DOCTYPE html>
<html lang="en">
<head>


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
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">



               <div class="alert alert-success"><b><h4 class="card-title" align="center">Your Purchase History &nbsp; <i class="fas fa-file-export"></i></h4></b></div>
               <?php echo $rownot;?>
               <div class="table-responsive m-t-40">
                <table id="example231" class="table table-hover" cellspacing="0" width="50%"">
                  <thead class="table-secondary">
                    <tr>
                      <th>&nbsp;</th>
                      <th>Order ID</th>
                      <th>Item Name / Package Name</th>
                      <th>Price</th>
                      
                      <th>&nbsp;</th>

                    </tr>
                  </thead>
                  <tfoot class="table-active">
                    <tr>
                     <th>&nbsp;</th>
                     <th>Order ID</th>
                     <th>Item Name / Package Name</th>
                     <th>Price</th>
                     
                     <th>&nbsp;</th>


                   </tr>
                 </tfoot>
                 <tbody>
                   <?php
                   while ($rownot=$resultn->fetch(PDO::FETCH_BOTH)) {

                    $order_id=$rownot['order_id'];

                    $resultz=$obc->viewPurchaseHistoryItems($order_id);

                    $rowi=$resultz->fetch(PDO::FETCH_BOTH);

                    $resultd=$obc->getDelivery1($order_id);

                    $rowd=$resultd->fetch(PDO::FETCH_BOTH);

                    
                    if($rowi['item_image']==""){
                                   $item_image="../../Apps/images/item.png";//if an image does not exist view a default image 
                                 }else{
                                   $item_image="../../Apps/images/item_images/".$rowi['item_image'];//if the image exists view the particular image for the particular row
                                 }     

                                 ?>

                                 <tr>
                                  <td></td>

                                  <td style="height:45px"><img src="<?php echo $item_image;?>" height="100px" width="120px"><br>

                                    Order ID : <?php echo $rownot['order_id']; ?><br>
                                    Order Date : <?php echo $rownot['order_date']; ?>



                                    <?php echo $rowd['delivery_status']; ?>
                                  </td>

                                  <td>
                                    <?php 

                                    $resultorderdetails=$obc->checkitemorpackagewebsite($order_id);

                                    $no=$resultorderdetails->rowCount();
                                    $getitemnames=$obc->viewPurchaseHistoryItems($order_id);
                                    $getpackagenames=$obc->viewPurchaseHistorypackage($order_id);
                                    if($no!=0){
                                      foreach($getitemnames as $keys => $values)
                                      {

                                       echo '-'.$values['item_name'].'<br>';
                                     }

                                   }else{

                                    foreach($getpackagenames as $keys => $values)
                                    {

                                     echo '-'.$values['package_name'].'<br>';
                                   }

                                 }

                                 ?>
                               </td>
                               <td>

                                Total Paid : Rs. <?php echo $rowd['total_amount']; ?><br>
                                Payment Date : <?php echo $rowd['payment_date']; ?>
                              </td>
                              

                              <td>
                               <a href="../view/vieworderdetails.php?order_id=<?php echo $rownot['order_id'];?>">
                                <button type="button" class="btn btn-info">View Order Details</button>
                              </a>

                              <?php if($no!=0){ ?>
                                <a href="../view/items.php">
                                  <button type="button" class="btn btn-warning">Order Another</button>
                                </a>
                              <?php }else{?>
                                <a href="../view/packages.php">
                                  <button type="button" class="btn btn-warning">Order Another</button>
                                </a>
                              <?php }?>
                            </td>

                          </tr>

                        <?php } ?>

                      </tbody>
                    </table>
                    <center>


                      <nav aria-label="Page navigation example">
                        <ul class="pagination">
                          <?php 
                          for($i=1; $i<=$nop; $i++) {
                            ?>
                            <li class="page-item"><a class="page-link" href="../view/viewpurchasehistory.php?page=<?php echo $i;?>"><?php echo $i; ?></a></li>
                          <?php } ?>
                        </ul>
                      </nav>
                    </center>
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