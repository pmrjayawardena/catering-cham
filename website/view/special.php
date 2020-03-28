<?php 

session_start();
include '../../Apps/common/dbconnection.php';
include '../common/session.php';
include '../../Apps/model/offermodel.php';

$obo= new offer();

$resulto=$obo->displayAllOffersActive();

?>

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
<link rel="icon" type="image/png" href="../../Apps/images/icons/slweb.ico"/>
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>RedCaynne Re</title>

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
            <h4>SPECIAL OFFERS</h4>
            <a href="#">Home</a>
            <a class="active" href="../view/items.php">special</a>
        </div>
    </div>
</section>
<!--================End Banner Area =================-->

<!--================Booking Table Area =================-->
<!--================End Our feature Area =================-->

                             <?php while($row=$resulto->fetch(PDO::FETCH_BOTH)) { 


            if($row['offer_image']==""){
              $cimage="../../Apps/images/category.png";
            }else{
              $cimage="../../Apps/images/offer_images/".$row['offer_image'];
            }
            if($row['offer_status']== "Active"){
              $status=1;
              $sname="Deactivate";
              $style="danger";
            }  else {
              $status=0;
              $sname="Activate";
              $style="success";
            }

            ?>

            <div class="container ">
                

                    <div class="col-lg-8 col-md-offset-2 ">
                        <br>
                            <h2 align="center"><?php echo $row['offer_title'] ?></h2>
                            
                    <br>
                     
                      
                            <img src="<?php echo $cimage; ?>" alt="" width="700px" height="200px">
                           
                        <br>
                        <br>
                            <h4 align="center"><?php echo $row['offer_description'] ?></h4>
                              <hr>
                        </div>
                    </div>
                 

            </div>
        
<?php }?>

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