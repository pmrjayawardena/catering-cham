<?php
//index.php
//include autoloader
 $f=$_GET['from'];
 $t=$_GET['to'];
include '../common/dbconnection.php';
  include '../model/reportmodel.php';
require_once '../dompdf/autoload.inc.php';
 $obj=new report();
 $result2=$obj->bookingAnalysisByDate($f, $t);
 $nor=$result2->rowCount();
// reference the Dompdf namespace

use Dompdf\Dompdf;

//initialize dompdf class

$document = new Dompdf();

$html = '
 <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

';

//$document->loadHtml($html);


//$document->loadHtml($page);


$output = "
 <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<div class='alert alert-info'><h2 align='center'>Order Analysis By Dates Report</h2></div>

<table width='500'><tr><th>From :&nbsp;$f</th><th>To :&nbsp;$t</th><th> Total Orders :</th><th>$nor</th></tr>
<br>
<table>
 <tr>
  <th>Order Id</th>
  <th>Customer Name</th>
  <th>Order Date</th>
  <th>Customer Telephone</th>
<th>Checkout Type</th>
 </tr>
";

 while($row=$result2->fetch(PDO::FETCH_BOTH)){

 $output .= '
  <tr>
   <td>'.$row["order_id"].'</td>
   <td>'.$row["cus_fname"].' '.$row["cus_lname"].'</td>
   <td>'.$row["order_date"].'</td>
   <td>'.$row["cus_tel"].'</td>
  <td>'.$row["checkout_type"].'</td>
  </tr>
 ';
}

$output .= '</table>';

//echo $output;

$document->loadHtml($output);

//set page size and orientation

$document->setPaper('A4', 'landscape');

//Render the HTML as PDF

$document->render();

//Get output of generated pdf in Browser

$document->stream("Southern Lanka", array("Attachment"=>0));
//1  = Download
//0 = Preview


?>
