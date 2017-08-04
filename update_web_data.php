<?php
echo "<script>alert(".$_REQUEST['id'].");</script>";
session_start();
$page="maintenance";
include_once('dbFunction.php');
$obj = new dbFunction();
$apartment_id=1;
if(isset($_POST['update']) and isset($_FILES['header']) and isset($_FILES['banner']) and isset($_FILES['footer'])){
	//print_r($_POST);
	$id = $_REQUEST['id'];
	$path = "newsiteimg/";
	$domainName = $_POST['domainName'];
	$Websit_etext = $_POST['Websit_etext'];
	$contact = $_POST['contact'];
			$domainName = mysql_real_escape_string($domainName);
			$Websit_etext = mysql_real_escape_string($Websit_etext);
			$contact = mysql_real_escape_string($contact);
			static $count =0;

			//update site......
			$updateQry = "update new_website 
							set new_website.domain_name = '$domainName',
									new_website.site_text = '$Websit_etext',
									new_website.site_contacts = '$contact'
							where new_website.website_id = '$id'
							";
			$qry=mysql_query($updateQry) or die(mysql_error());
								if($qry)
								{
									
									echo "<script> alert('site Updated');";
									echo"</script>";
								
									
								}
								//echo "<script> alert('Moved".$realPath."');";
						
						else{
						echo "<script> alert(' not updated');</script>";
						}





			$header = $_FILES['header']['name'];
					$header =mysql_real_escape_string($header);
						//echo "<script> alert('".$header."');</script>";
						
					if(move_uploaded_file($_FILES['header']['tmp_name'], $path.$header)){
						echo "<script> alert('header moved successfullay');</script>";
						$realPath = $path.$header;
							$headerQry = "update web_header 
											set web_header.img_name='$realPath'
											where web_header.website_id = '$id'";
							$qry=mysql_query($headerQry) or die(mysql_error());
								if($qry)
								{
									
									echo "<script> alert('Updated".$header."');";
									echo"</script>";
									$count = $count+1;
									
								}
								//echo "<script> alert('Moved".$realPath."');";
						}
						else{
						echo "<script> alert('file not moved');</script>";
						}
						//Moving of banner................
						$banner = $_FILES['banner']['name'];
							$banner =mysql_real_escape_string($banner);
						if(move_uploaded_file($_FILES['banner']['tmp_name'], $path.$banner)){
						echo "<script> alert('".$banner." moved successfullay');</script>";
						$realPath = $path.$banner;
							$headerQry = "update web_banner 
											set web_banner.banner_name='$realPath'
											where web_banner.website_id = '$id'";
							$qry=mysql_query($headerQry) or die(mysql_error());
								if($qry)
								{
									
									echo "<script> alert('Updated".$banner."');";
									echo"</script>";
									$count = $count+1;
									
								}
								//echo "<script> alert('Moved".$realPath."');";
						}
						else{
						echo "<script> alert('file not moved');</script>";
						}

						// footer moving.....
						$footer = $_FILES['footer']['name'];
							$footer =mysql_real_escape_string($footer);
						if(move_uploaded_file($_FILES['footer']['tmp_name'], $path.$footer)){
						echo "<script> alert('".$footer." moved successfullay');</script>";
						$realPath = $path.$footer;
							$headerQry = "update web_footer 
											set web_footer.footer_name='$realPath'
											where web_footer.website_id = '$id'";
							$qry=mysql_query($headerQry) or die(mysql_error());
								if($qry)
								{
									
									echo "<script> alert('Updated".$footer."');";
									echo"</script>";
									$count = $count+1;
									
								}
								//echo "<script> alert('Moved".$realPath."');";
						}
						else{
						echo "<script> alert('file not moved');</script>";
						}
		

			//redirect to create web....
						
							header("location:http://localhost/mysafehome/safehome/websites_list.php");
					


	}

?>