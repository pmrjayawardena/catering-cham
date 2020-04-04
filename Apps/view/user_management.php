<?php

$m_id=2;
include '../common/sessionhandling.php';
$role_id=$userinfo['role_id'];
include '../common/dbconnection.php';
include '../model/usermodel.php';
include '../common/functions.php';


$obuser=new user();
 $resultn=$obuser->viewAllUser();
 $nor=$resultn->rowCount();
 $nop =  ceil($nor/5);
 
 if(!isset($_GET['page']) || $_GET['page']==1){
   $start=0;
   $page=1;

 }else{
   $page=$_GET['page'];
   $start=$page*5-5;
 }
 $limit=5;
 $result=$obuser->viewUserLimited($start, $limit);


 ?>


 <?php include_once('../common/header.php'); ?>

 <html>
 <head>
  <meta charset="utf-8">
  
  <title>sos</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
  <script src="../sweetalert/sweetalert.min.js" ></script>
  <link rel="stylesheet" type="text/css" href="../sweetalert/sweetalert.css">


  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/ScrollToPlugin.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- use smooth scrolling -->
<script src="../js/smoothscroll.js"></script>

<!-- Alert izitoast -->

<script src="../js/iziToast.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="../css/iziToast.min.css">



</head>

<?php if(isset($_GET['msg1'])){ 


 echo "<script type='text/javascript'> swal('Success!', 'User Added Successfully', 'success');</script>";

 
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
     <img src="../images/usermanagement1.jpg" alt="homepage" class="dark-logo" width="200px" height="100px" align="center" />&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span> USER MANAGEMENT</span>
     <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
      <li class="breadcrumb-item active">User Management</li>
    </ol>
  </div>

</div>
  <!-- End Bread crumb -->
  <!-- Container fluid  -->
  <div class="container-fluid">
    <!-- Start Page Content -->



    <div class="col-lg-6">

      <p>
        <a href="../view/adduser.php" >
          <button type="button" class="btn btn-info">
            <i class="fas fa-user-plus"></i>
            Add User
          </button>
        </a>
      </p>
    </div>



    <div class="col-lg-6">

      <form action="searchuser.php" method="post" class="form-inline my-2 my-lg-0" >
        <i class="ti-search"></i>&nbsp;
        <input class="form-control mr-sm-2" type="text" name="search" id="search" placeholder="Enter a Keyword" aria-label="Search" size="61">
        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
      </form>
    </p>
  </div>



  <!-- user table -->
  <div class="col-lg-12">
    <div class="card">
      <div class="card-title">


      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover ">
            <thead>
              <tr>
                <th>User Image</th>
                <th>User ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Role</th>
                <th>Status</th>

                <th>Action</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php while($row=$result->fetch(PDO::FETCH_BOTH)) { 
                if($row['user_image']==""){
                  $uimage="../images/user_icon.png";
                }else{
                  $uimage="../images/user_images/".$row['user_image'];
                }




                ?>
                <tr>
                  <td><img src="<?php echo $uimage; ?>" class="style1" width="50px" height="50px" /></td>
                  <td><?php echo $row['user_id'];?></td>
                  <td><?php echo $row['user_fname']." ".$row['user_lname']; ?></td>
                  <td><?php echo $row['user_gender']; ?> </td>
                  <td><?php echo $row['role_name'];?></td>
                  <td><?php echo $row['user_status']; ?></td>
                  <td>
                    <a href="../view/viewuser.php?user_id=<?php echo $row ['user_id']; ?>">
                      <button type="button" class="btn btn-info">View</button>
                    </a>
                    <a href="../view/updateuser.php?user_id=<?php echo $row ['user_id']; ?>">
                      <button type="button" class="btn btn-primary">Update</button>
                    </a>


                    <?php
                         if($row['user_status']== "Active"){
                  $status=1;
                  $sname="Deactivate";
                  $style="danger";
                }  else {
                  $status=0;
                  $sname="Activate";
                  $style="success";
                } ?>

                <?php if($userinfo['user_id']!==$row['user_id']){ ?>
                    <a href="../controller/usercontroller.php?user_id=<?php echo $row ['user_id'];?>&status=<?php echo $status;?>&action=ACDAC&page=<?php echo $page;?>">
                      <button type="button" class="btn btn-<?php echo $style; ?>" onclick="return confirmation('<?php echo $sname;?>')">
                        <?php  echo $sname; ?>
                      </button>
                    </a>

                  <?php }?>


                    

                  </td>
                  <td> </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>

          <!-- Pagination -->
          <center>
            <nav class="container">
              <ul class="pagination">

                <?php 
                for($i=1; $i<=$nop; $i++) {
                  ?>
                  <li class="page-item"><a class="page-link" href="../view/user_management.php?page=<?php echo $i;?>"><?php echo $i; ?></a></li>
                <?php } ?>

              </ul>
            </nav>
          </center>

          <!-- end of pagination -->



        </div>
      </div>
    </div>
  </div>

  <!-- End PAge Content -->
</div>
<!-- footer -->
<?php include_once('../common/footer.php'); ?>

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
<script type="text/javascript">

  function confirmation (str) {

    var r=confirm("Do you want to " +str+ " user ?");

    if(!r){

      return false;
    }
  }

</script> 
