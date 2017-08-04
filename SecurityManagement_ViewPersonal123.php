<?php
$page="security";
include_once('dbFunction.php');
$obj=new dbFunction();

//$ss=$obj->view_visitor_today();

 $pers=$obj->getsecurity_personal_details();
?>




<!DOCTYPE html>
<html lang="en">
		<?php include("top_header.php"); ?>
<body>
<!--Start Header-->


<script>
$(document).ready(function(){
var todate=$("#todate").val();
var fromdate=$("#fromdate").val();
if(todate!='' && fromdate!='')
{
//alert(todate+'alekhya'+fromdate);
}
});

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
<header class="navbar">
	<?php include("header.php"); ?>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<?php include("leftmenu.php"); ?>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10" style="height:700px;overflow-y:auto;">
        <br/>
	<!-- <div class="col-sm-3">
        <input type="text" class="search_by_date form-control" placeholder="Search by date" name="search" id="search" 
		id="datepicker" style="margin-left:0px;"/>
        </div>
		<div class="col-sm-3">
   <input type="button" class="btn btn-danger"   onClick="searchdate()" value="Search"  />
        </div> 
		

		
  
        <div class="visitors_arrows">
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
        </div>
        <div class="clearfix"></div>  -->
       
				
                
<!--View Visitor Info Popup Start-->
		<div class="popup view_vistor_info" style="top:150px;left:30%;width:730px; display:none;"><!--Popup Start-->
                            
                            </div>
<!--Popup End--><!--View Visitor Info Popup End-->
                
                
       
                   <div id="myid">
               <?php
    


 
			while($sql_get=mysql_fetch_array($pers))
				{
			
			//echo $mobile_nos=$sql_get['security_mobile'];
			
			
						// print_r($sql_get);
				// $date=$sql_get['visitor_date'];
				// $time=date('h:i a', strtotime($date)); 

				
			    ?>
                <div class="person_list" onClick="getsecdata('<?php echo $sql_get['security_id']; ?>')">
				<?php
						$imagepath="uploads/security_gallery/".$sql_get['security_image'];
if(file_exists($imagepath) && $sql_get['security_image']!='')
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
                    <div class="name"><?php echo $sql_get['security_name']; ?>. <?php echo $sql_get['security_lname']; ?></div>
                  <div class="mobile"><?php echo $sql_get['security_email']; ?></div>
				  <div class="mobile"><?php echo $sql_get['security_cat']; ?></div>
				  <div class="mobile"><?php  $serialized_data = $sql_get['security_mobile'];  
 
// Unserialize the data  
$var1 = unserialize($serialized_data);  
echo $var1[0];
// Show the unserialized data; f
// for($i=0;$i<count($var1); $i++)
// { 
// echo $var1[$i]."<br>";
// }
   ?></div>
                  
					
                </div>
                <?php
				} 
		
				?>
                
                
               
                        </div>
        
               
               
                
        <div class="clearfix"></div>
		</div>
		<!--End Content-->
	</div>
</div>
<!--End Container-->


<div id='sessiondata' style="color:red;"> </div>

<script type="text/javascript">
$(document).ready(function() {

	$('#input_date').datepicker({setDate: new Date()});

});
</script>
<script type="text/javascript">
function getsecdata(id) {
//alert(id);
$('#sessiondata').load('security_person_det.php?id='+id);
window.location.replace('Security_Details.php');

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
			
		
		});
		
</script>


<script>
function searchdate()
{
//alert("mallesh");
		
var datevalue=$("#search").val()
//alert(datevalue);
$.post("searchvisitor.php",{datevalue:datevalue},function(data) {
$('#myid').html(data);
 	
});
}
				


</script>
<script>
function personinfo(idvalue)
{
//alert(idvalue);
				$('.view_vistor_info').show();	

				
				$.post("visitorpopup.php",{idvalue:idvalue},function(data) {  
				
            $('.view_vistor_info').html(data);			
			$('.cancel_popup').click(function(){
				$('.view_vistor_info').hide();	
			});
			});
}

</script>
<script src="js/footer_js.js"></script>
<?php include("footer.php"); ?>

            
</body>
</html>
