<?php

include_once('dbFunction.php');
if(isset($_POST["temid"]))
{
$temid=$_POST['temid'];
$obj = new dbFunction();
$cantent=$obj->create_cantent($temid);
//echo $cantent;
$can=mysql_fetch_array($cantent);
echo $can['template_cantent'];
}
if(isset($_POST['sigid']))
{
$sig_id=$_POST['sigid'];
$obj = new dbFunction();
$cantent=$obj->show_signature($sig_id);
//echo $cantent;
//echo $sig_id;
//$qry=mysql_query("select * from signature where signature_id='".$sigid."'");
while($sign=mysql_fetch_array($cantent))
{
echo nl2br("Thanks and Regards,\n".$sign['signatue_cant']);
}
}
if(isset($_POST["groupname"]))
{
$groupname234=$_POST['groupname'];
echo $groupname234;
 $obj = new dbFunction();
$group_create=$obj->create_group($groupname234);
if($group_create==1)
{
echo "crate sucess";
}
}
if(isset($_POST["templatename"]) && isset($_POST["templatecontent"]))
{
$tname=$_POST['templatename'];
$tcantent=$_POST['templatecontent'];
echo $tname;
 $obj = new dbFunction();
$create_tem=$obj->create_template($tname,$tcantent);
if($group_create==1)
{
echo "crate template sucess";
}
}
if(isset($_POST['groupid']))
{
$group_id=$_POST['groupid'];
$obj = new dbFunction();
$group=$obj->show_group($group_id);
//echo $cantent;
//echo $sig_id;
//$qry=mysql_query("select * from signature where signature_id='".$sigid."'");
if($group[1]==1)
{
$group=$group[0];
while($omob=mysql_fetch_array($group))
{
echo $omob['owner_mobile'].",";

}
}
if($group[1]==2)
{
$group=$group[0];
while($omob=mysql_fetch_array($group))
{
echo $omob['security_mobile'].",";

}
}
if($group[1]==3)
{
$group=$group[0];
while($omob=mysql_fetch_array($group))
{
echo $omob['owner_mobile'].",";

}
}
if($group[1]==4)
{
$group=$group[0];
while($omob=mysql_fetch_array($group))
{
echo $omob['security_mobile'].",";

}
}
if($group[1]==5)
{
$group=$group[0];
while($omob=mysql_fetch_array($group))
{
echo $omob['owner_mobile'].",";

}
}
}
?>