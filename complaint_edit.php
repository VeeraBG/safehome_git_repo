<?php 
include_once('dbFunction.php');
 $obj = new dbFunction();
 if($_SESSION['complaintid'] !="")
 {
$comid=$_SESSION['complaintid'];
}
//$owner_id=$_SESSION['editpersonid'];
$get_owner=$obj->get_cdetails($comid);
$get_blocks=$obj->getblock_details();
if(isset($_POST['editcomplaint']))
{
$block=$_POST['block'];
$floor=$_POST['floor'];
$flat=$_POST['flat_floor'];
$name=$_POST['ownerdrop'];
//$complaint=$_POST['complaint'];
$priority=$_POST['priority'];
$carea=$_POST['carea'];
if($block==""|| $floor=="" || $flat=="" || $name=="" || $priority=="" || $carea=="")
{
if($block==""|| $floor=="" || $flat=="")
{
$code1="Enter Block,Floor and Flat" ;
}
if($name=="")
{
$code2="Select owner name" ;
}
if($priority=="")
{
$code3="Select Priority" ;
}
if($carea=="")
{
$code4="Enter complaint" ;
}
}
else
{
$data212=$obj->update_complaint($comid,$block,$floor,$flat,$name,$priority,$carea);

if($data212==1)
{
//echo "<script> alert('Owner Created Successfully');</script>";
 header("location:MaintainanceReportedIssues.php");
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
		<a href="#" class="add_page_button">Edit Complaint<span class="fa fa-plus"></span> </a>
        
		<div class="box-content box">
     <div class="clearfix"></div>
		
<div class="col-sm-3">
					<span style="color:red">
					 <?php
					 if(isset($code1))
					 { 
					 echo $code1;
					 } 
					 ?>
					 </span></div>
					     <div class="clearfix"></div>
        
		<?php 
		
		$get_own=mysql_fetch_array($get_owner);
		
		?>
		
				<form id="" method="post" action="" class="form-horizontal">
					<div class="col-sm-3">
					<script>
					var blockid=<?php echo $get_own['complaint_block']?>;
					var floor=<?php echo $get_own['complaint_floor']?>;
								var flat=<?php echo $get_own['complaint_flat']?>;
				//alert(flat);
					showflat1(blockid,floor,flat);
 showFloor1(blockid,floor);	
		
		
			</script>

                    <select class="selectBox selectBox-dropdown"  id="block123" style='padding:3.5%;'  name="block" 
					onChange="showFloor(this.value)">
                    	<option >Select Block</option>
						<?php 
						$blockid=$get_own['complaint_block'];
						$floorid=$get_own['complaint_floor'];
						$flatid=$get_own['complaint_flat'];
						$cownername=$get_own['complaint_name'];
						while($row=mysql_fetch_array($get_blocks))
						{

						?>
<option value="<?php echo $row['block_id'];?>" <?php if($row['block_id']==$get_own['complaint_block']){ echo 'selected="selected"';}?>><?php echo $row['block_name'];?></option>
                   
                       
                      <?php } ?>
                       </select>
                    </div>
                    <div class="col-sm-3" id="floor">
                     <select  class="selectBox selectBox-dropdown"  style='padding:3.5%;'  name="floor" 
					 onChange='showflat(this.value)' >
					 <option >Select Floor</option>
                    	<?php 
                                 $bid=$get_own['complaint_block'];						
						$sqlflo=mysql_query("select *from floor where floor_block_id='$bid'");
						while($gfr=mysql_fetch_array($sqlflo))
						{
                                
						?>
<option value="<?php echo $gfr['floor_id'];?>" 
<?php 
if($gfr['floor_id']==$get_own['complaint_floor'])
{
 echo 'selected="selected"';
 } ?> >  <?php echo $gfr['floor_name'];?></option>
                   
                       
                      <?php } ?>
                       </select>
                    </div>
					   <div class="col-sm-3" id="flat" >
                     <select  class="selectBox selectBox-dropdown"   style='padding:3.5%;'  name="flat_floor" onchange="showowner(flatid") >
                    	<option >Select Flat</option>
                    	<?php 
						$fid=$get_own['complaint_floor'];
						$sqlfet=mysql_query("select *from flat where flat_floor_id='$fid'");
						while($flatfet=mysql_fetch_array($sqlfet)) {
                                
						?>
<option value="<?php echo $flatfet['flat_id'];?>" 
<?php 
if($flatfet['flat_id']==$get_own['complaint_flat'])
 {
 echo 'selected="selected"';
} ?> > <?php echo $flatfet['flat_name'];?></option>
                   
                       
                      <?php } ?>
                       </select>
                    </div>
                    <div class="col-sm-3"></div>
                 

					 <div style="color:red" class="col-sm-3">
					<?php	if(isset($code2)){echo $code2; } ?>
					</div>
					 <div style="color:red" class="col-sm-3">
					<?php	if(isset($code3)){echo $code3; } ?>
					</div>
					 
					   <div class="clearfix"></div>
				<!--	<div id="owner">
					 
					<input type="text" class="form-control" placeholder="Name"  value="<?php // echo $get_own['complaint_name'];?>" name="ownerdrop" /></div>
					</div> -->
							<div id="owner" class="col-sm-3">
			<?php		
			         
			
					$sql="SELECT * FROM owner WHERE owner_block ='$blockid' and owner_floor='$floorid' and owner_flat='$flatid'";
   $result=mysql_query($sql);
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
<option value="<?php echo $ownername; ?>" <?php 
if($ownername==$cownername)
{
echo 'selected="selected"';
 } ?> ><?php echo $ownername ;?></option>
    <?php $ownernopersons =unserialize($ownernopersons);
for($i=0;$i<count($ownernopersons);$i++)
{
?>
<option value="<?php echo $ownernopersons[$i] ; ?>"<?php 
if($ownernopersons[$i]==$cownername)
{
echo 'selected="selected"';
 } ?> > <?php echo $ownernopersons[$i] ?></option>
<?php }?>
</select> 
<?php
}}	
?>					
		</div>
	                    <div  class="col-sm-3">
						<select class="selectBox selectBox-dropdown" style='padding:3.5%;' name="priority" >
					   	<option >Select priority</option>
						<option value="High"<?php if ($get_own['complaint_priority'] == 'High') echo ' selected="selected"'; ?>>High</option>

<option value="Medium"<?php if ($get_own['complaint_priority'] == 'Medium') echo ' selected="selected"'; ?>>Medium</option>
<option value="low"<?php if ($get_own['complaint_priority'] == 'low') echo ' selected="selected"'; ?>>low</option>
					</select>
					</div>
					<div class="clearfix"></div>
                    <div style="color:red" class="col-sm-3"><?php	if(isset($code4)){echo $code4; } ?></div>
                    <div class="clearfix"></div>
                     
                    <!-- NEW PERSONS ADDED WILL BE APPENDED INTO THIS DIV -->
                    <div id="newPersons_div" class='col-sm-12' style="padding:0px; margin:0px;"></div>
<div class="col-sm-6">
<textarea placeholder="Type Complainant " value=""
 class="form-control"  value="" rows="8" name="carea"><?php echo $get_own['complaint_complaint'];?></textarea>
                                                    
                  </div> 


				   
                                                         
              
                  <!-- 	<a href="#"  class="input_outer"> <span class="fa fa-plus"></span> </a>-->
                   <div class="clearfix"></div>
                  
                    
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
                    
                    <div class="col-sm-3">
					<button type="reset" class="btn">Cancel</button>
                    <input type="submit" class="btn btn-danger" name="editcomplaint" value="Update" >
                    </div>
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
					
				</form>
				</div>
				</div>
                 <div class="clearfix"></div>
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
$.post("get_owner.php",{flatid:flatid,blockid:blockid,floorid:floorid},function(data) {  //location.reload();
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
