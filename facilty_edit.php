<?php 
include_once('dbFunction.php');
 $obj = new dbFunction();
 if($_SESSION['faclityid'] !="")
 {
 $faid=$_SESSION['faclityid'];
}
$code1="";$code2="";$code3="";$code4="";$code5="";$code6="";$code7="";$code8="";
//$owner_id=$_SESSION['editpersonid'];
$get_facilty=$obj->get_fdetails($faid);
$get_blocks=$obj->getblock_details();
if(isset($_POST['editfacilty']))
{
$facid=$_POST['facid'];
$block=$_POST['block'];
$floor=$_POST['floor'];
$flat=$_POST['flat_floor'];
$mumbername1=$_POST['ownerdrop'];

$mumber=explode(",",$mumbername1);

$ownername=$mumber[0];
$ownerid=$mumber[1];
$priority=$_POST['priority'];
$facility=$_POST['facility'];
$seldate=$_POST['startdate'];
$enddate=$_POST['enddate'];
$starttime=$_POST['starttime'];
$endtime=$_POST['endtime'];
$carea=$_POST['carea'];
if( $carea=="" || $block=="" || $floor=="" || $flat=="" || $mumbername1=="" || $priority=="" || $facility=="" ||
 $seldate=="" || $enddate=="" || $starttime=="" || $endtime=="" )
{
if($block=="" || $floor=="" || $flat=="")
{
$code1="Enter Block,Floor and Flat";
}
if($ownername=="")
{
$code2="Select owner Name";
}
if($priority=="")
{
$code3="Select Priority";
} 
if($facility=="")
{
$code4="Select Facility";
} 
if($seldate=="")
{
$code5="Select Date";
} 
if($enddate=="")
{
$code6="Select End date ";
}  
if($starttime=="")
{
$code7="Select Start time";
}
if($endtime=="")
{
$code8="Select End time";
}

}
else
{
$fac=$obj->facilty_edit($block,$floor,$flat,$ownername,$priority,$facility,$seldate,$starttime,$endtime,$carea,$facid,$enddate,$ownerid);
if($fac==1)
{
//echo "<script> alert('Owner Created Successfully');</script>";
 header("location:facility_booking.php");
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
		<a href="#" class="add_page_button">Edit Facility<span class="fa fa-plus"></span> </a>
       
        <div class="clearfix"></div>
		

        <div class="box-content box">
		<?php 
		
		$get_own=mysql_fetch_array($get_facilty);
		
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
					 </span></div>
						<div class="clearfix"></div>			
					<div class="col-sm-3">
					<script>
					var blockid=<?php echo $get_own['facility_booking_block']?>;
					var floor=<?php echo $get_own['facility_booking_floor']?>;
								var flat=<?php echo $get_own['facility_booking_flat']?>;
				//alert(flat);
					showflat1(blockid,floor,flat);
 showFloor1(blockid,floor);	
		
		
			</script>

                    <select class="selectBox selectBox-dropdown"  id="block123" style='padding:3.5%;'  name="block" 
					onChange="showFloor(this.value)">
                    	<option value="" >Select Block</option>
						<?php 
						
						while($row=mysql_fetch_array($get_blocks))
						{

						?>
<option value="<?php echo $row['block_id'];?>" <?php if($row['block_id']==$get_own['facility_booking_block']){ echo 'selected="selected"';}?>><?php echo $row['block_name'];?></option>
                   
                       
                      <?php } ?>
                       </select>
                    </div>
                    <div class="col-sm-3" id="floor">
                     <select  class="selectBox selectBox-dropdown"  style='padding:3.5%;'  name="floor" 
					 onChange='showflat(this.value)' >
					 <option >Select Floor</option>
                    	<?php 
                                 $bid=$get_own['facility_booking_block'];						
						$sqlflo=mysql_query("select *from floor where floor_block_id='$bid'");
						while($gfr=mysql_fetch_array($sqlflo))
						{
                                
						?>
<option value="<?php echo $gfr['floor_id'];?>" 
<?php 
if($gfr['floor_id']==$get_own['facility_booking_floor'])
{
 echo 'selected="selected"';
 } ?> >  <?php echo $gfr['floor_name'];?></option>
                   
                       
                      <?php } ?>
                       </select>
                    </div>
					   <div class="col-sm-3" id="flat" >
                     <select  class="selectBox selectBox-dropdown"   style='padding:3.5%;'  name="flat" onchange="showowner(flatid") >
                    	<option >Select Flat</option>
                    	<?php 
						$fid=$get_own['facility_booking_floor'];
						$sqlfet=mysql_query("select *from flat where flat_floor_id='$fid'");
						while($flatfet=mysql_fetch_array($sqlfet)) {
                                
						?>
<option value="<?php echo $flatfet['flat_id'];?>" 
<?php 
if($flatfet['flat_id']==$get_own['facility_booking_flat'])
 {
 echo 'selected="selected"';
} ?> > <?php echo $flatfet['flat_name'];?></option>
                   
                       
                      <?php } ?>
                       </select>
                    </div>
                  	<div class="clearfix"></div>
<div style="color:red" class="col-sm-3"><?php if(isset($code2)){echo $code2; } ?></div>
<div style="color:red" class="col-sm-3"><?php if(isset($code4)){echo $code4; } ?></div>
<div style="color:red" class="col-sm-3"><?php if(isset($code3)){echo $code3; } ?></div>
					<div class="clearfix"></div>
                    <div class="clearfix"></div>
					<input type="hidden" value="<?php echo $get_own['facility_booking_id'];?>" name="facid" />
					<div  class="col-sm-3">
		
		<?php	
		$fownerid=$get_own['facility_booking_owner_id'];
		$fownername=$get_own['facility_booking_names'];
		$sql="SELECT * FROM owner WHERE owner_id ='$fownerid' ";
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
<option value="<?php echo $ownername.",".$ownerid ; ?>" <?php 
if($ownername==$fownername)
{
echo 'selected="selected"';
 } ?> ><?php echo $ownername ;?></option>
    <?php $ownernopersons =unserialize($ownernopersons);
for($i=0;$i<count($ownernopersons);$i++)
{
?>
<option value="<?php echo $ownernopersons[$i].",".$ownerid ; ?>"<?php 
if($ownernopersons[$i]==$fownername)
{
echo 'selected="selected"';
 } ?> > <?php echo $ownernopersons[$i] ?></option>
<?php }?>
</select> 
<?php
}}	
?>					
</select> 
					<!--<input type="text" class="form-control" placeholder="Ower Name" 
					value="<?php //echo $get_own['facility_booking_names'];?>" name="ownerdrop" />-->
					</div>
	             <div   class="col-sm-3">
				 <select class="selectBox selectBox-dropdown" style='padding:3.5%;' name="facility" >
					   	<option value="">Select Faclity</option>
				
						<?php 
						//$facid=$get_own['facility_id'];
						$sqlfet2=mysql_query("select * from facility ");
						while($flacfet=mysql_fetch_array($sqlfet2)) {
                                
						?>
<option value="<?php echo $flacfet['facility_id'];?>" 
<?php 
if($flacfet['facility_id']==$get_own['facility_id'])
 {
 echo 'selected="selected"';
} ?> > <?php echo $flacfet['facility_name'];?></option>
                   
                       
                      <?php } ?>
					  </select>
					</div>
                    <div  class="col-sm-3"><select class="selectBox selectBox-dropdown" style='padding:3.5%;' name="priority" >
					   	<option >Select priority</option>
						<option value="High"<?php if ($get_own['facility_booking_priority'] == 'High') echo ' selected="selected"'; ?>>High</option>
						<option value="low"<?php if ($get_own['facility_booking_priority'] == 'low') echo ' selected="selected"'; ?>>low</option>
						<option value="Emergency"<?php if ($get_own['facility_booking_priority'] == 'Emergency') echo ' selected="selected"'; ?>>Emergency</option>
						</select>
					</div>
					<div class="clearfix"></div>
                 <div style="color:red" class="col-sm-3"><?php if(isset($code5)){echo $code5; } ?></div>
		 <div style="color:red" class="col-sm-3"><?php if(isset($code6)){echo $code6; } ?></div>
		        <div class="clearfix"></div>
				  <div style="color:red" class="col-sm-3">
			   <input type="text" class="datepicker form-control search_by_date" data-date-format="yyyy-mm-dd"
			   placeholder="start date" value="<?php echo $get_own['facility_booking_date'];?>"
			   name="startdate"  style="  background-position: 226px 9px;"/>
					</div>
				<div style="color:red" class="col-sm-3">
				<input type="text" class="datepicker form-control search_by_date" data-date-format="yyyy-mm-dd" 
				placeholder="End date" name="enddate" value="<?php echo $get_own['facility_enddate'];?>" style="  background-position: 226px 9px;"/>
					</div>
				
			
					<div class="clearfix"></div>
		 <div style="color:red" class="col-sm-3"><?php if(isset($code7)){echo $code7; } ?></div>
		 <div style="color:red" class="col-sm-3"><?php if(isset($code8)){echo $code8; } ?></div>					
					<div class="clearfix"></div>
                    <div  style="color:red" class="col-sm-3">
<select class="selectBox selectBox-dropdown"  style="padding:3.5%;" name="starttime">
  <option value="">Start Time</option>
				 <?php
 
   for($i =0;$i<1440; $i += 30){
      $hours = $i/60;
      $minutes = $i % 60;
        if ($minutes < 10){
            $minutes = '0'.$minutes; // adding leading zero
        }
        $ampm = $hours % 24 < 12 ? 'AM' : 'PM';
        $hours = $hours % 12;
        if ($hours === 0){
            $hours = 12;
        }
		$time123=$hours.':'.$minutes.' '.$ampm;
		echo "<option value='".$hours.':'.$minutes.' '.$ampm."'";
		if($get_own['facility_booking_starttime']==$time123)
		{
			echo "selected='selected'";
		}
		echo ">".$hours.':'.$minutes.' '.$ampm."</option>";

    }
 ?>
			</select>		
			</div>
                    <div  style="color:red" class="col-sm-3">
				
	 <select class="selectBox selectBox-dropdown"  style="padding:3.5%;" name="endtime">
 <option value="">End Time</option>
				 <?php
 
   for($i =0;$i<1440; $i += 30){
      $hours = $i/60;
      $minutes = $i % 60;
        if ($minutes < 10){
            $minutes = '0'.$minutes; // adding leading zero
        }
        $ampm = $hours % 24 < 12 ? 'AM' : 'PM';
        $hours = $hours % 12;
        if ($hours === 0){
            $hours = 12;
        }
		$time123=$hours.':'.$minutes.' '.$ampm;
		echo "<option value='".$hours.':'.$minutes.' '.$ampm."'";
		if($get_own['facility_booking_endtime']==$time123)
		{
			echo "selected='selected'";
		}
		echo ">".$hours.':'.$minutes.' '.$ampm."</option>";

    }
 ?>
			</select>	
					</div>
                     
                    <!-- NEW PERSONS ADDED WILL BE APPENDED INTO THIS DIV -->
                    <div id="newPersons_div" class='col-sm-12' style="padding:0px; margin:0px;"></div>
<div class="col-sm-6">
<textarea placeholder="Type Complainant "
 class="form-control"  value="" rows="8" name="carea"><?php echo $get_own['facility_booking_comments'];?></textarea>
                                                    
                  </div>  


				   
                                                         
              
                  <!-- 	<a href="#"  class="input_outer"> <span class="fa fa-plus"></span> </a>-->
                   <div class="clearfix"></div>
                  
                    
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
                    
                    <div class="col-sm-3">
					<button type="reset" class="btn">Cancel</button>
                    <input type="submit" class="btn btn-danger" name="editfacilty" value="Update" >
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
 		<link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.css">
<script src="plugins/jquery/jquery-2.1.0.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<script src='js/jquery-1.11.2.min.js'></script>
<script type="text/javascript" src="js/jquery.selectBox.js"></script>
<link type="text/css" rel="stylesheet" href="css/jquery.selectBox.css"/>
   <script>
                $(function() {
                    $('#basicExample').timepicker();
                });
            </script>

<script src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
 $.fn.datepicker.defaults.format = "yyyy-mm-dd";
$('.datepicker').datepicker({    
    orientation: "top auto",
    autoclose: true
});
        $('#sandbox-container .input-daterange').datepicker({
        orientation: "top auto"
    });
</script>
<script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
              //  populate('#timeSelect');  
                $('.input-daterange').datepicker({
                    orientation: "top auto"
                });
            
            });
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
