<?php
$page="visitor";
include_once('dbFunction.php');
$obj=new dbFunction();

$visitor_date=$_POST['datevalue'];

$data=$obj->searchVisitor($visitor_date);
//echo $visitor_date;

if($data){

while($getrec=mysql_fetch_array($data))
{
	$date=$getrec['visitor_date'];
				$time=date('h:i a', strtotime($date)); 
?>

<div class='person_list' onClick="personinfo('<?php echo $getrec['visitor_id']; ?>');">
           	   	<?php
						$imagepath="uploads/visitor_gallery/".$getrec['visitor_image'];
if(file_exists($imagepath) && $getrec['visitor_image']!='')
{
	$image=$imagepath;
}
else 
{
	$image="img/profile-icon.png";
}
									?>

			   <img src='<?php echo $image;?>' width="100" height="100" class="img-rounded">
               

			   <div class="clearfix"></div>
                    <div class="name"><?php 
					
					$var1 = unserialize($getrec['visitor_fname']);  
$var2 = unserialize($getrec['visitor_lname']);  
echo $var1[0].' '.$var2[0];
					
					?></div>
                    <div class="mobile"><?php $mobno1=unserialize($getrec['visitor_mobile']); echo $mobno1[0]; ?></div>
                    <div class="mobile"> <?php echo "In time: ". $getrec['visitor_date']; ?></div>
					
                </div>
<?php } } else { echo "<h4 style='color:red'>no data found </h4>" ;
}


?>
