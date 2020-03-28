<?php

include '../common/sessionhandling.php';
$role_id=$userinfo['role_id'];
include '../common/dbconnection.php';
include '../model/usermodel.php';
include '../common/functions.php';



echo $search=$_REQUEST['search'];


$obuser=new user();
 //search user with a keyword($search) 5 per page
$results=$obuser->viewSearchUser($search);
$nor=$results->rowCount();
$nop =  ceil($nor/5);

if(!isset($_GET['page']) || $_GET['page']==1){
 $start=0;
 $page=1;
}else{
 $page=$_GET['page'];
 $start=$page*5-5;
}
$limit=5;
 $result=$obuser->viewSearchUserLimited($search,$start, $limit) // limit users by a parameter $search
 ?>


 <?php include_once('../common/header.php'); ?>

 <html>
 <head>
  <meta charset="utf-8">
  
  <title>OCS</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
  <script src="../sweetalert/sweetalert.min.js" ></script>
  <link rel="stylesheet" type="text/css" href="../sweetalert/sweetalert.css">
</head>

<?php if(isset($_GET['msg1'])){ 
  
 
 echo "<script type='text/javascript'> swal('ok!', 'User Added', 'success');</script>";

 
} ?>
<?php if(isset($_GET['msgsd'])){ 
  
 
 echo "<script type='text/javascript'> swal('ok!', 'User is deactivated', 'success');</script>";

 
} ?>
<?php if(isset($_GET['msgsa'])){ 
  
 
 echo "<script type='text/javascript'> swal('ok!', 'User is activated', 'success');</script>";

 
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
    <div class="col-md-5 align-self-center">
      <h3 class="text-primary">SEARCH USER</h3> </div>
      <div class="col-md-7 align-self-center">
        <span> Search user</span>
        <ol class="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
            <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="../view/user_management.php">User Management</a></li>
            <li class="breadcrumb-item active">Search User</li>
          </ol>
        </div>
      </div>
      <!-- End Bread crumb -->
      <!-- Container fluid  -->
      <div class="container-fluid">
        <!-- Start Page Content -->
        
        
        <div class="col-md-6">
          
          <p>
            Keyword:<span class="text-info"><?php echo $search;?></span>
          </p>
        </div>
        
        <div class="col-md-6">
          <p style="text-align: right;">
            Number of Records:<span class="text-info"><?php echo $nor;?></span>
          </p>
        </div>

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
            <i class="fas fa-search"></i>&nbsp;
            <input class="form-control mr-sm-2" type="text" name="search" id="search" placeholder="Enter a Keyword" aria-label="Search" size="61">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
          </form>
        </p>
      </div><!-- /.col-lg-6 -->

      <!-- user table -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-title">
            

          </div>
          <div class="card-body">
            <div class="table-responsive">

              <?php if($nor!=0){?>
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
                      <tr>
                        <td><img src="<?php echo $uimage; ?>" class="style1" width="50px" height="50px" /></td>
                        <td><?php echo $row['user_id'];?></td>


                        <td>
                          <?php 
                          $data1=highlightKeyWord($search,$row['user_fname']);

                          echo $data1." ".highlightKeyWord($search,$row['user_lname']); ?>
                        </td>

                        
                        <td><?php  echo highlightKeyWord($search,$row['user_gender']); ?></td>
                        
                        <td><?php echo $row['role_name'];?></td>
                        <td><?php echo $row['user_status']; ?></td>
                        <td>
                          <a href="../view/viewuser.php?user_id=<?php echo $row ['user_id']; ?>">
                            <button type="button" class="btn btn-info">View</button>
                          </a>
                          <a href="../view/updateuser.php?user_id=<?php echo $row ['user_id']; ?>">
                            <button type="button" class="btn btn-success">Update</button>
                          </a>
                          <a href="../controller/usercontroller.php?user_id=<?php echo $row ['user_id'];?>&status=<?php echo $status;?>&action=ACDAC&search=<?php echo $search;?>&page=<?php echo $page;?>">
                            <button type="button" class="btn btn btn-<?php echo $style ?>">
                              <?php  echo $sname; ?>
                            </button>
                          </a>
                          
                        </td>
                        <td></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              <?php }else{

                ?>

                <span>no</span>
              <?php }?>
              <center>
                <nav class="container">
                  <ul class="pagination">
                    
                    <?php 
                    for($i=1; $i<=$nop; $i++) {
                      ?>
                      <li class="page-item"><a class="page-link" href="../view/searchuser.php?page=<?php echo $i;?>&search=<?php echo $search;?>"><?php echo $i; ?></a></li>
                    <?php } ?>
                    
                  </ul>
                </nav>
              </center>
            </div>
          </div>
        </div>

        
        
        
      </div>
      
      <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->
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