<?php
$page="security";
//$cs=$_SESSION['ceid'];
session_start();
include_once('dbFunction.php');
$obj = new dbFunction();
//$security_id=$_SESSION['securitypersonid'];
//$usecurity=$obj->getsecurity_update($security_id);
$get_cmp34=$obj->get_contract_comapny_details();

$code1="";$code2="";$code3="";$code4="";$code5="";$code6="";$code7="";$code8="";
if(isset($_POST['update']))
{
//print_r($_POST);

//echo $cat=$_POST['cat'];

$name=$_POST['name'];
$lname=$_POST['lname'];
$mbno=$_POST['mbno'];
$code=$_POST['code'];
$secid=$_POST['secid'];
$shift=$_POST['shift'];
$address=$_POST['address'];
 $dno=$_POST['dno'];
//echo "helloooooooooooooooooooooooooooo";


if( $dno=="" || $cat=="" || $name=="" || $lname=="" || $code=="" || $mbno=="" || $address=="" || $shift=="" )
{
if($dno=="")
{
	$code9="Enter Door No";
}	
if($cat=="")
{
	$code1="Enter Company name";
}
if($name=="")
{
	$code2="Enter name";
}
if($lname=="")
{
	$code7="Enter last name";
}
if($code=="")
{
	$code3="Enter code";
}
if($mbno=="")
{
	$code4="Enter mobile no";
}
if($address=="")
{
	$code5="Enter Address";
}
if($shift=="")
{
	$code6="Enter shift";
}	
}
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


move_uploaded_file($file_tmp2,"uploads/security_gallery/".$newFilePath2);

}

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
	       

$secdet090=$obj->update_vendor($secid,$cat,$name,$lname,$mbno,$code,$shift,$dno,$address,$newFilePath,$newFilePath2);
//$secdet090=$obj->mysecu_hire($secid,$cat,$name);
if($secdet090==1)
{
//echo "<script> alert('Security Created Successfully');</script>";
// header("location:add_vendor.php?cadd=success");
$url="add_vendor.php";
echo "<script> alert('Vendor Details Updated Successfully');</script>";
echo '<script type="text/javascript">';
      echo 'window.location.href="'.$url.'";';
      echo '</script>';
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
		<a href="#" class="add_page_button">Edit Vendor Details <span class="fa fa-plus"></span> </a>
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
		
		if($_SESSION['vendorid']!="")
		{
			$csecurity_id1=$_SESSION['vendorid'];
			//echo $csecurity_id1;
		
		}
	
		$secc=$obj->getvendor_update($csecurity_id1);
		$sec=mysql_fetch_array($secc);
						?>
		
        <div class="box-content box">
		<div class="col-sm-2">
						     
<img src="uploads/security_gallery/<?php echo  $sec['vendor_image']; ?>" 
width="148px" height="136px" alt="" class="prw_img img-rounded" 
style="  margin-left: 5%;  margin-top: 26%;" id="box" />
      
				 </div>
				 		<div class="col-sm-10">
				<form id="defaultForm" method="post" action="" class="form-horizontal"
				enctype="multipart/form-data">
					<input type="hidden" name="secid" value="<?php echo $sec['vendor_id']; ?>"  />    			
              
					<div style="color:red" class="col-sm-3"><?php if(isset($code2)){echo $code2; } ?></div>
					<div style="color:red" class="col-sm-3"><?php if(isset($code7)){echo $code7; } ?></div>
					<div style="color:red" class="col-sm-3"><?php if(isset($code4)){echo $code4; } ?></div>
                    <div class="clearfix"></div>
             <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $sec['vendor_name']; ?>" /></div>
                    <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Last name" name="lname" value="<?php echo $sec['vendor_lname']; ?>" /></div>
                    <div  class="col-sm-3">
<input type="text" class="form-control" placeholder="Mobile" name="mbno" value="<?php echo $sec['vendor_mobile']; ?>"  />


                    <!-- NEW PERSONS ADDED WILL BE APPENDED INTO THIS DIV -->
                    <div id="newPersons_div" class='col-sm-12' style="padding:0px; margin:0px;"></div>
                    

</div>
<div class="clearfix">
					</div>
                    <div style="color:red" class="col-sm-3"><?php	if(isset($code3)){echo $code3; } ?></div>
					<div style="color:red" class="col-sm-3"><?php	if(isset($code1)){echo $code1; } ?></div>
					<div style="color:red" class="col-sm-3"><?php	if(isset($code6)){echo $code6; } ?></div>
                            
                    <div class="clearfix">
					</div>      
                    <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Code" name="code" value="<?php echo $sec['vendor_code']; ?>" /></div>
                <!--    <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Name of the company" name="cname" /><?php	//if(isset($code6)){echo $code6; } ?></div> -->
                  

<div class="col-sm-3">
								    <select  name="cat" class="selectBox selectBox-dropdown" style="padding:3.5%;">
                    	<option value="" >Select Company</option>
						<?php 
						
						while($row=mysql_fetch_array($get_cmp34))
						{
						
 ?>
								


           <option value="<?php echo $row['agency_companyname'];?>"
 <?php if($row['agency_companyname']==$sec['vendor_cat']){ echo 'selected="selected"'; } ?> >
 <?php echo $row['agency_companyname'];?></option>        
                       
                      <?php  } ?>
                       </select>
                    </div>
				  <div style="color:red" class="col-sm-3">
				  
				   <select  name="shift" class="selectBox selectBox-dropdown" style="padding:3.5%;">
						<option value="">Select Shift Type</option>

				<option value="Day Shift"<?php if ($sec['vendor_shift_type'] === 'Day Shift') echo ' selected="selected"'; ?>>Day Shift</option>
 <option value="Night Shift"<?php if ($sec['vendor_shift_type'] === 'Night Shift') echo ' selected="selected"'; ?>>Night Shift</option>
					<option value="Total Shift"<?php if ($sec['vendor_shift_type'] === 'Total Shift') echo ' selected="selected"'; ?>>Total</option>
					</select>
				
				  </div>
                  <div class="clearfix"></div>
				  <div style="color:red" class="col-sm-3"><?php	if(isset($code9)){echo $code9; } ?></div>
					<div style="color:red" class="col-sm-3"><?php	if(isset($code5)){echo $code5; } ?></div>
 <div class="clearfix"></div>                   
				   <div class="col-sm-3"><input type="text" class="form-control" placeholder="Enter Dno"
				   name="dno" value="<?php echo $sec['vendor_Dno']; ?>" /></div>
                 <div class="col-sm-3">

				 <div style="color:red" lass="col-sm-6">
				  <div id="locationField">
    	<input type="text"  onFocus="geolocate()" class="form-control" id="autocomplete"
		placeholder="Address" name="address" style="background: url(<?php echo $siteurl;?>pin.png) no-repeat;
  background-color: #fff;  background-position: right center;  background-size: 20px;"  value="<?php echo $sec['vendor_address']; ?>"/>
					
   </div>

				 
				 </div>
                 	</div>
					<div class="col-sm-3">
                    <div class="custom-file-upload"><input type="file"  placeholder="Upload ID" name="myfiles[]"  /></div>
                    </div>
					<div><img src="uploads/Security_multiple_images/<?php echo  $sec['vendor_upload_id']; ?>"  height="80"
					width="80" class="img-rounded"></div>	
					<div class="col-sm-3">
                   
				   <div class="custom-file-upload"><input type="file"  placeholder="Upload Image" name="img"  /></div>
                    </div>
      
                    <div class="col-sm-9"></div>
			 <br>
			 <br>
			 <br>
                    <div class="col-sm-offset-3 col-sm-2 text-center">
			
<input type="submit" name="update" id="update"  class="btn btn-danger" value="update" />
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
		var newPerson = $("<div id='newdiv"+counter+"' class=\"col-sm-12\" style=\"padding:0px; margin:0px;\"><div class=\"col-sm-3\"><input type=\"text\" class=\"form-control\" placeholder=\"Mobile No\" name=\"mbno[]\" id='mbno1"+counter+"' /></div><div class=\"col-sm-3\"><div class=\"cross\"><span class=\"fa fa-times\" onclick=\"return delPerson("+counter+");\"></div></span></div><div class=\"clearfix\"></div></div>");
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

<script type="text/javascript">
		  // $(document).ready(function(){
            // $('select').selectBox({ mobile: true });
		// });
		
</script>
<?php include("footer.php"); ?>
<script src="js/footer_js.js"></script>
</body>
</html>

