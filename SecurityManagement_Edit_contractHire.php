<?php
$page="security";
include_once('dbFunction.php');
$obj = new dbFunction();
$get_blocks=$obj->getsecurity_contract_details();
$getag=$obj->getagency_details();
$code1="";$code2="";$code3="";$code4="";$code5="";$code6="";$code7="";$code8="";
if(isset($_POST['security']))
{
$cat=$_POST['cat'];
$name=$_POST['name'];
$lname=$_POST['lname'];
$mbno1=$_POST['mbno'];
$mbno=serialize($mbno1);
$code=$_POST['code'];

$shift=$_POST['shift'];
$address=$_POST['address'];

$email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];

if($cat=="Select Category" || $name=="" || $lname=="" || $mbno1==""|| $code==""|| $shift=="" || $address==""  )
{
if($cat=="Select Category")
{
$code1="Select Category";
}
if($name=="")
{
$code2="Enter Name";
}
if($lname=="")
{
$code3="Enter Last Name";
}
if($mbno1=="")
{
$code4="Enter Mobile no";
}
if($code=="")
{
$code5="Enter Code";
}

if($shift=="")
{
$code7="Enter the Shift";
}
if($address=="")
{
$code8="Enter the Address";
}
}
else
{
if($password != $cpassword)
{
$code9="Password not match";
}

/*
//Signle image upload...
$time=round(microtime(true) * 1000);
$img_name=$_FILES['myfiles']['name'];
$file_tmp=$_FILES["myfiles"]["tmp_name"];
if($img_name!="")
{
  $filename=$time.'_'.$img_name;
$path_parts = pathinfo($filename);
   $fname1=str_replace(' ','',$path_parts['filename']);
  // echo $fname1;
    $fname1=str_replace('@','',$fname1);
    $name1=$fname1.'.'.$path_parts['extension'];
      $newFilePath = $name1;
	 // echo $newFilePath;
move_uploaded_file($file_tmp,"uploads/".$newFilePath);
}
else 
{
$newFilePath="";
}
*/
//multiple image start code
else
{

//Signle image upload...
$time1=round(microtime(true) * 1000);
$imgname=$_FILES['img']['name'];


$file_tmp2=$_FILES["img"]["tmp_name"];
if($imgname!="")
{
$file_name2=$time1.'_'.$imgname;
$path_parts = pathinfo($file_name2);
//print_r($path_parts);
   $fname2=str_replace(' ','',$path_parts['filename']);
  // echo $fname2;
   $fname2=str_replace('@','',$fname2);
    $name2=$fname2.'.'.$path_parts['extension'];
      $newFilePath2 = $name2;


move_uploaded_file($file_tmp2,"uploads/security_gallery/".$newFilePath2);
}
else 
{
$newFilePath2="";
}

//multiple file upload
if($_FILES['myfiles']['name']!=""){

$file_name_all="";
	            for($i=0; $i<count($_FILES['myfiles']['name']); $i++) 
	            {
	                   $tmpFilePath = $_FILES['myfiles']['tmp_name'][$i];    
	                   if ($tmpFilePath != "")
	                   {    
	                       $path = "uploads/Security_multiple_images/";
	                       $name1 = $_FILES['myfiles']['name'][$i];
	                      $size = $_FILES['myfiles']['size'][$i];
	       
	                       list($txt, $ext) = explode(".", $name1);
	                       $file= time().substr(str_replace(" ", "_", $txt), 0);
	                       $info = pathinfo($file);
	                       $filename = $file.".".$ext;
	                       if(move_uploaded_file($_FILES['myfiles']['tmp_name'][$i], $path.$filename)) 
	                       { 
	                          date_default_timezone_set ("Asia/Calcutta");
	                          $currentdate=date("d M Y");
	                          $file_name_all.=$filename.",";
	                       }
	                 }
	            }
	        $newFilePath = rtrim($file_name_all, ','); //imagepath if it is present   

	        }
	        else
	        {
	            $newFilePath="";
	        } //multiple end

$data=$obj->create_security($cat,$name,$lname,$mbno,$code,$shift,$address,$newFilePath,$password,$email,$newFilePath2);

if($data==1)
{
//echo "<script> alert('Security Created Successfully');</script>";
header("location:SecurityManagement_AddPersonal.php?sadd=success");
}


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
		<a href="#" class="add_page_button">Add Staff <span class="fa fa-plus"></span> </a>
        <div class="clearfix"></div>
		
		<span style="color:red">
		<?php 
		if($_REQUEST['sadd']=="success")
		{
		echo "Security Added Successfully";
		}
		if($_REQUEST['cadd']=="success")
		{
		echo "Security Updated Successfully";
		}
		?>
		</span>
        <div class="box-content box">
		
				<form id="defaultForm" method="post" action="" class="form-horizontal" enctype="multipart/form-data">
					
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
                    
                    
                    <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Name" name="name" /><?php	if(isset($code2)){echo $code2; } ?></div>
                    <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Last name" name="lname" /><?php	if(isset($code3)){echo $code3; } ?></div>
                    <div  class="col-sm-3">
<input type="text" class="form-control" placeholder="Mobile" name="mbno[]" />
<span style="color:red"><?php	if(isset($code4)){echo $code4; } ?></span>
    </div>        <div  class="col-sm-3">
<div style="color:red" class="plus"><span class="fa fa-plus" onclick="return addPerson();"></span></div>
                  		<input type="hidden" id="counter_txt" value="1" />
                    </div>

                    <!-- NEW PERSONS ADDED WILL BE APPENDED INTO THIS DIV -->
                    <div id="newPersons_div" class='col-sm-12' style="padding:0px; margin:0px;"></div>
                    <div class="clearfix">
					</div>
<div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Email" name="email" />
                             <?php
                                      if($data==2)
                                      {
                                      echo "Email Already Exist..";
                                       }
									   ?>     
</div>
                            <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="password" name="password" /></div>
                    <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Confirm password" name="cpassword" /><?php	if(isset($code8)){echo $code8; } ?></div>
                    <div class="clearfix">
					</div>      
                    <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Code" name="code" /><?php	if(isset($code5)){echo $code5; } ?></div>
                <!--    <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Name of the company" name="cname" /><?php	//if(isset($code6)){echo $code6; } ?></div> -->
                  

<div class="col-sm-3">
					<span style="color:red">
					 <?php
					 if(isset($code1))
					 { 
					 echo $code1;
					 } 
					 ?>
					 </span>
			
					    <select  name="cat">
                    	<option >Select Company</option>
						 		<?php 
						
						while($row=mysql_fetch_array($getag))
						{

		if( $_SESSION['agencyid']!="")
		{
	echo 	$a_id=$_SESSION['agencyid'];
		//$get_agen_det=$obj->get_agency_company($a_id);
		}
		$get_cmp=mysql_query("select * from agency where agency_id=".$a_id);
		$agn_company=mysql_fetch_array($get_cmp);
		$company_name=$agn_company['agency_companyname'];
		
						?>
<option value="<?php echo $row['agency_companyname'];?>"  <?php if($company_name==$row['security_cat'])
		{ echo 'selected="selected"'; }?> ><?php echo $row['agency_companyname'];?></option>
                   
                       
                      <?php } ?>
                       </select>
                    </div>
				  <div style="color:red" class="col-sm-3"><input type="text" class="form-control" placeholder="Shift type" name="shift" /><?php	if(isset($code7)){echo $code7; } ?></div>
                    <div class="col-sm-3"><button class="btn btn2_blank btn2 wid_auto"> <span class="fa fa-clock-o"></span> </button></div>
                    <div class="clearfix"></div>
                    
                 <div class="col-sm-3">    <div style="color:red" lass="col-sm-6"><input type="text" class="form-control" placeholder="Address" name="address" /><?php	if(isset($code8)){echo $code8; } ?></div>
                 	</div>
					<div class="col-sm-3">
                    <div class="custom-file-upload"><input type="file"  placeholder="Upload ID" name="myfiles[]"  /></div>
                    </div>	<div class="col-sm-3">
                    <div class="custom-file-upload"><input type="file"  placeholder="Upload Image" name="img"  /></div>
                    </div>
                    <div class="col-sm-3"></div>
                    <div class="clearfix"></div>
                    
                    
                    <div class="col-sm-3">

                    <input type="submit" name="security" class="btn btn-danger" value="Save"/>
                    </div>
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
					
				</form>
                 <div class="clearfix"></div>
			</div>
      	
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
		var newPerson = $("<div id='newdiv"+counter+"' class=\"col-sm-12\" style=\"padding:0px; margin:0px;\"><div class=\"col-sm-3\"><input type=\"text\" class=\"form-control\" placeholder=\"Mobile No\" name=\"mbno[]\" id='mbno1"+counter+"' /></div><div class=\"col-sm-3\"><div class=\"cross\"><span class=\"fa fa-times\" onclick=\"return delPerson("+counter+");\"></div></span></div><div class=\"clearfix\"></div></div>");
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

<script type="text/javascript">
		  // $(document).ready(function(){
            // $('select').selectBox({ mobile: true });
		// });
		
</script>
<?php include("footer.php"); ?>
<script src="js/footer_js.js"></script>
</body>
</html>
