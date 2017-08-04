<?php
$page="vendor";
 include_once('dbFunction.php');
 $obj = new dbFunction();
 
 $id=$_POST['sec_id'];


 //$del_sec=$obj->delete_vendor($id);
// echo "delete from addvendor where vendor_id=".$id;
 $qry=mysql_query("delete from addvendor where vendor_id=".$id);
 if($qry)
 {
 $url="add_vendor.php";
  echo '<script type="text/javascript">';
      echo 'window.location.href="'.$url.'";';
      echo '</script>';
 }

?>