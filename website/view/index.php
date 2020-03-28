<?php 

// include '../../Apps/common/dbconnection.php';
// include '../../Apps/common/functions.php';
// include '../../Apps/model/categorymodel.php';
// include '../../Apps/model/itemmodel.php';
// include '../common/session.php';
// $obcat=new category;
// $resultc=$obcat->displayAllCategoryExceptmiscellaneous();


// $obitem=new item();

// $results=$obitem->viewAllItems();
// $result=$results->fetch(PDO::FETCH_BOTH);


// $connect = new PDO("mysql:host=localhost;dbname=ocs1", "root", "");

?>




<?php if(isset($_GET['msg4'])){ 


   echo "<script type='text/javascript'> swal('Success!', 'Your Profile Created Successfully', 'success');</script>";


} ?>

<?php if(isset($_GET['msg5'])){ 


   echo "<script type='text/javascript'> swal('Opps!', 'Something went wrong ', 'error');</script>";


} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../img/express-favicon.png" type="image/x-icon" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Southern Lanka Catering Service</title>
    <link rel="icon" type="image/png" href="../../Apps/images/icons/slweb.ico"/>
    <!-- Icon css link -->
    <link href="../vendors/material-icon/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../vendors/linears-icon/style.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Rev slider css -->
    <link href="../vendors/revolution/css/settings.css" rel="stylesheet">
    <link href="../vendors/revolution/css/layers.css" rel="stylesheet">
    <link href="../vendors/revolution/css/navigation.css" rel="stylesheet">

    <!-- Extra plugin css -->
    <link href="../vendors/bootstrap-selector/bootstrap-select.css" rel="stylesheet">
    <link href="../vendors/bootatrap-date-time/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="../vendors/owl-carousel/assets/owl.carousel.css" rel="stylesheet">

    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <script src="../../Apps/sweetalert/sweetalert.min.js" ></script>
    <link rel="stylesheet" type="text/css" href="../../Apps/sweetalert/sweetalert.css">
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

        <?php echo $rowcus; ?>
        <?php include_once('../common/firstheaderloggedin.php'); ?>

    <?php }else{ ?> 

       <?php include_once('../common/firstheader.php'); ?> 

   <?php }?>
   <!--================End Footer Area =================-->

   <!--================End Footer Area =================-->
   <?php include_once('../common/mainheader.php'); ?>  
   <!--================End Footer Area =================-->

   <!--================Slider Area =================-->
   <section class="slider_area">
    <div class=slider_inner>
        <div class="rev_slider fullwidthabanner"  data-version="5.3.0.2" id="home-slider">
            <ul> 
                <li data-slotamount="7" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="600" data-rotate="0" data-saveperformance="off">
                    <!-- MAIN IMAGE -->
                    <img src="../img/buffet1.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->

                    <!-- LAYER NR. 1 -->
                    <div class="slider_text_box">
                       <div class="tp-caption bg_box" 
                       data-width="none"
                       data-height="none"
                       data-whitespace="nowrap"
                       data-x="center" 
                       data-y="['350','350','300','250','0']"
                       data-fontsize="['55']" 
                       data-lineheight="['60']" 
                       data-transform_idle="o:1;"
                       data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power4.easeInOut;" 
                       data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                       data-mask_in="x:0px;y:0px;" 
                       data-mask_out="x:inherit;y:inherit;" 
                       data-start="2000" 
                       data-splitin="none" 
                       data-splitout="none" 
                       data-responsive_offset="on">
                   </div>
                   <div class="tp-caption first_text" 
                   data-x="center" 
                   data-y="center" 
                   data-voffset="['-20']"
                   data-Hoffset="['0']"
                   data-fontsize="['42','42','42','42','25']"
                   data-lineheight="['52','52','52','52','35']"
                   data-width="none"
                   data-height="none"
                   data-transform_idle="o:1;"
                   data-whitespace="nowrap"
                   data-transform_in="x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;" 
                   data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                   data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                   data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                   data-start="1000" 
                   data-splitin="none" 
                   data-splitout="none" 
                   data-responsive_offset="on" 
                   data-elementdelay="0.05" >Welcome To
               </div>
               <div class="tp-caption secand_text" 
               data-x="center" 
               data-y="center" 
               data-voffset="['45']"
               data-Hoffset="['0']"
               data-fontsize="['60']"
               data-lineheight="['80']"
               data-width="none"
               data-height="none"
               data-transform_idle="o:1;"
               data-whitespace="nowrap"
               data-transform_in="x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;" 
               data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
               data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
               data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
               data-start="1000" 
               data-splitin="none" 
               data-splitout="none" 
               data-responsive_offset="on" 
               data-elementdelay="0.05" >Southern Lanka
           </div>
           <div class="tp-caption third_text" 
           data-x="center" 
           data-y="center" 
           data-voffset="['100']"
           data-Hoffset="['0']"
           data-fontsize="['24','24','24','24','16']"
           data-lineheight="['34','34','34','34','26']"
           data-width="none"
           data-height="none"
           data-transform_idle="o:1;"
           data-whitespace="nowrap"
           data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
           data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
           data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
           data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
           data-start="1200" 
           data-splitin="none" 
           data-splitout="none" 
           data-responsive_offset="on" 
           data-elementdelay="0.05" >Catering Service
       </div>
       <div class="tp-caption btn_text" 
       data-x="center" 
       data-y="center" 
       data-voffset="['180']"
       data-Hoffset="['0']"
       data-fontsize="['16.75']"
       data-lineheight="['26']"
       data-width="none"
       data-height="none"
       data-transform_idle="o:1;"
       data-whitespace="nowrap"
       data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
       data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
       data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
       data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
       data-start="1200" 
       data-splitin="none" 
       data-splitout="none" 
       data-responsive_offset="on" 
       data-elementdelay="0.05" ><a class="submit_btn_bg" href="../view/items.php">Look Menu</a>
   </div>
</div>
</li>
<li data-slotamount="7" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="600" data-rotate="0" data-saveperformance="off">
    <!-- MAIN IMAGE -->
    <img src="../img/sandp.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
    <!-- LAYERS -->

    <!-- LAYER NR. 1 -->
    <div class="slider_text_box text_box2">
       <div class="tp-caption bg_box" 
       data-width="none"
       data-height="none"
       data-whitespace="nowrap"
       data-x="center" 
       data-y="['350','350','300','250']"
       data-fontsize="['55']" 
       data-lineheight="['60']" 
       data-transform_idle="o:1;"
       data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power4.easeInOut;" 
       data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
       data-mask_in="x:0px;y:0px;" 
       data-mask_out="x:inherit;y:inherit;" 
       data-start="2000" 
       data-splitin="none" 
       data-splitout="none" 
       data-responsive_offset="on">
   </div>
   <div class="tp-caption first_text" 
   data-x="center" 
   data-y="center" 
   data-voffset="['-20']"
   data-Hoffset="['0']"
   data-fontsize="['42','42','42','42','25']"
   data-lineheight="['52','52','52','52','35']"
   data-width="none"
   data-height="none"
   data-transform_idle="o:1;"
   data-whitespace="nowrap"
   data-transform_in="x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;" 
   data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
   data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
   data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
   data-start="1000" 
   data-splitin="none" 
   data-splitout="none" 
   data-responsive_offset="on" 
   data-elementdelay="0.05" >Welcome To 
</div>
<div class="tp-caption secand_text" 
data-x="center" 
data-y="center" 
data-voffset="['45']"
data-Hoffset="['0']"
data-fontsize="['60']"
data-lineheight="['80']"
data-width="none"
data-height="none"
data-transform_idle="o:1;"
data-whitespace="nowrap"
data-transform_in="x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;" 
data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
data-start="1000" 
data-splitin="none" 
data-splitout="none" 
data-responsive_offset="on" 
data-elementdelay="0.05" >Southern Lanka
</div>
<div class="tp-caption third_text" 
data-x="center" 
data-y="center" 
data-voffset="['100']"
data-Hoffset="['0']"
data-fontsize="['24','24','24','24','16']"
data-lineheight="['34','34','34','34','26']"
data-width="none"
data-height="none"
data-transform_idle="o:1;"
data-whitespace="nowrap"
data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
data-start="1200" 
data-splitin="none" 
data-splitout="none" 
data-responsive_offset="on" 
data-elementdelay="0.05" >Catering Service
</div>
<div class="tp-caption btn_text" 
data-x="center" 
data-y="center" 
data-voffset="['180']"
data-Hoffset="['0']"
data-fontsize="['16.75']"
data-lineheight="['26']"
data-width="none"
data-height="none"
data-transform_idle="o:1;"
data-whitespace="nowrap"
data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
data-start="1200" 
data-splitin="none" 
data-splitout="none" 
data-responsive_offset="on" 
data-elementdelay="0.05" ><a class="submit_btn_bg" href="../view/items.php">Look Menu</a>
</div>
</div>
</li>
</ul> 
</div><!-- END REVOLUTION SLIDER -->
</div>
</section>
<!--================End Slider Area =================-->

<?php if(isset($_GET['msg4'])){ 


   echo "<script type='text/javascript'> swal('Success!', 'Your Profile Created Successfully Please Log In', 'success');</script>";


} ?>

<?php if(isset($_GET['msg5'])){ 


   echo "<script type='text/javascript'> swal('Opps!', 'Something went wrong ', 'error');</script>";


} ?>
<!--================Our feature Area =================-->
<section class="our_feature_area">
    <div class="container">
        <div class="s_black_title">
            <h3>View Our Items</h3>
            <h2>Featured</h2>
        </div>
        <div class="feature_slider">
            <?php while($row=$resultc->fetch(PDO::FETCH_BOTH)) { 
              if($row['cat_image']==""){
                  $cimage="../../Apps/images/category.png";
              }else{
                  $cimage="../../Apps/images/cat_images/".$row['cat_image'];
              }
              ?>

              
              <div class="item">
                 <a class="read_mor_btn" href="../view/viewitems.php?cat_id=<?php echo $row['cat_id'];?>">View Items</a> 

                 <div class="feature_item">
                    <div class="feature_item_inner">
                        <img src="<?php echo $cimage;?>" height="300px" width="317px">

                    </div>
                    <div class="title_text">
                        <div class="feature_left"><a href="table.html"><span><?php echo $row['cat_name'];?></span></a></div>
                        <div class="restaurant_feature_dots"></div>
                        <div class="feature_right"></div>
                    </div>

                    <?php echo $row["cat_des"]; ?>
                </div>
            </a>
        </div>

    <?php }?>

</div>
</div>
</section>




<!--================End Recent Blog Area =================-->
<?php include_once('../common/mainfooter.php'); ?>  
<!--================End Recent Blog Area =================-->
            <div class="copy_right_area">
                <div class="container">
                    <div class="pull-left">
                        <h5><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p></h5>
                    </div>
       
                </div>
            </div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../js/jquery-2.1.4.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.min.js"></script>
<!-- Rev slider js -->
<script src="../vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="../vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="../vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="../vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="../vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="../vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="../vendors/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<!-- Extra plugin js -->
<script src="../vendors/bootstrap-selector/bootstrap-select.js"></script>
<script src="../vendors/bootatrap-date-time/bootstrap-datetimepicker.min.js"></script>
<script src="../vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="../vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="../vendors/isotope/isotope.pkgd.min.js"></script>
<script src="../vendors/countdown/jquery.countdown.js"></script>
<script src="../vendors/js-calender/zabuto_calendar.min.js"></script>
<!--gmaps Js-->
<!--        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>-->
<!--        <script src="js/gmaps.min.js"></script>-->


<!--        <script src="js/video_player.js"></script>-->
<script src="../js/theme.js"></script>
</body>
</html>

