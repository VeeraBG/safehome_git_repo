<?php
$page="owner";
include_once('dbFunction.php');
 $obj = new dbFunction();
$owner_id=$_SESSION['editpersonid'];

$get_owner=$obj->get_owner_details($owner_id);

$get_blocks=$obj->getblock_details();
$block=$_POST['block'];
$get_floor=$obj->getfloor_detailsbyblock($block);

if(isset($_POST['editowner']))
{
$block=$_POST['block'];
$block=$_POST['block'];
$floor=$_POST['floor'];
$flat=$_POST['flat_floor'];
$name=$_POST['name'];
$lname=$_POST['lname'];
$lphone=$_POST['lphone'];
$mbno=$_POST['mbno'];
$email=$_POST['email'];
$occupation=$_POST['occupation'];
$nop=$_POST['nop'];

$person1=$_POST['person1'];

$no_persons=serialize($person1);

//$add_person = implode(",", $_POST['person1']);

echo $add_person;

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
print_r($asarray);
//$add_age = implode(",", $_POST['age']);
echo $add_age;

$doc=$_POST['doc'];
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];




echo $addpersonS_mbno;

// print_r($_POST);
// exit;


if($pass=="" || $cpass=="" || $name=="" || $lname=="" || $lphone=="" || $mbno=="" || $email=="" || $occupation=="" || $nop=="select No Of Persons" || $person1=="" || $age=="" ||$doc=="")
{
  // if($block=="")
  // {
  // $code1="Select The Block";
  // }
  // if($floor=="")
  // {
  // $code2="Select The Floor";
  // } 
  // if($flat=="")
  // {
  // $code3="Select The Flat";
  // } 
  if($name=="")
  {
  $code4="Please Enter First Name";
  }
if($lname=="")
  {
  $code5="Please Enter Last Name";
  } 
if($lphone=="")
  {
  $code6="Please Enter Landline";
  } 
if($mbno=="")
  {
  $code7="Please Enter Mobile no";
  } 
if($email=="")
  {
  $code8="Please Enter Email";
  } 
if($occupation=="")
  {
  $code9="Please Enter occupation";
  } 
  
  if($nop=="select No Of Persons")
  {
  $code10="Please Enter No of person";
  } 
  if($person1=="")
  {
  $code11="Please Enter person";
  } 
  if($age=="")
  {
  $code12="Please Enter Age";
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
 
  }
	 
else
{
if($pass != $cpass)
{
$code14="Password not match";
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


$data=$obj->create_owner($block,$floor,$flat,$name,$lname,$lphone,$mbno,$email,$occupation,$nop,$no_persons,$add_age_persons,$doc,$pass,$newFilePath,$add_mobile_persons,$owner_id);

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
<script>
function showfloor1(str,floor) {  

//alert(str,floor+"hfvb");
$.post("get_data.php",{str:str,floorid:floor},function(data) {  //location.reload();
//alert(data);
  $("#floor").html(data);
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

<script>
function showflat11(str,floor,flat) {  
alert("show flat");
alert(str);
alert(floor);
alert(flat);
$.post("get_data.php",{str:str,floorid:floor,flatid:floor},function(data) {  //location.reload();
//alert(data);
 $("#floor").html(data);
});
}

</script>
<script>
function showflat1(str,floor,flat) {  
alert("show flat");
alert(str);
alert(floor);
alert(flat);
var blockid=$('#block123').val();
//alert(blockid);
$.post("get_flat1.php",{flr:floor,blockid:str},function(data) {  //location.reload();
 //$( ".result" ).html('MY ID is - '+data );
  alert(data);
  $("#flat").html(data);
  
});
}
</script>
<script>
function showfloor(str) {  
// alert(str);
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
		<a href="#" class="add_page_button">Edit Owner <span class="fa fa-plus"></span> </a>
        <a href="#" class="extra_page_button">owner reference code: <span>PJX 00215</span></a>
        <div class="clearfix"></div>
		

        <div class="box-content box">
		<?php 
		
		$get_own=mysql_fetch_array($get_owner);
		
		?>
			<script>
						//alert('flat');
					var blockid=<?php echo $get_own['owner_block']?>;
					var floor=<?php echo $get_own['owner_floor']?>;
								var flat=<?php echo $get_own['owner_flat']?>;
				alert(flat);
					showflat1(blockid,floor,flat);
 showfloor1(blockid,floor);	
		
		
			</script>

				<form id="" method="post" action="" class="form-horizontal" enctype="multipart/form-data">
					<div class="col-sm-3">
				
                    <select class="selectBox selectBox-dropdown"  style='padding:3.5%;'  name="block" 
					onChange="showFloor(this.value)">
                    	<option >Select Block</option>
						<?php 
						
						while($row=mysql_fetch_array($get_blocks))
						{

						?>
<option value="<?php echo $row['block_id'];?>" <?php if($row['block_id']==$get_own['owner_block']){ echo 'selected="selected"';}?>><?php echo $row['block_name'];?></option>
                   
                       
                      <?php } ?>
                       </select>
                    </div>
                    <div class="col-sm-3" id="floor">
                     <select  class="selectBox selectBox-dropdown"  style='padding:3.5%;'  name="floor" 
					 onChange='showflat(this.value)' >
					 <option >Select Floor</option>
                    	<?php while($gfr=mysql_fetch_array($get_floor)) 
						{
                                
						?>
<option value="<?php echo $gfr['floor_id'];?>" 
<?php 
if($gfr['floor_id']==$get_own['owner_floor'])
{
 echo 'selected="selected"';
 } ?> >  <?php echo $gfr['floor_name'];?></option>
                   
                       
                      <?php } ?>
                       </select>
                    </div>
                    <div class="col-sm-3" id="flat">
                     
                    </div>
                    <div class="col-sm-3"></div>
                    <div class="clearfix"></div>
                <div id="owner"></div>
					 <div class="col-sm-3"><input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $get_own['owner_name']; ?>" /></div>
<div class="col-sm-3"><input type="text" class="form-control" placeholder="Last name" name="lname" value="<?php echo $get_own['owner_lname']; ?>" /></div>
<div class="col-sm-3"><input type="text" class="form-control" placeholder="Land phone" name="lphone" value="<?php echo $get_own['owner_land_phone']; ?>" /></div>
<div class="col-sm-3"></div>
<div class="clearfix"></div>
                    
                                   
<div class="col-sm-3"><input type="text" class="form-control" placeholder="Mobile no" name="mbno" value="<?php echo $get_own['owner_mobile']; ?>"/></div>

<div class="col-sm-3"><input type="text" class="form-control" placeholder="occupation" name="occupation" value="<?php echo $get_own['owner_occupation']; ?>"/></div>
<div class="col-sm-3"></div>
<div class="clearfix"></div>
                    
                     <div class="col-sm-3">
<?php
					 
$personsno=$get_own['owner_no_persons'];
?>
       <input type="text" class="form-control" placeholder="No Person" name="nop" 
value="<?php echo $personsno; ?>"/></div>                
                                 
<div class="col-sm-3"><input type="text" class="form-control" placeholder="Person name" name="person1[]"  />   <?php	if(isset($code11)){echo $code11; } ?></div>
                     <div class="col-sm-2"><input type="text" class="form-control" placeholder="Mobile no" name="addpersonsmbno[]" /></div>
                        <div class="col-sm-1"><input type="text" class="form-control" placeholder="AGE" name="age[]" /></div>
                    
                      <div class="col-sm-3">
                  		<!-- <a href="#"  class="input_outer"> <span class="fa fa-plus"></span></a> -->
                  		<!-- <button class="btn btn2_blank btn2 wid_auto" onclick="return addPerson();"> <span class="fa fa-plus"></span></button> -->
                  		<div class="plus"><span class="fa fa-plus" onclick="return addPerson();"></span></div>
                  		<input type="hidden" id="counter_txt" value="1" />
                    </div>

                    <!-- NEW PERSONS ADDED WILL BE APPENDED INTO THIS DIV -->
                    <div id="newPersons_div" class='col-sm-12' style="padding:0px; margin:0px;"></div>
                    
                    <div class="col-sm-3">
<input type="text" class="form-control" placeholder="Date of occupancy" id="datepicker" name="doc"
 value="<?php echo date("d-m-Y", strtotime($get_own['owner_date'])); ?>"/></div>
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
                    
                    <div class="col-sm-3">
					<button type="reset" class="btn">Cancel</button>
                    <input type="submit" class="btn btn-danger" name="editowner" value="Update" >
                    </div>
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
					
				</form>
                 <div class="clearfix"></div>
			</div>
        
        
        Note:<span class="danger">	Residents below the age of 12 will not be desplayed in visitor managment list</span>

			
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
<script src="plugins/jquery/jquery-2.1.0.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<script src='js/jquery-1.9.1.min.js'></script>
<script type="text/javascript" src="js/jquery.selectBox.js"></script>
<link type="text/css" rel="stylesheet" href="css/jquery.selectBox.css"/>

<script type="text/javascript">
		/*  $(document).ready(function(){
            $('select').selectBox({ mobile: true });
		});*/
		
</script>


<?php include("footer.php"); ?>
<script src="js/footer_js.js"></script>
</body>
</html>
