      <?php
      
      include '../common/sessionhandling.php';
      $role_id=$userinfo['role_id'];
      include '../common/dbconnection.php';
      include '../model/usermodel.php';
      include '../common/functions.php';
      include '../model/drivermodel.php';
      include '../model/rolemodel.php';



$v_id = $_REQUEST['v_id'];//To take the user id of the particular person
$obd=new driver();
$resultvehicle = $obd->viewAVehicle($v_id); //to get the specific user details
$rowvehicle=$resultvehicle->fetch(PDO::FETCH_BOTH);

?> 


<?php include_once('../common/header.php'); ?>  


<html>
<head>
  <meta charset="utf-8">
  <!-- bootstrap -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css" />
  <!-- font awesome version5 -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
  <link rel="stylesheet" type="text/css" href="../css/checkbox.css">
  <link rel="stylesheet" href="https://github.com/ionic-team/ionicons.git">
  <!-- sweet alert -->
  <script src="../sweetalert/sweetalert.min.js" ></script>
  <link rel="stylesheet" type="text/css" href="../sweetalert/sweetalert.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/ScrollToPlugin.min.js"></script>
  <!-- JQuery 3.3.1 -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- use smooth scrolling -->
  <script src="../js/smoothscroll.js"></script>


  <script>
   function displayDis(str) {
    var xhttp; 
    if (str == "") {
      document.getElementById("showdistrict").innerHTML = "";
      return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
     // document.getElementById("showFun").innerHTML = '<img src="../images/loading.gif" alt="Please Wait" />';
     if (this.readyState == 4 && this.status == 200) {
      document.getElementById("showdistrict").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "../ajax/getDistrict.php?q="+str, true);
  xhttp.send();
}
function displayCities(str) {
  var xhttp; 
  if (str == "") {
    document.getElementById("showcity").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
     // document.getElementById("showFun").innerHTML = '<img src="../images/loading.gif" alt="Please Wait" />';
     if (this.readyState == 4 && this.status == 200) {
      document.getElementById("showcity").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "../ajax/getCity.php?q="+str, true);
  xhttp.send();
}
</script>

</head>



<p align="center">Modules</p>
<li>
 <?php include_once('../common/modules.php'); ?>        
 
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
      <h3 class="text-primary">ADD USER</h3> </div>
      <div class="col-md-7 align-self-center">

        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
          <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="../view/allocation_management.php">Allocation Management</a></li>
          <li class="breadcrumb-item active">Add Driver</li>
        </ol>
      </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">


      <!-- Start Page Content -->
      
      <div class="row">
        <div class="col-lg-8 col-md-offset-2">
          <div class="card">
            <div class="card-body">
              <div class="alert alert-secondary" role="alert" align="center">
                You can add a Vehicle from this form
              </div>
              <h4 class="card-title" align="center">Add Vehicle</h4>

              <div class="card-body m-t-15">

                <form method="post" action="../controller/drivercontroller.php?action=updatev&v_id=<?php echo $v_id ?>" enctype="multipart/form-data">

                  <div class="form-body">
                    <div class="form-group row">

                      <label class="control-label text-right col-md-3">Vehicle Number &nbsp;<i class="fas fa-user-circle"></i></i></label>

                      <div class="col-md-9">
                       <input type="text" name="v_no" id="v_no" class="form-control" value="<?php echo $rowvehicle['v_no']?>"/>
                       <div id="uferror" class="error">*</div>
                       <small class="form-control-feedback"> </small> </div>
                     </div>



                   </div>
                 </div>
                 <div class="clearfix">&nbsp;</div>
                 <div class="clearfix">&nbsp;</div>
                 <div class="form-actions">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="offset-sm-3 col-md-9">
                          <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>Update</button>
                          <button type="reset" name="clear" value="clear" class="btn btn-primary"><i class="fas fa-eraser"></i>&nbsp;Clear </button>






                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>


      <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->
    <!-- footer -->
    <?php include_once('../common/footer.php'); ?>




    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <!--jquery-->
    <script type="text/javascript" src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!--External JS for validation-->

  </body>

  </html>
