<?php
$apartment_id=1;
$page="society";
include_once('dbFunction.php');
$obj = new dbFunction();
// $get_society=$obj->getsociety_details();
// $get_blocks=$obj->getblock_details();
// $get_floors=$obj->get_floor_details();
// $get_flats=$obj->get_flat_details();

$check_exist_qry="select * from setup ORDER BY  setup_id  DESC limit 1";

$run_qry=mysql_query($check_exist_qry);
$total_found=mysql_num_rows($run_qry);
if($total_found >0)
{
	$my_value=mysql_fetch_assoc($run_qry);
	$my_stored_variable=explode(',',$my_value['setup_variable_type']);
	//print_r($my_stored_variable);
//echo "variable....".$my_stored_variable[0];
	$my_stored_notification=explode(',',$my_value['setup_notification_type']);
		//echo "notification....".$my_stored_notification[0];
}


if(isset($_POST['setup']))
{
//print_r($_POST);
extract($_POST);
$rsqft=$_POST['rsqft'];
$cycle=$_POST['cycle'];
$variablevalues = implode(",",$_POST['variabletype']);
$notoficationtype = implode(",",$_POST['notoficationtype']);

// if($total_found >0)
	// {
	//update
		// $upd_qry="UPDATE setup SET setup_sqft='$rsqft',setup_cycle='$cycle',setup_variable_type='".$variablevalues."',setup_notification_type='".$notoficationtype."',setup_date=NOW()";
		// $qry2=mysql_query($upd_qry);
	// }
	// else
	// {

	//insert
		$ins_qry="INSERT INTO setup(setup_sqft,setup_cycle,setup_variable_type,setup_notification_type,setup_date,apartment_id) VALUES ('$rsqft','$cycle','".$variablevalues."','".$notoficationtype."',NOW(),'$apartment_id')";
		//echo $ins_qry;
		$qry1=mysql_query($ins_qry);
//}
if($qry1)
{
$url="setup.php";

	  
	echo "<script> alert('Setup added successfully');</script>";  
	
	 echo '<script type="text/javascript">';
      echo 'window.location.href="'.$url.'";';
      echo '</script>';
//header("location:setup.php?msg=insert");
}
// if($qry2)
// {
// $url="setup.php";
// echo '<script type="text/javascript">';
      // echo 'window.location.href="'.$url.'";';
      // echo '</script>';
// }


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
		<a href="#" class="add_page_button">SetUp<span class="fa fa-plus"></span> </a>
        <div class="clearfix"></div>
		<span style="color:red">
		<?php 
		if($_REQUEST['add']=="success")
		{
		echo "society mumbers Added Successfully";
		}
		if($_REQUEST['msg']=="insert")
		{
		echo "Set-up details Added Successfully ";
		}
		if($_REQUEST['msg']=="update")
		{
		echo "Set-up details Updated Successfully ";
		}
		?>
		</span>
		
        <div class="box-content box"> 
				<form id="defaultForm" method="post" action="" class="form-horizontal" enctype="multipart/form-data">
					<div class="col-sm-3">
					
				
					</div>
					<div class="clearfix"></div>
			<!--	<div class="col-sm-2">	
                   Maintenance Rate/Sqft					
                    	
                     </div>
				 <div class="col-sm-3">	
               					
                    <input type="text" class="form-control" placeholder="RatePer SQFT" name="rsqft" value="<?php //echo $my_value['setup_sqft'];?>">
						
                     </div>
               -->
              
                    <div class="clearfix"></div>
                    <div class="col-sm-9">
                 
</div>


				   <div class="clearfix"></div>
                    <div class="col-sm-9">
               
                   <div class="col-sm-2"> Cycle </div>
				   
				   
				   
                                 <div class="col-sm-3">             
              
                        <select class="selectBox selectBox-dropdown" style="padding:3.5%;" name="cycle" >
					   	<option value="">Select Cycle</option>
							<option value="1"<?php if($my_value['setup_cycle'] == "1"){ echo 'selected="selected"';} ?>>1 Month </option>
						
								<option value="3"<?php if($my_value['setup_cycle'] == "3") { echo 'selected="selected"'; } ?>>3 Month </option>
							
									<option value="6"<?php if($my_value['setup_cycle'] == "6") { echo 'selected="selected"'; } ?>>6 Month </option>
								
					
                       </select>
					   </div> </div> 
 <div class="clearfix"></div>	


            <div class="col-sm-2">Select Variable Parameter </div>
 
				
                      
 <div class="col-sm-9">
                <div class="col-sm-3">             
                   <input type="checkbox" name="variabletype[]" value="diesel" <?php if(in_array(diesel,$my_stored_variable)){echo "checked";}?>> Diesel Generator <br>
					 <input type="checkbox" name="variabletype[]" value="water" <?php if(in_array(water,$my_stored_variable)){echo "checked";}?>> Water Bill <br>
					  <input type="checkbox" name="variabletype[]" value="penalty" <?php if(in_array(penalty,$my_stored_variable)){echo "checked";}?>> Penalty <br>
					   <input type="checkbox" name="variabletype[]" value="discount" <?php if(in_array(discount,$my_stored_variable)){echo "checked";}?>> Discounts <br>
					    <input type="checkbox" name="variabletype[]"  value="others" <?php if(in_array(others,$my_stored_variable)){echo "checked";}?>> Others <br>
					 <input type="checkbox" name="variabletype[]" value="utility" <?php if(in_array(utility,$my_stored_variable)){echo "checked";}?>> Utility Billing <br><br>
					 
					
                       
					   </div> </div> 

 <div class="clearfix"></div>

          <div class="col-sm-2">Notification Type </div>

				
                   
 <div class="col-sm-9">
                <div class="col-sm-3">             
                   <input type="checkbox" name="notoficationtype[]" value="sms" <?php if(in_array(sms,$my_stored_notification)){echo "checked";}?>> SMS <br>
					 <input type="checkbox" name="notoficationtype[]" value="email" <?php if(in_array(email,$my_stored_notification)){echo "checked";}?>> Email<br>
					  <input type="checkbox" name="notoficationtype[]" value="handcopy" <?php if(in_array(handcopy,$my_stored_notification)){echo "checked";}?>> Hand Copy <br><br><br>
					
					 
					
                       
					   </div> </div> 


					    <div class="clearfix"></div>
						
						<?php if($total_found >0) {
				?>

                    <div class="col-sm-offset-3 col-sm-6 text-center">
				<!--	<input type="reset" value="Cancel" class="btn"/> -->
                    <input type="submit" name="setup" class="btn btn-danger" value="Update"/>
                    </div>
					
					<?php } else { ?>
					
					  <div class="col-sm-offset-3 col-sm-6 text-center">
				<!--	<input type="reset" value="Cancel" class="btn"/> -->
                    <input type="submit" name="setup" class="btn btn-danger" value="Save"/>
                    </div>
					<?php } ?>
					
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
				</form>
                 <div class="clearfix"></div>
			</div>
      			
		
		
		
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
