<?php 

session_start();
include '../../Apps/common/dbconnection.php';
include '../../Apps/model/itemmodel.php';
include '../common/session.php';
$obitem = new item();

$result = $obitem->getTheRowCount();

$nor=$result->rowCount();
$nop =  ceil($nor/5);

if(!isset($_REQUEST['page']) || $_REQUEST['page']==1){
 $start=0;
 $page=1;

}else{
 $page=$_REQUEST['page'];
 $start=$page*5-1;
}
$limit=9;
$resultn=$obitem->viewitemLimited($start,$limit);
//index.php


$connect = new PDO("mysql:host=localhost;dbname=ocs", "root", "");

$message = '';

if(isset($_POST["add_to_cart"]))  //when the button is submitted  cookie is set
{
    if(isset($_COOKIE["shopping_cart"]))
    {
        $cookie_data = stripslashes($_COOKIE['shopping_cart']);

        $cart_data = json_decode($cookie_data, true);
    }
    else
    {
        $cart_data = array();  //initiate an array 
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
        $item_array = array(                              //add items to an array 
            'item_id'           =>  $_POST["hidden_id"],
            'item_name'         =>  $_POST["hidden_name"],
            'item_price'        =>  $_POST["hidden_price"],
            'item_image'        =>  $_POST["hidden_image"],
            'item_quantity'     =>  $_POST["quantity"]
        );

        
        $cart_data[] = $item_array;
    }

    
    $item_data = json_encode($cart_data);
    setcookie('shopping_cart', $item_data, time() + (86400 * 30));   //set the cookie and give the cookie a time
    header("location:../view/items.php?success=1");


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
<link rel="icon" type="image/png" href="../../Apps/images/icons/slweb.ico"/>
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>RedCaynne Re</title>

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
            <h4>Items</h4>
            <a href="#">Home</a>
            <a class="active" href="../view/items.php">Items</a>
        </div>
    </div>
</section>
<!--================End Banner Area =================-->

<!--================Booking Table Area =================-->
<!--================End Our feature Area =================-->

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


               <?php
               $query = "SELECT * FROM item i,category c WHERE i.cat_id=c.cat_id AND c.cat_name!='miscellaneous' ORDER BY i.item_id ASC LIMIT $start,$limit";
              $statement = $connect->prepare($query);
               $statement->execute();
               $result = $statement->fetchAll(); 

               foreach($result as $row)
               {

                 $item_id=$row['item_id'];
                 if($row['item_image']==""){
                  $cimagee="../../Apps/images/category.png";
              }else{
                  $cimagee="../../Apps/images/item_images/".$row['item_image'];
              }
              ?>
              <a href="../view/item_feedback.php?item_id=<?php echo $row["item_id"]; ?>">
                <form method="post">
                    <div class="col-md-4 col-sm-6 break snacks">
                        <div class="feature_item">
                            <div class="feature_item_inner">
                                <img src="<?php echo $cimagee;?>" height="180px" width="317px">
                                <div class="icon_hover">
                                    <i>View</i>

                                </div>
                            </div>
                            <div class="title_text">
                                </a> 
                                <h3><span><b><i><?php echo $row["item_name"]; ?></i></b></span></h3>
                                <div class="restaurant_feature_dots"></div>
                                <div class="feature_right">Rs. <?php echo $row["item_price"]; ?></div>
                            </div>
                        
                        <input type="hidden" name="hidden_name" value="<?php echo $row["item_name"]; ?>" />
                        <input type="hidden" name="hidden_price" value="<?php echo $row["item_price"]; ?>" />
                        <input type="hidden" name="hidden_id" value="<?php echo $row["item_id"]; ?>" />
                        <input type="hidden" name="hidden_image" value="<?php echo $row["item_image"]; ?>" />
                        <div class="clearfix">&nbsp;</div>
                        <h4>Suitable for : <?php echo $row["suitable_for"]; ?> People</h4>
                        <h4>Item size : <?php echo $row["item_size"]; ?></h4>
                        <input type="number" name="quantity" value="1" class="form-control" />
                        <div class="clearfix">&nbsp;</div>
                        <button type="submit" class="AddCart btn btn-info" name="add_to_cart"
                        value="Add to Cart" >
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to Cart
                    </button>






                </div>
            </div>
        </form>

    <?php }?>


  <div class="clearfix">&nbsp;</div>
</div>
</div>
</div>
</section>

    <center>


        <nav aria-label="Page navigation example">
          <ul class="pagination">
              <?php 
              for($i=1; $i<=$nop; $i++) {
                  ?>
                  <li class="page-item"><a class="page-link" href="../view/items.php?page=<?php echo $i;?>"><?php echo $i; ?></a></li>
              <?php } ?>
          </ul>
      </nav>
  </center>
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