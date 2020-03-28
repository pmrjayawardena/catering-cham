<?php

include '../common/dbconnection.php';
include '../model/ordermodel.php';
include '../model/itemmodel.php';
include '../model/packagemodel.php';
include '../model/checkoutmodel.php';
include '../model/paymentmodel.php';
include '../common/sessionhandling.php';
include '../model/offermodel.php';
$obo=new offer();
$obpayment=new payment();
$oborder= new order();
$obitem = new item();
$obc=new checkout();
$obpackage=new package();
$action = $_REQUEST['action'];

switch ($action) {

    case "Delete": //cancel an order

    $order_id=$_REQUEST['order_id']; //request the order id
    $r=$oborder->deleteAnOrder($order_id); //delete a perticular order

    if($r){ //if the order is deleted


      $msg = base64_encode("A record has $msg  been added");
      header("$item_id record has been deleted"); //redirection
  }else{


      $msg = base64_encode("A record has $msg  been added");
      header("$item_id record has  not been deleted"); //redirection
  }

  $msg= base64_encode($msg);
  header("Location:../view/order_management.php?msg=$msg"); //redirection
  break;


  case "add":


  if($_SESSION['sid'] == ""){ //if the session id is empty
    $ip = $_SERVER['REMOTE_ADDR']; //get the ip address 
    $_SESSION['sid']= time()."_".$ip; //create a session using time and ip address
}

$sid=$_SESSION['sid']; //asign the session to a variable $sid
$cus_id=$_REQUEST['cus_id']; //request the cus id from the url

$rorder=$oborder->checkOrder($sid); //check the cus_order table if the session is there

//$rowcheck=$rorder->fetch(PDO::FETCH_BOTH);
$nor= $rorder->rowcount(); //get the rowcount
if($nor==0){ //if the rowcount is zero meaning there's no record macthing the session id
    $order_status="Pending";      //asign the order status pending to a variable 
    $order_id=$oborder->addOrder1($cus_id,$order_status,$sid); //add a new cusorder record and get the order id of the added record


}else{

    $roworder=$rorder->fetch(PDO::FETCH_BOTH); //if a record is there in the db get the order id of that record
    $order_id=$roworder['order_id'];   
}

header("Location:../view/addorder.php?msg=$msg&cus_id=$cus_id&order_id=$order_id"); //redirect to addorder page with cus id and the order id

break;

case "additem": //add item to temp cart

$item_id = $_REQUEST['item_id']; //request the item id from the url
$cus_id = $_REQUEST['cus_id'];   //request the cus_id from the url
$order_id = $_REQUEST['order_id']; //request the order_id  from the url
$quantity = $_POST['quantity']; //get the quantity from the modal
$item_price = $_POST['item_price']; //get the price from the modal

$order_price = $item_price*$quantity;  //total order price

$rorder=$oborder->checktemporder($order_id,$item_id); //check if the same item is there in the temp order table
$nos=$rorder->rowCount(); //get the row count

if($nos==0){ //if the rowcount is 0 meaning theres no such an item in the database therefore add the new record with the quantity price order id and item id.


    $oborder->addTempOrder2($order_id,$item_id,$quantity,$order_price); 
    $msg="An Item quantity has been added";


}else{
   $oborder->updateTempOrder2($quantity,$order_price,$item_id,$order_id);
   $msg="An Item quantity has been updated";
}
$msg= base64_encode($msg);



header("Location:../view/addorder.php?msg=7&cus_id=$cus_id&order_id=$order_id"); //redirection
break;


case "remove": //remove the temp cart items


$item_id = $_REQUEST['item_id']; //request the item id
$order_id = $_REQUEST['order_id']; //request the order id from the url

$cus_id = $_REQUEST['cus_id']; //request the cus id from the  url
$resultorder=$oborder->deleteTempOrderItems($order_id,$item_id); //delete the record using item id and order id

header("Location:../view/addorder.php?msg=8&cus_id=$cus_id&order_id=$order_id"); //redirection

break;



case "confirmorder": //confirm the cart table


$cus_id = $_REQUEST['cus_id']; //request the cus id from url
$order_id2 = $_REQUEST['order_id']; //request the order id from the url
$arr=$_POST; //get the detauls from the 

$cus_city=$arr['cus_city'];
$id=$obc->addCusAddmanual($arr,$cus_id,$order_id2);


$resultpack = $obpackage->viewAllPackageitems2($order_id2); //get the details from the order package table using order id
$rowpack=$resultpack->fetchall();
$package_id=$rowpack[0];  //get the package id

if($package_id==""){ //if the package id is empty

$sum1=$oborder->totalpriceofmanualorder($order_id2); //get the total order price from the temp order table for a perticular order id


$resulsum1=$sum1->fetch(PDO::FETCH_BOTH);
$total=$resulsum1['S']; //get the sum and asign to variable $total

header("Location:../view/homedeliveryinternal.php?id=$id&order_id=$order_id2&cus_id=$cus_id&total=$total&cus_city=$cus_city");
//redirect to homedeliveryinternal.php page 
//
}else{

$sum1=$oborder->totalpriceofmanualorderpackage($order_id2); //if theres a package id get the total sum and redirect to home delivery internal
$resulsum1=$sum1->fetch(PDO::FETCH_BOTH);
$total=$resulsum1['S'];

header("Location:../view/homedeliveryinternal.php?id=$id&order_id=$order_id2&cus_id=$cus_id&total=$total&cus_city=$cus_city");

}



break;

case "select": //select the checkout type from the modal home or shop


$item_id = $_REQUEST['item_id']; //request the item id
$order_id = $_REQUEST['order_id'];  //request the order id
$arr=$_POST; //asign the data from the form to $arr variable

$checkout_type=$arr['select']; //asign the checkout type to variable
$cus_id = $_REQUEST['cus_id']; //request the cus id

$result=$oborder->updateorderselect($checkout_type,$order_id); //update the cus_order table in checkout type feild
$resultorder=$oborder->viewTempOrderItems($order_id);//get the temp order items using order id



foreach($resultorder as $keys => $values)
{

    $oborder->addItemOrdermanual($values,$order_id); //add the items to order_item table
}

$resultsum=$oborder->totalpriceofmanualorder($order_id); //get the price of the order
$rowsum=$resultsum->fetch(PDO::FETCH_BOTH);
$totalfull=$rowsum['S'];

//check if the offer is active or not and calculate the discount 

$resultoffer1=$obo->getOfferStatusAndMoney();
$rowoffer=$resultoffer1->fetch(PDO::FETCH_BOTH);
$dbstatusmoney=$rowoffer['offer_status'];


if($dbstatusmoney=="Active"){
if($totalfull>=7000){

    $discount=$totalfull*0.10;
}elseif($totalfull>=5000){

   $discount=$totalfull*0.075;
}elseif($totalfull>=1000){

    $discount=$totalfull*0.05;

}else{

    $discount=0;
}
}else{

$discount=0;  
}


$totalwithdiscount=$totalfull-$discount;

if($checkout_type=="Home"){ //if the checkout type is home redirect to homedlivery page 
    header("Location:../view/homedelivery.php?msg=$msg&cus_id=$cus_id&order_id=$order_id");

}else{

    $payment_id=$obpayment->addPaymentmanual1($order_id,$totalwithdiscount,$discount); //if the checkout type is shop add the record in payment table with order id,discount and total amount

    header("Location:../view/paycash.php?payment_id=$payment_id&order_id=$order_id&totalfull=$totalfull&discount=$discount");

    //redirection to paycash page
    unset($_SESSION['sid']);
}



break;

case "confirmorderfinal":

$cus_id = $_REQUEST['cus_id']; //request cus_id
$order_id2 = $_REQUEST['order_id']; //request order id
$totalfull=$_REQUEST['totalfull'];  //request totalamount
$deliverycharge=$_REQUEST['deliverycharge']; //request delivery charge
$discount=$_REQUEST['discount']; //request discount

$totalwithdiscount=$totalfull-$discount+$deliverycharge; //total amount with discount
$resultorder=$oborder->viewTempOrderItems($order_id2); //get the temp order items

foreach($resultorder as $keys => $values)
{

    $oborder->addItemOrdermanual($values,$order_id2); //add details to order item table
}
$payment_id=$obpayment->addPaymentmanual($order_id2,$totalwithdiscount,$deliverycharge,$discount);
unset($_SESSION['sid']); //unset the sesssion id 
header("Location:../view/paycash.php?payment_id=$payment_id&order_id=$order_id2&deliverycharge=$deliverycharge&totalfull=$totalfull&discount=$discount"); //redirect to paycash page
break;



case "add1":
if($_SESSION['sidpackage'] == ""){  //create a session id for the addding a package order
    $ip = $_SERVER['REMOTE_ADDR']; //get the ip address
    $_SESSION['sidpackage']= time()."_".$ip; //create a session using time and ip address
}
$sid=$_SESSION['sidpackage']; //asign the session to sid 
$cus_id=$_REQUEST['cus_id']; //get the cus id from the url

$rorder=$oborder->checkpackageOrder($sid); //check the cus order table for a perticular session id

//$rowcheck=$rorder->fetch(PDO::FETCH_BOTH);
$nor= $rorder->rowcount();  //if the rowcount equal to 0 meaning no recrds
if($nor==0){
    $order_status="Pending";      
    $order_id=$oborder->addOrder1($cus_id,$order_status,$sid); //add a new record using new sid order status and cus id
//print_r($order_id);
}else{
    $roworder=$rorder->fetch(PDO::FETCH_BOTH); //if the session id is there get the order id of that record
    $order_id=$roworder['order_id'];   
}


header("Location:../view/addpackageorder.php?msg=$msg&cus_id=$cus_id&order_id=$order_id"); //redirection
break;

case "addpackage":

$package_id = $_REQUEST['package_id']; //get the package id
$cus_id = $_REQUEST['cus_id']; //request the cus id
$order_id = $_REQUEST['order_id']; //request the order id
$quantity = $_POST['quantity'];  //request the package quantity
$package_price = $_POST['package_price']; //request the package price

$order_price = $package_price*$quantity;  //calculate the total order price

$rorder=$oborder->checktemppackage($order_id,$package_id); //check if the pckage is already in the temp table
$nos=$rorder->rowCount();//get the rowcount


if($nos==0){ //if the rowcount equal to 0 add a package details to temp table with order id,package id,order price
    $oborder->addTemppackage($order_id,$package_id,$quantity,$order_price);
    $msg="An Item quantity has been added";


}else{ //if there is a record update the record with quantity 
   $oborder->updateTemppackage($quantity,$order_price,$package_id,$order_id);
   $msg="An Item quantity has been updated";
}
$msg= base64_encode($msg);

header("Location:../view/addpackageorder.php?msg=$msg&cus_id=$cus_id&order_id=$order_id&msg=18"); //redirection
break;


case "selectpackage": //check the checkout type


$package_id = $_REQUEST['package_id']; //get the package id from url
$order_id = $_REQUEST['order_id'];  //get the order id
$arr=$_POST;//get the checkout type details from the form

$checkout_type=$arr['select']; //asign the selected type to variable checkout type
$cus_id = $_REQUEST['cus_id']; //get the cus id from the url

$result=$oborder->updateorderselect($checkout_type,$order_id); //update the cus order table with checkout type
$resultorder=$oborder->viewTempOrderpackage($order_id); //and get the temp order package details



foreach($resultorder as $keys => $values)
{

    $oborder->addpackageOrdermanual($values,$order_id); //add the details to the order_package table qith data
}

$resultsum=$oborder->totalpriceofmanualorderpackage($order_id); //get the total order price from the temp package table

$rowsum=$resultsum->fetch(PDO::FETCH_BOTH);
$totalfull=$rowsum['S']; //asign the sum to variable


 //check if the offer is active or deactive
$resultoffer1=$obo->getOfferStatusAndMoney();
$rowoffer=$resultoffer1->fetch(PDO::FETCH_BOTH);
$dbstatusmoney=$rowoffer['offer_status'];


if($dbstatusmoney=="Active"){
if($totalfull>=7000){

    $discount=$totalfull*0.10;
}elseif($totalfull>=5000){

   $discount=$totalfull*0.075;
}elseif($totalfull>=1000){

    $discount=$totalfull*0.05;

}else{

    $discount=0;
}

}else{

$discount=0;

}


$totalwithdiscount=$totalfull-$discount;

if($checkout_type=="Home"){
    header("Location:../view/homedelivery.php?msg=$msg&cus_id=$cus_id&order_id=$order_id"); //if the checkout type is home redirect to homedelivery page with relevent data in the url

}else{

    $payment_id=$obpayment->addPaymentmanual1($order_id,$totalwithdiscount,$discount); //else add a record to payment table with relevent order details and payment details

    header("Location:../view/paycash.php?payment_id=$payment_id&order_id=$order_id&totalfull=$totalfull&discount=$discount&deliverycharge=0"); //redirect to paycash page


    unset($_SESSION['sidpackage']); //unset the session package id after completing the orde package
}



break;

case "removepackage": //remove the temp cart items


$package_id = $_REQUEST['package_id']; //request the item id
$order_id = $_REQUEST['order_id']; //request the order id from the url

$cus_id = $_REQUEST['cus_id']; //request the cus id from the  url
$resultorder=$oborder->deleteTempOrderpackage($order_id,$package_id); //delete the record using item id and order id

header("Location:../view/addpackageorder.php?msg=8&cus_id=$cus_id&order_id=$order_id&msg=17"); //redirection

break;

case "dispatched": //update the cus order table for dispatched status


$order_id=$_REQUEST['order_id']; //get the order id from the url

$r=$oborder->dispatched($order_id);//update the dispatched status


if($r){

header("Location:../view/order_management.php?msg=9");//redirection

}
break;

}



?>
