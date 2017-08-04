<?php
$page="owner";
include_once('dbFunction.php');
 $obj = new dbFunction();
$owner_id=$_SESSION['editpersonid'];

$get_owner=$obj->get_owner_details($owner_id);

$get_blocks=$obj->getblock_details();


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

$person=$_POST['person1'];
$person1=serialize($person);
$addpersonsmbno=$_POST['addpersonsmbno'];
$add_mobile_persons=serialize($addpersonsmbno);
$age=$_POST['age'];
$add_age_persons=serialize($age);
$doc=$_POST['doc'];
$edit_o=$obj->edit_owner($name,$lname,$mbno,$lphone,$occupation,$add_mobile_persons,$add_age_persons,$nop,$person1,$block,$floor,$flat,$doc,$owner_id) or die(mysql_error());
if($edit_o==1)
{
header("location:view_owner123.php");
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
 $("#floor").html(data);
});



}

</script>
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
		
				<form id="" method="post" action="" class="form-horizontal">
					<div class="col-sm-3">
					<script>
					var blockid=<?php echo $get_own['owner_block']?>;
					var floor=<?php echo $get_own['owner_floor']?>;
								var flat=<?php echo $get_own['owner_flat']?>;
				//alert(flat);
					showflat1(blockid,floor,flat);
 showFloor1(blockid,floor);	
		
		
			</script>

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
                    <div class="col-sm-3">
                     <select  class="selectBox selectBox-dropdown"   style='padding:3.5%;'  name="flat">
                    	<option >Select Flat</option>
                    	<?php 
						
						$sqlfet=mysql_query("select *from flat");
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
                    </div>
                    <div class="col-sm-3"></div>
                    <div class="clearfix"></div>

					 <div class="col-sm-3"><input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $get_own['owner_name']; ?>" /></div>
<div class="col-sm-3"><input type="text" class="form-control" placeholder="Last name" name="lname" value="<?php echo $get_own['owner_lname']; ?>" /></div>
<div class="col-sm-3"><input type="text" class="form-control" placeholder="Land phone" name="lphone" value="<?php echo $get_own['owner_land_phone']; ?>" /></div>
<div class="col-sm-3"></div>
<div class="clearfix"></div>
                    
                                   
<div class="col-sm-3"><input type="text" class="form-control" placeholder="Mobile no" name="mbno" value="<?php echo $get_own['owner_mobile']; ?>"/></div>

<div class="col-sm-3"><input type="text" class="form-control" placeholder="occupation" name="occupation" value="<?php echo $get_own['owner_occupation']; ?>"/></div>
<div class="col-sm-3"><input type="text" class="form-control" placeholder="No of persons" name="nop" value="<?php echo $get_own['owner_no_persons']; ?>"/>  </div>                
 <div class="clearfix"></div>
<div >
<?php 
 $var1 = unserialize($get_own['owner_addpersonsmbno']);
$var2 = unserialize($get_own['owner_person1_name']);
$var3 = unserialize($get_own['owner_age']); 
 for($i=0;$i<count($var1); $i++)
 { 
 if($var1[$i]!=""){
 
 ?>
<div class="row">				   
				    <div  class="col-sm-3">
				   <input type="text" class="form-control" placeholder="Persons Name" name="person1[]" 
				   value="<?php echo  $var2[$i]; ?>"  /><span style="color:red"><?php	if(isset($code4)){echo $code4; } ?>
				   </span></div> 
				   <div  class="col-sm-3">
				   <input type="text" class="form-control" placeholder="Mobile" name="addpersonsmbno[]" 
				   value="<?php echo  $var1[$i]; ?>"  /><span style="color:red"><?php	if(isset($code4)){echo $code4; } ?>
				   </span></div> 
				    <div  class="col-sm-3">
				   <input type="text" class="form-control" placeholder="Mobile NO" name="age[]" 
				   value="<?php echo  $var3[$i]; ?>"  /><span style="color:red"><?php	if(isset($code4)){echo $code4; } ?>
				   </span> </div> 
		</div>		   
<?php }}
				   ?>  </div>
                                                         
              
                  <!-- 	<a href="#"  class="input_outer"> <span class="fa fa-plus"></span> </a>-->
                  <button class="btn btn2_blank btn2 wid_auto"> <span class="fa fa-plus"></span> </button>
                    <div class="clearfix"></div>
                  
                    
                    <div class="col-sm-3">
<input type="text" class="form-control" placeholder="Date of occupancy" id="datepicker" name="doc"
 value="<?php echo $get_own['owner_date_occupancy']; ?>"/></div>
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
