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
		
        	
                <div class="col-sm-8">
                <div class="box custom_box1">
                	<div id="tabs">
                            <ul>
                                <li><a href="#tabs-1">Monthly expences</a></li>
                                <li><a href="#tabs-2">SMS management</a></li>
                                <li><a href="#tabs-3">Security attendance</a></li>
                            </ul>
                            <div id="tabs-1">
                             <img src="img/chart.jpg" class="img-responsive">
                               </div>
                            <div id="tabs-2">
                                <img src="img/chart.jpg" class="img-responsive">
                            </div>
                            <div id="tabs-3">
                                <img src="img/chart.jpg" class="img-responsive">
                            </div>
                        </div>
                      </div>
                </div>
                <div class="col-sm-4">
                	<div class="box custom_box1">
                  <div class="box-header">
                    <div class="box-name">
                        Expences
                    </div>
                    <div class="box-icons">
                        <a class="expand-link">
                            <i class="fa fa-external-link"></i>
                        </a>
                    </div>
                  </div>
               			<ul class="list_style1">
                        	<li><a href="#">
                            <span class="pull-left font-bold">Water bills</span>
                            <h4 class="pull-right text-success font-bold">25,000</h4>
                            <div class="clearfix"></div>
                            </a></li>
                            <li><a href="#">
                             <span class="pull-left">Electricty bills</span>
                            <h4 class="pull-right text-success font-bold">1,25,000.00</h4>
                            <div class="clearfix"></div>
                            </a></li>
                            <li><a href="#">
                             <span class="pull-left">Security payments</span>
                            <h4 class="pull-right text-success font-bold">5,24,000,00</h4>
                            <div class="clearfix"></div>
                            </a></li>
                            <li><a href="#">
                             <span class="pull-left">Staff Salaries</span>
                            <h4 class="pull-right text-success font-bold">4,25,000,00</h4>
                            <div class="clearfix"></div>
                            </a></li>
                            <li><a href="#">
                             <span class="pull-left">Other Expences</span>
                            <h4 class="pull-right text-success font-bold">15,000,000</h4>
                            <div class="clearfix"></div>
                            </a></li>
                            <li><a href="#">
                             <span class="pull-left">Review policies- Sales & Marketing</span>
                            <h4 class="pull-right text-success font-bold">25024 $</h4>
                            <div class="clearfix"></div>
                            </a></li>
                            <li><a href="#">
                             <span class="pull-left">Respond to RFI Tech- Proposal</span>
                            <h4 class="pull-right text-success font-bold">15024 $</h4>
                            <div class="clearfix"></div>
                            </a></li>
                        </ul>
                         <a href="#" class="more"></a>
                         <div class="clearfix"></div>
                    </div>
                </div>
            <div class="clearfix"></div>
            
            
		</div>
		<!--End Content-->
	</div>
</div>
<!--End Container-->




<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src='js/jquery-1.9.1.min.js'></script>
<script src="plugins/jquery/jquery-2.1.0.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>

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
<script type="text/javascript">
$(document).ready(function() {
	$('#input_date').datepicker({setDate: new Date()});
	$("#tabs").tabs();
});
</script>
</body>
</html>
