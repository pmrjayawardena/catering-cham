<?php

include '../common/sessionhandling.php';
$role_id=$userinfo['role_id'];
include '../common/dbconnection.php';
include '../model/packagemodel.php';
include '../model/itemmodel.php';
include '../common/functions.php';
include '../model/rolemodel.php';

  
 
$package_id = $_REQUEST['package_id'];//To take the user id of the particular person
$obp=new package();
$resultpackage = $obp->viewAPackage($package_id);
$rowpackage=$resultpackage->fetch(PDO::FETCH_BOTH);

$resultpack = $obp->viewAllPackageitems();

$package_id=$rowpackage['package_id'];
$resultpack1 = $obp->viewAllPackageitems1($package_id);
$noofitems=$resultpack1->rowCount();
$obitem=new item();


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
      <h3 class="text-primary">VIEW PACKAGE</h3> </div>
      <div class="col-md-7 align-self-center">
        <span> PACKAGE MANAGEMENT</span>
        
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
          <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="../view/package_management.php">Package Management</a></li>
          <li class="breadcrumb-item active">View Package</li>
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
             <div align="center">  <?php 
             if($rowpackage['package_image']==""){
                                   $package_image="../images/user_icon.png";//if an image does not exist view a default image 
                                 }else{
                                   $package_image="../images/package_images/".$rowpackage['package_image'];//if the image exists view the particular image for the particular row
                                 }
                                 ?>
                                 <img src="<?php echo $package_image; ?>" width="300px" height="200px"/>
                               </div>
                               <div class="col-md-6">
                                &nbsp;

                                
                              </div>
                              <div class="clearfix">&nbsp;</div>
                              <div class="clearfix">&nbsp;</div>
                              <div class="row">
                                <div class="col-md-6" align="center">Package ID</div>
                                <div class="col-md-6">
                                  <?php echo $rowpackage['package_id']; ?>
                                </div>
                              </div>
                              <div class="clearfix">&nbsp;</div>
                              <div class="row">
                                <div class="col-md-6" align="center">Package Name</div>
                                <div class="col-md-6">
                                 <?php echo $rowpackage['package_name']; ?>
                               </div>
                             </div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="row">
                              <div class="col-md-6" align="center">Package Price</div>
                              <div class="col-md-6">
                               <?php echo $rowpackage['package_price']; ?>
                               
                             </div>
                           </div>
                           <div class="clearfix">&nbsp;</div>
                           <div class="row">
                            <div class="col-md-6" align="center">Package Description</div>
                            <div class="col-md-6">
                             <?php echo $rowpackage['package_des']; ?>
                             
                           </div>
                         </div>
                         <div class="clearfix" >&nbsp;</div>
                         <div class="row">
                          <div class="col-md-6" align="center">Suitable For</div>
                          <div class="col-md-6">
                           <?php echo $rowpackage['suitable_for']; ?>
                         </div>

                       </div>
                       <div class="clearfix">&nbsp;</div>

                       <div class="row">
                        <div class="col-md-6" align="center">Package Status</div>
                        <div class="col-md-6">
                          <?php echo $rowpackage['package_status']; ?>
                        </div>
                      </div>

                      <div class="clearfix">&nbsp;</div>
                      <div class="row">
                        <div class="col-md-6" align="center">Total Items</div>
                        <div class="col-md-6">
                          <?php echo  $noofitems; ?>
                        </div>
                      </div>
                      
                      <div class="clearfix">&nbsp;</div>

                      <div class="clearfix">&nbsp;</div>




                      <table align="center" class="table table-hover">
                        <thead class="table">
                          <tr>
                            <th style="height:40px">Item Image</th>
                            <th style="height:40px">Item Name</th>
                            <th style="height:40px">Suitable for</th>
                            <th style="height:40px">Item Quantity &nbsp;</th>
                            <th style="height:40px">for total &nbsp;</th>
                            
                            
                          </tr>
                        </thead>

                        <tbody>
                          <?php while($row=$resultpack1->fetch(PDO::FETCH_BOTH)) { 

                                   if($row['item_image']==""){
              $cimage="../images/category.png";
            }else{
              $cimage="../images/item_images/".$row['item_image'];
            }



                            ?>

                            <tr>
                             <td style="height:45px"><img src="<?php echo $cimage;?>" height="60px" width="80px"></td>
                             <td style="height:45px"><?php echo $row['item_name']; ?></td>
                             <td style="height:45px"><?php echo $row['suitable_for']; ?></td>
                             <td style="height:45px"><?php echo $row['item_quantity']; ?></td>
                             <td style="height:45px"><?php echo $row['item_quantity']*$row['suitable_for']; ?></td>
                             




                           </tr>
                         <?php } ?>


                       </tbody>
                     </table>
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