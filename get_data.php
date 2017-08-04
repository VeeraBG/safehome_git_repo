<?php
include_once('dbFunction.php');
$obj = new dbFunction();
if(isset($_POST["str"]))
{
if(isset($_POST['floorid']))
{
$floorid=$_POST['floorid'];
}
$q=$_POST["str"];
$sql="SELECT * FROM floor WHERE floor_block_id =".$q;
$result = mysql_query($sql);
echo "<select id='floor123' name='floor' class='selectBox selectBox-dropdown' style='padding:3.5%;' onChange='showflat(this.value)'>";
echo "<option value=''>Select Floor</option>";
while($row = mysql_fetch_array($result))
{
if($row['floor_id']==$floorid)
{ 
$sel="selected='selected'";
}
else
{
$sel='';
}
echo "<option value='".$row['floor_id']."' ".$sel.">". $row['floor_name'] . "</option>";
}
echo "</select>";
}
?>
