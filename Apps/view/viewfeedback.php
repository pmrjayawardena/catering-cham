<?php
include '../common/dbconnection.php';
include '../common/sessionhandling.php';
include '../model/feedbackmodel.php';
include '../model/itemmodel.php';
$ob = new feedback();
$obitem=new item();


$feedback_id=$_REQUEST['feedback_id'];
$item_id=$_REQUEST['item_id'];
$result=$ob->viewAFeedback($feedback_id);
$rownotify=$result->fetch(PDO::FETCH_BOTH);
$cus_id=$rownotify['cus_id'];


$resultcusname=$ob->viewallFeedbackbycustomer($cus_id,$item_id);

$rowcusname=$resultcusname->fetch(PDO::FETCH_BOTH);


?>


<?php include_once('../common/header.php'); ?>

<html>
<head>
  <meta charset="utf-8">

  <title>sos</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
  <script src="../sweetalert/sweetalert.min.js" ></script>
  <link rel="stylesheet" type="text/css" href="../sweetalert/sweetalert.css">
</head>

<?php if(isset($_GET['msg1'])){ 


 echo "<script type='text/javascript'> swal('ok!', 'User Added', 'success');</script>";


} ?>


<p align="center">Modules</p>
<li>
 <?php include_once('../common/modules.php'); ?>

</li>
</li>
<li class="nav-label"></li> 

</div>
<!-- End Sidebar scroll-->
</div>
<!-- End Left Sidebar  -->
<!-- Page wrapper  -->
<div class="page-wrapper">
  <!-- Bread crumb -->
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      </div>
      <div class="col-md-7 align-self-center">
        <span> Feedback Management</span>
        
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
          <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="../view/feedback_management.php">Feedback Management</a></li>
          <li class="breadcrumb-item active">View Feedback</li>
        </ol>
      </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
      <!-- Start Page Content -->
      <div class="clearfix"></div>
      <div id="contents">
        <div class="row">



        </div>
        <div class="clearfix">&nbsp;</div>

        
        <div class="col-lg-8 col-md-offset-2">
          <div class="card">
            <div class="card-body">
             <div align="center"> 
              <?php 
             if($rowcusname['item_image']==""){
                                   $item_image="../images/item.png";//if an image does not exist view a default image 
                                 }else{
                                   $item_image="../images/item_images/".$rowcusname['item_image'];//if the image exists view the particular image for the particular row
                                 }
                                 ?>
              <img src="<?php echo $item_image;?>" width="250px" height="200px"/>
            </div>
            <div class="col-md-6">
              &nbsp;

              
            </div>
            <div class="clearfix">&nbsp;</div>
            <div class="clearfix">&nbsp;</div>
            <div class="row">
              <div class="col-md-6" align="center">Feedback ID</div>
              <div class="col-md-6">
                <?php echo $rownotify['feedback_id']; ?>
              </div>
            </div>
            <div class="clearfix">&nbsp;</div>
            <div class="row">
              <div class="col-md-6" align="center">Item Name</div>
              <div class="col-md-6">
                <?php echo $rowcusname['item_name']; ?>
                
              </div>
            </div>

                 <div class="clearfix">&nbsp;</div>
            <div class="row">
              <div class="col-md-6" align="center">Customer Name</div>
              <div class="col-md-6">
                <?php echo $rowcusname['cus_fname']." ".$rowcusname['cus_lname']; ?>
                
              </div>
            </div>
            <div class="clearfix">&nbsp;</div>
            <div class="row">
              <div class="col-md-6" align="center">Feedback title</div>
              <div class="col-md-6">
               <?php echo $rownotify['feedback_title']; ?>

             </div>
           </div>
           <div class="clearfix">&nbsp;</div>
           <div class="row">
            <div class="col-md-6" align="center">Feedback Comment</div>
            <div class="col-md-6">
              <?php echo $rownotify['feedback_comment']; ?>

            </div>
          </div>

          <div class="clearfix">&nbsp;</div>
          <div class="row">
            <div class="col-md-6" align="center">Feedback Date</div>
            <div class="col-md-6">
             <?php echo $rownotify['feedback_date']; ?>

           </div>
         </div>


         <div class="clearfix">&nbsp;</div>
         <div class="row">
          <div class="col-md-6" align="center">Rating</div>
          <div class="col-md-6">
            <?php echo $rownotify['feedback_rating'];?><br>

             <?php if($rownotify["feedback_rating"]=="Excelent"){?>
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>


                          <?php }elseif($rownotify["feedback_rating"]=="very good"){?>
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>

                          <?php }elseif($rownotify["feedback_rating"]=="good"){?>

                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>

                          <?php }elseif($rownotify["feedback_rating"]=="bad"){?>
                           <i class="fa fa-star"></i><i class="fa fa-star"></i>
                         <?php }elseif($rownotify["feedback_rating"]=="very bad"){?>
                           <i class="fa fa-star"></i>
                           <?php }?>
          </div>
        </div>

        <div class="clearfix">&nbsp;</div>

        <div class="clearfix">&nbsp;</div>




        <div class="clearfix">&nbsp;</div>
        <div class="clearfix">&nbsp;</div>
        <input type="button" value="Go Back" onclick="history.back(-1)" class="btn btn-primary btn-lg btn-block" />

      </div>
    </div>

  </div>
</div>

</div>
</div>




<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>



<!-- End PAge Content -->

<!-- End Container fluid  -->
<!-- footer -->
<?php include_once('../common/footer.php'); ?>

<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
  });
</script>