<?php
$page="email";
include_once('dbFunction.php');
$obj = new dbFunction();

if(isset($_POST['sendemail']))
{
$email=$_POST['email'];

$tos = explode(',',$email);
//print_r($tos);

$msg=$_POST['templatemsg'];


$subject = "Test SafeHome";
$txt = "Hi..". $msg;
$headers = "From: isha.mallesh@gmail.com" . "\r\n" ;

  //send email
  foreach ($tos as $to)
  {
$sen_email=mail($to,$subject,$txt,$headers);
if($sen_email)
{
//$recevier=$_SESSION['$tos'];
// print_r($tos);
// exit;
$status="sent";

}


else
{
$status="fail";
}

$report=$obj->email_report_create($to,$status);


header("location:EmailReport.php");
}
}

?>
<!DOCTYPE html>
<html lang="en">

		<?php
            ob_start();
		include("top_header.php"); ?>
<body>
<!--Start Header-->

<form action="" method="post"> 
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
	<?php include("header.php");?>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<?php include("leftmenu.php"); ?>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
				<a href="#" class="add_page_button">Email</a>
        		<div class="clearfix"></div>
        	<div class="box-content box">
                <div class="col-sm-8">
						<div class="col-sm-6">
                        	<textarea placeholder="Type Emails
(Type just the Email ID's in separate with , (comma)" class="form-control" id="mobno" name="email" value="" rows="8"></textarea>
							<div class="clearfix"></div>
                            <div class="col-sm-5"><button class="btn btn2 btn2_blank" onclick="clearmob()">clear list <span class="fa fa-times"></span> </button></div>
                        </div> 
                        <div class="col-sm-6">
                        	<select class="selectBox selectBox-dropdown"  style='padding:3.5%;'  name="group_ids" onChange="showgroup(this.value)"  >
                    	<option value="0">Select Group</option>
						<?php 
						$qry=mysql_query("select * from smsgroup");
						while($row=mysql_fetch_array($qry))
						{

						?>
<option value="<?php echo $row['group_id'];?>"><?php echo $row['group_name'];?></option>
                   
                       
                      <?php } ?>
                       </select>
                            
                            <button class="btn btn-default btn2 create_group_btn" >Create new group <span class="fa fa-plus"></span> </button>
                            <!--Create New Group Popup Start-->
                            <div id="crgroup" class="popup create_group" style="top:250px;left:30%;width:600px; display:none;"><!--Popup Start-->
                            	<div class="popup_title title1">CREATE GROUP</div>
                                <div class="col-sm-7">
                                	<input type="text" placeholder="Enter group name" name="group" id="cgroup" value="" class="form-control" />
                                    <div class="clearfix"></div>
                                    <div class="col-sm-5" style="padding-left:0;">
<button class="btn btn-default btn2 cancel_popup" onclick="creategroup123();" >Create group</button></div></div>
 <div class="col-sm-3">  <button class="btn btn-default btn2 cancel_popup" onclick="cancelgroup();"  >cancel</button></div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div><!--Popup End--> <!--Create New Group Popup End-->
                        </div>             
                        <div class="clearfix"></div>   
                        <!--one part end-->
                          <div class="col-sm-8">
                         <div class="col-sm-6">
                                                 	<select class="selectBox selectBox-dropdown"  style='padding:3.5%;'  name="template" onChange="showcantent(this.value)" >
                    	<option >Select Template</option>
						<?php 
						$qry=mysql_query("select * from template");
						while($row=mysql_fetch_array($qry))
						{

						?>
<option value="<?php echo $row['template_id'];?>"><?php echo $row['template_name'];?></option>
                   
                       
                      <?php } ?>
                       </select>
                         </div>
                         <div class="col-sm-6">
                          <button class="btn btn-default btn2 create_template_btn" >Create new template <span class="fa fa-plus"></span> </button>
                          
                           <!--Create New Template Popup Start-->
                            <div class="popup create_template" style="top:150px;left:30%;width:660px; display:none;"><!--Popup Start-->
                            	<div class="popup_title title1">CREATE TEMPLATE</div>
                                  <div class="col-sm-12"><span class="danger">Note:</span>	Residents below the age of 12 will not be desplayed in visitor managment list</div><br/><br/>
                                  <div class="col-sm-7">
                                	<input type="text" placeholder="Template name" id="temname" class="form-control" />
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="col-sm-12">
                                  	<textarea placeholder="Type your content here" id="tcontent" class="form-control" rows="5"></textarea>
                                  </div>
                                    <button  class="btn btn-danger cancel_popup" onclick="ctemplate();">Save</button>
                                    <button type="reset" class="btn cancel_popup">Cancel</button>
                                                         
                                <div class="clearfix"></div>
                            </div><!--Popup End--> <!--Create New Template Popup End-->
                         </div>
                          <div class="clearfix"></div>   
                        <!--2nd part end-->
                        <div id="group"></div>
                        <div class="col-sm-12">
                        	<textarea placeholder="Message type here" id="cant"class="form-control" name="templatemsg" rows="5"></textarea>
                        </div>
                        <div class="clearfix"></div>   
                       
                        <div class="col-sm-6">
                        <select class="select " name="standard-dropdown">
                                <option>Select Signature</option>
                                <option>Select Block</option>
                                <option>Select Block</option>
                                <option>Select Block</option>
                            </select>
							</div>
							</div>
                             <div class="clearfix"></div>   
							 	 <br>
							 <br>
							 <div class="col-sm-offset-2 col-sm-6 text-center">
							 <div class="col-sm-4" style="    margin-left: 63px;">
                            <button type="reset" class="btn">Cancel</button>
							</div>
							 <div class="col-sm-3">
                            <input  type="submit" name="sendemail" class="btn btn-danger" value="save" >
                        </div>
                        
                        
                         
                </div>
              
            <div class="clearfix"></div>   
            
		</div>
		
		</form>
		<!--End Content-->
	
</div></div></div>
<!--End Container-->




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
			
		});
	
</script>

<script>
function showgroup(groupid) {  
// alert(groupid);
$.post("get_email_cantent.php",{groupid:groupid},function(data) {  //location.reload();
 //$( ".result" ).html('MY ID is - '+data );
  $("#mobno").html(data);
 // alert(data);
});
}
</script>
<script>
function creategroup123()
{

var groupname=$("#cgroup").val();
$.post("get_cantent.php",{groupname:groupname},function(data) {  location.reload();
 //$( ".result" ).html('MY ID is - '+data );
 //alert(data);
 // $("#group").html(data);
});
}
</script>
<script>
function showcantent(temid) {  
//alert(temid);
$.post("get_cantent.php",{temid:temid},function(data) {  //location.reload();
 //$( ".result" ).html('MY ID is - '+data );
  $("#cant").html(data);
 // alert(data);
});



}
</script>
<script>
function ctemplate()
{
// alert('fdjgdfgh');
var templatename=$("#temname").val();
var templatecontent=$("#tcontent").val();

$.post("create_template.php",{templatename:templatename,templatecontent:templatecontent},function(data) {  location.reload();
 // $( ".result" ).html('MY ID is - '+data );
// alert(data);
 // $("#group").html(data);
});
}
</script>
<script>
function cancelgroup()
{

$('#crgroup').hide();
}
</script>
<script>
function clearmob()
{
$('#mobno').val('');

}
</script>

<script src="js/footer_js.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#input_date').datepicker({setDate: new Date()});
	$("#tabs").tabs();
	$('.create_group_btn').click(function(){
		$('.create_group').show();	
	});
	$('.create_template_btn').click(function(){
		$('.create_template').show();	
	});
	
	
	$('.cancel_popup').click(function(){
		$('.popup').hide();	
	});
});
</script>
<?php include("footer.php"); ?>
</body>
</html>
