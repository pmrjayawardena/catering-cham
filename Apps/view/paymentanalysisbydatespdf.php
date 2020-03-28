<?php
//index.php
//include autoloader
 $f=$_GET['from'];
 $t=$_GET['to'];
include '../common/dbconnection.php';
  include '../model/reportmodel.php';
require_once '../dompdf/autoload.inc.php';
 $obj=new report();
 $result2=$obj->paymentAnalysisByDate($f, $t);
 $result3=$obj->paymentAnalysisByDate_each($f, $t);
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
<h2 align='center'>Payment Report</h2>

<table width='500'><tr><th>From :&nbsp;$f</th><th>To :&nbsp;$t</th><th> Total Payments :</th><th>$nor</th></tr>
<br>
<table>
 <tr>
   <td>No of Payments</td>
                                <td>Payment Date</td>
                                <td>Total Revenue</td>

 </tr>
";

 while($row=$result3->fetch(PDO::FETCH_BOTH)){

 $output .= '
  <tr>
   <td>'.$row["ct"].'</td>
 
   <td>'.$row["payment_date"].'</td>
   <td>'.$row["S"].'</td>
  
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
