<?php

include '../common/sessionhandling.php';
include '../common/dbconnection.php';
include "../model/customermodel.php";


$obj=new customer();
$r=$obj->viewAllCustomer();



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

<script>
 $(document).ready(function(){
   $('#example').DataTable();
 });
</script> 
<script>
 
 function  disMsg(m){
   var r=confirm("Do you want to "+m+" User ? :)");
   if(r){
     return true;
   }else{
     return false;
   }
 }
 $(document).ready(function(){
  $('#myModal').on('show.bs.modal', function (e) {
    var rowid = $(e.relatedTarget).data('id');
    $.ajax({
      type : 'post',
            url : 'fetch_record_notify.php', //Here you will fetch records 
            data :  'rowid='+ rowid, //Pass $id
            success : function(data){
            $('.fetched-data').html(data);//Show fetched data from database
          }
        });
  });
});
 
</script>
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
      &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span> ADD NOTIFICATION</span>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
        <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="../view/notification_management.php">Notification Management</a></li>
        <li class="breadcrumb-item active">Add Notification</li>
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
    

    <!-- user table -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
           
            <h3>ADD NOTIFICATIONS TO CUSTOMERS</h3>
            <div class="clearfix">&nbsp;</div>
            <div class="clearfix">&nbsp;</div>
            <form method="post" action="../controller/notificationcontroller.php?action=addc" enctype="multipart/form-data"  name="form" id="form">


              <div class="col-md-1">&nbsp;</div>

              <div class="row" >
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-2">Receiver's</div>
                <div class="col-md-3">
                  <select name="cus_id" id="cus_id"  class="form-control form-control-lg">
                    <option>Select All</option>
                    <?php while($rowd=$r->fetch(PDO::FETCH_BOTH)){?>
                      <option value="<?php echo $rowd['cus_id'];?>"> <?php echo $rowd['cus_fname']." ".$rowd['cus_lname']; ?>
                    </option>
                  <?php } ?>
                </select>

              </div>

              <div class="col-md-1">Category</div>
              <div class="col-md-3">
                <select name="no_cat" id="no_cat" class="form-control form-control-lg">
                  <option>Reservation</option>
                  <option>Allocation</option>
                  <option>Update</option>
                  <option>News</option>
                  <option>Alerts</option>
                  
                </select>
              </div>
              <div class="col-md-1">&nbsp;</div>

            </div>
            
          </br>
          <div class="col-md-1">&nbsp;</div>

          <div class="col-md-1">&nbsp;</div>
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">

              <div class="breadcrumb">
               
              </div>
            </section>

            <!-- Main content -->
            <section class="content">
              <div class="row">
                <div class="col-md-12">
                  <div class="box box-info">
                    <div class="box-header">
                      <h3 class="box-title"> 
                      </h3>
                      <!-- tools box -->
                      <div class="pull-right box-tools">
                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fa fa-times"></i></button>
                      </div>
                      <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                      
                      <textarea id="editor1"  rows="10" cols="80" name="msg" id="msg">
                        
                      </textarea>

                      <br/>
                      <div class="col-lg-6 col-md-6 col-md-6">
                        <button name="submit" id="submit" type="submit" class="btn btn-primary">
                          <i class="glyphicon glyphicon-save"></i>send
                        </button>
                        
                        
                      </div>

                      
                    </div>
                    <br/>

                    
                    
                    
                  </div>
                  <!-- End form-->         
                </div>
              </div>

              <!-- start row 7 --->


            </form> 


          </div>
        </section>

        <!-- -->


        <!-- footer -->
      </div>





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
      <script src="../bower_components/ckeditor/ckeditor.js"></script>
      <!--Custom JavaScript -->

      <script>
        $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
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