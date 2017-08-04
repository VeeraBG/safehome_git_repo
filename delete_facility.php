<?php
$page="facility";
 include_once('dbFunction.php');
 $obj = new dbFunction();
 
$fid=$_POST['faci_id'];


 $del_faci=$obj->delete_facility($fid);
 if($del_faci==1)
 {
 header("location:add_facility.php");
 }

?>