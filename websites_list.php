
<?php
$page="owner";
include_once('dbFunction.php');
 $obj = new dbFunction();

 //$data=$obj->getowner_details();

?>


<!DOCTYPE html>
<html lang="en">
<?php include("top_header.php"); ?>


<script>
function fun1(str) {

alert(str);
$.post("edit_owner.php",{str:str},function(data ) {  //location.reload();
 //$( ".result" ).html('MY ID is - '+data );
});



}
</script>
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
		<div id="content" class="col-xs-12 col-sm-10" style="  height: 700px;
  overflow-y: auto;">
        <br/>
	<!-- <div class="col-sm-3">
        <input type="text" class="search_by_date form-control" placeholder="Search by date" name="search" id="search" 
		id="datepicker" style="margin-left:0px;"/>
        </div>
		<div class="col-sm-3">
   <input type="button" class="btn btn-danger"   onClick="searchdate()" value="Search"  />
        </div>  -->
		

		
  
      <!--  <div class="visitors_arrows">
		 <div class="col-sm-4 pull-right">
        	<!-- <a href="#" class="prev">
			<i class="fa fa-angle-left pull-left"></i>26/07/2014</a>-
            <a href="#" class="next"><i class="fa fa-angle-right pull-right"></i>04/08/2014</a> 
		 <input type="text" class="search_by_date form-control" placeholder="To date" name="todate" id="todate" 
		id="datepicker" style="margin-left:0px;"/>
		  </div>
		 <div class="col-sm-4 pull-right">
		 <input type="text" class="search_by_date form-control" placeholder="From date" name="fromdate" id="fromdate" 
		id="datepicker" style="margin-left:0px;"/> 
         </div>
        </div> -->
        <div class="clearfix"></div>
       
				
                
<!--View Visitor Info Popup Start-->
		<div class="popup view_vistor_info" style="top:150px;left:30%;width:730px; display:none;"><!--Popup Start-->
                            
                            </div>
<!--Popup End--><!--View Visitor Info Popup End-->
                
                
       
                   <div id="myid">
               <?php
    

					$sql = "SELECT new_website.website_id,new_website.domain_name,web_header.img_name,new_website.site_text,new_website.site_contacts FROM new_website 
				INNER JOIN web_header ON (new_website.website_id = web_header.website_id) 
				";
						$qry=mysql_query($sql) or die(mysql_error());
								if($qry>=1){

									
									while($row = mysql_fetch_assoc($qry)){
										/*echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td>									                       
											<td>
											<button type='button' class='btn  btn-xs btn-primary' onClick = 'editButton(".$row[0].")'>Edit</button>
											<i class='fa fa-times btn btn-danger'  onclick= 'fundel(".$row[0].");'></i></td></tr>";
									echo $row['domain_name'];*/	
										
			    ?>






                <div class="person_list" onClick="get_site_data(<?php echo $row['website_id']; ?>)">
			<?php
						$imagepath="newsiteimgs";
								if(file_exists($imagepath))
								{
									echo $image=$row['img_name'];
								}
								else 
								{
									$image="img/profile-icon.png";
								}
							

				?>
						

           	    <img src="<?php echo $row['img_name'];?>" width="100" height="100" class="img-rounded"/>
                <div class="clearfix ">
				
				 <div class="name">Site Domain Name - &nbsp;&nbsp;&nbsp;<?php echo $row['domain_name']; ?></div>
                  <div class="mobile">Site Text - &nbsp;&nbsp;&nbsp;<?php echo $row['site_text']; ?></div>
				  <div class="mobile">Site Contact - &nbsp;&nbsp;&nbsp;<?php echo $row['site_contacts']; ?></div>
				
                   <!--span class="col-sm-6" style="color:blue;padding: 0px;">Site Domain Name </span>
                   		<span class="col-sm-2"><?php echo $row['domain_name']; ?></span><br>
                   <span class="col-sm-6" style="color:blue; padding: 0px;">Site Content</span>
                   		<span class="col-sm-2"><?php echo $row['site_text']; ?></span><br>
				  <span class="col-sm-6" style="color:blue; padding: 0px;">Site Contact_info</span>
				  	<span class="col-sm-2"><?php echo $row['site_contacts']; ?></span-->
				 


					
                </div></div>
                <?php
              //  print_r($row);		
							}

						 }
		
				?>
                
                
               
                       
        
               
               
                
        <div class="clearfix"></div>
		</div>
		<!--End Content-->
<div id='sessiondata' style="color:red;"> </div>


<script type="text/javascript">
function get_site_data(id) {

//alert(id);
//console.log(id);
window.location.replace('http://localhost/mysafehome/safehome/get_site_detailes.php?id='+id);
	
}
</script>






<script type="text/javascript">
$(document).ready(function() {
	$('#input_date').datepicker({setDate: new Date()});
});
</script>
<script type="text/javascript">
function edit(id) {

window.location.replace('http://localhost/mysafehome/safehome/update_website.php');

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
