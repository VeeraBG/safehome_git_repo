<?php
session_start();

//include("phpToPDF.php");
print_r($_SESSION);

 $image = $_SESSION['vimage'];
 $vfname = $_SESSION['vfname'];
 $vlname = $_SESSION['vlname'];
  $vreason =  $_SESSION['vreason'];
	 $persontomeet = $_SESSION['vpersontomeet'];
	 
	 $mobile = $_SESSION['vmobile'];
  $vaddress = $_SESSION['vaddress'];
  $vflatno = $_SESSION['vflatno'];
	$time = $_SESSION['vtime'];
 

 
 // $my_html="<html><head></head><body>";
 // $my_html.= "<div class='popup view_vistor_info' style='top:150px;left:30%;width:730px; display:none;'>";
                
// $my_html.= "<div class='row'><div class='col-sm-4'><img src=$image alt='vimage' width='200' height='190' class='img-rounded' />  </div>";
                                  
// $my_html.= "<div class='col-sm-8'><div class='col-sm-12'><h4>Name:$vfname.' '.$vlname;";  

// $my_html.= "</h4></div><div class='col-sm-12'>Reason:  $vreason; </div><div class='col-sm-12'>Person to meet:  $persontomeet; </div>";
 // $my_html.= "<div class='col-sm-12'>Mobile: $mobile </div><div class='col-sm-12'>Flat no: $vflatno</div>";
// $my_html.= " <div class='col-sm-12'>Intime: $time </div> <div class='col-sm-12'>Area:  $vaddress </div></div> </div> </div>";
 // $my_html.="<body></html>";   

 // PUT YOUR HTML IN A VARIABLE
$my_html="<html><head></head><body> <img src='http://ishasoftwares.com/demo/safehome/".$_SESSION['vimage']."' alt='vimage' width='250' height='250'/>";
$my_html.= "<h2><span style='color:red'>Visitor Details</span></h2><p><h3>Hello $vfname </h3> <table border='0'>";
 
 $my_html.="<tr><td>Name</th><th>$vfname</td></tr>";
 $my_html.="<tr><td>Reason</td><td>$vreason</td></tr>";
  $my_html.="<tr><td> Person to meet</td><td>$persontomeet</td></tr>";

  $my_html.="<tr><td>mobile</td><td>$mobile</td></tr>";
   $my_html.="<tr><td>time</td><td>$time</td></tr>";
    $my_html.="<tr><td>Area</td><td>$vaddress</td></tr>";
	
$my_html.="</table></body></html>";
 echo $my_html;
 
 exit;
 
 
 
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

	