<?php
session_start();

if (isset($_GET['id'])) {

$_SESSION['ceid'] = $_GET['id'];
}



?>