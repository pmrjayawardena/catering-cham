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

$item_id=$_REQUEST['item_id'];
$feedback_id = $_REQUEST['feedback_id'];//To take the user id of the particular person
$obf=new feedback();
$resultfeedback = $obf->viewAFeedback($feedback_id); //to get the specific user details
$rowfeedback=$resultfeedback->fetch(PDO::FETCH_BOTH);


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
        <h4>Items</h4>
        <a href="#">Home</a>
        <a class="active" href="../view/items.php">Items</a>
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


        <div class="clearfix">&nbsp;</div>
        <div class="clearfix">&nbsp;</div>
        <form method="post" action="../controller/feedbackcontroller.php?action=update&feedback_id=<?php echo $feedback_id ?>&item_id=<?php echo $item_id ?>">
          <div class="form-group">
            <label for="exampleFormControlInput1">Title of your review</label>
            <input type="text" class="form-control" id="feedback_title" name="feedback_title" value="<?php echo $rowfeedback['feedback_title']; ?>">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Overall rating</label>
            <select class="form-control" id="feedback_rating" name="feedback_rating">
              <option value="5">Excelent</option>
              <option value="4">very good</option>
              <option value="3">good</option>
              <option value="2">bad</option>
              <option value="1">very bad</option>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Overall rating</label>
            <textarea class="form-control" id="feedback_comment" name="feedback_comment" rows="3"><?php echo $rowfeedback['feedback_comment']; ?></textarea>
          </div>



          <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>Update Your Feedback</button>
        </form>
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

<script type="text/javascript">

  function confirmation (str) {

    var r=confirm("Do you want to " +str+ " your Feedback ?");

    if(!r){

      return false;
    }
  }

</script> 

</body>
</html>