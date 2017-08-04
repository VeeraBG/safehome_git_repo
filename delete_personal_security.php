<?php
include("dbFunction.php");
$obj=new dbFunction();

if($_REQUEST['secid']){
//echo $_GET['q'];

    $id=$_REQUEST['secid'];

}


$data=$obj->delete_security_personal($id);

if($data==1)
{
header("location:SecurityManagement_ViewPersonal123.php");
}

?>