<?php

include '../common/sessionhandling.php';
include '../common/dbconnection.php';
include '../common/functions.php';
include '../model/categorymodel.php';
include '../model/allocationmodel.php';



include '../model/reportmodel.php';
$obj=new report();

$result=$obj->viewActiveUser();

if(isset($_POST['gen'])){
$uid=$_POST['user_id'];

$resultuser=$obj->viewUser($uid);
$rowuser=$resultuser->fetch(PDO::FETCH_BOTH);
$user=$rowuser['username'];

$cdate=  date("Y-m-d");
$ctid= strtotime($cdate);
$arr=array();
for($i=0;$i<=6;$i++){
    $tid=$ctid-$i*60*60*24;
    date("Y-m-d");
    $date=date("Y-m-d","$tid");
    array_push($arr, $date);
}
$nor6=$obj->getLogCount($uid, $arr[0]);
$nor5=$obj->getLogCount($uid, $arr[1]);
$nor4=$obj->getLogCount($uid, $arr[2]);
$nor3=$obj->getLogCount($uid, $arr[3]);
$nor2=$obj->getLogCount($uid, $arr[4]);
$nor1=$obj->getLogCount($uid, $arr[5]);
$nor0=$obj->getLogCount($uid, $arr[6]);

 $cdate=date("Y-m-d");
  $fdate=date('Y-m-d', strtotime($cdate.' -7 days'));


}
?>
<?php include_once('../common/header.php'); ?><html>

  <?php 

  $cdate=date('y-m-d');
  $fdate=date("y-m-d",strtotime($cdate.'-7 days'));  

  ?>
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
     <img src="../images/track.jpg" alt="homepage" class="dark-logo" width="200px" height="100px" align="center" />&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span> REPORT MANAGEMENT</span>
     <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
<li class="breadcrumb-item"><a href="../view/report_management.php">Report Management</a></li>
      <li class="breadcrumb-item active">User Tracking</li>
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


<div class="table_col">
                <form action="trackingreport.php" method="post">
                <!--row1-->
                  <div class="row add_user_form">
                    <div class="columns large-5">
                    <h5>
                     <b style="margin-left:120px; width:60%;">Select User Full Name</b></h5>
                     
                      <select name="user_id" id="user_id" style="margin-left:120px; width:60%;" class="form-control form-control-lg" required >
                        <option>Please select a user</option>
                        <?php 
                    //To fetch (retrieve) data from $result varibale per each record and
                    //display all records using while loop
                        while($row=$result->fetch(PDO::FETCH_BOTH)) { ?>      
                        <option value="<?php echo $row['user_id']; ?>">
                        <?php echo $row['user_fname']." ".$row['user_lname']; ?>
                        </option>
                              <?php } ?>
                      </select>
                             
                             
                    
                  </div>
                  <div class="columns large-7">
                      <button type="submit" name="gen" class="btn btn-info" style="margin-left:200px;">
                        <i style="font-size:20px;" class="fi-graph-bar"></i> Generate a report</button>



                  </div>

                </div>
                </form>
                <br><br>
               <?php if(isset($_POST['gen'])) { ?>
                  <div id="line_top_x" style="padding-left:100px;" ></div>
                <?php } ?>
               <div id="txtHint"></div>
            </div> 
               <div id="chart_div">
            <!-- <div class="columns large-12 custom_page" align="center">
            
            </div>  --> 

        </div>

      
    </div>

</div>
</div>

<!-- End PAge Content -->

</div>


<!-- footer -->
</div>
</div>
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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load('current', {'packages':['line']});
          google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

          var data = new google.visualization.DataTable();
          data.addColumn('number', 'Day');
          data.addColumn('number', 'logged times');

          data.addRows([
            [1,  <?php echo $nor0; ?>],
            [2,  <?php echo $nor1; ?>],
            [3,  <?php echo $nor2; ?>],
            [4,  <?php echo $nor3; ?>],
            [5,  <?php echo $nor4; ?>],
            [6,  <?php echo $nor5; ?>],
            [7,  <?php echo $nor6; ?>],

                     ]);

          var options = {
            chart: {
              title: 'Last 7 days no of logged by user',
              subtitle: 'Day vs No of logged'
            },
            width: 600,
                    height: 400,
                    axes: {
                        x: {
                            0: {side: 'top'}
                        }
                    }
                };

                var chart = new google.charts.Line(document.getElementById('line_top_x'));

                chart.draw(data, options);
            }
    </script>
   
