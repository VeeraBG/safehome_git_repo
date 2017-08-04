<!DOCTYPE html>
<html lang="en">
		<?php 
		include_once('dbFunction.php');
 $obj = new dbFunction();
$get_rep=$obj->get_complaints();
		
		include("top_header.php"); ?>
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
		<a href="#" class="add_page_button">reported issues</a>
      
        <div class="clearfix"></div>
     			 <table class="table_st_1">
                	<tr>
					    <th>Block</th>
                    	<th>FLOOR</td>
						<th>FLAT</th>
                         <th>NAME</th>
                        <th>Complaint priority</th>                  
                        <th>Complaint </th>
                       <th>Complaint Status </th>						
					   <th>Complaint Sending time </th>
					   <th> ACTION </th>	
					</tr>
					<?php
			
					
					while($fet_rep=mysql_fetch_array($get_rep))
					{ 
                     $blockid=$fet_rep['complaint_block'];					
					  $qry=mysql_query("select * from block where block_id=".$blockid);
						$com_blkname=mysql_fetch_array($qry);
						$block_name=$com_blkname['block_name'];
	                 $floorid=$fet_rep['complaint_floor'];
						$qry1=mysql_query("select * from floor where floor_id=".$floorid);
						$fet_floname=mysql_fetch_array($qry1);
						$floor_name=$fet_floname['floor_name'];
						$flatid=$fet_rep['complaint_flat'];
						$qry2=mysql_query("select * from flat where flat_id=".$flatid);
						$fet_flatname=mysql_fetch_array($qry2);
						$flat_name=$fet_flatname['flat_name'];
					?>
                    <tr>
                    	<td><?php echo $block_name; ?></td>
                        <td><?php echo $floor_name; ?></td>
                        <td><?php echo $flat_name; ?></td>
						<td><?php echo $fet_rep['complaint_name']; ?></td>
						<td>
						
						<?php 
						if($fet_rep['complaint_priority']=='Medium')
						{
							echo '<span class="blueT">';
						}
					else if($fet_rep['complaint_priority']=='High')
						{
							echo '<span class="redT">';
						}
						else if($fet_rep['complaint_priority']=='low')
						{
							echo '<span class="greyT">';
						}
						echo $fet_rep['complaint_priority'].'</span>';


						?>
						
						
						
						</td>
						<td><?php echo $fet_rep['complaint_complaint']; ?></td>
						<td><span class="greenT"><?php echo $fet_rep['complaint_status']; ?></span></td>
                                              <td>
                      <?php  
					  $date = $fet_rep['complaint_date']; 
                              echo date('h:i:s a m/d/Y', strtotime($date));
 							  ?>
                        </td> 
<td>
		<a href="javascript:" class="owner" onClick="editButton('<?php echo $fet_rep['complaint_id']; ?>')">
<!--<i class="fa fa-edit"></i> -->Edit</a>
						<i class="fa fa-times"  onclick="fundel('<?php echo $fet_rep['complaint_id'];?>'); "></i></td>						</tr><?php
       					                	} 
											?>
                  
                     
                </table>
         
			
  </div>
		<!--End Content-->
	</div>
</div>
<!--End Container-->

<!--New Issue Popup Start-->
                            <div class="popup new_issue_popup" style="top:150px;left:30%;width:600px; display:none;"><!--Popup Start-->
                            	<div class="popup_title title1">new issue</div>
                                <div class="col-sm-6">
                                	<input type="text" placeholder="Block no" class="form-control" />
                                 <select class="select " name="standard-dropdown">
                                        <option>Issue priority</option>
                                        <option>Select Block</option>
                                        <option>Select Block</option>
                                        <option>Select Block</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                 <select class="select " name="standard-dropdown">
                                        <option>Flat no</option>
                                        <option>Select Block</option>
                                        <option>Select Block</option>
                                        <option>Select Block</option>
                                    </select>
                                     <select class="select " name="standard-dropdown">
                                        <option>Select status</option>
                                        <option>Select Block</option>
                                        <option>Select Block</option>
                                        <option>Select Block</option>
                                    </select>
                                </div>
                                 <div class="clearfix"></div>
                                 <div class="col-sm-12">
                                 	<textarea placeholder="Comments" class="form-control"></textarea>
                                 </div>
                                 <div class="clearfix"></div>
                                   <div class="col-sm-12">
                                  <button class="btn btn-danger text-center" >SEND</button>
                                  <button class="btn btn-default cancel_popup text-center " >cancel</button></div>
                                  
                                 
                                
                                
                                <div class="clearfix"></div>
                            </div><!--Popup End--> <!---New Issue  Popup End-->




<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src='js/jquery-1.9.1.min.js'></script>
<script src="plugins/jquery/jquery-2.1.0.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>

<script type="text/javascript" src="js/jquery.selectBox.js"></script>
<link type="text/css" rel="stylesheet" href="css/jquery.selectBox.css"/>

<script type="text/javascript">
		  $(document).ready(function(){
            $('select').selectBox({ mobile: true });
			$(".table_st_1 tr:odd").addClass("odd");
			
			$('.new_issue').click(function(){
		$('.new_issue_popup').show();	
	});
	
	
	$('.cancel_popup').click(function(){
		$('.new_issue_popup').hide();	
	});
			
		});
	
</script>
<script>
function editButton(cid)
{
 //alert(cid);
$('#sessiondata').load('com_id.php?cid='+cid);
window.location.replace('complaint_edit.php');

}

</script>
<script>
function fundel(delid)
{
//alert(delid);
$.post("delete_issues.php",{issue_id:delid},function(data) { location.reload();
//$(".delresult").html(data);
});

}
</script>
<?php include("footer.php"); ?>
<script src="js/footer_js.js"></script>
</body>
</html>
