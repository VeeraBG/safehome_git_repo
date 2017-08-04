<?php
$page="facility";
 include_once('dbFunction.php');
 $obj = new dbFunction();
 $code1="Enter Facility";
 $facid=$_POST['faci_id'];
  $facname=$_POST['faci_name'];
if($facname=="")
{
echo $code1;
}
 $edi_fac=$obj->edit_facility($facid,$facname);
 if($edi_fac==1)
 {
  echo '<script type="text/javascript">'
   , 'window.location.href="add_facility.php";'
   , '</script>';
 }
 // if($edi_fac==3)
 // {
  // header("location:add_facility.php?msg=exist");
 // }

?>