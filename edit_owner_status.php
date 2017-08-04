<?php
$page="owner";
include_once('dbFunction.php');
 $obj = new dbFunction();
 if($_SESSION['editownerid']!='')
 {
 
 $owner_id=$_SESSION['editownerid'];
// echo $owner_id;
// exit;
}
 $sownersts=$obj->edit_owner_status($owner_id);
 if($sownersts==1)
 {
 //header("location:Owner_Details.php");
 // }
 //echo "sdgfsdfgsdfgdsj".$_SESSION['editownerid'];
 echo '<script type="text/javascript">'
   , 'window.location.href="Owner_Details.php";'
   , '</script>';

}
?>