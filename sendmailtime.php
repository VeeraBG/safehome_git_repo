<?php 


//Getting the time when the script was last run.. 
$time1=file_get_contents("time1.txt"); 
//Getting Present Time  
$time2=time(); 
//Calculating the difference between present time and last time when the script was executed 
$time3=$time2-$time1; 
//A day consist of 86400 seconds.. 
if($time3>60) 
{ 

$to="isha.alekhya@gmail.com";
//print_r($tos);
$subject = "Test SafeHome";
$txt = "Hi..";
$headers = "From: isha.mallesh@gmail.com" . "\r\n" ;
 //send email
mail($to,$subject,$txt,$headers);


//Getting members  from DB who have not posted in last 24 hours.. 

//Sending mail to them 

//Updating time1.txt with present time So the script again runs in next 24 hours 
file_put_contents("time1.txt",$time2) ;
     

} 
else 
{ 
    //Nothing is done.. 
} 
?>