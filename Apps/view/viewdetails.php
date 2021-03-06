<?php

include '../common/sessionhandling.php';
include '../common/dbconnection.php';
include '../common/functions.php';
include '../model/categorymodel.php';
include '../model/allocationmodel.php';
include '../model/drivermodel.php';

$obd=new driver();
$obj=new allocate();
$result=$obj->viewallallocations();


$resultd=$obd->displayAllDriver();
$resultv=$obd->displayAllVehicle1()

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

      message: 'Successfully Changed Vehicle Details!',
    });</script>";
  }


  ?>

  <?php 
  if(isset($_GET['msg'])){

    $message=$_GET['msg'];

    if($message==6)

      echo "<script type='text/javascript'>iziToast.warning({
        title: 'Opps!',
        message: 'You forgot important data',
      });</script>";
    }


    ?>

    <?php 
    if(isset($_GET['msg'])){

      $message=$_GET['msg'];

      if($message==6)

        echo "<script type='text/javascript'>iziToast.warning({

          message: 'Successfully Deleted Profile!',
        });</script>";
      }


      ?>

      <?php 
      if(isset($_GET['msg'])){

        $message=$_GET['msg'];

        if($message==7)

          echo "<script type='text/javascript'>iziToast.warning({
            title: 'Opps!',
            message: 'Soemthing Went Wrong',
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
     <img src="../images/driver.png" alt="homepage" class="dark-logo" width="80px" height="80px" align="center" />&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span> VIEW DETAILS</span>
     <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="../view/allocation_management.php">Allocation Management</a></li>
      <li class="breadcrumb-item active">View Details</li>
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


         <h4 class="card-title">Driver Details &nbsp; <i class="fas fa-file-export"></i></h4>
         <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
         <div style="text-align: center">
          <?php
          if(isset($_GET['msg'])){
            $msg= base64_decode($_GET['msg']);
            if($_GET['id']==8){
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
                <th style="height:40px">DRIVER ID</th>
                <th style="height:40px">DRIVER NAME</th>
                <th style="height:40px">DRIVER LICENSE NUMBER</th>
                <th style="height:40px">DRIVER ADDRESS</th>
                <th style="height:40px">DRIVER EMAIL</th>
                <th style="height:40px">DRIVER TELEPHONE</th>
                <th style="height:40px">DRIVER DOB</th>
                <th style="height:40px"></th>
              </tr>
            </thead>


            <tbody>
             <?php
             while ($row = $resultd->fetch(PDO::FETCH_BOTH)) {

               $arr=array("allocate","delivery");
               $driver_id=$row['driver_id'];
               $count=0;
               foreach ($arr as $v) {
                 $count+=checkDriverDelete($v,"driver_id",$driver_id);
                 
               }

               if($row['note']== "Not Allocated"){
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
               <td style="height:45px"><?php echo $row['driver_id']; ?></td>
               <td style="height:45px"><?php echo $row['driver_fname']."  ".$row['driver_lname']; ?></td>
               <td style="height:45px"><?php echo $row['driver_license_no']; ?></td>
               <td style="height:45px"><?php echo $row['driver_address']; ?></td>
               <td style="height:45px"><?php echo $row['driver_email']; ?></td>
               <td style="height:45px"><?php echo $row['driver_tel']; ?></td>
               <td style="height:45px"><?php echo $row['driver_dob']; ?></td>
               
               
               <td>
                 
                 
                <a href="../view/updatedriver.php?driver_id=<?php echo $row['driver_id'];?>"><button type="button" class="btn btn-primary">Update</button></a> 
                <?php if($count==0){ ?>
                  <a href="../controller/drivercontroller.php?driver_id=<?php echo $row['driver_id'];?>&action=DeleteD">
                    <button type="button" class="btn btn-danger"  onclick="return confirmation1('Delete','A Driver')">
                      Delete
                    </button>
                  </a>   
                <?php } ?>              
              </td>

            </tr>
          <?php } ?>


        </tbody>
      </table>
      <br>
      <br>
      <a href="../view/allocation_management.php"><button type="" style="float: right;" class="btn btn-info btn-md btn-block">go back</button></a>
    </div>
  </div>
</div>



<hr>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">

       <h4 class="card-title">Vehicle Details &nbsp; <i class="fas fa-file-export"></i></h4>
       
       <div style="text-align: center">
        <?php
        if(isset($_GET['msg2'])){
          $msg= $_GET['msg2'];
          if($_GET['id']==7){
            $style="alert-success";
          }else{
            $style="alert-danger";
          }
          echo "<span class='".$style."'>".$msg2."</span>";
        }
        ?>
        
      </div>
      <div class="table-responsive m-t-40">
        <table id="example23" class="table table-hover" cellspacing="0" width="100%"">
          <thead class="table-secondary">
            <tr>
              <th style="height:40px">Vehicle ID</th>
              <th style="height:40px">Vehicle Number</th>
              
              <th style="height:40px"></th>
            </tr>
          </thead>


          <tbody>
           <?php
           while ($row = $resultv->fetch(PDO::FETCH_BOTH)) {

             $arr=array("allocate","delivery");
             $v_id=$row['v_id'];
             $count=0;
             foreach ($arr as $v) {
               $count+=checkVehicleDelete($v,"v_id",$v_id);
             }
             if($row['note']== "Not Allocated"){
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
             <td style="height:45px"><?php echo $row['v_id']; ?></td>
             <td style="height:45px"><?php echo $row['v_no']."  ".$row['driver_lname']; ?></td>
             <td>
               <a href="../view/updatevehicle.php?v_id=<?php echo $row ['v_id']; ?>">
                <button type="button" class="btn btn-primary">Update</button>
              </a> 
              <?php if($count==0){ ?>
                <a href="../controller/drivercontroller.php?v_id=<?php echo $row['v_id'];?>&action=Delete">
                  <button type="button" class="btn btn-danger"  onclick="return confirmation1('Delete','A Vehicle')">
                    Delete
                  </button>
                </a> 
              <?php }?>            
            </td>

          </tr>
        <?php } ?>


      </tbody>
    </table>
    <br>

    <a href="../view/allocation_management.php"><button type="" style="float: right;" class="btn btn-info btn-md btn-block">go back</button></a>
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

<script type="text/javascript">

  function confirmation (str) {

    var r=confirm("Do you want to" +str+ "Driver ?");

    if(!r){

      return false;
    }
  }

</script> 