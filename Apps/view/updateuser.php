<?php

include '../common/sessionhandling.php';
$role_id=$userinfo['role_id'];
include '../common/dbconnection.php';
include '../model/usermodel.php';
include '../common/functions.php';
include '../model/provincemodel.php';
include '../model/rolemodel.php';


$user_id1 = $_REQUEST['user_id'];//To take the user id of the particular person
$obu=new user();
$resultuser = $obu->viewAUser($user_id1); //to get the specific user details
$rowuser=$resultuser->fetch(PDO::FETCH_BOTH);

$obpro=new province();
$resultprovinces=$obpro->displaypProvinces();
$obrole=new role();
$resultrole=$obrole->displayRoles();




//To get province details
include '../model/districtmodel.php';
$dis_id=$rowuser['dis_id'];
$obdis = new district();
$resultdis = $obdis->displayDistrict($dis_id);
$rowdis = $resultdis->fetch(PDO::FETCH_BOTH);

$rowdis['dis_name'];
?>


<?php include_once('../common/header.php'); ?>  


<html>
<head>
  <meta charset="utf-8">
  
  <title>sos</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
  <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
  
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  

  
  <!--    <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">-->
  <script defer src="../plugins/fontawesome-all.js" ></script>
  <script src="../sweetalert/sweetalert.min.js" ></script>
  <link rel="stylesheet" type="text/css" href="../sweetalert/sweetalert.css">
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

<?php if(isset($_GET['msg'])){ 
  
 
 echo "<script type='text/javascript'> swal('Success!', 'User Updated Successfully', 'success');</script>";

 
} ?>

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
     </div>
      <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
          <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="../view/user_management.php">User Management</a></li>
          <li class="breadcrumb-item active">Update User</li>
        </div>
      </div>
      <!-- End Bread crumb -->
      <!-- Container fluid  -->
      <div class="container-fluid">
        
        
        <!-- Start Page Content -->
        <div class="col-lg-8 col-md-offset-2">
          <div class="card card-outline-info">
            <div class="card-header">
              <h4 class="m-b-0 text-white" align="center">Update User </h4>
            </div>
            <div class="card-body m-t-15">
              <form method="post" action="../controller/usercontroller.php?action=update&user_id=<?php echo $user_id1 ?>" enctype="multipart/form-data">
             
                <div class="form-body">
                  <div class="form-group row">
                    <label class="control-label text-right col-md-3">First Name</label>
                    <div class="col-md-9">
                     <input type="text" name="user_fname" id="user_fname" placeholder="User First Name" class="form-control" value="<?php echo $rowuser['user_fname']; ?>"/>
                     <div id="uferror" class="error">*</div>
                     <small class="form-control-feedback"> </small> </div>
                   </div>
                   <div class="form-group row">
                    <label class="control-label text-right col-md-3">Last Name</label>
                    <div class="col-md-9">
                     <input type="text" name="user_lname" id="user_lname" placeholder="User Last Name" class="form-control" value="<?php echo $rowuser['user_lname']; ?>" />
                     <div id="ulerror" class="error">*</div>
                     <small class="form-control-feedback"> </small> </div>
                   </div>
                   <div class="form-group row">
                    <label class="control-label text-right col-md-3">Date of Birth</label>
                    <div class="col-md-9">
                      <input type="date" name="user_dob" id="user_dob" placeholder="Date of Birth" class="form-control" value="<?php echo $rowuser['user_dob']; ?>" max="<?php echo date('Y-m-d');?>"  />
                      <div id="udoberror" class="error"></div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label text-right col-md-3">Gender</label>
                    <div class="col-md-9">
                      <input type="radio" name="user_gender" id="male"  class=" " value="Male" <?php echo($rowuser['user_gender']=="Male")?'checked':''; ?>/> Male
                      <input type="radio" name="user_gender" id="female" class=" "  value="Female" <?php echo($rowuser['user_gender']=="Female")?'checked':''; ?>/> Female
                      <div id="ugerror" class="error">*</div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label text-right col-md-3">Email</label>
                    <div class="col-md-9">
                     <input type="text" name="user_email" id="user_email" placeholder="User Email" class="form-control" value="<?php echo $rowuser['user_email']; ?>" readonly/>
                     <span id="showEmail"></span>
                     <div id="ueerror" class="error">*</div>
                   </div>
                 </div>
                 <div class="form-group row">
                  <label class="control-label text-right col-md-3">User Telephone</label>
                  <div class="col-md-9">
                   <input type="text" name="user_tel" id="user_tel" placeholder="User Telephone" class="form-control" value="<?php echo $rowuser['user_tel']; ?>"  />
                   <div id="uterror" class="error"></div>
                 </div>
               </div>
               <div class="form-group row">
                <label class="control-label text-right col-md-3">NIC</label>
                <div class="col-md-9">
                  <div class="radio-list">
                    
                    
                    <input type="text" name="user_nic" id="user_nic" placeholder="User NIC" class="form-control" value="<?php echo $rowuser['user_nic']; ?>" />
                    <div id="unerror" class="error"></div>
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label text-right col-md-3">User Image</label>
              <div class="col-md-9">
                <input type="file" name="user_image" id="user_image" placeholder="User Image" class="form-control" onchange="readURL(this)" />
                <div id="uierror" class="error"></div>
                <?php 
                if($rowuser['user_image']==""){
                  $user_image="../images/user_icon.png";
                }else{
                  $user_image="../images/user_images/".$rowuser['user_image'];
                }
                ?>
                <img id="image_view"  src="<?php echo $user_image; ?>" style="width: 100px"/>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label text-right col-md-3">User Address</label>
              <div class="col-md-9">
                <textarea name="user_add" id="user_address" class="form-control"><?php echo $rowuser['user_add']; ?></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label text-right col-md-3">Province</label>
              <div class="col-md-9">
                <select name="pro_id" id="pro_id" class="form-control form-control-lg" onchange="displayDis(this.value)">
                  <option value="" >Select a Province</option>
                  <?php
                  while($rowprovince=$resultprovinces->fetch(PDO::FETCH_BOTH)){?>
                    <option value="<?php echo $rowprovince['id']?>" <?php if($rowprovince['id']==$rowdis['pro_id']){ echo "SELECTED";} ?>><?php echo $rowprovince['name_en']; ?></option>
                  <?php }?>
                  
                </select>
                <div id="uperror" class="error">*</div>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label text-right col-md-3">District</label>
              <div class="col-md-9">
               <!-- To load all district in a selected province-->
               <span id="showdistrict"> 
                 <select name="dis" id="dis_id" class="form-control form-control-lg">
                  <option value="">Select a District</option>
                  <?php
                  $resultdp = $obdis->displayDistrictsPerPro($rowdis['pro_id']);
                  while($rowdp=$resultdp->fetch(PDO::FETCH_BOTH)){?>
                    <option value="<?php echo $rowdp['id'];?>" <?php if($rowdp['id']==$dis_id){ echo "SELECTED";} ?>>
                      <?php echo $rowdp['name_en']; ?>
                    </option>
                  <?php }?>
                </select>
                
              </span>
              <div id="uderror" class="error">*</div>
            </div>
          </div>
          

          <div class="form-group row">
            <label class="control-label text-right col-md-3">Role</label>
            <div class="col-md-9">
             
             
             <select name="role_id" id="role_id" class="form-control form-control-lg">
              <option value="">Select a Role Name</option>
              <?php
              while ($rowrole=$resultrole->fetch(PDO::FETCH_BOTH)){?>
                <option value="<?php echo $rowrole['role_id']?>"  <?php if($rowrole['role_id']==$rowuser['role_id']){ echo "SELECTED";} ?>>

                 
                 <?php echo $rowrole['role_name']; ?>
               </option>
             <?php }?>
           </select>
         </span>
       </div>
     </div>
   </div>
   <div class="form-actions">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="offset-sm-3 col-md-9">
            <button type="submit" class="btn btn-success" value="Update" name="up"><i class="fas fa-user-check"></i></i> Update Details</button>

            
            <button type="submit" class="btn btn-primary" onclick="location.href='../view/user_management.php';" ><i class="fas fa-arrow-alt-circle-left"></i></i> Go Back</button>

            
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



<!-- jQuery 2.1.4 -->
<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<!--    <script src="../plugins/iCheck/icheck.min.js"></script>-->
<!--    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>-->
    
    <!--jquery-->
    <script type="text/javascript" src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!--External JS for validation-->
    <script type="text/javascript" src="../js/validation.js"></script>
  </body>

  </html>
