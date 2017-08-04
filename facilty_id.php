<?php
include_once('dbFunction.php');
 $obj = new dbFunction();

if (isset($_GET['fid']))
 {
	
	echo $_SESSION['faclityid'] = $_GET['fid'];
	
	}
?>
