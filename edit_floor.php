<?php

 include_once('dbFunction.php');
 $obj = new dbFunction();

 $code1="Select Block and enter flat ";
 $fid=$_POST['floor_id'];
 $fname=$_POST['floor_name'];
if($fname=="")
{
echo $code1;
}
else
{
 $edi_flo=$obj->edit_floor($fid,$fname);
 if($edi_flo==1)
 {
 echo '<script type="text/javascript">'
   , 'window.location.href="add_floor.php";'
   , '</script>';
 }
}
?>