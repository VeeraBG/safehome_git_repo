<?php
/************************ YOUR DATABASE CONNECTION START HERE   ****************************/

include_once('dbFunction.php');
 $obj = new dbFunction();

$databasetable = "owner";

/************************ YOUR DATABASE CONNECTION END HERE  ****************************/


set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
include 'PHPExcel/IOFactory.php';

// This is the file path to be uploaded.
$inputFileName = './discussdesk.xlsx'; 
//echo $inputFileName;

try {
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
} catch(Exception $e) {
	die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}


$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
//print_r($allDataInSheet);
 $arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet
//print_r($allDataInSheet);

for($i=2;$i<=$arrayCount;$i++){
$block = trim($allDataInSheet[$i]["A"]);
$name = trim($allDataInSheet[$i]["B"]);
$nop=trim($allDataInSheet[$i]["C"]);
$mbno=trim($allDataInSheet[$i]["D"]);
$doc=trim($allDataInSheet[$i]["E"]);
 $floor=trim($allDataInSheet[$i]["F"]);
 $lname= trim($allDataInSheet[$i]["G"]);
 $lphone= trim($allDataInSheet[$i]["H"]);
 $person1= trim($allDataInSheet[$i]["I"]);
 $age=trim($allDataInSheet[$i]["J"]);
 $occupation=trim($allDataInSheet[$i]["K"]);
 $flat=trim($allDataInSheet[$i]["L"]);
 $email=trim($allDataInSheet[$i]["M"]);
 $password=trim($allDataInSheet[$i]["O"]);
 $newFilePath=trim($allDataInSheet[$i]["P"]);
// $string = $newFilePath->getCoordinates();
// $coordinate = PHPExcel_Cell::coordinateFromString($string);
// if ($newFilePath instanceof PHPExcel_Worksheet_Drawing){
// echo $filename = $newFilePath->getPath();
// $newFilePath->getDescription();
// copy($filename, 'uploads/owner_gallery/' . $newFilePath->getDescription());
// }
$query = "SELECT * FROM ".$databasetable."";
$sql = mysql_query($query);
$recResult = mysql_fetch_array($sql);

$existName = $recResult["owner_email"];
if($existName!=$email && $email!='' && $name!='' &&  $password!='' &$block!='' &&  $floor!='' &&  $flat!='') {

$insertTable= mysql_query("INSERT INTO owner (owner_id, owner_block, owner_name, owner_mobile, owner_no_persons, owner_date_occupancy, owner_floor, owner_lname, owner_land_phone, owner_person1_name, owner_age,owner_occupation, owner_flat, owner_date,owner_email,owner_password,owner_image,owner_status) 
VALUES ('','$block', '$name', '$mbno', '$nop', '$doc', '$floor', '$lname', '$lphone', '$person1', '$age', '$occupation', '$flat',NOW(),'$email','$password','$newFilePath','Active') ");	
$insertid=mysql_insert_id();
header("location:add_owner.php?msg=exceladded");
}
else if($existName==$email) {
header("location:add_owner.php?msg=emailexist");
//$_SESSION[$msg] = 'Email id already exist.';
}
else if($insertid==''){
header("location:add_owner.php?msg=allfields");
$_SESSION[$msg] = 'Please fill all Mandatory Fields';
}


}

//echo "<div style='font: bold 18px arial,verdana;padding: 45px 0 0 500px;'>".$msg."</div>";

?>
