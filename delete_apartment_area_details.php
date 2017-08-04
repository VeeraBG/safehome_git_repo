<?php
 include_once('dbFunction.php');
 $obj = new dbFunction();
 
$id=$_POST['area_id'];

$desqry=mysql_query("delete from  apartment_area_details where id=".$id);
 
 if(desqry)
 {
 header("location:apartment_details.php");
 }

?>