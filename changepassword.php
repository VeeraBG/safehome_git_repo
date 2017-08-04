<?php
$page="cpwd";
include_once('dbFunction.php');
$email=$_SESSION['email'];

if(isset($_POST['owner']))
{

$opassword=$_POST['opassword'];
$npassword=$_POST['npassword'];
$cpassword=$_POST['cpassword'];
if($npassword==$cpassword)
{
// echo $password;
// echo $cpassword;
 $obj = new dbFunction();
$data=$obj->change_super_pwd($email,$npassword,$opassword);
if($data==1)
{
//echo "<script> alert('Password Changed Successfully');</script>";
header("location:changepassword.php?pwdchange=success");
//$msg1="Password Changed Successfully";
}
else if($data==2)
{
//echo "<script> alert('Enter valid Old Password');</script>";
header("location:changepassword.php?old=success");
//$msg1="Enter valid Old Password";
}
}
else
{
//echo "<script> alert('password not matched');</script>";
header("location:changepassword.php?pwdnot=success");
 //$errormsg="password not matched";
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
	<?php include("header.php"); ?>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<?php include("leftmenu.php"); ?>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">

        <a href="#" class="extra_page_button">owner reference code: <span>PJX 00215</span></a>
        <div class="clearfix"></div>
			<span style="color:red">
		<?php 
		if($_REQUEST['pwdchange']=="success")
		{
		echo "Password Changed Successfully";
		}
		if($_REQUEST['old']=="success")
		{
		echo "Enter valid Old Password";
		}
		if($_REQUEST['pwdnot']=="success")
		{
		echo "password not matched";
		}
		?>
		</span>
        <div class="box-content box">
		
		
				<form id="" method="post" action="" class="form-horizontal">
					
                    
                    <div class="col-sm-3"></div>
                    <div class="clearfix"></div>
                    
                    <div class="col-sm-3"><input type="text" class="form-control" placeholder="old password" name="opassword" />
					</div>
                    <div class="col-sm-3"><input type="text" class="form-control" placeholder="new password" name="npassword" /></div>
                    <div class="col-sm-3"><input type="text" class="form-control" placeholder="confirm password" name="cpassword" /></div>
                    <div class="col-sm-3"></div>
                    <div class="clearfix"></div>
                    
                    <div class="col-sm-9"></div>
                    <div class="clearfix"></div>
                    
                    <div class="col-sm-3">
					<button type="reset" class="btn">Cancel</button>
                    <input type="submit" class="btn btn-danger" name="owner" value="Save" >
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
		  $(document).ready(function(){
            $('select').selectBox({ mobile: true });
		});
		
</script>
<?php include("footer.php"); ?>
<script src="js/footer_js.js"></script>
</body>
</html>
