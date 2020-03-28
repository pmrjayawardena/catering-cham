<?php

include '../common/sessionhandling.php';
$role_id=$userinfo['role_id'];
include '../model/notificationmodel.php';
include '../common/functions.php';
include '../model/rolemodel.php';


$user_id=$userinfo['user_id'];
$notification_id = $_REQUEST['notification_id'];//To take the user id of the particular person

$obn=new notification();
$resultnot = $obn->viewallNotificationbyuser1($user_id,$notification_id);
$rownot=$resultnot->fetch(PDO::FETCH_BOTH);
$not_id=$_GET['notification_id'];
$r2=$obn->updateResNot($not_id);
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
      <h3 class="text-primary">YOUR NOTIFICATIONS</h3> </div>
      <div class="col-md-7 align-self-center">
       
        
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
          <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="../view/notification_management.php">Notification Management</a></li>
          <li class="breadcrumb-item active">Your Notifications</li>
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

        
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
             <div align="center"> 
             </div>
             <p align="center"><img src="../images/noti.png" width="200px" height="200px"></p>
             <div class="col-md-6">
              &nbsp;

              
            </div>
            <div class="clearfix">&nbsp;</div>
            <div class="clearfix">&nbsp;</div>
            <div class="row">
              <div class="col-md-6" align="center">Notification ID</div>
              <div class="col-md-6">
                <?php echo $rownot['notification_id']; ?>
              </div>
            </div>
            <div class="clearfix">&nbsp;</div>
            <div class="row">
              <div class="col-md-6" align="center">Notification Date</div>
              <div class="col-md-6">
               <?php echo $rownot['notification_date']; ?>
             </div>
           </div>
           <div class="clearfix">&nbsp;</div>
           <div class="row">
            <div class="col-md-6" align="center">Notification Category</div>
            <div class="col-md-6">
             <?php echo $rownot['notification_category']; ?>
             
           </div>
         </div>
         <div class="clearfix">&nbsp;</div>
         <div class="row">
          <div class="col-md-6" align="center">Notification Status</div>
          <div class="col-md-6">
            <?php echo $rownot['notification_status']; ?>
            
          </div>
        </div>
        <div class="clearfix" >&nbsp;</div>
        <div class="row">
          <div class="col-md-6" align="center">Notification Comment</div>
          <div class="col-md-6">
           <?php echo $rownot['notification_comment']; ?>
         </div>

       </div>
       <div class="clearfix">&nbsp;</div>

       <div class="row">
        <div class="col-md-6" align="center">Sent By</div>
        <div class="col-md-6">
          <?php echo $rownot['role_name']; ?>
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
</div>
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