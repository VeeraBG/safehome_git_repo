<?php
include_once('dbFunction.php');
$obj = new dbFunction();
$block_id=$_POST["blockid"];
$floor_id=$_POST["floorid"];
$flat_id=$_POST["flatid"];

 $sql="SELECT * FROM owner WHERE owner_block ='$block_id' and owner_floor='$floor_id' and owner_flat='$flat_id'";
$result = mysql_query($sql);

while($row = mysql_fetch_array($result))
{
$ownerid=$row['owner_id'];
$ownername=$row['owner_name'];
$ownernopersons=$row['owner_person1_name'];
if($row['owner_status']=="Active")
 {
 echo "<select class='selectBox selectBox-dropdown' style='padding:3.5%;' name='ownerdrop' id='owner123' >";
echo "<option value=''>select</option>";
echo "<option value='$ownername'>$ownername</option>";
     $ownernopersons =unserialize($ownernopersons);
for($i=0;$i<count($ownernopersons);$i++)
{
echo "<option value='".$ownernopersons[$i]."'>". $ownernopersons[$i] . "</option>";
}
	echo "</select>"; 

}

}				

	
?>