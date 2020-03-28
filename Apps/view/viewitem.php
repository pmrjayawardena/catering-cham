<?php

include '../common/sessionhandling.php';
$role_id=$userinfo['role_id'];
include '../common/dbconnection.php';
include '../model/itemmodel.php';
include '../common/functions.php';
include '../model/rolemodel.php';


$item_id = $_REQUEST['item_id'];//To take the user id of the particular person
$obi=new item();
$resultitem = $obi->viewAItem($item_id);
$rowitem=$resultitem->fetch(PDO::FETCH_BOTH);




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
      <h3 class="text-primary">VIEW ITEM</h3> </div>
      <div class="col-md-7 align-self-center">
        <span> ITEM MANAGEMENT</span>
        
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
          <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="../view/user_management.php">User Management</a></li>
          <li class="breadcrumb-item active">View Item</li>
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
             <div align="center"> <?php 
             if($rowitem['item_image']==""){
                                   $item_image="../images/item.png";//if an image does not exist view a default image 
                                 }else{
                                   $item_image="../images/item_images/".$rowitem['item_image'];//if the image exists view the particular image for the particular row
                                 }
                                 ?>
                                 <img src="<?php echo $item_image; ?>" width="300px" height="250px"/>
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
                              <div class="col-md-6" align="center">Category</div>
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
                               Rs. <?php echo $rowitem['item_price']; ?>
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
                         
                         <div class="clearfix">&nbsp;</div>
                         <div class="clearfix">&nbsp;</div>
                         <input type="button" value="Go Back" onclick="history.back(-1)" class="btn btn-primary btn-md btn-block" />

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