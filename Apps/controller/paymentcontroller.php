
<?php 
include '../common/dbconnection.php';
include '../model/deliverymodel.php';
include '../model/paymentmodel.php';
include '../model/checkoutmodel.php';
include '../model/ordermodel.php';
include '../common/sessionhandling.php';

$obpayment=new payment();
$obdelivery=new delivery();
$obcheck=new checkout();
$oborder=new order();
$action=$_REQUEST['action'];

switch ($action){
	
	case "add" :
	
	// when payment is done after sometime
	
	$order_id = $_REQUEST['order_id']; //get the order id
	$payment_id = $_REQUEST['payment_id']; //get the payment id
	$total_amount = $_POST['total_amount']; //get the total amount
	$deliverycharge = $_REQUEST['deliverycharge']; //get the delivery charges
	$total=$_REQUEST['total']; //get the total
	$discount=$_REQUEST['discount']; //get the disount
	$payment_type="Cash"; //set the payment type
	$time_id=  time(); //get time
	$transaction_id=$time_id."_".$order_id; //create a trasnaction id using time and order id

	$resultdelivery=$obcheck->viewAnAddress($order_id); //get the checkout address using order id
	$rowdelivery=$resultdelivery->fetch(PDO::FETCH_BOTH);
	$delivery_date=$rowdelivery['delivery_date']; //get the delivery date
	$address=$rowdelivery['id']; //get the address 
	$cus_id=$rowdelivery['cus_id']; //get the customer id
	$order_status="Confirmed"; //set the status to confirmed


	$resultn=$obpayment->updatemanualpayment($total_amount,$deliverycharge,$transaction_id,$discount,$payment_type,$payment_id);
//update the payment record with payment details

	$resultd=$obdelivery->addDelivery($delivery_date,$order_id,$cus_id,$address); //add the delivery details

	$resulto=$oborder->updateorderstatusmanual($order_id,$order_status);//update the order status of the cus order table

	$checkitemorpackage=$obpayment->checkitemorpackage($order_id); //check if the order is package or items

	$no=$checkitemorpackage->rowCount(); //get the row count



	if($no!==0){ //if the row count is not zero
		header("Location:../view/invoice.php?payment_id=$payment_id"); //redirect to invoice page

	}else{

		header("Location:../view/invoicepackage.php?payment_id=$payment_id");//else redirect to invoice package page

 }  //redirection

 break;

 	case "cashondelivery" :
	
	// when payment is done after sometime
	
	$order_id = $_REQUEST['order_id']; //get the order id
	$payment_id = $_REQUEST['payment_id']; //get the payment id
	$total_amount = $_POST['total_amount']; //get the total amount
	$deliverycharge = $_REQUEST['deliverycharge']; //get the delivery charges
	$total=$_REQUEST['total']; //get the total
	$discount=$_REQUEST['discount']; //get the disount
	$payment_type="Cash"; //set the payment type
	$time_id=  time(); //get time
	$transaction_id=$time_id."_".$order_id; //create a trasnaction id using time and order id

	$resultdelivery=$obcheck->viewAnAddress($order_id); //get the checkout address using order id
	$rowdelivery=$resultdelivery->fetch(PDO::FETCH_BOTH);
	$delivery_date=$rowdelivery['delivery_date']; //get the delivery date
	$address=$rowdelivery['id']; //get the address 
	$cus_id=$rowdelivery['cus_id']; //get the customer id
	$order_status="Confirmed"; //set the status to confirmed


	// $resultn=$obpayment->updatemanualpayment($total_amount,$deliverycharge,$transaction_id,$discount,$payment_type,$payment_id);
//update the payment record with payment details

	$resultd=$obdelivery->addDelivery($delivery_date,$order_id,$cus_id,$address); //add the delivery details

	$resulto=$oborder->updateorderstatusmanual($order_id,$order_status);//update the order status of the cus order table

	$checkitemorpackage=$obpayment->checkitemorpackage($order_id); //check if the order is package or items

	$no=$checkitemorpackage->rowCount(); //get the row count



	if($no!==0){ //if the row count is not zero
		header("Location:../view/invoice.php?payment_id=$payment_id"); //redirect to invoice page

	}else{

		header("Location:../view/invoicepackage.php?payment_id=$payment_id");//else redirect to invoice package page

 }  //redirection

 break;
}


?>