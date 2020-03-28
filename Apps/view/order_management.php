<?php
$m_id=5;
include '../common/dbconnection.php';
include '../common/functions.php';
include '../model/ordermodel.php';
include '../model/allocationmodel.php';
include '../common/sessionhandling.php';
include '../model/packagemodel.php';

include '../model/paymentmodel.php';
$role_id=$userinfo['role_id'];

$countm=checkModuleRole($m_id, $role_id);
 if($countm==0){ //to check user previlages
   $msg=base64_encode("You dont have permission to access to this Module");
   header("Location:../view/login.php?msg=$msg");
 }

 
 $oborder=new order;
 $oba=new allocate();
 $obpackage=new package();
 $obpayment=new payment();
 $resulto=$oborder->displayAllOrder();
 $resultprocessing=$oborder->displayProcessingOrders();


 $noconfirmedorder=$resulto->rowCount(); 
 $noorderprocessing= $resultprocessing->rowCount();


 $resultdispatched=$oborder->dispatchedOrders();
 $noofdispatched= $resultdispatched->rowCount();

 $resultpending=$oborder->pendingorders();
 $noofpendingorders=$resultpending->rowCount();

  $rpp=$oborder->viewOrderBystatus("Full Payment");    //active users
  $nopo=$rpp->rowCount();  

  $rnpp=$oborder->viewOrderBystatus("Pending Payment");   //parsing the parameter Deactive to get number of deactive users
  $nonpp=$rnpp->rowCount();



  $alos1=$oba->viewallocationpending("Pending");
  $noofrecords1=$alos1->rowCount();

  $roW=$alos1->fetch(PDO::FETCH_BOTH);

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

  <?php 
  if(isset($_GET['msg'])){

    $message=$_GET['msg'];

    if($message==9)

      echo "<script type='text/javascript'>iziToast.success({
        title: 'Dispatched!',
        message: 'Order Dispatched',
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

  <?php           if(isset($_GET['msg'])){

    $message=$_GET['msg'];

    if($message==4)

      echo "<script type='text/javascript'> swal('Success!', 'Payment Success', 'success');</script>";
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
     <img src="../images/ordermanagement.jpg" alt="homepage" class="dark-logo" width="150px" height="80px" align="center" />&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span> ORDER MANAGEMENT</span>
     <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
      <li class="breadcrumb-item active">Order Management</li>
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
            <span><i class="fa fa-shopping-cart f-s-40 color-danger"></i></span>
          </div>
          <div class="media-body media-text-right">
            <h2><?php echo $noconfirmedorder+ $noofpendingorders ?></h2>
            <p class="m-b-0">Total Orders</p>
          </div>
        </div>
      </div>

    </div>

    <div class="col-md-3">
      <div class="card p-30">
        <a href="../view/payment_management.php">
          <div class="media">
            <div class="media-left meida media-middle">
              <span><i class="fa fa-shopping-basket f-s-40 color-dark"></i></span>
            </div>
            <div class="media-body media-text-right">
              <h2><?php echo $noofpendingorders ?></h2>
              <p class="m-b-0">(Payment is Pending)</p>
            </div>
          </div>
        </a>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card p-30">
        <div class="media">
          <div class="media-left meida media-middle">
            <span><i class="fa fa-shopping-bag f-s-40 color-dark"></i></span>
          </div>
          <div class="media-body media-text-right">
            <h2><?php echo  $noorderprocessing ?></h2>
            <p class="m-b-0">Processing Orders</p>
          </div>
        </div>
      </div>
    </div>


    <div class="col-md-3">
      <div class="card p-30">
        <div class="media">
          <div class="media-left meida media-middle">
            <span><i class="fa fa-archive f-s-40 color-dark"></i></span>
          </div>
          <div class="media-body media-text-right">
            <h2><?php echo $noofdispatched; ?></h2>
            <p class="m-b-0">Dispatched orders</p>
          </div>
        </div>
      </div>
    </div>



  </div>
  <script>

   function  disMsg(m){
     var r=confirm("Do you want to "+m+" User ? :)");
     if(r){
       return true;
     }else{
       return false;
     }
   }
   $(document).ready(function(){
    $('#myModal').on('show.bs.modal', function (e) {
      var rowid = $(e.relatedTarget).data('id');
      $.ajax({
        type : 'post',
            url : '../view/fetch_record_orders.php', //Here you will fetch records 
            data :  'rowid='+ rowid, //Pass $id
            success : function(data){
            $('.fetched-data').html(data);//Show fetched data from database
          }
        });
    });
  });

</script>
<!-- user table -->


<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">

       <div class="alert alert-info"><h4 class="card-title" align="center">Processing Orders</h4></div>
       <a href="../view/addorder.php" >
        <button type="button" class="btn btn-info">
          <i class="fa fa-shopping-cart"></i>
          Add Item Order
        </button>
      </a>
      <a href="../view/addpackageorder.php" >
        <button type="button" class="btn btn-info">
          <i class="fa fa-shopping-cart"></i>
          Add Package Order
        </button>
      </a>
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
          <thead class="table-active">
            <tr>
              <th style="height:40px">Order ID &nbsp;</th>
              <th style="height:40px">Order Date</th>
              <th style="height:40px">Total Order Items</th>
              <th style="height:40px">Customer Name</th>
              <th style="height:40px">Customer Contact Number</th>
               <th style="height:40px">checkout type</th>
              <th style="height:40px">Payment Status</th>
              <th style="height:40px">Action</th>
            </tr>
          </thead>
          <tfoot class="table-active">
            <tr>
              <th style="height:40px">Order ID &nbsp;</th>
              <th style="height:40px">Order Date</th>
              <th style="height:40px">Total Order Items</th>
              <th style="height:40px">Customer Name</th>
              <th style="height:40px">Customer Contact Number</th>
              <th style="height:40px">checkout type</th>
              <th style="height:40px">Payment Status</th>
              <th style="height:40px">Action</th>

            </tr>
          </tfoot>
          <tbody>
            <?php while($row= $resultprocessing->fetch(PDO::FETCH_BOTH)) { 
             $arr=array("payment");
             $order_id=$row['order_id'];
             $count=0;
             foreach ($arr as $v) {
               $count+=checkOrder($v,"order_id",$order_id);

             }



             $order_id=$row['order_id'];
             $alos=$oba->viewallocationstatus($order_id);
             $noofrecords=$alos->rowCount();
             $rowalos=$alos->fetch(PDO::FETCH_BOTH);

             $resultdate=$oborder->getDeliverydate($order_id);
             $rowdate=$resultdate->fetch(PDO::FETCH_BOTH);

             $delivery_date=$rowdate['delivery_date'];


// get payment details


             $resultpayment=$obpayment->selectpayment($order_id);
             $rowpayment=$resultpayment->fetch(PDO::FETCH_BOTH);

             if($rowalos['note']== "Allocated"){
              $status=1;
              $sname="Allocated";
              $style="danger";
            }  else {
              $status=0;
              $sname="Allocate";
              $style="success";
            }


               // get the total number of items

            $resultpack = $obpackage->viewAllPackageitems2($order_id);
            $rowpack=$resultpack->fetchall();


            $package_id=$rowpack[0];

            if($package_id==""){
              $resultnoitems=$oborder->viewAllOrderItems($order_id);
              $noofitems=$resultnoitems->rowCount();
            }else{
              $resultnopackage=$obpackage->viewAllPackageitems2($order_id);
              $noofitems=$resultnopackage->rowCount();
            }

              // end of getting total number of items

            ?>

            <tr>

             <td style="height:45px"><?php echo $row['order_id']; ?></td>
             <td style="height:45px"><?php echo $row['order_date']; ?></td>
             <td style="height:45px"><?php echo $noofitems;?></td>
             <td style="height:45px"><?php echo $row['cus_fname']." ".$row['cus_lname'] ?></td>
             <td style="height:45px"><?php echo $row['cus_tel']; ?></td>
 <td style="height:45px"><?php echo $row['checkout_type']; ?></td>
             <td style="height:45px">

              <?php if($rowpayment['payment_status']=="Pending" && $row['checkout_type']=="Home"){ ?>


                <span class="label label-info"><?php echo "Cash On Delivery"; ?></span> 

              <?php }elseif($rowpayment['payment_status']=="Pending"  && $row['checkout_type']=="Shop"){?>

                <span class="label label-warning"><?php echo "Pending" ?></span>

              <?php }elseif($rowpayment['payment_status']=="Paid" && $row['checkout_type']=="Shop" ){?>
                <span class="label label-success"><?php echo "Paid" ?></span>
              <?php }elseif($rowpayment['payment_status']=="Paid" && $row['checkout_type']=="Home" ){?>
                <span class="label label-success"><?php echo "Paid" ?></span>
              <?php }?>
            </td>
            <td>

              <a href="../view/vieworder.php?order_id=<?php echo $row ['order_id']; ?>">
                <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="View Order Details">View</button>
              </a>

              <?php if($count==0){ ?>
               <a href="../controller/ordercontroller.php?order_id=<?php echo $row ['order_id'];?>&action=Delete">
                <button type="button" class="btn btn-danger"  onclick="return confirmation('Delete','An Order')">
                  Cancel Order
                </button>
              </a>
            <?php } ?>


            <?php if($noofrecords=="" && $row['checkout_type']!=="Shop"){ ?>
              <a href="../controller/allocatecontroller.php?action=add&id=<?php echo $order_id;?>&date=<?php echo $delivery_date; ?>"><button type="button" class="btn btn-<?php echo $style; ?>"><?php  echo $sname; ?></button></a>

            <?php }?>


            <?php if($row['dispatch_status']!="Dispatched"){ ?>
              <a href="../controller/ordercontroller.php?action=dispatched&order_id=<?php echo $order_id;?>"><button type="button" class="btn btn-primary">Dispatched</button></a>

            <?php }?>
          </td>



        </tr>
      <?php } ?>


    </tbody>
  </table>
</div>
</div>
</div>

<!-- second table -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
       <div class="alert alert-info"><h4 class="card-title" align="center">All Orders</h4></div>



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
          <thead class="table-active">
            <tr>
              <th style="height:40px">Order ID &nbsp;</th>
              <th style="height:40px">Order Date</th>
              <th style="height:40px">Dispatch Status</th>
              <th style="height:40px">Customer Name</th>
              <th style="height:40px">Customer Contact Number</th>

              <th style="height:40px">Driver Allocation</th>
              <th style="height:40px">Action</th>
            </tr>
          </thead>
          <tfoot class="table-active">
            <tr>
              <th style="height:40px">Order ID &nbsp;</th>
              <th style="height:40px">Order Date</th>
              <th style="height:40px">Dispatch Status</th>
              <th style="height:40px">Customer Name</th>
              <th style="height:40px">Customer Contact Number</th>

              <th style="height:40px">Driver Allocation</th>
              <th style="height:40px">Action</th>

            </tr>
          </tfoot>
          <tbody>
            <?php while($row=$resulto->fetch(PDO::FETCH_BOTH)) { 
             $arr=array("payment");
             $order_id=$row['order_id'];
             $count=0;
             foreach ($arr as $v) {
               $count+=checkOrder($v,"order_id",$order_id);

             }



             $order_id=$row['order_id'];
             $alos=$oba->viewallocationstatus($order_id);
             $noofrecords=$alos->rowCount();
             $rowalos=$alos->fetch(PDO::FETCH_BOTH);

             $resultdate=$oborder->getDeliverydate($order_id);
             $rowdate=$resultdate->fetch(PDO::FETCH_BOTH);

             $delivery_date=$rowdate['delivery_date'];


             if($rowalos['note']== "Allocated"){
              $status=1;
              $sname="Allocated";
              $style="danger";
            }  else {
              $status=0;
              $sname="Allocate";
              $style="success";
            }


               // get the total number of items

            $resultpack = $obpackage->viewAllPackageitems2($order_id);
            $rowpack=$resultpack->fetchall();


            $package_id=$rowpack[0];

            if($package_id==""){
              $resultnoitems=$oborder->viewAllOrderItems($order_id);
              $noofitems=$resultnoitems->rowCount();
            }else{
              $resultnopackage=$obpackage->viewAllPackageitems2($order_id);
              $noofitems=$resultnopackage->rowCount();
            }

              // end of getting total number of items

            ?>

            <tr>

             <td style="height:45px"><?php echo $row['order_id']; ?></td>
             <td style="height:45px"><?php echo $row['order_date']; ?></td>
             <td style="height:45px">

              <?php if($row['dispatch_status']==""){ ?>

                <?php echo "Not Dispatched";?>

              <?php }else{?>

                <?php echo $row['dispatch_status'];?>
              <?php }?>
            </td>
            <td style="height:45px"><?php echo $row['cus_fname']." ".$row['cus_lname'] ?></td>
            <td style="height:45px"><?php echo $row['cus_tel']; ?></td>

            <td style="height:45px">

              <?php if($rowalos['note']=="" && $row['checkout_type']=="Shop"){ ?>


                <span class="label label-info"><?php echo "Picked from store"; ?></span> 

              <?php }elseif($rowalos['note']=="" && $row['checkout_type']=="Home"){?>

                <span class="label label-warning"><?php echo "Pending" ?></span>

              <?php }elseif($rowalos['note']=="Allocated"){?>

               <span class="label label-success"> <?php echo $rowalos['note'] ?></span>

             <?php }else{?>
               <span class="label label-warning"> <?php echo $rowalos['note'] ?></span>

             <?php }?>


           </td>
           <td>

            <a href="../view/vieworder.php?order_id=<?php echo $row ['order_id']; ?>">
              <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="View Order Details">View</button>
            </a>

            <?php if($count==0){ ?>
             <a href="../controller/ordercontroller.php?order_id=<?php echo $row ['order_id'];?>&action=Delete">
              <button type="button" class="btn btn-danger"  onclick="return confirmation('Delete','An Order')">
                Cancel Order
              </button>
            </a>
          <?php } ?>


          <?php if($noofrecords=="" && $row['checkout_type']!=="Shop"){ ?>
            <a href="../controller/allocatecontroller.php?action=add&id=<?php echo $order_id;?>&date=<?php echo $delivery_date; ?>"><button type="button" class="btn btn-<?php echo $style; ?>"><?php  echo $sname; ?></button></a>

          <?php }?>

        </td>



      </tr>
    <?php } ?>


  </tbody>
</table>
</div>
</div>
</div>


<!-- End PAge Content -->

</div>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

   Order Details
   <div class="modal-content fetched-data">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Modal Header</h4>
    </div>
    <div class="modal-body">
      <p>Some text in the modal.</p>
      <div class="fetched-data"></div> 
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>

</div>
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

    var r=confirm("Do you want to" +str+ "Order ?");

    if(!r){

      return false;
    }
  }

</script> 