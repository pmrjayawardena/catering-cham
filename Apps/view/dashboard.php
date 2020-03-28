  <?php
  include '../common/sessionhandling.php';
  include '../common/dbconnection.php';
  include '../model/usermodel.php';
  include '../model/logmodel.php';
  include '../model/ordermodel.php';
  include '../model/paymentmodel.php';
  $obp=new payment;
  $oblog= new log();
  $oborder=new order;
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

  <html>
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

   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script>
    google.charts.load('current', {'packages':['line', 'corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        //var button = document.getElementById('change-chart');
        var chartDiv = document.getElementById('chart_div');

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Date');
        data.addColumn('number', "Number of Logins");
        //data.addColumn('number', "Average Hours of Daylight");

        data.addRows([
         <?php for($i=6;$i>=0;$i--){ 
           $date=date('Y-m-d', strtotime($cdate." - $i days")); 
           
           $r=$oblog->countlogFrequency($date);
           $n=$r->rowCount();
           ?>
           ["<?php echo $date ?>",<?php echo $n; ?>],
         <?php } ?>
         ]);

        var materialOptions = {
          chart: {
            title: 'Login Frequency for Current Week'
          },
          width: 800,
          height: 400,
          series: {
            // Gives each series an axis name that matches the Y-axis below.
            0: {axis: 'Temps'},
            1: {axis: 'Daylight'}
          },
          axes: {
            // Adds labels to each axis; they don't have to match the axis names.
            y: {
              Temps: {label: 'No of logins'},
              Daylight: {label: 'Daylight'}
            }
          }
        };

        var classicOptions = {
          title: 'Average Temperatures and Daylight in Iceland Throughout the Year',
          width: 900,
          height: 500,
          // Gives each series an axis that matches the vAxes number below.
          series: {
            0: {targetAxisIndex: 0},
            1: {targetAxisIndex: 1}
          },
          vAxes: {
            // Adds titles to each axis.
            0: {title: 'No of Logins'},
            1: {title: 'Daylight'}
          },
          hAxis: {
            ticks: [new Date(2014, 0), new Date(2014, 1), new Date(2014, 2), new Date(2014, 3),
            new Date(2014, 4),  new Date(2014, 5), new Date(2014, 6), new Date(2014, 7),
            new Date(2014, 8), new Date(2014, 9), new Date(2014, 10), new Date(2014, 11)
            ]
          },
          vAxis: {
            viewWindow: {
              max: 30
            }
          }
        };

        function drawMaterialChart() {
          var materialChart = new google.charts.Line(chartDiv);
          materialChart.draw(data, materialOptions);
          button.innerText = 'Change to Classic';
          button.onclick = drawClassicChart;
        }

        function drawClassicChart() {
          var classicChart = new google.visualization.LineChart(chartDiv);
          classicChart.draw(data, classicOptions);
          button.innerText = 'Change to Material';
          button.onclick = drawMaterialChart;
        }

        drawMaterialChart();

      }
    </script>
  </head>



  <li>
   <?php include_once('../common/modules.php'); ?>
   
 </li>

</div>
<!-- End Sidebar scroll-->
</div>
<!-- End Left Sidebar  -->
<!-- Page wrapper  -->
<div class="page-wrapper">

  <!-- Container fluid  -->
  <div class="container-fluid">


    <!-- Start Page Content -->
    <div class="alert alert-secondary" role="alert" height="50px">
      <h4 class="alert-heading">Wellcome!</h4>
      <h3 class="text-dark"><?php echo $userinfo['user_fname']." ".$userinfo['user_lname']; ?>&nbsp;&nbsp;&nbsp;<i><img class="style1" src="<?php echo $iname; ?>" width="90px" height="50px"></i></h3>
      <hr>
      &nbsp;<?php echo $userinfo['role_name']; ?>
    </div>

    <!-- Start of Number Of User Registrations -->
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

    <!-- RECENT PURCHASES -->
    <div class="panel">
      <div class="panel-heading">
        <h3 class="panel-title">Orders to be Dispatched</h3>
        <div class="right">
          <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
          <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
        </div>
      </div>
      <div class="panel-body no-padding">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Order No.</th>
              <th>Order Date</th>
              <th>Order Status</th>
              <th>Customer Name</th>
              <th>Customer Tel</th>
            </tr>
          </thead>
          <tbody>

            <?php while($row=$resulto->fetch(PDO::FETCH_BOTH)) { 

              ?>
              <tr>
               
               <td style="height:45px"><?php echo $row['order_id']; ?></td>
               <td style="height:45px"><?php echo $row['order_date']; ?></td>
               <td style="height:45px"><span class="label label-success">


<?php if($row['dispatch_status']==""){ ?>
                <?php echo "Processing" ?>
                  
<?php }?>

                </span></td>
               <td style="height:45px"><?php echo $row['cus_fname']." ".$row['cus_lname'] ?></td>
               <td style="height:45px"><?php echo $row['cus_tel']; ?></td>

               
               
             </tr>



           <?php } ?>
         </tbody>
       </table>
     </div>
     <div class="panel-footer">
      <div class="row">
        <div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o" aria-hidden="true"></i>
        Last Days</span></div>
        <div class="col-md-6 text-right"><a href="../view/order_management.php" class="btn btn-primary">View All Orders</a></div>
      </div>
    </div>
  </div>
  <!-- END RECENT PURCHASES -->

  <!--  Login Frequency chart --> 
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
       
        <div id="chart_div" align="center"> 
        </div>
      </div>
    </div>

    <div class="col-lg-12">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Latest Users</h3>

          <div class="box-tools pull-right">
            <span class="label label-danger">4 New Users</span>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.box-header -->
        <?php while($row=$result->fetch(PDO::FETCH_BOTH)) { 
          if($row['user_image']==""){
            $uimage="../images/user_icon.png";
          }else{
            $uimage="../images/user_images/".$row['user_image'];
          }
          if($row['user_status']== "Active"){
            $status=1;
            $sname="Deactivate";
            $style="danger";
          }  else {
            $status=0;
            $sname="Activate";
            $style="success";
          }

          ?>
          <div class="box-body no-padding">

            <ul class="users-list clearfix">


              <li>
                <a class="users-list-name" href="../view/viewuser.php?user_id=<?php echo $row['user_id'];?>">
                  <img src="<?php echo $uimage;?>" height="6000px" width="120px" alt="User Image">
                  <hr>
                  <h5><?php echo $row['user_fname']." ".$row['user_lname']; ?></h5>
                  <h6>Date of joined : <?php echo $row['user_doj'];?></h6>
                </li>
                </a
              <?php } ?>
            </ul>


          </div>
          <!-- /.box-body --><br>
          <div class="box-footer text-center">
            <a href="../view/user_management.php" class="btn btn-primary btn-md btn-block">View All Users</a>
          </div>
          <!-- /.box-footer -->
        </div>
        <!--/.box -->
      </div>
      <!-- /.col -->
    </div>


  </div>



  <!-- footer -->
  <?php include_once('../common/footer.php'); ?>






  <!-- Jquery JS-->
  <script src="../vendor/jquery-3.2.1.min.js"></script>

  <!-- Vendor JS       -->
  <script src="../vendor/slick/slick.min.js">
  </script>
  <script src="../vendor/wow/wow.min.js"></script>
  <script src="../vendor/animsition/animsition.min.js"></script>
  <script src="../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
  </script>
  <script src="../vendor/counter-up/jquery.waypoints.min.js"></script>
  <script src="../vendor/counter-up/jquery.counterup.min.js">
  </script>
  <script src="../vendor/circle-progress/circle-progress.min.js"></script>
  <script src="../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="../vendor/chartjs/Chart.bundle.min.js"></script>
  <script src="../vendor/select2/select2.min.js">
  </script>

  <!-- Main JS-->
  <script src="../js/main (2).js"></script>

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


  <script src="../js/lib/calendar-2/pignose.init.js"></script>
  <script src="../bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="../bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- Sparkline -->
  <script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap  -->
  <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- SlimScroll -->
  <script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- ChartJS -->
  <script src="../bower_components/chart.js/Chart.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../dist/js/pages/dashboard2.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>