<?php 
session_start();
$page="visitor";
include_once('dbFunction.php');
$obj=new dbFunction();
	$visitor_id=$_POST['idvalue'];
$data=$obj->view_popup_visitor($visitor_id);
?>

	

	     <?php while($vis_rec=mysql_fetch_array($data))
				{ 
			$date=$vis_rec['visitor_date'];
				

$time=date('h:i a', strtotime($date));  ?>
	
	<a href="javascript:;" class="cancel_popup popup_close"><i class="fa fa-times"></i></a>
	       		<div class="row">
                              		<div class="col-sm-4">
									<?php
						$imagepath="uploads/visitor_gallery/".$vis_rec['visitor_image'];
if(file_exists($imagepath) && $vis_rec['visitor_image']!='')
{
	$image=$imagepath;
}
else 
{
	$image="img/profile-icon.png";
}
									?>
<img src="<?php echo $image;?>" width="200" height="190" class="img-rounded" />
                                    </div>
									
									
                                    <div class="col-sm-8">
                                    	<div class="col-sm-12"><h4>Name:
										<?php $vfname = unserialize($vis_rec['visitor_fname']);  
                                               $vlname = unserialize($vis_rec['visitor_lname']);  
										//echo $var1[0].$var2[0];                     
// Show the unserialized data; 
//print_r($vfname);

echo $vfname[0].' '.$vlname[0]."";  

if($vfname[0]=='' && $vlname[0]=='')
{
	echo "---";
	}
?>

										<?php //echo $vis_rec['visitor_fname']; ?> <?php //echo $vis_rec['visitor_lname']; ?>
										
										</h4></div>
                                       
                                        <div class="col-sm-12">Reason: <?php if($vis_rec['visitor_reason']!=''){echo $vis_rec['visitor_reason'];}else{echo "---";}?></div>
                                        <div class="col-sm-12">Person to meet: <?php if($vis_rec['visitor_persontomeet']!=''){echo $vis_rec['visitor_persontomeet'];}else{echo "---";}?></div>
                                        <div class="col-sm-12">Mobile: <?php
                                          $mobile=unserialize($vis_rec['visitor_mobile']);  
										  if($mobile[0]!=''){
										echo $mobile[0];
										  }
else{echo "---";}
										?>
										
										</div>
                                        <div class="col-sm-12">Flat no: <?php if($vis_rec['visitor_flat']!=''){echo $vis_rec['visitor_flat'];}else{echo "---";}?></div>
                                        <div class="col-sm-12">Intime: <?php if($time!=''){echo $time;}else{echo "---";}?> </div>
                                         <div class="col-sm-12">Area: <?php if($vis_rec['visitor_address']!=''){ echo $vis_rec['visitor_address'];}else{echo "---";} ?></div>
                                        	
                                    </div>
                                
               						<div class="clearfix"></div>
                                    <div class="col-sm-1 pull-right"><a href="#"  onClick="printdet()"><img id="print" src="img/print.png" width="53" height="53"></a></div>
                                   <div class="col-sm-1 pull-right"><a href="visitorpdfdownload.php" target="_blank" ><img id="pdf" src="img/acrobite.png" width="53" height="53"></a>
								   </div>
                                   
            					
								</div>                     
                              
<?php


$vreason=$vis_rec['visitor_reason'];
$persontomeet=$vis_rec['visitor_persontomeet'];
$vflatno=$vis_rec['visitor_flat'];
$vaddress=$vis_rec['visitor_address'];

 $_SESSION['vimage']=$image;
  $_SESSION['vfname']=$vfname[0];
   $_SESSION['vlname']=$vlname[0];
    $_SESSION['vreason']=$vreason;
	 $_SESSION['vpersontomeet']=$persontomeet;
	 
	   $_SESSION['vmobile']=$mobile[0];
   $_SESSION['vaddress']=$vaddress;
    $_SESSION['vflatno']=$vflatno;
	 $_SESSION['vtime']=$time;
?>
							  
<div class="clearfix"></div>
<?php } ?>
<?php include("footer.php"); ?>