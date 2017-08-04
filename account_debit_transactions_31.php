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
$accounttype=$_POST['accounttype'];


$qryinsert=mysql_query("insert into transactions_account (id,billno,contractname,contractamount,paidamount,dueamount,comments,transaction_date,paymenttype,ponumber,account_type) 
values ('','$billno','$contractname','$contractamount','$paidamount','$dueamount','$comments',NOW(),'$paymenttype','$ponumber','$accounttype')") or die(mysql_error());

if($qryinsert)
{
$url="account_debit_transactions.php";

echo "<script> alert('Account details inserted successfully ');</script>";
	 echo '<script type="text/javascript">';
      echo 'window.location.href="'.$url.'";';
      echo '</script>';

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
$accounttype=$_POST['accounttype'];


//echo "update debit_account set debit_billno='$billno', debit_contractname='$contractname',debit_contractamount='$contractamount',debit_paidamount='$paidamount',debit_dueamount='$dueamount',debit_comments='$comments',debit_paymenttype='$paymenttype',debit_ponumber='$ponumber',debit_date=NOW() where debit_id=".$dbtid;

$qryupdate=mysql_query("update transactions_account set account_type='$accounttype', billno='$billno', contractname='$contractname',contractamount='$contractamount',paidamount='$paidamount',dueamount='$dueamount',comments='$comments',paymenttype='$paymenttype',ponumber='$ponumber',transaction_date=NOW() where id=".$dbtid) or die(mysql_error());


if($qryupdate)
{
$url="account_debit_transactions.php";

echo "<script> alert('Account details Updated successfully ');</script>";
	 echo '<script type="text/javascript">';
      echo 'window.location.href="'.$url.'";';
      echo '</script>';

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
		<a href="#" class="add_page_button">Transaction Details<span class="fa fa-plus"></span> </a>
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
	 	 <div class="row">
	 
	 	<div id ="createform" style="display:block"> 
		
				<form id="defaultForm" method="post" action="" class="form-horizontal" enctype="multipart/form-data">
			
			
				<div class="clearfix"></div>
					<div class="col-sm-2">Transaction type</div>	
					<div class="col-sm-3">	
			
               <select class="selectBox-dropdown" style="padding:3%;" name="accounttype">
					   	<option value="">Select Type</option>
						  	<option value="Credit">Credit</option>
							  	<option value="Debit">Debit</option>
								 
						
                       </select>
						
                     </div>
				<div class="clearfix"></div>	<div class="clearfix"></div>
			
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

	 	<div id ="accresult" style="display:none;"> 
		 
			</div>

			   		 </div>
 </div>
			   <div class="clearfix"></div>
		
 <div class="box-content box"> 
		    <div class="row">
			<form id="defaultForm" method="post" action="" class="form-horizontal" enctype="multipart/form-data">
			
				<div class="col-sm-3">	
			
                    <input type="text" class="form-control" placeholder="Enter Bill No" name="billno"   >
						
                     </div>
					 
					<!-- 	<div class="col-sm-3">	
			
                    <input type="text" class="form-control"   placeholder="Enter PO Number" name="ponumber"   >
						
                     </div>
					 
				<div class="col-sm-3">	
			
                    <input type="text" class="form-control"  placeholder="Enter Contract Name"  name="contractname"   >
						
                     </div> -->
					 <div class="col-sm-3">	
			
               <select class="selectBox-dropdown" style="padding:3%;" name="accounttype">
					   	<option value="">Select Type</option>
						  	<option value="Credit">Credit</option>
							  	<option value="Debit">Debit</option>
								 
						
                       </select>
						
                     </div>
					   <div class="clearfix"></div>  <div class="clearfix"></div>
					   <div class="col-sm-3">
			
                    <input type="submit" name="getmaintadetails" class="btn btn-danger" value="Search"/>
                    </div>
					
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
					 </form>
					 </div>
			    <div class="row">
			<h3 class="add_page_button">REPORTS</h3>
		    <div class="col-lg-12">
		
			<div id="printthis">			
    <table class="table_st_1">
                	<tr>
					   <th>S.NO</th>
					    <th>Bill No</th>
						   <th>PO No</th>
                    	<th>Contract Name </th>
						<th>Contract Amount</th>
								<th>Contract Paid Amount</th>
										<th>Contract Due Amount</th>
												<th>Transaction Type</th>
										<th>Payment Type</th>
                          <th> Date</th>
					      <th> ACTION </th>	
					</tr>
						<?php
						if(!isset($_POST['getmaintadetails']))
		            { 
					$acctqry=mysql_query("select * from  transactions_account ORDER BY id DESC");			
				$i=1;
		
					while($acc_rec=mysql_fetch_array($acctqry))
					{ 
						
					$debit_billno=$acc_rec['billno'];
							$debit_ponum=$acc_rec['ponumber'];
					$debit_contractname=$acc_rec['contractname'];
							$debit_contractamount=$acc_rec['contractamount'];
					$debit_paidamount=$acc_rec['paidamount'];
					$debit_dueamount=$acc_rec['dueamount'];
							$debit_paytype=$acc_rec['paymenttype'];
									$account_type=$acc_rec['account_type'];
						$debit_date=$acc_rec['transaction_date'];
					?>
						<div id="allresults">
                    <tr>
					<td><?php echo $i; ?></td>
                    	<td><?php echo $debit_billno; ?></td>
						
						<td><?php echo $debit_ponum; ?></td>
				
                        <td><?php echo $debit_contractname; ?></td>
						                  <td><?php echo $debit_contractamount; ?></td>
                        <td><?php echo $debit_paidamount; ?></td>
						         <td><?php echo $debit_dueamount; ?></td>
								     <td><?php echo $account_type; ?></td>
								 
								 <td><?php echo $debit_paytype; ?></td>
									<td>
                      <?php  
				     echo date('h:i:s a m/d/Y', strtotime($debit_date));
 							  ?>
                        </td> 
<td>
		<i class="fa fa-edit" onClick="fun1('<?php echo $acc_rec['id']; ?>')"></i> &nbsp;&nbsp;&nbsp; 

						<i class="fa fa-times"  onclick="fundel('<?php echo $acc_rec['id'];?>'); " ></i></td>	
						</tr>
						</div>
                  
              
					<?php 
					$i++;
					}
					}
					else
					{
					
				
		if(isset($_POST['getmaintadetails']))
					{
					
$billno=$_POST['billno'];

$contractname=$_POST['contractname'];

$ponumber=$_POST['ponumber'];

$accounttype=$_POST['accounttype'];

 echo "Select * 
from  transactions_account as comp 
where  comp.contractname= '$billno' 
   or comp.billno= '$billno' or comp.ponumber='$billno'";


 //$qry="select * from  transactions_account  where 1";
 $qry="SELECT * FROM transactions_account AS comp WHERE "; 
 //comp.contractname LIKE  '%a%'
//OR comp.billno LIKE  '%a%'";
				if($_POST['billno']!="")
				{
				
			 $qry.=" comp.contractname= '$billno' 
   or comp.billno= '$billno' or comp.ponumber='$billno'";
   
				}
		if($_POST['accounttype']!="")
				{
			 $qry.=" or comp.account_type='$accounttype'";
			 	
				}
				$qry.=" ORDER BY id DESC";
		echo $qry;
$myqry=mysql_query($qry) or die(mysql_error());
if(mysql_num_rows($myqry)>0)
{
	$i=1;
while($get_mant=mysql_fetch_array($myqry))
{
			$debit_billno=$get_mant['billno'];
							$debit_ponum=$get_mant['ponumber'];
					$debit_contractname=$get_mant['contractname'];
							$debit_contractamount=$get_mant['contractamount'];
					$debit_paidamount=$get_mant['paidamount'];
					$debit_dueamount=$get_mant['dueamount'];
							$debit_paytype=$get_mant['paymenttype'];
									$account_type=$get_mant['account_type'];
						$debit_date=$get_mant['transaction_date'];

 ?>
<tr>
					<td><?php echo $i; ?></td>
                    	<td><?php echo $debit_billno; ?></td>
						
						<td><?php echo $debit_ponum; ?></td>
				
                        <td><?php echo $debit_contractname; ?></td>
						                  <td><?php echo $debit_contractamount; ?></td>
                        <td><?php echo $debit_paidamount; ?></td>
						         <td><?php echo $debit_dueamount; ?></td>
								     <td><?php echo $account_type; ?></td>
								 
								 <td><?php echo $debit_paytype; ?></td>
									<td>
                      <?php  
				     echo date('h:i:s a m/d/Y', strtotime($debit_date));
 							  ?>
                        </td> 
<td>
		<i class="fa fa-edit" onClick="fun1('<?php echo $get_mant['id']; ?>')"></i> &nbsp;&nbsp;&nbsp; 

						<i class="fa fa-times"  onclick="fundel('<?php echo $get_mant['id'];?>'); " ></i></td>	
						</tr>


<?php
	$i++;
}
					
					}
					}
					}
					?>
					
                </table>
			</div>
		
					</div>
					</div>

				
	
	
	
	
	</div>

	
		
		</div>
		<!--End Content-->
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

$.post("delete_debit_details.php",{debitid:delid},function(data) { location.reload();
//$(".delresult").html(data);
});

}
</script>

<script>

function fun1(id)
{
//alert(id);
//localStorage.setItem('lastname',id);


 $.post("debit_edit_details.php",{deb_id:id},function(data) { //location.reload();
$("#createform").hide();
$("#accresult").show();
$("#accresult").html(data);
//alert(data);
});
}
</script>

<!-- Debit Transactiona -->

<script>
function fundel(delid)
{

$.post("delete_debit_details.php",{debitid:delid},function(data) { location.reload();
//$(".delresult").html(data);
});

}
</script>





<!--Credit  Transactiona -->

<script>
function fun_del(delid)
{

$.post("delete_credit_details.php",{debitid:delid},function(data) { location.reload();
//$(".delresult").html(data);
});

}
</script>

<script>

function fun1_edit(id)
{
//alert(id);
//localStorage.setItem('lastname',id);


 $.post("credit_edit_details.php",{deb_id:id},function(data) { //location.reload();
$("#createform").hide();
$("#accresult").html(data);
$("#accresult").show();

//alert(data);
});
}
</script>
<?php include("footer.php"); ?>

<script src="js/footer_js.js"></script>
</body>
</html>
