<?php
//error_reporting(0);
$siteurl="http://safehome.rushforme.com/";
if($_SESSION['username']!="")
{
$adminid=$_SESSION['adminid'];

$_SESSION['role']="admin";

$superadindetails=$obj->getadmin($adminid);

$fetch=mysql_fetch_array($superadindetails);




}
if(!isset($_SESSION['email']) )
{
//ob_start();
//echo "workig";
//echo "shdahjdsaygdgdgdui";
// echo '<script type="text/javascript">alert("sdg");window.location.href='.$siteurl.';</script>';
header("Location:index.php");
//exit();
}
?>
<div class="container-fluid expanded-panel">
		<div class="row" >
			<div id="logo" class="col-xs-12 col-sm-2">
				<a href="home.php">CEA</a>
			</div>
			<div id="top-panel" class="col-xs-12 col-sm-10">
				<div class="row">
					<div class="col-xs-8 col-sm-6">
						<a href="#" class="show-sidebar d_n">n
						  <i class="fa fa-bars"></i>
						</a>
                        <h4 style="margin-top:20px;margin-left:11px">
					<?php 	if($page=="profile"){ echo "Profile Details";
					}
					else if($page=="visitor"){ echo "Visitor Management";
					} 
					else if($page=="security"){ echo "Security Management";
					} 
					else if($page=="home"){ echo "Home";
					} 
					else if($page=="location"){ echo "Location Management";
					} 
					else if($page=="floor"){ echo "Floor Management";
					} 
					else if($page=="flat"){ echo "Flat Management";
					}
					else if($page=="owner"){ echo "Owner Management";
					}
						else if($page=="cpwd"){ echo "Change Password";
					}
						else if($page=="apartmentdetails"){ echo "Apartment Details";
					}
				
					?>
				
						</h4>
					</div>
					<div class="col-xs-4 col-sm-6 top-panel-right">
                     <!--Profile Outer End-->
                     <div class="profil_outer pull-right">
                     	<a href="javascript:void(0);" class="profile_button" data-toggle="dropdown">
										
										   <img src="uploads/adminimages/<?php echo $fetch['admin_image']; ?>"
										class="img-rounded" alt="avatar" /> 
										
                                        <span><?php echo $_SESSION['username']; ?></span>
										<i class="fa fa-angle-down pull-right" style="margin-top:8px;"></i>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="profile.php">
											<i class="fa fa-user"></i>
											<span class=" text">Profile</span>
										</a>
									</li>
									
									<li>
										<a href="logout.php">
											<i class="fa fa-power-off"></i>
											<span class=" text">Logout</span>
										</a>
									</li>
								</ul>
                     </div>
					</div>
				</div>
			</div>
		</div>
	</div>