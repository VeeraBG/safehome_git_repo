<?php
include_once('dbFunction.php');
 $obj = new dbFunction();

if (isset($_GET['soid']))
 {
	
	echo $_SESSION['societyid'] = $_GET['soid'];
	
	}

	
	?>
