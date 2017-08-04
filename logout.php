<?php
session_start();
include_once('dbFunction.php');
$obj=new dbFunction();

session_destroy();

// header("Location:index.php");
		echo '<script type="text/javascript">'; 
		echo 'window.location.href="index.php";'; 
		echo '</script>';
?>