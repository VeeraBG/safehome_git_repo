<?php
$page="security";
include_once('dbFunction.php');
 $obj = new dbFunction();

 $pers=$obj->getsecurity_personal_details();

?>

<!DOCTYPE html>
<html lang="en">
<?php include("top_header.php"); ?>


<script>
function fun1(str) {

alert(str);
$.post("edit_owner.php",{str:str},function(data ) {  //location.reload();
 //$( ".result" ).html('MY ID is - '+data );
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
				<div class="security"> </div>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
		<a href="#" class="add_page_button">Security <span class="fa fa-plus"></span> </a>

        <div class="clearfix"></div>

                <table class="table_st_1">
                	<tr>
								    <th>Photo</th>
                    	<th>Name</td>
						          	<th>Email</td>
                          <th>mobile</th>
                        <th>Code</th>
                        <th>Shift Type</th>
                        <th>Address</th>
                         <th>Actions</th>
                    </tr>
					<?php
				if($pers>0){

				while($get_rec=mysql_fetch_array($pers))
				{



				?>
                    <tr>
					
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


                               <td><img class="img-rounded" src="<?php echo $image;?>" width="70" height="70"></td>
                    	<td><?php echo $get_rec['security_name']; ?></td>
						      	<td><?php echo $get_rec['security_email']; ?></td>
                        <td><?php echo $get_rec['security_mobile']; ?></td>
                        <td><?php echo $get_rec['security_code']; ?></td>
                        <td><?php echo $get_rec['security_shift_type']; ?></td>
                        <td><?php echo $get_rec['security_address']; ?></td>
            <td>
			
			<a href="javascript:" class="owner" <?php $get_rec['security_id']; ?>' onClick="editButton('<?php echo $get_rec['security_id']; ?>')">
<!--<i class="fa fa-edit"></i> -->Edit</a>
<!--<a href="SecurityManagement_Edit_Personal.php?spid=<?php// echo $get_rec['security_id']; ?>"><i class="fa fa-edit"></i></a> -->
<!-- <a href="delete_personal_security.php?did=<?php// echo $get_rec['security_id']; ?> " class="grid_icons" ><!--<i class="fa fa-times"></i>Delete</a> -->

<a href="javascript:" class="owner" <?php $get_rec['security_id']; ?>' onClick="deleteButton('<?php echo $get_rec['security_id']; ?>')">
<!--<i class="fa fa-edit"></i> -->Delete</a>

                       </td>
                    </tr> <?php } } else { "no records Founds"; }?>


                </table>

		</div>
		<!--End Content-->
	</div>
</div>
<!--End Container-->
<div id='sessiondata' style="color:red;"> </div>
<script type="text/javascript">
$(document).ready(function() {
	$('#input_date').datepicker({setDate: new Date()});
});
</script>
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
//alert(secid);
$.post("delete_personal_security.php",{secid:secid},function(data) {  location.reload();
//alert(data);
 // $(".security").html(data);
});



}

</script>
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
			$(".table_st_1 tr:odd").addClass("odd");

		});

</script>
<?php include("footer.php"); ?>
<script src="js/footer_js.js"></script>
</body>
</html>
