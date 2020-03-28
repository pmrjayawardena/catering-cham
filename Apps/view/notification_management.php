<?php
$m_id=9;
include "../model/notificationmodel.php";
include '../common/sessionhandling.php';
include '../common/functions.php';

$role_id=$userinfo['role_id'];

$countm=checkModuleRole($m_id, $role_id);
 if($countm==0){ //to check user previlages
   $msg=base64_encode("You dont have permission to access to this Module");
   header("Location:../view/login.php?msg=$msg");
 }


$user_id=$userinfo['user_id'];
$obj=new notification();
$result=$obj->viewallNotification();
$resultz=$obj->viewallNotificationbyuser($user_id);



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

                  <?php 
              if(isset($_GET['msg'])){

                $message=$_GET['msg'];

                if($message==5)

                  echo "<script type='text/javascript'>iziToast.success({
    title: 'Success!',
    message: 'Offer Claimed',
});</script>";
                }


                ?>


                  <?php 
              if(isset($_GET['msg'])){

                $message=$_GET['msg'];
$notification_id=$_REQUEST['notification_id'];
                if($message==6)

                  echo "<script type='text/javascript'>iziToast.warning({
    title: 'Deleted!',
    message: 'Notification ID $notification_id Removed',
});</script>";
                }


                ?>
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
            url : '../view/fetch_record_notify.php', //Here you will fetch records 
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
     <img src="../images/bellanime.gif" alt="homepage" class="dark-logo" width="140px" height="100px" align="center" />&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span> NOTIFICATION MANAGEMENT</span>
     <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
      <li class="breadcrumb-item active">Notification Management</li>
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
         <div>
          <a href="../view/addnotification.php" >
            <button type="button" class="btn btn-info">
             <i class="far fa-bell"></i>
             Add User Notifications
           </button>
         </a>
      <a href="../view/addnotificationstocustomers.php" >
            <button type="button" class="btn btn-info">
            <i class="fas fa-comments"></i>
             Add Customer Notifications
           </button>
         </a>
       </div>
       <h4 class="card-title">ALL NOTIFICATIONS &nbsp; <i class="fas fa-bell"></i></h4>
                  <div style="text-align: center">
                      
                        
                    </div>
       <div class="table-responsive m-t-40">
        <table id="example231" class="table table-hover" cellspacing="0" width="100%"">
          <thead class="table-active">
            <tr>
              <th>&nbsp;</th>
              <th>Notification ID</th>
              <th>Offer Number</th>
              <th>Date and Time</th>
              <th>Sent By</th>
              <th>Category</th>
    
              <th>&nbsp;</th>

            </tr>
          </thead>
          <tfoot class="table-active">
            <tr>
             <th>&nbsp;</th>
             <th>Notification ID</th>
             <th>Offer Number</th>
             <th>Date and Time</th>
             <th>Sent By</th>
             <th>Category</th>

             <th>&nbsp;</th>


           </tr>
         </tfoot>
         <tbody>

           <?php
           while ($rownot=$result->fetch(PDO::FETCH_BOTH)) {


            ?>
            <tr>
              <td></td>
              <td><?php echo $rownot['notification_id']; ?></td>
              <td><?php echo $rownot['offer_number']; ?></td>
              <td><?php echo $rownot['notification_date']; ?></td>
              <td><?php echo $rownot['role_name']; ?></td>
              <td><?php echo $rownot['notification_category']; ?></td>

              <td>
                <a href="../view/viewallnotification.php?notification_id=<?php echo $rownot['notification_id'];?>">
                <button type="button" class="btn btn-secondary">View</button>
</a>
                <a href="../controller/notificationcontroller.php?notification_id=<?php echo $rownot['notification_id'];?>&action=Delete">
                  <button type="button" class="btn btn-danger"  onclick="return confirmation('Delete','A Notification')">
                    Delete
                  </button>
                </a>
                 
                 <?php if($rownot['offer_status']=="Unclaimed"){ ?>
                     <a href="../controller/notificationcontroller.php?notification_id=<?php echo $rownot['notification_id'];?>&action=claim">
                  <button type="button" class="btn btn-success"  onclick="return confirmation('Claim','A Offer')">
                    Claimed
                  </button>
                </a>

              <?php }?>
              </td>

            </tr>
          <?php } ?>


        </tbody>
      </table>
    </div>
  </div>
</div>


  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">

       <h4 class="card-title">Your Notifications &nbsp; <i class="fas fa-bell"></i></h4>
      
       <div class="table-responsive m-t-40">
        <table id="example231" class="table table-hover" cellspacing="0" width="100%"">
          <thead class="table-secondary">
            <tr>
              <th>&nbsp;</th>
              <th>Notification ID</th>
              <th>Date and Time</th>
              <th>Sent By</th>
              <th>Category</th>
              <th>&nbsp;</th>

            </tr>
          </thead>
          <tfoot class="table-active">
            <tr>
             <th>&nbsp;</th>
             <th>Notification ID</th>
             <th>Date and Time</th>
             <th>Sent By</th>
             <th>Category</th>
             <th>&nbsp;</th>


           </tr>
         </tfoot>
         <tbody>

           <?php
           while ($rownot=$resultz->fetch(PDO::FETCH_BOTH)) {


            ?>
            <tr>
              <td></td>
              <td><?php echo $rownot['notification_id']; ?></td>
              <td><?php echo $rownot['notification_date']; ?></td>
              <td><?php echo $rownot['role_name']; ?></td>
              <td><?php echo $rownot['notification_category']; ?></td>

              <td>
                <a href="../view/viewnotification.php?notification_id=<?php echo $rownot['notification_id'];?>">
                <button type="button" class="btn btn-info">View</button>
</a>
                <a href="../controller/notificationcontroller.php?notification_id=<?php echo $rownot['notification_id'];?>&action=Delete">
                  <button type="button" class="btn btn-danger"  onclick="return confirmation('Delete','A Notification')">
                    Delete
                  </button>
                </a>
              </td>

            </tr>
          <?php } ?>


        </tbody>
      </table>
    </div>
  </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

   Modal content
   <div class="modal-content fetched-data">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Modal Header</h4>
    </div>
    <div class="modal-body">
      <p>Some text in the modal.</p>
      <div class="fetched-data"></div> 
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>

</div>
</div>
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

    var r=confirm("Do you want to " +str+ " Notification ?");

    if(!r){

      return false;
    }
  }

</script> 
<script type="text/javascript">

  function confirmation1 (str) {

    var r=confirm("Do you want to " +str+ " Category ?");

    if(!r){

      return false;
    }
  }

</script> 