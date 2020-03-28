<?php
include '../common/sessionhandling.php';
include '../common/dbconnection.php';
include '../model/itemmodel.php';
include '../common/functions.php';
include '../model/usermodel.php';

$obuser = new user();

$result = $obuser->viewUserLog();


$user_id = $userinfo['user_id'];//To take the user id of the particular person
$obu=new user();
$resultuser = $obu->viewALoggedUser($user_id); //to get the specific user details
$rowuser=$resultuser->fetch(PDO::FETCH_BOTH);


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
  <link href="../css/helper.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
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

<!-- VENDOR CSS -->
<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/vendor/linearicons/style.css">
<!-- MAIN CSS -->
<link rel="stylesheet" href="../assets/css/main.css">
<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
<link rel="stylesheet" href="assets/css/demo.css">
<!-- GOOGLE FONTS -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
<!-- ICONS -->
<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
<link rel="icon" type="image/png" sizes="96x96" href="../assets/img/favicon.png">



<!-- Alert izitoast -->

<script src="../js/iziToast.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="../css/iziToast.min.css">

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
  <div class="row page-titles">
    <div class="col-lg-12 align-self-center">
    </div>
    
    <!-- add here -->



  </div>
  <!-- End Bread crumb -->
  <!-- Container fluid  -->
  <div class="container-fluid">


    <!-- Start Page Content -->


    <div class="main-content">
      <div class="container-fluid">
        <div class="panel panel-profile">
          <div class="clearfix">
            <!-- LEFT COLUMN -->
            <div class="profile-left">
              <!-- PROFILE HEADER -->
              <div class="profile-header">
                <div class="overlay"></div>
                <div class="alert alert-secondary">
                 <img class="img-circle" src="<?php echo $iname; ?>" height="100px" width="100px">

                 <h3 class="name"><?php echo $rowuser['user_fname']." ".$rowuser['user_lname']; ?></h3>
                 <h4><?php echo $rowuser['role_name'];?></h4>
                 <span class="online-status status-available"><?php echo $rowuser['user_status'];?></span>
               </div>
               <div class="profile-stat">
                <div class="row">
                  <div class="col-md-4 stat-item">
                    45 <span>Projects</span>
                  </div>
                  <div class="col-md-4 stat-item">
                    15 <span>Awards</span>
                  </div>
                  <div class="col-md-4 stat-item">
                    2174 <span>Points</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- END PROFILE HEADER -->
            <!-- PROFILE DETAIL -->
            <div class="profile-detail">
              <div class="profile-info">
                <h4 class="heading">Basic Info</h4>
                <ul class="list-unstyled list-justify">
                  <li>Your Name<span><?php echo $rowuser['user_fname']." ".$userinfo['user_lname']; ?></span></li>
                  <li>Mobile <span><?php echo $rowuser['user_tel'];?></span></li>
                  <li>Email <span><?php echo $rowuser['user_email'];?></span></li>
                  <li>Address <span><?php echo $rowuser['user_add'];?></span></li>
                  <li>Date of Birth <span><?php echo $rowuser['user_dob'];?></span></li>
                  <li>Gender <span><?php echo $rowuser['user_gender'];?></span></li>
                  <li>Role <span><?php echo $rowuser['role_name'];?></span></li>
                  <li>Nic <span><?php echo $rowuser['user_nic'];?></span></li>
                </ul>
              </div>
              <div class="profile-info">
                <h4 class="heading">Social</h4>
                <ul class="list-inline social-icons">
                  <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#" class="google-plus-bg"><i class="fa fa-google-plus"></i></a></li>
                  <li><a href="#" class="github-bg"><i class="fa fa-github"></i></a></li>
                </ul>
              </div>
              <div class="profile-info">

              </div>
              
            </div>
            <!-- END PROFILE DETAIL -->
          </div>
          <!-- END LEFT COLUMN -->
          <!-- RIGHT COLUMN -->
          <div class="profile-right">
            <?php 
            if(isset($_GET['msg'])){

              $message=$_GET['msg'];

              if($message==5)

                echo "<script type='text/javascript'>iziToast.success({

                  message: 'Successfully Updated User Details!',
                });</script>";
              }


              ?>
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Update Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="../controller/usercontroller.php?action=updateloggeduser">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label" >First Name</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Email" value="<?php echo $rowuser['user_fname']; ?>" id="user_fname" name="user_fname">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Email" value="<?php echo $rowuser['user_lname']; ?>" id="user_lname" name="user_lname">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Gender</label>

                      <div class="col-sm-10">
                        <input type="radio" name="user_gender" id="male"  class=" " value="Male" <?php echo($rowuser['user_gender']=="Male")?'checked':''; ?>/> Male
                        <input type="radio" name="user_gender" id="female" class=" "  value="Female" <?php echo($rowuser['user_gender']=="Female")?'checked':''; ?>/> Female
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Address</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword3" placeholder="Password" value="<?php echo $rowuser['user_add']; ?>" id="user_add" name="user_add">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Mobile Number</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Password" value="<?php echo $rowuser['user_tel']; ?>" id="user_tel" name="user_tel">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Date of Birth</label>

                      <div class="col-sm-10">
                        <input type="date" class="form-control" id="inputPassword3" placeholder="Password" value="<?php echo $rowuser['user_dob']; ?>" max="<?php echo date('Y-m-d');?>" id="user_dob" name="user_dob">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">NIC</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword3" placeholder="Password" value="<?php echo $rowuser['user_nic']; ?>" id="user_nic" name="user_nic">
                      </div>
                    </div>

                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                 <!--    <button type="submit" class="btn btn-default">Cancel</button>
                  <button type="submit" class="btn btn-info pull-right" value="Update" name="up">Update</button> -->
                </div>
                <br>
                <!-- /.box-footer -->
              </form>
            </div>
          </div>


          <!-- change password form -->
          <div class="profile-right">
            <?php 
            if(isset($_GET['msg'])){

              $message=$_GET['msg'];

              if($message==4)

                echo "<script type='text/javascript'>iziToast.success({

                  message: 'Successfully Changed Password!',
                });</script>";
              }


              ?>
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Change Password</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="../controller/passwordcontroller.php?action=add" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="user_email" name="user_email" placeholder="Email" value="<?php echo $userinfo['user_email']; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label"  >Old Password</label>

                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Password">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" >New Password</label>

                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Password">
                      </div>
                    </div>


                    <!-- /.box-body -->
                    <div class="box-footer">
                      <button type="submit" class="btn btn-default">Cancel</button>
                      <button type="submit" class="btn btn-info pull-right">Update</button>
                    </div>
                    <!-- /.box-footer -->
                  </form>
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


      <script src="../assets/scripts/klorofil-common.js"></script>



      <!--Custom JavaScript -->
      <script src="../js/scripts.js"></script>