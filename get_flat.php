<?php
include_once('dbFunction.php');
$obj = new dbFunction();


if(isset($_POST["blockid"]))
{
$block_id=$_POST["blockid"];
 $sql="SELECT * FROM floor WHERE floor_block_id ='$block_id'";
$result = mysql_query($sql);


echo "<select class='selectBox selectBox-dropdown' style='padding:3.5%;' name='flat_floor' id='blockfloor123' >";
echo "<option value=''>select</option>";
while($row = mysql_fetch_array($result))
{
$floorid=$row['floor_id'];
echo "<option value='$floorid'";
 if($floorid==$block_id)
 {
 echo 'selected=selected';
 }
 echo ">" . $row['floor_name'] . "</option>";
}
echo "</select>"; 
					
	}
	
	
?>		