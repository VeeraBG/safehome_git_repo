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
$url="profile.php";
echo '<script type="text/javascript">';
      echo 'window.location.href="'.$url.'";';
      echo '</script>';
}
}
}
?>