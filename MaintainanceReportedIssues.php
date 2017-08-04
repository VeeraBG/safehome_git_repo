<?php

include_once('dbFunction.php');
 $obj = new dbFunction();
$get_blocks=$obj->getblock_details();
$get_rep=$obj->get_complaints();
 //$fet_rep=mysql_fetch_array($get_rep);
$code1="";$code2="";$code3="";$code4="";
if(isset($_POST['issues']))
{
//echo "<script>alert('gdfgkldfkghjdfkghfgkh');</script>";
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
$data=$obj->create_complaint($block,$floor,$flat,$name,$priority,$carea);

if($data==1)
{
// echo "<script> alert('Owner Created Successfully');</script>";
 header("location:MaintainanceReportedIssues.php?oadd=success");
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
		<a href="#" class="add_page_button">Ticket Mangement <span class="fa fa-plus"></span> </a>
     <div class="clearfix"></div>
		       <div class="box-content box">
		<div class="row" >
		 <div class="col-sm-3" >
		 <span style="color:red">
		<?php 
		if($_REQUEST['oadd']=="success")
		{
		echo "Complaint  Created Successfully";
		}
		?>
		 </div></div>
				<form id="" method="post" action="" class="form-horizontal" enctype="multipart/form-data">
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
                
                    <div class="col-sm-3"></div>
                    <div class="clearfix"></div>
					 <div class="col-sm-3">
                    <span style="color:red">
					 <?php
					 if(isset($code2))
					 { 
					 echo $code2;
					 } 
					 ?>
					 </span></div>
					  <div class="col-sm-3">
                    <span style="color:red">
					 <?php
					 if(isset($code3))
					 { 
					 echo $code3;
					 } 
					 ?>
					 </span></div>
					 <div class="clearfix"></div>
                    <div style="color:red" class="col-sm-3">
				
					<div id="owner"><select class="selectBox selectBox-dropdown" style="padding:3.5%;" name="ownerdrop" id="owner123" >
<option value="">select owner</option></select></div>
					</div>
                          <div  class="col-sm-3"><select class="selectBox selectBox-dropdown" style='padding:3.5%;' name="priority" >
					   	<option value="">Select priority</option>
						<option value="High" >High</option>
				
					<option value="Medium">Medium</option>
						<option value="low" >low</option>
					</select>
					</div>
                    <div class="col-sm-3"></div>
                    <div class="clearfix"></div>
                     
                    <!-- NEW PERSONS ADDED WILL BE APPENDED INTO THIS DIV -->
                    <div id="newPersons_div" class='col-sm-12' style="padding:0px; margin:0px;"> 
                    <span style="color:red">
					 <?php
					 if(isset($code4))
					 { 
					 echo $code4;
					 } 
					 ?>
					 </span></div>
<div class="col-sm-6">
<textarea placeholder="Type Complainant "
 class="form-control"  value="" rows="8" name="carea"></textarea>
                                                    
                  </div> 
								
					<div class="col-sm-9"></div>
                    <div class="clearfix"></div>
                       
							 <br>
							 <br>
							 <div class="col-sm-offset-3 col-sm-6 text-center">
							 <div class="col-sm-4" style="    margin-left: 63px;">
					<button type="reset" class="btn">Cancel</button>
					</div>
							 <div class="col-sm-3">
                    <input type="submit" class="btn btn-danger" name="issues" value="Save" >
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
                    	<th>Floor</td>
						<th>Flat</th>
                         <th>Name</th>
                        <th>Complaint Priority</th>                  
                        <th>Complaint </th>
                       <th>Complaint Status </th>						
					   <th>Complaint Sending Time </th>
					   <th> Action </th>	
					</tr>
					<?php
			
					
					while($fet_rep=mysql_fetch_array($get_rep))
					{ 
                     $blockid=$fet_rep['complaint_block'];					
					  $qry=mysql_query("select * from block where block_id=".$blockid);
						$com_blkname=mysql_fetch_array($qry);
						$block_name=$com_blkname['block_name'];
	                 $floorid=$fet_rep['complaint_floor'];
						$qry1=mysql_query("select * from floor where floor_id=".$floorid);
						$fet_floname=mysql_fetch_array($qry1);
						$floor_name=$fet_floname['floor_name'];
						$flatid=$fet_rep['complaint_flat'];
						$qry2=mysql_query("select * from flat where flat_id=".$flatid);
						$fet_flatname=mysql_fetch_array($qry2);
						$flat_name=$fet_flatname['flat_name'];
					?>
                    <tr>
                    	<td><?php echo $block_name; ?></td>
                        <td><?php echo $floor_name; ?></td>
                        <td><?php echo $flat_name; ?></td>
						<td><?php echo $fet_rep['complaint_name']; ?></td>
						<td><?php echo $fet_rep['complaint_priority']; ?></td>
						<td><?php echo $fet_rep['complaint_complaint']; ?></td>
						<td><span class="greenT"><?php echo $fet_rep['complaint_status']; ?></span></td>
                                              <td>
                      <?php  
					  $date = $fet_rep['complaint_date']; 
                              echo date('h:i:s a m/d/Y', strtotime($date));
 							  ?>
                        </td> 
<td>
		<a href="javascript:" class="owner" onClick="editButton('<?php echo $fet_rep['complaint_id']; ?>')">
<!--<i class="fa fa-edit"></i> -->Edit</a>
						<i class="fa fa-times"  onclick="fundel('<?php echo $fet_rep['complaint_id'];?>'); "></i></td>						</tr><?php
       					                	} 
											?>
                  
                     
                </table>
         
		</div>		<!--End Content-->
	<div id="sessiondata"></div>
		<div id="delresult"></div>
	</div>
	
</div>
<!--End Container-->

<script type="text/javascript">
$(document).ready(function() {

	$('#input_date').datepicker({setDate: new Date()});

});
</script>
<script>
function showowner(flatid) {  
//alert(flatid);
var blockid=$('#block123').val();
var floorid=$('#floor123').val();
//alert(floorid);
//alert(blockid);
$.post("get_owner1.php",{flatid:flatid,blockid:blockid,floorid:floorid},function(data) {  //location.reload();
 //$( ".result" ).html('MY ID is - '+data );
  $("#owner").html(data);

 });

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
<script type="text/javascript">
	$(document).ready(function(){
        $('select').selectBox({ mobile: true });
	});
	
	function addPerson(){
		var counter = parseInt($("#counter_txt").val());
		var newPerson = $("<div id='newdiv"+counter+"' class=\"col-sm-12\" style=\"padding:0px; margin:0px;\"><div class=\"col-sm-3\"><input type=\"text\" class=\"form-control\" placeholder=\"Person name\" name=\"person1[]\" id='person1"+counter+"' /></div><div class=\"col-sm-3\"><input type=\"text\" class=\"form-control\" placeholder=\"Mobile No.\" name=\"addpersonsmbno[]\" id='mobile1"+counter+"' /></div><div class=\"col-sm-3\"><input type=\"text\" class=\"form-control\" placeholder=\"Age\" name=\"age[]\" id='age1"+counter+"' /></div><div class=\"col-sm-3\"><div class=\"cross\"><span class=\"fa fa-times\" onclick=\"return delPerson("+counter+");\"></div></span></div><div class=\"clearfix\"></div></div>");
		$("#newPersons_div").append(newPerson);
		$("#counter_txt").val(counter+1);
	}

	function delPerson(counter){
		$('#newdiv'+counter).remove();
	}
</script>
<script>
function editButton(cid)
{
 //alert(cid);
$('#sessiondata').load('com_id.php?cid='+cid);
window.location.replace('complaint_edit.php');

}

</script>
<script>
function fundel(delid)
{
//alert(delid);
$.post("delete_issues.php",{issue_id:delid},function(data) { location.reload();
//$(".delresult").html(data);
});

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

<script type="text/javascript">
		  // $(document).ready(function(){
            // $('select').selectBox({ mobile: true });
		// });
		
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
