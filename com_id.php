<?php
include_once('dbFunction.php');
 $obj = new dbFunction();

if (isset($_GET['cid']))
 {
	
	echo $_SESSION['complaintid'] = $_GET['cid'];
	
	}
?>
