<?php

include '../common/sessionhandling.php';
$role_id=$userinfo['role_id'];
include '../common/dbconnection.php';
include '../model/customermodel.php';
include '../common/functions.php';
include '../model/provincemodel.php';
include '../model/rolemodel.php';



$cus_id = $_REQUEST['cus_id'];//To take the user id of the particular person
$obc=new customer();
$resultcustomer = $obc->viewACustomer($cus_id);
$rowcus=$resultcustomer->fetch(PDO::FETCH_BOTH);

include '../model/districtmodel.php';
$dis_id=$rowcus['dis_id'];
$obdis = new district();
$resultdis = $obdis->displayDistrict($dis_id);
$rowdis = $resultdis->fetch(PDO::FETCH_BOTH);

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
</head>

<?php if(isset($_GET['msg1'])){ 


 echo "<script type='text/javascript'> swal('ok!', 'User Added', 'success');</script>";


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
      <h3 class="text-primary">VIEW CUSTOMER</h3> </div>
      <div class="col-md-7 align-self-center">
        <span> CUSTOMER MANAGEMENT</span>
        
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
          <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="../view/user_management.php">Customer Management</a></li>
          <li class="breadcrumb-item active">View Customer</li>
        </ol>
      </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
      <!-- Start Page Content -->

      <div class="row">
        <!-- Column -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="card-two">
                <header>
                  <div>

                    <?php 
                    if($rowcus['cus_image']==""){
                                   $cus_image="../images/user_icon.png";//if an image does not exist view a default image 
                                 }else{
                                   $cus_image="../../website/img/cus_images/".$rowcus['cus_image'];//if the image exists view the particular image for the particular row
                                 }
                                 ?>
                                 <img src="<?php echo $cus_image; ?>" width="200px" height="200px"/>
                                 <div class="clearfix">&nbsp;</div>

                               </div>

                             </header>
                             <div class="desc">
                              <b><h2><?php echo $rowcus['cus_fname']." ".$rowcus['cus_lname']; ?></h2></b>


                              <h4><?php echo $rowcus['rolecus_name']; ?></h4>


                              <h4>Customer ID - <?php echo $rowcus['cus_id']; ?></h4> 
                              <h4><span class="label label-primary"><?php echo $rowcus['cus_status']?></span></h4>
                            </div>

                            <div class="contacts">


                              <a href="mailto:<?php echo $rowcus['cus_email']; ?>"><i class="fa fa-envelope"></i></a>
                              <div class="clear"></div>


                            </div>
                          </div>
                        </div>
                      </div>
                    </div>


                    <!-- Column -->

                    <!-- Column -->
                    <div class="col-lg-12">
                      <div class="card">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs profile-tab" role="tablist">

                          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>

                        </ul>
                        <!-- Tab panes -->

                        <!--second tab-->
                        <div class="tab-pane" id="profile" role="tabpanel">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-3 col-xs-6 b-r"> <strong>Date of Birth</strong>
                                <br>
                                <p class="text-muted">  <?php echo $rowcus['cus_dob']; ?></p>
                              </div>
                              <div class="col-md-3 col-xs-6 b-r"> <strong>Gender</strong>
                                <br>
                                <p class="text-muted"> <?php echo $rowcus['cus_gender']; ?></p>
                              </div>
                              <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                <br>
                                <p class="text-muted"><?php echo $rowcus['cus_email']; ?></p>
                              </div>
                              <div class="col-md-3 col-xs-6"> <strong>Telephone</strong>
                                <br>
                                <p class="text-muted">(+94)<?php echo $rowcus['cus_tel']; ?></p>
                              </div>
                              <div class="col-md-3 col-xs-6 b-r"> <strong>NIC</strong>
                                <br>
                                <p class="text-muted"><?php echo $rowcus['cus_nic']; ?></p>
                              </div>
                              <div class="col-md-3 col-xs-6 b-r"> <strong>Address</strong>
                                <br>
                                <p class="text-muted"><?php echo $rowcus['cus_add']; ?></p>
                              </div>
                              <div class="col-md-3 col-xs-6 b-r"> <strong>province</strong>
                                <br>
                                <p class="text-muted"><?php echo $rowdis['pro_name']; ?></p>
                              </div>
                              <div class="col-md-3 col-xs-6"> <strong>District</strong>
                                <br>
                                <p class="text-muted"><?php echo $rowdis['dis_name']; ?></p>
                              </div>

                            </div>
                            <hr>



                            <input type="button" value="Go Back" onclick="history.back(-1)" class="btn btn-primary btn-lg btn-block" />


                          </div>
                        </div>

                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Column -->


          <!-- /.box-body -->

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

        <!-- FastClick -->
        <script src="../bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="../dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../dist/js/demo.js"></script>

        <!-- jQuery 3 -->
        <script src="../bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>