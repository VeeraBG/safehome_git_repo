<?php
session_start();
$page="expenditure";
include_once('dbFunction.php');
$obj = new dbFunction();
$apartment_id=1;
// $arr[ $expenditure_name1]=$expenditure_price1;
// seraillize($arr) 

if(isset($_POST['expend']))
{
$expenditure_name1=$_POST['expenditure_name'];
//$expname=serialize($expenditure_name1);
// print_r($expenditure_name1);
// exit;

 $expenditure_price1=$_POST['expenditure_price'];
//$expprice=serialize($expenditure_price1);
// $collection_name1=$_POST['collection_name'];
// $collection_name=serialize($collection_name1);
// $collection_price1=$_POST['collection_price'];
// $collection_price=serialize($collection_price1);
//print_r($_POST);
//$cret=$obj->create_expend($expenditure_name,$expenditure_price,$collection_name,$collection_price);

 $totalarea=$_POST['totalaprtmentarea'];
 $mainamtsqt=$_POST['maintenanceamtsqt'];
  //$collection_name=$_POST['collection_name'];
// $var1=serialize($collection_name);
// print_r($var1);
// exit;
$collection_name1=$_POST['
'];
$collection_price1=$_POST['collection_price1'];
foreach($collection_name1 as $index => $collection_name)
{
$colprice=$collection_price1[$index];
  $collection_name=$collection_name1[$index];
  
  $cret2=$obj->create_collection($apartment_id,$colprice,$collection_name);
  
 }
 foreach ($expenditure_name1 as $index => $expname)
  {
 $expprice=$expenditure_price1[$index];
 $colprice=$collection_price1[$index];
  $collection_name=$collection_name1[$index];

$cret=$obj->create_expend($expname,$expprice,$apartment_id,$totalarea,$mainamtsqt);

//$cret2=$obj->create_collection($apartment_id,$colprice,$collection_name);

 if($cret==1)
{
// echo "<script> alert('Owner Created Successfully');</script>";
 header("location:Maintainance_Expenditure.php");
}

}

}

$qry_234=mysql_fetch_array(mysql_query("select * from expenditure where expenditure_apartment_id=".$apartment_id));


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
						<form action="" method="post">
		
		<div id="content" class="col-xs-12 col-sm-10">
		<a href="#" class="add_page_button">Expenditure </a>
	
        <div class="clearfix"></div>
        <div class="box-content box">

      <!--  <div class="col-sm-3"><input type="text" class="form-control" placeholder="Total apartment area" name="totalaprtmentarea" value="<?php echo $qry_234['total_apartment_area']; ?>" /></div>
      <div class="col-sm-3"><input type="text" class="form-control" placeholder="Maintenance AMT per sft: 2rs"  value="<?php echo $qry_234['maintenance_amt_sft']; ?>" 
	  name="maintenanceamtsqt" /></div> -->
        
		        <div class="clearfix"></div>
					<div class="col-sm-6" style="border-top: 1px solid #dadada;border: 1px solid #DADADA; padding: 2%;
    padding-top: 0;">
                    <div class="title1">amount Spent</div>
					
				
				
	<?php
				$qry=mysql_query("select * from expenditure where expenditure_apartment_id=".$apartment_id);
				while($rec=mysql_fetch_array($qry))
				{
				$sum += $rec['expenditure_price'];
				//$ename = unserialize($rec['expenditure_name']); 
				// print_r($ename);
			
				 //$eprice = unserialize($rec['expenditure_price']); 

			
				?>
				
					
					<?php
					 // for($i=0;$i<count($ename); $i++)
 // { 
 // if($ename[$i]!=""){
				?>
					
					
				<div  class="col-sm-5">
				<input type="text" class="form-control" placeholder="expname" id="" name="expenditure_name[]"  
				value="<?php echo $rec['expenditure_name'];   ?>" disabled="disabled"/><span style="color:red"></span></div> 
		
	
<div  class="col-sm-5">
<input type="text" class="form-control" placeholder="price" id=""  name="expenditure_price[]"  
value="<?php echo $rec['expenditure_price']; ?>"  disabled="disabled" /><span style="color:red" ></span>
<input type="hidden" name="expid" value="<?php echo $rec['expenditure_id']; ?>" />

                            <!--Create New Group Popup Start-->
                         
</div> 	
 <div  class="col-sm-1">
<a href="javascript:" onClick="editexpenditure('<?php echo $rec['expenditure_id'];?>','<?php echo $rec['expenditure_name'];?>','<?php echo $rec['expenditure_price'];?>')">
<i class="fa fa-edit" style="line-height: 2em;font-size: 24px;color:#6A6A6A;"></i></a>
  </div> 	
   <div  class="col-sm-1">

<!--<i class="fa fa-times" onClick="deleteexpenditure('<?php echo $rec['expenditure_id']; ?>')" 
style="line-height: 2em;font-size: 24px;color:#d43f3a;"></i></a> --> 
<i class="fa fa-times"  onclick="deleteexpenditure('<?php echo $rec['expenditure_id'];?>'); " 
 style="line-height: 2em;font-size: 24px;color:#6A6A6A;"></i>
  
  </div> 
<?php 
} 
?>

<div class="result" id="result"> </div>
<div class="delresult" id="delresult"> </div>

<script>
function editexpenditure(id,name,price)
{
//alert(id+name+price);
//alert("dkjghjfd");
$('#exname').attr("value",name); 
$('#exprice').attr("value",price);
 $('#exname').attr("myid",id); 

 
$("#crgroup").show();

}
</script>


  
<script>

function exupdate()
{

 var id= $('#exname').attr("myid"); 

  var ename=$('#exname').val(); 
    var eprice=$('#exprice').val(); 
	//alert(id+ename+eprice);
	
$.post("edit_expenditure.php",{exp_id:id,exp_name:ename,exp_price:eprice},function(data) {
 location.reload();
alert(data);
//$( ".result" ).html('MY ID is - '+data );
});
}



</script>


<script>
function deleteexpenditure(delid)
{
//alert(delid);
$.post("delete_expenditure.php",{exp_id:delid},function(data) { location.reload();
//$(".delresult").html(data);
});

}
</script>
   <div id="crgroup" class="popup " style="top:250px;left:30%;width:600px; display:none;"><!--Popup Start-->
                            	<div class="popup_title title1">EDIT EXPENDITURE</div>
                                <div class="col-sm-7">
Expenditure Name: <input type="text"  name="ename" id="exname" value="" myid="" class="form-control" />
Expenditure Price: <input type="text"  name="eprice" id="exprice" value="" class="form-control" />
                                    <div class="clearfix"></div>
									 <div class="col-sm-5">  
									 
  <button class="btn btn-default " onclick="cancelgroup();"  >Cancel</button>
 </div>
                                    <div class="col-sm-3" style="padding-left:0;">
<button class="btn btn-danger" onclick="exupdate();" >Update</button>
 <!-- <input type="button" name="update" id="update"  class="btn btn-danger" value="Update" onClick="exupdate()" /> -->
                  


</div>

                         </div>           <div class="clearfix"></div>
                                </div>
			<div id="newPersons_div" style="padding:0px; margin:0px;"></div>
					   	 <div class="col-sm-6"></div>
                        <div class="clearfix"></div>
                        <div class="row" style="margin-left:2%;">
				
                  		<!-- <a href="#"  class="input_outer"> <span class="fa fa-plus"></span></a> -->
                  		<!-- <button class="btn btn2_blank btn2 wid_auto" onclick="return addPerson();"> <span class="fa fa-plus"></span></button> -->
                  		<div class="plus"><span class="fa fa-plus" onclick="return addPerson();"></span></div>
                  		<input type="hidden" id="counter_txt" value="1" />
                    

                    <!-- NEW PERSONS ADDED WILL BE APPENDED INTO THIS DIV -->
                  
</div>
                 
                        <div class="col-sm-6 text-right l_h_37">Total amount spent</div>
                        <?php
				// $result=mysql_query("select * from expenditure where expenditure_apartment_id=".$apartment_id);
				// while($row123 = mysql_fetch_assoc($result)){
    // $sum += $row123['expenditure_price'];
// }


					?>	
<div class="col-sm-6"><input type="text" class="form-control bold_placeh" placeholder=""
 name="Name1" value="<?php echo $sum;?>" disabled="disabled" /></div>
                      
                        
              
                    		
                    </div>
                    
                    
                    <div class="col-sm-6" style="border-top: 1px solid #dadada;border-top: 1px solid #dadada;border: 1px solid #DADADA;">
                     <div class="title1">Collections</div>
                    	


			
		<?php
				$qry321=mysql_query("select * from collections where collection_apartment_id=".$apartment_id);
				while($rec5=mysql_fetch_array($qry321))
				{
				
				$sumcollection += $rec5['collection_price'];
				//$ename = unserialize($rec['expenditure_name']); 
				// print_r($ename);
			
				 //$eprice = unserialize($rec['expenditure_price']); 

			
				?>
					
					<?php
					 // for($i=0;$i<count($ename); $i++)
 // { 
 // if($ename[$i]!=""){
				?>
					
					
				<div  class="col-sm-5">
				<input type="text" class="form-control" placeholder="expname" id="" name="collection_name[]"  
				value="<?php echo $rec5['collection_name'];   ?>" disabled="disabled"/><span style="color:red"></span></div> 
		
	
<div  class="col-sm-5">
<input type="text" class="form-control" placeholder="price" id=""  name="collection_price[]"  
value="<?php echo $rec5['collection_price']; ?>" disabled="disabled" /><span style="color:red" ></span>
<input type="hidden" name="expid" value="<?php echo $rec5['collection_id']; ?>" />

                            <!--Create New Group Popup Start-->
                         
</div> 	
 <div  class="col-sm-1">
<a href="javascript:" onClick="editcollectionprice('<?php echo $rec5['collection_id'];?>','<?php echo $rec5['collection_name'];?>','<?php echo $rec5['collection_price'];?>')">
<i class="fa fa-edit" style="line-height: 2em;font-size: 24px;color:#6A6A6A;"></i></a>
  </div> 	
   <div  class="col-sm-1">

<i class="fa fa-times"  onclick="deletcollectionprice('<?php echo $rec5['collection_id'];?>'); " 
 style="line-height: 2em;font-size: 24px;color:#6A6A6A;"></i>
 
<!-- <i class="fa fa-times"  onclick="deleteexpenditure('<?php //echo $rec5['expenditure_id'];?>'); " style="line-height: 2em;font-size: 24px;color:#d43f3a;"></i>
  -->
  </div> 
<?php 
} 
?>

                    
 <div id="crgroup1" class="popup " style="top:250px;left:30%;width:600px; display:none;"><!--Popup Start-->
                            	<div class="popup_title title1">EDIT COLLECTION</div>
                                <div class="col-sm-7">
Collection Name: <input type="text"  name="ename" id="collectionname" value="" mycid="" class="form-control"  />
Collection Price: <input type="text"  name="cprice" id="collectionprice" value="" class="form-control" />
                                    <div class="clearfix"></div>
									 <div class="col-sm-5">  
									 
  <button class="btn btn-default " onclick="cancelgroup();"  >Cancel</button>
 </div>
                                    <div class="col-sm-3" style="padding-left:0;">
<button class="btn btn-danger" onclick="colpriceupdate();" >Update</button>
 <!-- <input type="button" name="update" id="update"  class="btn btn-danger" value="Update" onClick="exupdate()" /> -->
                  


</div>

                         </div>           <div class="clearfix"></div>
                                </div>
	<div id="newPersons_divcollection" style="padding:0px; margin:0px;"></div>
					   	 <div class="col-sm-6"></div>
                        <div class="clearfix"></div>
                        <div class="row" style="margin-left:2%;">
				
                  		<!-- <a href="#"  class="input_outer"> <span class="fa fa-plus"></span></a> -->
                  		<!-- <button class="btn btn2_blank btn2 wid_auto" onclick="return addPerson();"> <span class="fa fa-plus"></span></button> -->
                  		<div class="plus"><span class="fa fa-plus" onclick="return addPersonCollection();"></span></div>
                  		<input type="hidden" id="counter_txt" value="1" />
           
                        <div class="col-sm-6 text-right l_h_37" style="margin-top:6%;">Total amount collected</div>
                        <div class="col-sm-6" style="margin-top:6%;"><input type="text" class="form-control bold_placeh"
						placeholder="<?php echo $sumcollection ;?>" name="Name1" disabled="disabled" /></div>
                        
                        
                      
                    </div>		
                 <div class="clearfix"></div>
				       </div>
					       <div class="row" >
						   <div class="col-sm-3 ">
						   </div>
                       <div class="col-sm-3 " style="border-top: 1px solid #DADADA;padding-top: 10px;">
            <div class="text-blackFull f13">Grand total: </div>
total amount spent - total amount collected
            </div>
			
		
			
			
            <div class="col-sm-3" style="border-top: 1px solid #DADADA;padding-top: 10px;">
			<input type="text" class="form-control bold_placeh" placeholder="<?php echo ($sum-$sumcollection);?>" name="Name2" disabled="disabled" /></div>
			      </div>
        <div class="row">
                  <div class="col-sm-4 ">
						   </div>
						   <br/>
                 <div class="col-sm-offset-3 col-sm-6 text-center"><input type="submit" name="expend"  class="btn btn-danger" value="Save"></div>
				 </div>
                 </form>
				 
				 
				 
				 
                 <div class="clearfix"></div>
			</div>
      	
		</div>
		<!--End Content-->
	</div>
<div class="result1"></div>
<!--End Container-->

<script type="text/javascript">
$(document).ready(function() {

	$('#input_date').datepicker({setDate: new Date()});

});
</script>
<script>
function editcollectionprice(id,name,price)
{
//alert(id+name+price);
//alert("dkjghjfd");
$('#collectionname').attr("value",name); 
$('#collectionprice').attr("value",price);
 $('#collectionname').attr("mycid",id); 
 
$("#crgroup1").show();

}
</script>


<script>
function colpriceupdate()
{

 var id= $('#collectionname').attr("mycid"); 

  var ename=$('#collectionname').val(); 
    var cprice=$('#collectionprice').val(); 
	//alert(id);
	//alert(id+ename+cprice);
	
$.post("edit_collection.php",{exp_id:id,exp_name:ename,col_price:cprice},function(data) {
 location.reload();
alert(data);
//$( ".result1" ).html('MY ID is - '+data );
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
		});
		
</script>

<script type="text/javascript">
	$(document).ready(function(){
        $('select').selectBox({ mobile: true });
	});
	
	function addPerson(){
		var counter = parseInt($("#counter_txt").val());
		var newPerson = $("<div id='newdiv"+counter+"' class=\"\" style=\"padding:0px; margin:0px;\"><div class=\"col-sm-5\"><input type=\"text\" class=\"form-control\"placeholder=\"\" name=\"expenditure_name[]\" id='person1"+counter+"' /></div>		<div class=\"col-sm-5\"><input type=\"text\" class=\"form-control\" placeholder=\"\"name=\"expenditure_price[]\" id='price"+counter+"' /></div><div class=\"col-sm-2\"><div class=\"\">		<i class=\"fa fa-times\"  onclick=\"return delPerson("+counter+");\" style=\"color:#6A6A6A\;line-height: 2em;  font-size: 24px;\"></i></div></div><div class=\"clearfix\"></div></div>");
		$("#newPersons_div").append(newPerson);
		$("#counter_txt").val(counter+1);
		}
	

	function delPerson(counter){
		$('#newdiv'+counter).remove();
	}
</script>
<script type="text/javascript">
	$(document).ready(function(){
        $('select').selectBox({ mobile: true });
	});
	
	function addPersonCollection(){

		var counter = parseInt($("#counter_txt1").val());

			var newPerson = $("<div id='newdiv"+counter+"' class=\"\" style=\"padding:0px; margin:0px;\"><div class=\"col-sm-5\"><input type=\"text\" class=\"form-control\"placeholder=\"\" name=\"collection_name1[]\" id='person1"+counter+"' /></div>		<div class=\"col-sm-5\"><input type=\"text\" class=\"form-control\" placeholder=\"\"name=\"collection_price1[]\" id='price"+counter+"' /></div><div class=\"col-sm-2\"><div class=\"\">		<i class=\"fa fa-times\"  onclick=\"return delPerson("+counter+");\" style=\"color:#6A6A6A\;line-height: 2em;  font-size: 24px;\"></i></div></div><div class=\"clearfix\"></div></div>");
		
		$("#newPersons_divcollection").append(newPerson);
		$("#counter_txt1").val(counter+1);
			}

	function delPerson(counter){
		$('#newdiv'+counter).remove();
	}
</script>
<script>
function deletcollectionprice(delid)
{
//alert(delid);
$.post("delete_collection.php",{cal_id:delid},function(data) { location.reload();
//$(".delresult").html(data);
});

}
</script>
<script src="js/footer_js.js"></script>
<?php include("footer.php"); ?>
</body>
</html>
