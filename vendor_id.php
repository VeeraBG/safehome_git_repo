<?php
session_start();
//echo $_GET['vendorid'];
if(isset($_GET['vendorid']))
 {
 $_SESSION['vendorid'] = $_GET['vendorid'];
}
?>