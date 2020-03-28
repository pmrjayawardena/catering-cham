<?php 

include '../../Apps/common/dbconnection.php';
include '../../Apps/model/itemmodel.php';
include '../common/sessionhandling.php';
include '../common/session.php';
$cus_id = $cusinfo['cus_id'];


$obitem = new item();

$result = $obitem->viewAllItems();

if($_SESSION['cartsession'] == ""){
    $ip = $_SERVER['REMOTE_ADDR'];
    $_SESSION['cartsession']= time()."_".$ip."_".$cus_id;
}
$cartsession=$_SESSION['cartsession'];






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
    header("location:../view/cart1.php?success=1");

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

if(isset($_GET["success"]))
{
    $message = '
    <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Item Added into Cart
    </div>
    ';
}

if(isset($_GET["delete"]))
{
    $message = '
    <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Item removed from Cart
    </div>
    ';
}
if(isset($_GET["clear"]))
{
    $message = '
    <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Your Shopping Cart has been clear...
    </div>
    ';
}



$obitem = new item();

$result = $obitem->viewAllItems();

function getDiscount($total){

    if($total>=7000){

        return .10;
    }elseif ($total>=5000) {
        return .075;
    }elseif ($total>=1000) {
        return .05;
    }else{

        return 0;
    }
}


 // function convertCurrency($amount, $from, $to){
 //    $url  = "https://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
 //    $data = file_get_contents($url);
 //    preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);
 //    $converted = preg_replace("/[^0-9.]/", "", $converted[1]);
 //    return round($converted, 0);
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <style type="text/css">
    
    .slider-item{
        border: 1px solid #E1E1E1;
        border-radius: 5px;
        background: #FFF;
    }
    .slider-item .slider-image img{
        margin: 0 auto;
        width: 100%;
    }
    .slider-item .slider-main-detail{
        padding: 10px;
        border-radius: 0 0 5px 5px;
    }
    .slider-item:hover .slider-main-detail{
        background-color: #dbeeee !important;
    }
    .slider-item .price{
        float: left;
        margin-top: 5px;
    }
    .slider-item .price h5{
        line-height: 20px;
        margin: 0;
    }
    .detail-price{
        color: #219FD1;
    }
    .slider-item .slider-main-detail .rating{
        color: #777;
    }
    .slider-item .rating{
        float: left;
        font-size: 17px;
        text-align: right;
        line-height: 52px;
        margin-bottom: 10px;
        height: 52px;
    }
    .slider-item .btn-add{
        width: 50%;
        float: left;
        border-right: 1px solid #E1E1E1;
    }
    .slider-item .btn-details{
        width: 50%;
        float: left;
    }
    .controls{
        margin-top: 20px;
    }
    .btn-info,.btn-info:visited,.btn-info:hover{
        background-color: #21BBD8;
        border-color: #21BBD8;
    }
    .btn-info{
        margin-left:5px;
    }
    .slider-main-detail:hover{
        background-color: #dbeeee !important;
    }
    .AddCart{
        margin: 0px;
        padding:5px;
        border-radius:2px;
        margin-right:10px;
    }
    .review {
        margin-bottom: 5px;
        padding-top:5px;
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
            <h4>Cart</h4>
            <a href="#">Home</a>
            <a class="active" href="../view/login.php">Login</a>
        </div>
    </div>
</section>
<!--================End Banner Area =================-->

<!--================Booking Table Area =================-->
<!--================End Our feature Area =================-->

<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
          <form method="post" action="../view/checkout.php">
           <div style="clear:both"></div>
           <?php echo $message; ?>
           <div align="right">
              <a href="../view/cart1.php?action=clear"><b>Clear Cart</b></a>
          </div>
          <table class="table">
            <thead>
                <tr>
                 <th width="40%">Item Name</th>
                 <th width="10%" class="text-center">Quantity</th>
                 <th width="20%" class="text-center">Unit Price</th>
                 <th width="15%"class="text-center">Total</th>
                 <th width="5%" class="text-center"></th>

             </tr>

         </thead>
         <?php
         if(isset($_COOKIE["shopping_cart"]))
         {
            $total = 0;
            $cookie_data = stripslashes($_COOKIE['shopping_cart']);
            $cart_data = json_decode($cookie_data, true);
            foreach($cart_data as $keys => $values)
            {

            
                $row = $result->fetch(PDO::FETCH_BOTH);
                $item_id=$row['item_id'];
                if($values['item_image']==""){
                  $cimage="../../Apps/images/category.png";
              }else{
                  $cimage="../../Apps/images/item_images/".$values['item_image'];
              }
              ?>
              <tbody>
                <tr>
                    <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="<?php echo $cimage;?>" style="width: 72px; height: 72px;"> </a>
                            <input type="text" name="item_name" id="item_name" value="<?php echo $values["item_name"]; ?>" readonly />
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                            <input type="text" name="item_quantity" id="item_quantity" class="text-center" value="<?php echo $values["item_quantity"]; ?>" readonly/>
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><input type="text" class="text-center" name="item_price" id="item_price" value="Rs.<?php echo $values["item_price"]; ?>"  /></strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><input type="text" name="total" id="total" class="text-center" value="Rs.<?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?>" /></strong></td>
                        <td class="col-sm-1 col-md-1">

                            <button type="button" class="btn btn-link">
                             <a href="../view/cart1.php?action=delete&id=<?php echo $values["item_id"]; ?>">
                                <span class="glyphicon glyphicon-trash"> </span>
                            </button>

                        </td>
                    </tr>
                    <?php   
                    $total = $total + ($values["item_quantity"] * $values["item_price"]);



                }
                ?>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h3>Subtotal</h3></td>
                    <td class="text-right"><h5><strong>Rs.<?php echo number_format($total, 2); ?></strong></h5></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h5>Discount</h5></td>
                    <td class="text-right"><h5><strong>Rs.<?php $discount=getDiscount($total);

                    echo $dis=$total*$discount;


                    ?>

                    <?php 


$dis=$total*$discount; //calculate the discount
$_SESSION["dis"]=$dis; //set the discount into session

?>




</strong></h5></td>
</tr>
<tr>
    <td>   </td>
    <td>   </td>
    <td>   </td>
    <td><h3>Total</h3></td>
    <td class="text-right"><h3><strong>Rs.<?php echo $totalf=$total-$dis; 

    $_SESSION["pay"]=$totalf;
    ?></strong></h3></td>
</tr>
<tr>
    <td>   </td>
    <td>   </td>
    <td>   </td>
    <td>
        <a href="../view/items.php"><button type="button" class="btn btn-default">
            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
        </button></a></td>
        <td>
            <button type="submit" class="btn btn-success" name="checkout">
                Checkout <span class="glyphicon glyphicon-play"></span>
                <input type="hidden" name="business" value="pmrjayawardena@gmail.com"/>
            </button></td>
        </tr>

        <?php
    }
    else
    {
        echo '
        <tr>
        <td colspan="5" align="center"><b>No Item in Cart</b></td>
        </tr>
        ';
    }
    ?>

</td>
</tr>
</tbody>
</table></form>
</div>
</div>
</div>

<!-- ============================= -->


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