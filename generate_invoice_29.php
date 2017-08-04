<?php
session_start();
$aprtment_id=1;
$page="maintenance";
include_once('dbFunction.php');
$obj = new dbFunction();
 $get_society=$obj->getsociety_details();
$get_blocks=$obj->getblock_details();

//calculation



$get_aprt_det=mysql_query("select * from apartment_area_details ORDER BY id DESC limit 1");
$num_check=mysql_num_rows($get_aprt_det);
if($num_check>0)
{
$main_amount=mysql_fetch_array($get_aprt_det);
}

$apt_main_amount=$main_amount['apartment_maintain_amount'];


$get_sqper=mysql_query("select * from setup ORDER BY setup_id DESC limit 1");
$sqr_check=mysql_num_rows($get_sqper);
if($sqr_check>0)
{
$sq_per=mysql_fetch_array($get_sqper);
}

$squarefeet_per=$sq_per['setup_sqft'];



if(isset($_POST['collections']))
{

//$email=$_POST['email'];
//print_r($_POST);
//echo "myemail is".$_POST['email'];


//$data=$obj->create_society($mumbertype,$mumbername,$mumberid);

$email=$_POST['email'];
$block=$_POST['block'];
$floor=$_POST['floor'];
$flat=$_POST['flat_floor'];
$mykeys=$_POST['keym'];
//print_r($mykeys);
$amount=$_POST['amount'];
$desc=$_POST['desc'];

$ownerid=$_POST['ownerid'];
$owner_name=$_POST['owner_name'];
$maintanamount=$_POST['maintanamount'];


$owner_flat_sqft=$_POST['ownerflatsqft'];

$amount_flat_area=$squarefeet_per*$owner_flat_sqft;
//echo $amount_flat_area;
// extract($_POST);
// print_r($_POST);

$toat_maint_flatsqr_persqr=($owner_flat_sqft*$squarefeet_per)+$apt_main_amoun;

//print_r($amount);

foreach( $amount as $index  => $myArray)
{
   // insert: $key = penalty, $value = 200
  //echo '<p>'.$mykeys.' - '.$amount.'</p>';
$mykeyname=$mykeys[$index];  
//echo $mykeys[$index].'---'.$amount[$index].'<br/>';
$artype[$mykeyname]=$amount[$index];
}

 //print_r($artype);

$variable_amount=serialize($artype); 


$sendinfo= unserialize($variable_amount);  
// Show the unserialized data;  
$total=0;
$grandtotal=0;

$message = "<h2><u>Maintenance Charges</u></h2><p><h3>Hello $owner_name, Please Find Below Charges For This Month</h3> <table border='1'>";
 $message.="<tr><th>Maintenance Variable</th><th>Amount</th></tr>";
foreach($sendinfo as $key => $val)
{
	$total+=$val;
    $message.="<tr><td><b>$key</b></td><td></b>$val</td></b></tr>";
}

$grandtotal=$maintanamount+$total;

 $message.="<tr><td><b>Total</b></td><td><b>$total Rs.</b></td></tr>";
     $message.="<tr><td><b>Message</b></td><td><b>$desc</b></td></tr>";
$message.="</table>";


//echo $b;
//echo "insert into maintenance_invoice (invoice_block,invoice_floor,invoice_flat,invoice_owner_email,invoice_variable) values ('$block','$floor','$flat','$email','$variable_amount')";

$qryinsert=mysql_query("insert into maintenance_invoice (invoice_block,invoice_floor,invoice_flat,invoice_owner_email,invoice_variable,invoice_desc,owner_total_charges,invoice_date,maintenance_amount,grand_maintenance,owner_id,apartment_id) values ('$block','$floor','$flat','$email','$variable_amount','$desc','$total',NOW(),'$maintanamount','$grandtotal','$ownerid','$aprtment_id')") or die(mysql_error());

if($qryinsert)
{
$bb="isha.mallesh@gmail.com";
$headers = "From: " . $bb. "\r\n";
$headers .= "CC: isha.mallesh@gmail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$to=$email;
$subject = "Generate Invoice";




//echo $message;
//$message="Invoice details Send Soon";
$sendemail=mail($to,$subject,$message,$headers);

if($sendemail)
{
echo "<script> alert('Invoice Details Sent to mail');</script>";
//header("location:generate_invoice.php");
}
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
		<a href="#" class="add_page_button">Charges For Owner<span class="fa fa-plus"></span> </a>
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
					
				   <div class="clearfix"></div>
                    <div class="col-sm-12">
               
					<div  id="owner"  class="row">
					
					
					</div>
                  


				  </div>  
					 
					 
					 
					 
					
					
					
					
                    <div class="col-sm-3"></div>
                    <div class="clearfix"></div>
                    <div class="col-sm-9">
                 </div>


       
				  	<div class="clearfix"></div>
					<h5><b>VARIABLE MAINTENANCE AMOUNT </b></h5>
					
<?php				
$check_exist_qry="select * from setup ORDER BY setup_id DESC limit 1";
$run_qry=mysql_query($check_exist_qry);
$total_found=mysql_num_rows($run_qry);
if($total_found >0)
{
	$my_value=mysql_fetch_assoc($run_qry);
	$my_stored_variable=explode(',',$my_value['setup_variable_type']);
//print_r($my_stored_variable);

}
$cycle=$my_value['setup_cycle'];

$cyclevalue= (int)$cycle;


//$today_str=date("Ymd");

//echo date('Y-m-d', strtotime("-30 days"));


//echo $final = date("Y-m-d", strtotime("+1 month"));
//echo $effectiveDate = date('Y-m-d', strtotime("+3 months"));

//echo $date = strtotime(date("Y-m-d", strtotime($date)) . " +1 month");

//echo $today_date=date('"F Y"',strtotime($today_str)); //July 2015

for($j=0;$j<$cyclevalue; $j++)
{

$final = date("Y-m-d", strtotime("+$j month"));
//echo  $final;
$month_name=date('"F Y"',strtotime($final));
echo "<h5>Maintenance Charges For <b>".$month_name." </b>  </h5>";
//echo $cyclevalue;

for($i=0;$i<count($my_stored_variable); $i++)
{

?>
	
					<div class="col-sm-2">				
                   <input type="hidden" name="keym[]" value="<?php echo $my_stored_variable[$i]; ?>">
				  Add <?php echo $my_stored_variable[$i]; ?> Amount: </div>
				  	<div class="col-sm-3">	
				  
				  <input type="text" class="form-control"  name="amount[]" value="">
					
                     </div>
               
						
					  	<div class="clearfix"></div>
					<?php
					
					} 

					} 
					?> 		
				  
            
                    <div class="clearfix"></div>
                      <div class="col-sm-2">				
                   Enter Description
				   </div> <div class="col-sm-3">	
				   <textarea name="desc"  style="margin: 0px; width: 256px; height: 105px;"></textarea>
                     </div>
					  	<div class="clearfix"></div>
							<div class="clearfix"></div>
                     <div class="col-sm-3">
			
                    <input type="submit" name="collections" class="btn btn-danger" value="Submit"/>
                    </div>
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
				</form>
                 <div class="clearfix"></div>
			</div>
    
		
		
		
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
