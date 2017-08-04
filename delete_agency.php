<?php
$page="agency";
 include_once('dbFunction.php');
 $obj = new dbFunction();
 
echo $aid=$_POST['delagencyid'];


 $del_agency=$obj->delete_agency($aid);
 if($del_agency==1)
 {
 header("location:agency.php");
 }

?>