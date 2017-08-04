<?php
include("dbFunction.php");
$obj=new dbFunction();

if($_REQUEST['did']){
//echo $_GET['q'];

    $id=$_REQUEST['did'];
    $id = mysql_escape_string($id);
}


$data=$obj->deleteOwner($id);

if($data==1)
{
//header("location:view_owner.php");
		echo '<script type="text/javascript">'; 
		echo 'window.location.href="view_owner123.php";'; 
		echo '</script>';
}

?>