<?php 
include_once('dbFunction.php');
$obj = new dbFunction();
$get_blocks=$obj->getblock_details();
$get_faci123=$obj->get_fac_d();
$get_facelity=$obj->facelity();
$code1="";$code2="";$code3="";$code4="";$code5="";$code6="";$code7="";$code8="";
if(isset($_POST['issues']))
{
$block=$_POST['block'];
$floor=$_POST['floor'];
$flat=$_POST['flat_floor'];
$mumbername1=$_POST['ownerdrop'];
//$complaint=$_POST['complaint'];
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
$code5="Select Start Date";
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
	$mumber=explode(",",$mumbername1);

echo $ownername=$mumber[0];
echo $ownerid=$mumber[1];
	//$ownerid=$mumber[1];
$fac=$obj->create_faci_booking($block,$floor,$flat,$ownername,$priority,$facility,$seldate,$starttime,$endtime,$carea,$enddate,$ownerid);
if($fac==1)
{

 header("location:facility_booking.php?faci=123");
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
<header class="navbar">
	<?php include("header.php"); ?>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<?php include("leftmenu.php"); ?>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
		<a href="#" class="add_page_button">Facility Booking <span class="fa fa-plus"></span> </a>
<!--        <a href="#" class="extra_page_button">owner reference code: <span>PJX 00215</span></a>-->
        <div class="clearfix"></div>
		<span style="color:red">
		<?php 
		if($_REQUEST['faci']=="123")
		{
		echo "Facility Booking Successfully";
		}
		?>
		</span>
		       <div class="box-content box">
			
				<form id="" method="post" action="" class="form-horizontal" enctype="multipart/form-data">
			
			<!-- <div class="col-sm-3 has-feedback">
                     	<div id="datetimepicker2" class="input-append">
						    <input data-format="hh:mm:ss" type="text" class="form-control" placeholder="Select Start Time"></input>
						    <span class="add-on">
						      <i class="form-control-feedback fa fa-clock-o" style="margin-top: 6px; font-size:20px; cursor:pointer"></i>
						      </i>
						    </span>
						</div>
                    </div> -->
			
			
			
			
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
					 <select class="selectBox selectBox-dropdown" style='padding:3.5%;' name="block" id="block123" onChange="showFloor(this.value)">
					   	<option value="">Select Block</option>
						
						<?php while($row=mysql_fetch_array($get_blocks)) { ?>
                       <option value=<?php echo $row['block_id']?>><?php echo $row['block_name']?></option>
                      <?php } ?>
                       </select>
					</div>
                  
					  <div class="col-sm-3" id="floor">
			                    </div>
				
			
					 <div class="col-sm-3" id="flat">
					     </div>
					
					<div class="clearfix"></div>
<div style="color:red" class="col-sm-3"><?php if(isset($code2)){echo $code2; } ?></div>

<div style="color:red" class="col-sm-3"><?php if(isset($code4)){echo $code4; } ?></div>
<div style="color:red" class="col-sm-3"><?php if(isset($code3)){echo $code3; } ?></div>
					<div class="clearfix"></div>
                     
					<div id="owner" class="col-sm-3"><select class="selectBox selectBox-dropdown" style="padding:3.5%;" name="ownerdrop" id="owner123" >
					<option value="">select Owner </option></select></div>
					
				 <div   class="col-sm-3">
			 <select class="selectBox selectBox-dropdown" style='padding:3.5%;' name="facility" id="">
					   	<option value="">Select Facility</option>
						
						<?php while($dd=mysql_fetch_array($get_faci123)) { ?>
                       <option value=<?php echo $dd['facility_id']?>><?php echo $dd['facility_name']?></option>
                      <?php } ?>
                       </select>
					
					
					
					</div>
                  <!--  <div   class="col-sm-3">
				 <select class="selectBox selectBox-dropdown" style='padding:3.5%;' name="complaint" >
					   	<option value="">Select complaint types</option>
						<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					</select>
					</div> -->
                    <div  class="col-sm-3"><select class="selectBox selectBox-dropdown" style='padding:3.5%;' name="priority" >
					   	<option value="">Select priority</option>
						<option value="High">High</option>
					<option value="Low">low</option>
					<option value="Emergency">Emergency</option>
					</select>
					</div>
					<div class="clearfix"></div>
		 <div style="color:red" class="col-sm-3"><?php if(isset($code5)){echo $code5; } ?></div>
		 <div style="color:red" class="col-sm-3"><?php if(isset($code6)){echo $code6; } ?></div>
		          <div class="clearfix"></div>
               <div class="col-sm-3">
			   <input type="text" class="datepicker form-control search_by_date" data-date-format="yyyy-mm-dd"
			   placeholder="start date" value="" name="startdate"  style="  background-position: 226px 9px;"/>
					</div>
				<div class="col-sm-3">
				<input type="text" class="datepicker form-control search_by_date" data-date-format="yyyy-mm-dd" 
				placeholder="End date" name="enddate" value="" style="  background-position: 226px 9px;"/>
					</div>
<div class="clearfix"></div>
		 <div style="color:red" class="col-sm-3"><?php if(isset($code7)){echo $code7; } ?></div>
		 <div style="color:red" class="col-sm-3"><?php if(isset($code8)){echo $code8; } ?></div>					
					<div class="clearfix"></div>
			          <div  class="col-sm-3">
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
		echo "<option value='".$hours.':'.$minutes.' '.$ampm."'>".$hours.':'.$minutes.' '.$ampm."</option>";

    }
 ?>
 </select>
				
			</div>
                    <div  class="col-sm-3">
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
		echo "<option value='".$hours.':'.$minutes.' '.$ampm."'>".$hours.':'.$minutes.' '.$ampm."</option>";

    }
 ?>
 </select>
				
					</div>
                    <div class="col-sm-3"></div>
                    <div class="clearfix"></div>
                    
                    <!-- NEW PERSONS ADDED WILL BE APPENDED INTO THIS DIV -->
                    <div id="newPersons_div" class='col-sm-12' style="padding:0px; margin:0px;"></div>
<div class="col-sm-6">
<textarea placeholder="Type Complainant "
 class="form-control"  value="" rows="8" name="carea"></textarea>
                                                    
                  </div>  
									
					<div class="col-sm-9"></div>
                    <div class="clearfix"></div>
                    
                    <div class="col-sm-offset-5 col-sm-2 text-center">
			
                    <input type="submit" class="btn btn-danger" name="issues" value="Save" >
                    </div>
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
					
				</form>
                 <div class="clearfix"></div>
	
         <div class="clearfix"></div>
     			<div class="delresult"> </div>
						<div id="sessiondata"> </div>
						<div id="sessiondata1"> </div>
                <table class="table_st_1">
                	<tr>
					    <th>Block</th>
                    	<th>FLOOR</th>
						<th>FLAT</th>
                         <th>NAME</th>
						 <th>Facility Type</th>
                        <th>Facility priority</th>         <th>Comments</th>  
						 <th>Booking Start date</th>
						<th>Booking End date</th>
<th> Booking Start time</th>						
					   <th> Booking end time</th>						
           
					   <th> ACTION </th>	
					</tr>
					<?php
							
					while($fet_rep=mysql_fetch_array($get_facelity))
					{ 
					if(count($fet_rep)!=0)
								{
                     $blockid=$fet_rep['facility_booking_block'];					
					  $qry=mysql_query("select * from block where block_id=".$blockid);
						$com_blkname=mysql_fetch_array($qry);
						$block_name=$com_blkname['block_name'];
	                 $floorid=$fet_rep['facility_booking_floor'];
						$qry1=mysql_query("select * from floor where floor_id=".$floorid);
						$fet_floname=mysql_fetch_array($qry1);
						$floor_name=$fet_floname['floor_name'];
						$flatid=$fet_rep['facility_booking_flat'];
						$qry2=mysql_query("select * from flat where flat_id=".$flatid);
						$fet_flatname=mysql_fetch_array($qry2);
						$flat_name=$fet_flatname['flat_name'];
					?>
                    <tr>
                    	<td><?php echo $block_name; ?></td>
                        <td><?php echo $floor_name; ?></td>
                        <td><?php echo $flat_name; ?></td>
						<td><?php echo $fet_rep['facility_booking_names']; ?></td>
						<td><?php echo $fet_rep['facility_id']; ?></td>
						<td><?php echo $fet_rep['facility_booking_priority']; ?></td>
						<td><?php echo $fet_rep['facility_booking_comments']; ?></td>
						<td>
                      <?php  
					  echo $date1 = $fet_rep['facility_booking_date']; 
                          //    echo date(' m/d/Y', strtotime($date));
 							  ?>
                        </td>
<td>
                      <?php  
					  echo $date2 = $fet_rep['facility_enddate']; 
                             // echo date('m/d/Y', strtotime($date));
 							  ?>
                        </td> 	
						<td>
                      <?php  
					 echo $date1 = $fet_rep['facility_booking_starttime']; 
                            //  echo date('h:i:s', strtotime($date));
 							  ?>
                        </td> 
						<td>
                      <?php  
					 echo   $date2 = $fet_rep['facility_booking_endtime']; 
                             // echo date('h:i:s ', strtotime($date));
 							  ?>
                        </td> 
											
<td>
		<a href="javascript:" class="owner" onClick="editButton('<?php echo $fet_rep['facility_booking_id']; ?>')">
<!--<i class="fa fa-edit"></i> -->Edit</a>
						<i class="fa fa-times"  onclick="fundel('<?php echo $fet_rep['facility_booking_id'];?>'); "></i></td>						</tr><?php
       					                	} 
								}
											?>
                  
                     
                </table>
         
        		</div>
			
		</div>
		<!--End Content-->
	</div>
</div>
<!--End Container-->



<script>
function showowner(flatid) {  
//alert(flatid);
var blockid=$('#block123').val();
var floorid=$('#floor123').val();
//alert(floorid);
//alert(blockid);
$.post("get_owner4.php",{flatid:flatid,blockid:blockid,floorid:floorid},function(data) {  //location.reload();
 //$( ".result" ).html('MY ID is - '+data );
  $("#owner").html(data);

 });

}
</script>
<script>
function editButton(fid)
{
 //alert(fid);
$('#sessiondata').load('facilty_id.php?fid='+fid);
window.location.replace('facilty_edit.php');

}

</script>

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
<script>
function fundel(delid)
{
//alert(delid);
$.post("delete_facilitybooking.php",{fac_id:delid},function(data) { location.reload();
//$(".delresult").html(data);
});

}
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
