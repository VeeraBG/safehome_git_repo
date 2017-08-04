<?php
$page="owner";
include_once('dbFunction.php');
 $obj = new dbFunction();
 $owner_id=$_SESSION['editownerid'];

$get_owner=$obj->get_owner_details($owner_id);

$get_blocks=$obj->getblock_details();

$code1="";$code2="";$code3="";$code4="";$code5="";$code6="";$code7="";$code8="";
if(isset($_POST['editowner']))
{
$block=$_POST['block'];
$get_floor=$obj->getfloor_detailsbyblock($block);
$floor=$_POST['floor'];
$flat=$_POST['flat'];
$name=$_POST['name'];
 $lname=$_POST['lname'];
 $lphone=$_POST['lphone'];

$mbno=$_POST['mbno'];
$occupation=$_POST['occupation'];
$nop=$_POST['nop'];



$bloodgroup=$_POST['bloodgroup'];
$sqft=$_POST['sqft'];


$person=$_POST['person1'];
$person1=serialize($person);
$addpersonsmbno=$_POST['addpersonsmbno'];
$add_mobile_persons=serialize($addpersonsmbno);
$age=$_POST['age'];
$add_age_persons=serialize($age);
$doc=$_POST['doc'];
$len = strlen($mbno);
if($block=="" || $floor=="" || $flat=="" || $name=="" || $lname=="" || $lphone=="" || $mbno=="" ||  $occupation=="" || $nop=="" || $doc=="")
{

  if($block=="" || $floor=="" || $flat=="" )
  {
  $code1="Select the Block,Floor and Flat ";
  }
 if($name=="")
  {
  $code2="Enter First Name";
  }
if($lname=="")
  {
  $code3="Enter Last Name";
  } 
if($lphone=="")
  {
  $code4="Enter Landline";
  }
 if($mbno=="" || $len!=10 || !is_numeric($mbno))
   {
      $code5="Please Enter a Valid Mobile number";
   }
if($occupation=="")
  {
  $code6="Enter occupation";
  } 
  
  if($nop=="")
  {
  $code7="Enter No of persons";
  } 
  if($doc=="")
  {
  $code8="Please Enter Date of occupence";
  } 
   
  }
	 
else
{
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


move_uploaded_file($file_tmp2,"uploads/owner_gallery/".$newFilePath2);

}
else
{
$newFilePath2="";
}
//echo $newFilePath2;
//exit;
$edit_o=$obj->edit_owner($name,$lname,$mbno,$lphone,$occupation,$add_mobile_persons,$add_age_persons,$nop,$person1,$block,$floor,$flat,$doc,$owner_id,$newFilePath2,$bloodgroup,$sqft) or die(mysql_error());
if($edit_o==1)
{
$url="view_owner123.php";
//header("location:view_owner123.php");
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
<!---
<script>
function showFloor1(str,floor) {  

//alert(str,floor+"hfvb");
$.post("get_data.php",{str:str,floorid:floor},function(data) {  //location.reload();
//alert(data);
  $("#floor").html(data);
});
}
</script>
<script>
function showflat1(str,floor,flat) {  
//alert(str,floor,flat);
$.post("get_data.php",{str:str,floorid:floor,flatid:floor},function(data) {  //location.reload();
//alert(data);
 $("#flat").html(data);
});
}
</script>-->
<script>
function showFloor(str) {  
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
//alert(data );
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
  
        <div class="clearfix"></div>
		

        <div class="box-content box">
		<?php 
		
		$get_own=mysql_fetch_array($get_owner);
		
		?>
			<div class="col-sm-2">
    
					<div >
					
					<img class="prw_img img-rounded"
					src="<?php if($get_own['owner_image']!=''){echo  "uploads/owner_gallery/".$get_own['owner_image'];}
else { echo "img/profile-icon.png";} ?>" height="136" width="148" style="  margin-left: 5%;  margin-top: 26%;" id="box" /></div> 

      
				 </div>
				 		<div class="col-sm-10">
		
				<form id="" method="post" action="" class="form-horizontal"  enctype="multipart/form-data">
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
					<script>
					var blockid=<?php echo $get_own['owner_block']?>;
					var floor=<?php echo $get_own['owner_floor']?>;
								var flat=<?php echo $get_own['owner_flat']?>;
				//alert(flat);
					///showflat1(blockid,floor,flat);
 //showFloor1(blockid,floor);	
	
			</script>

                    <select class="selectBox selectBox-dropdown"  id="block123" style='padding:3.5%;'  name="block" 
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
                    	<?php 
						$bloid=$get_own['owner_block'];
						$sqlflo=mysql_query("select *from floor where floor_block_id='$bloid'");
						while($gfr=mysql_fetch_array($sqlflo)) 
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
                    <div class="col-sm-3" id='flat'>
                     <select  class="selectBox selectBox-dropdown"   style='padding:3.5%;'  name="flat">
                    	<option >Select Flat</option>
                    	<?php 
						$floid=$get_own['owner_floor'];
						$blockid=$get_own['owner_block'];
						$sqlfet=mysql_query("select *from flat where flat_block_id='$bloid' AND flat_floor_id='$floid' " );
						while($flatfet=mysql_fetch_array($sqlfet)) {
                                
						?>
<option value="<?php echo $flatfet['flat_id'];?>" 
<?php 
if($flatfet['flat_id']==$get_own['owner_flat'])
 {
 echo 'selected="selected"';
} ?> > <?php echo $flatfet['flat_name'];?></option>
                   
                       
                      <?php } ?>
                       </select>
                    </div> <div class="clearfix"></div>
 <div  style="color:red" class="col-sm-3"><?php	if(isset($code2)){echo $code2; } ?></div>	
<div  style="color:red" class="col-sm-3"><?php	if(isset($code3)){echo $code3; } ?></div>						
<div  style="color:red" class="col-sm-3"><?php	if(isset($code4)){echo $code4; } ?></div>						
<div class="clearfix"></div>
<div class="col-sm-3">
<input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $get_own['owner_name']; ?>" /></div>
<div class="col-sm-3"><input type="text" class="form-control" placeholder="Last name" name="lname" value="<?php echo $get_own['owner_lname']; ?>" /></div>
<div class="col-sm-3"><input type="text" class="form-control" placeholder="Land phone" name="lphone" value="<?php echo $get_own['owner_land_phone']; ?>" /></div>
<div class="clearfix"></div>

<div class="col-sm-3"><input type="text" class="form-control" placeholder="Blood Group" name="bloodgroup" value="<?php echo $get_own['owner_blood_group']; ?>" /></div>
<div class="col-sm-3"><input type="text" class="form-control" placeholder="Total Square Feet for Flat" name="sqft" value="<?php echo $get_own['owner_sqft']; ?>" /></div>
<div class="clearfix"></div>

 <div  style="color:red" class="col-sm-3"><?php	if(isset($code5)){echo $code2; } ?></div>	
<div  style="color:red" class="col-sm-3"><?php	if(isset($code6)){echo $code3; } ?></div>						
<div  style="color:red" class="col-sm-3"><?php	if(isset($code7)){echo $code4; } ?></div>						
<div class="clearfix"></div>                   
                                   
<div class="col-sm-3"><input type="text" class="form-control" placeholder="Mobile no" name="mbno" value="<?php echo $get_own['owner_mobile']; ?>"/></div>

<div class="col-sm-3"><input type="text" class="form-control" placeholder="occupation" name="occupation" value="<?php echo $get_own['owner_occupation']; ?>"/></div>
<div class="col-sm-3"><input type="text" class="form-control" placeholder="No of persons" name="nop" value="<?php echo $get_own['owner_no_persons']; ?>"/>  </div>                
 <div class="clearfix"></div>

<?php 
 $var1 = unserialize($get_own['owner_addpersonsmbno']);
$var2 = unserialize($get_own['owner_person1_name']);
$var3 = unserialize($get_own['owner_age']); 
 for($i=0;$i<count($var1); $i++)
 { 
 if($var1[$i]!=""){
 
 ?>
			   
				    <div  class="col-sm-3">
				   <input type="text" class="form-control" placeholder="Persons Name" name="person1[]" 
				   value="<?php echo  $var2[$i]; ?>"  /><span style="color:red"><?php	if(isset($code10)){echo $code10; } ?>
				   </span></div> 
				   <div  class="col-sm-3">
				   <input type="text" class="form-control" placeholder="Mobile" name="addpersonsmbno[]" 
				   value="<?php echo  $var1[$i]; ?>"  /><span style="color:red"><?php	if(isset($code10)){echo $code10; } ?>
				   </span></div> 
				    <div  class="col-sm-3">
				   <input type="text" class="form-control" placeholder="Age" name="age[]" 
				   value="<?php echo  $var3[$i]; ?>"  /><span style="color:red"><?php	if(isset($code10)){echo $code10; } ?>
				   </span> </div> 
	   
<?php }}
				   ?>  
                       <button class="btn btn2_blank btn2 wid_auto"> <span class="fa fa-plus"></span> </button>                                   
              
                  <!-- 	<a href="#"  class="input_outer"> <span class="fa fa-plus"></span> </a>-->
                 
				  
				    <div class="clearfix"></div>
					</div>
					<div class="row">
					  <div  style="color:red" class="col-sm-3"><?php	if(isset($code8)){echo $code8; } ?></div>
                   <div class="col-sm-3">
				   <div class="custom-file-upload">
				   <input type="file"  placeholder="Upload Image" name="img"  
				   onChange='readURL(this);'/></div>
            </div>  
	
		
					
                
                   
                    <div class="col-sm-3">
<input type="text" class="datepicker form-control search_by_date" data-date-format="yyyy-mm-dd" placeholder="Date of occupancy"
 id="datepicker" name="doc"  value="<?php echo $get_own['owner_date_occupancy']; ?>"  style="  background-position: 226px 9px;"/></div>
               
					<div class="col-sm-9"></div>
                    <div class="clearfix"></div>
                    <div class="col-sm-4"></div>
                    <div class="col-sm-3">
			
                    <input type="submit" class="btn btn-danger" name="editowner" value="Update" >
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
<script>
var id='1'; // set default id for first img tag
       function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.prw_img').attr('src', e.target.result).width(105).height(100);
                                       
            $('#img_'+ id).attr('src', e.target.result).width(105).height(100);
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
