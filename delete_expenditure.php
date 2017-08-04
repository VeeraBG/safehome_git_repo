<?php
$page="expenditure";
 include_once('dbFunction.php');
 $obj = new dbFunction();
 
echo $eid=$_POST['exp_id'];


 $del_exp=$obj->delete_expen($eid);
 if($del_exp==1)
 {
 header("location:Maintainance_Expenditure.php");
 }

?>