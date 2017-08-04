<?php

 include_once('dbFunction.php');
 $obj = new dbFunction();
 
echo $flid=$_POST['flat_id'];


 $del_fla=$obj->delete_flat($flid);
 if($del_fla==1)
 {
 header("location:add_block.php");
 }

?>
              