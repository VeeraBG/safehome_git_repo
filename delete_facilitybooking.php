<?php
$page="facility";
 include_once('dbFunction.php');
 $obj = new dbFunction();
 
$faid=$_POST['fac_id'];


 $del_facib=$obj->delete_facilityboking($faid);
 if($del_facib==1)
 {
 header("location:facility_booking.php");
 }

?>