<?php
$m_id=5;
include '../common/dbconnection.php';
include '../common/functions.php';
include '../model/ordermodel.php';
include '../common/sessionhandling.php';
include '../model/paymentmodel.php';
$role_id=$userinfo['role_id'];



 
 $oborder=new order;
 $resulto=$oborder->displayAllOrder();
 $resultprocessing=$oborder->displayProcessingOrders();





  ?>

<?php

  include '../model/usermodel.php';
  include '../model/logmodel.php';


  $obp=new payment;
  $oblog= new log();

  $obuser= new user();

  $results=$obp->getSum();
  $rowsum=$results->fetch(PDO::FETCH_BOTH);



  $ru=$obuser->viewAllUser();    
  $nou=$ru->rowCount();      // get the user count

  $rau=$obuser->viewUserBystatus("Active");    //active users
  $noau=$rau->rowCount();                      //number of active users

  $rdu=$obuser->viewUserBystatus("Deactive");   //parsing the parameter Deactive to get number of deactive users
  $nodu=$rdu->rowCount();
  $cdate=date("Y-m-d");
  $fdate=date('Y-m-d', strtotime($cdate.' -7 days'));
  ?>



  <?php include_once('../common/header.php'); ?> 

  <?php 

  $cdate=date('y-m-d');
  $fdate=date("y-m-d",strtotime($cdate.'-7 days'));  





  $resulto=$oborder->displayAllOrderlatest();
  $result=$obuser->viewAllUserlimit();
  ?>
  <?php include_once('../common/header.php'); ?><html>
  <head>
  
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css" />
    <link type="text/css" rel="stylesheet" href="../css/style.css" />
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
    
    
    

    <link href="../css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="../css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">

    
    <script defer src="../plugins/fontawesome-all.js" ></script>
    <script src="../sweetalert/sweetalert.min.js" ></script>
    <link rel="stylesheet" type="text/css" href="../sweetalert/sweetalert.css">

    <!-- Fontfaces CSS-->
    <link href="../css/font-face.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">

    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">


   <!-- Main CSS-->
   <link href="../css/theme.css" rel="stylesheet" media="all">

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
    <p>WELCOME TO CATERING SYSTEM</p>
     <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
    </ol>
  </div>

</div>
<!-- End Bread crumb -->
<!-- Container fluid  -->
<div class="container-fluid">
  <!-- Start Page Content -->
  <div class="col-sm-6 col-lg-3">
      <div class="overview-item overview-item--c1">
        <div class="overview__inner">
          <div class="overview-box clearfix">
            <div class="icon">
              <i class="zmdi zmdi-account-o"></i>
            </div>
            <div class="text">
              <h2><?php echo $nou ?></h2>
              <span>User Registration</span>
            </div>
          </div>
          <div class="overview-chart">
            <canvas id="widgetChart1"></canvas>
          </div>
        </div>
      </div>
    </div>

    <!--  Number Of Active Users --> 

    <div class="col-sm-6 col-lg-3">
      <div class="overview-item overview-item--c2">
        <div class="overview__inner">
          <div class="overview-box clearfix">
            <div class="icon">
              <i class="zmdi zmdi-account-o"></i>
            </div>
            <div class="text">
              <h2><?php echo $noau ?></h2>
              <span>Active Users</span>
            </div>
          </div>
          <div class="overview-chart">
            <canvas id="widgetChart2"></canvas>
          </div>
        </div>
      </div>
    </div>

    <!--  Number Of Deactive Users --> 

    <div class="col-sm-6 col-lg-3">
      <div class="overview-item overview-item--c3">
        <div class="overview__inner">
          <div class="overview-box clearfix">
            <div class="icon">
              <i class="zmdi zmdi-account-o"></i>
            </div>
            <div class="text">
              <h2><?php echo $nodu ?></h2>
              <span>Deactive Users</span>
            </div>
          </div>
          <div class="overview-chart">
            <canvas id="widgetChart3"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3">
      <div class="overview-item overview-item--c4">
        <div class="overview__inner">
          <div class="overview-box clearfix">
            <div class="icon">
              
            </div>
            <div class="text">
              <h2>Rs. <?php echo $rowsum['tm'];  ?>.00</h2>
              <span>total earnings</span>
            </div>
          </div>
          <div class="overview-chart">
            <canvas id="widgetChart4"></canvas>
          </div>
        </div>
      </div>
    </div>

  </div>

<!-- user table -->




<!-- second table -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">




       <div style="text-align: center">


      </div>
      <div class="table-responsive m-t-40">

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

    var r=confirm("Do you want to" +str+ "Order ?");

    if(!r){

      return false;
    }
  }

</script> 