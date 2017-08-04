<?php
session_start();
include("phpToPDF.php");
                                        $oname=$_SESSION['ownernm'];
												 $email=$_SESSION['pdfemail'];
												$tot=$_SESSION['oamtotal'];
													$info=$_SESSION['sendinfo'];
													
													$maintanance_amount=$_SESSION['maintanance_amount'];
													$grandtotal=$_SESSION['grandtotal'];
													//print_r($info);




// PUT YOUR HTML IN A VARIABLE

$my_html = "<html><head></head><body><h2><span style='color:red'>Maintenance Charges</span></h2><p><h3>Hello $oname , Please Find Below Charges For This Month</h3> <table border='1'>";
 
 $my_html.="<tr><th>Maintenance Variable</th><th>Amount</th></tr>";

 foreach($info as $key => $val)
{
    $my_html.="<tr><td><b>$key</b></td><td></b>$val</td></b></tr>";
}

$my_html.="<tr><td><b>Variable Charges total</b></td><td><b>$tot Rs.</b></td></tr>";

$my_html.="<tr><td><b>Maintenance Amount</b></td><td><b>$maintanance_amount Rs.</b></td></tr>";

$my_html.="<tr><td><b>Grand Total</b></td><td><b>$grandtotal Rs.</b></td></tr>";
$my_html.="</table></body></html>";

// SET YOUR PDF OPTIONS -- FOR ALL AVAILABLE OPTIONS, VISIT HERE:  http://phptopdf.com/documentation/
$pdf_options = array(
  "source_type" => 'html',
  "source" => $my_html,
  "action" => 'view',
  "color" => 'monochrome',
  "page_orientation" => 'landscape');

// CALL THE phpToPDF FUNCTION WITH THE OPTIONS SET ABOVE
phptopdf($pdf_options);






?>

<?php
// print_r($test1);

// $message = "<html><head></head><body><h2><u>Maintenance Charges</u></h2><p><h3>Hello  , Please Find Below Charges For This Month</h3> <table border='1'>";
 // $message.="<tr><td><b>$email</b></td></tr>";
 // $message.="<tr><th>Maintenance Variable</th><th>Amount</th></tr>";

 // foreach($test1 as $key => $val)
// {
    // $message.="<tr><td><b>$key</b></td><td></b>$val</td></b></tr>";
// }

// $message.="<tr><td><b>Total</b></td><td><b>$total</b></td></tr>";

// $message.="</table>></body></html>";
//echo $message;
?>