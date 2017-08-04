<?php 
include('../header.php');
error_reporting(0);
	include_once 'localdatabase.php';
	$db_data = new DB_Connect();
if ($_POST['submit']) {
	$page=$_POST['page'];
	$path="home_images/";
	$milliseconds = round(microtime(true) * 1000);
$img1=$_FILES['file']['name'];
$img=$milliseconds.'_'.$img1;
$path=$path.trim($img);
move_uploaded_file($_FILES['file']['tmp_name'],$path);
//echo "update `subpage_images` set image='$img' where page='$page'";
	$res_vals=mysql_query("update `subpage_images` set image='$img' where page='$page'");
	 $recent =mysql_affected_rows();
	
	// echo 'kj '.$recent;
if($recent==0)
{
mysql_query("insert into `subpage_images` values('','$page','$img')");
}
}

?>
<script type="text/javascript">
function clearField() {
  if(document.getElementById) {
     document.clearform.reset();
  }
}
</script>
<header>

<div
	class="parentContainer" style="height: 1px"></div>
<div>

<div id="menu"><section> <a href="index.php"><img src="../img/logo.png"
	alt=""></a>
<ul class="clearfix">
	<li><a href="../index.php">Home</a></li>
	<li><a href="../about.php">About Us</a></li>
	<li><a href="../courses.php">Courses</a></li>
	<li class="selected"><a href="../register.php">Alumni Association</a></li>
	<li><a href="../gallery.php">Our Gallery</a></li>
	<li><a href="../contact.php">Contact Us</a></li>
</ul>
</section></div>

</div>
</header>

<!-- CONTENT -->

<div id="contentBk">
<div id="content" class="clearfix">
<div class="wrapper" style="margin-top: 10px;">
<div class="columnclearfix" style="min-height:200px;">
<h2 style="color: #8CA248;border-bottom: 1px solid #E7EBEC;font-weight: 400;font-size: 18px;padding-bottom: 10px;width:96%;margin-left:2%;">Update all sub pages(aboutus,courses,alumni associations,gallery,contact us) header images here...</h2>
<p style="font-size:12px;text-align:left;margin-left:2%;">Max Image Upload Size:(Less than 2.5MB)</p>
<form action="" method="post" class="message"
	enctype="multipart/form-data">
<table style="width:50%;border:1px solid #eee;vertical-align:middle;position:relative;left:24%;top:5px;">
	<tr>
		<td><label>Category : </label></td>
		<td><select name="page" onchange="filter(this.value)">
			<option>About US</option>
			<option>Alumini Associations</option>
			<option value="physical">Physical Sciences</option>
			<option value="life">Life Sciences</option>
			<option value="pg">PG Courses</option>
			<option value="commerce">Commerce Courses</option>
			<option>Gallery</option>
			<option>Contact US</option>
		</select>
	
	</tr>
<tr>
		<td><label>Header Image : </label></td>
		<td><input size="25" name="file"  accept='image/*'  multiple="" type="file" 
			  style="width:85%;border:0px;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:10pt" class="box"/ ></td>
	</tr>

	<tr>
		<td><input type="submit" id="mybut" value="Upload" name="submit" style="background-color: rgb(149, 165, 68);
color: white;padding: 5px;border-radius: 4px;font-weight: bold;position:relative;left:30%;"/></td>
	</tr>


</table>
</form>
  <div style="width:50%;height:400px;overflow:scroll;margin-left:24%;margin-bottom:30px;position:relative;top:15px;">
<table>
<tr>
<th>S.no</th>
<th>Page</th>
<th>Image</th>
<th>Delete</th>
</tr>
<?
$query=mysql_query('select * from subpage_images order by id desc');
$i=0;
while($row=mysql_fetch_array($query))
{
$i++;
?>
<tr>
<td><?=$i?></td>
<td><?=$row['page']?></td>
<td><img src="home_images/<?=$row['image']?>" style="width:140px;height:80px;"/></td>
<td><a href="http://www.masterjiinstitutions.com/college/admin/delete_page.php?id=<?php echo $row['id'];?>" 
onclick="return confirm('Are you really want to delete..?')">
<img src="del.png" style="width:20px;height:20px;"/></a></td>
</tr>
<?
}
?>
</table>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- FOOTER -->

<?php include("footer.php"); ?>

<!-- END SITE CONTENT -->

<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src="js/scripts.js"></script>