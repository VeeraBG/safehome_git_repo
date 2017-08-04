<?php
 include_once('dbFunction.php');
 $obj = new dbFunction();
 
$sid=$_POST['soc_id'];


 $del_soci=$obj->delete_society($sid);
 if($del_soci==1)
 {
 header("location:add_society_members.php");
 }

?>