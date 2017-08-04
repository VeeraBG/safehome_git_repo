<?php

include_once('dbFunction.php');
$groupname234=$_POST['groupname'];
echo $groupname234;
 $obj = new dbFunction();
$group_create=$obj->create_group($groupname234);
if($group_create==1)
{
echo "crate sucess";
}

?>