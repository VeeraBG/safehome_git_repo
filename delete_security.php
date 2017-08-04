<?php
$page="security";
 include_once('dbFunction.php');
 $obj = new dbFunction();
 
 $id=$_POST['sec_id'];


 $del_sec=$obj->delete_security_personal($id);
 if($del_sec==1)
 {
 header("location:SecurityManagement_ContractHire.php");
 }

?>