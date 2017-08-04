<?php
$page="visitor";
include_once('dbFunction.php');
$obj = new dbFunction();
$get_blocks=$obj->getblock_details();
// $get_floors=$obj->get_floor_details();
// $get_flats=$obj->get_flat_details();
$code1="";$code2="";$code3="";$code4="";$code5="";$code6="";$code7="";$code8="";
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

//echo "printttttttttttttttttttt";
  $reason123=$_POST['reason1'];

//$persontomeet=$_POST['ownerdrop'];

//$reason=$_POST['reason1'];
 $persontomeet=$_POST['ownerdrop'];


$mumber=explode(",",$persontomeet);

$mumbername=$mumber[0];
$mumberid=$mumber[1];

 $address=$_POST['address'];
  $dno=$_POST['dno'];


// if(empty($_POST['mbno1'])) {//if no name has been supplied 
        // $code3='Please Enter a Mobile Number '; //add to array "error"
    // }
// if(empty($_POST['name1'])) {//if no name has been supplied 
        // $code1='Enter the Name '; //add to array "error"
    // }
// if(empty($_POST['lname1'])) {//if no name has been supplied 
        // $code2=' Enter the last Name '; //add to array "error"
    // }
if($name1=="" || $lname1=="" || $mbno1=="" || $address=="" || $block=="" || $floor=="" || $flat=="" || $reason123=="" 
|| $persontomeet=="" || $dno=="")
{
  
if($address=="")
{
$code4="Enter Address ";
}
if($block=="" || $floor=="" || $flat=="" )
{
$code5="Select The Block,Floor and Flat";
}
if($reason123=="")
{
$code6="Enter the reason";
}
if($persontomeet=="")
{
$code7="Select the Person to meet ";
}
if($dno=="")
{
$code8="Enter DoorNo";
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

  $reason123;
$date=date("Y-m-d");
$data=$obj->create_visitor($name,$lname,$mbno,$address,$newFilePath,$block,$floor,$flat,$reason123,
$mumbername,$mumberid,$dno,$date);

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
 <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
 <script>
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

var placeSearch, autocomplete;
var componentForm = {
 street_number: 'short_name',
 route: 'long_name',
 locality: 'long_name',
 administrative_area_level_1: 'short_name',
 country: 'long_name',
 postal_code: 'short_name'
};

function initialize() {
 // Create the autocomplete object, restricting the search
 // to geographical location types.
 autocomplete = new google.maps.places.Autocomplete(
     /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
     { types: ['geocode'] });
 // When the user selects an address from the dropdown,
 // populate the address fields in the form.
 google.maps.event.addListener(autocomplete, 'place_changed', function() {
   fillInAddress();
 });
}

// [START region_fillform]
function fillInAddress() {
 // Get the place details from the autocomplete object.
 var place = autocomplete.getPlace();

 for (var component in componentForm) {
   document.getElementById(component).value = '';
   document.getElementById(component).disabled = false;
 }

 // Get each component of the address from the place details
 // and fill the corresponding field on the form.
 for (var i = 0; i < place.address_components.length; i++) {
   var addressType = place.address_components[i].types[0];
   if (componentForm[addressType]) {
     var val = place.address_components[i][componentForm[addressType]];
     document.getElementById(addressType).value = val;
   }
 }
}
// [END region_fillform]

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
 if (navigator.geolocation) {
   navigator.geolocation.getCurrentPosition(function(position) {
     var geolocation = new google.maps.LatLng(
         position.coords.latitude, position.coords.longitude);
     var circle = new google.maps.Circle({
       center: geolocation,
       radius: position.coords.accuracy
     });
     autocomplete.setBounds(circle.getBounds());
   });
 }
}
</script>
  <body onload="initialize()">


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
<!--<script language="javascript">
        function Validate()
        {
            var x = document.form1.mbno.value;
           
           if(isNaN(x)||x.indexOf(" ")!=-1)
           {
              alert("Enter numeric value")
              return false; 
           }
           if (x.length>8)
           {
                alert("enter 8 characters");
                return false;
           }	
	
		}
</script> -->		
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
			<div class="col-sm-2">
						     
<img src="img/profile-icon.png" width="148px" height="136px" alt="" class="prw_img img-rounded" 
style="  margin-left: 5%;  margin-top: 26%;" id="box" />
      
				 </div>
				 
				 	 		<div class="col-sm-10">
				<form id="defaultForm" name="form1" method="post" action="" class="form-horizontal" enctype="multipart/form-data">
					<div class="col-sm-3">
					
					<span style="color:red">
					 <?php
					 if(isset($code5))
					 { 
					 echo $code5;
					 } 
					 ?>
					 </span></div>
					 
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
					<span style="color:red">
				
					 </span>
					
                    </div>
                    <div class="col-sm-3"></div>
                    <div class="clearfix"></div>
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
                    <div style="color:red" class="col-sm-3"><?php	if(isset($code1)){echo $code1; } ?></div>
					<div style="color:red" class="col-sm-3"><?php	if(isset($code2)){echo $code2; } ?></div>
					<div style="color:red" class="col-sm-3"><?php	if(isset($code3)){echo $code3; } ?></div>
                    <div class="clearfix"></div>
                    <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Name" name="name[]" /></div>
                    <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Last name" name="lname[]" /></div>
                    <div style="color:red" class="col-sm-3"><input type="tel" class="form-control" placeholder="Mobile" name="mbno[]" /></div>
                    
					<div class="col-sm-3">
                  		<!-- <a href="#"  class="input_outer"> <span class="fa fa-plus"></span></a> -->
                  		<!-- <button class="btn btn2_blank btn2 wid_auto" onclick="return addPerson();"> <span class="fa fa-plus"></span></button> -->
                  		
						<div class="plus"><span class="fa fa-plus" onclick="return addPerson();"></span></div>
                  		<input type="hidden" id="counter_txt" value="1" />
                    </div>

                    <!-- NEW PERSONS ADDED WILL BE APPENDED INTO THIS DIV -->
                    <div id="newPersons_div" class='col-sm-12' style="padding:0px; margin:0px;"></div>


                    <div class="clearfix"></div>  
					<div style="color:red" class="col-sm-3">
					<?php	if(isset($code6)){echo $code6; } ?></div>
                      <div style="color:red" class="col-sm-3">
					<?php	if(isset($code7)){echo $code7; } ?></div> 
					   
					   
					   <div class="clearfix"></div>   
                    <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="reason" name="reason1" /></div>
                    <div id="owner" style="color:red" class="col-sm-3">
					<select class="selectBox-dropdown" style="padding:3%;" name="ownerdrop" >
					   	<option value="">Select Person</option></select></div>
     
                                    <div class="clearfix"></div> 
                   <div style="color:red" class="col-sm-3"><?php	if(isset($code8)){echo $code8; } ?></div>									
                   <div style="color:red" class="col-sm-3"><?php	if(isset($code4)){echo $code4; } ?></div>
				   
                    <div class="clearfix"></div> 
<div class="col-sm-3"><input type="text" class="form-control" placeholder="Enter Dno" name="dno" /></div>					
                    <div style="color:red" class="col-sm-3">
	 <div id="locationField">
    	<input type="text"  onFocus="geolocate()" class="form-control" id="autocomplete"
		placeholder="Address" name="address" style="background: url(<?php echo $siteurl;?>pin.png) no-repeat;
  background-color: #fff;  background-position: right center;  background-size: 20px;"/>
					
   </div>
					
				
					
					</div>
                    <div class="col-sm-3">
                    <div class="custom-file-upload"><input type="file"  placeholder="Upload Image" name="myfiles" onChange='readURL(this);' /></div>
                    </div>
			
                    <div class="col-sm-3"></div>
                    <div class="clearfix"></div>
                                     
                    <div class="col-sm-3">
	
	
                    <input type="submit" name="visitor" class="btn btn-danger" value="Save"/>
                    </div>
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
					
				</form>
              
		 </div>
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
var id='1'; // set default id for first img tag
       function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.prw_img').attr('src', e.target.result).width(148).height(136);
                                       
            $('#img_'+ id).attr('src', e.target.result).width(148).height(136);
$('#img_'+ id).css('display', 'inline');
                 // $('#img_1').css('display','inline');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
$(document).ready(function() {
$('button').click(function() {
    id = $(this).html().replace('AddImage to section', '').trim();
});});
  
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
