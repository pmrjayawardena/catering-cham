<?php 

session_start();
include '../../Apps/common/dbconnection.php';
include '../../Apps/model/itemmodel.php';
include '../common/session.php';


$cat_id=$_REQUEST['cat_id'];
$obitem= new item();

$resultc = $obitem->viewAnItemcategory($cat_id);
$resultcc = $obitem->viewItemsCategory($cat_id);
$rowi=$resultcc->fetch(PDO::FETCH_BOTH);

//index.php

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

  <style type="text/css">
  @import url(https://fonts.googleapis.com/css?family=Raleway:400,500,800);
  figure.snip0078 {
    font-family: 'Raleway', Arial, sans-serif;
    color: #fff;
    position: relative;
    float: left;
    margin: 5px 1%;
    min-width: 220px;
    max-width: 310px;
    max-height: 310px;
    width: 100%;
    text-align: center;
  }
  figure.snip0078 * {
    -webkit-box-sizing: padding-box;
    box-sizing: padding-box;
  }
  figure.snip0078 img {
    opacity: 1;
    max-width: 100%;
    border: 5px solid #000000;
    -webkit-transition: all 0.3s;
    transition: all 0.3s;
    -webkit-transform: scale(0.85);
    transform: scale(0.85);
    -webkit-transform-origin: 0 0;
    transform-origin: 0 0;
  }
  figure.snip0078 figcaption {
    bottom: 0;
    width: 60%;
    right: 0;
    position: absolute;
    background: #000000;
    padding: 20px;
    -webkit-transition: all 0.3s;
    transition: all 0.3s;
    -webkit-transform: translateY(0);
    transform: translateY(0);
    box-shadow: 0 0px 10px -10px #000000;
  }
  figure.snip0078 figcaption h2,
  figure.snip0078 figcaption p {
    margin: 0;
    color: #ffffff;
  }
  figure.snip0078 figcaption h2 {
    font-weight: 400;
    text-transform: uppercase;
  }
  figure.snip0078 figcaption h2 span {
    font-weight: 800;
  }
  figure.snip0078 figcaption p {
    font-size: 0.9em;
    font-weight: 500;
    opacity: 0.65;
  }
  figure.snip0078 a {
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    position: absolute;
    z-index: 1;
  }
  figure.snip0078.blue figcaption {
    background: #1b557a;
  }
  figure.snip0078.blue img {
    border: 10px solid #1b557a;
  }
  figure.snip0078.red figcaption {
    background: #81261d;
  }
  figure.snip0078.red img {
    border: 10px solid #81261d;
  }
  figure.snip0078.yellow figcaption {
    background: #a85913;
  }
  figure.snip0078.yellow img {
    border: 10px solid #a85913;
  }
  figure.snip0078:hover figcaption,
  figure.snip0078.hover figcaption {
    -webkit-transform: translateY(-8px);
    transform: translateY(-8px);
    box-shadow: 0 15px 15px -15px #000000;
  }
  figure.snip0078:hover.blue img,
  figure.snip0078.hover.blue img {
    border: 10px solid #2980b9;
  }
  figure.snip0078:hover.red img,
  figure.snip0078.hover.red img {
    border: 10px solid #c0392b;
  }
  figure.snip0078:hover.yellow img,
  figure.snip0078.hover.yellow img {
    border: 10px solid #e67e22;
  }


</style>

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
          <h4><?php echo $rowi["cat_name"]; ?></h4>
          <a href="../view/index.php">Home</a>
          <a class="active" href="../view/packages.php">View Items</a>
        </div>
      </div>
    </section>
    <!--================End Banner Area =================-->

    <!--================Booking Table Area =================-->
    <!--================End Our feature Area =================-->

    <!-- ============================= -->

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
        </div>
      </div>





      <section class="most_popular_item_area menu_list_page">
        <div class="container">
         <div class="p_recype_item_main">
          <div class="row p_recype_item_active">

           <?php while($row=$resultc->fetch(PDO::FETCH_BOTH)){


             if($row['item_image']==""){
              $cimage="../../Apps/images/category.png";
            }else{
              $cimage="../../Apps/images/item_images/".$row['item_image'];
            }

            ?>


            <div class="col-md-6 break snacks" style="height: 300px">

              <div class="media">

                <div class="media-left">
                  <img src="<?php echo $cimage;?>" alt="" height=250px width=200px>
                </div>

                <div class="media-body">

                  <form method="post">
                    <a href="../view/item_feedback.php?item_id=<?php echo $row["item_id"]; ?>"><h3><?php echo $row["item_name"]; ?></h3></a>
                    <h4>Rs. <?php echo $row["item_price"]; ?></h4>
                    <p></p>
                    <input type="text" name="quantity" value="1" class="form-control" />
                    <div class="clearfix">&nbsp;</div>

                    <input type="hidden" name="hidden_name" value="<?php echo $row["item_name"]; ?>" />

                    <input type="hidden" name="hidden_price" value="<?php echo $row["item_price"]; ?>" />
                    <p>Suitable for : <?php echo $row["suitable_for"]; ?> people</p>
                    <input type="hidden" name="hidden_id" value="<?php echo $row["item_id"]; ?>" />
                    <button type="submit" class="AddCart btn btn-info" name="add_to_cart"
                    value="Add to Cart" >
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to Cart
                  </button>
                  <ul>

                  </ul>

                </div>
              </div>
            </div>

          </form>
          <?php
        }
        ?>


      </div>
    </div>
  </div>
</section>
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
<script>
  var $poster = $('#card-container'),
  $shine = $('.shine'),
  w = $(window).width(),
  h = $(window).height();

  $(window).on('mousemove', function(e) {
    var offsetX = 0.5 - e.pageX / w,
    offsetY = 0.5 - e.pageY / h,
    dy = e.pageY - h / 2,
    dx = e.pageX - w / 2,
    theta = Math.atan2(dy, dx),
    angle = theta * 180 / Math.PI - 90,
    offsetPoster = $poster.data('offset'),
    transformPoster = 'translateY(' + -offsetX * offsetPoster + 'px) rotateX(' + (-offsetY * offsetPoster) + 'deg) rotateY(' + (offsetX * (offsetPoster * 2)) + 'deg)';

    if (angle < 0) {
      angle = angle + 360;
    }
    $shine.css('background', 'linear-gradient(' + angle + 'deg, rgba(0,0,0,' + (e.pageY / h /5)  + ') 0%,rgba(0,0,0,.25) 80%)');

    $poster.css('transform', transformPoster);
  });
</script>
</body>
</html>