<?php 

 include '../../Apps/model/provincemodel.php';
include '../../Apps/common/dbconnection.php';
include '../../Apps/model/customermodel.php';
 include '../../Apps/model/districtmodel.php';

include '../common/sessionhandling.php';
include '../common/session.php';
 $obpro=new province();
 $resultprovinces=$obpro->displaypProvinces();


$dis_id=$rowuser['dis_id'];
$obdis = new district();
$resultdis = $obdis->displayDistrict($dis_id);
$rowdis = $resultdis->fetch(PDO::FETCH_BOTH);

$rowdis['dis_name'];



 $maxdate=date('Y-m-d', strtotime(' -18 year'));
 $maxdate=date('Y-m-d', strtotime(' -60 year'));

$cus_id = $cusinfo['cus_id'];//To take the user id of the particular person
$obc=new customer();
$resultcustomer = $obc->viewALoggedCustomer($cus_id); //to get the specific user details


$rowcus=$resultcustomer->fetch(PDO::FETCH_BOTH);


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
    
    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="../css/bootstrap-extend.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="../css/master_style.css">

    <!-- Crypto_Admin skins -->
    <link rel="stylesheet" href="../css/_all-skins.css">  

        <link rel="stylesheet" href="../css/bootstrap.min.css"> 
        <script src="../../Apps/js/iziToast.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="../../Apps/css/iziToast.min.css">

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


<link rel="stylesheet" type="text/css" href="../../Apps/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../../Apps/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="../../Apps/assets/vendor/animate/animate.css">
<link rel="stylesheet" type="text/css" href="../../Apps/assets/vendor/css-hamburgers/hamburgers.min.css">
<link rel="stylesheet" type="text/css" href="../../Apps/assets/vendor/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="../../Apps/css/util.css">
<link rel="stylesheet" type="text/css" href="../../Apps/css/main.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>


  <?php 
              if(isset($_GET['msg'])){

                $message=$_GET['msg'];

                if($message==4)

                  echo "<script type='text/javascript'>iziToast.success({

                    message: 'Successfully Changed Details!',
                  });</script>";
                }


                ?>

                  <?php 
              if(isset($_GET['msg'])){

                $message=$_GET['msg'];

                if($message==5)

                  echo "<script type='text/javascript'>iziToast.warning({
    title: 'Opps!',
    message: 'You forgot important data',
});</script>";
                }


                ?>
       
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
                    <h4>Welcome <?php echo $cusinfo['cus_fname']." ".$cusinfo['cus_lname']; ?></h4>
                 
                </div>
            </div>
        </section>
        <!--================End Banner Area =================-->
        
        <!--================Booking Table Area =================-->


    <section class="booking_table_area booking_area_white">
            <div class="container">
             
             <div class="row">
        <div class="col-lg-11 col-md-offset-2">
          <div class="card">
            <div class="card-body">
<div class="card-body m-t-15">
     <section class="content">

      <div class="row">
        <div class="col-xl-4 col-lg-5">

          <!-- Profile Image -->
          <div class="box bg-yellow bg-deathstar-dark">
            <div class="box-body box-profile">
                        <div>
                                      
                <?php 
                if($rowcus['cus_image']==""){
                                   $cus_image="../img/profile.png";//if an image does not exist view a default image 
                                 }else{
                                   $cus_image="../img/cus_images/".$rowcus['cus_image'];//if the image exists view the particular image for the particular row
                                 }
                                 ?>
                                 <img src="<?php echo $cus_image; ?>" width="280px" height="270px"/>
                                </div>
              <div class="clearfix">&nbsp;</div>

              <h2 class="profile-username text-center mb-0"><?php echo $rowcus['cus_fname']." ".$rowcus['cus_lname']; ?></h2>
              <div class="clearfix">&nbsp;</div>

              <h4 class="text-center mt-0"><i class="fa fa-envelope-o mr-10"></i><?php echo $rowcus['cus_email']; ?></h4>
                
              <div class="row social-states">
                  <div class="col-6 text-right"><a href="#" class="link text-white"><i class="ion ion-ios-people-outline"></i> 254</a></div>
                  <div class="col-6 text-left"><a href="#" class="link text-white"><i class="ion ion-images"></i> 54</a></div>
              </div>
            
              <div class="row">
                <div class="col-12">
                    <div class="media-list media-list-hover media-list-divided w-p100 mt-30">
                       
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="media-list media-list-hover w-p100 mt-0">
                       
                    </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-xl-8 col-lg-7">
          <div class="box box-solid bg-black">
            <div class="box-header with-border">
              <h3 class="box-title">Personal details</h3>
               <div class="clearfix">&nbsp;</div>
            </div>
            <!-- /.box-header -->
            <div class="form-group">
              <div class="row">
                <div class="col-12">
                     <form method="post" action="../controller/customercontroller.php?action=updateloggedcustomer"  enctype="multipart/form-data">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">First Name</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" id="cus_fname" name="cus_fname"value="<?php echo $rowcus['cus_fname']; ?>" >
                         <div id="uferror" class="error">*</div>
                       <small class="form-control-feedback"> </small> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Last Name</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" id="cus_lname" name="cus_lname"value="<?php echo $rowcus['cus_lname']; ?>" >
                         <div id="ulerror" class="error">*</div>
                       <small class="form-control-feedback"> </small> 
                      </div>
                    </div>

                         <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Gender</label>
                      <div class="col-sm-10">
                     <input type="radio" name="cus_gender" id="male"  class=" " value="Male" <?php echo($rowcus['cus_gender']=="Male")?'checked':''; ?>/> Male
                        <input type="radio" name="cus_gender" id="female" class=" "  value="Female" <?php echo($rowcus['cus_gender']=="Female")?'checked':''; ?>/> Female

                        <div id="ugerror" class="error">*</div>
                      </div>
                    </div>
               
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Phone Number</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" id="cus_tel" name="cus_tel"value="<?php echo $rowcus['cus_tel']; ?>" >
                        <div id="uterror" class="error"></div>
                      </div>
                    </div>
                        <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Date Of Birth</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="date" value="<?php echo $rowcus['cus_dob']; ?>" max="<?php echo date('Y-m-d');?>" id="cus_dob" name="cus_dob" >
                        <div id="udoberror" class="error"></div>
                      </div>
                    </div>

                      <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nic</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" id="cus_nic" name="cus_nic" value="<?php echo $rowcus['cus_nic']; ?>" >
                         <div id="unerror" class="error"></div>
                      </div>
                    </div>
                   

                    <div class="form-group row">
            <label class="col-sm-2 col-form-label">Customer Image</label>
            <div class="col-sm-10">
            <input type="file" name="cus_image" id="cus_image" placeholder="customer Image" class="form-control" />
                              
                              <?php 
                              if($rowcus['cus_image']==""){
                                    $cus_image="../img/user_icon.png";
                              }else{
                                    $cus_image="../img/cus_images/".$rowcus['cus_image'];
                              }
                              ?>
                              <img id="image_view"  src="<?php echo $cus_image; ?>" style="width: 100px"/>
                               </div>
                             </div>
                                     <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Address</label>
                      <div class="col-sm-10">
                       
                        <textarea name="cus_add" id="cus_add" rows="4" cols="63"><?php echo $rowcus['cus_add']; ?></textarea>
                      </div>
                    </div>

                          <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Province</label>
                              <div class="col-sm-10">
                                  <select name="pro_id" id="pro_id" class="form-control" onchange="displayDis(this.value)">
                                  <option value="" >Select a Province</option>
                                  <?php
                                    while ($rowprovince=$resultprovinces->fetch(PDO::FETCH_BOTH)){?>
                                  <option value="<?php echo $rowprovince['id']?>"
                                     <?php if($rowprovince['id']==$rowdis['pro_id']){
                                         echo "SELECTED";
                                     } ?>  
                                  >
                                      <?php echo $rowprovince['name_en']; ?>
                                  </option>
                                  <?php }?>
                                  
                              </select>
                               <div id="uperror" class="error">*</div>
                              </div>
                            </div>
                                     <div class="form-group row">
                              <label class="col-sm-2 col-form-label">District</label>
                              <div class="col-sm-10">
                               <!-- To load all district in a selected province-->
                               <span id="showdistrict"> 
                                 <select name="dis_id" id="dis_id" class="form-control">
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
              <label class="col-sm-2 col-form-label">City</i></label>
              <div class="col-sm-10">
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
                      <label class="col-sm-2 col-form-label">Post Code</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="number" id="zip_code" name="zip_code" value="<?php echo $rowcus['zip_code']; ?>">
                         <div id="uzerror" class="error"></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-info">Submit</button>
                      </div>
                    </div>
                     </form>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
         
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
   <!--        <div class="box box-solid bg-black">
            <div class="box-header with-border">
              <h3 class="box-title">Social media</h3>
               <div class="clearfix">&nbsp;</div>
            </div> -->
            <!-- /.box-header -->
<!--             <div class="box-body">
              <div class="row">
                <div class="col-12">
                     <form action="../controller/cuslogincontroller.php" method="post">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Facebook</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" placeholder="facebook id">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Instagram</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" placeholder="instagram id">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Twitter</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" placeholder="twitter id">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Linkedin</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" placeholder="linkedin id">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-info">Submit</button>
                      </div>
                    </div>
                </form>
                </div> -->
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>

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

            <script src="../js/template.js"></script>
    
    <!-- Crypto_Admin for demo purposes -->
    <script src="../js/demo.js"></script>

        <script src="../js/jquery.min.js"></script>
    
    <!-- popper -->
    <script src="../js/popper.min.js"></script>

    
    <!-- SlimScroll -->
    <script src="../js/jquery.slimscroll.min.js"></script>
    
    <!-- FastClick -->
    <script src="../js/fastclick.js"></script>

<script src="../js/bootstrap.min.js"></script>

<script type="text/javascript" src="../js/validationcustomerprofile.js"></script>
        
    </body>
</html>