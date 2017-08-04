<?php
$page="security";
include_once('dbFunction.php');
 $obj = new dbFunction();
 $email=$_SESSION['email'];
 
 $get_sec_data=$_SESSION['editsecureid']; 
 	$secu_per_det=$obj->get_security_personal_details($get_sec_data);
	
 //$getadmin=$obj->getsuperadmin($email);

?>

<!DOCTYPE html>
<html lang="en">
<?php include("top_header.php"); ?>


<script>
function password(sid) {
//alert("ravojj");  
$('#pass').show();
$.post(",{sid:sid},function(data ) {  //location.reload();
$( "#change" ).html(data );
});



}
</script>
<body>
<!--Start Header-->
<div id="screensaver">
<canvas id="canvas"></canvas>
<i class="fa fa-lock" id="screen_unlock"></i>
</div>
<div id="modalbox">
<div class="devoops-modal">
<div class="devoops-modal-header">
<div class="modal-header-name">
<span>Basic table</span>
</div>
<div class="box-icons">
<a class="close-link">
<i class="fa fa-times"></i>
</a>
</div>
</div>
<div class="devoops-modal-inner">
</div>
<div class="devoops-modal-bottom">
</div>
</div>
</div>
<header class="navbar">
<?php include("header.php"); ?>
</header>
<style>
table,td{
font-size:13px;
}
</style>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
<div class="row">
<?php include("leftmenu.php"); ?>

<div class="result"> </div>
<!--Start Content-->
<div id="content" class="col-xs-12 col-sm-10">
        <div class="clearfix"></div>

	 <form action="" method="post" enctype="multipart/form-data">  
	 
	 
    <?php $get_rec=mysql_fetch_array($secu_per_det); ?>
               <table class="table_st_1" style="width:40%;">
      <?php
						$imagepath="uploads/security_gallery/".$get_rec['security_image'];
if(file_exists($imagepath) && $get_rec['security_image']!='')
{
	$image=$imagepath;
}
else 
{
	$image="img/profile-icon.png";
}
		?>         	
									
<tr > 
<td rowspan="5" > <img  class="img-rounded" src="<?php echo $image;?>" width="200" height="200" ></td>
                   	<td>Name</td> <td><?php echo $get_rec['security_name']; ?></td> </tr>
                     
<tr><td>email</td> <td><?php echo $get_rec['security_email']; ?></td></tr>
                       <tr><td>Mobile No</td><td><?php $var1 = unserialize($get_rec['security_mobile']);  
for($i=0;$i<count($var1); $i++)
 { 
 echo $var1[$i].",";
 } ?></td></tr><tr><td>Company</td><td><?php echo $get_rec['security_cat']; ?></td></tr>
					               <tr><td>Code</td><td><?php echo $get_rec['security_code']; ?></td></tr>
								    <tr><td>Shift Type</td><td colspan="2"><?php echo $get_rec['security_shift_type']; ?></td></tr>
									<tr><td>Address</td><td colspan="2"><?php echo $get_rec['security_Dno'],$get_rec['security_address']; ?></td></tr>
							


					   
</table>

         </form>    
<style>
.possi
{
    margin-left: 30%;
    margin-top: 5px;

}
</style>
		 
      <!--   <div class="possi"> <a href="javascript:" class="owner" <?php// $get_rec['security_id']; ?>' onClick="editButton('<?php //echo $get_rec['security_id']; ?>')">
<i class="fa fa-edit"></i> Edit</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:" class="owner" <?php //$get_rec['security_id']; ?>' onClick="deleteButton('<?php //echo $get_rec['security_id']; ?>')">
<!--<i class="fa fa-edit"></i> Delete</a></td></tr></div> -->	
        	<div class="clearfix"></div><br/>  
<div class="row">
			<div class= "col-md-1">			
<a class="btn"  href="delete_personal_security.php?secid=<?php echo $get_rec['security_id']; ?>"   style="display:block;color:#444;text-decoration:none;padding-left:22%;" >Delete</a>
			</div>
			<div class= "col-md-1">
			<input class="btn btn-danger" type="submit"  id="update" name="update" value="update"  style="display:none;" >
			<a class="btn btn-danger" href="javascript:" onClick="editButton('<?php echo $get_rec['security_id']; ?>')" id="edit123" >Edit</a>
</div>

		</div>

             
                       
     </div>   
<script type="text/javascript">
function editButton(id) {
	//alert(id);
$('#sessiondata').load('security_person_det.php?id='+id);
window.location.replace('SecurityManagement_Edit_Personal.php');

}
</script>
 <script>
function deleteButton(secid) {  

//alert(str,floor+"hfvb");
alert(secid);
$.post("delete_personal_security.php",{secid:secid},function(data) {  location.reload();
//alert(data);
 // $(".security").html(data);
});



}

</script>
             
<!--<a href="superadmin_change_details?email=<?php //echo $get_rec['superadmin_email']; ?>"><i class="fa fa-edit">
               
                 
<td>
<a href="javascript:" onClick="fun1('<?php echo $get_rec['superadmin_email']; ?>')" ><i class="fa fa-edit"></i></a>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src="plugins/jquery/jquery-2.1.0.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<script src='js/jquery-1.9.1.min.js'></script>
<script type="text/javascript" src="js/jquery.selectBox.js"></script>
<link type="text/css" rel="stylesheet" href="css/jquery.selectBox.css"/>

<script type="text/javascript">
		  $(document).ready(function(){
            $('select').selectBox({ mobile: true });
		});
		
</script>
<script src="js/footer_js.js"></script>
<?php include("footer.php"); ?>
</body>
</html>