<?php
session_start();
$page="maintenance";
include_once('dbFunction.php');
$obj = new dbFunction();
 $get_society=$obj->getsociety_details();
$get_blocks=$obj->getblock_details();
$flatsqrfeet=$_SESSION['totsqrfeet'];

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
$owner_name=$_POST['owner_name'];
$maintanamount=$_POST['maintanamount'];

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

$qryinsert=mysql_query("insert into maintenance_invoice (invoice_block,invoice_floor,invoice_flat,invoice_owner_email,invoice_variable,invoice_desc,owner_total_charges,invoice_date,maintenance_amount,grand_maintenance) values ('$block','$floor','$flat','$email','$variable_amount','$desc','$total',NOW(),'$maintanamount','$grandtotal')") or die(mysql_error());

if($qryinsert)
{
$bb="isha.mallesh@gmail.com";
$headers = "From: " . $bb. "\r\n";
$headers .= "CC: isha.sunil786@gmail.com\r\n";
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
			
					<div class="row">
				
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
					     </div>
					<div class="row">
						
					<div class="col-sm-2">			Maintenance Amount</div>	
					<div class="col-sm-3">	
			
                    <input type="text" class="form-control"  name="maintanamount" placeholder="Maintenance Amount" value="" >
						
                     </div>
					  <div class="col-sm-7">
               
					<div id="owner"  class="col-sm-12">
					
					
					</div>
                  


				  </div>  
				
				   
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
