<?php

 include_once('dbFunction.php');
 $obj = new dbFunction();
 $code1="Enter block,Floor and flat";
 $flid=$_POST['flat_id'];
 $flname=$_POST['flat_name'];
 $block=$_POST['blockname'];
 $floor=$_POST['floorname'];
 if($flname=="" || $block=="" || $floor=="")
 {
	echo $code1; 
 }
 else
 {
 $edi_fla=$obj->edit_flat($flid,$flname);
 if($edi_fla==1)
 {
  echo '<script type="text/javascript">'
   , 'window.location.href="add_flat.php";'
   , '</script>';
 }
 }
?>
