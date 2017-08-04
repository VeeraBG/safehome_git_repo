<?php
session_start();

if (isset($_GET['id'])) {
	
	echo $_SESSION['agid'] = $_GET['id'];}
?>

