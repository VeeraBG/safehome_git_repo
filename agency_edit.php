<?php 
$page="agency";
include_once('dbFunction.php');
$obj = new dbFunction();
$getag=$obj->getagency_details();
$code1="";$code2="";$code15="";$code3="";$code4="";$code5="";$code6="";$code7="";$code8="";$code9="";$code10="";$code11="";$code12="";$code13="";$code14="";
if(isset($_POST['hire']))
{
//$cat=$_POST['cat'];
$cname=trim($_POST['cname']);

$contactname=$_POST['contactname'];
$lphone=$_POST['lphone'];
$mbno=$_POST['mbno'];
$email=$_POST['email'];
$address=$_POST['address'];
$tinno=$_POST['tinno'];
$enrolldate=$_POST['enrolldate'];
$applyfor=$_POST['applyfor'];
$duration=$_POST['duration'];
$charge=$_POST['charge'];
$nop=$_POST['nop'];
$agencytype=$_POST['agencytype'];
$agencyid1=$_POST['agencyid1'];
$dno=$_POST['dno'];

if($dno=="" || $agencytype=="" || $cname=="" || $contactname=="" || $lphone=="" || $mbno=="" || $email=="" || $address=="" || $tinno=="" || $enrolldate=="" || $applyfor=="" || $duration=="" || $charge=="" || $nop=="No of persons" )
{
	if($dno=="")
{
$code15="Enter Door No";
}
if($agencytype=="")
{
$code3="Select Agency Type";
}
if($cname=="")
{
$code2="Enter Company Name";
}
if($contactname=="")
{
$code4="Enter Contact person name";
}
if($lphone=="")
{
$code14="Enter Landline no";
}
if($mbno=="")
{
$code5="Enter Mobile no";
}
if($email=="")
{
$code6="Enter Email ";
}
if($address=="")
{
$code7="Enter Address";
}
if($tinno=="")
{
$code8="Enter Tinno";
}
if($enrolldate=="")
{
$code9="Enter enrolldate";
}
if($applyfor=="")
{
$code10="Enter applyfor";
}
if($duration=="")
{
$code11="Enter duration";
}
if($charge=="")
{
$code12="Enter charge";
}
if($nop=="No of persons")
{
$code13="Enter no of persons";
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
move_uploaded_file($file_tmp,"uploads/agency/".$newFilePath);
}
// else 
// {
// $newFilePath="";
// }

if($_FILES['excelfile']['name']!=""){

$file_name_all_new="";
	            for($i=0; $i<count($_FILES['excelfile']['name']); $i++) 
	            {
	                   $tmpFilePath = $_FILES['excelfile']['tmp_name'][$i];    
	                   if ($tmpFilePath != "")
	                   {    
	                       $path1 = "uploads/agency/";
	                       $name2 = $_FILES['excelfile']['name'][$i];
	                      $size = $_FILES['excelfile']['size'][$i];
	       
	                       list($txt, $ext) = explode(".", $name2);
						
						
	                       $file1= time().substr(str_replace(" ", "_", $txt), 0);
	                       $info = pathinfo($file1);
	                       $filename1 = $file1.".".$ext;
	                       if(move_uploaded_file($_FILES['excelfile']['tmp_name'][$i], $path1.$filename1)) 
	                       { 
	                          date_default_timezone_set ("Asia/Calcutta");
	                          $currentdate=date("d M Y");
	                          $file_name_all_new.=$filename1.",";
	                       }
	                 
	            }
				}
	            $newExcelFilePath = rtrim($file_name_all_new, ','); //imagepath if it is present    
	        }
	        // else
	        // {
	            // $newExcelFilePath="";
	        // } //multiple end
		

$uagency=$obj->update_agency($agencyid1,$cname,$contactname,$lphone,$mbno,$email,$address,$tinno,$enrolldate,$applyfor,$duration,$charge,$newFilePath,$newExcelFilePath,$nop,$agencytype,$dno);

if($uagency==1)
{
//echo "<script> alert('Security Hired  Successfully');</script>";
 header("location:agency.php");
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
	<?php include("header.php"); ?>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<?php include("leftmenu.php");?>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
		<a href="#" class="add_page_button">Edit Agency <span class="fa fa-plus"></span> </a>
        <div class="clearfix"></div>
		
		<span style="color:red">
		<?php 
		if($_REQUEST['shadd']=="success")
		{
		echo "Agency Created Successfully";
		}
		if($uagency==2)
{
//echo "<script> alert('Security Hired  Successfully');</script>";
//header("location:agency.php");
	echo "Agency Already Exist..";
}
		?>
		</span>
		<?php if($_SESSION['agid']!="")
		{
 $agencyid=$_SESSION['agid'];
 $get_agny_det=$obj->get_company_details($agencyid);
		}
		
		?>
		
		
        <div class="box-content box">
			
		 <?php 
					 while($fetch_agen_det=mysql_fetch_array($get_agny_det))
					 {
					 
			?>
				<div class="col-sm-2">
						     
<img src="uploads/agency/<?php echo  $fetch_agen_det['agency_logo']; ?>" 
width="148px" height="136px" alt="" class="prw_img img-rounded" 
style="  margin-left: 5%;  margin-top: 26%;" id="box" />
      
				 </div>
				 		<div class="col-sm-10">
		
				<form id="defaultForm" method="post" action="" class="form-horizontal" enctype="multipart/form-data">
	
			<div style="color:red" class="col-sm-3"><?php	if(isset($code2)){echo $code2; } ?></div>
			<div style="color:red" class="col-sm-3"><?php	if(isset($code3)){echo $code3; } ?></div>
			<div style="color:red" class="col-sm-3"><?php	if(isset($code4)){echo $code4; } ?></div>
            <div style="color:red" class="col-sm-3"><?php	if(isset($code14)){echo $code14; } ?></div>             
			 <div class="clearfix"></div>      
 <input type="hidden" name="agencyid1" value="<?php echo $fetch_agen_det['agency_id']; ?>" >
    <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Company name" value="<?php echo $fetch_agen_det['agency_companyname']; ?>" id="cname" name="cname" />
			<?php 	if($data567==2)
{
 echo "Company Name already Exist"; }
 ?>
	
					</div>
					<div class="col-sm-3">
		  <select class="selectBox-dropdown" style="padding:3%;" id="agencytype" name="agencytype" >
					   
					   <option value="">Type of Agency</option>
						 <option value="Contract" <?php if ($fetch_agen_det['agency_company_type'] === 'Contract') echo ' selected="selected"'; ?>>Contract</option>
					      <option value="Permanent" <?php if ($fetch_agen_det['agency_company_type'] === 'Permanent') echo ' selected="selected"'; ?>>Permanent</option>
              
                       </select>
						
                     </div>
					
                    <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Contact person name" value="<?php echo $fetch_agen_det['agency_contactname']; ?>" id="contactname" name="contactname" /></div>
                    <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Land phone" value="<?php echo $fetch_agen_det['agency_lphone']; ?>" id="lphone" name="lphone" /></div>
                    <div class="col-sm-3"></div>
                    <div class="clearfix"></div>
                    
			<div style="color:red" class="col-sm-3"><?php	if(isset($code5)){echo $code5; } ?></div>
			<div style="color:red" class="col-sm-3"><?php	if(isset($code6)){echo $code6; } ?></div>
            <div style="color:red" class="col-sm-3"><?php	if(isset($code8)){echo $code8; } ?></div>             
			 <div class="clearfix"></div>
                                   
                    <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Mobile no" value="<?php echo $fetch_agen_det['agency_mobile']; ?>" id="mbno" name="mbno" /></div>
                    <div  style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Email" value="<?php echo $fetch_agen_det['agency_email']; ?>" id="email" name="email" /></div>
                    <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="TIN No" value="<?php echo $fetch_agen_det['agency_tinno']; ?>" id="tinno" name="tinno" /></div>
                    <div class="col-sm-3"></div>
                    <div class="clearfix"></div>
					<div style="color:red" class="col-sm-3"><?php	if(isset($code15)){echo $code15; } ?></div>
            <div style="color:red" class="col-sm-3"><?php	if(isset($code7)){echo $code7; } ?></div>             
			 <div class="clearfix"></div>
                     <div class="col-sm-3"><input type="text" class="form-control" placeholder="Enter Dno" name="dno" value="<?php echo $fetch_agen_det['agency_Dno']; ?>" /></div>
                    <div style="color:red" class="col-sm-3">
		  <div id="locationField">
    	<input type="text"  onFocus="geolocate()" class="form-control" id="autocomplete"
		placeholder="Address" name="address" style="background: url(<?php echo $siteurl;?>pin.png) no-repeat;
  background-color: #fff;  background-position: right center;  background-size: 20px;"  
value="<?php echo $fetch_agen_det['agency_address']; ?>"/>
					
   </div>
				</div>
                    <div class="col-sm-3">
                    <div style="color:red" class="custom-file-upload"><input type="file" 
					placeholder="Upload company logo" id="mufiles" name="myfiles" onChange='readURL(this);'/></div>
                    </div>
				
                    <div class="col-sm-3"></div>
                    <div class="clearfix"></div>
                    <div style="color:red" class="col-sm-3"><?php	if(isset($code9)){echo $code9; } ?></div>
                 <div style="color:red" class="col-sm-3"><?php	if(isset($code13)){echo $code13; } ?></div>             
			       <div class="clearfix"></div>
                    
                    <div style="color:red" class="col-sm-3">
					<input type="text" class="datepicker form-control search_by_date" data-date-format="yyyy-mm-dd"
					placeholder="Enrollment date" style="  background-position: 226px 9px;"
					value="<?php echo $fetch_agen_det['agency_enrolldate']; ?>" id="enrolldate" name="enrolldate" />
					</div>
                    <div style="color:red" class="col-sm-3"><input type="text" class="form-control"
					placeholder="Number of persons" value="<?php echo $fetch_agen_det['agency_nop']; ?>"
					id="nop" name="nop" /></div>
                     <div class="col-sm-3">
                     <div class="custom-file-upload"><input type="file"  placeholder="Upload excel"
					 id="excelfile" name="excelfile[]"  /></div>
                     </div>
					 <div>
					 <?php
					if($fetch_agen_det['agency_excelfile']!='')
					 {
					?>	 
				
<a href="<?php echo $siteurl;?>uploads/agency/<?php echo  $fetch_agen_det['agency_excelfile']; ?>">
Download uploaded file</a></div>
                 <?php
	 }
					 ?>				 

				  <div class="clearfix"></div>
                    <div style="color:red" class="col-sm-3"><?php	if(isset($code10)){echo $code10; } ?></div>
			<div style="color:red" class="col-sm-3"><?php	if(isset($code11)){echo $code11; } ?></div>
            <div style="color:red" class="col-sm-3"><?php	if(isset($code12)){echo $code12; } ?></div>             
			 <div class="clearfix"></div>
                     <div style="color:red"class="col-sm-3"><input type="text" class="form-control" placeholder="Accation for" value="<?php echo $fetch_agen_det['agency_applyfor']; ?>" name="applyfor" id="applyfor" /></div>
                    <div style="color:red"class="col-sm-3"><input type="text" class="form-control" placeholder="Duration" value="<?php echo $fetch_agen_det['agency_duration']; ?>" name="duration" id="duration" /></div>
                    <div style="color:red"class="col-sm-3"><input type="text" class="form-control" placeholder="Charges for per person" value="<?php echo $fetch_agen_det['agency_charges']; ?>"  name="charge" id="charge"  /></div>
                    <div class="col-sm-3"></div>
                    <div class="clearfix"></div>
                     <br>         
                    <div class="col-sm-offset-3 col-sm-2 text-center">
              <input type="submit" class="btn btn-danger" name="hire" value="Update"/> 
				  
                    </div>
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
				<?php 
				} 
				?>	
				</form>
           </div>
		   <div class="clearfix"></div>
			</div>
      	
			 <div class="clearfix"></div>
     			<div class="delresult"> </div>
                
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
function funaddstaff(agencyid) {
	//alert(agencyid);
$('#sessiondata').load('agency_det.php?id='+agencyid);
window.location.replace('SecurityManagement_AddPersonal.php');

}
</script>


<script>
function fundel(delagencyid)
{
//alert(delid);
$.post("delete_agency.php",{delagencyid:delagencyid},function(data) { location.reload();
//$(".delresult").html(data);
});

}
</script>

<script>
function funeditagency(cname,agid,contactname)
{
// alert(agid);
$('#sessiondata').load('agency_det.php?id='+agencyid);
 window.location.replace('agency_edit.php');

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
                
                $('.input-daterange').datepicker({
                    orientation: "top auto"
                });
            
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
<?php include("footer.php"); ?>
<script src="js/footer_js.js"></script>
</body>
</html>
