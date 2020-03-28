<?php 
include '../../Apps/common/dbconnection.php';
include '../../Apps/model/feedbackmodel.php';
include '../common/session.php';
include '../../Apps/model/packagemodel.php';
include '../../Apps/model/itemmodel.php';
include '../../Apps/model/ordermodel.php';
include '../../Apps/model/paymentmodel.php';
$obpayment=new payment();
$obp=new package();
$order_id = $_REQUEST['order_id'];

//To take the user id of the particular person
$obo=new order();
$resultorder = $obo->viewAOrder($order_id);
$roworder=$resultorder->fetch(PDO::FETCH_BOTH);
$order_id=$roworder['order_id'];


$resultpack = $obp->viewAllPackageitems2($order_id);
$rowpack=$resultpack->fetchall();


$package_id=$rowpack[0];


  $resultpack1 = $obo->viewAllOrderItems($order_id);
  $noofitems=$resultpack1->rowCount();



  $resultpack2=$obo->viewAllPackagedetails($order_id);
  $noofitems=$resultpack1->rowCount();


// //to get the image of the package and name
// $rowpack1=$resultpack1->fetch(PDO::FETCH_BOTH);
// $package_id=$rowpack['package_id'];

// $resultimagepackage=$obp->viewAPackage($package_id);




$deliverydetails=$obo->getdeliverydetails($order_id);

$rowdeliverydetails=$deliverydetails->fetch(PDO::FETCH_BOTH);

$paymentdetails=$obpayment->selectpayment($order_id);

$rowpayment=$paymentdetails->fetch(PDO::FETCH_BOTH);
?>
<style type="text/css">/*font Awesome http://fontawesome.io*/
@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
/*Comment List styles*/
.comment-list .row {
  margin-bottom: 0px;
}
.comment-list .panel .panel-heading {
  padding: 4px 15px;
  position: absolute;
  border:none;
  /*Panel-heading border radius*/
  border-top-right-radius:0px;
  top: 1px;
}
.comment-list .panel .panel-heading.right {
  border-right-width: 0px;
  /*Panel-heading border radius*/
  border-top-left-radius:0px;
  right: 16px;
}
.comment-list .panel .panel-heading .panel-body {
  padding-top: 6px;
}
.comment-list figcaption {
  /*For wrapping text in thumbnail*/
  word-wrap: break-word;
}
/* Portrait tablets and medium desktops */
@media (min-width: 768px) {
  .comment-list .arrow:after, .comment-list .arrow:before {
    content: "";
    position: absolute;
    width: 0;
    height: 0;
    border-style: solid;
    border-color: transparent;
  }
  .comment-list .panel.arrow.left:after, .comment-list .panel.arrow.left:before {
    border-left: 0;
  }
  /*****Left Arrow*****/
  /*Outline effect style*/
  .comment-list .panel.arrow.left:before {
    left: 0px;
    top: 30px;
    /*Use boarder color of panel*/
    border-right-color: inherit;
    border-width: 16px;
  }
  /*Background color effect*/
  .comment-list .panel.arrow.left:after {
    left: 1px;
    top: 31px;
    /*Change for different outline color*/
    border-right-color: #FFFFFF;
    border-width: 15px;
  }
  /*****Right Arrow*****/
  /*Outline effect style*/
  .comment-list .panel.arrow.right:before {
    right: -16px;
    top: 30px;
    /*Use boarder color of panel*/
    border-left-color: inherit;
    border-width: 16px;
  }
  /*Background color effect*/
  .comment-list .panel.arrow.right:after {
    right: -14px;
    top: 31px;
    /*Change for different outline color*/
    border-left-color: #FFFFFF;
    border-width: 15px;
  }
}
.comment-list .comment-post {
  margin-top: 6px;
}</style>

<style type="text/css">
    
    a {
    text-decoration: none !important;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>

    <style type="text/css">
    
    .slider-item{
        border: 1px solid #E1E1E1;
        border-radius: 5px;
        background: #FFF;
    }
    .slider-item .slider-image img{
        margin: 0 auto;
        width: 100%;
    }
    .slider-item .slider-main-detail{
        padding: 10px;
        border-radius: 0 0 5px 5px;
    }
    .slider-item:hover .slider-main-detail{
        background-color: #dbeeee !important;
    }
    .slider-item .price{
        float: left;
        margin-top: 5px;
    }
    .slider-item .price h5{
        line-height: 20px;
        margin: 0;
    }
    .detail-price{
        color: #219FD1;
    }
    .slider-item .slider-main-detail .rating{
        color: #777;
    }
    .slider-item .rating{
        float: left;
        font-size: 17px;
        text-align: right;
        line-height: 52px;
        margin-bottom: 10px;
        height: 52px;
    }
    .slider-item .btn-add{
        width: 50%;
        float: left;
        border-right: 1px solid #E1E1E1;
    }
    .slider-item .btn-details{
        width: 50%;
        float: left;
    }
    .controls{
        margin-top: 20px;
    }
    .btn-info,.btn-info:visited,.btn-info:hover{
        background-color: #21BBD8;
        border-color: #21BBD8;
    }
    .btn-info{
        margin-left:5px;
    }
    .slider-main-detail:hover{
        background-color: #dbeeee !important;
    }
    .AddCart{
        margin: 0px;
        padding:5px;
        border-radius:2px;
        margin-right:10px;
    }
    .review {
        margin-bottom: 5px;
        padding-top:5px;
    }

</style>

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

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="../../Apps/js/iziToast.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="../../Apps/css/iziToast.min.css">

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
            <h4>ORDER DETAILS</h4>
            <a href="#">Home</a>
            <a class="active" href="../view/vieworderdetails.php">Order Details</a>
        </div>
    </div>
</section>
<!--================End Banner Area =================-->

<!--================Booking Table Area =================-->
<!--================End Our feature Area =================-->

<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>

<!-- ============================= -->

<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
<div class="container">
    <div class="row">
        <?php 
        if(isset($_GET['success'])){

          $success=$_GET['success'];

          if($success==1)

            echo "<script type='text/javascript'>iziToast.success({

              message: 'Item Added to Cart!',
          });</script>";
      }


      ?>
      <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                         <div style="text-align: center">
                        <?php
                        if(isset($_GET['msg'])){
                            $msg= base64_decode($_GET['msg']);
                                    if($_GET['id']==1){
                                        $style="alert-success";
                                    }else{
                                        $style="alert-danger";
                                    }
                                    echo "<span class='".$style."'>".$msg."</span>";
                        }
                        ?>
                        
                    </div>
             <div align="center"> <?php 
         if($package_id==""){
                                   $image="../../Apps/images/webpackage.jpg";//if an image does not exist view a default image 
                                 }else{
                                   $image="../../Apps/images/webpackage.jpg";//if the image exists view the particular image for the particular row
                                 }                ?>
                               <img src="<?php echo $image; ?>" width="450px" height="250px"/>
                           </div>
                           <div class="col-md-6">
                            &nbsp;


                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="row">
                          <div class="col-md-6" align="center">Order ID</div>
                          <div class="col-md-6">
                            <?php echo $roworder['order_id']; ?>
                        </div>
                    </div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="row">
                      <div class="col-md-6" align="center">Order Status</div>
                      <div class="col-md-6">
<?php if($roworder['order_status']=="Confirmed"){ ?>
                        <span class="label label-success">
                         <?php echo $roworder['order_status']; ?></span>

                       <?php }else{?>
 <span class="label label-danger">
                         <?php echo $roworder['order_status']; ?></span>

                       <?php }?>
                     </div>
                 </div>

                 <div class="clearfix">&nbsp;</div>
                 <div class="row">
                  <div class="col-md-6" align="center">Order Date</div>
                  <div class="col-md-6">
                    <?php echo $roworder['order_date']; ?>

                </div>
            </div>
            <div class="clearfix" >&nbsp;</div>
            <div class="row">
              <div class="col-md-6" align="center">Checkout Type</div>
              <div class="col-md-6">
                <?php echo $roworder['checkout_type']; ?>
            </div>

        </div>
        <div class="clearfix">&nbsp;</div>

        <div class="row">
          <div class="col-md-6" align="center">Total Payment</div>
          <div class="col-md-6">
             Rs <?php echo $rowpayment['total_amount'] ?>.00
         </div>
     </div>
             <div class="clearfix">&nbsp;</div>

        <div class="row">
          <div class="col-md-6" align="center">Discount</div>
          <div class="col-md-6">
             Rs <?php echo $rowpayment['discount'] ?>.00
         </div>
     </div>

                  <div class="clearfix">&nbsp;</div>

        <div class="row">
          <div class="col-md-6" align="center">Delivery Charges</div>
          <div class="col-md-6">
             Rs <?php echo $rowpayment['delivery_charges'] ?>.00
         </div>
     </div>
             <div class="clearfix">&nbsp;</div>

        <div class="row">
          <div class="col-md-6" align="center">Customer Name</div>
          <div class="col-md-6">
             <?php echo $roworder['cus_fname']." ".$roworder['cus_lname']; ?>
         </div>
     </div>
     <div class="clearfix">&nbsp;</div>
     <div class="row">
      <div class="col-md-6" align="center">Delivery Date</div>
      <div class="col-md-6">

        <?php if($rowdeliverydetails['delivery_date']!=""){ ?>
         <?php echo $rowdeliverydetails['delivery_date']; ?>

<?php }else{ ?>
      
      <p>Picked Up from Store</p>
      <?php } ?>  
     </div>
 </div>
  <div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>

      <div class="clearfix">&nbsp;</div>


<?php if($package_id==""){ ?>

      <table align="center" class="table table-hover">
        <thead class="table">
          <tr>
            <th style="height:40px"></th>
            <th style="height:40px">Item Name</th>
            <th style="height:40px">Item Price</th>
            <th style="height:40px">Item Quantity</th>
            <th style="height:40px">Item ID &nbsp;</th>
            <th></th>
            
            
          </tr>
        </thead>

        <tbody>
          <?php while($row=$resultpack1->fetch(PDO::FETCH_BOTH)) { 

           if($row['item_image']==""){
            $cimage="../../Apps/images/category.png";
          }else{
            $cimage="../../Apps/images/item_images/".$row['item_image'];
          }



          ?>

          <tr>
           <td style="height:45px"><img src="<?php echo $cimage;?>" height="60px" width="80px"></td>
           <td style="height:45px"><?php echo $row['item_name']; ?></td>
           <td style="height:45px"><?php echo $row['item_price']; ?></td>
           <td style="height:45px"><?php echo $row['item_quantity']; ?></td>
           <td style="height:45px"><?php echo $row['item_id']; ?></td>
           
           <td><a href="../view/item_feedback.php?item_id=<?php echo $row['item_id'];?>" target="blank"><button class="btn btn-info">Give a Feedback</button></a></td>




         </tr>
       <?php } ?>


     </tbody>
   </table>

<?php }else{ ?>

      <table align="center" class="table table-hover">
        <thead class="table">
          <tr>
            <th style="height:40px"></th>
            <th style="height:40px">Package Name</th>
            <th style="height:40px">Package Price</th>
            <th style="height:40px">Package Quantity</th>
            <th style="height:40px">Package ID &nbsp;</th>
            <th></th>
            
            
          </tr>
        </thead>

        <tbody>
          <?php while($row=$resultpack2->fetch(PDO::FETCH_BOTH)) { 


           if($row['package_image']==""){
            $cimage="../../Apps/images/webpackage.png";
          }else{
            $cimage="../../Apps/images/package_images/".$row['package_image'];
          }



          ?>

          <tr>
           <td style="height:45px"><img src="<?php echo $cimage;?>" height="60px" width="80px"></td>
           <td style="height:45px"><?php echo $row['package_name']; ?></td>
           <td style="height:45px"><?php echo $row['package_price']; ?></td>
           <td style="height:45px"><?php echo $row['package_quantity']; ?></td>
           <td style="height:45px"><?php echo $row['package_id']; ?></td>
           
           <td><a href="../view/viewpackage.php?package_id=<?php echo $row['package_id'];?>" target="blank"><button class="btn btn-info">View Package</button></a></td>




         </tr>
       <?php } ?>


     </tbody>
   </table>

 <?php }?>
 <div class="clearfix">&nbsp;</div>
 <div class="clearfix">&nbsp;</div>
   <input type="button" value="Go Back" onclick="history.back(-1)" class="btn btn-primary btn-md btn-block" />

</div>
</div>

</div>

<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>

</div>
</div>
</div>
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>


</div>


</div>

</div>

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