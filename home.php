<?php 
$page="home";
include_once('dbFunction.php');
$obj=new dbFunction();

$count_visitors=$obj->view_visitor_today();
//$count_permanent_security=$obj->total_permanent_security();

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
<?php include("leftmenu.php"); ?>
<div id="main" class="container-fluid">

	<div class="row">
		
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
		
        	<div class="col-sm-3">
           	  <div class="box custom_box1" style="box-shadow: 0 0 4px #D8D8D8;">
              <div class="box-header">
                <div class="box-name">
                	Visitors
                </div>
              	<div class="box-icons">
					<a class="expand-link">
						<i class="fa fa-external-link"></i>
					</a>
				</div>
              </div>
              
                <img src="img/visitors_icon.png" class="img-center" width="107" height="62">
                <h4 class="font-bold" style="color:#ff6600; margin-top:20px;"><small style="color:#ff6600;">Today visitors :</small> 
				
			<?php 	

// Print out result

$row= mysql_num_rows($count_visitors);
// print_r($row);
if($row>0)
{
echo $row;
}
else if($row<0)
{
echo "0";
}
			?>	
				
				
				
				</h4>
                </div>
            </div>
            <div class="col-sm-3">
            	<div class="box custom_box1" style="box-shadow: 0 0 4px #D8D8D8;">
              <div class="box-header">
                <div class="box-name">
                	Security
                </div>
              	<div class="box-icons">
					<a class="expand-link">
						<i class="fa fa-external-link"></i>
					</a>
				</div>
              </div>
              
                <img src="img/security_icon.png" class="img-center">
                	<div class="pull-left">
                   <h5 class="text-danger font-bold">Permanent: 
               <?php 	

// Print out result
 $qry678=mysql_query("select * from security where security_hiretype='Permanent' ") or die(mysql_error());
   //$row=mysql_num_rows($qry);
$no_of_persec=mysql_num_rows($qry678);
// print_r($row);
echo $no_of_persec;
if($no_of_persec<0)
{
echo "0";
}
			?>	</h5>
                    </div>
                 <div class="pull-right">
                    <h5 class="text-danger font-bold">Contract : 
         <?php 	

// Print out result
 $qry6789=mysql_query("select * from security where security_hiretype='Contract' ") or die(mysql_error());
   //$row=mysql_num_rows($qry);
$no_of_consec=mysql_num_rows($qry6789);
// print_r($row);
echo $no_of_consec;
if($no_of_consec<0)
{
echo "0";
}
			?>	</h5>
                    </div> 
                    <div class="clearfix"></div>
                </div>
            	
            </div>
            <div class="col-sm-3">
            	<div class="box custom_box1" style="box-shadow: 0 0 4px #D8D8D8;">
                  <div class="box-header">
                    <div class="box-name">
                        Society Members
                    </div>
                    <div class="box-icons">
                        <a class="expand-link">
                            <i class="fa fa-external-link"></i>
                        </a>
                    </div>
                  </div>
				  
				  <?php
				  $qry453=mysql_query("select * from society_members") or die(mysql_error());
			while($recso=mysql_fetch_array($qry453))
			{

				if($recso['society_member_type']=='President')
				{
				$President=$recso['society_member_name'];
				}
				if($recso['society_member_type']=='Secretary')
				{
				$Secretary=$recso['society_member_name'];
				}
				if($recso['society_member_type']=='Treasurer')
				{
				$Treasurer=$recso['society_member_name'];
				}
				}
				  ?>
               			<ul class="list_style1">
                        	<li><a href="add_society_members.php"><?php echo $President; ?>  (President) <span class="fa fa-search pull-right"></span></a></li>
                            <li><a href="add_society_members.php"><?php echo $Secretary; ?> (Secretary)  <span class="fa fa-search pull-right"></span></a></li>
                            <li><a href="add_society_members.php"><?php echo $Treasurer; ?>  (Treasurer) <span class="fa fa-search pull-right"></span></a></li>
                        </ul>
                        <a href="#" class="more"></a>
                    </div>
            
            </div>
            <div class="col-sm-3">
            	<div class="box custom_box1" style="box-shadow: 0 0 4px #D8D8D8;">
                  <div class="box-header">
                    <div class="box-name">
                        SMS Campaign
                    </div>
                    <div class="box-icons">
                        <a class="expand-link">
                            <i class="fa fa-external-link"></i>
                        </a>
                    </div>
                  </div>
               			<ul class="list_style1">
                        	<li><a href="#" >Balance SMS'S</a></li>
                            <li><a href="SMSReport1.php" >Sent SMS'S</a></li>
                           <li><a href="SMSCampaign.php" >Create SMS Campaign</a></li>
                        </ul>
                    </div>
            
            
            </div>
      
        <div class="clearfix"></div>
     			
                <div class="col-sm-8">
                <div class="box custom_box1" style="box-shadow: 0 0 4px #D8D8D8;">
                	<div id="tabs">
                            <ul>
                                <li><a href="#tabs-1">Monthly Expences</a></li>
                                <li><a href="#tabs-2">SMS Management</a></li>
                                <li><a href="#tabs-3">Security Attendance</a></li>
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
                	<div class="box custom_box1" style="box-shadow: 0 0 4px #D8D8D8;">
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
				  <?php
				  	  $exdet=mysql_query("select * from expenditure") or die(mysql_error());
			while($expen=mysql_fetch_array($exdet))
			{
				  
				  ?>
				  
               		
                        	<li><a href="#">
                            <span class="pull-left font-bold"><?php echo $expen['expenditure_name']; ?></span>
                            <h4 class="pull-right text-success font-bold"><?php echo $expen['expenditure_price']." RS."; ?></h4>
                            <div class="clearfix"></div>
                            </a></li> <?php } ?>
							</ul>
					 <div class="box-header">
                    <div class="box-name">
                    Maintenance Charges 
                    </div>
                    <div class="box-icons">
                        <a class="expand-link">
                            <i class="fa fa-external-link"></i>
                        </a>
                    </div>
                  </div>
							<ul class="list_style1">
							 <?php
						//echo date('Y-m');
						$totqry="select sum(owner_total_charges) as owner_total_charges  from maintenance_invoice where month(invoice_date) = month(now())  and year(invoice_date) = year(now())";
				  //	echo $totqry;
					$charges=mysql_query($totqry);
		
					$rnum=mysql_num_rows($charges);
					//echo $rnum;
					  if($rnum>0)
					  {
					  
					  $amt_arr = mysql_fetch_array($charges);
$amt = $amt_arr['owner_total_charges'] ;
		

				  ?>
				  
							
                          <li><a href="#">
                             <span class="pull-left">Total Maintenance Charges  </span>
                            <h4 class="pull-right text-success font-bold"><?php echo $amt." Rs"; ?> </h4>
                            <div class="clearfix"></div>
                            </a></li>
							
							
							<?php   
					
				}  else { echo 0; } ?>
						
                          <!--  <li><a href="#">
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
                            </a></li> -->
										
                        </ul>
			
						
                         <a href="#" class="more"></a>
                         <div class="clearfix"></div>
                    </div>
                </div>
            <div class="clearfix"></div>
			
	
			
			
			
			
			
            
            <div class="col-sm-5">
            	<div class="box custom_box1" style="box-shadow: 0 0 4px #D8D8D8;">
                  <div class="box-header">
                    <div class="box-name">
                       Alerts & Notifications
                    </div>
                    <div class="box-icons">
                        <a class="expand-link">
                            <i class="fa fa-expand"></i>
                        </a>
                    </div>
                  </div>
               			<ul class="list_style1">
                        	<li>
                           
                            <a href="#"><i class="fa fa-bell pull-left" style="background:#82b63e;padding: 4px;color: white;font-size: 10px; margin-right: 15px;"></i>New Employee Joined in RF Team. Just now</a>
                            <div class="clearfix"></div>
                            </li>
                            <li><a href="#"><i class="fa  fa-bullhorn pull-left" style="background:#ffa902;padding: 4px;color: white;font-size: 10px; margin-right: 15px;"></i>RFT project going be live by next week</a></li>
                            <li><a href="#"><i class="fa fa-comment pull-left" style="background:#ff5c14;padding: 4px;color: white;font-size: 10px; margin-right: 15px;"></i>Messages are not sent to users</a></li>
                            <li><a href="#"><i class="fa fa-bell pull-left" style="background:#82b63e;padding: 4px;color: white;font-size: 10px; margin-right: 15px;"></i>New project assigned to Create Team</a></li>
                        </ul>
                    </div>
            </div>
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

<script src="js/footer_js.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#input_date').datepicker({setDate: new Date()});
	$("#tabs").tabs();
});
</script>
<?php include("footer.php"); ?>
</body>
</html>
