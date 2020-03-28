<?php

include '../common/dbconnection.php';

$y=$_GET['yeard'];

include '../model/reportmodel.php';
$obj=new report();

$arr=array();
for($i=1;$i<=12;$i++){
 $j= sprintf("%02d",$i);
 $pat=$y."-".$j;
 array_push($arr, $pat);

}

$month1=$arr[0];
$count1=$obj->getMonthPayment($month1);
$count11=$obj->getMonthPayment1($month1);

//get the total revenue from payment table
$result1=$obj->paymentAnalysisByDatemonthforbarchart($month1);
$count1new=$result1->fetch(PDO::FETCH_BOTH);


$month2=$arr[1];
$count2=$obj->getMonthPayment($month2);
$count22=$obj->getMonthPayment1($month2);


//get the total revenue from payment table
$result2=$obj->paymentAnalysisByDatemonthforbarchart($month2);
$count2new=$result2->fetch(PDO::FETCH_BOTH);


$month3=$arr[2];
$count3=$obj->getMonthPayment($month3);
$count33=$obj->getMonthPayment1($month3);

//get the total revenue from payment table
$result3=$obj->paymentAnalysisByDatemonthforbarchart($month3);
$count3new=$result3->fetch(PDO::FETCH_BOTH);


$month4=$arr[3];
$count4=$obj->getMonthPayment($month4);
$count44=$obj->getMonthPayment1($month4);

//get the total revenue from payment table
$result4=$obj->paymentAnalysisByDatemonthforbarchart($month4);
$count4new=$result4->fetch(PDO::FETCH_BOTH);


$month5=$arr[4];
$count5=$obj->getMonthPayment($month5);
$count55=$obj->getMonthPayment1($month5);

//get the total revenue from payment table
$result5=$obj->paymentAnalysisByDatemonthforbarchart($month5);
$count5new=$result5->fetch(PDO::FETCH_BOTH);


$month6=$arr[5];
$count6=$obj->getMonthPayment($month6);
$count66=$obj->getMonthPayment1($month6);

//get the total revenue from payment table
$result6=$obj->paymentAnalysisByDatemonthforbarchart($month6);
$count6new=$result6->fetch(PDO::FETCH_BOTH);


$month7=$arr[6];
$count7=$obj->getMonthPayment($month7);
$count77=$obj->getMonthPayment1($month7);

//get the total revenue from payment table
$result7=$obj->paymentAnalysisByDatemonthforbarchart($month7);
$count7new=$result7->fetch(PDO::FETCH_BOTH);


$month8=$arr[7];
$count8=$obj->getMonthPayment($month8);
$count88=$obj->getMonthPayment1($month8);

//get the total revenue from payment table
$result8=$obj->paymentAnalysisByDatemonthforbarchart($month8);
$count8new=$result8->fetch(PDO::FETCH_BOTH);


$month9=$arr[8];
$count9=$obj->getMonthPayment($month9);
$count99=$obj->getMonthPayment1($month9);

//get the total revenue from payment table
$result9=$obj->paymentAnalysisByDatemonthforbarchart($month9);
$count9new=$result9->fetch(PDO::FETCH_BOTH);


$month10=$arr[9];
$count10=$obj->getMonthPayment($month10);
$count1010=$obj->getMonthPayment1($month10);

//get the total revenue from payment table
$result10=$obj->paymentAnalysisByDatemonthforbarchart($month10);
$count10new=$result10->fetch(PDO::FETCH_BOTH);


$month11=$arr[10];
$count1122=$obj->getMonthPayment($month11);
$count112222=$obj->getMonthPayment1($month11);

//get the total revenue from payment table
$result11=$obj->paymentAnalysisByDatemonthforbarchart($month11);
$count11new=$result11->fetch(PDO::FETCH_BOTH);


$month12=$arr[11];
$count12=$obj->getMonthPayment($month12);
$count1212=$obj->getMonthPayment1($month12);

//get the total revenue from payment table
$result12=$obj->paymentAnalysisByDatemonthforbarchart($month12);
$count12new=$result12->fetch(PDO::FETCH_BOTH);


?>
<?php include_once('../common/header.php'); ?><html>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<script>


 google.charts.load('current', {'packages':['bar']});
 google.charts.setOnLoadCallback(drawChart);

 function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Year', 'PayPal', 'Cash'],
    ['January', <?php echo $count1; ?>,<?php echo $count11; ?>],
    ['February', <?php echo $count2; ?>,<?php echo $count22; ?>],
    ['March',<?php echo $count3; ?>,<?php echo $count33; ?>],
    ['April', <?php echo $count4; ?>,<?php echo $count44; ?>],
    ['May', <?php echo $count5; ?>,<?php echo $count55; ?>],
    ['June',<?php echo $count6; ?>,<?php echo $count66; ?>],
    ['July', <?php echo $count7; ?>,<?php echo $count77; ?>],
    ['August', <?php echo $count8; ?>,<?php echo $count88; ?>],
    ['September',<?php echo $count9; ?>,<?php echo $count99; ?>],
    ['October', <?php echo $count10; ?>,<?php echo $count1010; ?>],
    ['November', <?php echo $count1122; ?>,<?php echo $count112222; ?>],
    ['December',<?php echo $count12; ?>,<?php echo $count1212; ?>]
    ]);

  var options = {
    chart: {
      title: 'No of Sales Paypal and Cash',
      subtitle: 'PayPal, Cash',

       width:400,
   height: 500,
    },
    bars: 'vertical',
    vAxis: {format: 'short'},
    height: 400,
    colors: ['#3d58ce', '#218228', '#7570b3']
  };

  var chart = new google.charts.Bar(document.getElementById('chart_div'));

  chart.draw(data, google.charts.Bar.convertOptions(options));

  var btns = document.getElementById('btn-group');

  btns.onclick = function (e) {

    if (e.target.tagName === 'BUTTON') {
      options.vAxis.format = e.target.id === 'none' ? '' : e.target.id;
      chart.draw(data, google.charts.Bar.convertOptions(options));
    }
  }
}
</script>





<script>google.charts.load('current', {packages:['corechart']});
google.charts.setOnLoadCallback(drawStuff);

function drawStuff() {
  var data = new google.visualization.DataTable();
  data.addColumn('string', 'Country');
  data.addColumn('number', 'Revenue Rs');
  data.addRows([
    ['January',<?php echo $count1new[0]; ?>],
    ['February', <?php echo $count2new[0]; ?>],
    ['March', <?php echo $count3new[0]; ?>],
    ['April', <?php echo $count4new[0]; ?>],
    ['May', <?php echo $count5new[0]; ?>],
    ['June', <?php echo $count6new[0]; ?>],
    ['July', <?php echo $count7new[0]; ?>],
    ['August', <?php echo $count8new[0]; ?>],
    ['September', <?php echo $count9new[0]; ?>],
    ['October', <?php echo $count10new[0]; ?>],
    ['November', <?php echo $count11new[0]; ?>],
    ]);

  var options = {
   title: 'Total Revenue in perticular Months',
   width: 1100,
   height: 500,
   legend: 'none',
   bar: {groupWidth: '95%'},
   vAxis: { gridlines: { count: 4 } }
 };

 var chart = new google.visualization.ColumnChart(document.getElementById('number_format_chart'));
 chart.draw(data, options);

 document.getElementById('format-select').onchange = function() {
   options['vAxis']['format'] = this.value;
   chart.draw(data, options);
 };
};</script>


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

<?php if(isset($_GET['msg1'])){ 


 echo "<script type='text/javascript'> swal('Success!', 'New Item Added Successfully', 'success');</script>";


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
     <img src="../images/piechart.png" alt="homepage" class="dark-logo" width="100px" height="50px" align="center" />&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span> REPORT MANAGEMENT</span>
     <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="../view/report_management.php">Report Management</a></li>
      <li class="breadcrumb-item"><a href="../view/orderanalysis.php">Order Analysis</a></li>
      <li class="breadcrumb-item active">Yealy Report</li>
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

           <select id="format-select" class="form form-control-lg">
            <option value="">none</option>
            <option value="decimal" selected>decimal</option>
            <option value="currency">currency</option>
            <option value="short">short</option>
            <option value="long">long</option>
          </select>
          <div id="number_format_chart" style="width: 300px; height: 500px;"></div>
          <!-- Start Page Content -->

          <div id="chart_div"></div>
         

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
