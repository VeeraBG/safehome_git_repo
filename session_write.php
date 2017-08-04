<?php
session_start();

if (isset($_GET['oid']))
 {
	
   $_SESSION['editpersonid'] = $_GET['oid'];
		qry=mysql_query("select* from owner where owner_id='$_SESSION['editpersonid']'");
          row=mysql_fetch_array($qry);	
	     		 $blockid=row['owner_block']; 
 $_SESSION['block']=$blockid; 
	}
?>
