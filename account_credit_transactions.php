<?php
session_start();
$page="maintenance";
include_once('dbFunction.php');
$obj = new dbFunction();
$apartment_id=1;
if(isset($_POST['debitdetails']))
{

$billno=$_POST['billno'];
$contractname=$_POST['contractname'];
$contractamount=$_POST['contractamount'];
$paidamount=$_POST['paidamount'];
$dueamount=$_POST['dueamount'];
$comments=$_POST['comments'];
$paymenttype=$_POST['paymenttype'];
$ponumber=$_POST['ponumber'];


$qryinsert=mysql_query("insert into credit_account (credit_id,credit_billno,credit_contractname,credit_contractamount,credit_paidamount,credit_dueamount,credit_comments,credit_date,credit_paymenttype,credit_ponumber) 
values ('','$billno','$contractname','$contractamount','$paidamount','$dueamount','$comments',NOW(),'$paymenttype','$ponumber')") or die(mysql_error());

if($qryinsert)
{
echo "<script> alert('Account details inserted successfully ');</script>";
//header("location:account_debit_transactions.php");
}
}

?>


<?php

if(isset($_POST['updatedetails']))
{

$dbtid=$_POST['dbtid'];
$billno=$_POST['billno'];
$contractname=$_POST['contractname'];
$contractamount=$_POST['contractamount'];
$paidamount=$_POST['paidamount'];
$dueamount=$_POST['dueamount'];
$comments=$_POST['comments'];
$paymenttype=$_POST['paymenttype'];
$ponumber=$_POST['ponumber'];



//echo "update debit_account set debit_billno='$billno', debit_contractname='$contractname',debit_contractamount='$contractamount',debit_paidamount='$paidamount',debit_dueamount='$dueamount',debit_comments='$comments',debit_paymenttype='$paymenttype',debit_ponumber='$ponumber',debit_date=NOW() where debit_id=".$dbtid;

$qryupdate=mysql_query("update credit_account set credit_billno='$billno', credit_contractname='$contractname',credit_contractamount='$contractamount',credit_paidamount='$paidamount',credit_dueamount='$dueamount',credit_comments='$comments',credit_paymenttype='$paymenttype',credit_ponumber='$ponumber',credit_date=NOW() where credit_id=".$dbtid) or die(mysql_error());


if($qryupdate)
{
echo "<script> alert('Account details Updated successfully ');</script>";
//header("location:account_debit_transactions.php");
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

<header class="navbar">
	<?php include("header.php")?>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<?php include("leftmenu.php"); ?>
		
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10" style="display:block;">
		<a href="#" class="add_page_button">Account Credit transactions<span class="fa fa-plus"></span> </a>
        <div class="clearfix"></div>
		<span style="color:red">
		<?php 
		if($_REQUEST['msg']=="deleted")
		{
		echo "Account Details Deleted Successfully";
		}
        ?>
		
		
		</span>
		

			
		

	
	 <div class="box-content box"> 
	 <div class="row">
	 	<div class="col-sm-2">Total Amount CASH IN HAND:</div>	
					<div class="col-sm-3">	
			
                    <input type="text" class="form-control"  name="cashinhand"  value="2,30,000 Rs" readonly >
						
                     </div>
					 </div>
	 
	 
	 	<div id ="create456form"> 
				<form id="defaultForm" method="post" action="" class="form-horizontal"
				enctype="multipart/form-data">
			
				<div class="col-sm-2">PO No</div>	
					<div class="col-sm-3">	
			
                    <input type="text" class="form-control"  name="ponumber"  >
						
                     </div>
					 	  	<div class="clearfix"></div>
					<div class="col-sm-2">Bill No</div>	
					<div class="col-sm-3">	
			
                    <input type="text" class="form-control"  name="billno"   >
						
                     </div>
					 	  	<div class="clearfix"></div>
						
					<div class="col-sm-2">Contract Name</div>	
					<div class="col-sm-3">	
			
                    <input type="text" class="form-control"  name="contractname"  >
						
                     </div>
					 	  	<div class="clearfix"></div>	  	<div class="clearfix"></div>
					 <div class="col-sm-2">Contract Amount </div>	
					<div class="col-sm-3">	
			
                    <input type="text" class="form-control"  name="contractamount"   >
						
                     </div>
				 	<div class="clearfix"></div>	 

					
					<div class="clearfix"></div>
					 <div class="col-sm-2">Payment Type </div>	
					<div class="col-sm-3">	
			     <select class="selectBox-dropdown" style="padding:3%;" name="paymenttype">
					   	<option value="">Select Type</option>
						  	<option value="cash">Cash</option>
							  	<option value="dd">DD</option>
								  	<option value="cheque">cheque</option>
						
                       </select>
						
                     </div> 
					
					
	  	            <div class="clearfix"></div>
					 <div class="col-sm-2">paid Amount </div>	
					<div class="col-sm-3">	
			
                    <input type="text" class="form-control"  name="paidamount" >
						
                     </div> 

					<div class="clearfix"></div>
					 <div class="col-sm-2">Due Amount </div>	
					<div class="col-sm-3">	
			
                    <input type="text" class="form-control"  name="dueamount"  >
						
                     </div>
					 
				
					 	<div class="clearfix"></div>
					 <div class="col-sm-2">Comments </div>	
					<div class="col-sm-3">	
			
                    <textarea  name="comments"  class="form-control"  style="margin: 0px; width: 256px; height: 105px;" > </textarea>
						
                     </div>
                  
				  
				  	<div class="clearfix"></div><br><br>

                     <div class="col-sm-3">
			
                 
                <input type="submit" name="debitdetails"  class="btn btn-danger" value="Save" />
                  
					
					
					</div>
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
				</form>
               
	</div>
	
			
	<!-- <div class="box-content box"> 
	 	<div id ="accres123ult" style="display:none;"> 
			</div>
		
			</div> -->
	
	
</div>
			
    <table class="table_st_1">
                	<tr>
					   <th>S.NO</th>
					    <th>Bill No</th>
						   <th>PO No</th>
                    	<th>Contract Name </th>
						<th>Contract Amount</th>
								<th>Contract Paid Amount</th>
										<th>Contract Due Amount</th>
										<th>Payment Type</th>
                          <th> Date</th>
					      <th> ACTION </th>	
					</tr>
					
					<?php
					$acctqry=mysql_query("select * from  credit_account ORDER BY credit_id DESC");			
				$i=1;
		
					while($acc_rec=mysql_fetch_array($acctqry))
					{ 
						
					$debit_billno=$acc_rec['credit_billno'];
							$debit_ponum=$acc_rec['credit_ponumber'];
					$debit_contractname=$acc_rec['credit_contractname'];
							$debit_contractamount=$acc_rec['credit_contractamount'];
					$debit_paidamount=$acc_rec['credit_paidamount'];
					$debit_dueamount=$acc_rec['credit_dueamount'];
							$debit_paytype=$acc_rec['credit_paymenttype'];
						$debit_date=$acc_rec['credit_date'];
					?>
                    <tr>
					<td><?php echo $i; ?></td>
                    	<td><?php echo $debit_billno; ?></td>
						
						<td><?php echo $debit_ponum; ?></td>
				
                        <td><?php echo $debit_contractname; ?></td>
						                  <td><?php echo $debit_contractamount; ?></td>
                        <td><?php echo $debit_paidamount; ?></td>
						         <td><?php echo $debit_dueamount; ?></td>
								 <td><?php echo $debit_paytype; ?></td>
									<td>
                      <?php  
				     echo date('h:i:s a m/d/Y', strtotime($debit_date));
 							  ?>
                        </td> 
<td>
		<i class="fa fa-edit" onClick="fun1('<?php echo $acc_rec['credit_id']; ?>')"></i> &nbsp;&nbsp;&nbsp; 

						<i class="fa fa-times"  onclick="fundel('<?php echo $acc_rec['credit_id'];?>'); "></i></td>						</tr><?php
       					            	   $i++; 
											} 
											
											?>
                  
                     
                </table>
		

	
			
	</div>
	
		<!--End Content-->
	</div>
	</div>
<!--End Container-->



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
function fundel(delid)
{

$.post("delete_credit_details.php",{debitid:delid},function(data) { location.reload();
//$(".delresult").html(data);
});

}
</script>

<script>

function fun1(id)
{
//alert(id);
//localStorage.setItem('lastname',id);


 $.post("credit_edit_details.php",{deb_id:id},function(data) { //location.reload();
$("#create456form").hide();
$("#accres123ult").show();
$("#accres123ult").html(data);
//alert(data);
});
}
</script>


<?php include("footer.php"); ?>

<script src="js/footer_js.js"></script>
</body>
</html>
