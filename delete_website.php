<?php
session_start();
$page="maintenance";
include_once('dbFunction.php');
$obj = new dbFunction();

$id =  $_REQUEST['id'];
 		 $tables = array("new_website","web_header","web_banner","web_footer");
				foreach($tables as $table) {
				  $query = "DELETE FROM $table WHERE website_id='$id'";
				  mysql_query($query);
				  echo "<script> alert('row deleted successfullay');</script>";
				}
				
				header("location:http://localhost/mysafehome/safehome/websites_list.php");
 		
?>






