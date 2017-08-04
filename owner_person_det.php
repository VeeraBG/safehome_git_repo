<?php
session_start();

if (isset($_GET['id'])) {
	
	$_SESSION['editownerid'] = $_GET['id'];
	}
?>
