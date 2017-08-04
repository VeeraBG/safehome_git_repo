<?php
$page="location";
include_once('dbFunction.php');
$obj=new dbFunction();

$getfecall=$obj->get_fac_d();

$code1="";
if(isset($_POST['save']))
{
$faciname=$_POST['faciname'];
if($faciname=="")
{
$code1="Enter Facility Name";
}
else
{
$qq=$obj->create_new_facility($faciname);

if($qq==1)
{
header("Location:add_facility.php");
}
else
{
$error="Facility Name Already Exist";
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
		
		
	
        <div class="clearfix"></div>
        <div class="box-content box">
		
				<form id="defaultForm" method="post" action="" class="form-horizontal" enctype="multipart/form-data">
					
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
                    
                    
<div style="color:red" class="col-sm-3"><input type="text" clas="" id="blockname" name="faciname" class="form-control" 
placeholder="Facility Name"  value="" />
<span id="faci" style="color:red">
					 <?php
					 if(isset($code1))
					 { 
					 echo $code1;
					 } 
					 if($qq==2)
					 {
					 echo "facility already exist";
					 }
					 if($_REQUEST['msg']=="exist")
					 {
					echo "facility already exist";
					 }
			
					 ?>
				
					 </span>
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
                    	<th>Facility Name</th>
						<th>Edit</th><th>Delete</th>
						</tr>
			
			 	<?php 
				if($getfecall>0)
				{
				while($get_rec=mysql_fetch_array($getfecall))
				{
							
				?>
	<tr>
          <td><?php echo $get_rec['facility_name']; ?></td>  
		<td><i class="fa fa-edit" onClick="fun1('<?php echo $get_rec['facility_name'];?>','<?php echo $get_rec['facility_id'];?>');"></i></td>
						<td><i class="fa fa-times"  onclick="fundel('<?php echo $get_rec['facility_id'];?>'); "></i></td></tr>
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
//alert(id+'...'+blockname);
$.post("edit_facility.php",{faci_id:id,faci_name:blockname},function(data) {
 //location.reload();
 $("#faci").html(data);
//alert(data);
// $( ".result" ).html('MY ID is - '+data );
});


}
</script>

<script>
function fundel(delid)
{
//alert(delid);
$.post("delete_facility.php",{faci_id:delid},function(data) { location.reload();
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
