<?php

include '../common/dbconnection.php';
include '../common/sessionhandling.php';
include '../model/paymentmodel.php';
$obp=new payment;

$payment_id=$_REQUEST['payment_id'];
$resultp=$obp->displayAllPaymentByPaymentID($payment_id);

$rowp=$resultp->fetch(PDO::FETCH_BOTH);

$resultemail=$obp->getEmail($payment_id);
$rowemail=$resultemail->fetch(PDO::FETCH_BOTH);
$cus_email=$rowemail['cus_email'];


$message = '';


function fetch_customer_data()
{
	$cus_email=$rowp['cus_email'];
	$obp=new payment;
	$payment_id=$_REQUEST['payment_id'];
	$resultp=$obp->displayAllPaymentByPaymentID($payment_id);
	$rowp=$resultp->fetchall();
	$subtotal=$rowp['total_amount'];
	$discount=$rowp['discount'];


    // $resultp=$obp->displayCheckoutDetails($payment_id);

	$output .= '

	<h4 align="center">Thank you for your Purchase! Your Order Is Confirmed</h4>
	<br>
	<div class="alert alert-info"><h2 align="center">INVOICE FOR YOUR TRASACTION</h2></div>
	
	<br>

	<div class="table-responsive">
	<table class="table ">
	
	<tr>
	<th>Order ID</th>
	
	<th>Item Name</th>
	<th>Item Price</th>
	<th>Item Quantity</th>
	<th>Trasaction ID</th>
	<th>Trasaction Date</th>
	</tr>
	';
	foreach($rowp as $row)
	{
		$output .= '
		<tr>
		<td>'.$row["order_id"].'</td>
		
		<td>'.$row["item_name"].'</td>
		<td>'.$row["item_price"].'</td>
		<td>'.$row["item_quantity"].'</td>
		<td>'.$row["trasaction_id"].'</td>
		<td>'.$row["payment_date"].'</td>
		</tr>

		';

		$subtotal=$row['total_amount'];
		$discount=$row['discount'];
		$t=$subtotal+$discount-$row['delivery_charges'];


	}
	$output .= '
	<tr>
	<td>   </td>
	<td>   </td>
	<td>   </td>
	<td>   </td>
	<td><h3>Subtotal</h3></td>
	<td class="text-right"><h3><strong>'.$t.'</strong></h3></td>
	</tr>
	<tr>
	<td>   </td>
	<td>   </td>
	<td>   </td>
	<td>   </td>
	<td><h5>Discount</h5></td>
	<td class="text-right"><h5><strong>'.$row["discount"].'</strong></h5></td>
	</tr>
	<tr>
	<td>   </td>
	<td>   </td>
	<td>   </td>
	<td>   </td>
	<td><h5>Delivery Charges</h5></td>
	<td class="text-right"><h5><strong>'.$row["delivery_charges"].'</strong></h5></td>
	</tr>
	<tr>
	<td>   </td>
	<td>   </td>
	<td>   </td>
	<td>   </td>
	<td><h3>Total</h3></td>
	<td class="text-right"><h3><strong>'.$subtotal.'</strong></h3></td>
	</tr>


	</table>
	</div>

	<div>
	<table class="invoice-head">
	<tbody>


	</tbody>
	</table>
	</div>
	<br>
	<br>



	<div>
	<table class="invoice-head">
	<tbody>
	<tr>
	<td class="pull-right"><strong>Payment Status &nbsp;</strong></td>
	<td>'.$row["payment_status"].'</td>
	</tr>
	<tr>
	<td class="pull-right"><strong>Transaction ID &nbsp;</strong></td>
	<td>'.$row["trasaction_id"].'</td>
	</tr>
	<tr>
	<td class="pull-right"><strong>Payment Date</strong></td>
	<td>'.$row["payment_date"].'</td>
	</tr>
	<tr>
	<td class="pull-right"><strong>Questions? Contact Us &nbsp;</strong></td>
	<td>southernlanka123@gmail.com</td>
	</tr>
	</tbody>
	</table>
	</div>
	</div>
	</div>
	';
	return $output;
}


if(isset($_POST['action']))
{

	include('pdf.php');  //include pdf.php page
	$file_name = md5(rand()) . '.pdf';   //set a file name
	$html_code = '<link rel="stylesheet" href="../css/bootstrap.min.css">';
	$html_code .= fetch_customer_data($connect);

	$pdf = new Pdf();  //create an object using domPDF class
	$pdf->load_html($html_code); //Load HTML code
	$pdf->render(); //render to pdf
	$file = $pdf->output();
	file_put_contents($file_name, $file);

     $pdf->setPaper('A4', 'landscape'); //set paper size and orientation 

     //Render the HTML as PDF

     $pdf->render();

     //Get output of generated pdf in Browser

     $pdf->stream("Southern Lanka", array("Attachment"=>0));
     //1  = Download
     //0 = Preview


	include '../phpmailer/PHPMailerAutoload.php'; //include page PHPMailerAutoload.php
	$output = '';

	$mail = new PHPMailer(); //create an object using PHPMailer class

	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPSecure = "ssl";
	$mail->Port = 465;
	$mail->SMTPAuth = true;
	$mail->Username = 'southernlanka123@gmail.com';  //email used to send emails
	$mail->Password = 'southernlanka1@';             //password of the email address

	$mail->setFrom('southernlanka123@gmail.com', 'Southern Lanka Catering'); //senders email
	$mail->addAddress($cus_email,'southern lanka catering'); //send to the relevent customers
	$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
	$mail->IsHTML(true);							//Sets message type to HTML				
	$mail->AddAttachment($file_name);               //set an attchment to email
	$mail->Subject = 'Invoice For Your trasaction';
	$mail->Body = "Dear <b> Customer </b> <br> <br>"


	.'We’ll let you know when it’s on the way. In the meantime, we have more things you’ll love at unbeatable prices!<br>

	&nbsp;<a href="http://localhost/my/website">Click Here To check our website </a>


	<br>'

	."<b>Southern Lanka Catering Service</b> <br>"
	."<b>No 453/A </b> <br>"
	."<b>Jalthara</b> <br>"
	."<b>Ranala</b> <br>"
	."<br>"
	."<b>Fax : 01145789356</b> <br>"
	."<b>Hot Line : 0770503433/0719140068</b> <br>"

	;




	if ($mail->send())

		$invoice_status='Sent';
	$result=$obp->updateInvoiceStatus($invoice_status,$payment_id);

	header("Location:../view/payment_management.php?msg=11");

	unlink($file_name);
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Southern Lanka Catering Service</title>
	<script src="../js/jquery.min.js"></script>
	<link rel="stylesheet" href="../css/bootstrap.min.css" />
	<script src="../js/bootstrap.min.js"></script>
	<link rel="icon" type="image/png" href="../images/icons/sl.ico"/>
</head>
<body>
	<script>
		function printDiv(divID) {
			
			var prtContent = document.getElementById(divID);
			var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=600,toolbar=0,scrollbars=0,status=0');
			WinPrint.document.write(prtContent.innerHTML);
			WinPrint.document.close();
			WinPrint.focus();
			WinPrint.print();
			WinPrint.close();
			

			
		}
	</script>
	<br />
	
	<div class="container">
		<h3 align="center">Send Transaction Invoice To Customer</h3>
		<br />
		<form method="post">
			<input type="submit" name="action" class="btn btn-danger" value="Send Invoice" /><?php echo $message; ?>

			<button type="button" class="btn btn-primary" onclick="javascript:printDiv('section-to-print')">Print</button>
		</form>

		<div id="section-to-print">
			<br />
			<?php
			echo fetch_customer_data();
			?>			
		</div>
		<br />
		<br />
		<a href="../view/payment_management.php"><input type="button" value="Go Back" class="btn btn-info btn-lg btn-block" /></a>
	</body>


	</html>





