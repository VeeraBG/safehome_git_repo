<?php
include_once('dbFunction.php');
$obj = new dbFunction();
$block_id=$_POST["blockid"];
$floor_id=$_POST["floorid"];
$flat_id=$_POST["flatid"];
$ow_status=$_POST["fstatus"];
 $sql="SELECT * FROM owner WHERE owner_block ='$block_id' and owner_floor='$floor_id' and owner_flat='$flat_id'";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result))
{
$owstatus=$row['owner_flatstatus'];
//$ow=$row['owner_tenant'];
$ownerst=$row['owner_tenant'];
$ownername=$row['owner_name'];
//if($ownerst=="Owner" || )
if($owstatus=='Occupied')
{
echo " <script>alert('Flat $ownerst $ownername Exist');</script>";
echo " Flat $ownerst $ownername Exist <br>";
}
}				

	
?>