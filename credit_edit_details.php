<?php
session_start();
$page="maintenance";
include_once('dbFunction.php');
$obj = new dbFunction();
$apartment_id=1;

$debid=$_POST['deb_id'];
//echo $debid;
//echo "select * from credit_account where credit_id=".$debid;
$getdec_acc=mysql_query("select * from credit_account where credit_id=".$debid) or die(mysql_error());
if(mysql_num_rows($getdec_acc)>0)
{
$rec_accdet=mysql_fetch_array($getdec_acc);
}
echo $dbid=$rec_accdet['credit_id'];
echo $billno=$rec_accdet['credit_billno'];
echo $conname=$rec_accdet['credit_contractname'];

echo $conmoney=$rec_accdet['credit_contractamount'];
echo $paidamnt=$rec_accdet['credit_paidamount'];

echo $dueamt=$rec_accdet['credit_dueamount'];
echo $comm=$rec_accdet['credit_comments'];

echo $paytype=$rec_accdet['credit_paymenttype'];
echo $ponum=$rec_accdet['credit_ponumber'];


?>


<?php
?>
<form id="defaultForm" method="post" action="" class="form-horizontal" enctype="multipart/form-data">
			
				<div class="col-sm-2">PO No</div>	
					<div class="col-sm-3">	
			  <input type="hidden" class="form-control"  name="dbtid"  value="<?php echo $dbid;?>" >
                    <input type="text" class="form-control"  name="ponumber"  value="<?php echo $ponum;?>" >
						
                     </div>
					 	  	<div class="clearfix"></div>
					<div class="col-sm-2">Bill No</div>	
					<div class="col-sm-3">	
			
                    <input type="text" class="form-control"  name="billno"  value="<?php echo $billno;?>" >
						
                     </div>
					 	  	<div class="clearfix"></div>
						
					<div class="col-sm-2">Contract Name</div>	
					<div class="col-sm-3">	
			
                    <input type="text" class="form-control"  name="contractname"  value="<?php echo $conname;?>" >
						
                     </div>
					 	  	<div class="clearfix"></div>	  	<div class="clearfix"></div>
					 <div class="col-sm-2">Contract Amount </div>	
					<div class="col-sm-3">	
			
                    <input type="text" class="form-control"  name="contractamount"  value="<?php echo $conmoney;?>" >
						
                     </div>
				 	<div class="clearfix"></div>	 

					
					<div class="clearfix"></div>
					 <div class="col-sm-2">Payment Type </div>	
					<div class="col-sm-3">	
			     <select class="selectBox-dropdown" style="padding:3%;" name="paymenttype">
					   	<option value="">Select Type</option>
						  	<option value="cash"<?php if($paytype == "cash"){ echo 'selected="selected"';} ?>>Cash</option>
							  	<option value="dd"<?php if($paytype == "dd"){ echo 'selected="selected"';} ?>>DD</option>
								  	<option value="cheque"<?php if($paytype == "cheque"){ echo 'selected="selected"';} ?>>cheque</option>
						
                       </select>
						
                     </div> 
					
					
	  	            <div class="clearfix"></div>
					 <div class="col-sm-2">paid Amount </div>	
					<div class="col-sm-3">	
			
                    <input type="text" class="form-control"  name="paidamount" value="<?php echo $paidamnt;?>" >
						
                     </div> 

					<div class="clearfix"></div>
					 <div class="col-sm-2">Due Amount </div>	
					<div class="col-sm-3">	
			
                    <input type="text" class="form-control"  name="dueamount" value="<?php echo $dueamt;?>" >
						
                     </div>
					 
				
					 	<div class="clearfix"></div>
					 <div class="col-sm-2">Comments </div>	
					<div class="col-sm-3">	
			
                    <textarea  name="comments"  class="form-control"  style="margin: 0px; width: 256px; height: 105px;" > <?php echo $comm;?> </textarea>
						
                     </div>
                  
				  
				  	<div class="clearfix"></div><br><br>

                     <div class="col-sm-3">
			
                 
                <input type="submit" name="creditupdatedetails" id="update"  class="btn btn-danger" value="Update" />
                  
					
					
					</div>
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
				</form>

