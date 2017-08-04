<?php
include_once('dbFunction.php');
if(isset($_POST['login']))
{
	$email=$_POST['email'];
	$password=$_POST['password'];
//echo $email;
	//echo $password;
	
	if($email=="1")
	{
	$errormsg1="login Id";
	}
		else if($password=="1")
	{
	$errormsg2="Please enter Password";
	}
	else
	{
	$obj=new dbFunction();
	 $qry=$obj->checkadminLogin($email,$password);
	
	if($qry)
	{
	$get_det=mysql_fetch_array($qry);
   $_SESSION['email']=$get_det['admin_email'];
		$_SESSION['username']=$get_det['admin_name'];
			$_SESSION['adminid']=$get_det['admin_id'];
		// header("Location:home.php");
		// echo "fgfj";
		echo '<script type="text/javascript">';
		echo 'window.location.href="home.php";';
		echo '</script>';
	
	}
	
	else
	{
	$errormsg="Invalid Login details";
	}
}
}
	

?>



<center>
<?php 
if($_REQUEST['msg']=="send")
{
	echo "<p style='color:red'>Password Sent to Your Mail ID..Please check Once..</p>";
}
 

?>



<!DOCTYPE html>

<html lang="en" class="js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" style="background: #b51a36;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/favicon-multichoice.png">
    <meta name="author" content="MultiChoice Africa">
    <title>Username / Password Sign In  - Kozy Kreative Concepts</title>
    <link href="assets/css/reset.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="assets/css/login-generic-stylesheet-v2.css" rel="stylesheet">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

   
    <meta charset="utf-8" />
    <title>Smart Security System</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="Vendor Management System" name="description" />


    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    
    <!-- ================== END PAGE LEVEL STYLE ================== -->
    <!-- ================== BEGIN BASE JS ================== -->
    <!--<script src="~/assets/plugins/pace/pace.min.js"></script> -->
    <!-- ================== END BASE JS ================== -->
</head>

<body class="pace-top flat-black  pace-done" style="    background: #b51a36;">
    <div class="mini-container">
        <header>
		<div class="row">
            <figure>
			<div class="col-sm-4"></div>
			<div id="logo" class="col-sm-4" style=" height: 69px;    width: 198px;">
			
			<a href="index.php" >
			<img src="img/logo.png" width="133" alt="MultiChoice Africa" height="79" style="background:#b51a36">
			</a>
			</div>
			<div class="col-sm-4"></div>
			</figure>
			</div>
        </header>

        <style type="text/css">
            .labelText {
                font-weight: normal;
            }

            .labelText1 {
                display: inline-block;
                margin-bottom: 5px;
                font-weight: normal;
            }


            .labelTextColor {
                font-weight: normal;
                color: #888;
            }
        </style>

        

        <div id="sign-in-container" style="width: 304px;border-radius: 6px;">
          <!--  <div id="login-logo">
                <img src="assets/sign-in-icon.png" width="66" height="66">
            </div> */-->
<form action="" class="margin-bottom-0" method="post" role="form">

                
				<p style='color:red'><?php if($errormsg1!="") { echo $errormsg1; }?>
<?php if($errormsg2!="") { echo $errormsg2; }?></p>
<input  type="text" name="email" value="" placeholder="User name" class="login_username form-control" >
<!-- <input class="form-control" data-val="true" data-val-required=" Username is required" id="Username" name="Username" placeholder="Username" title="Enter Username" type="text" value="" /><span class="field-validation-valid text-danger" data-valmsg-for="Username" data-valmsg-replace="true"></span>                <br>
  */    -->
				<input type="password" name="password" id="txtadminpassword" class="login_password form-control"  value="" placeholder="Password">
<!-- <input class="form-control" data-val="true" data-val-required="Password is required" id="Password" name="Password" placeholder="Password" title="Enter Password" type="password" /><span class="field-validation-valid text-danger" data-valmsg-for="Password" data-valmsg-replace="true"></span>                <span class="error-msg"></span>
  -->
<br>  
  <input id="Submit" type="submit" name="login" value="login" id="btnlogin" class="btn  btn-primary btn-block " style="background-color: #b51a36;    border-color: #b51a36;    width: 37%;" />
				<!--<input type="submit" name="login" value="Login" id="btnlogin" class="btn">--> 
</form></div>

        <footer id="multichoice-footer" class="clearfix" style="color: white;">
            <div class="pull-left" style="    margin-left: 130px;">Copyright © 2017 Kozy Kreative Concepts Pvt Ltd,<br> All rights reserved.</div>
        </footer>

    </div><!-- /#page-wrapper -->



</body>
</html>
<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Safe Home</title>
  <meta name="description" content="">
  <meta name="author" content="Admin">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">
<head>
	
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="css/styles2.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min2.css" rel="stylesheet" type="text/css">

<!--  <script type="text/javascript" src="js/jquery3-1.10.2.js"></script>-->
  <!--<style type="text/css"></style>
</head>
<body>
<a href="#" class="safehomelogo">Safe</a>
<form action="" method="post" name="form1" id="form1">
    <div>
   <div class="loginBox">
		<p style='color:red'><?php if($errormsg!="") { echo $errormsg; }?></p>
		<h1>ADMIN LOGIN</h1>

        
       
<p style='color:red'><?php if($errormsg1!="") { echo $errormsg1; }?>
<?php if($errormsg2!="") { echo $errormsg2; }?></p>
<input type="text" name="email" value="" placeholder="ADMIN NAME" class="login_username" ><br/>

<input type="password" name="password" id="txtadminpassword" class="login_password"  
value="" placeholder="**********"><br/>
     <div class="tabletPasswordButtons">
		<ul>
				<li><input type="submit" name="login" value="Login" id="btnlogin" class="btn"></li>
				<li><a href="forgotpassword.php" style="color:#444;border:0px;">Forgot Password?</a></li>
			</ul>
		</div>
		
	</div>
 </div>
    </form>

<div class="tagline container text-center" style="color:black">Copyright © 2017 MultiChoice Africa, All rights reserved.</div>


</body></html>-->