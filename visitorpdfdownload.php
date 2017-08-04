<?php
session_start();

require('./FPDF-master/fpdf.php');   
//print_r($_SESSION);

 $image = $_SESSION['vimage'];
 $vfname = $_SESSION['vfname'];
 $vlname = $_SESSION['vlname'];
  $vreason =  $_SESSION['vreason'];
	 $persontomeet = $_SESSION['vpersontomeet'];
	 
	 $mobile = $_SESSION['vmobile'];
  $vaddress = $_SESSION['vaddress'];
  $vflatno = $_SESSION['vflatno'];
	$time = $_SESSION['vtime'];
 

$pdf = new FPDF(); 
// Second page
$pdf->AddPage();
$pdf->SetFont('Arial','',20);
$pdf->Image($image,10,12,30,0,'','');
$pdf->SetLeftMargin(45);
$pdf->SetFontSize(14);
$pdf->Cell(40,10,"Name: $vfname ",'', 2);
$pdf->Cell(60,10,"Reason: $vreason",'', 2);
$pdf->Cell(60,10,"Person to meet: $persontomeet",'', 2);
$pdf->Cell(60,10,"Flat No: $vflatno",'', 2);
$pdf->Cell(60,10,"Mobile:$mobile",'', 2);
$pdf->Cell(60,10,"Area: $vaddress",'', 2);

//$pdf->Multicell(190,10, $my_html);
//$pdf->WriteHTML($my_html);
$pdf->Output();

?>

	