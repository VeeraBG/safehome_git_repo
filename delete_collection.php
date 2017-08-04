<?php
$page="expenditure";
 include_once('dbFunction.php');
 $obj = new dbFunction();
 
echo $cid=$_POST['cal_id'];


 $del_exp=$obj->delete_collection($cid);
 if($del_exp==1)
 {
 header("location:Maintainance_Expenditure.php");
 }

?>