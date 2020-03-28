<?php
include '../common/sessionhandling.php';
include '../common/dbconnection.php';
include '../common/functions.php';
include '../model/categorymodel.php';
include '../model/allocationmodel.php';
include '../model/reportmodel.php';


$f=$_POST['from'];
$t=$_POST['to'];


$obj=new report();
$result2=$obj->paymentAnalysisByDate($f, $t);
$result3=$obj->paymentAnalysisByDate_each($f, $t);
$nor=$result2->rowCount();
$nor1=$result3->rowCount();

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
     <img src="../images/blurred.jpg" alt="homepage" class="dark-logo" width="200px" height="100px" align="center" />&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span> REPORT MANAGEMENT</span>
     <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="../view/report_management.php">Report Management</a></li>
      <li class="breadcrumb-item active">Order Analysis</li>
    </ol>
  </div>

</div>
<!-- End Bread crumb -->
<!-- Container fluid  -->
<div class="container-fluid">
  <!-- Start Page Content -->


  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
  rel="stylesheet">

  <script>
    function printDiv(divID) {

      var prtContent = document.getElementById(divID);
      var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=600,toolbar=0,scrollbars=0,status=0');
      WinPrint.document.write(prtContent.innerHTML);
      WinPrint.document.close();
      WinPrint.focus();
      WinPrint.print();
      WinPrint.close();
      

      
    }
  </script>




  <!-- user table -->


  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div>


           <!-- Start Page Content -->
           <form action="../view/orderanalysisbydates.php">
            <div class="row">
              <div class="col-md-4">
                From:
                <?php echo $_POST['from']; ?>
                
                <!--<h4>  From: <input type="date" name="from" class="input-sm"/></h4>-->
              </div>
              <div class="col-md-4">
                <!--<h4>  To: <input type="date" name="to" class="input-sm"/></h4>-->
              </div>
              <div class="col-md-4">
                To:
                
                <?php echo $_POST['to']; ?>
                <!--<h4>   <input type="submit" class="btn btn-success input-sm" name="Generate" value="Generate"/></h4>-->
              </div>
              <div class="col-md-4">
                No of Records:
                
                <?php echo $nor; ?>
                <!--<h4>   <input type="submit" class="btn btn-success input-sm" name="Generate" value="Generate"/></h4>-->
              </div>
            </div>
          </form>
          <?php if($nor==0){
            echo "<div class='alert alert-danger'>No records</div>";
          }else{
            ?>
            <div id="section-to-print">
              <table class="table">
                <tr>
                  <td>No of Payments</td>
                  <td>Payment Date</td>
                  <td>Total Revenue</td>
                  
                </tr>
                <?php while($rowres=$result3->fetch(PDO::FETCH_BOTH)){


                  ?>
                  <tr>

                    <td><?php echo $rowres['ct']; ?></td>
                    <td><?php echo $rowres['payment_date']; ?> </td>
                    <td>Rs <?php echo $rowres['S']; ?> </td>
                  </tr>

                  
                <?php } ;?>
              </table>
            </div>
          </div>
          
        <?php } ?>
        
        <div style="text-align: center">
          <input type="image" src="../images/print.png"  width="50px" height="70px" onclick="javascript:printDiv('section-to-print')"/>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


          <a href="../view/paymentanalysisbydatespdf.php?from=<?php echo $f; ?>&to=<?php echo $t; ?>" target="blank">
            <input type="image" src="../images/pdf.png"  width="50px" height="70px" />
          </a>
        </div>
      </div>

 
<!--                    <div class="row">
                        <div class="col-md-4">
                            <h4> Year :
                        </div>
                        <div class="col-md-4">
                            <h4> (No of Booking per Month) </h4>
                        </div>
                        <div class="vol-md-4">
                            <h4><input type="submit" class="btn btn-success input-sm" name="Generate" value="Generate"</h4>
                        </div>
                            
                      </div>-->
                      
                    </div>
                  </div>
                  
                </div>

              </div>


              
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
