<?php
include '../common/sessionhandling.php';
include '../common/dbconnection.php';
include '../common/functions.php';
include '../model/categorymodel.php';

include '../model/ordermodel.php';

$oborder=new order();

$order_id = $_REQUEST['order_id'];
$payment_id = $_REQUEST['payment_id'];
$totalfull = $_REQUEST['totalfull'];

$totalpay=$totalfull-$discount;

$resultcheckouttype=$oborder->getorderdetails($order_id);
$rowcheckouttype=$resultcheckouttype->fetch(PDO::FETCH_BOTH);
?>



<?php include_once('../common/header.php'); ?><html>
<head>
  <meta charset="utf-8">
  <title>sos</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
  <title>Ela - Bootstrap Admin Dashboard Template</title>
  <!-- Bootstrap Core CSS -->
  <link href="../css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="../css/helper.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->

  <script src="https:oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https:oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/ScrollToPlugin.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css" />
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="../sweetalert/sweetalert.min.js" ></script>
<link rel="stylesheet" type="text/css" href="../sweetalert/sweetalert.css">

<script src="../js/iziToast.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="../css/iziToast.min.css">
<!-- you can add images to div call bgimg to class -->
<style type="text/css">
.bgimg {
  background-image: url('../images/wow.jpg'); 
}
</style>
<!-- use smooth scrolling -->
<script src="../js/smoothscroll.js"></script>

<?php 
if(isset($_GET['msg'])){

  $message=$_GET['msg'];

  if($message==4)

    echo "<script type='text/javascript'>iziToast.success({

      message: 'Order Added Successfully!',
    });</script>";
  }


  ?>

  <?php 
  if(isset($_GET['msg'])){

    $message=$_GET['msg'];

    if($message==5)

      echo "<script type='text/javascript'>iziToast.warning({
        title: 'Removed!',
        message: 'Order Removed',
      });</script>";
    }


    ?>

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
    <div class="col-lg-12 align-self-center">
    </div>
    <div class="col-lg-12 align-self-center">
     <img src="../images/paycash.png" alt="homepage" class="dark-logo" width="200px" height="100px" align="center" />&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>CASH PAYMENT</span>
     <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
 <li class="breadcrumb-item"><a href="../view/payment_management.php">Payment Management</a></li>
      <li class="breadcrumb-item active">Cash Payment</li>
    </ol>
  </div>

</div>
<!-- End Bread crumb -->
<!-- Container fluid  -->
<div class="container-fluid">
  <!-- Start Page Content -->


  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
  rel="stylesheet">






  <!-- user table -->
  <form method="post" action="../controller/paymentcontroller.php?action=add&order_id=<?php echo $order_id;?>&payment_id=<?php echo $payment_id;?>&totalfull=<?php echo$totalfull;?>&total=<?php echo $total;?>enctype="multipart/form-data"  name="RegForm" onsubmit="return GEEKFORGEEKS()">

    <div class="container-fluid">
      <div class="col-lg-4 col-md-offset-2">Order Fee : <input type="text" name="just" value="<?php echo $totalfull?>" class="form-control form-control-lg" readonly> <br>
                <div>Payment for the order : <input type="text" name="total_amount" value="<?php echo $totalpay;?>" class="form-control form-control-lg" readonly> <br>
          <button type="submit" name="submit" class="btn btn-primary">Pay for the order</button></div>
        </div>
      </div>
    </form>

    
  </div>
  <!-- End PAge Content -->

</div>
    <br>
<div class="col-lg-offset-2">
    <?php if($rowcheckouttype['checkout_type']=="Home" && $rowcheckouttype['order_status']=="Pending"){ ?>
     <a href="../controller/paymentcontroller.php?action=cashondelivery&order_id=<?php echo $order_id;?>&payment_id=<?php echo $payment_id;?>&totalfull=<?php echo$totalfull;?>&total=<?php echo $total;?>&deliverycharge=<?php echo $deliverycharge;?>&discount=<?php echo $discount;?>"><button class="btn btn-success">Cash On Delivery</button></a>

   <?php }?>
</div>
<!-- footer -->
</div>

<?php include_once('../common/footer.php'); ?>



<script src="../js/lib/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="../js/lib/bootstrap/js/popper.min.js"></script>


<!--Custom JavaScript -->
<script src="../js/scripts.js"></script>


<script src="../js/lib/datatables/datatables.min.js"></script>
<script src="../js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="../js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="../js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="../js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="../js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="../js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="../js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script src="../js/lib/datatables/datatables-init.js"></script>
<script src="../js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>


<!--Custom JavaScript -->
<script src="../js/scripts.js"></script>

</script>
<script type="text/javascript">

  function confirmation (str) {

    var r=confirm("Do you want to" +str+ "Item ?");

    if(!r){

      return false;
    }
  }

</script> 
<script>
  function GEEKFORGEEKS()                                   
  {
    var driver = document.forms["RegForm"]["driver"]; 
    var vehicle_id = document.forms["RegForm"]["vehicle_id"];              




    if (driver.value == "")                              
    {
      window.alert("Please Select a Driver");
      driver.focus();
      return false;
    }

    if (vehicle_id.value == "")                                 
    {
      window.alert("Please Selct a Vehicle");
      vehicle_id.focus();
      return false;
    }




    return true;
  }

</script>