<?php
 include_once('dbFunction.php');
 $obj = new dbFunction();
 
$id=$_POST['debitid'];

$desqry=mysql_query("delete from credit_account where credit_id=".$id);
 
 if(desqry)
 {
 header("location:account_credit_transactions.php?msg=deleted");
 }

?>