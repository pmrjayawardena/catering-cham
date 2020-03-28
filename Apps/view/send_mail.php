<?php
//send_mail.php
include '../common/dbconnection.php';
include '../model/deliverymodel.php';
include '../model/drivermodel.php';
include '../model/ordermodel.php';

$obd=new delivery();
$obdriver=new driver();
$oborder=new order();

if(isset($_POST['email_data']))
{
  include '../phpmailer/PHPMailerAutoload.php';
 $output = '';
 foreach($_POST['email_data'] as $row)
 {

 $delivery_id=$row["delivery"];
 
$resultdelivery=$obd->viewADelivery($delivery_id);

$rowdelivery=$resultdelivery->fetch(PDO::FETCH_BOTH);

$order_id=$rowdelivery['order_id'];


$resultdeliveryandallocate=$obd->getdriverandvehicle($order_id);

$rowgetdriverandvehicledetails=$resultdeliveryandallocate->fetch(PDO::FETCH_BOTH);

$driver_id=$rowgetdriverandvehicledetails['driver_id'];
$vehicle_id=$rowgetdriverandvehicledetails['v_id'];

$resultvehicle=$obdriver->viewAVehicle($vehicle_id);
$rowvehicle=$resultvehicle->fetch(PDO::FETCH_BOTH);

$vehiclename=$rowvehicle['v_no'];

$resultdriver=$obdriver->viewADriver($driver_id);
$rowdriver=$resultdriver->fetch(PDO::FETCH_BOTH);
$drivername=$rowdriver['driver_fname']." ".$rowdriver['driver_lname'];
$contact=$rowdriver['driver_tel'];


 $mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = 'southernlanka123@gmail.com';
$mail->Password = 'southernlanka1@';

$mail->setFrom('southernlanka123@gmail.com', 'Southern Lanka Catering');
$mail->addAddress($row["email"],$vehicle_id);
$mail->Subject = 'Your Delivery Status';
$mail->isHTML(true);
$mail->Body = "Your order is on the way<br><br>"

."your order is being delivered by - {$drivername}<br><br>"
."vehicle Number is {$vehiclename}<br><br>"
."Contact driver - {$contact}<br><br>";



if ($mail->send())

$oborder->dispatched($order_id);
   $delivery_id=$row["delivery"];
$delivery_status='on the way';
   $result=$obd->updateDeliveryStatus($delivery_status,$delivery_id); 

   header("Location:../view/delivery_management.php?msg=11");
}
}

?>