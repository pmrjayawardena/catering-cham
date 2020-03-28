<?php
include '../../Apps/common/dbconnection.php';
include '../../Apps/model/ordermodel.php';
include '../../Apps/model/checkoutmodel.php';
include '../../Apps/model/paymentmodel.php';
include '../../Apps/model/deliverymodel.php';
include '../common/sessionhandling.php'; 
include '../../Apps/model/offermodel.php';

$oboffer=new offer();
$oborder=new order();
$obcheck=new checkout();
$obpayment=new payment();
$obdelivery=new delivery();

$result=$obcheck->getLastInsertedAddress();
$row=$result->fetch(PDO::FETCH_BOTH);


$cus_id=$row['cus_id'];

$order_id=$oborder->addOrder($cus_id);



$delivery_date=$row['delivery_date'];
$address=$row['id'];
$resultd=$obdelivery->addDelivery($delivery_date,$order_id,$cus_id,$address);

if($resultd){
$time_id=  time();//
$obcheck->updatecheckoutorder($order_id,$address);

}

$time_id=  time();//Time Stamp
$transaction_id=$time_id."_".$order_id;

//get the total payment of the order after payment is success
$pay=$_SESSION["fullamount"];  
$deliverycharge=$_SESSION["deliverycharge"]; 
//get the discount of the order after payment is success
$dis=$_SESSION["dis"]; 

$payment_type="Cash";
if($_SESSION["package_id"]!=0) 
{

    $obpayment->addPaymentcashondeliverywebsite($pay,$deliverycharge,$order_id,$transaction_id,$dis,$payment_type);



}else{
    $obpayment->addPaymentcashondeliverywebsite($pay,$deliverycharge,$order_id,$transaction_id,$dis,$payment_type);

}


if(isset($_COOKIE["shopping_cart"]))
{
    $total = 0;
    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
    $cart_data = json_decode($cookie_data, true);


    foreach($cart_data as $keys => $values)
    {

        $oborder->orderDetails($values,$order_id);
    }
}


if($_SESSION["package_id"]!=0)
{
    $package_quantity=$_SESSION["package_qty"];
    $package_id=$_SESSION["package_id"];

    $oborder->orderPackageDetails($order_id,$package_id,$package_quantity);
    ?>

    <?php

}


// add offer details to customer

$resultoffer=$oboffer->getofferlunch();
$rowoffer=$resultoffer->fetch(PDO::FETCH_BOTH);


$resultcount=$oboffer->getordercount();
$noofordercount=10;


if($rowoffer['offer_status']=="Active" && $noofordercount=10){


    $offer_status="Unclaimed";
    $offer_number=time();
    $notification_msg="Congradulations you have won a lunch for two person at Southern Lanka Catering Service.<br> This offer is valid only for 7 days contact us for more details.<br> Please provide the offer number when reaching the premises.<br>"."<b>your offer number is </b> : ".$offer_number;


    $notification_id=$oboffer->addofferNotification($notification_msg,$offer_status,$offer_number);




    $oboffer->addCusNotification($cus_id,$notification_id);

}


// end of offer details to customer


echo "Thank you for your payment. Your transaction has been completed, and a receipt for your purchase has been emailed to you. You may log into your account at www.paypal.com to view details of this transaction.";


$_SESSION["pay"]="";
$_SESSION["paypalphp"]="";
$_SESSION["package_id"]="";
unset($_SESSION['package_id']);
?>

<script type="text/javascript">

    setTimeout(function(){

       window.location="../view/cart1.php?action=clear";
   },3000 );
</script>

