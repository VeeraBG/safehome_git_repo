<?php
include_once('dbFunction.php');
 $obj = new dbFunction();
 
 $data=$obj->getowner_details();

?>

<!DOCTYPE html>
<html lang="en">
		<?php include("top_header.php"); ?>
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
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<?php include("leftmenu.php"); ?>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
		<a href="#" class="add_page_button">Owner <span class="fa fa-plus"></span> </a>
      
        <div class="clearfix"></div>
     			
                <table class="table_st_1">
                	<tr>
                    	<th>Name</td>
                        <th>Last Name</th>
                        <th>Block no</th>
                        <th>Flat no</th>
                        <th>No of persons</th>
                        <th>mobile</th>
                        <th>email</th>
                        <th>date of Occupancy</th>
                    </tr>
					<?php 
				if($data>0){
				
				while($get_rec=mysql_fetch_array($data))
				{
				
				
				
				?>
                    <tr>
                    	<td><?php echo $get_rec['owner_name']; ?></td>
                        <td><?php echo $get_rec['owner_lname']; ?></td>
                        <td><?php echo $get_rec['owner_block']; ?></td>
                        <td><?php echo $get_rec['owner_flat']; ?></td>
                        <td><?php echo $get_rec['owner_no_persons']; ?></td>
                        <td><?php echo $get_rec['owner_mobile']; ?></td>
                        <td><?php echo $get_rec['owner_email']; ?></td>
                        <td>
                      <?php echo $get_rec['owner_date_occupancy']; ?>
					  <input type="button" class="owner" val='<?php $get_rec['owner_id']; ?>'  value='Edit'></input>
                       <i class="fa fa-times">
					   </i></a><a href="delete_owner.php?did=<?php echo $get_rec['owner_id']; ?> " class="grid_icons"><i class="fa fa-edit"></i></a>

                        </td>
                    </tr> <?php } } else { "no records Founds"; }?>
                    
               
                </table>
     		
		</div>
		<!--End Content-->
	</div>
</div>
<!--End Container-->

<script type="text/javascript">
$(document).ready(function() {
	$('#input_date').datepicker({setDate: new Date()});
});
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
<script src="js/footer_js.js"></script>
<?php include("footer.php"); ?>
</body>
</html>
