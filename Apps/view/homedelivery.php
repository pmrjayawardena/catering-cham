<?php
include '../common/sessionhandling.php';
include '../common/dbconnection.php';
include '../model/itemmodel.php';
include '../common/functions.php';
include '../model/usermodel.php';
include '../model/customermodel.php';

$cus_id = $_REQUEST['cus_id'];
$order_id = $_REQUEST['order_id'];
$obc=new customer();


$resultcustomer = $obc->viewACustomerinordering($cus_id);
$rowcustomer=$resultcustomer->fetch(PDO::FETCH_BOTH);
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

  <!-- End Bread crumb -->
  <!-- Container fluid  -->
  <div class="container-fluid">
    <!-- Start Page Content -->


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">


    <!-- user table -->
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="clearfix">&nbsp;</div>
          <div class="list-group-item">
            <div class="list-group-item-heading">          
              <div class="row">

                <div class="col-md-8 col-md-offset-2">                      
                  <form method="post" action="../controller/ordercontroller.php?action=confirmorder&order_id=<?php echo $order_id ?>&cus_id=<?php echo $cus_id ?>" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="inputname">First Name</label>
                      <input type="text" class="form-control form-control-large" id="cus_fname" name="cus_fname" value="<?php echo $rowcustomer['cus_fname']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="inputname">Last Name</label>
                      <input type="text" class="form-control form-control-large" id="cus_lname"  name="cus_lname" value="<?php echo $rowcustomer['cus_lname']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress1">Email</label>
                      <input type="email" class="form-control form-control-large" id="cus_email"  name="cus_email" value="<?php echo $rowcustomer['cus_email']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress2">Address</label>
                      <input type="text" class="form-control form-control-large" id="cus_add" name="cus_add" value="<?php echo $rowcustomer['cus_add']; ?>" required>
                    </div>
                    <div class="row">
                      <div class="col-xs-3">
                        <div class="form-group">
                          <label for="inputZip">Customer City</label>
                          <input type="text" class="form-control form-control-small" id="cus_city" name="cus_city" value="<?php echo $rowcustomer['name_en']; ?>" required>
                        </div>
                      </div>
                      <div class="col-xs-9">
                        <div class="form-group">
                          <label for="inputCity">Zip COde</label>
                          <input type="text" class="form-control" id="zip_code" name="zip_code" value="<?php echo $rowcustomer['zip_code']; ?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress2">Telephone</label>
                      <input type="text" class="form-control form-control-large" id="cus_tel" name="cus_tel" value="<?php echo $rowcustomer['cus_tel']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="inputname">Delivery Date</label>
                      <input type="date" class="form-control form-control-large" id="delivery_date" min="<?php echo date('Y-m-d');?>" name="delivery_date" required>
                    </div>
                    
                    <button class="btn btn-success" type="submit ">Save Address</button>
                  </form>
                </div>
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