<?php
session_start();
$page="maintenance";
include_once('dbFunction.php');
$obj = new dbFunction();
 $get_society=$obj->getsociety_details();
$get_blocks=$obj->getblock_details();


