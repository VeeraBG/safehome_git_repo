<?php                                                                                                                                                                                                                                                               ?><?php

include_once('dbFunction.php');
$tname=$_POST['templatename'];
$tcantent=$_POST['templatecontent'];
echo $tname;
 $obj = new dbFunction();
$create_tem=$obj->create_template($tname,$tcantent);
if($group_create==1)
{
echo "crate template sucess";
}

?>