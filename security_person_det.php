<?php
session_start();

if (isset($_GET['id'])) {
	
	echo $_SESSION['editsecureid'] = $_GET['id'];}
?>
