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
		<a href="#" class="add_page_button">SMS reports</a>
         <div class="col-sm-3 pull-right">
      	<div class="visitors_arrows" style="margin-top:20px;">
        	<a href="#" class="prev"><i class="fa fa-angle-left pull-left"></i>26/07/2014</a>-
            <a href="#" class="next"><i class="fa fa-angle-right pull-right"></i>04/08/2014</a>
         </div>
         </div>
        <div class="clearfix"></div>
     			
                <table class="table_st_1">
                	<tr>
                    	<th>visitor Name</td>
                        <th>Last Name</th>
                        <th>Block no</th>
                        <th>Flat no</th>
                        <th>whome to meet</th>
                        <th>mobile</th>
                        <th>status</th>
                        <th>time</th>
                    </tr>
                    <tr>
                    	<td>Naveen tapadia</td>
                        <td>Tapadia</td>
                        <td>C1</td>
                        <td>450</td>
                        <td>Anil bharadwaj</td>
                        <td>+91-9879652547</td>
                        <td><span class="greenT">SENT</span></td>
                        <td>
                        10:03 AM
                        </td>
                    </tr>
                     <tr>
                    	<td>Koshore sirivelu</td>
                        <td>Sirivelu</td>
                        <td>B2</td>
                        <td>105</td>
                        <td>3</td>
                        <td>+91-9879652547</td>
                        <td><span class="greenT">SENT</span></td>
                        <td>
                      10:03 AM

                        </td>
                    </tr>
                     <tr>
                    	<td>Harsha Raghavendra</td>
                        <td>Raghavendra</td>
                        <td>C5</td>
                        <td>210</td>
                        <td>10</td>
                        <td>05-06-2013</td>
                        <td><span class="redT">SENT</span></td>
                        <td>
                       11:00AM

                        </td>
                    </tr>
                     <tr>
                    	<td>Praveen kumar</td>
                        <td>Bandaru</td>
                        <td>D5</td>
                        <td>202</td>
                        <td>8</td>
                        <td>+91-9879652547</td>
                        <td><span class="greenT">SENT</span></td>
                        <td>
                        1:00 PM
                        </td>
                    </tr>
                     <tr>
                    	<td>Madhusekhar. Pulipati</td>
                        <td>Pulipati</td>
                        <td>F2</td>
                        <td>B1</td>
                        <td>6</td>
                        <td>+91-9879652547</td>
                        <td><span class="greenT">SENT</span></td>
                        <td>
                      	4:00 PM
                        </td>
                    </tr>
                     <tr>
                    	<td>Pramod kumar. Jajjala</td>
                        <td>Jajjala</td>
                        <td>A2</td>
                        <td>305</td>
                        <td>4</td>
                        <td>+91-9879652547</td>
                        <td><span class="redT">SENT</span></td>
                        <td>
                        9:00 PM

                        </td>
                    </tr>
                     <tr>
                    	<td>Naveen tapadia</td>
                        <td>Tapadia</td>
                        <td>B1</td>
                        <td>B1</td>
                        <td>6</td>
                        <td>+91-9879652547</td>
                        <td><span class="redT">SENT</span></td>
                        <td>
                        4:00 PM
                        </td>
                    </tr>
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
