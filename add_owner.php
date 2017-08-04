<?php
$page="owner";
include_once('dbFunction.php');
 $obj = new dbFunction();
 $aprtment_id=1;
 
$get_blocks=$obj->getblock_details();
$code1="";$code2="";$code3="";$code4="";$code5="";$code6="";$code7="";$code8="";$code9="";$code10="";$code11="";$code12="";$code13="";$code14="";$code15="";$code16="";$code17="";$code18="";$code19="";

if(isset($_POST['owner']))
{
$block=$_POST['block'];
$floor=$_POST['floor'];
$flat=$_POST['flat_floor'];
$ownertenant=$_POST['ownertenant'];
$flatstatus=$_POST['flatstatus'];
$name=$_POST['name'];
$lname=$_POST['lname'];
$lphone=$_POST['lphone'];
$mbno=$_POST['mbno'];
$email=$_POST['email'];
$occupation=$_POST['occupation'];
$nop=$_POST['nop'];
$slot1=$_POST['slot1'];
$slot2=$_POST['slot2'];

$bloodgroup=$_POST['bloodgroup'];
$sqft=$_POST['sqft'];


$person1=$_POST['person1'];
 $no_persons=serialize($person1);

//$add_person = implode(",", $_POST['person1']);

//echo $add_person;

$addpersonsmbno=$_POST['addpersonsmbno'];
$add_mobile_persons=serialize($addpersonsmbno);

//$addpersons_mbno = implode(",", $_POST["addpersonsmbno"]);

$age=$_POST['age'];
$add_age_persons=serialize($age);


// for($i=0;$i<count($age);$i++)
// {
// for($i=0;$i<count($person1);$i++)
// {
// for($i=0;$i<count($addpersonsmbno);$i++)
// {
// $asarray['person'][$i]=$person1[$i];
// $asarray['age'][$i]=$age[$i];
// $asarray['mobile'][$i]=$addpersonsmbno[$i];

// }
// }

//}
//print_r($asarray);
//$add_age = implode(",", $_POST['age']);
//echo $add_age;

$doc=$_POST['doc'];
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];


$len = strlen($mbno);
//echo $addpersonS_mbno;
 
// print_r($_POST);
 //exit;


if($slot1=="" || $block=="" || $floor=="" || $flat=="" || $slot2=="" || $ownertenant=="" || 
$flatstatus=="" ||  $pass=="" || $cpass=="" || $name=="" || $lname=="" ||
 $lphone=="" || $mbno=="" || $email=="" || $occupation=="" || $nop=="" || $doc=="" || $bloodgroup=="" || $sqft=="")
{
if($slot1=="")
  {
  $code22="Enter Parking Slot ";
  }
  if($slot2=="")
  {
  $code21="Enter Parking Slot  ";
  }
  
  if($bloodgroup=="")
  {
  $code22="Enter Blood Group ";
  }
  if($sqft=="")
  {
  $code21="Enter Parking SlotSquare feet for flat";
  }
  
  if($block=="" || $floor=="" || $flat )
  {
  $code1="Select the Block,Floor and Flat ";
  }
  if($ownertenant=="")
  {
  $code2="Select the owner OR tenant";
  } 
  if($flatstatus=="")
  {
  $code3="Select the flat status";
  } 
  if($name=="")
  {
  $code4="Enter First Name";
  }
if($lname=="")
  {
  $code5="Enter Last Name";
  } 
if($lphone=="")
  {
  $code6="Enter Landline";
  }
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
{
       $code8= "Invalid email format"; 
  }  

 if($mbno=="" || $len!=10 || !is_numeric($mbno))
   {
      $code7="Please Enter a Valid Mobile number";
   }
 
if($email=="")
  {
  $code8="Enter Email";
  } 
if($occupation=="")
  {
  $code9="Enter occupation";
  } 
  
  if($nop=="")
  {
  $code10="Enter No of persons";
  } 
  if($person1=="")
  {
  $code11="Enter person Name";
  } 
    if($doc=="")
  {
  $code13="Please Enter Date of occupence";
  } 
  if($pass != $cpass)
  {
  $code14="Password not match";
  }
  if($pass=="" || $cpass="")
  {
  $code15="Enter password";
  }
  if($email!="")
  {
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
{
       $code8= "Invalid email format"; 
  }
}  
  }
	 
else
{
if($pass != $cpass)
{
$code14="Password not match";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
{
       $code8= "Invalid email format"; 
  }
if($len!=10 || !is_numeric($mbno))
   {
      $code7="Please Enter a Valid Mobile number";
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
move_uploaded_file($file_tmp,"uploads/owner_gallery/".$newFilePath);
}
else 
{
$newFilePath="";
}

$data=$obj->create_owner($flatstatus,$ownertenant,$block,$floor,$flat,$name,$lname,$lphone,$mbno,$email,$occupation,$nop,$no_persons,$add_age_persons,$doc,$pass,$newFilePath,$add_mobile_persons,$slot1,$slot2,$bloodgroup,$sqft,$aprtment_id);

if($data==1)
{
// echo "<script> alert('Owner Created Successfully');</script>";
 header("location:add_owner.php?oadd=success");
}
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
<!--image view-->
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
<div id="main" class="container-fluid">
	<div class="row">
		<?php include("leftmenu.php"); ?>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
		<a href="#" class="add_page_button">add Owner <span class="fa fa-plus"></span> </a>
     
        <div class="clearfix"></div>
		
		<span style="color:red">
		<?php 
		if($_REQUEST['oadd']=="success")
		{
		echo "Owner Created Successfully";
		}
		if($_REQUEST['msg']=="exceladded")
		{
		echo "Records Added Successfully";
		}if($_REQUEST['oadd']=="emailexist")
		{
		echo "Email(s) Already Exist";
		}if($_REQUEST['oadd']=="allfields")
		{
		echo "Please fill all Mandatory Fields";
		}
			
		?>
		</span>
		
		<?php
		//header("location:add_owner.php?oadd=success");<div id="owner" style="color:red"></div>
		
		?>
		
	
		<div id="status" style="color:red"></div>
        <div class="box-content box">
		<div class="row" >
		 <div class="col-sm-5" >
		 <a href="#" style="font-size:22px;">Upload Excel File:</a>
<a href="<?php echo $siteurl;?>discussdesk.xlsx">[ Download Sample Excel Sheet ]</a></div> 
		  </div><div class="clearfix"></div>
		  <br>
		 		<div class="row" >
		 <div class="col-sm-3" ><div class="clearfix"></div>
		 <form action="excel.php" method="post" enctype="multipart/form-data">
<input type="file" name="file" id="file" />
</div>  
<div class="col-sm-9">
		<br/><br/><br/>
        </div> 
		<br>
		<div class="col-sm-offset-4 col-sm-2 text-center">
<input type="submit" class="btn btn-danger" name="submit" value="upload" ></form>
</div>
</div>
<div class="clearfix"></div>
<hr/>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-sm-2">
						     
<img src="img/profile-icon.png" width="148px" height="136px" alt="" class="prw_img img-rounded" 
style="  margin-left: 5%;  margin-top: 26%;" id="box" />
      
				 </div>
				 		<div class="col-sm-10">
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
					 					<div class="col-sm-4">
			<div  style="color:red" class="col-sm-5"><?php	if(isset($code22)){echo $code22; } ?></div>	
			<div  style="color:red" class="col-sm-5"><?php	if(isset($code21)){echo $code21; } ?></div>	
				</div>
				<div class="clearfix"></div>
<div class="col-sm-3">
		 <div id="owner">
				 <select class="selectBox selectBox-dropdown" style='padding:3.5%;' name="ownertenant" >
					   	<option value="">Select Owner OR Tenant</option>
					     <option value="Owner">Owner</option>
						 <option value="Tenant">Tenant</option>
                   </select>
				   </div>
					</div>
					<div class="col-sm-3">
					 <!--onChange="showstatus(this.value)"--->
				 <select class="selectBox selectBox-dropdown" style='padding:3.5%;' name="flatstatus" >
					   	<option value="">Select Vacant or Occupied</option>
					     <option value="Vacant">Vacant</option>
						 <option value="Occupied" >Occupied</option>
                   </select>
					</div>
					<div class="col-sm-4">
					<div  style="color:red" class="col-sm-5"><input type="text" class="form-control" placeholder="parking slot1 " name="slot1" />
					</div>
					<div  style="color:red" class="col-sm-5"><input type="text" class="form-control" placeholder="parking slot2 " name="slot2" />
					</div></div>
					<div class="clearfix"></div>
					
						<div class="col-sm-4">
					<div  style="color:red" class="col-sm-5"><input type="text" class="form-control" placeholder="Blood Group" name="bloodgroup" />
					</div>
					<div  style="color:red" class="col-sm-5"><input type="text" class="form-control" placeholder="Total Square Feet for Flat" name="sqft" />
					</div></div>
					<div class="clearfix"></div>
					
					
				<div class="col-sm-3"></div>
                    <div class="clearfix"></div>
					<div  style="color:red" class="col-sm-3"><?php	if(isset($code4)){echo $code4; } ?></div>
					<div  style="color:red" class="col-sm-3"><?php	if(isset($code5)){echo $code5; } ?></div>
					<div  style="color:red" class="col-sm-3"><?php	if(isset($code6)){echo $code6; } ?></div>
				 <div class="clearfix"></div>
                    <div style="color:red" class="col-sm-3">
					
					<input type="text" class="form-control" placeholder="Name" name="name" />
					</div>
                    <div  style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Last name" name="lname" />
					</div>
                    <div  style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Intercom" name="lphone" />
					</div>
                    <div class="col-sm-3"></div>
                    <div class="clearfix"></div>
                    <div  style="color:red" class="col-sm-3"><?php	if(isset($code7)){echo $code7; } ?></div>
                     <div  style="color:red" class="col-sm-3"><?php	if(isset($code13)){echo $code13; } ?></div>        
                      <div  style="color:red" class="col-sm-3"><?php	if(isset($code9)){echo $code9; } ?> </div> 
							  <div class="clearfix"></div>
                        
                    <div  style="color:red" class="col-sm-3"><input type="text" class="form-control" 
					placeholder="Mobile no" name="mbno" />
					</div>
                    <div style="color:red" class="col-sm-3">

					<input type="text" class="datepicker form-control search_by_date" data-date-format="yyyy-mm-dd"
					placeholder="Date of occupancy" id="datepicker" name="doc" style="  background-position: 226px 9px;"/>
                    </div>
                    <div  style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="occupation" name="occupation" />
					</div>
                    <div class="col-sm-3"></div>
                    <div class="clearfix"></div>
                    <div class="col-sm-3">
					  <span style="color:red">
					 <?php
					 if(isset($code10))
					 { 
					 echo $code10;
					 } 
					 ?>
					 </span></div>
					 <div  style="color:red"class="col-sm-3">  <?php	if(isset($code18)){echo $code18; } ?></div>
					 <div  style="color:red"class="col-sm-2"> <?php	if(isset($code19)){echo $code19; } ?></div>
					 <div  style="color:red"class="col-sm-2"> <?php	if(isset($code17)){echo $code17; } ?></div>
                        <div class="clearfix"></div>
                      <div class="col-sm-3">
					<input type="text" class="form-control" placeholder="Select No of Persons" name="nop" />
                    					</div>
                    <div  style="color:red"class="col-sm-3"> <input type="text" class="form-control" placeholder="Person name" name="person1[]"  /> </div>
                     <div style="color:red" class="col-sm-2"><input type="text" class="form-control" placeholder="Mobile no"  name="addpersonsmbno[]" /></div>
                        <div style="color:red" class="col-sm-1"><input type="text" class="form-control" placeholder="AGE" name="age[]"  /></div>
                    
                      <div class="col-sm-3">
                  		<!-- <a href="#"  class="input_outer"> <span class="fa fa-plus"></span></a> -->
                  		<!-- <button class="btn btn2_blank btn2 wid_auto" onclick="return addPerson();"> <span class="fa fa-plus"></span></button> -->
                  		<div class="plus"><span class="fa fa-plus" onclick="return addPerson();"></span></div>
                  		<input type="hidden" id="counter_txt" value="1" />
                    </div>

                    <!-- NEW PERSONS ADDED WILL BE APPENDED INTO THIS DIV -->
                    <div id="newPersons_div" class='col-sm-12' style="padding:0px; margin:0px;"></div>


                    <div class="clearfix"></div>     
                    <div style="color:red" class="col-sm-3"><?php	if(isset($code8)){echo $code8; } ?></div>  
<div style="color:red" class="col-sm-3"><?php	if(isset($code15)){echo $code15; } ?></div>  
<div style="color:red" class="col-sm-3"><?php	if(isset($code14)){echo $code14; } ?></div>  					
                    <div class="clearfix"></div>    
					<div style="color:red" class="col-sm-3"><input type="text" class="form-control" 
					placeholder="Email" name="email" />
					</div>
					
			  <div  style="color:red" class="col-sm-3"><input type="password" class="form-control" 
			  placeholder="Enter Password" name="pass" />
					</div>
                    <div style="color:red" class="col-sm-3"><input type="password" class="form-control"
					placeholder="Enter confirm password" name="cpass" />
					</div>
				  <div class="clearfix"></div>	
					
				 	<div class="col-sm-3">
<div  id="choose">

   <div class="custom-file-upload">
   <input type="file"  placeholder="Upload Image" name="myfiles" onChange='readURL(this);' /></div>

					</div>
                 
                    </div>
					<div class="col-sm-9">
		<br/><br/><br/><br/>
        </div> 
		<br>
		<div class="col-sm-offset-3 col-sm-2 text-center" style="    margin-left: 202px;">
                    <input type="submit" class="btn btn-danger" name="owner" value="Save" >
                    </div>
                   
                    <div class="clearfix"></div>
					
				</form>	
				
				</div>
                 <div class="clearfix"></div>
			</div>
        
        
  
			
		</div>
		<!--End Content-->
	</div>
</div>
<!--End Container  -->

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
function showstatus(fstatus) {  
//alert(flatid);
var blockid=$('#block123').val();
var floorid=$('#floor123').val();
var flatid=$('#blockfloor123').val();
//alert(floorid);
//alert(flatid);

$.post("get_ownerstatus.php",{flatid:flatid,blockid:blockid,floorid:floorid,fstatus:fstatus},function(data) {  //location.reload();
 //$( ".result" ).html('MY ID is - '+data );
  $("#status").html(data);

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
<?php include("footer.php"); ?>
<script src="js/footer_js.js"></script>
</body>
</html>
