<?php
$page="block";
include_once('dbFunction.php');
 $obj = new dbFunction();
 
echo $fid=$_POST['floor_id'];


 $del_flo=$obj->delete_floor($fid);
 if($del_flo==1)
 {

 header("location:add_block.php");
 }

?>