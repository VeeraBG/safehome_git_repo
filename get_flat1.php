<?php
include_once('dbFunction.php');
$obj = new dbFunction();


if(isset($_POST["blockid"]))
{

$block_id=$_POST["blockid"];
 $sql="SELECT * FROM flat WHERE flat_block_id ='$block_id' and flat_floor_id='".$_POST['flr']."'";
$result = mysql_query($sql);


echo "<select class='selectBox selectBox-dropdown' style='padding:3.5%;' name='flat_floor' id='blockfloor123' onChange='showowner(this.value)' >";
echo "<option value=''>select</option>";
while($row = mysql_fetch_array($result))
{

echo "<option value='".$row['flat_id']."'>" . $row['flat_name'] . "</option>";
}
echo "</select>"; 
					
	}
	
	
?>		