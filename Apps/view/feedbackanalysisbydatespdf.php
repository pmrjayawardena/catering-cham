<?php
//index.php
//include autoloader
 $f=$_GET['from'];
 $t=$_GET['to'];
include '../common/dbconnection.php';
  include '../model/reportmodel.php';
require_once '../dompdf/autoload.inc.php';
 $obj=new report();
 $result1=$obj->feedbackAnalysisByDate($f, $t);
 $nor=$result1->rowCount();
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
<h2 align='center'>Feedback Analysis By Dates Report</h2>

<table width='500'><tr><th>From :&nbsp;$f</th><th>To :&nbsp;$t</th><th> No of Records :</th><th>$nor</th></tr>
<br>
<table>
 <tr>
        <td>Date</td>
                                <td>Item Name</td>
                                <td>Excellent</td>
                                <td>Very Good</td>
                                <td>Good</td>
                                <td>Bad</td>
                                <td>Very Bad</td>

 </tr>
";

 while($rowresa=$result1->fetch(PDO::FETCH_BOTH)){
 $hd=$rowresa['feedback_date'];
       $item_id=$rowresa['item_id'];

                            $resultitem=$obj->getitemname($item_id);
                          $rowitem=$resultitem->fetch(PDO::FETCH_BOTH);

                           $result2=$obj->feedbackAnalysisByDate_excellent($hd);
                           $rowres=$result2->fetch(PDO::FETCH_BOTH);

                            $result3=$obj->feedbackAnalysisByDate_verygood($hd);
                                     $rowres1=$result3->fetch(PDO::FETCH_BOTH);

                                     $result4=$obj->feedbackAnalysisByDate_good($hd);
                                     $rowres2=$result4->fetch(PDO::FETCH_BOTH);

                                     $result5=$obj->feedbackAnalysisByDate_bad($hd);
                                     $rowres3=$result5->fetch(PDO::FETCH_BOTH);
                                      $result6=$obj->feedbackAnalysisByDate_verybad($hd);
                                     $rowres4=$result6->fetch(PDO::FETCH_BOTH);
 $output .= '
  <tr>
  <td>'.$rowresa["feedback_date"].'</td>
  <td>'.'Feedback Count'.'<i class="fas fa-arrow-right"></i>'.'</td>
   <td>'.$rowres['ce'].'</td>
   <td>'.$rowres1['cg'].'</td>
   <td>'.$rowres2['ch'].'</td>
   <td>'.$rowres3['ci'].'</td>
  <td>'.$rowres4['cb'].'</td>
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

$document->stream("Webslesson", array("Attachment"=>0));
//1  = Download
//0 = Preview


?>
