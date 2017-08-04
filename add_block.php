<?php
$page="location";
 include_once('dbFunction.php');
 $obj = new dbFunction();
$code1="";$code3="";
$ss=$obj->getblock_details();
if(isset($_POST['save']))
{
$blockname=$_POST['blockname'];
if($blockname=="")
{
$code1="Enter Block name";
}
else
{
$qq=$obj->add_block($blockname);


if($qq==1)
{
header("Location:add_block.php");
}
else
{
$error="Block Name Already Exist";
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
	<?php include("header.php")?>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<?php include("leftmenu.php"); ?>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
		<a href="#" class="add_page_button">Add Block <span class="fa fa-plus"></span> </a>
        <div class="clearfix"></div>
		
	
        <div class="box-content box">
		
				<form id="defaultForm" method="post" action="" class="form-horizontal" enctype="multipart/form-data">
					<div class="col-sm-9"></div>
                 <div class="clearfix"></div>
     <div id="block"></div>
<div  style="color:red" class="col-sm-3"><?php	if($error!="") { echo $error; } ?><?php
					 if(isset($code1))
					 { 
					 echo $code1;
					 }
?></div><div class="clearfix"></div>
	<div  style="color:red" class="col-sm-3"><input type="text" clas="" id="blockname" name="blockname" class="form-control" 
placeholder="Block Name"  value="" />
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
     			
                <table class="table_st_1" style="width:40%;">
                	<tr>
                    	<th>Block Name</th>
						<th>Edit</th><th>Delete</th>
						</tr>
			
			 	<?php 
				if($ss>0)
				{
				while($get_rec=mysql_fetch_array($ss))
				{
							
				?>
	<tr>
          <td><?php echo $get_rec['block_name']; ?></td>  
		<td><i class="fa fa-edit" onClick="fun1('<?php echo $get_rec['block_name'];?>','<?php echo $get_rec['block_id'];?>');"></i></td>
						<td><i class="fa fa-times"  onclick="fundel('<?php echo $get_rec['block_id'];?>'); "></i></td></tr>
						<?php }} ?>
						</table>
		</div>
		
		</div>
		
		<!--End Content-->
		

</div>
<!--End Container-->
<div class="result"> </div>
<div class="delresult"> </div>
<script>

function fun1(name,id)
{


  $('#blockname').attr("value",name);    // <input type="text" value="name">

  $('#blockname').attr("clas",id);     // <input type="text" clas="id">


$('#save').hide();

$('#update').show();
}
</script>


<script>

function func2()
{
 var id= $('#blockname').attr("clas"); 
  var blockname=$('#blockname').val(); 


$.post("edit_block.php",{block_id:id,block_name:blockname},function(data) {
 //location.reload();
//alert(data);
// $( ".result" ).html('MY ID is - '+data );

$("#block").html(data);
});

}

</script>

<script>
function fundel(delid)
{
//alert(delid);
$.post("delete_block.php",{block_id:delid},function(data) { location.reload();
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
		  $(document).ready(function(){
            $('select').selectBox({ mobile: true });
		});
		
</script>
<?php include("footer.php"); ?>
<script src="js/footer_js.js"></script>
</body>
</html>
