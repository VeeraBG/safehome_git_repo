<?php
session_start();
include_once('dbFunction.php');
$obj = new dbFunction();


//calculation



$get_aprt_det=mysql_query("select * from apartment_area_details ORDER BY id DESC limit 1");
$num_check=mysql_num_rows($get_aprt_det);
if($num_check>0)
{
$main_amount=mysql_fetch_array($get_aprt_det);
}

$apt_main_amount=$main_amount['apartment_maintain_amount'];
$squarefeet_per=$main_amount['sqft_per_rate'];



// $get_sqper=mysql_query("select * from setup ORDER BY setup_id DESC limit 1");
// $sqr_check=mysql_num_rows($get_sqper);
// if($sqr_check>0)
// {
// $sq_per=mysql_fetch_array($get_sqper);
// }

// $squarefeet_per=$sq_per['setup_sqft'];






$block_id=$_POST["blockid"];
$floor_id=$_POST["floorid"];
$flat_id=$_POST["flatid"];

 $sql="SELECT * FROM owner WHERE owner_block ='$block_id' and owner_floor='$floor_id' and owner_flat='$flat_id'";
$result = mysql_query($sql);
$area_flat_amount=0;
$owner_paidtobe_total=0;
while($row = mysql_fetch_array($result))
{


//calculation

$owner_flat_area=$row['owner_sqft'];
$area_flat_amount=$squarefeet_per*$owner_flat_area;
//$owner_paidtobe_total=$apt_main_amount+$area_flat_amount;
$owner_paidtobe_total=$area_flat_amount;
$ownerid=$row['owner_id'];

$ownername=$row['owner_name'];
$ownernopersons=$row['owner_person1_name'];
if($row['owner_status']=="Active")
 {
$_SESSION['totsqrfeet']=$row['owner_sqft'];
	
	$imagepath="uploads/owner_gallery/".$row['owner_image'];
if(file_exists($imagepath) && $row['owner_image']!='')
{
	$image=$imagepath;
}
else 
{
	$image="img/profile-icon.png";
}
	
// $owner_email=$row['owner_email'];	
// $oemail=$_SESSION[$owner_email];
echo "<input type='hidden' class='form-control' name='ownerid' value='".$row['owner_id']."'>";
 echo "<input type='hidden' class='form-control' name='email' value='".$row['owner_email']."'>";
echo "<input type='hidden' class='form-control' name='owner_name' value='".$row['owner_name']."'>";
 echo "<input type='hidden' class='form-control' name='ownerflatsqft' value='".$row['owner_sqft']."'>";
 
 // echo "<br>";


// echo "<br>";
// echo "<input type='text' class='form-control' name='ownername' value='".$row['owner_name']."'>";
// echo  "<img src='".$image."' width='100' height='100' class='img-rounded'/>	";	
 
 $emailid=$row['owner_email'];
 $owner_nam=$row['owner_name'];
 $flatarea=$row['owner_sqft'];
 
 //echo "<div class='row'><div class='col-md-2'><img src='".$image."' width='100' height='100' class='img-rounded'/></div>";	

//echo "<br><div class='col-md-3'><b>Email- </b>".$row['owner_email'];

//echo "<br><b>Name- </b>";

//echo $row['owner_name'];

//echo "<br><b>Flat Area(in Sqft)- </b>";

//echo $row['owner_sqft'];
//echo "<br><br>";

//echo "<br><b>Total (Maintenance amount($apt_main_amount) +flat amount ($squarefeet_per Rs * $owner_flat_area sqft) (sqft))= </b>";

//echo $owner_paidtobe_total;
//echo "<br><br></div>";
echo  	"<div class='clearfix'></div>
					<div class='col-sm-3'>	
				
                    <input type='hidden' class='form-control'  name='maintanamount' 
					placeholder='Maintenance Amount' value='".$owner_paidtobe_total."'>					
                     </div>";

echo "<h5><b>FIXED MAINTENANCE AMOUNT</b></h5> <table class='table_st_1'>
                	<tr>
					   <th>Image</th>
					   
						   <th>Name</th>
                    	<th>Flat Area </th>
						<th>Fixed Amount/Month</th>
						<th>Amount Due</th>
						<th>Arrears</th></tr>
						
						
						<tr>
					
                    	<td> <img src='".$image."' style='width:50px;  height:50px;' class='img-rounded'/></td>
						
						
				
                        <td>$owner_nam</td>
					 <td>$flatarea</td>
                        <td>$owner_paidtobe_total</td>
						   <td>2000 rs</td>
						 <td>100 rs</td></tr></table><br><br><div class='clearfix'></div>";

//echo "<br><b>Mobile-</b>".$row['owner_mobile'];
//echo "<br><b>Total Persons-</b>";
//echo $row['owner_no_persons']."</div>";

}
}	

	
					
     echo  "<div class='col-sm-3'></div>
                    <div class='clearfix'></div>
                    <div class='col-sm-9'>
                 </div>


       
				  	<div class='clearfix'></div>
					<h5><b>VARIABLE MAINTENANCE AMOUNT </b></h5>";
					
				
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
// echo $my_stored_variable
$varcount=count($my_stored_variable);
echo "<input type='hidden' name='varcount' value='$varcount'>";
for($i=0;$i<count($my_stored_variable); $i++)
{

?>
	<?php
				echo "<div class='col-sm-2'>				
                   <input type='hidden' name='keym[]' value='$my_stored_variable[$i]'>
				  Add  $my_stored_variable[$i] Amount: </div>
				  	<div class='col-sm-3'>	
				  
				  <input type='text' class='form-control'  name='amount[]' value=''>
					
                     </div>
               
						
					  	<div class='clearfix'></div>";
					
					
					} 

					} 
					?> 		
				  
            
               <?php   echo  "<div class='clearfix'></div>"; ?>		

	
