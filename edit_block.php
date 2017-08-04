<?php
$page="block";
 include_once('dbFunction.php');
 $obj = new dbFunction();
 $code3="Enter Block Name";
 $bid=$_POST['block_id'];
 $bname=$_POST['block_name'];
 if($bname=="")
 {
echo "<p style='color:red;'>$code3</p><br>";
  }
  else
  {
 $edi_blk=$obj->edit_block($bid,$bname);
 if($edi_blk==1)
 {
 echo '<script type="text/javascript">'
   , 'window.location.href="add_block.php";'
   , '</script>';
 }
  }
?>