<?php
$page="complaints";
 include_once('dbFunction.php');
 $obj = new dbFunction();
 
$bid=$_POST['issue_id'];


 $del_blk=$obj->delete_issues($bid);
 if($del_blk==1)
 {
 header("location:MaintainanceReportedIssues.php");
 }

?>