<?php
include("dbFunction.php");
$obj=new dbFunction();

if($_REQUEST['did']){
//echo $_GET['q'];

    $id=$_REQUEST['did'];
    $id = mysql_escape_string($id);
}


$data=$obj->delete_security_contract($id);

if($data==1)
{
header("location:SecurityManagement_View_ContractHire.php");
}

?>