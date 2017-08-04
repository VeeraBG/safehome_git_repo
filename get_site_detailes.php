 <?php 
 session_start();
 //single site detailes
include_once('dbFunction.php');
$obj = new dbFunction();


    if(isset($_REQUEST['id'])){
    	$id = $_REQUEST['id'];

    	$sql = "SELECT new_website.website_id,new_website.site_text,new_website.site_contacts,
    					new_website.domain_name,
    					web_header.img_name,
    					web_banner.banner_name,
    					web_footer.footer_name
				FROM 	new_website
				INNER JOIN web_header ON new_website.website_id = web_header.website_id
				INNER JOIN web_banner ON new_website.website_id = web_banner.website_id
				INNER JOIN web_footer ON new_website.website_id = web_footer.website_id
				where new_website.website_id = '$id'";


					$qry=mysql_query($sql) or die(mysql_error());
					if($qry>=1){
							while($data = mysql_fetch_assoc($qry)){

								//print_r($data);
									
				
     ?> 


<!DOCTYPE html>
<html lang="en">
<?php include("top_header.php"); ?>
<header class="navbar">
<?php include("header.php"); ?>
</header>
<style>
table,td{
font-size:13px;
}
</style>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
<div class="row">
<?php include("leftmenu.php"); ?>




<div class="result"> </div>
<!--Start Content-->
<div id="content" class="col-xs-12 col-sm-10">

     
       <div class="clearfix"></div>

				


 				<br><br><div class="row">
		        		<div class="col-md-12">
								
								<img src="<?php echo $data['img_name'];?>" style = "width: 100%; height: 100px;" class="img-responsive">
								
                  		</div>
                 		
                 </div><br>
                 <div class="row">
		        		<div class="col-md-3" >
								
								<img src="<?php echo $data['banner_name'];?>" style = "width: 100%; height: 300px;" class="img-responsive">
								
                  		</div>
						<div class="col-md-2" >
						</div>
						<div class="col-md-3" style = "box-shadow:1px 1px 3px 1px silver;">
							<span>Site Domain Name &nbsp;&nbsp;-&nbsp;&nbsp;</span><span><?php echo $data['domain_name'] ?></span><br>
							<span>Site Content &nbsp;&nbsp;-&nbsp;&nbsp;</span><span><?php echo $data['site_text'] ?></span><br>
							<span>Site Contact &nbsp;&nbsp;-&nbsp;&nbsp;</span><span><?php echo $data['site_contacts'] ?></span><br>
										
						</div>
						
						
                 </div><br>
                 <div class="row">
		        		<div class="col-md-12">
								
								<img src="<?php echo $data['footer_name'];?>" style = "width: 100%; height: 100px;" class="img-responsive">
								
                  		</div>
                 		 
                 </div><br>
                <!--  <div class="row">
		        		<div class="col-md-8">
								
								<img src="<?php echo $image;?>" style = "width: 100%; height: 100px;" class="img-responsive">
								
                  		</div>
                 		 <div class="col-md-2" >Name -</div><div class="col-md-2">asdgdfdasgfsdf<br><br></div>
                 </div> -->
				
				



		<div class="clearfix"></div><br>  
		<div  class= "col-md-3"></div>
			<div class= "col-md-2">			
					<button class="btn"  onClick = "deleteButton(<?php echo $id; ?>)" 
 						style="display:block;color:#444;text-decoration:none;padding-left:22%;" >Delete</button>
 						
			</div>

			<div class= "col-md-1" style="margin-right:1%;">
					<button class="btn btn-danger" onClick="editButton(<?php echo $id ?>)" id="edit123" >Edit</button>
			</div>
			
	<?php 
		}
	}
}
	?>
</div>
<div id='sessiondata' style="color:red;"> </div>





<script type="text/javascript">
$(document).ready(function() {
	$('#input_date').datepicker({setDate: new Date()});
});
</script>

<script type="text/javascript">
	function editButton(id) {
		// body...
		var v = confirm("Are you Sure to Update Website");
		//alert(v);
		if(v){
			window.location.replace('http://localhost/mysafehome/safehome/update_website.php?id='+id);
		}
		else{
			alert("you got back");
		}
		//

	}
	function deleteButton(id) {
		// body...
		var v = confirm("Are you Sure to Delete Website");
		if(v){
			window.location.replace('http://localhost/mysafehome/safehome/delete_website.php?id='+id);
		}
		else{
			alert("you got back");
		}
		

	}

</script>
<<!-- script type="text/javascript">
function edit(id) {

window.location.replace('http://localhost/mysafehome/safehome/update_website.php');

}
</script> -->



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
			$(".table_st_1 tr:odd").addClass("odd");

		});

</script>
<?php include("footer.php"); ?>
<script src="js/footer_js.js"></script>
</body>
</html>







