<?php
$page="flat";
 include_once('dbFunction.php');
 $obj = new dbFunction();
$ss=$obj->getblock_details();
$sss=$obj->getfloor_details();
		
	$ss2=$obj->getflatbyfloorblock();	
//$ss3=$obj->getflatbyfloor();	
$code1="";$code2="";$code3="";
if(isset($_POST['save']))
{

$blockid=$_POST['flat_block'];
$floorid=$_POST['flat_floor'];
$flatname=$_POST['flat'];
if($blockid=="" || $floorid=="" || $flatname=="")
{

$code1="Select Block,Floor and Enter Flat ";
}
else
{
$qq=$obj->add_flat($blockid,$floorid,$flatname);

if($qq==1)
{
header("Location:add_flat.php");
}
else
{
$error="Flat Name Already Exist";
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
		<?php include("top_header.php"); ?>
		<body>
<!--Start Header-->
<script>



</script>
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
<header class="navbar" >
	<?php include("header.php")?>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<?php include("leftmenu.php"); ?>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
		
		
	
        <div class="clearfix"></div>
        <div class="box-content box">
		
				<form id="defaultForm" method="post" action="" class="form-horizontal" enctype="multipart/form-data">
					
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
                    
					
					<div  class="col-sm-3">
					<span style="color:red">
                    <?php
					 if(isset($code1))
					 { 
					 echo $code1;
					 } 
					 ?></span></div>
					 <div  class="col-sm-3">
					<span style="color:red">
                    <?php
					 if(isset($code2))
					 { 
					 echo $code2;
					 } 
					 ?></span></div>
					 <div  class="col-sm-3">
					<span id="flat12" style="color:red">
                    <?php
					 if(isset($code3))
					 { 
					 echo $code3;
					 } 
					 ?></span></div>
					
					<div class="clearfix"></div>
               <div style="color:red" class="col-sm-3">
   
<select name="flat_block" class="selectBox selectBox-dropdown" style='padding:3.5%;' id="blocknam123e"
  onChange='showflat(this.value)'>
			<option selected='true' value=""> Select block</option>
			 	<?php 
				if($ss>0)
				{
				
				while($get_rec=mysql_fetch_array($ss))
				{
											
				?>
	 <option value="<?php echo $get_rec['block_id']; ?>"><?php echo $get_rec['block_name']; ?></option></td>  
		
						<?php 
						}
						}
						?>
						</select>
					
					
					</div>
					<div  class="col-sm-3">
		   <span id="floor"></span>		
					
					</div>
					
<div style="color:red;display:none;" class="col-sm-3" id="flat" >
<input type="text" clas="" id="flaatname" name="flat" class="form-control" 
placeholder="flat Name"  value=""/>
<?php	if($error!="") { echo $error; }?>
</div>
                   
                                       
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
					<br>
		<div class="col-sm-offset-5 col-sm-2 text-center">
					
<input type="submit" name="save" id="save" class="btn btn-danger" value="Save" style="display:block;"/>
<input type="button" name="update" id="update"  class="btn btn-danger" value="update" onClick="func2()" style="display:none;"/>
                    </div>
				</form>
                 <div class="clearfix"></div>
			</div>
			
			 <div class="clearfix"></div>
	
			 <table class="table_st_1" style="width:36%;">
                	<tr>
                    	<th>Block Name</th>
						<th>Floor Name</th>
						<th>Flat Name</th>
						<th>Edit</th>
								<th>Delete</th>
						</tr>
			
			 	<?php 
		
				while($get_recc=mysql_fetch_array($ss2))
				{
			
	         
				?>
			
	<tr>
          <td><?php echo $get_recc['block_name']; ?></td>
		  <td><?php echo $get_recc["floor_name"];?></td> 
		  <td><?php echo $get_recc['flat_name'];?></td>
<td><i class="fa fa-edit" onClick="fun1('<?php echo $get_recc['floor_block_id'];?>','<?php echo $get_recc['floor_id'];?>','<?php echo $get_recc['flat_id'];?>','<?php echo $get_recc["flat_name"];?>');"></i></td>
<td><i class="fa fa-times"  onclick="fundelete('<?php echo $get_recc['flat_id'];?>');"></i></td>
						</tr>
						<?php
						}
						
				
						?>
						</table>
     			
                
		</div>
		
		</div>
		
		<!--End Content-->
		

</div>
<!--End Container-->
<div class="result"> </div>
<div class="delresult"> </div>

<script>
function showflat(block_id)
{
//alert(block_id);
$.post("get_flat.php", {blockid:block_id}, function(result){
//alert(result);
        $("#floor").html(result);
		 $("#flat").show();
    });

}
</script>


<script>

function fun1(blockid,floorid,flatid,flatname)
{
$('#save').hide();

$('#update').show();

if($("#blocknam123e option[value='"+blockid+"']").length > 0)
{
	$("#blocknam123e option[value='"+blockid+"']").attr('selected','selected');
}

showflat(blockid);


	$("#blockfloor123 option[value='"+floorid+"']").attr('selected','selected');
	

  $('#flaatname').attr("value",flatname);    

  $('#flaatname').attr("clas",flatid);   


}
</script>

<script>

function func2()
{
 var id= $('#flaatname').attr("clas"); 
  var flatname=$('#flaatname').val(); 
  var blockname=$('#blocknam123e').val();
var floorname=$('#blockfloor123').val();  
  
//alert(id+'...'+flatname);

$.post("edit_flat.php",{flat_id:id,flat_name:flatname,floorname:floorname,blockname:blockname},function(data) {
 //location.reload();
//alert(data);
$("#flat12").html(data);
 //$( ".result" ).html('MY ID is - '+data );
});


}
</script>

<script>
function fundelete(delid)
{
//alert(delid);
$.post("delete_flat.php",{flat_id:delid},function(data) {
 location.reload();
$(".delresult").html(data);
});

}
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
/*	  $(document).ready(function(){
            $('select').selectBox({ mobile: true });
		});
		*/
</script>
<?php include("footer.php"); ?>
<script src="js/footer_js.js"></script>
</body>
</html>
