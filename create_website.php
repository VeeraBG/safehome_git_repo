<?php
session_start();
$page="maintenance";
include_once('dbFunction.php');
$obj = new dbFunction();
$apartment_id=1;
if(isset($_POST['create']))
{
	$domainName = $_POST['domainName'];
	$Websit_etext = $_POST['Websit_etext'];
	$contact = $_POST['contact'];
			$domainName = mysql_real_escape_string($domainName);
			$Websit_etext = mysql_real_escape_string($Websit_etext);
			$contact = mysql_real_escape_string($contact);

			//echo $domainName;
			//insert data into new_website tble.
			$sqlCheck = "select new_website.domain_name from new_website where new_website.domain_name = '$domainName' ";
			$qry=mysql_query($sqlCheck) or die(mysql_error());
				if($qry)
				{
					//echo "query executed successfully.";
					echo "<script> alert('Domain Name is alredy exist!".$domainName."');</script>";
				}
				else{
						$insertWebData = "insert into new_website values('','$domainName','$Websit_etext','$contact')";
							// query execution.
							$qryinsert=mysql_query($insertWebData) or die(mysql_error());
							if($qryinsert)
							{
								//echo "query executed successfully.";
								echo "<script> alert('row inserted successfullay');</script>";
							}
						//select web id from new_website.
							$selctQuery = "select website_id from new_website where domain_name = '$domainName'";
								$qryGet=mysql_query($selctQuery) or die(mysql_error());
								if($qryGet)
								{
									$row = mysql_fetch_row($qryGet);
									//echo "<script> alert('".$row[0]."');</script>";
									$GLOBALS['web_id'] = $row[0];
								
								echo "<script> alert('".$row[0]."');</script>";
								$path = "newsiteimg/";
						//header....
								$header = $_FILES['header']['name'];
								$header =mysql_real_escape_string($header);
									//echo "<script> alert('".$header."');</script>";
								$realPath = '';
								
								if(move_uploaded_file($_FILES['header']['tmp_name'], $path.$header)){
									//echo "<script> alert('header moved successfullay');</script>";
									$realPath = $path.$header;
										$headerQry = "insert into web_header values('','$row[0]','$realPath')";
										$qry=mysql_query($headerQry) or die(mysql_error());
											if($qry)
											{
												
												echo "<script> alert('inserted".$row[0].$header."');
													document.getElementById('header_img').src='".$realPath."'";
													
												echo"</script>";
												
											}
									}
									else{
									echo "<script> alert('file not moved');</script>";
									}

						//banner...
								$banner = $_FILES['banner']['name'];
								$banner = mysql_real_escape_string($banner);
							
								//echo "<script> alert('".$banner."');</script>";
								if(move_uploaded_file($_FILES['banner']['tmp_name'], $path.$banner)){
									//echo "<script> alert('banner moved successfullay');</script>";
										$realPath = $path.$banner;
										$bannerQry = "insert into web_banner values('','$row[0]','$realPath')";
										$qry=mysql_query($bannerQry) or die(mysql_error());
											if($qry)
											{
												
												/*echo "<script> alert('inserted".$row[0].$banner."');";*/
								
											}
									}
									else{
									echo "<script> alert('file not moved');</script>";
									}


						//footer....
								$footer = $_FILES['footer']['name'];
								$footer = mysql_real_escape_string($footer);
								
								if(move_uploaded_file($_FILES['footer']['tmp_name'], $path.$footer)){
									//echo "<script> alert('footer moved successfullay');</script>";
									$realPath = $path.$footer;

										$bannerQry = "insert into web_footer values('','$row[0]','$realPath')";
										$qry=mysql_query($bannerQry) or die(mysql_error());
											if($qry)
											{
												
												/*echo "<script> alert('inserted".$row[0].$footer."');</script>";*/
												
											}
									}
									else{
									echo "<script> alert('file not moved');</script>";
									}

						

							}//inner if

					}//else of second
				
					
					//echo "<script> alert('".$footer."');</script>";
}
else
{
	echo "data not set";
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
		<a href="#" class="add_page_button">Create Website <span class="fa fa-plus"></span> </a>
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
				<form id="defaultForm" method="post" action="" class="form-horizontal" enctype="multipart/form-data">
			
	
							<div class="row">	
					<div class="col-sm-2">Enter Domain Name</div>	
					<div class="col-sm-3">	
			
                    <input type="text" class="form-control"  name=" domainName"  value="" ng-model = "domain">
						
                     </div>
                     </div>
					 
				<div class="row">	
					<div class="col-sm-2">Enter Header image </div>	
						<div class="col-sm-3">	
							<input type="file" placeholder="Upload ID" name="header" class="custom-file-upload-hidden" tabindex="-1" style="position: absolute; left: -9999px;">
                  	    </div>
                  	    
                </div><br/><br/>
				<div class="row">	
					 <div class="col-sm-2">Enter Website Text </div>	
					<div class="col-sm-3 col-sm-9">	
			
                    <input type="text" class="form-control"  name="Websit_etext" value="" >
						
                     </div>
                     </div><br/><br/>
						<div class="row">	
					 <div class="col-sm-2">Upload Banner Image </div>	
					<div class="col-sm-3">	
			<input type="file" placeholder="Upload ID" name="banner" class="custom-file-upload-hidden" tabindex="-1" style="position: absolute; left: -9999px;"> </div>
				</div><br/>
				
				<br/>
				<div class="row">	
					 <div class="col-sm-2">Enter Contact Details </div>	
					<div class="col-sm-3">	
			
                    <input type="text" class="form-control"  name="contact"  value="" >
						
                     </div>
                     </div><br/><br/>
						<div class="row">	
					 <div class="col-sm-2">Enter Footer Image </div>	
					<div class="col-sm-3">	
			<input type="file" placeholder="Upload ID" name="footer" class="custom-file-upload-hidden" tabindex="-1" style="position: absolute; left: -9999px;">	
                     </div>
                     </div><br/><br/>
				
    		<div class="row">	
				<br/>
                     <div class="col-sm-offset-4 col-sm-2 text-center">
			
                    <input type="submit" name="create" class="btn btn-danger" value="Create"/>
                    </div>
                    <div class="col-sm-9">
					</div>
					</div>
          
					</form>
                
			
			

		<!-- <div style = "height: 500px; width: 750px; overflow:scroll; ">
			<table class = "table_st_1 table-bordered table-striped" >
				
				<?php 
						$sql = "SELECT * FROM `new_website`";
						$qry=mysql_query($sql) or die(mysql_error());
								if($qry){
									echo "<tr><th>Sno</th>
										<th>domainName</th>
										<th>SiteText</th>
										<th>SiteContacts</th>
										<th>Action</th>
										


									</tr>";
									while($row = mysql_fetch_row($qry)){
										echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td>									                       
											<td>
											<button type='button' class='btn  btn-xs btn-primary' onClick = 'editButton(".$row[0].")'>Edit</button>
											<i class='fa fa-times btn btn-danger'  onclick= 'fundel(".$row[0].");'></i></td></tr>";
									}
								}

				?> 
				
			</table>
			</div>
		</div>
 -->
		
		
			
		
		
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
<!--Angular js  -->
 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>



<script>
function editButton(site_id)
{
alert(site_id);
window.location='http://localhost/mysafehome/safehome/update_website.php?id='+site_id;
}

</script>

<script>
function fundel(site_id)
{
		window.location='http://localhost/mysafehome/safehome/delete_website.php?id='+site_id;
}
</script>



<?php include("footer.php"); ?>


<script src="js/footer_js.js"></script>
</script>
</body>
</html>
