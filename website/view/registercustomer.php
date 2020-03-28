<?php 

include '../../Apps/model/provincemodel.php';
include '../../Apps/common/dbconnection.php';
include '../../Apps/model/customermodel.php';
include '../common/session.php';
$obpro=new province();
$resultprovinces=$obpro->displaypProvinces();
$maxdate=date('Y-m-d', strtotime(' -18 year'));
$maxdate=date('Y-m-d', strtotime(' -60 year'));
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
  xhttp.open("GET", "../../Apps/ajax/getDistrict.php?q="+str, true);
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
  xhttp.open("GET", "../../Apps/ajax/getCity.php?q="+str, true);
  xhttp.send();
}
</script>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../img/express-favicon.png" type="image/x-icon" />
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>RedCaynne Re</title>
<link rel="icon" type="image/png" href="../../Apps/images/icons/slweb.ico"/>
<!-- Icon css link -->
<link href="../vendors/material-icon/css/materialdesignicons.min.css" rel="stylesheet">
<link href="../css/font-awesome.min.css" rel="stylesheet">
<link href="../vendors/linears-icon/style.css" rel="stylesheet">
<!-- Bootstrap -->
<link href="../css/bootstrap.min.css" rel="stylesheet">

<!-- Extra plugin css -->
<link href="../vendors/bootstrap-selector/bootstrap-select.css" rel="stylesheet">
<link href="../vendors/bootatrap-date-time/bootstrap-datetimepicker.min.css" rel="stylesheet">
<link href="../vendors/owl-carousel/assets/owl.carousel.css" rel="stylesheet">

<link href="../css/style.css" rel="stylesheet">
<link href="../css/responsive.css" rel="stylesheet">

<script src="../../Apps/sweetalert/sweetalert.min.js" ></script>
<link rel="stylesheet" type="text/css" href="../../Apps/sweetalert/sweetalert.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>

      <?php if(isset($_GET['msg4'])){ 


       echo "<script type='text/javascript'> swal('Success!', 'Your Profile Created Successfully', 'success');</script>";

       
     } ?>

     <?php if(isset($_GET['msg5'])){ 


       echo "<script type='text/javascript'> swal('Opps!', 'Something went wrong ', 'error');</script>";

       
     } ?>
     
     <div id="preloader">
      <div class="loader absolute-center">
        <div class="loader__box"><b class="top"></b></div>
        <div class="loader__box"><b class="top"></b></div>
        <div class="loader__box"><b class="top"></b></div>
      </div>
    </div>
    
    <!--================ Frist hader Area =================-->
   <?php if($noc){ 
        ?>

        
        <?php include_once('../common/firstheaderloggedin.php'); ?>

    <?php }else{ ?> 

       <?php include_once('../common/firstheader.php'); ?> 

   <?php }?>
   <!--================End Footer Area =================-->
   
   <!--================End Footer Area =================-->
   <?php include_once('../common/mainheader.php'); ?>  
   <!--================End Footer Area =================-->
   
   <!--================Banner Area =================-->
   <section class="banner_area">
    <div class="container">
      <div class="banner_content">
        <h4>Customer Registration Form</h4>
        <a href="#">Home</a>
        <a class="active" href="table.html">Registration</a>
      </div>
    </div>
  </section>
  <!--================End Banner Area =================-->
  
  <!--================Booking Table Area =================-->
  <section class="booking_table_area booking_area_white">
    <div class="container">
     
     <div class="row">
      <div class="col-lg-8 col-md-offset-2">
        <div class="card">
          <div class="card-body">
            <div class="alert alert-success" role="alert" align="center">
              You can add your details from this form
            </div>
            <h4 class="card-title" align="center">Register To our Website</h4>
            <div class="clearfix">&nbsp;</div>
            
            <div class="card-body m-t-15">
             <form method="post" action="../controller/customercontroller.php?action=add" enctype="multipart/form-data">

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
          <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>Register</button>
          <button type="reset" name="clear" value="clear" class="btn btn-primary">Clear </button>






        </div>
      </div>
    </div>
  </div>
</div>
</form>

</div>
</section>
<!--================End Booking Table Area =================-->

<!--================End Recent Blog Area =================-->
<?php include_once('../common/mainfooter.php'); ?>  
<!--================End Recent Blog Area =================-->



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../js/jquery-2.1.4.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

<!-- Extra plugin js -->
<script src="../vendors/bootstrap-selector/bootstrap-select.js"></script>
<script src="../vendors/bootatrap-date-time/bootstrap-datetimepicker.min.js"></script>
<script src="../vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="../vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="../vendors/isotope/isotope.pkgd.min.js"></script>
<script src="../vendors/countdown/jquery.countdown.js"></script>
<script src="../vendors/js-calender/zabuto_calendar.min.js"></script>

<script src="../js/theme.js"></script>
<script type="text/javascript" src="../js/validationcustomer.js"></script>
</body>
</html>