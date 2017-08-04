<?php
$page="owner";
include_once('dbFunction.php');
 $obj = new dbFunction();

 $data=$obj->getowner_details();

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
    


 if($data>0){

				while($get_rec=mysql_fetch_array($data))
				{

						// print_r($sql_get);
				// $date=$sql_get['visitor_date'];
				// $time=date('h:i a', strtotime($date)); 

				
			    ?>
                <div class="person_list" onClick="getownerdata('<?php echo $get_rec['owner_id']; ?>')">
				<?php
						$imagepath="uploads/owner_gallery/".$get_rec['owner_image'];
if(file_exists($imagepath) && $get_rec['owner_image']!='')
{
	$image=$imagepath;
}
else 
{
	$image="img/profile-icon.png";
}
									?>

           	    <img src="<?php echo $image;?>" width="100" height="100" class="img-rounded"/>
                <div class="clearfix"></div>
                    <div class="name"><?php echo $get_rec['owner_name']; ?>. <?php echo $get_rec['owner_lname']; ?></div>
                  <div class="mobile"><?php echo $get_rec['owner_email']; ?></div>
				  <div class="mobile"><?php echo $get_rec['owner_mobile']; ?></div>

<div class="mobile">Status:	<span style="color:red">	 <?php echo $get_rec['owner_status']; ?></div>
<!--   <div class="mobile"><?php //echo $get_rec['owner_flat']; ?></div> -->
					
                </div>
                <?php
				} }
		
				?>
                
                
               
                        </div>
        
               
               
                
        <div class="clearfix"></div>
		</div>
		<!--End Content-->
<div id='sessiondata' style="color:red;"> </div>


<script type="text/javascript">
function getownerdata(id) {
//alert(id);
 $('#sessiondata').load('owner_person_det.php?id='+id);
 window.location.replace('Owner_Details.php');

}
</script>






<script type="text/javascript">
$(document).ready(function() {
	$('#input_date').datepicker({setDate: new Date()});
});
</script>
<script type="text/javascript">
function editButton(id) {
	//alert(id);
$('#sessiondata').load('session_write.php?id='+id);
window.location.replace('edit_owner1.php');

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
