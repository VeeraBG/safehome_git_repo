<?php
$apartment_id=1;
$page="society";
include_once('dbFunction.php');
$obj = new dbFunction();
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
		<a href="#" class="add_page_button">VIDEO SURVEILLANCE<span class="fa fa-plus"></span> </a>
        <div class="clearfix"></div>
		
		
		
        <div class="box-content box"> 
				<form id="defaultForm" method="post" action="" class="form-horizontal" enctype="multipart/form-data">
					<div class="col-sm-3">
					
				
					</div>
					<div class="clearfix"></div>
			<!--	<div class="col-sm-2">	
                   Maintenance Rate/Sqft					
                    	
                     </div>
				 <div class="col-sm-3">	
               					
                    <input type="text" class="form-control" placeholder="RatePer SQFT" name="rsqft" value="<?php //echo $my_value['setup_sqft'];?>">
						
                     </div>
               -->
              
                    <div class="clearfix"></div>
                    <div class="col-sm-9">
                 
</div>


				   <div class="clearfix"></div>
                    <div class="col-sm-9">
               
               <div class="col-sm-5">             
              <input type="text" placeholder="Enter The URL" class="form-control" name="videosur">
                       
					   </div> </div> 
 <div class="clearfix"></div>	


                <div class="col-sm-3">             
                   <input type="checkbox" name="saveurl" value="diesel"> Save The URL <br>
					 
                       
					   </div> 

 <div class="clearfix"></div>
 <br>


			<br/>
                     <div class="col-sm-offset-4 col-sm-3 text-center">
		
                    <input type="submit" name="setup" class="btn btn-danger" value="Submit"/>
                    </div>
					
				
					
					
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
				</form>
                 <div class="clearfix"></div>
			</div>
      			
		
		
		
		<div id ="sessiondata"></div>
		
		
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
		var newPerson = $("<div id='newdiv"+counter+"' class=\"col-sm-12\" style=\"padding:0px; margin:0px;\"><div class=\"col-sm-3\"><input type=\"text\" class=\"form-control\" placeholder=\"Visitor Name\" name=\"name[]\" id='person1"+counter+"' /></div><div class=\"col-sm-3\"><input type=\"text\" class=\"form-control\" placeholder=\"visitor lastname.\" name=\"lname[]\" id='lname1"+counter+"' /></div><div class=\"col-sm-3\"><input type=\"text\" class=\"form-control\" placeholder=\"Mobile No\" name=\"mbno[]\" id='age1"+counter+"' /></div><div class=\"col-sm-3\"><div class=\"cross\"><span class=\"fa fa-times\" onclick=\"return delPerson("+counter+");\"></div></span></div><div class=\"clearfix\"></div></div>");
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




<script>
function fundel(delid)
{
//alert(delid);
$.post("delete_society.php",{soc_id:delid},function(data) { location.reload();
//$(".delresult").html(data);
});

}
</script>



<?php include("footer.php"); ?>


<script src="js/footer_js.js"></script>
</body>
</html>
