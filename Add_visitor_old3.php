<?php
$page="visitor";
include_once('dbFunction.php');
$obj = new dbFunction();
$get_blocks=$obj->getblock_details();
// $get_floors=$obj->get_floor_details();
// $get_flats=$obj->get_flat_details();
$code1="";$code2="";$code3="";$code4="";$code5="";$code6="";$code7="";
if(isset($_POST['visitor']))
{

$name1=$_POST['name'];
$name=serialize($name1);

$lname1=$_POST['lname'];
$lname=serialize($lname1);

$mbno1=$_POST['mbno'];
$mbno=serialize($mbno1);

$address=$_POST['address'];

$block=$_POST['block'];
$floor=$_POST['floor'];
$flat=$_POST['flat_floor'];

$reason=$_POST['reason1'];
$persontomeet=$_POST['ownerdrop'];
 $address=$_POST['address'];

if($name1=="" || $lname1=="" || $mbno1=="" || $address=="" || $block=="" || $reason="")
{
if($name1=="")
{
$code1="Enter Name";
}
if($lname1=="")
{
$code2="Enter Last Name";
}
if($mbno1=="")
{
$code3="Enter Mobile NO";
}
if($address=="")
{
$code4="Enter Address ";
}
if($block=="")
{
$code5="Select The Block";
}
if($reason=="")
{
$code6="Enter the reason ";
}
}
else
{
//Signle image upload...
$time=round(microtime(true) * 1000);
$img_name=$_FILES['myfiles']['name'];
$file_tmp=$_FILES["myfiles"]["tmp_name"];

if($img_name!="")
{
  $filename=$time.'_'.$img_name;
$path_parts = pathinfo($filename);
   $fname1=str_replace(' ','',$path_parts['filename']);
  // echo $fname1;
    $fname1=str_replace('@','',$fname1);
    $name1=$fname1.'.'.$path_parts['extension'];
      $newFilePath = $name1;
	 // echo $newFilePath;
move_uploaded_file($file_tmp,"uploads/visitor_gallery/".$newFilePath);
}
else 
{
$newFilePath="";
}



$data=$obj->create_visitor($name,$lname,$mbno,$address,$newFilePath,$block,$floor,$flat,$reason,$persontomeet);

if($data==1)
{
//echo "<script> alert(' alert($reason)');</script>";
header("location:Add_visitor.php?vadd=success");
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
		<a href="#" class="add_page_button">Add Visitor <span class="fa fa-plus"></span> </a>
        <div class="clearfix"></div>
		<span style="color:red">
		<?php 
		if($_REQUEST['vadd']=="success")
		{
		echo "Visitor Added Successfully";
		}
		?>
		</span>
		
        <div class="box-content box"> 
				<form id="defaultForm" method="post" action="" class="form-horizontal" enctype="multipart/form-data">
					<div class="col-sm-3">
					
					<span style="color:red">
					 <?php
					 if(isset($code5))
					 { 
					 echo $code5;
					 } 
					 ?>
					 </span>
					
									
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
					<span style="color:red">
					 <?php
					 if(isset($code7))
					 { 
					 echo $code7;
					 } 
					 ?>
					 </span>
					
                    </div>
                    <div class="col-sm-3"></div>
                    <div class="clearfix"></div>
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
                    
                    
                    <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Name" name="name" /><?php	if(isset($code1)){echo $code1; } ?></div>
                    <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Last name" name="lname" /><?php	if(isset($code2)){echo $code2; } ?></div>
                    <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Mobile" name="mbno" /><?php	if(isset($code3)){echo $code3; } ?></div>
                    
					<div class="col-sm-3">
                  		<!-- <a href="#"  class="input_outer"> <span class="fa fa-plus"></span></a> -->
                  		<!-- <button class="btn btn2_blank btn2 wid_auto" onclick="return addPerson();"> <span class="fa fa-plus"></span></button> -->
                  		
						<div class="plus"><span class="fa fa-plus" onclick="return addPerson();"></span></div>
                  		<input type="hidden" id="counter_txt" value="1" />
                    </div>

                    <!-- NEW PERSONS ADDED WILL BE APPENDED INTO THIS DIV -->
                    <div id="newPersons_div" class='col-sm-12' style="padding:0px; margin:0px;"></div>


                    <div class="clearfix"></div>  
                     
                    <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="reason" name="reason1" /><?php	if(isset($code6)){echo $code6; } ?></div>
                    <div id="owner" style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="person to meet" name="persontomeet" /></div>
                   
                                    <div class="clearfix"></div>            
                   
                    
                    <div style="color:red" class="col-sm-6"><input type="text" class="form-control" placeholder="Address" name="address" /><?php	if(isset($code4)){echo $code4; } ?></div>
                    <div class="col-sm-3">
                    <div class="custom-file-upload"><input type="file"  placeholder="Upload Image" name="myfiles" /></div>
                    </div>
                    <div class="col-sm-3"></div>
                    <div class="clearfix"></div>
                                     
                    <div class="col-sm-3">
					<input type="reset" value="Cancel" class="btn"/>
                    <input type="submit" name="visitor" class="btn btn-danger" value="Save"/>
                    </div>
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
					
				</form>
                 <div class="clearfix"></div>
			</div>
      	
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


<?php include("footer.php"); ?>

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
$.post("get_owner.php",{flatid:flatid,blockid:blockid,floorid:floorid},function(data) {  //location.reload();
 //$( ".result" ).html('MY ID is - '+data );
  if(data!="")
  {
  $("#owner").html(data);
}
 });

}
</script>







<script src="js/footer_js.js"></script>
</body>
</html>
