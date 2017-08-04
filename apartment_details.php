<?php
session_start();
$page="maintenance";
include_once('dbFunction.php');
$obj = new dbFunction();
$apartment_id=1;

	$aptqry=mysql_query("SELECT * FROM  `apartment_area_details` WHERE apartment_id ='$apartment_id' ORDER BY id DESC LIMIT 1");
 if(mysql_num_rows($aptqry)>0)
 {
 while($aprt_detae=mysql_fetch_array($aptqry))
					{
					$sqperrat=$aprt_detae['sqft_per_rate'];
						$apartment_sqft=$aprt_detae['apartment_sqft'];
					}
	}
	
$exp_col_tot=$_SESSION['exp_col_tot'];

$qry321=mysql_query("select * from collections where collection_apartment_id=".$apartment_id);
				while($rec5=mysql_fetch_array($qry321))
				{
				
				$sumcollection += $rec5['collection_price'];
}

$qry=mysql_query("select * from expenditure where expenditure_apartment_id=".$apartment_id);
				while($rec=mysql_fetch_array($qry))
				{
				$sum += $rec['expenditure_price'];
}

	$exp_col_total=$sum-$sumcollection;
			
			//echo 	$exp_col_total;

if(isset($_POST['aprtmentdetails']))
{

//$email=$_POST['email'];
//print_r($_POST);
//echo "myemail is".$_POST['email'];


//$data=$obj->create_society($mumbertype,$mumbername,$mumberid);

$aptmaintanamount=$_POST['aptmaintanamount'];
echo $aptsqft=$_POST['aptsqft'];

$sqft_per_rate23=$aptmaintanamount/$aptsqft;

$sqft_per_rate=round($sqft_per_rate23,2);
 



//print_r($amount);


//echo $b;
//echo "insert into maintenance_invoice (invoice_block,invoice_floor,invoice_flat,invoice_owner_email,invoice_variable) values ('$block','$floor','$flat','$email','$variable_amount')";

$qryinsert=mysql_query("insert into apartment_area_details (apartment_id,apartment_maintain_amount,apartment_sqft,apartment_date,sqft_per_rate) values ('$apartment_id','$aptmaintanamount','$aptsqft',NOW(),'$sqft_per_rate')") or die(mysql_error());

if($qryinsert)
{
echo "<script> alert('Apartment maintenance amount and area details inserted successfully ');</script>";
//header("location:generate_invoice.php");
}
}


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
	<?php include("header.php")?>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<?php include("leftmenu.php"); ?>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
		<a href="#" class="add_page_button">Maintenance Metric <span class="fa fa-plus"></span> </a>
        <div class="clearfix"></div>
		<span style="color:red">
		<?php 
		// if($_REQUEST['add']=="success")
		// {
		// echo "society members Added Successfully";
		// }
		?>
		</span>
		
        <div class="box-content box"> 
				<form id="defaultForm" method="post" action="" class="form-horizontal" enctype="multipart/form-data">
			
	
						
					<div class="col-sm-2">Apartment Maintenance Amount(Expenses - Collections)</div>	
					<div class="col-sm-3">	
			<input type="text" class="form-control"  name="aptmaintanamount" placeholder="Maintenance Amount" value="<?php echo $exp_col_total;?>" readonly>
				
                     </div>
					 	  	<div class="clearfix"></div>	  	<div class="clearfix"></div>
					 <div class="col-sm-2">Total Apartment Area(in Sqft) </div>	
					<div class="col-sm-3">	
			
                    <input type="text" class="form-control"  name="aptsqft" placeholder="Total Square feet" value="<?php echo $apartment_sqft;?>" >
					
						
                     </div>
					 
					  	<div class="clearfix"></div>
					 <div class="col-sm-2">Rate per Sft </div>	
					<div class="col-sm-3">	
			
               	<input type="text" class="form-control" readonly name="sqftperrate" placeholder="Square Feet per rate" value="<?php  echo $sqperrat; ?>" >
              
					
                  
						
                     </div> 
			
				  
				  	<div class="clearfix"></div>
					<br>
                     <div class="col-sm-offset-3 col-sm-5 text-center">
			
                    <input type="submit" name="aprtmentdetails" class="btn btn-danger" value="Submit"/>
                    </div>
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
				</form>
                 <div class="clearfix"></div>
			</div>
    <table class="table_st_1">
                	<tr>
					   <th>S.NO</th>
					    <th>Apartment ID</th>
                    	<th>Maintenance Amount </th>
						<th>Total Area (in Sqft)</th>
						<th>Square Feet Per Rate</th>
                          <th> Date</th>
					      <th> ACTION </th>	
					</tr>
					<?php
					$aptqry=mysql_query("select * from  apartment_area_details ORDER BY id DESC");			
				$i=1;
					while($aprt_rec=mysql_fetch_array($aptqry))
					{ 
						
					$appid=$aprt_rec['apartment_id'];
					$main_amunt=$aprt_rec['apartment_maintain_amount'];
					$apt_sqt=$aprt_rec['apartment_sqft'];
							$sft_per_rate=$aprt_rec['sqft_per_rate'];
					$apt_det_date=$aprt_rec['apartment_date'];
					?>
                    <tr>
					<td><?php echo $i; ?></td>
                    	<td><?php echo $appid; ?></td>
                        <td><?php echo $main_amunt; ?></td>
                        <td><?php echo $apt_sqt; ?></td>
						    <td><?php echo $sft_per_rate; ?></td>
									<td>
                      <?php  
				     echo date('h:i:s a m/d/Y', strtotime($apt_det_date));
 							  ?>
                        </td> 
<td>
		<!--<a href="javascript:" class="owner" onClick="editButton('<?php //echo $aprt_rec['id']; ?>')">
<i class="fa fa-edit"></i> Edit</a>&nbsp;&nbsp;&nbsp; -->

						<i class="fa fa-times"  onclick="fundel('<?php echo $aprt_rec['id'];?>'); "></i></td>						</tr><?php
       					            	   $i++; 
											} 
											
											?>
                  
                     
                </table>
		
		
		
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
alert(delid);
$.post("delete_apartment_area_details.php",{area_id:delid},function(data) { location.reload();
//$(".delresult").html(data);
});

}
</script>

<?php include("footer.php"); ?>




<script src="js/footer_js.js"></script>
</body>
</html>
