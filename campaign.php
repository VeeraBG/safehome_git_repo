<?php
$page="compaigndetails";
include_once('dbFunction.php');

$obj = new dbFunction();
$code1="";
$code2="";
$code3="";
$code4="";
$code5="";
$code6="";
$code7="";
if(isset($_POST['compaign']))
{
$compaignname=$_POST['compaignname'];
 $pname=$_POST['pname'];
$mbno=$_POST['mbno'];

$email=$_POST['email'];
$address=$_POST['address'];
$lno=$_POST['lno'];
$comment=$_POST['comment'];
$corporateoffices=$_POST['corporateoffices'];
//print_r($_POST);
//exit;

//Signle image upload...


if($compaignname=="" || $pname=="" || $mbno=="" || $email=="" || $address=="" || $corporateoffices=="")
{
if($compaignname=="")
{
$code1="Enter Company name";
}
if($pname=="")
{
$code2="Enter Person name";
}
if($mbno=="")
{
$code3="Enter Mobile no";
}
if($email=="")
{
$code4="Enter email";
}
if($address=="")
{
$code5="Enter Address";
}
// if($comment=="")
// {
// $code6="Enter comment";
// }

if($corporateoffices=="")
{
$code7="Enter corporateoffices";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
{
       $code4= "Invalid email format"; 
  }
}
else
{
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
{
       $code4= "Invalid email format"; 
  }
else
{
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
move_uploaded_file($file_tmp,"uploads/apartment_gallery/".$newFilePath);
}
else 
{
$newFilePath="";
}

$dno=$_POST['dno'];
$data=$obj->create_compaign($compaignname,$pname,$mbno,$lno,$email,$address,$comment,$newFilePath,$corporateoffices,$dno);

if($data==1)
{
header("location:campaign.php?cmp=success");
}
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
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<?php include("leftmenu.php"); ?>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
		<a href="#" class="add_page_button">Add Campaign <span class="fa fa-plus"></span> </a>
        <div class="clearfix"></div>
		
		<span style="color:red">
		<?php 
		// if($_REQUEST['cmp']=="success")
		// {
		// echo "Campaign Created Successfully";
		// }
		?>
		</span>
		
        <div class="box-content box">
			<div class="col-sm-2">
						     
<img src="img/profile-icon.png" width="148px" height="136px" alt="" class="prw_img img-rounded" 
style="  margin-left: 5%;  margin-top: 26%;" id="box" />
      
				 </div>
				 		<div class="col-sm-10">
				<form id="defaultForm" method="post" action="" class="form-horizontal" enctype="multipart/form-data">
					<div class="col-sm-3"></div>
                    <div class="clearfix"></div>
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
                      <div style="color:red" class="col-sm-3">
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
                    <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Campaign Name" name="compaignname" /></div>
                 <div class="clearfix"></div>
		<div style="color:red" class="col-sm-3"><?php if(isset($code2)){ echo $code2; } ?></div>
				  <div style="color:red" class="col-sm-3"><?php if(isset($code3)){ echo $code3; } ?></div>
				  <div style="color:red" class="col-sm-3"></div>
				  <div style="color:red" class="col-sm-3"><?php if(isset($code4)){ echo $code4; } ?></div>
				 <div class="clearfix"></div>
                    <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Contact Person Names" name="pname" /></div>
                    <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Contact Person Mobile No" name="mbno" /></div>
                    <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Contact Person Landline No" name="lno" /></div>
					<div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Contact Person Email" name="email" /></div>
                   
                                    <div class="clearfix"></div>  
 <div style="color:red" class="col-sm-6"><?php if(isset($code5)){ echo $code5; } ?></div>
	<div style="color:red" class="col-sm-3"><?php if(isset($code7)){ echo $code7; } ?></div>								
									<div class="clearfix"></div>  									
                                       
                    <div style="color:red" class="col-sm-6">
				
						 <div id="locationField">
    	<input type="text"  onFocus="geolocate()" class="form-control" id="autocomplete"
		placeholder="Address" name="address" style="background: url(<?php echo $siteurl;?>pin.png) no-repeat;
  background-color: #fff;  background-position: right center;  background-size: 20px;"/>
					
   </div>
					</div>
                    <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Corporate Offices" name="corporateoffices" /></div>
                    					  <div class="col-sm-3">
<div class="custom-file-upload"><input type="file"  placeholder="Upload Image" name="myfiles" 
onChange='readURL(this);' />
</div>
                    </div>		
						
								
					<div style="color:red" class="col-sm-6"><?php //if(isset($code6)){ echo $code6;} ?></div>

								<div class="clearfix"></div> 	
							
							<div class="clearfix"></div> 
			   <div  class="col-sm-6">
					<textarea  placeholder="Comments" 
					rows="2" cols="2" name="comment" class="form-control"></textarea>
					</div>
                <div class="col-sm-3">
<input type="hidden" class="form-control" placeholder="DNo" name="dno" /></div>
                    
                    	    <div class="clearfix"></div>
                    <div class="col-sm-offset-3 col-sm-2 text-center">

                    <input type="submit" name="compaign" class="btn btn-danger" value="Save"/>
                    </div>
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
					
				</form>
                 </div>
				 <div class="clearfix"></div>
				       <table class="table_st_1">
                	<tr>
					 <th>Image</th>
					    <th>Campaign Name</th>
                    	<th>Contact Person</th>
						<th>Contact Person Mobile</th>
                         <th>Contact Person Email</th>
						 <th>Contact Person Address</th>
                        <th>Corporate Offices</th>        
						<th>Comments</th>  
						
			<!-- <th> ACTION </th>	-->
					</tr>
					<?php
							$get_campaign=$obj->get_campaign();
					while($fet_rep=mysql_fetch_array($get_campaign))
					{ 
					if(count($fet_rep)!=0)
								{
   				
			
					?>
                    <tr>
						<td><img src="uploads/apartment_gallery/<?php echo $fet_rep['compaign_image']; ?>" class="img-rounded"
				style="width:50px;  height:50px;"/></td>
                    	<td><?php echo $fet_rep['compaign_name']; ?></td>
                        <td><?php echo $fet_rep['compaign_pname']; ?></td>
                        <td><?php echo $fet_rep['compaign_mbno']; ?></td>
						<td><?php echo $fet_rep['compaign_email']; ?></td>
						<td><?php echo $fet_rep['compaign_address']; ?></td>
						<td><?php echo $fet_rep['compaign_corporateoffice']; ?></td>
						<td><?php echo $fet_rep['compaign_comment']; ?></td>
			

						</tr><?php
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

<script type="text/javascript">
$(document).ready(function() {

	$('#input_date').datepicker({setDate: new Date()});

});
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
		  $(document).ready(function(){
            $('select').selectBox({ mobile: true });
		});
		
</script>
<?php include("footer.php"); ?>
<script src="js/footer_js.js"></script>
</body>
</html>
