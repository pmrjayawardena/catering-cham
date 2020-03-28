<?php

include '../common/sessionhandling.php';
include '../common/dbconnection.php';
include '../common/functions.php';
include '../model/itemcategorymodel.php';
include '../model/featuremodel.php';
include '../model/categorymodel.php';
include '../model/itemmodel.php';

$obcat=new category;
$resultc=$obcat->displayAllCategory();


$obitem = new item();
$result = $obitem->viewAllItems();


$obstock=new stock();
$result=$obstock->viewallstockbalance();
$obf=new feature();
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
     <img src="../images/food1.jpg" alt="homepage" class="dark-logo" width="200px" height="100px" align="center" />&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span> ITEM MANAGEMENT</span>
     <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="../view/item_management.php">Item Management</a></li>
      <li class="breadcrumb-item active">View Item Category</li>
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
            <a href="../view/addtoitemcategory.php" >
              <button type="button" class="btn btn-info">
                <i class="fas fa-book-open"></i>
                Add To Item Category
              </button>
            </a>

          </div>
          <h4 class="card-title">Data Export &nbsp; <i class="fas fa-file-export"></i></h4>
          <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
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
              <thead class="table-secondary">
                <tr>
                  <th>Item ID</th>
                  <th>Item Name</th>
                  <th>Item Category</th>
                  <th>Flavour</th>
                  <th>Size</th>
                  <th></th>

                </tr>
              </thead>
              <tfoot class="table-active">
                <th>Item ID</th>
                <th>Item Name</th>
                <th>Item Category</th>
                <th>Flavour</th>
                <th>Size</th>
                <th></th>


              </tfoot>

              <tbody>
               <?php
               while ($row = $result->fetch(PDO::FETCH_BOTH)) {
                 $item_id=$row['item_id'];
                 $resultitem=$obitem->viewAnItem($item_id);   
                 $rowitem=$resultitem->fetch(PDO::FETCH_BOTH);


                 $resultc=$obf->displayAFeature($row['flavour_id']);
                 $results=$obf->displayAFeature($row['size_id']);

                 $rowc=$resultc->fetch(PDO::FETCH_BOTH);
                 $rows=$results->fetch(PDO::FETCH_BOTH);

                 $flavour_id=$row['flavour_id'];
                 $size_id=$row['size_id'];
                 $item_id=$row['item_id'];

                 $resultsq=$obstock->getStockQuantity($item_id,$flavour_id,$size_id);
                 $rowsq=$resultsq->fetch(PDO::FETCH_BOTH);
                 
                 ?>

                 <tr>
                  <td><?php echo $row['item_id'];  echo "$noi";?></td>

                  <td> <?php echo $rowitem['item_name']  ?></td>
                  <td> <?php echo $rowitem['cat_name']." ".$rowitem['brand_name'];  ?></td>
                  
                  <td><?php echo $rowc['f_name']; ?></td>
                  <td><?php echo $rows['f_name']; ?></td>

                  <td></td>



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

    var r=confirm("Do you want to" +str+ "Item ?");

    if(!r){

      return false;
    }
  }

</script> 
<script type="text/javascript">

  function confirmation1 (str) {

    var r=confirm("Do you want to" +str+ "Category ?");

    if(!r){

      return false;
    }
  }

</script> 