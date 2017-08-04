<?php
session_start();
$page="maintenance";
include_once('dbFunction.php');
$obj = new dbFunction();
$apartment_id=1;

	if(isset($_REQUEST['id'])){
		//echo "<script>alert(".$_REQUEST['id'].")</script>";
		//$sql = "SELECT new_website.domain_name,web_banner.banner_name,web_banner.banner_id FROM `new_website` INNER JOIN web_banner ON new_website.website_id = web_banner.website_id where new_website.website_id = '$id'";
			$id = $_REQUEST['id'];
			$GLOBALS['web_id'] = $id; 

			$sql = "SELECT new_website.domain_name,web_header.img_name,new_website.site_text, web_banner.banner_name,new_website.site_contacts,web_footer.footer_name FROM new_website 
				INNER JOIN web_header ON (new_website.website_id = web_header.website_id) 
				INNER JOIN web_banner on (new_website.website_id = web_banner.website_id) 
				INNER JOIN web_footer on (new_website.website_id = web_footer.website_id) 
				WHERE new_website.website_id  = '$id'";

		$qryGet=mysql_query($sql) or die(mysql_error());
		
			if($qryGet)
			{
				$row = mysql_fetch_assoc($qryGet);

				$GLOBALS['data'] = $row;
				//print_r($GLOBALS['data']);
		 			
					
					//echo "<script>alert(".$row[0].")</script>";
				
				//echo "somthing diff...";
			}
			else{
			echo "<script>alert('Not updated".$GLOBALS['domain']."+'somm')</script>";
			}

}

?>	

<!DOCTYPE html>
<html lang="en">
		<?php include("top_header.php"); ?>

<body >
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
		<a href="#" class="add_page_button">Update Website </a>

        <div class="clearfix"></div>
		<span style="color:red">
		<?php 
		// if($_REQUEST['add']=="success")
		// {
		// echo "society members Added Successfully";
		// }
		?>
		</span>
		
        <div class="box-content box" ng-app = "myapp" ng-controller = "myctrl"> 
				<form id="defaultForm" method="post" action='update_web_data.php?id=<?php echo  $id ; ?>'<?php echo  $id ; ?> class="form-horizontal" enctype="multipart/form-data">
			<!-- <?php print_r($GLOBALS['data'])?> 
			<?php echo $GLOBALS['data']['domain_name'];?> -->
	
							<div class="row">	
					<div class="col-sm-2">Enter Domain Name</div>	
					<div class="col-sm-4">	
			
                    <input type="text" class="form-control"  name="domainName"  value="<?php echo $GLOBALS['data']['domain_name'];?>" >
						
                     </div>
                     </div>
					 
				<div class="row">	
					<div class="col-sm-2">Enter Header image </div>	
						<div class="col-sm-4">	
						<input type="file" placeholder="Select New Image" name="header" class="custom-file-upload-hidden" tabindex="-1" style="position: absolute; left: -9999px;"
							value = "<?php echo $GLOBALS['data']['img_name'];?>">

                  	   <!--  </div><div class="col-sm-2 "><?php echo $GLOBALS['data']['img_name'];?></div> -->
                  	    
                </div><br/><br/><br/><br/>
				<div class="row">	
					 <div class="col-sm-2">Enter Website Text </div>	
					<div class="col-sm-4 ">	
			
                    <input type="text" class="form-control"  name="Websit_etext" value="<?php echo $GLOBALS['data']['site_text'];?>" >
						
                     </div>
                     </div><br/><br/>
						<div class="row">	
					 <div class="col-sm-2">Upload Banner Image </div>	
					<div class="col-sm-4">	
			<input type="file" placeholder="Select New Image" name="banner" class="custom-file-upload-hidden" tabindex="-1" style="position: absolute; left: -9999px;" value = "<?php echo $GLOBALS['data']['banner_name'];?>"> </div>
					<!-- <div class="col-sm-2 "<?php echo $GLOBALS['data']['banner_name'];?></div> -->
				</div><br/>
				
				<br/>
				<div class="row">	
					 <div class="col-sm-2">Enter Contact Details </div>	
					<div class="col-sm-4">	
			
                    <input type="text" class="form-control"  name="contact"  value="<?php echo $GLOBALS['data']['site_contacts'];?>" >
						
                     </div>
                     </div><br/><br/>
						<div class="row">	
					 <div class="col-sm-2">Enter Footer Image </div>	
					<div class="col-sm-4">	
			<input type="file" placeholder="Select New Image" name="footer" class="custom-file-upload-hidden" tabindex="-1" style="position: absolute; left: -9999px;" value = "<?php echo $GLOBALS['data']['footer_name'];?>">	
                    <!--  </div><div class="col-sm-2 "><?php echo $GLOBALS['data']['footer_name'];?></div> -->
                     </div><br/><br/>
                   
				
    		<div class="row">	
				<br/>
                     <div class="col-sm-offset-4 col-sm-2 text-center">
			
                    <input type="submit" name="update" class="btn btn-danger" value="Update"/>
                    </div>
                    <div class="col-sm-9">
					</div>
					</div>
          
					</form>
                
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
function editButton(soid)
{
// alert(soid);
$('#sessiondata').load('society_id.php?soid='+soid);
window.location.replace('society_edit.php');

}

</script>

<script>
function fundel(delid)
{
//alert(delid);
$.post("delete_apartment_area_details.php",{area_id:delid},function(data) { location.reload();
//$(".delresult").html(data);
});

}
</script>



<?php include("footer.php"); ?>


<script src="js/footer_js.js"></script>

</body>
</html>
