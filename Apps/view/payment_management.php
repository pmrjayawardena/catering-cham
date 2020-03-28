<?php
$m_id=6;
include '../common/dbconnection.php';
include '../common/sessionhandling.php';
include '../common/functions.php';
include '../model/paymentmodel.php';
include '../model/allocationmodel.php';

$role_id=$userinfo['role_id'];

$countm=checkModuleRole($m_id, $role_id);
 if($countm==0){ //to check user previlages
   $msg=base64_encode("You dont have permission to access to this Module");
   header("Location:../view/login.php?msg=$msg");
 }


$obp=new payment;
$resulti=$obp->displayAllItemPayment();

$resultp=$obp->displayAllPackagePayment();

$resultt=$obp->getTotalTransactions();


$nooftransaction=$resultt->rowCount();

$results=$obp->getSum();

$rowsum=$results->fetch(PDO::FETCH_BOTH);

$resultpending=$obp->getpendingpaymentts();

$noofpendingpayments=$resultpending->rowCount();

$resultpaid=$obp->getpaidpaymentts();

$noofpaidpayments=$resultpaid->rowCount();

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
<script src="../js/iziToast.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="../css/iziToast.min.css">

                  <?php 
              if(isset($_GET['msg'])){

                $message=$_GET['msg'];

                if($message==11)

                  echo "<script type='text/javascript'>iziToast.success({
    title: 'Sent!',
    message: 'Invoice Sent',
});</script>";
                }


                ?>
<!-- you can add images to div call bgimg to class -->
<style type="text/css">
.bgimg {
  background-image: url('../images/wow.jpg'); 
}
</style>
<!-- use smooth scrolling -->
<script src="../js/smoothscroll.js"></script>

<?php if(isset($_GET['msg1'])){ 


 echo "<script type='text/javascript'> swal('Success!', 'New Item Added Successfully', 'success');</script>";

 
} ?>

                  <?php 
              if(isset($_GET['msg'])){

                $message=$_GET['msg'];

                if($message==5)

                  echo "<script type='text/javascript'>iziToast.success({
    title: 'Success!',
    message: 'Invoice Sent Successfully',
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
     <img src="../images/payment1.jpg" alt="homepage" class="dark-logo" width="200px" height="100px" align="center" />&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span> PAYMENT MANAGEMENT</span>
     <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
      <li class="breadcrumb-item active">Payment Management</li>
    </ol>
  </div>

</div>
<!-- End Bread crumb -->
<!-- Container fluid  -->
<div class="container-fluid">
  <!-- Start Page Content -->


  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
  rel="stylesheet">
  


<div class="row">
<div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-handshake-o f-s-40 color-warning"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $nooftransaction;?></h2>
                                    <p class="m-b-0">Total Trasactions</p>
                                </div>
                            </div>
                        </div>
                    </div>
 <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                  
                                    <span><i class="fa fa-usd f-s-40 color-primary"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2>Rs. <?php echo $rowsum['tm']; 

                                     $_SESSION['totalrevenue']=$rowsum['tm'];

                                    ?></h2>


                                    <p class="m-b-0">Total Revenue</p>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                  
                                    <span><i class="fa fa-money f-s-40 color-info"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $noofpaidpayments; ?></h2>


                                    <p class="m-b-0">Paid Payments</p>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                  
                                    <span><i class="fa fa-money f-s-40 color-success"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2> <?php echo $noofpendingpayments; ?></h2>


                                    <p class="m-b-0">Pending Payments</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


 </div>

<!-- user table -->



<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
       <div>


     </div>
     <div class="alert alert-info"><h4 class="card-title" align="center">Payment For Items</h4></div>

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
     <div class="table-responsive m-t-40">
      <table id="example231" class="table table-hover" cellspacing="0" width="100%"">
        <thead class="table-secondary">
          <tr>
            <th style="height:40px">Order ID/Payment ID &nbsp;</th>
            <th style="height:40px">Payment Date</th>
            <th style="height:40px">Total Payment</th>
            <th style="height:40px">Payment Status</th>
            <th style="height:40px">Transaction ID</th>
            <th style="height:40px"></th>
          </tr>
        </thead>
        <tfoot class="table-active">
          <tr>
         <th style="height:40px">Order ID/Payment ID &nbsp;</th>
            <th style="height:40px">Payment Date</th>
            <th style="height:40px">Total Payment</th>
            <th style="height:40px">Payment Status</th>
            <th style="height:40px">Transaction ID</th>
            <th style="height:40px"></th>
          </tr>
        </tfoot>
        <tbody>
          <?php while($row=$resulti->fetch(PDO::FETCH_BOTH)) { 


// $alos=$oba->viewallocationstatus($order_id);
//  $noofrecords=$alos->rowCount();

// $rowalos=$alos->fetch(PDO::FETCH_BOTH);
 $payment_id=$row['payment_id'];
 $order_id2=$row['order_id'];
 $rs=$obp->viewPaymentBystatus("Sent",$payment_id);    //active users
  $noau=$rs->rowCount(); 

$deliverycharge=$row['delivery_charges'];
$totalwithdeliverycharge=$row['total_amount'];

$discount=$row['discount'];

$totalfull=$totalwithdeliverycharge-$deliverycharge+$discount;




            ?>

            <tr  <?php if($row['payment_status']=="Pending") {?>

            class="alert-danger"


<?php }?>

             >

           <td style="height:45px"><?php echo $row['order_id']."/".$row['payment_id']; ?></td>
             <td style="height:45px"><?php echo $row['payment_date']; ?></td>
              <td style="height:45px"><?php echo $row['total_amount']; ?></td>
              <td style="height:45px"><?php echo $row['payment_status']; ?></td>
               <td style="height:45px"><?php echo $row['trasaction_id']; ?></td>
<th style="height:40px">
  <?php if( $noau==0) { ?>
          <a href="../view/invoice.php?payment_id=<?php echo $row ['payment_id']; ?>">
                <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View Invoice">Send Invoice</button>
              </a>
        <?php }else{?>

 <span class="label label-success"><?php echo "Invoice Sent" ?></span>

        <?php }?>


                <a href="../view/paycash.php?payment_id=<?php echo $row ['payment_id']; ?>&order_id=<?php echo $row ['order_id']; ?>&totalfull=<?php echo $totalfull; ?>&deliverycharge=<?php echo $deliverycharge; ?>&discount=<?php echo $discount; ?>">

                    <?php if($row['payment_status']=="Pending") { ?>
                <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="payfor the order">Pay</button>
              </a>

<?php }else{?>

 <span class="label label-success"><?php echo "Paid" ?></span>
<?php }?>

</th>
   </tr>

        <?php } ?>


      </tbody>
    </table>
  </div>
</div>
</div>


<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
       <div>


     </div>
     <div class="alert alert-info"><h4 class="card-title" align="center">Payment For Packages</h4></div>
  
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
     <div class="table-responsive m-t-40">
      <table id="example23" class="table table-hover" cellspacing="0" width="100%"">
        <thead class="table-secondary">
          <tr>
            <th style="height:40px">Order ID/Payment ID &nbsp;</th>
            <th style="height:40px">Payment Date</th>
            <th style="height:40px">Total Paid</th>
            <th style="height:40px">Payment Status</th>
            <th style="height:40px">Transaction ID</th>
            <th style="height:40px"></th>
          </tr>
        </thead>
        <tfoot class="table-active">
          <tr>
         <th style="height:40px">Order ID/Payment ID &nbsp;</th>
            <th style="height:40px">Payment Date</th>
            <th style="height:40px">Total Paid</th>
            <th style="height:40px">Payment Status</th>
            <th style="height:40px">Transaction ID</th>
            <th style="height:40px"></th>
          </tr>
        </tfoot>
        <tbody>
          <?php while($row=$resultp->fetch(PDO::FETCH_BOTH)) { 


// $alos=$oba->viewallocationstatus($order_id);
//  $noofrecords=$alos->rowCount();

// $rowalos=$alos->fetch(PDO::FETCH_BOTH);
 $payment_id=$row['payment_id'];
  $rs=$obp->viewPaymentBystatus("Sent",$payment_id);    //active users
  $noau=$rs->rowCount();  

$deliverycharge=$row['delivery_charges'];
$totalwithdeliverycharge=$row['total_amount'];

$discount=$row['discount'];

$totalfull=$totalwithdeliverycharge-$deliverycharge+$discount;
            ?>

            <tr    <?php if($row['payment_status']=="Pending") {?>

            class="alert-danger"


<?php }?>>

           <td style="height:45px"><?php echo $row['order_id']."/".$row['payment_id']; ?></td>
             <td style="height:45px"><?php echo $row['payment_date']; ?></td>
              <td style="height:45px"><?php echo $row['total_amount']; ?></td>
              <td style="height:45px"><?php echo $row['payment_status']; ?></td>
               <td style="height:45px"><?php echo $row['trasaction_id']; ?></td>
<th style="height:40px">
  <?php if( $noau==0) { ?>
          <a href="../view/invoicepackage.php?payment_id=<?php echo $row ['payment_id']; ?>">
                <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View Invoice">Send Invoice</button>
              </a>

                              <a href="../view/paycash.php?payment_id=<?php echo $row ['payment_id']; ?>&order_id=<?php echo $row ['order_id']; ?>&totalfull=<?php echo $totalfull; ?>&deliverycharge=<?php echo $deliverycharge; ?>&discount=<?php echo $discount; ?>">

                    <?php if($row['payment_status']=="Pending") { ?>
                <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="View Invoice">Pay</button>
              </a>

              <?php }?>
<?php }?>

</th>


          </tr>
        <?php } ?>


      </tbody>
    </table>
  </div>
</div>
</div>
<!-- End PAge Content -->

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