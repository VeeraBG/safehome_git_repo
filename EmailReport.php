<?php
// $page="email";
 include_once('dbFunction.php');
 $obj = new dbFunction();
 $get_rep=$obj->get_emails_rep();
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
	<?php include("header.php"); ?>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<?php include("leftmenu.php"); ?>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
		<a href="#" class="add_page_button">Email Reports</a>
         <div class="col-sm-3 pull-right">
      	<div class="visitors_arrows" style="margin-top:20px;">
     
         </div>
         </div>
        <div class="clearfix"></div>
     		
                <table class="table_st_1">
                	<tr>
                    	<!--<th>visitor Name</td>
                        <th>Last Name</th>
                        <th>Block no</th>
                        <th>Flat no</th>
                        <th>whome to meet</th> -->
                        <th>Email</th>
                        <th>Status</th>
                        <th>Time</th>
                    </tr>
				 <?php
					if($get_rep>0)
					{
					
					while($fet_rep=mysql_fetch_array($get_rep))
					{ 
	
					?>
                    <tr>
                    <!--	<td>Naveen tapadia</td>
                        <td>Tapadia</td>
                        <td>C1</td>
                        <td>450</td>
                        <td>Anil bharadwaj</td> -->
                        <td><?php echo $fet_rep['email_report_name']; ?></td>
                        <td><span class="greenT"><?php  echo strtoupper($fet_rep['email_report_status']); ?></span></td>
                        <td>
              


<?php  $date = $fet_rep['email_report_date']; 
echo date('h:i:s a m/d/Y', strtotime($date)); ?>
                       </td>  </tr>
					   
					  <?php } } ?>
                     
                </table>
     		
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
