<?php
$page="owner";
include_once('dbFunction.php');
 $obj = new dbFunction();
 $email=$_SESSION['email'];
 
 $get_owner_data=$_SESSION['editownerid']; 
 	$owner_per_det=$obj->get_owner_details($get_owner_data);
	
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
	 
	 
    <?php $get_rec=mysql_fetch_array($owner_per_det); ?>
	
           <div id="details" class="table_st_1" style="padding-left:3%;">
		   <div class="row"><br><br>
      <?php
						$imagepath="uploads/owner_gallery/".$get_rec['owner_image'];
if(file_exists($imagepath) && $get_rec['owner_image']!='')
{
	$image=$imagepath;
}
else 
{
	$image="img/profile-icon.png";
}
									?>         	
 
		        <div class="col-md-3">
		<img src="<?php echo $image;?>" width="200" height="200" class="img-rounded">
                  </div>
					  <div class="col-md-6">
					
						<div class="row">
<div class="col-md-2" >Name -</div><div class="col-md-3"> <?php echo $get_rec['owner_name']; ?><br><br></div>
					    </div>
						<div class="row">
                  <div class="col-md-2">email -</div> 
                  <div class="col-md-3"><?php echo $get_rec['owner_email']; ?> <br><br></div>
                        </div>
								<div class="row">
                  <div class="col-md-2">Mobile -</div> 
                  <div class="col-md-3"><?php echo $get_rec['owner_mobile']; ?> <br><br></div>
                        </div>
						
							<div class="row">
                  <div class="col-md-2">Total Flat Square Feet -</div> 
                  <div class="col-md-3"><?php echo $get_rec['owner_sqft']; ?> sqft's<br><br></div>
                        </div>
						<div class="row">      </div>
						
						<div class="row">
						<?php
						$blockid=$get_rec['owner_block'];
						$qry=mysql_query("select * from block where block_id=".$blockid);
						$fet_blkname=mysql_fetch_array($qry);
						$block_name=$fet_blkname['block_name'];
						?>
<div class="col-md-2">Block -</div><div class="col-md-3"><?php echo $block_name; ?><br><br></div>
</div>
		  
						<div class="row">
<?php
						$floorid=$get_rec['owner_floor'];
						$qry1=mysql_query("select * from floor where floor_id=".$floorid);
						$fet_floname=mysql_fetch_array($qry1);
						$floor_name=$fet_floname['floor_name'];
						?>					
									<div class="col-md-2">Floor -</div><div class="col-md-3"><?php echo $floor_name; ?>
									<br><br></div></div>
					
						<div class="row">
<?php
						$flatid=$get_rec['owner_flat'];
						$qry2=mysql_query("select * from flat where flat_id=".$flatid);
						$fet_flatname=mysql_fetch_array($qry2);
						$flat_name=$fet_flatname['flat_name'];
						?>					
									<div class="col-md-2">Flat -</div><div class="col-md-3"><?php echo $flat_name; ?><br>
									<br></div></div>
					<div class="row">
					<div class="col-md-2" style="width: 18%;">Total Persons -</div>
					<div class="col-md-3"><?php echo $get_rec['owner_no_persons']; ?>
			
					<br>	<br>
					</div></div>
	  <?php 
 $var1 = unserialize($get_rec['owner_addpersonsmbno']);
$var2 = unserialize($get_rec['owner_person1_name']);
$var3 = unserialize($get_rec['owner_age']); 
 for($i=0;$i<count($var1); $i++)
 { 
 if($var1[$i]!=""){
 
 ?>
 <div class="row">
				   <div class="col-md-2" style="width: 18%;">Person <?php echo $i+1; ?>-</div>
				   <div class="col-md-3"><?php echo $var2[$i]; ?></div>
				 </div>
					<br>
<?php }}
				   ?> 
				   <br>

</div></div>
		<div class="clearfix"></div><br>  
<div class="row">
			<div class= "col-md-4">	
			</div>				
			<div class= "col-md-1">			
<a class="btn"  href="delete_owner.php?did=<?php echo $get_rec['owner_id']; ?>" 
 style="display:block;color:#444;text-decoration:none;padding-left:22%;" >Delete</a>
			</div>
			<div class= "col-md-1" style="margin-right:1%;">
			<input class="btn btn-danger" type="submit"  id="update" name="update" value="update"  style="display:none;" >
			<a class="btn btn-danger" href="javascript:" onClick="editButton('<?php echo $get_rec['owner_id']; ?>')" id="edit123" >Edit</a>
</div>
	<div class= "col-md-2">
			<input class="btn btn-danger" type="submit"  id="active" name="active" value=""  style="display:none;" >
			<?php if($get_rec['owner_status']=="Deactive")
			{
			?>
			<a class="btn" href="javascript:" onClick="editStatus('<?php echo $get_rec['owner_id']; ?>')" 
			id="editstatus123" >Activate</a>
			<?php } else if($get_rec['owner_status']=="Active") { ?>
					<a class="btn btn-danger" href="javascript:" onClick="editStatus('<?php echo $get_rec['owner_id']; ?>')" 
			id="editstatus123" >Deactivate</a>
			<?php 
			}
			?>
			
</div>


		</div>			   
</div>

</form>
</div>      
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
        
    
	</div>
     <div id="sessiondata">
</div>	 
                       
     </div>  
	 
<script type="text/javascript">
function editButton(oid) {
//	alert(oid);
//$('#sessiondata').load('session_write.php?oid='+oid);
window.location.replace('edit_owner.php');

}
</script>

 <script>
function deleteButton(did) {  

//alert(str,floor+"hfvb");
//alert(did);
$.post("delete_owner.php",{did:did},function(data) {  location.reload();
//alert(data);
 // $(".security").html(data);
});



}

</script>
<script type="text/javascript">
function editStatus(statusid) {
	//alert(statusid);
//$('#sessiondata').load('session_write.php?oid='+oid);
window.location.replace('edit_owner_status.php');

}
</script>
             
<!--<a href="superadmin_change_details?email=<?php //echo $get_rec['superadmin_email']; ?>"><i class="fa fa-edit">
               
                 
<td>
<a href="javascript:" onClick="fun1('<?php //echo $get_rec['superadmin_email']; ?>')" ><i class="fa fa-edit"></i></a>


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
<?php include("footer.php"); ?>
<script src="js/footer_js.js"></script>
</body>
</html>