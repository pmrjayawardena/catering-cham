      <?php
      
      
      
      include '../common/dbconnection.php';
      include '../model/usermodel.php';
      include '../common/functions.php';
      include '../model/provincemodel.php';
      include '../model/rolemodel.php';
      include '../common/sessionhandling.php';

      

      $obpro=new province();
      $resultprovinces=$obpro->displaypProvinces();
      
      $obrole=new role();
      $resultrole=$obrole->displayRoles();
      $maxdate=date('Y-m-d', strtotime(' -18 year'));
      $maxdate=date('Y-m-d', strtotime(' -60 year'));

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
      <h3 class="text-primary">ADD CUSTOMER</h3> </div>
      <div class="col-md-7 align-self-center">

        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
          <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="../view/customer_management.php">Customer Management</a></li>
          <li class="breadcrumb-item active">Add Customer</li>
        </ol>
      </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">


      <!-- Start Page Content -->
      
      <?php if(isset($_GET['msg4'])){ 


       echo "<script type='text/javascript'> swal('Success!', 'Your Profile Created Successfully', 'success');</script>";

       
     } ?>

     <?php if(isset($_GET['msg5'])){ 


       echo "<script type='text/javascript'> swal('Opps!', 'Something went wrong ', 'error');</script>";

       
     } ?>
     <div class="row">
      <div class="col-lg-8 col-md-offset-2">
        <div class="card">
          <div class="card-body">
            <div class="alert alert-secondary" role="alert" align="center">
              You can add a new User from this form
            </div>
            <h4 class="card-title" align="center">Add a New Customer</h4>

            <div class="card-body m-t-15">

             <form method="post" action="../../website/controller/customercontroller.php?action=add1" enctype="multipart/form-data">

              <div class="form-body">
                <div class="form-group row">

                  <label class="control-label text-right col-md-3">First Name</label>

                  <div class="col-md-9">
                   <input type="text" name="cus_fname" id="cus_fname" placeholder="Customer First Name" class="form-control" />
                   <div id="uferror" class="error">*</div>
                   <small class="form-control-feedback"> </small> </div>
                 </div>
                 <div class="form-group row">
                  <label class="control-label text-right col-md-3">Last Name </label>
                  <div class="col-md-9">
                   <input type="text" name="cus_lname" id="cus_lname" placeholder="Customer Last Name" class="form-control" />
                   <div id="ulerror" class="error">*</div>
                   <small class="form-control-feedback"> </small> </div>
                 </div>
                 <div class="form-group row">
                  <label class="control-label text-right col-md-3">Date Of Birth</label>
                  <div class="col-md-9">
                    <input type="date" name="cus_dob" id="cus_dob" placeholder="Date of Birth" class="form-control" max="<?php echo date('Y-m-d');?>" />
                    <div id="udoberror" class="error"></div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label text-right col-md-3">Gender</label>
                  <div class="col-md-9">
                    <input type="radio" name="cus_gender" id="male"  class="minimal" value="Male"/> Male
                    <input type="radio" name="cus_gender" id="female" class="minimal"  value="Female"/> Female
                    <div id="ugerror" class="error">*</div>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="control-label text-right col-md-3">Email</label>
                  <div class="col-md-9">
                   <input type="text" name="cus_email" id="cus_email" placeholder="Customer Email" class="form-control" onkeyup="checkCusEmail(this.value)" />
                   <span id="showEmail"></span>
                   <div id="ueerror" class="error">*</div>
                   <div id="tid" class="error"></div>
                 </div>
               </div>
               <div class="form-group row">
                <label class="control-label text-right col-md-3">Telephone</label>
                <div class="col-md-9">
                 <input type="text" name="cus_tel" id="cus_tel" placeholder="Customer Telephone" class="form-control" />
                 <div id="uterror" class="error"></div>
               </div>
             </div>
             <div class="form-group row">
              <label class="control-label text-right col-md-3">NIC </label>
              <div class="col-md-9">
                <div class="radio-list">


                  <input type="text" name="cus_nic" id="cus_nic" placeholder="Customer NIC" class="form-control" />
                  <div id="unerror" class="error"></div>
                </label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label text-right col-md-3">Customer Image</label>
            <div class="col-md-9">
              <input type="file" name="cus_image" id="cus_image" placeholder="Customer Image" class="form-control" onchange="readURL(this)" />
              <div id="uierror" class="error"></div><img id="image_view" />
            </div>
          </div>

          
          <div class="form-group row">
            <label class="control-label text-right col-md-3">Street Address &nbsp;</label>
            <div class="col-md-9">
              <textarea name="cus_add" id="cus_add" class="form-control"></textarea>

            </div>
            <div id="uaderror" class="error">*</div>
          </div>
          <div class="form-group row">
            <label class="control-label text-right col-md-3">Province &nbsp;<i class="fas fa-map-marker-alt"></i></label>
            <div class="col-md-9">
             <select name="pro_id" id="pro_id" class="form-control form-control-lg" onchange="displayDis(this.value)">
              <option value="" >Select a Province</option>
              <?php
              while ($rowprovince=$resultprovinces->fetch(PDO::FETCH_BOTH)){?>
                <option value="<?php echo $rowprovince['id']?>"><?php echo $rowprovince['name_en']; ?></option>
              <?php }?>

            </select>
            <div id="uperror" class="error">*</div>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label text-right col-md-3">District</i></label>
          <div class="col-md-9">
           <!-- To load all district in a selected province-->
           <span id="showdistrict"> 
            <select name="dis_id" id="dis_id" class="form-control form-control-lg">
              <option value="">Select a District</option>
            </select>

          </span>
          <div id="uderror" class="error">*</div>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label text-right col-md-3">City</i></label>
        <div class="col-md-9">
         <!-- To load all district in a selected province-->
         <span id="showcity"> 
          <select name="city_id" id="city_id" class="form-control form-control-lg">
            <option value="">Select a City</option>
          </select>

        </span>
        <div id="ucerror" class="error">*</div>
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label text-right col-md-3">Zip Code</label>
      <div class="col-md-9">
       <input type="text" name="zip_code" id="zip_code" placeholder="Zip Code" class="form-control" />
       <div id="uzerror" class="error">*</div>
       <small class="form-control-feedback"> </small> </div>
     </div>
     

   </div>
 </div>
 <div class="clearfix">&nbsp;</div>
 <div class="clearfix">&nbsp;</div>
 <div class="form-actions">
  <div class="row">
    <div class="col-lg-8 col-md-offset-2">
      <div class="row">
        <div class="col-lg-8 col-md-offset-2">
          <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>Add Customer</button>
          <button type="reset" name="clear" value="clear" class="btn btn-primary">Clear </button>






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
<script type="text/javascript" src="../../website/js/validationcustomer.js"></script>
</body>

</html>
