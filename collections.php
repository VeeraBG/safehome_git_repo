<?php
session_start();
$page="maintenance";
include_once('dbFunction.php');
$obj = new dbFunction();
 $get_society=$obj->getsociety_details();
$get_blocks=$obj->getblock_details();

$sqqry=mysql_query("select * from setup ORDER BY setup_id DESC limit 1");
if(mysql_num_rows($sqqry)>0)
{
$get_sqft=mysql_fetch_array($sqqry);
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
		<a href="#" class="add_page_button">Maintenance Collections<span class="fa fa-plus"></span> </a>
        <div class="clearfix"></div>
		<span style="color:red">
		<?php 
		if($_REQUEST['add']=="success")
		{
		echo "society members Added Successfully";
		}
		?>
		</span>
		
        <div class="box-content box"> 
				<form id="defaultForm" method="post" action="" class="form-horizontal" enctype="multipart/form-data">
					<div class="col-sm-3">
					
				
					</div>
					<div class="clearfix"></div>
					<div class="col-sm-3">				
                    <select class="selectBox-dropdown" style="padding:3%;" name="block" id="block123"  onChange="javascript:showFloor(this.value)">
					   	<option value="">Select Block</option>
						
						<?php while($row=mysql_fetch_array($get_blocks)) { ?>
                       <option value=<?php echo $row['block_id']?>><?php echo $row['block_name']?></option>
                      <?php } ?>
                       </select>
						
                     </div>
                    <div class="col-sm-3"  id="floor">
					
        </div>
					
                    <div class="col-sm-3" id="flat">
					
					
                    </div>
                    <div class="col-sm-3"></div>
               
					  	<div class="clearfix"></div>
                     <div class="col-sm-offset-3 col-sm-5 text-center">
			
                    <input type="submit" name="getmaintadetails" class="btn btn-danger" value="Search"/>
                    </div>
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
				</form>
                 <div class="clearfix"></div>
			</div>
    
		<?php
		if($_REQUEST['msg']=="sent")
		{
		echo"<script> alert('Details send successfully');</script>";
	}
		?>
	<?php	$sqqry=mysql_query("select * from apartment_area_details ORDER BY id DESC limit 1");
if(mysql_num_rows($sqqry)>0)
{
$get_sq_perrate=mysql_fetch_array($sqqry);
$sqr_feet_per=$get_sq_perrate['sqft_per_rate'];
}
?>

		
		<div id="printthis">
		<table class="table_st_1">
                	<tr>
					   <!-- <th>Block</th>
                    	<th>FLOOR</th> -->
						<th>Flat</th>
						     <th> Name</th>
							   <th>Email</th>
                     <th>Square Feet Per Rate</th>
						       <th>Flat Area(in Sqft)</th>
					<!--	 <th>Flat No of persons</th> -->
                          <th> Maintenance Amount</th>
						     <th>  Variable Charges </th>
							     <th> Month of Variable Charges </th>
					  <th>Variable Charges Total </th>
						   <th> Arrears</th>
						   <th>Grand Total </th>
						   <th id="action">Action</th>
		   
					<?php
					
				if(!isset($_POST['getmaintadetails']))
		            {
					 $qry="SELECT a . * , b . * , c . * 
FROM maintenance_invoice a
INNER JOIN owner b ON a.owner_id = b.owner_id
INNER JOIN flat c ON c.flat_id = b.owner_flat;";
				
$myqry=mysql_query($qry) or die(mysql_error());


 

if(mysql_num_rows($myqry)>0)
{


while($get_mant=mysql_fetch_array($myqry))
{

					?>
					
					<div id="allresults">
                    <tr>
                    <td><?php echo $get_mant['flat_name'];?></td>
					
					<td><?php echo $get_mant['owner_name'];?></td>
					
						<td><?php echo $get_mant['invoice_owner_email'];?></td>
						
				<td><?php echo $sqr_feet_per." Rs.";?>	</td>
						
							<td><?php echo $get_mant['owner_sqft']; ?></td>
						
					   <!-- <td><?php //echo $get_mant['owner_no_persons']; ?></td> -->
						
                        <td><?php echo $get_mant['maintenance_amount'];?>Rs</td>
						
					
						<td>
						<?php

						$varicharge=$get_mant['invoice_variable'];
                        $sendinfo= unserialize($varicharge); 
						//print_r($sendinfo);
						 //$myarr=json_encode($sendinfo);
						$total=0;
						                     
												
						foreach($sendinfo as $key => $val)
                      {
					  
?>

						<?php echo $key; ?>-<?php echo $val;?> Rs<?php echo "<br>"; 
						$total+=$val;
				        } 
						?>
						</td>
						<td><?php echo  $get_mant['monthly_charges_date'];  ?> </td> 
						
						<td><?php echo $total; ?> Rs</td> 
						
							<td><?php echo 'Arrears'; ?> Rs</td> 
								<td><?php echo $get_mant['grand_maintenance'];  ?> Rs</td> 
						
						<?php                    $_SESSION['sendinfo']=$sendinfo;
									            $_SESSION['ownernm']=$get_mant['owner_name'];
												$_SESSION['pdfemail']=$get_mant['invoice_owner_email'];
												$_SESSION['oamtotal']=$total;
												 $_SESSION['maintanance_amount']=$get_mant['maintenance_amount'];
													$_SESSION['grandtotal']=$get_mant['grand_maintenance'];
						?>
						
                    <td>
		<!--<a href="javascript:" class="owner" onClick="printdet('<?php //echo $get_mant['invoice_id']; ?>')">Print</a> -->
		<i class="fa fa-print fa-2x" aria-hidden="true" id="print" onClick="printdet()" style="color:gray;"></i>
		<!--<img src="<?php echo $site_url;?>printer.png" width="30px" height="30px" id="print" onClick="printdet()">-->

		<a href="javascript:" onclick="testfunc('<?php echo $get_mant['invoice_owner_email']; ?>','<?php echo $total ; ?>','<?php echo $maintanance_amount; ?>','<?php echo $grandtotal; ?>')" ><img src="<?php echo $site_url;?>mail.png" id="mail" width="20px" height="20px"></a>

<a href="pdfdownload.php" target="_blank"><img id="pdf" src="<?php echo $site_url;?>pdf.png" width="20px" height="20px"></a>

<!--<button type="button" onclick="testfunc('<?php //echo $get_mant['invoice_owner_email']; ?>','<?php //echo $total ; ?>')">SendEmail</button> -->
					
						</td>	
							
							
							
						</tr>
						</div>
<?php
}
}
}
else
{

if(isset($_POST['getmaintadetails']))
		            {
					$blockid=$_POST['block'];
					$floor_id=$_POST['floor'];
					$flat_id=$_POST['flat_floor'];
					 $qry="select * from  maintenance_invoice where 1";
				if($_POST['block']!="")
				{
			 $qry.=" and invoice_block='$blockid'";
				}
					if($_POST['floor']!="")
				{
			 $qry.=" and invoice_floor='$floor_id'";
				}
	if($_POST['flat_floor']!="")
				{
			 $qry.=" and invoice_flat='$flat_id'";
				}
				$qry.=" ORDER BY invoice_id DESC limit 1";
				//echo $qry;
$myqry=mysql_query($qry) or die(mysql_error());

$own=mysql_query("select *  from flat where flat_block_id=".$blockid);
 

if(mysql_num_rows($myqry)>0)
{
if(mysql_num_rows($own)>0)
{

$get_ownerdet=mysql_fetch_array($own);

while($get_mant=mysql_fetch_array($myqry))
{
$ownemail=$get_mant['invoice_owner_email'];
$grandtotal=$get_mant['grand_maintenance'];
$maintanance_amount=$get_mant['maintenance_amount'];
$ownerdd=mysql_query("select *  from owner where owner_email='$ownemail'");
if(mysql_num_rows($ownerdd)>0)
{
 $get_o=mysql_fetch_array($ownerdd);

					?>
                    <tr>
                    <td><?php echo $get_ownerdet['flat_name'];?></td>
					
					<td><?php echo $get_o['owner_name'];?></td>
					
						<td><?php echo $get_mant['invoice_owner_email'];?></td>
						
							<td><?php echo $sqr_feet_per." Rs.";?>	</td>
						
							<td><?php echo $get_o['owner_sqft']; ?></td>
						
					    <td><?php echo $get_o['owner_no_persons']; ?></td>
						
                        <td><?php echo $maintanance_amount; ?>Rs</td>
						
					
						<td>
						<?php

						$varicharge=$get_mant['invoice_variable'];
                        $sendinfo= unserialize($varicharge); 
						//print_r($sendinfo);
						 //$myarr=json_encode($sendinfo);
						$total=0;
						                     
												
						foreach($sendinfo as $key => $val)
                      {
					  
?>

						<?php echo $key; ?>-<?php echo $val;?> Rs<?php echo "<br>"; 
						$total+=$val;
				        } 
						?>
						</td>
						
						
						<td><?php echo $total; ?> Rs</td> 
						
							<td><?php echo 'Arrears'; ?> Rs</td> 
								<td><?php echo $grandtotal; ?> Rs</td> 
						
						<?php                    $_SESSION['sendinfo']=$sendinfo;
									            $_SESSION['ownernm']=$get_o['owner_name'];
												$_SESSION['pdfemail']=$get_mant['invoice_owner_email'];
												$_SESSION['oamtotal']=$total;
												 $_SESSION['maintanance_amount']=$maintanance_amount;
													$_SESSION['grandtotal']=$grandtotal;
						?>
						
                    <td>
		<!--<a href="javascript:" class="owner" onClick="printdet('<?php //echo $get_mant['invoice_id']; ?>')">Print</a> -->
		<img src="<?php echo $site_url;?>printer.png" width="30px" height="30px" id="print" onClick="printdet()">

		<a href="javascript:" onclick="testfunc('<?php echo $get_mant['invoice_owner_email']; ?>','<?php echo $total ; ?>','<?php echo $maintanance_amount; ?>','<?php echo $grandtotal; ?>')" ><img src="<?php echo $site_url;?>mail.png" id="mail" width="30px" height="30px"></a>

<a href="pdfdownload.php" target="_blank"><img id="pdf" src="<?php echo $site_url;?>pdf.png"></a>

<!--<button type="button" onclick="testfunc('<?php //echo $get_mant['invoice_owner_email']; ?>','<?php //echo $total ; ?>')">SendEmail</button> -->
					
						</td>	
							
							
							
						</tr>
<?php
}
}
}
}
}




}

//}


//echo "select * from maintenance_invoice where MONTH(invoice_date)=".date('m')." AND YEAR(invoice_date)=".date('Y')."  ";
// $myqry=mysql_query("select * from maintenance_invoice where MONTH(invoice_date)=".date('m')." AND YEAR(invoice_date)=".date('Y')."  ");					
				// $myqryrec=mysql_query($qry) or die(mysql_error());
				







?>
        
                     
                </table>
				
		</div>
	 	<!--<div class="clearfix"></div>
                     <div class="col-sm-3">
				<img src="<?php// echo $site_url;?>print-icon.png" width="30px" height="30px" onClick="printdet()">
<img src="<?php //echo $site_url;?>email-icon.jpg" width="30px" height="30px" onClick="sendemail()">
<img src="<?php //echo $site_url;?>pdf-icon.jpg" width="30px" height="30px" onClick="pdf()">
			
	</div>	-->
		<div id ="sessiondata"></div>
		
		
		</div>
		<!--End Content-->
	</div>
</div>
<!--End Container-->
<div id="resu"></div>

<script>
    function testfunc(email,total,maintanamnt,grandtotal)
    {
alert(email+''+total+''+maintanamnt+''+grandtotal);

	var test1=$.parseJSON('<?php echo json_encode($sendinfo);?>');
     
//alert(email);

//alert(total);
//alert('cxvnmxcv'+ss.length)

//alert(str);
$.post("charge_details.php",{email:email,total:total,test1:test1,maintanamnt:maintanamnt,grandtotal:grandtotal},function(data) {  //location.reload();
 //$( ".result" ).html('MY ID is - '+data );
//alert(data);
  $("#resu").html(data);
});

    }
</script>

<script type="text/javascript">

function printdet()
{
  $("#print").hide();
		$("#pdf").hide();
			$("#mail").hide();
				$("#action").hide();
 var w = window.open('', '', 'width=800,height=600,resizeable,scrollbars');

 w.document.write($("#printthis").html());

 w.document.close(); // needed for chrome and safari

 javascript:w.print();

 w.close();

 return false;

}
</script>



<script>
function sendemail(email,total,obj1) {  

 var test1=JSON.parse(obj1);
        alert(test1.el1);
//alert(email);

//alert(total);
//alert('cxvnmxcv'+ss.length)

//alert(str);
$.post("charge_details.php",{email:email,total:total,test1:test1},function(data) {  //location.reload();
 //$( ".result" ).html('MY ID is - '+data );
  $("#resu").html(data);
});



}
</script>

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
function showFloor(str) {  

//alert(str);
$.post("get_data.php",{str:str},function(data) {  //location.reload();
 //$( ".result" ).html('MY ID is - '+data );
  $("#floor").html(data);
});



}
</script>
<script>
function showflat(flr) {  

//alert(flr);
var blockid=$('#block123').val();
//alert(blockid);
$.post("get_flat1.php",{flr:flr,blockid:blockid},function(data) {  //location.reload();
 //$( ".result" ).html('MY ID is - '+data );
  $("#flat").html(data);

});



}
</script>
<script>
function showowner(flatid) {  
//alert(flatid);
var blockid=$('#block123').val();
var floorid=$('#floor123').val();
//alert(floorid);
//alert(blockid);
$.post("get_owner_details.php",{flatid:flatid,blockid:blockid,floorid:floorid},function(data) {  //location.reload();
 //$( ".result" ).html('MY ID is - '+data );
  if(data!="")
  {
  $("#owner").html(data);
}
 });

}
</script>
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
//alert(delid);
$.post("delete_society.php",{soc_id:delid},function(data) { location.reload();
//$(".delresult").html(data);
});

}
</script>




<?php include("footer.php"); ?>

<script src="js/footer_js.js"></script>
</body>
</html>
