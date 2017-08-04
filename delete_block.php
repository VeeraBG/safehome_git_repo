<?php
$page="block";
 include_once('dbFunction.php');
 $obj = new dbFunction();
 
echo $bid=$_POST['block_id'];


 $del_blk=$obj->delete_block($bid);
 if($del_blk==1)
 {
 header("location:add_block.php");
 }

?>