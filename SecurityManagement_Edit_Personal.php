<?php
$page="security";
include_once('dbFunction.php');
$obj = new dbFunction();
$get_blocks=$obj->getblock_details();
$getag=$obj->getagency_details();
$code1="";$code2="";$code3="";$code4="";$code5="";$code6="";$code7="";$code8="";

if(isset($_POST['securityupdate']))
{
$cat=$_POST['cat'];
$name=$_POST['name'];
$lname=$_POST['lname'];
$mbno1=$_POST['mbno'];
$mbno=serialize($mbno1);
$code=$_POST['code'];
//$cname=$_POST['cname'];
$shift=$_POST['shift'];
$address=$_POST['address'];

$email=$_POST['email'];
$security_id=$_POST['security_id'];
$dno=$_POST['dno'];
if($cat=="" || $name=="" || $lname=="" || $code=="" || $shift=="" ||$address=="" || $email=="" || $dno=="")
{
if($cat=="")
{
$code1="Enter Company Name";
}
if($name=="")
{
$code2="Enter  Name";
}
if($lname=="")
{
$code3="Enter last Name";
}
if($shift=="")
{
$code4="Enter shift type";
}if($address=="")
{
$code5="Enter Address";
}
if ($email=="" || !filter_var($email, FILTER_VALIDATE_EMAIL)) 
{
       $code6= "Invalid email format"; 
  }  

if($dno=="")
{
$code7="Enter Dno";
}
if($code=="")
{
$code8="Enter code";
}
}
else
{
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
{
       $code6= "Invalid email format"; 
  }  


/*
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
move_uploaded_file($file_tmp,"uploads/".$newFilePath);
}
else 
{
$newFilePath="";
}
*/
//multiple image start code

else
{
//Signle image upload...
$time1=round(microtime(true) * 1000);
$imgname=$_FILES['img']['name'];
$file_tmp2=$_FILES["img"]["tmp_name"];
if($imgname!="")
{
$file_name2=$time1.'_'.$imgname;
$path_parts = pathinfo($file_name2);
//print_r($path_parts);
   $fname2=str_replace(' ','',$path_parts['filename']);
  // echo $fname2;
   $fname2=str_replace('@','',$fname2);
    $name2=$fname2.'.'.$path_parts['extension'];
      $newFilePath2 = $name2;

// echo $newFilePath2;
move_uploaded_file($file_tmp2,"uploads/security_gallery/".$newFilePath2);
}
// else 
// {
// $newFilePath2="";
// }

//multiple file upload
if($_FILES['myfiles']['name']!=""){

$file_name_all="";
	            for($i=0; $i<count($_FILES['myfiles']['name']); $i++) 
	            {
	                   $tmpFilePath = $_FILES['myfiles']['tmp_name'][$i];    
	                   if ($tmpFilePath != "")
	                   {    
	                       $path = "uploads/Security_multiple_images/";
	                       $name1 = $_FILES['myfiles']['name'][$i];
	                      $size = $_FILES['myfiles']['size'][$i];
	       
	                       list($txt, $ext) = explode(".", $name1);
	                       $file= time().substr(str_replace(" ", "_", $txt), 0);
	                       $info = pathinfo($file);
	                       $filename = $file.".".$ext;
	                       if(move_uploaded_file($_FILES['myfiles']['tmp_name'][$i], $path.$filename)) 
	                       { 
	                          date_default_timezone_set ("Asia/Calcutta");
	                          $currentdate=date("d M Y");
	                          $file_name_all.=$filename.",";
	                       }
	                 }
	            }
	          $newFilePath = rtrim($file_name_all, ','); //imagepath if it is present    
	        }
			
			
			

	        // else
	        // {
	            // $newFilePath="";
	        // } //multiple end
			
			//if($imgname!="" && $_FILES['myfiles']['name']!=""){
			$updatesec=$obj->update_security($security_id,$cat,$name,$lname,$mbno,$code,$shift,$dno,$address,$email,$newFilePath2,$newFilePath);
			// }
			// if($imgname!="" && $_FILES['myfiles']['name']==""){
			// $updatesec=$obj->update_security($cat,$name,$lname,$mbno,$code,$cname,$shift,$address,$email,$newFilePath2);
			// }
// if($imgname=="" && $_FILES['myfiles']['name']!=""){
			// $updatesec=$obj->update_security($cat,$name,$lname,$mbno,$code,$cname,$shift,$address,$email,$newFilePath);
			// }
// if($imgname=="" && $_FILES['myfiles']['name']==""){
			// $updatesec=$obj->update_security($cat,$name,$lname,$mbno,$code,$cname,$shift,$address,$email);
			// }
if($updatesec==1)
{
//echo "<script> alert('Security Created Successfully');</script>";
//header("location:SecurityManagement_ViewPersonal123.php");
 echo '<script type="text/javascript">'
   , 'window.location.href="SecurityManagement_ViewPersonal123.php";'
   , '</script>';
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
		<a href="#" class="add_page_button">Edit Security Details <span class="fa fa-plus"></span> </a>
        <div class="clearfix"></div>
		
		<span style="color:red">
		<?php 
		if($_REQUEST['sadd']=="success")
		{
		
		echo "Security Added Successfully";
		}
		?>
		</span>
		
		
		<?php 
		if( $_SESSION['editsecureid']!="")
		{
		$sec_id=$_SESSION['editsecureid'];
		$get_sec_det=$obj->get_security_personal_details($sec_id);
		}
		
		
		?>
        <div class="box-content box">
		
				<div class="col-sm-2">     
					<div >
					
					<img class="prw_img img-rounded"
					src="<?php if($get_own['owner_image']!=''){echo  "uploads/security_gallery/".$fetch_sec_det['security_image'];}
					else { echo "img/profile-icon.png";} ?>" height="136" width="148"  style="  margin-left: 5%;  margin-top: 26%;" id="box" /></div> 
		</div>
			<div class="col-sm-10">
				<form id="defaultForm" method="post" action="" class="form-horizontal" enctype="multipart/form-data">
					
		<div style="color:red" class="col-sm-3"> <?php
					 if(isset($code1))
					 { 
					 echo $code1;
					 } 
					 ?></div>
					 
					    <div class="clearfix"></div>
					<div class="col-sm-3">
				 <?php 
					 while($fetch_sec_det=mysql_fetch_array($get_sec_det))
					 {
					 
			?>
					        <select  name="cat">
                    	<option >Select Company</option>
						 		<?php 
						
						while($row=mysql_fetch_array($getag))
						{

						?>
<option value="<?php echo $row['agency_companyname'];?>" 
<?php if($fetch_sec_det['security_cat']==$row['agency_companyname']) {  echo   'selected="selected"'; } ?>   ><?php echo $row['agency_companyname'];?></option>
                 
                       
                      <?php } ?>
                       </select>
                    </div>
                    <div class="col-sm-9"></div>
	         <div class="clearfix"></div>
                <div style="color:red" class="col-sm-3"><?php	if(isset($code2)){echo $code2; } ?></div>     
				<div style="color:red" class="col-sm-3"><?php	if(isset($code3)){echo $code3; } ?></div>  
				<div style="color:red" class="col-sm-3"></div>  
				
                      <div class="clearfix"></div> 
              <input type="hidden" name="security_id" value="<?php echo $fetch_sec_det['security_id']; ?>"  />
                    <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $fetch_sec_det['security_name']; ?>"  /></div>
                    <div  class="col-sm-3"><input type="text" class="form-control" placeholder="Last name" name="lname"  value="<?php echo $fetch_sec_det['security_lname']; ?>"  /></div>
                   <?php 
				  // echo $fetch_sec_det['security_mobile'];
				    
// Unserialize the data  
$var1 = unserialize($fetch_sec_det['security_mobile']);  
//echo $var1[0];
// Show the unserialized data; f
 for($i=0;$i<count($var1); $i++)
 { 
 if($var1[$i]!=""){
 
 ?>
				   <div  class="col-sm-3"><input type="text" class="form-control" placeholder="Mobile" name="mbno[]"  value="<?php echo  $var1[$i]; ?>"  /><span style="color:red"><?php	if(isset($code4)){echo $code4; } ?></span></div> 
				   
<?php }}
				   ?>

                    
					<!--<div class="col-sm-3">
					<button class="btn btn2_blank btn2 wid_auto"> <span class="fa fa-plus"></span> </button></div> -->
                    <div class="clearfix"></div>
					
					<div style="color:red" class="col-sm-3">
					<?php	if(isset($code6)){echo $code6; } ?><?php if($data==2)
						{echo "Email Already Exist..";}?></div>  
	  <div style="color:red" class="col-sm-3"><?php	if(isset($code8)){echo $code8; } ?></div>  
<div style="color:red" class="col-sm-3"><?php	if(isset($code4)){echo $code4; } ?></div>   
					 <div class="clearfix"></div>
					                   <div style="color:red" class="col-sm-3">
<input type="text" class="form-control" placeholder="Email" name="email"  value="<?php echo $fetch_sec_det['security_email']; ?>"  />
</div>

                    <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Code" name="code"  value="<?php echo $fetch_sec_det['security_code']; ?>"  /></div>
                  <!--  <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Name of the company" name="cname"  value="<?php// echo $fetch_sec_det['security_cat']; ?>"  /><?php//	if(isset($code6)){echo $code6; } ?></div> -->
                    <div style="color:red" class="col-sm-3">
			 <select  name="shift" class="selectBox selectBox-dropdown" style="padding:3.5%;">
						<option value="">Select Shift Type</option>

				<option value="Day Shift"<?php if ($fetch_sec_det['security_shift_type'] === 'Day Shift') echo ' selected="selected"'; ?>>Day Shift</option>
 <option value="Night Shift"<?php if ($fetch_sec_det['security_shift_type'] === 'Night Shift') echo ' selected="selected"'; ?>>Night Shift</option>
					<option value="Total Shift"<?php if ($fetch_sec_det['security_shift_type'] === 'Total Shift') echo ' selected="selected"'; ?>>Total</option>
					</select>
				
					</div>
                    <div class="col-sm-3"><button class="btn btn2_blank btn2 wid_auto"> 
					<span class="fa fa-clock-o"></span> </button></div>
                    <div class="clearfix"></div>
					  <div style="color:red" class="col-sm-3"><?php	if(isset($code7)){echo $code7; } ?></div>  
<div style="color:red" class="col-sm-3"><?php	if(isset($code5)){echo $code5; } ?></div>    
					<div class="clearfix"></div>
                    <div class="col-sm-3"><input type="text" class="form-control" placeholder="Enter Dno" name="dno" 
					value="<?php echo $fetch_sec_det['security_Dno']; ?>" /></div>
                 <div class="col-sm-6">

		  <div id="locationField">
    	<input type="text"  onFocus="geolocate()" class="form-control" id="autocomplete"
		placeholder="Address" name="address" style="background: url(<?php echo $siteurl;?>pin.png) no-repeat;
  background-color: #fff;  background-position: right center;  background-size: 20px;"  
value="<?php echo $fetch_sec_det['security_address']; ?>"  />

		   </div>			
   </div>				 
          
				 					  
						<div class="clearfix"></div>
					       
                
<div class="col-sm-3">
<div class="custom-file-upload"><input type="file"  placeholder="Upload ID" name="myfiles[]"  /></div>
</div>

<div class="col-sm-2">
  <img src="uploads/Security_multiple_images/<?php echo  $fetch_sec_det['security_upload_id']; ?>" 
  class="img-rounded" height="80" width="80" >
  
  </div>
     <div class="clearfix"></div>
					<div class="col-sm-3">
                    <div class="custom-file-upload">
					<input type="file"  placeholder="Upload Image" onChange='readURL(this);' name="img"   /></div>
                    </div>        

                    
                    <div class="col-sm-3">
			
                    <input type="submit" name="securityupdate" class="btn btn-danger" value="Update"/>
                    </div>
               
               
                    <div class="clearfix"></div>
					<?php }?>
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
		  $(document).ready(function(){
            $('select').selectBox({ mobile: true });
		});
		
</script>
<?php include("footer.php"); ?>
<script src="js/footer_js.js"></script>
</body>
</html>
