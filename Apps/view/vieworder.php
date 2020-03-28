<?php

include '../common/sessionhandling.php';
$role_id=$userinfo['role_id'];
include '../common/dbconnection.php';
include '../model/packagemodel.php';
include '../model/itemmodel.php';
include '../common/functions.php';
include '../model/rolemodel.php';
include '../model/ordermodel.php';


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

if($package_id==""){

  $resultpack1 = $obo->viewAllOrderItems($order_id);
  $noofitems=$resultpack1->rowCount();

}else{

  $resultpack1 = $obp->viewAllPackageitems2($order_id);
  $noofitems=$resultpack1->rowCount();
}

// $obitem=new item();


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
      <h3 class="text-primary">VIEW ORDER</h3> </div>
      <div class="col-md-7 align-self-center">
        <span> ORDER MANAGEMENT</span>
        
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
          <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="../view/order_management.php">order Management</a></li>
          <li class="breadcrumb-item active">View order</li>
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
              <?php if($package_id==""){ ?>
                <div class="alert alert-success">This is an Item Order</div>

              <?php }else{

                ?>
                <div class="alert alert-info">This is a Package Order</div>

              <?php }?>
              <img src="../images/vieworder.jpg" width="250px" height="200px"/>
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
              <div class="col-md-6" align="center">Order Date</div>
              <div class="col-md-6">
               <?php echo $roworder['order_date']; ?>
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
          <div class="col-md-6" align="center">Customer Telephone</div>
          <div class="col-md-6">
           <?php echo $roworder['cus_tel']; ?>
           
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
            <th style="height:40px"></th>
            <th style="height:40px">Item Name</th>
            <th style="height:40px">Item Price</th>
            <th style="height:40px">Item Quantity</th>
            <th style="height:40px">Item ID &nbsp;</th>
            
            
            
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
           <td style="height:45px"><?php echo $row['item_price']; ?></td>
           <td style="height:45px"><?php echo $row['item_quantity']; ?></td>
           <td style="height:45px"><?php echo $row['item_id']; ?></td>
           
           




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