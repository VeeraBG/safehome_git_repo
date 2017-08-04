<?php
 include_once('dbFunction.php');
 $obj = new dbFunction();
 
$id=$_POST['debitid'];

$desqry=mysql_query("delete from transactions_account where id=".$id);
 
 if($desqry)
 {
$url="account_debit_transactions.php";

echo "<script> alert('Account details Deleted successfully ');</script>";
	 echo '<script type="text/javascript">';
      echo 'window.location.href="'.$url.'";';
      echo '</script>';
//header("location:account_debit_transactions.php?msg=deleted");
 }

?>