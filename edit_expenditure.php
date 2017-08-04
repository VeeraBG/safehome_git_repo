<?php
$page="expenditure";
 include_once('dbFunction.php');
 $obj = new dbFunction();
 // exp_id:id,exp_name:ename,exp_price:eprice
 $eid=$_POST['exp_id'];
 $ename=$_POST['exp_name'];
$eprice=$_POST['exp_price'];
 $edi_exp=$obj->edit_expen($eid,$ename,$eprice);
 if($edi_exp==1)
 {
 header("location:Maintainance_Expenditure.php");
 }

?>