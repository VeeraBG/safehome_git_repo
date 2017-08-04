<?php

echo "welcome";

 echo $url= $_POST['url'];
//echo $message = $_POST['message'];
//ob_start();
header("location:$url");
?>