<?php
$page="floor";
 include_once('dbFunction.php');
 $obj = new dbFunction();
$ss=$obj->getblock_details();
$sss=$obj->getfloor_details();
$ss2=$obj->getfloorbyblock();	
$code1="";$code2="";	
if(isset($_POST['save']))
{

$blockname=$_POST['block_floor'];
$floor=$_POST['floor'];
if($blockname=="" || $floor=="")
{
if($blockname=="")
{
$code1="Select Block ";
}
if($floor=="")
{
$code2="Enter Floor Name";
}
}
else
{
$qq=$obj->add_floor($blockname,$floor);
if($qq==1)
{
header("Location:add_floor.php");
}
else
{
$error="floor Name Already Exist";
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
					<div id="floor"style="color:red" class="col-sm-3">
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
					<div class="clearfix"></div> 
               <div  class="col-sm-3">
                	
			<select name="block_floor" id="blocknam123e" class="selectBox selectBox-dropdown" style="padding:3.5%;">
			<option value=""> Select block</option>
			 	<?php 
				if($ss>0)
				{
				
				while($get_rec=mysql_fetch_array($ss))
				{
											
				?>
	 <option value="<?php echo $get_rec['block_id']; ?>" ><?php echo $get_rec['block_name']; ?></option></td>  
		
						<?php 
						}
						}
						?>
						</select>
					
					
					</div>
					
					
					
<div  class="col-sm-3">
<input class="form-control" type="text" clas="" id="floorname" name="floor" placeholder="floor Name"  value="" />
<?php	if($error!="") { echo $error; }?></div>

                   
                                       
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
	
			 <table class="table_st_1" style="width:30%;">
                	<tr>
                    	<th>Block Name</th>
						<th>Floor Name</th>
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
		<td><i class="fa fa-edit" onClick="fun1('<?php echo $get_recc['floor_block_id'];?>','<?php echo $get_recc['floor_id'];?>','<?php echo $get_recc["floor_name"];?>','<?php echo $get_recc['block_name']; ?>');"></i></td>
						<td><i class="fa fa-times"  onclick="fundel('<?php echo $get_recc['floor_id'];?>');  "></i></td>
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

// function fun1(blockid,floorid,floorname,blockname1)
// {
// $('#save').hide();

// $('#update').show();

 // $("#blocknam123e option:contains(" + blockname1 + ")").attr('selected', 'selected'); 

 // $('#floorname').attr("value",floorname);    // <input type="text" value="name">

  // $('#floorname').attr("clas",floorid);     // <input type="text" clas="id">
//alert(blockid+'...'+floorid+'...'+floorname);
// }
////////////////////
function fun1(blockid,floorid,floorname,blockname)
{
$('#save').hide();

$('#update').show();


	$("#blocknam123e option[value='"+blockid+"']").attr('selected','selected');

	

  $('#floorname').attr("value",floorname);    // <input type="text" value="name">

  $('#floorname').attr("clas",floorid);     // <input type="text" clas="id">


}


/////////////////////////


</script>
<script>

// function selectByText( txt ) {
// alert(txt);
   // $('#blocknam123e option')
   // .filter(function() { return $.trim( $(this).text() ) == txt; })
   // .attr('selected',true);
// }
</script>
<script>

function func2()
{
 var id= $('#floorname').attr("clas"); 
  var floorname=$('#floorname').val(); 
//alert(id+'...'+floorname);

$.post("edit_floor.php",{floor_id:id,floor_name:floorname},function(data) {
 //location.reload();
//alert(data);
 //$( ".result" ).html('MY ID is - '+data );
 $("#floor").html(data);
});


}
</script>

<script>
function fundel(delid)
{
alert(delid);
$.post("delete_floor.php",{floor_id:delid},function(data) { location.reload();
//$(".delresult").html(data);
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
/*		  $(document).ready(function(){
            $('select').selectBox({ mobile: true });
		});*/
		
</script>
<?php include("footer.php"); ?>
<script src="js/footer_js.js"></script>
</body>
</html>
