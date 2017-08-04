<?php 
//session_start();
include_once('dbFunction.php');
 $obj = new dbFunction();
 if($_SESSION['societyid'] !="")
 {
$soid=$_SESSION['societyid'];
}
$code1="";$code2="";$code3="";$code4="";$code5="";
//$owner_id=$_SESSION['editpersonid'];
$get_facilty=$obj->get_sdetails($soid);
$get_blocks=$obj->getblock_details();
if(isset($_POST['editsociety']))
{
$soid=$_POST['soid'];
$mumbertype=$_POST['societymumber'];
$block=$_POST['block'];
 $floor=$_POST['floor'];
 $flat=$_POST['flata'];

$mumbername1=$_POST['ownerdrop'];

$mumber=explode(",",$mumbername1);

$mumbername=$mumber[0];
$mumberid=$mumber[1];

//echo $mumbername;
//echo $mumberid;
if($mumbertype=="" || $mumbername=="" || $mumberid=="" || $block=="" || $floor=="" || $flat==""  )
{
if($block=="" || $floor=="" || $flat=="" )	
{	
$code1="Enter block,Floor and Flat";
}
if($mumbertype=="")	
{	
$code2="Select Society Member";
}
if($mumbername=="" || $mumberid=="" )	
{	
$code3="Select Owner details";
}
}
else
{

$data=$obj->update_society($mumbertype,$mumbername,$mumberid,$soid);

if($data==1)
{
//echo "<script> alert(' alert($reason)');</script>";
//header("location:add_society_members.php");
	echo '<script type="text/javascript">'; 
		echo 'window.location.href="add_society_members.php";'; 
		echo '</script>';
}

}
}
?>

<!DOCTYPE html>
<html lang="en">
		<?php include("top_header.php"); ?>
<body>
<!--Start Header-->
<div id="screensaver">
	<canvas id="canvas"></canvas>
	<i class="fa fa-lock" id="screen_unlock"></i>
</div>
<div id="modalbox">
	<div class="devoops-modal">
		<div class="devoops-modal-header">
			<div class="modal-header-name">
				<span>Basic table</span>
			</div>
			<div class="box-icons">
				<a class="close-link">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
		<div class="devoops-modal-inner">
		</div>
		<div class="devoops-modal-bottom">
		</div>
	</div>
</div>
<script>
function showFloor(str) {  
//alert(str);
$.post("get_data.php",{str:str},function(data) {  //location.reload();
 //$( ".result" ).html('MY ID is - '+data );
  $("#floor").html(data);
});

}
</script>
<script>
function showflat(flr) {  

//alert(flr);
var blockid=$('#block123').val();
//alert(blockid);
$.post("get_flat1.php",{flr:flr,blockid:blockid},function(data) {  //location.reload();
 //$( ".result" ).html('MY ID is - '+data );
  $("#flat").html(data);
});



}
</script>
<header class="navbar">
	<?php include("header.php"); ?>
</header>
<!--End Header-->
<!--Start Container-->
<body>
<div id="main" class="container-fluid">
	<div class="row">
		<?php include("leftmenu.php"); ?>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
		<a href="#" class="add_page_button">Edit Society Members<span class="fa fa-plus"></span> </a>
        
        <div class="clearfix"></div>
		

        <div class="box-content box">
		<?php 
		
		//$get_own=mysql_fetch_array($get_facilty);
		
		?>
		
				<form id="" method="post" action="" class="form-horizontal">
					<div class="col-sm-3">
					
					<span style="color:red">
					 <?php
					 if(isset($code1))
					 { 
					 echo $code1;
					 } 
					 ?>
					 </span>
					</div>
					
					  <div class="clearfix"></div>
					<div class="col-sm-3">
					<script>
					//var blockid=<?php echo $get_own['facility_booking_block']?>;
					//var floor=<?php echo $get_own['facility_booking_floor']?>;
								//var flat=<?php echo $get_own['facility_booking_flat']?>;
				//alert(flat);
					//showflat1(blockid,floor,flat);
// showFloor1(blockid,floor);	
		
		
			</script>
			<?php
			$fet_rep=mysql_fetch_array($get_facilty);
				
					  $owner_id=$fet_rep['society_member_id'];
					  $socownername= $fet_rep['society_member_name'];
					$qry786=mysql_query("select * from owner where owner_id=".$owner_id);
					$fet_owner=mysql_fetch_array($qry786);
					 $blockid=$fet_owner['owner_block'];
					 $floorid=$fet_owner['owner_floor'];
					 $flatid=$fet_owner['owner_flat'];
  	$sql="SELECT * FROM owner WHERE owner_block ='$blockid' and owner_floor='$floorid' and owner_flat='$flatid'";
   $result=mysql_query($sql);
			?>
			<script>
			
			 
			
			
			</script>

                    <select class="selectBox selectBox-dropdown"  id="block123" style='padding:3.5%;'  name="block" 
					onChange="showFloor(this.value)">
                    	<option value="">Select Block</option>
						<?php 
					
						while($row=mysql_fetch_array($get_blocks))
						{

						?>
<option value="<?php echo $row['block_id'];?>" <?php if($row['block_id']==$blockid){ echo 'selected="selected"';}?>><?php echo $row['block_name'];?></option>
                   
                       
                      <?php } ?>
                       </select>
                    </div>
                    <div class="col-sm-3" id="floor">
                     <select  class="selectBox selectBox-dropdown" id="floor123" style='padding:3.5%;'  name="floor" 
					 onChange='showflat(this.value)' >
					 <option value="">Select Floor</option>
                    	<?php 
                                 						
						$sqlflo=mysql_query("select *from floor where floor_block_id='$blockid'");
						while($gfr=mysql_fetch_array($sqlflo))
						{
                                
						?>
<option value="<?php echo $gfr['floor_id'];?>" 
<?php 
if($gfr['floor_id']==$floorid)
{
 echo 'selected="selected"';
 } ?> >  <?php echo $gfr['floor_name'];?></option>
                   
                       
                      <?php } ?>
                       </select>
                    </div>
					   <div class="col-sm-3" id="flat" >
                     <select  class="selectBox selectBox-dropdown"   style='padding:3.5%;'
					 name="flata" onchange="showowner(flatid") >
                    	<option value="">Select Flat</option>
                    	<?php 
						$sqlfet=mysql_query("select *from flat where flat_floor_id='$floorid'");
						while($flatfet=mysql_fetch_array($sqlfet)) {
                                
						?>
<option value="<?php echo $flatfet['flat_id'];?>" 
<?php 
if($flatfet['flat_id']==$flatid)
 {
 echo 'selected="selected"';
} ?> > <?php echo $flatfet['flat_name'];?></option>
                   
                       
                      <?php } ?>
                       </select>
                    </div>
					  <div class="clearfix"></div>
                <div  style="color:red" class="col-sm-3"> <?php
					 if(isset($code3))
					 { 
					 echo $code3;
					 } 
					 ?></div>
<div  style="color:red" class="col-sm-3"> <?php
					 if(isset($code2))
					 { 
					 echo $code2;
					 } 
					 ?></div>


				 
                    <div class="clearfix"></div>
					<input type="hidden" value="<?php echo $fet_rep['society_id'];?>" name="soid" />
					<div id="owner" class="col-sm-3">
			<?php		
					while($row = mysql_fetch_array($result))
{
$ownerstatus=$row['owner_status'];
if($ownerstatus=="Active")
{
$ownerid=$row['owner_id'];
$ownername=$row['owner_name'];
$ownernopersons=$row['owner_person1_name'];

 ?>
 <select class="selectBox selectBox-dropdown" style="padding:3.5%;" name="ownerdrop" id="owner123" >
<option value="">select</option>
<option value="<?php echo $ownername.",".$ownerid ; ?>" <?php 
if($ownername==$socownername)
{
echo 'selected="selected"';
 } ?> ><?php echo $ownername ;?></option>
    <?php $ownernopersons =unserialize($ownernopersons);
for($i=0;$i<count($ownernopersons);$i++)
{
?>
<option value="<?php echo $ownernopersons[$i].",".$ownerid ; ?>"<?php 
if($ownernopersons[$i]==$socownername)
{
echo 'selected="selected"';
 } ?> > <?php echo $ownernopersons[$i] ?></option>
<?php }?>
</select> 
<?php
}}	
?>					
					
					
					
					
					</div>	             
                    <div  class="col-sm-3"><select class="selectBox selectBox-dropdown" style='padding:3.5%;' name="societymumber" >
					   	<option value="">Select Society</option>
						<option value="President"<?php if ($fet_rep['society_member_type'] == 'President') echo ' selected="selected"'; ?>>President</option>
						<option value="Secretary"<?php if ($fet_rep['society_member_type'] == 'Secretary') echo ' selected="selected"'; ?>>Secretary</option>
						<option value="Treasurer"<?php if ($fet_rep['society_member_type'] == 'Treasurer') echo ' selected="selected"'; ?>>Treasurer</option>
						</select>
					</div>
                    <div class="col-sm-3"></div>
                    <div class="clearfix"></div>
					
					
					<div class="clearfix"></div>
                                       
                    <!-- NEW PERSONS ADDED WILL BE APPENDED INTO THIS DIV -->
                    <div id="newPersons_div" class='col-sm-12' style="padding:0px; margin:0px;"></div>
	   
                                                         
              
                  <!-- 	<a href="#"  class="input_outer"> <span class="fa fa-plus"></span> </a>-->
                   <div class="clearfix"></div>
                  
                    
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
                    
                    <div class="col-sm-3">
				           <input type="submit" class="btn btn-danger" name="editsociety" value="Update" >
                    </div>
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
					
				</form>
				</div>
				</div>
                 <div class="clearfix"></div>
			</div>
        </div>
        </div>
        		</div>
		<!--End Content-->

<!--End Container-->

<script type="text/javascript">
$(document).ready(function() {

	$('#input_date').datepicker({setDate: new Date()});

});
</script>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src="plugins/jquery/jquery-2.1.0.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<script src='js/jquery-1.9.1.min.js'></script>
<script type="text/javascript" src="js/jquery.selectBox.js"></script>
<link type="text/css" rel="stylesheet" href="css/jquery.selectBox.css"/>

<script type="text/javascript">
		/*  $(document).ready(function(){
            $('select').selectBox({ mobile: true });
		});*/
		
</script>
<script>
function showowner(flatid) {  
//alert(flatid);
var blockid=$('#block123').val();
var floorid=$('#floor123').val();
//alert(floorid);
//alert(blockid);
$.post("get_owner4.php",{flatid:flatid,blockid:blockid,floorid:floorid},function(data) {  //location.reload();
 //$( ".result" ).html('MY ID is - '+data );
  if(data!="")
  {
  $("#owner").html(data);
}
 });

}
</script>
<?php include("footer.php"); ?>



<script src="js/footer_js.js"></script>
</body>
</html>
