<?php
$page="society";
include_once('dbFunction.php');
$obj = new dbFunction();
$get_society=$obj->getsociety_details();
$get_blocks=$obj->getblock_details();
// $get_floors=$obj->get_floor_details();
// $get_flats=$obj->get_flat_details();
$code1="";$code2="";$code3="";$code4="";$code5="";$code6="";$code7="";
if(isset($_POST['society']))
{

$mumbertype=$_POST['societymumber'];
$block=$_POST['block'];
$floor=$_POST['floor'];
$flat=$_POST['flat_floor'];
$mumbername1=$_POST['ownerdrop'];

$mumber=explode(",",$mumbername1);

$mumbername=$mumber[0];
$mumberid=$mumber[1];
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
//echo $mumbername;
//echo $mumberid;

//$reason=$_POST['reason1'];

//$data=$obj->create_society($mumbertype,$block,$floor,$flat,$mumbername);
$data=$obj->create_society($mumbertype,$mumbername,$mumberid);

if($data==1)
{
//echo "<script> alert(' alert($reason)');</script>";
header("location:add_society_members.php");
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
	<?php include("header.php")?>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<?php include("leftmenu.php"); ?>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
		<a href="#" class="add_page_button">Add Society Mumbers<span class="fa fa-plus"></span> </a>
        <div class="clearfix"></div>
		<span style="color:red">
		<?php 
		if($_REQUEST['add']=="success")
		{
		echo "society mumbers Added Successfully";
		}
		?>
		</span>
		
        <div class="box-content box"> 
				<form id="defaultForm" method="post" action="" class="form-horizontal" enctype="multipart/form-data">
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
                    <select class="selectBox-dropdown" style="padding:3%;" name="block" id="block123"  onChange="javascript:showFloor(this.value)">
					   	<option value="">Select Block</option>
						
						<?php while($row=mysql_fetch_array($get_blocks)) { ?>
                       <option value=<?php echo $row['block_id']?>><?php echo $row['block_name']?></option>
                      <?php } ?>
                       </select>
						
                     </div>
                    <div class="col-sm-3"  id="floor">
					
        </div>
					
                    <div class="col-sm-3" id="flat">
					
					
                    </div>
                    <div class="col-sm-3"></div>
                    <div class="clearfix"></div>
                    <div class="col-sm-9">
                   <div  style="color:red" class="col-sm-3"> <?php
					 if(isset($code2))
					 { 
					 echo $code2;
					 } 
					 ?></div>
<div  style="color:red" class="col-sm-3"> <?php
					 if(isset($code3))
					 { 
					 echo $code3;
					 } 
					 ?></div></div>


				   <div class="clearfix"></div>
                    <div class="col-sm-9">
               
					<div id="owner" style="color:red" class="col-sm-3">
					<select class="selectBox selectBox-dropdown" style="padding:3.5%;" name="ownerdrop" id="owner123" >
					<option value="">select Owner details</option></select></div>
                   
                                 <div class="col-sm-3">             
                   
                        <select class="selectBox selectBox-dropdown" style="padding:3.5%;" name="societymumber" >
					   	<option value="">Select Society Member</option>
							<option value="President">President </option>
								<option value="Secretary">Secretary </option>
									<option value="Treasurer">Treasurer </option>
					
                       </select>
					   </div> </div>  
            
                    <div class="clearfix"></div>   
							 <br>
							 <br>
							 <div class="col-sm-offset-3 col-sm-5 text-center">
							 <div class="col-sm-4" style="    margin-left: 63px;">
					<input type="reset" value="Cancel" class="btn"/>
					</div>
							 <div class="col-sm-3">
                    <input type="submit" name="society" class="btn btn-danger" value="Save"/>
                    </div>
                    </div>
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
				</form>
                 <div class="clearfix"></div>
			</div>
      	<table class="table_st_1">
                	<tr>
					    <th>Block</th>
                    	<th>FLOOR</th>
						<th>FLAT</th>
                         <th>Society Member Designation</th>
						 <th>Society Member Name</th>
                          <th> Date</th>
					      <th> ACTION </th>	
					</tr>
					<?php
								
					while($fet_rep=mysql_fetch_array($get_society))
					{ 
					$owner_id=$fet_rep['society_member_id'];
					$qry786=mysql_query("select * from owner where owner_id=".$owner_id);
					$fet_owner=mysql_fetch_array($qry786);
					$blockid=$fet_owner['owner_block'];
					$floorid=$fet_owner['owner_floor'];
					$flatid=$fet_owner['owner_flat'];
				  $qry=mysql_query("select * from block where block_id=".$blockid);
						$com_blkname=mysql_fetch_array($qry);
						$block_name=$com_blkname['block_name'];
	                 $qry1=mysql_query("select * from floor where floor_id=".$floorid);
						$fet_floname=mysql_fetch_array($qry1);
						$floor_name=$fet_floname['floor_name'];
						$qry2=mysql_query("select * from flat where flat_id=".$flatid);
						$fet_flatname=mysql_fetch_array($qry2);
						$flat_name=$fet_flatname['flat_name'];
					?>
                    <tr>
                    	<td><?php echo $block_name; ?></td>
                        <td><?php echo $floor_name; ?></td>
                        <td><?php echo $flat_name; ?></td>
						<td><?php echo $fet_rep['society_member_type']; ?></td>
						<td><?php echo $fet_rep['society_member_name']; ?></td>
											<td>
                      <?php  
					  $date = $fet_rep['society_date']; 
                              echo date('h:i:s a m/d/Y', strtotime($date));
 							  ?>
                        </td> 
<td>
		<a href="javascript:" class="owner" onClick="editButton('<?php echo $fet_rep['society_id']; ?>')">
<!--<i class="fa fa-edit"></i> -->Edit</a>&nbsp;&nbsp;&nbsp;

						<i class="fa fa-times"  onclick="fundel('<?php echo $fet_rep['society_id'];?>'); "></i></td>						</tr><?php
       					                	} 
											?>
                  
                     
                </table>
		
		
		
		
		<div id ="sessiondata"></div>
		
		
		</div>
		<!--End Content-->
	</div>
</div>
<!--End Container-->

<script type="text/javascript">
$(document).ready(function() {

	$('#input_date').datepicker({setDate: new Date()});

});
</script>
<script type="text/javascript">
	$(document).ready(function(){
        $('select').selectBox({ mobile: true });
	});
	
	function addPerson(){
		var counter = parseInt($("#counter_txt").val());
		var newPerson = $("<div id='newdiv"+counter+"' class=\"col-sm-12\" style=\"padding:0px; margin:0px;\"><div class=\"col-sm-3\"><input type=\"text\" class=\"form-control\" placeholder=\"Visitor Name\" name=\"name[]\" id='person1"+counter+"' /></div><div class=\"col-sm-3\"><input type=\"text\" class=\"form-control\" placeholder=\"visitor lastname.\" name=\"lname[]\" id='lname1"+counter+"' /></div><div class=\"col-sm-3\"><input type=\"text\" class=\"form-control\" placeholder=\"Mobile No\" name=\"mbno[]\" id='age1"+counter+"' /></div><div class=\"col-sm-3\"><div class=\"cross\"><span class=\"fa fa-times\" onclick=\"return delPerson("+counter+");\"></div></span></div><div class=\"clearfix\"></div></div>");
		$("#newPersons_div").append(newPerson);
		$("#counter_txt").val(counter+1);
	}

	function delPerson(counter){
		$('#newdiv'+counter).remove();
	}
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
<script>
function editButton(soid)
{
// alert(soid);
$('#sessiondata').load('society_id.php?soid='+soid);
window.location.replace('society_edit.php');

}

</script>

<script>
function fundel(delid)
{
//alert(delid);
$.post("delete_society.php",{soc_id:delid},function(data) { location.reload();
//$(".delresult").html(data);
});

}
</script>
<?php include("footer.php"); ?>





<script src="js/footer_js.js"></script>
</body>
</html>
