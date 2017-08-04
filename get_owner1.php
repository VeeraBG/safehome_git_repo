<?php
include_once('dbFunction.php');
$obj = new dbFunction();
$block_id=$_POST["blockid"];
$floor_id=$_POST["floorid"];
$flat_id=$_POST["flatid"];

 $sql="SELECT * FROM owner WHERE owner_block ='$block_id' and owner_floor='$floor_id' and owner_flat='$flat_id'";
$result = mysql_query($sql);
$row786 = mysql_num_rows($result);
if($row786>=2)
{

echo "<script> alert('Owner AND  Tenant details Exist');</script>";
echo '<script type="text/javascript">'
   , 'window.location.href="add_owner.php";'
   , '</script>';
} 
if($row786==1)
{
while($row = mysql_fetch_array($result))
{
//$ow=$row['owner_tenant'];
$ownerst=$row['owner_tenant'];
$ownername=$row['owner_name'];
$ownerflatstatus=$row['owner_flatstatus'];
//echo "Flat $ownerst $ownername  Exists <br>";
if($ownerflatstatus=='Occupied' && $ownerst=='Owner' )
{
//if($ownerst=="Owner" || )
//echo "<p style='color:red;'>$ownerst($ownername) already  Exists in this flat</p><br>";
echo "<script> alert('$ownerst($ownername) already  Exists in this flat');</script>";
echo '<script type="text/javascript">'
   , 'window.location.href="add_owner.php";'
   , '</script>';
echo "<select class='selectBox selectBox-dropdown' style='padding:3.5%;' name='ownertenant' >";
echo "<option value=''>Select Owner OR Tenant</option>";
echo "</select>"	;

}
else if($ownerflatstatus=='Vacant' && $ownerst=='Owner' )
{
echo "<script> alert('Flat $ownerst $ownername  Enter Tenant details');</script>";	
echo "<select class='selectBox selectBox-dropdown' style='padding:3.5%;' name='ownertenant' >";
echo "<option value=''>Select Owner OR Tenant</option>";
echo "<option value='Tenant'>Tenant</option>";
   echo "</select>"	;
}
else
{
echo "<select class='selectBox selectBox-dropdown' style='padding:3.5%;' name='ownertenant' >";
echo "<option value=''>Select Owner OR Tenant</option>";
echo "<option value='Owner'>Owner</option>";
echo "<option value='Tenant'>Tenant</option>";
   echo "</select>"	;	
}
}
}
else
{
echo "<select class='selectBox selectBox-dropdown' style='padding:3.5%;' name='ownertenant' >";
echo "<option value=''>Select Owner OR Tenant</option>";
echo "<option value='Owner'>Owner</option>";
echo "<option value='Tenant'>Tenant</option>";
   echo "</select>"	;	
}	
?>