<?php 

session_start();
include '../../Apps/common/dbconnection.php';
include '../../Apps/model/packagemodel.php';
include '../../Apps/model/itemmodel.php';
include '../common/session.php';
$package_id = $_REQUEST['package_id'];//To take the user id of the particular person
$obp=new package();
$resultpackage = $obp->viewAPackage($package_id);
$rowpackage=$resultpackage->fetch(PDO::FETCH_BOTH);
        if($rowpackage['package_image']==""){
              $cimage="../../Apps/images/category.png";
            }else{
              $cimage="../../Apps/images/package_images/".$rowpackage['package_image'];
            }

$package_id=$rowpackage['package_id'];
$resultpack1 = $obp->viewAllPackageitems1($package_id);

$noofitems=$resultpack1->rowCount();
$obitem=new item();


$connect = new PDO("mysql:host=localhost;dbname=ocs", "root", "");

$message = '';

if(isset($_POST["add_to_cart"]))
{
    if(isset($_COOKIE["shopping_cart"]))
    {
        $cookie_data = stripslashes($_COOKIE['shopping_cart']);

        $cart_data = json_decode($cookie_data, true);
    }
    else
    {
        $cart_data = array();
    }

    $item_id_list = array_column($cart_data, 'item_id');

    if(in_array($_POST["hidden_id"], $item_id_list))
    {
        foreach($cart_data as $keys => $values)
        {
            if($cart_data[$keys]["item_id"] == $_POST["hidden_id"])
            {
                $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
            }
        }
    }
    else
    {
        $item_array = array(
            'item_id'           =>  $_POST["hidden_id"],
            'item_name'         =>  $_POST["hidden_name"],
            'item_price'        =>  $_POST["hidden_price"],
            'item_quantity'     =>  $_POST["quantity"]
        );

        
        $cart_data[] = $item_array;
    }

    
    $item_data = json_encode($cart_data);
    setcookie('shopping_cart', $item_data, time() + (86400 * 30));
    header("location:../view/items.php?success=1");

    print_r($_COOKIE["shopping_cart"]);
}

if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
        $cart_data = json_decode($cookie_data, true);
        foreach($cart_data as $keys => $values)
        {
            if($cart_data[$keys]['item_id'] == $_GET["id"])
            {
                unset($cart_data[$keys]);
                $item_data = json_encode($cart_data);
                setcookie("shopping_cart", $item_data, time() + (86400 * 30));
                header("location:../view/cart1.php?delete=1");
            }
        }
    }
    if($_GET["action"] == "clear")
    {
        setcookie("shopping_cart", "", time() - 3600);
        header("location:../view/cart1.php?clear=1");
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>


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

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="../../Apps/js/iziToast.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="../../Apps/css/iziToast.min.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css" media="screen">
      @import url(https://fonts.googleapis.com/css?family=Raleway:400,500,800);
figure.snip1166 {
  font-family: 'Raleway', Arial, sans-serif;
  color: #fff;
  position: relative;
  float: left;
  margin: 10px 1.5%;
  min-width: 210px;
  max-width: 300px;
  max-height: 220px;
  width: 100%;
  background: #ffffff;
  color: #000000;
  text-align: left;
}
figure.snip1166 * {
  -webkit-box-sizing: padding-box;
  box-sizing: padding-box;
  -webkit-transition: all 0.6s ease;
  transition: all 0.6s ease;
}
figure.snip1166 img {
  opacity: 1;
  width: 100%;
  vertical-align: top;
  -webkit-transition: opacity 0.4s;
  transition: opacity 0.4s;
}
figure.snip1166 figcaption {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
figure.snip1166 figcaption > div {
  height: 70%;
  overflow: hidden;
  width: 100%;
  position: absolute;
  bottom: 0;
}
figure.snip1166 h3,
figure.snip1166 p {
  margin: 0;
  position: absolute;
  right: 0;
}
figure.snip1166 h3 {
  padding: 0 30px 0 15px;
  color: #ffffff;
  background-color: #1a1a1a;
  display: inline-block;
  font-weight: 400;
  line-height: 40px;
  text-transform: uppercase;
  top: 30%;
  right: 0;
  left: 30px;
  z-index: 1;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
}
figure.snip1166 h3 span {
  font-weight: 400;
}
figure.snip1166 h3:after,
figure.snip1166 h3:before {
  border-style: solid;
  content: '';
  position: absolute;
  left: 100%;
}
figure.snip1166 h3:after {
  border-width: 40px 0 0 12px;
  border-color: transparent transparent transparent #1a1a1a;
  top: 0;
}
figure.snip1166 h3:before {
  border-width: 12px 12px 0 0;
  border-color: #000000 transparent transparent transparent;
  top: 100%;
}
figure.snip1166 p {
  padding: 8px 45px;
  opacity: 0;
  font-size: 0.9em;
  font-weight: 500;
  left: 0;
  -webkit-transform: translate3d(0%, -150%, 0);
  transform: translate3d(0%, -150%, 0);
  -webkit-transition-delay: 0s;
  transition-delay: 0s;
}
figure.snip1166 a {
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  position: absolute;
}
figure.snip1166.blue h3 {
  background-color: #2980b9;
}
figure.snip1166.blue h3:after {
  border-color: transparent transparent transparent #2980b9;
}
figure.snip1166.blue h3:before {
  border-color: #123851 transparent transparent transparent;
}
figure.snip1166.red h3 {
  background-color: #c0392b;
}
figure.snip1166.red h3:after {
  border-color: transparent transparent transparent #c0392b;
}
figure.snip1166.red h3:before {
  border-color: #581a14 transparent transparent transparent;
}
figure.snip1166.green h3 {
  background-color: #27ae60;
}
figure.snip1166.green h3:after {
  border-color: transparent transparent transparent #27ae60;
}
figure.snip1166.green h3:before {
  border-color: #104627 transparent transparent transparent;
}
figure.snip1166.orange h3 {
  background-color: #e67e22;
}
figure.snip1166.orange h3:after {
  border-color: transparent transparent transparent #e67e22;
}
figure.snip1166.orange h3:before {
  border-color: #7b410e transparent transparent transparent;
}
figure.snip1166.navy h3 {
  background-color: #34495e;
}
figure.snip1166.navy h3:after {
  border-color: transparent transparent transparent #34495e;
}
figure.snip1166.navy h3:before {
  border-color: #07090c transparent transparent transparent;
}
figure.snip1166:hover img,
figure.snip1166.hover img {
  opacity: 0.3;
  -webkit-filter: grayscale(100%);
  filter: grayscale(100%);
}
figure.snip1166:hover figcaption h3,
figure.snip1166.hover figcaption h3 {
  -webkit-transform: translateY(-100%);
  transform: translateY(-100%);
}
figure.snip1166:hover figcaption p,
figure.snip1166.hover figcaption p {
  opacity: 0.8;
  -webkit-transform: translateY(0);
  transform: translateY(0);
}

    </style>
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
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>



<div class="alert alert-success"><h2 align="center"><?php echo $rowpackage['package_name'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../view/checkout.php">    <button type="submit" class="AddCart btn btn-success" name="add_package"
                                       value="Add to Cart" >
                                       <i class="fa fa-cc-paypal" aria-hidden="true"></i> &nbsp;Checkout <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                   </button></a></h2></div>   



  <p align="center"><img class="card-img-top" src="<?php echo $cimage;?>" alt="Card image cap" width=1000px height=400px></p>
<div class="clearfix">&nbsp;</div>

<div class="col-lg-8 col-md-offset-2">
  <h4 align="center"><i>Suitable for - <?php echo $rowpackage['suitable_for'] ?> People</i></h4>
<h4 align="center"><i><?php echo $rowpackage['package_des'] ?></i></h4>

</div>
<div class="clearfix">&nbsp;</div>

<br>
<hr>

<div class="col-lg-8 col-md-offset-2"><h3 align="center">Items included in the package</h3></div>
<br>
<div class="container">
    <div class="row">
        <?php 
            if(isset($_GET['success'])){

              $success=$_GET['success'];

              if($success==1)

                echo "<script type='text/javascript'>iziToast.success({

                  message: 'Item Added to Cart!',
                });</script>";
              }


              ?>
        <div class="col-md-6 col-sm-6 col-xs-12">
            
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6 hidden-xs">

        </div>
    </div>
    <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel" data-type="multi">
        <div class="carousel-inner">
            <div class="item active">
                <div class="row">
<?php while($row=$resultpack1->fetch(PDO::FETCH_BOTH)){

                            $item_id=$row['item_id'];
                                                    if($row['item_image']==""){
              $cimage="../../Apps/images/category.png";
            }else{
              $cimage="../../Apps/images/item_images/".$row['item_image'];
            }

 ?>
<figure class="snip1166 red">

  <img src="<?php echo $cimage;?>" alt="sample73" height=200px width=500px/>
  <a href="../view/item_feedback.php?item_id=<?php echo $row['item_id'];?>" target="_blank" >
  <figcaption>
    <h3><?php echo $row['item_name'];?></h3>

    <div>
      <p><?php echo $row['item_des'];?></p>
    </div></a>
  </figcaption>


  <div class="alert alert-dark" role="alert">

</div>

</figure>

       <?php
   }
   ?>

</div>
</div>

<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
<p align="center"><a href="../view/contact.php" target="_blank"><button type="text" class="btn btn-success" align="center">Request for a personalized package</button></a></p>
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
</div>
</div>
</div>

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


<script src="../assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="../../Apps/assets/vendor/bootstrap/js/popper.js"></script>
<script src="../../Apps/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="../../Apps/assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="../../Apps/js/main.js"></script> 
<script src="../../Apps/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
      });
});
</script>

</body>
</html>