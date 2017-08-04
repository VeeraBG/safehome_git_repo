<?php
session_start();

include_once('dbFunction.php');
$obj = new dbFunction();


if(isset($_POST['mysubmit']))
{
extract($_POST);

  $content1=$_POST["content123"];
  $link1=$_POST["link123"];
  $type1=$_POST["type_name"];


//multiple file upload
if($_FILES['myfiles']['name']!=""){

$file_name_all="";
	            for($i=0; $i<count($_FILES['myfiles']['name']); $i++) 
	            {
	                   $tmpFilePath = $_FILES['myfiles']['tmp_name'][$i];    
	                   if ($tmpFilePath != "")
	                   {    
	                       $path = "uploads/alerts/";
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
	        $newFilePath_multi = rtrim($file_name_all, ','); //imagepath if it is present   

	        }
	        else
	        {
	            $newFilePath_multi="";
	        } //multiple end  
    // echo "Multi image................".$newFilePath_multi;
 
//Vedio ...
$time=round(microtime(true) * 1000);
$img_name=$_FILES['myvideo']['name'];
$file_tmp=$_FILES["myvideo"]["tmp_name"];

if($img_name!="")
{
  $filename=$time.'_'.$img_name;
  // echo $filename;
  // exit;
$path_parts = pathinfo($filename);
   $fname1=str_replace(' ','',$path_parts['filename']);
  // echo $fname1;
    $fname1=str_replace('@','',$fname1);
    $name1=$fname1.'.'.$path_parts['extension'];
      $newFilePath = $name1;
//echo $newFilePath;

move_uploaded_file($file_tmp,"uploads/alerts/".$newFilePath);

}
else 
{
$newFilePath="";
}
 //echo "single image................".$newFilePath;
 


 $adminid=$_SESSION['adminid'];
 
 //user type getting from header.php
 
 $role=$_SESSION['role'];
 
 // echo "insert into alerts(alerts_id,user_id,alerts_usertype,alerts_text,alerts_data,alerts_type,alerts_status,alerts_date) values 
// ('','$adminid','$role','$content1','$newFilePath','$type1','Deactivate',NOW())";


 if($link1!="")
 {
 $myqry=mysql_query("insert into alerts(alerts_id,user_id,alerts_usertype,alerts_text,alerts_data,alerts_type,alerts_status,alerts_date) values 
('','$adminid','$role','$content1','$link1','$type1','Deactivate',NOW())") or die(mysql_error());

}
 if($_FILES['myfiles']['name']!="")
{
 $myqry=mysql_query("insert into alerts(alerts_id,user_id,alerts_usertype,alerts_text,alerts_data,alerts_type,alerts_status,alerts_date) values ('','$adminid','$role','$content1','$newFilePath_multi','$type1','Deactivate',NOW())") or die(mysql_error());
}
 if($type1=="video")
 {
 // echo "dgjfdghfdj";
 // exit;
 $myqry=mysql_query("insert into alerts(alerts_id,user_id,alerts_usertype,alerts_text,alerts_data,alerts_type,alerts_status,alerts_date) values 
('','$adminid','$role','$content1','$newFilePath','$type1','Deactivate',NOW())") or die(mysql_error());
}
 if($type1=="text")
{
 $myqry=mysql_query("insert into alerts(alerts_id,user_id,alerts_usertype,alerts_text,alerts_data,alerts_type,alerts_status,alerts_date) values 
('','$adminid','$role','$content1','','$type1','Deactivate',NOW())") or die(mysql_error());
}
if($myqry)
{
$url="alert.php";
echo "<script> alert('Details Added Successfully');</script>";
echo '<script type="text/javascript">';
      echo 'window.location.href="'.$url.'";';
      echo '</script>';
}
}

?>	