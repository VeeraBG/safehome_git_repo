<?php
session_start();
$page="maintenance";
include_once('dbFunction.php');
$obj = new dbFunction();


$email=$_POST['email'];
 $total=$_POST['total'];
 
$test1=$_POST['test1'];

$maintanamnt=$_POST['maintanamnt'];
$grandtotal=$_POST['grandtotal'];
  //$oname=$_SESSION['ownernm'];

//print_r($test1);

$message = "<h2><u>Maintenance Charges</u></h2><p><h3>Hello  , Please Find Below Charges For This Month</h3> <table border='1'>";
 $message.="<tr><th>Maintenance Variable</th><th>Amount</th></tr>";
foreach($test1 as $key => $val)
{
    $message.="<tr><td><b>$key</b></td><td></b>$val</td></b></tr>";
}
$message.="<tr><td><b>Variable Total</b></td><td><b>$total</b></td></tr>";
$message.="<tr><td><b>Maintenance Amount</b></td><td></b>$maintanamnt</td></b></tr>";
$message.="<tr><td><b>Grand Total</b></td><td><b>$grandtotal</b></td></tr>";


$message.="</table>";
//echo $message;

$bb="isha.mallesh@gmail.com";
$headers = "From: " . $bb. "\r\n";
$headers .= "CC: isha.ravikrishna@gmail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$to=$email;
$subject = "Maintenance Charges  Details";




//echo $message;
//$message="Invoice details Send Soon";
$sendemail=mail($to,$subject,$message,$headers);

if($sendemail)
{
echo "<script> alert('Invoice Details Sent to mail');</script>";
//header("location:collections.php?msg=sent");
}



?>