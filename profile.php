<?php
$page="profile";
session_start();
include_once('dbFunction.php');
 $obj = new dbFunction();
 //$email=$_SESSION['email'];
 $sadminid=$_SESSION['adminid'];
 
 $getadmin=$obj->getadmin($sadminid);
$email=$_SESSION['email'];

if(isset($_POST['pchange']))
{

$opassword=$_POST['opassword'];
$npassword=$_POST['npassword'];
$cpassword=$_POST['cpassword'];

// echo $password;
// echo $cpassword;
 $obj = new dbFunction();
$data1=$obj->change_super_pwd($sadminid,$npassword,$opassword,$cpassword);
if($data1==1)
{
//echo "<script> alert('Password Changed Successfully');</script>";
//header("location:profile.php?pwdchange=success");
$pwdchang="password changed successfully";
//$msg1="Password Changed Successfully";
}
if($data1==2)
{
//echo "<script> alert('Enter valid Old Password');</script>";
//header("location:profile.php?old=success");
$pwdchange1="Enter valid Old Password";
//$msg1="Enter valid Old Password";
}

if($data1==3)
{
//echo "<script> alert('password not matched');</script>";
//header("location:profile.php?pwdnot=success");
 $pwdchange2="Password NOT Matched";
 //$errormsg="password not matched";
}
}
if(isset($_POST['update123']))
{
$admin=$_POST['aname'];
$designation=$_POST['designation'];
$mob=$_POST['mob'];
$time=round(microtime(true) * 1000);
$img_name=$_FILES['img']['name'];
$file_tmp=$_FILES["img"]["tmp_name"];
if($img_name!="")
{
  $filename=$time.'ravi'.$img_name;
$path_parts = pathinfo($filename);
 $fname1=str_replace(' ','',$path_parts['filename']);
 $fname1=str_replace('@','',$fname1);
 $name1=$fname1.'.'.$path_parts['extension'];
 $newFilePath = $name1;
 move_uploaded_file($file_tmp,"uploads/adminimages/".$newFilePath);
$obj = new dbFunction();
$update=$obj->change_super_update($sadminid,$admin,$designation,$mob,$newFilePath);
if($update==1)
{
// header("location:profile.php");
	echo '<script type="text/javascript">'; 
		echo 'window.location.href="profile.php";'; 
		echo '</script>';
echo "update success";
}
}
 else
{
 $obj = new dbFunction();
 $update=$obj->change_super_update1($sadminid,$admin,$designation,$mob,$newfilepath);
 if($update==1)
 {
	 // header("location:profile.php");
	echo '<script type="text/javascript">'; 
		echo 'window.location.href="profile.php";'; 
		echo '</script>';
 echo "update success";
 }
 }

}

?>



<?php
$page="visitor";
include_once('dbFunction.php');
$obj=new dbFunction();
$get_visidata=$obj->view_visitor_today();

if(isset($_POST['sendemail']))
{

$toemail=$_POST['toemail'];



  
if($get_visidata){


 $message = "  <table border='1'> <tr><th>Visitor Name</th></th>Mobile No</th><th>Address</th><th>Block</th><th>Floor</th><th>Flat</th><th>Whoom To Meet</th></tr>";?> 
	 <?php

			while($sql_get=mysql_fetch_array($get_visidata))
				{
			
						// print_r($sql_get);
				$date=$sql_get['visitor_date'];
				$time=date('h:i:s a', strtotime($date)); 

// visitor name
$var1 = unserialize($sql_get['visitor_fname']);  
$var2 = unserialize($sql_get['visitor_lname']);  
$name=$var1[0].' '.$var2[0];

//mobile
$var3 = unserialize($sql_get['visitor_mobile']);  
$mobile=$var3[0]; 

//address
 $address=$sql_get['visitor_address'];
 $block=$sql_get['visitor_block'];

$flat=$sql_get['visitor_flat'];
$floor=$sql_get['visitor_floor'];
$persontomeet=$sql_get['visitor_persontomeet'];


$subject = "Test SafeHome"; 

     $message .=  "<tr><td>".$name."</td><td>".$mobile."</td><td>".$address."</td><td>".$block."</td><td>".$floor."</td><td>".$flat."</td><td>".$persontomeet."</td></tr>";

}
		$message.=  " </table> ";
$headers = "From: isha.mallesh@gmail.com" . "\r\n" ;
$to=$toemail;
  //send email
 $headers = 'MIME-Version: 1.0' . "\r\n";
 $headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers.= 'From: <isha.mallesh@gmail.com> '."\n";
$sen_email=mail($to,$subject,$message,$headers);
if($sen_email)
{
//echo "<script> alert('Mail sent successfully');</script>"; 
// $url="profile.php";
// echo '<script type="text/javascript">';
      // echo 'window.location.href="'.$url.'";';
      // echo '</script>';
	header("location:profile.php");  
}
}
}
?>



<!DOCTYPE html>
<html lang="en">
<?php include("top_header.php"); ?>

<head>
<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
</head>
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
	<style>
	table,td{
		font-size:13px;
	}
	</style>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<?php include("leftmenu.php"); ?>
		
		<div class="result"> </div>
		<!--Start Content-->
		<span style="color:red;font-size:25px">
		<?php 
		if(isset($pwdchange))
		{
		echo $pwdchange;
		
		}
		if(isset($pwdchange1))
		{
		echo $pwdchange1;
		
		}
		if(isset($pwdchange2))
		{
		echo $pwdchange2;
		
		}
		?>
		</span>
		<div id="content" class="col-xs-12 col-sm-10">

      
        <div class="clearfix"></div>
     		<?php 	$get_rec=mysql_fetch_array($getadmin); ?>
			
           <div id="details" style="display:block;" >     <table class="table_st_1" style="width:40%;">
                	
					<tr> 
					<td rowspan="5"><img src="uploads/adminimages/<?php echo $get_rec['admin_image']; ?>" 
					class="img-rounded" width="200" height="200" ></td>
                    	<td>Name:</td><td><?php echo $get_rec['admin_name']; ?></td> </tr>
                      	<tr><td>Designation:</td><td><?php echo $get_rec['admin_designation']; ?></td></tr>
                        <tr><td>CellNO</td><td><?php echo $get_rec['admin_mob']; ?></td></tr>
<tr><td colspan="2"><a href="javascript:" onClick="myshow()" style="color:red;font-size:15px">Change password??</a></td></tr>
    
				                </table></div>
								<form action="" method="post" enctype="multipart/form-data">
					<div id="change" style="display:none;margin-top:5%;" >
						   <div class="row">
						   <div  class="col-md-3">
				<input class="form-control" type="password" name="opassword"  placeholder="Enter old password" >
				</div>
				</div>
						   <div class="row">
						   <div  class="col-md-3">
                <input  class="form-control" type="password" name="npassword" placeholder="Enter NEW password" >
					</div>
				</div>
						   <div class="row">
						   <div  class="col-md-3">
                 <input class="form-control" type="password" name="cpassword" placeholder="Enter Confirm password">
				 	</div>
				</div>
						   <div class="row">
						   <div  class="col-md-1">
				 <input class="btn btn-danger" type="submit"  name="pchange"  id="save" value="Save"  style="display:block;" >
				 </div>
				 			   <div  class="col-md-1">
		<a class="btn"  href="javascript:" id="cancel" onClick="pcancel()" style="display:block;color:#444;text-decoration:none;padding-left:16%;" >Cancel</a>
				</div>
				</div>
				</div>
		

			<div class="clearfix"></div>
		
		
          		
    <div id="tbox" style="display:none;margin-top:10px;" > 
		      <div class="row">
		   <div class="col-md-3" style="width:20%;">
		   <img src="uploads/adminimages/<?php echo $get_rec['admin_image']; ?>" width="200" height="200" >
		   </div>
		      <div class="col-md-8">
		   <div class="row">
		   <div class="col-md-2" style="width:10.5%;">Name</div>
<div class="col-md-3">
<input class="form-control" type="text"  name="aname" value="<?php echo $get_rec['admin_name']; ?>" class="form-control" />
</div>
	   </div>
		   <div class="row">
<div class="col-md-2" style="width:10.5%;">Designation</div>
<div class="col-md-3"><input class="form-control"  type="text"  name="designation"
		 value="<?php echo $get_rec['admin_designation']; ?> "/></div>
		   </div>

		   <div class="row">
<div class="col-md-2" style="width:10.5%;">Mobile No.</div><div class="col-md-3"><input class="form-control"  type="text"	
name="mob" value="<?php echo $get_rec['admin_mob'];?>"/></div>
  </div>
		   <div class="row">
<div  class="col-md-2"  style="width:10.5%;">Image</div>
<div  class="col-md-3"><input type="file"  name="img" /></div>
   </div>
	 </div> </div>
	
		</div>

								
		        	<div class="clearfix"></div><br/>
					 <div class="row">
			<div class= "col-md-1">		

<a class="btn"  href="javascript:" id="canceel" onClick="editcancel()" style="display:none;color:#444;text-decoration:none;padding-left:16%;" >Cancel</a>
			</div>
			<div class= "col-md-1">
				<a class="btn btn-danger" href="javascript:" onClick="myupdate()" id="edit123" style="display:block"  >Edit</a>
			<input class="btn btn-danger" type="submit"  id="update" name="update123" value="update"  style="display:none;" >
			<!--<a class="btn btn-danger" href="javascript:" onClick="myupdate()" id="edit123" >Edit</a>-->
</div> 
		</div>
		
		 </form>
		 	 <div class="row">
			 <h5>Send Today Visitors data</h5>
			 </div>
			  <div class="row">
	<form action="" method="post">		
<div class="col-md-3">
<input class="form-control" type="text"  placeholder="Enter Email" name="toemail" value="" class="form-control" />
<span style="color:red">

</span>
</div>
<div class= "col-md-1">
				
			<input class="btn btn-danger" type="submit" name="sendemail" value="SendEmail">
			<!--<a class="btn btn-danger" href="javascript:" onClick="myupdate()" id="edit123" >Edit</a>-->
</div> 
</form>

</div>

			
     
				</div>
		<!--End Content-->
	</div>

<!--End Container-->
<script>
function pcancel()
 {
 $('#details').show();
 $('#change').hide();
 $('#delete').show();
 $('#edit123').show();


}
</script>
<script>
function editcancel()
 {
//window.location.href("profile.php");
  $('#details').show();
 $('#edit123').show();
 $('#delete').show();
 $('#update').hide();
 $('#tbox').hide();
 $('#canceel').hide();
 }
</script>
<script>
function myshow() {
 $('#change').show();
$('#delete').hide();
$('#edit123').hide();
}
</script>

<script>
function myupdate() {
$('#edit123').hide();
$('#details').hide();
$('#tbox').show();
$('#update').show();
$('#delete').hide();
$('#canceel').show();


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
function fun1(email)
{
alert(email);

$.post("edit_superadmin.php",{email:email},function(data ) { 
 $( ".result" ).html('MY Email ID is - '+data );
});



}
</script>
<?php include("footer.php"); ?>
<script src="js/footer_js.js"></script>
</body>
</html>
