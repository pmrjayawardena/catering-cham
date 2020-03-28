<?php 


include '../../Apps/common/dbconnection.php';
include '../common/sessionhandling.php';
include '../../Apps/model/itemmodel.php';
include '../../Apps/model/feedbackmodel.php';
include '../common/session.php';
$obitem = new item();

$result = $obitem->viewAllItems();


$obfeedback = new feedback();

$resultz = $obfeedback->viewallFeedback();

//index.php

$connect = new PDO("mysql:host=localhost;dbname=ocs", "root", "");

$message = '';


$result = $obitem->viewAllItems();
$cus_id=$cusinfo['cus_id'];

$item_id = $_REQUEST['item_id'];//To take the user id of the particular person
$obi=new item();
$resultitem = $obi->viewAItem($item_id);
$rowitem=$resultitem->fetch(PDO::FETCH_BOTH);
$rowitem['item_name'];


$obitem=new item();
$resultimage=$obitem->viewItemImage($item_id);
$noi=$resultimage->rowCount();

if ($noi) {
  $rowwall=$resultimage->fetchAll();
  foreach ($rowwall as $k => $v) {
    $im=$v['ii_name'];
  }
  $path='../../Apps/images/item_images/'.$im;
}else {
  $path='../../Apps/images/bi.png';

}
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

<!-- Icon css link -->
<link rel="icon" type="image/png" href="../../Apps/images/icons/slweb.ico"/>
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

      <?php echo $rowcus; ?>
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
            if($rowitem['item_image']==""){
                                   $item_image="../../Apps/images/item.png";//if an image does not exist view a default image 
                                 }else{
                                   $item_image="../../Apps/images/item_images/".$rowitem['item_image'];//if the image exists view the particular image for the particular row
                                 }     
                                 ?>
                                 <img src="<?php echo $item_image; ?>" width="250px" height="250px"/>
                               </div>
                               <div class="col-md-6">
                                &nbsp;


                              </div>
                              <div class="clearfix">&nbsp;</div>
                              <div class="clearfix">&nbsp;</div>
                              <div class="row">
                                <div class="col-md-6" align="center">Item ID</div>
                                <div class="col-md-6">
                                  <?php echo $rowitem['item_id']; ?>
                                </div>
                              </div>
                              <div class="clearfix">&nbsp;</div>
                              <div class="row">
                                <div class="col-md-6" align="center">Item Name</div>
                                <div class="col-md-6">
                                 <?php echo $rowitem['item_name']; ?>
                               </div>
                             </div>

                             <div class="clearfix">&nbsp;</div>
                             <div class="row">
                              <div class="col-md-6" align="center">Category Name</div>
                              <div class="col-md-6">
                                <?php echo $rowitem['cat_name']; ?>

                              </div>
                            </div>
                            <div class="clearfix" >&nbsp;</div>
                            <div class="row">
                              <div class="col-md-6" align="center">Item Description</div>
                              <div class="col-md-6">
                                <?php echo $rowitem['item_des']; ?>
                              </div>

                            </div>
                            <div class="clearfix">&nbsp;</div>

                            <div class="row">
                              <div class="col-md-6" align="center">Item Price</div>
                              <div class="col-md-6">
                               <?php echo $rowitem['item_price']; ?>
                             </div>
                           </div>
                           <div class="clearfix">&nbsp;</div>
                           <div class="row">
                            <div class="col-md-6" align="center">Item Status</div>
                            <div class="col-md-6">
                             <?php echo $rowitem['item_status']; ?>
                           </div>
                         </div>
                         <div class="clearfix">&nbsp;</div>
                         <a href="../view/items.php">
                          <input type="button" value="Go Back and Order" onclic class="btn btn-success btn-lg btn-block" />
                        </a>
                        <div class="clearfix">&nbsp;</div>

                        <div class="clearfix">&nbsp;</div>
                        <div class="clearfix">&nbsp;</div>


                      </div>
                    </div>

                  </div>

                  <div class="clearfix">&nbsp;</div>
                  <div class="clearfix">&nbsp;</div>
                  <form method="post" action="../controller/feedbackcontroller.php?action=add&item_id=<?php echo $item_id ?>">
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Title of your review</label>
                      <input type="text" class="form-control" id="feedback_title" name="feedback_title" placeholder="If you could say it it one sentence,what would you say" required="">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Overall rating</label>
                      <select class="form-control" id="feedback_rating" name="feedback_rating" required>
                        <option value="5">Excelent</option>
                        <option value="4">very good</option>
                        <option value="3">good</option>
                        <option value="2">bad</option>
                        <option value="1">very bad</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Overall rating</label>
                      <textarea class="form-control" id="feedback_comment" name="feedback_comment" rows="3" required></textarea>
                    </div>



                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>Submit Your Feedback</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="clearfix">&nbsp;</div>
            <div class="clearfix">&nbsp;</div>


          </div>
          <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel" data-type="multi">
            <div class="carousel-inner">
              <div class="item active">
               

               <?php

               $item_id = $_REQUEST['item_id'];
               $resultf=$obfeedback->viewallFeedbackbycustomer($cus_id,$item_id);
               $result = $resultf->fetchAll();


               foreach($result as $row)
               {

                 $item_id=$row['item_id'];
                 
                 if($row['cus_image']==""){
                  $cimage="../img/cusimage.png";
                }else{
                  $cimage="../img/cus_images/".$row['cus_image'];
                }
                ?>
                <article class="row">

                  <div class="col-md-2 col-sm-2 col-md-offset-1 col-sm-offset-0 hidden-xs">
                    <figure class="thumbnail">
                      <img class="img-responsive" src="<?php echo $cimage; ?>" width="80px" height="100px" /><br>
                      <figcaption class="text-center"><?php echo $row['cus_fname']." ".$row['cus_lname']; ?></figcaption>
                    </figure>
                  </div>
                  <div class="col-md-8 col-sm-8">
                    <div class="panel panel-default arrow left">
                      <div class="panel-heading right ">Feedback</div>
                      <div class="panel-body">
                        <header class="text-left">
                          <div class="comment-user"><i class="fa fa-user"></i> Customer Name: <?php echo $row['cus_fname']." ".$row['cus_lname']?></div><br>
                          <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> Date:  <?php echo $row["feedback_date"]; ?></time>
                        </header>
                        <div class="comment-post">
                          <p>


                          </p>
                        </div>

                        <div>
                          
                          <?php if($row["feedback_rating"]=="5"){?>
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>


                          <?php }elseif($row["feedback_rating"]=="4"){?>
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>

                          <?php }elseif($row["feedback_rating"]=="3"){?>

                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>

                          <?php }elseif($row["feedback_rating"]=="2"){?>
                           <i class="fa fa-star"></i><i class="fa fa-star"></i>
                         <?php }elseif($row["feedback_rating"]=="1"){?>
                           <i class="fa fa-star"></i>
                           <?php }?> <br>
                           Overall Rating - <?php echo $row["feedback_rating"]; ?><br><br>

                           <div>
                            Feedback: <?php echo $row['feedback_comment']?>
                          </div>
                        </div>

                        <?php if($row['cus_id']==$cusinfo['cus_id']){ ?>
                         <a href="../controller/feedbackcontroller.php?feedback_id=<?php echo $row['feedback_id'];?>&action=Delete1&item_id= <?php echo $row['item_id']?>">
                          <button type="button" class="btn btn-danger"  onclick="return confirmation('Delete','Feedback')">
                            Delete
                          </button>
                        </a>
                      <?php }?>
                      <?php if($row['cus_id']==$cusinfo['cus_id']){ ?>
                       <a href="../view/editfeedback.php?feedback_id=<?php echo $row['feedback_id'];?>&item_id=<?php echo $row['item_id'];?>">
                        <button type="button" class="btn btn-info">
                          Edit Feedback
                        </button>
                      </a>
                    <?php }?>


                  </div>

                </div>

              </div>

            </article>
            <?php
          }
          ?>

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