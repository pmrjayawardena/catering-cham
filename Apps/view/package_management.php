<?php
$m_id=4;
include '../common/dbconnection.php';
include '../common/functions.php';
include '../model/ordermodel.php';
include '../model/packagemodel.php';
include '../common/sessionhandling.php';

$role_id=$userinfo['role_id'];

$countm=checkModuleRole($m_id, $role_id);
 if($countm==0){ //to check user previlages
   $msg=base64_encode("You dont have permission to access to this Module");
   header("Location:../view/login.php?msg=$msg");
 }


 
 $oborder=new order;
 $resulto=$oborder->displayAllOrder();
 $noorder=$resulto->rowCount(); 


  $rpp=$oborder->viewOrderBystatus("Full Payment");    //active users
  $nopo=$rpp->rowCount();  

  $rnpp=$oborder->viewOrderBystatus("Pending Payment");   //parsing the parameter Deactive to get number of deactive users
  $nonpp=$rnpp->rowCount();


  $obpackage=new package;

  $resultp=$obpackage->viewAllPackage();
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
    $package_id=$_REQUEST['package_id'];
    if($message==6)

      echo "<script type='text/javascript'>iziToast.success({
        title: 'Status Changed!',
        message: 'Changed Status of package ID $package_id Successfully',
      });</script>";
    }


    ?>


    <?php 
    if(isset($_GET['msg'])){

      $message=$_GET['msg'];

      if($message==4)

        echo "<script type='text/javascript'>iziToast.warning({
          title: 'Deleted!',
          message: 'Package Deleted',
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


     echo "<script type='text/javascript'> swal('Success!', 'New Package Added Successfully', 'success');</script>";

     
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
    <div class="col-lg-12 align-self-center">
    </div>
    <div class="col-lg-12 align-self-center">
     <img src="../images/package_management.jpg" alt="homepage" class="dark-logo" width="200px" height="100px" align="center" />&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span> PACKAGE MANAGEMENT</span>
     <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
      <li class="breadcrumb-item active">Package Management</li>
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
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
         <div>
          <a href="../view/addpackage.php" >
            <button type="button" class="btn btn-info">
             <i class="fas fa-utensils"></i>
             Add Package
           </button>
         </a>

       </div>
       <h4 class="card-title">Data Export &nbsp; <i class="fas fa-file-export"></i></h4>
       <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
       <div class="table-responsive m-t-40">
        <table id="example231" class="table table-hover" cellspacing="0" width="100%"">
          <thead class="table-active">
            <tr>
              <th style="height:40px">Package Title &nbsp;</th>
              <th style="height:40px">Suitable for</th>
              <th style="height:40px">Price</th>
              <th style="height:40px">Status</th>
              <th style="height:40px">Products</th>
              <th style="height:40px">Products</th>
            </tr>
          </thead>

          <tbody>
            <?php while($row=$resultp->fetch(PDO::FETCH_BOTH)) { 
             $arr=array("order_package");
             $package_id=$row['package_id'];
             $count=0;
             foreach ($arr as $v) {
               $count+=checkPackage($v,"package_id",$package_id);
               
             }
             $package_id=$row['package_id'];
  $rpp=$obpackage->viewAllPackageitems1($package_id);    //active users
  $nopo=$rpp->rowCount();  

  if($row['package_status']== "Active"){
    $status=1;
    $sname="Deactivate";
    $style="danger";
  }  else {
    $status=0;
    $sname="Activate";
    $style="success";
  }
  ?>

  <tr>

   <td style="height:45px"><?php echo $row['package_name']; ?></td>
   <td style="height:45px"><?php echo $row['suitable_for']; ?> People</td>
   <td style="height:45px">Rs. <?php echo $row['package_price']; ?></td>
   <td style="height:45px"><?php echo $row['package_status']." ".$row['cus_lname'] ?></td>
   <td style="height:45px"><?php echo $nopo; ?></td>

   <td>
     <a href="../view/viewpackage.php?package_id=<?php echo $row ['package_id']; ?>">
      <button type="button" class="btn btn-light" data-toggle="tooltip" data-placement="top" title="View package Details">View</button>
    </a>
    <a href="../controller/packagecontroller.php?package_id=<?php echo $row ['package_id'];?>&status=<?php echo $status;?>&action=ACDAC">
      <button type="button" class="btn btn-<?php echo $style; ?>" onclick="return confirmation('<?php echo $sname;?>')">
        <?php  echo $sname; ?>
      </button>
    </a>


    <?php if($count==0){ ?>
      <a href="../controller/packagecontroller.php?package_id=<?php echo $row ['package_id'];?>&action=Delete">
        <button type="button" class="btn btn-warning"  onclick="return confirmation('Delete','A Package')">
          Delete
        </button>
      </a>
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

    var r=confirm("Do you want to" +str+ " Package ?");

    if(!r){

      return false;
    }
  }

</script> 