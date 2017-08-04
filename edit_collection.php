<?php
$page="expenditure";
 include_once('dbFunction.php');
 $obj = new dbFunction();
 // exp_id:id,exp_name:ename,exp_price:eprice
 echo $eid=$_POST['exp_id'];
 echo $ename=$_POST['exp_name'];
echo $cprice=$_POST['col_price'];
 $edi_coll=$obj->edit_collectionprice($eid,$ename,$cprice);
 if($edi_coll==1)
 {
 header("location:Maintainance_Expenditure.php");
 }

?>