<?php
include '../common/sessionhandling.php';
include '../common/dbconnection.php';
include '../model/itemmodel.php';
include '../common/functions.php';
include '../model/customermodel.php';

$obuser = new customer();

$result = $obuser->viewCusLog();
?>

<?php include_once('../common/header.php'); ?>

<html>
<head>
  <meta charset="utf-8">
  
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
  

  <!-- Bootstrap Core CSS -->
  <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/helper.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->

  <script src="https:oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https:oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/ScrollToPlugin.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css" />
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


<!-- use smooth scrolling -->
<script src="../js/smoothscroll.js"></script>

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
     <img src="../images/customer_tracking.png" alt="homepage" class="dark-logo" width="200px" height="100px" align="center" />&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span> CUSTOMER TRACKING</span>
     <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
      <li class="breadcrumb-item active">Customer Trackimg</li>
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
          <h4 class="card-title">Data Export &nbsp; <i class="fas fa-file-export"></i></h4>
          <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
          <div class="table-responsive m-t-40">
            <table id="example23" class="table table-bordered table-hover main" cellspacing="0" width="100%"">
              <thead>
                <tr>
                  <th style="height:30px">Log ID &nbsp;</th>
                  <th style="height:30px">User ID &nbsp;</th>
                  <th style="height:30px">User Name</th>
                  <th style="height:30px">In</th>
                  <th style="height:30px">Out</th>
                  <th style="height:30px">IP Address</th>
                  <th style="height:30px">Elapse Time</th>
                  <th style="height:30px">Status</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Log ID &nbsp;</th>
                  <th>User Name</th>
                  <th>In</th>
                  <th>Out</th>
                  <th>IP Address</th>
                  <th>Elapse Time</th>
                  <th>Status</th>
                </tr>
              </tfoot>
              <tbody>
               <?php
               while ($row = $result->fetch(PDO::FETCH_BOTH)) {
                            $st1 = strtotime($row['log_in_date']); //get login date and convert to seconds
                            $st2 = strtotime($row['log_out_date']); //get logout date and convert to seconds

                            $date1 = date_create($row['log_in_date']); // get login date as date object
                            ?>

                            <tr>
                             <td style="height:55px"><?php echo $row['log_id']; ?> </td>
                             <td style="height:55px"><?php echo $row['cus_id']; ?> </td>

                             <td style="height:55px"><?php echo $row['cus_fname'] . " " . $row['cus_lname']; ?></td>
                             <td style="height:55px"><?php echo $row['log_in_date']; ?></td>
                             <td style="height:55px"><?php echo $row['log_out_date']; ?></td>
                             <td style="height:55px"><?php echo $row['log_ip']; ?></td>
                             <td style="height:55px"><?php
                        if ($row['log_status'] == "logout") { //if logstatus is log out
                            $date2 = date_create($row['log_out_date']); // get logout date as date object                    

                            
                          }
                        else{ //if status is not log out
                             $date2= date_create(date("Y-m-d H:i:s"));// get date 2  datetime as now time
                             


                           }
                        //echo date("Y-m-d H:i:s");
                         $diff= date_diff($date1, $date2);//get the difference of datepbjects
                         $stime =$diff->format("%a"). "d&nbsp;" .$diff->format("%H") . "h&nbsp;" . $diff->format("%I") . "m&nbsp;" . $diff->format("%S"). "s&nbsp;" ; //display difference as hours minits and seconds
                        //%a is used to get number of days
                         echo $stime;
                         ?></td>
                         <td><?php echo $row['log_status']; ?></td>

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