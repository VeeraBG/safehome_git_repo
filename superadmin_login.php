<?php
include_once('dbFunction.php');
if(isset($_POST['login']))
{
	$email=$_POST['email'];
	$password=$_POST['password'];
//echo $email;
	//echo $password;
	
	if($email=="")
	{
	$errormsg1="Enter username or Email";
	}
		else if($password=="")
	{
	$errormsg2="Enter Password";
	}
	else
	{
	
	$obj=new dbFunction();
	 $qry=$obj->checksuperadminLogin($email,$password);
	
	if($qry)
	{
	$get_det=mysql_fetch_array($qry);
   $_SESSION['email']=$get_det['superadmin_email'];
   $_SESSION['sadminid']=$get_det['superadmin_id'];
		$_SESSION['username']=$get_det['superadmin_name'];
		header("Location:index.php");
		
	}
	else
	{
	$errormsg="Invalid Super Admin details";
	}
}
}
	

?>


<br><br><br><br><br>
<center>
<?php 
if($_REQUEST['msg']=="send")
{
	echo "<p style='color:red'>Password Sent to Your Mail ID..Please check Once..</p>";
}
 

?>
<p style='color:red'><?php if($errormsg!="") { echo $errormsg; }?></p>
<form action="" method="post" name="form1">
<table border="0" style="align:center">
<th><td>Super Admin Login</th></td>

<tr><td>username</td><td><input type="text" name="email" value="" placeholder="Username or Email"></td></tr><p style='color:red'><?php if($errormsg1!="") { echo $errormsg1; }?><?php if($errormsg2!="") { echo $errormsg2; }?></p>
<tr><td>Password</td><td><input type="text" name="password" value="" placeholder="password"></td></tr>
<tr><td></td><td><input type="submit" name="login" value="Login"></td></tr>
<tr><td></td>	<td>  <a href="forgotpassword.php">Forgot Password</a></td></tr>
</table>
      </form>

	  </center>