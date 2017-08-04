<?php
$page="alert";
include_once('dbFunction.php');
$obj = new dbFunction();

?>



<!DOCTYPE html>
<html lang="en">
<?php include("top_header.php"); ?>	
<script>
		$(function () {
   $('.panel-google-plus > .panel-footer > .input-placeholder, .panel-google-plus > .panel-google-plus-comment > .panel-google-plus-textarea > button[type="reset"]').on('click', function(event) {
        var $panel = $(this).closest('.panel-google-plus');
            $comment = $panel.find('.panel-google-plus-comment');
            
        $comment.find('.btn:first-child').addClass('disabled');
        $comment.find('textarea').val('');
        
        $panel.toggleClass('panel-google-plus-show-comment');
        
        if ($panel.hasClass('panel-google-plus-show-comment')) {
            $comment.find('textarea').focus();
        }
   });
   $('.panel-google-plus-comment > .panel-google-plus-textarea > textarea').on('keyup', function(event) {
        var $comment = $(this).closest('.panel-google-plus-comment');
        
        $comment.find('button[type="submit"]').addClass('disabled');
        if ($(this).val().length >= 1) {
            $comment.find('button[type="submit"]').removeClass('disabled');
        }
   });
});
		</script>
	<!-- helloo this is from git -->

<body>
<!--Start Header-->
<div id="screensaver">
  <canvas id="canvas"></canvas>
  <i class="fa fa-lock" id="screen_unlock"></i> </div>
<div id="modalbox">
  <div class="devoops-modal">
    <div class="devoops-modal-header">
      <div class="modal-header-name"> <span>Basic table</span> </div>
      <div class="box-icons"> <a class="close-link"> <i class="fa fa-times"></i> </a> </div>
    </div>
    <div class="devoops-modal-inner"> </div>
    <div class="devoops-modal-bottom"> </div>
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
    <div id="content" class="col-xs-12 col-sm-10"> <a href="#" class="add_page_button">Alerts & Notifications</a>
	
	
	<!---------Google Plus Drop down BOX------
	<div class="col-xs-5 col-sm-2 col-md-2">
            <div class=" panel-google-plus">
              <div class="dropdown"> <span class="dropdown-toggle" type="button" data-toggle="dropdown"> <span class="[ glyphicon glyphicon-chevron-down ]"></span> </span> </div>
              <div class="panel-google-plus-tags">
                <ul>
                  <li><span class="img-drop"><img src="img/home-icon.png"></span>Home<span class="img-drop-right"><img src="img/drop-arrow.png"></span></li>
                  <li><span class="img-drop"><img src="img/home-icon.png"></span>Profile</li>
                  <li><span class="img-drop"><img src="img/icon-drop-13.png"></span>People</li>
                  <li><span class="img-drop"><img src="img/icon-drop-02.png"></span>Photos</li>
                  <li><span class="img-drop"><img src="img/icon-drop-06.png"></span>Collections</li>
                  <li><span class="img-drop"><img src="img/icon-drop-08.png"></span>Communities</li>
                  <li><span class="img-drop"><img src="img/icon-drop-03.png"></span>Events</li>
                  <li><span class="img-drop"><img src="img/hangout-icon.png"></span>Hangouts</li>
                  <li><span class="img-drop"><img src="img/icon-drop-06.png"></span>Pages</li>
                  <li><span class="img-drop"><img src="img/icon-drop-05.png"></span>Settings</li>
                </ul>
              </div>
            </div>
          </div>
	
	
	
	<!-----------gOOGLE PLUS DROP DOWN BOX------->
	
      <div class="clearfix"></div>
        <!--------Tabe Search Starts Here------->
        
		<div class="container-fluid"> 
        <div class="row grey-bg">
          <div class="col-xs-12 col-sm-8 col-md-12">
            <div class="cd-tabs">
	<nav>
		<ul class="cd-tabs-navigation">
			<li><a data-content="inbox" class="selected" href="#0">All</a></li>
			<li><a data-content="new" href="#0">Photos</a></li>
			<li><a data-content="gallery" href="#0">Videos</a></li>
			<li><a data-content="store" href="#0">Links</a></li>
		
		</ul> <!-- cd-tabs-navigation -->
	</nav>


	<ul class="cd-tabs-content">
		<li data-content="inbox" class="selected">
			<!-------Margin Controler---->
			   <div class="col-xs-12 col-sm-12 col-md-12" >
			  <!----------Text Editor Box------->

<form name="" id="form1" action="alert_insert.php" method="post" enctype="multipart/form-data">


			 <div class="col-xs-6 col-sm-8 col-md-5 editor-box">

<textarea 	rows="5" cols="50" class="editable" g_editable="true"  contenteditable="plaintext-only" aria-labelledby="186" dir="LTR" name="content123" id="content123" class="form-control" placeholder="Shared text here" value="" >	</textarea>	  
		

			  	 			 <div class="row" style="display:none;" id="video">
		

<br>
	 <input type="file" name="myvideo" id="myvideo" placeholder="Video Upload:" >
			 <br><br><br>


			 </div>
<div class="row" style="display:none;" id="link">
		

<br>

		<input type="text" name="link123" id="link123" class="form-control" placeholder="link" value="" >

			 </div>
	 			 <div class="row" style="display:none;" id="photo">
		

<br>
	 <input type="file" name="myfiles[]" id="myfiles" placeholder="Photos Upload:" value=""  >
			 <br><br><br>


			 </div>
		<input type="hidden" name="type_name" id="typename" class="form-control" placeholder="link" value="text"/>
			  <div class="iH">
				<div class="j7 Be" guidedhelpid="sharebox_text">
				<div class="m7"><div class="mB k7"></div>
				<div class="mB l7"></div>
				</div>
				<span role="button" class="d-s aj oqa" tabindex="0" style="-webkit-user-select: none;">
					<div class="yl lH"></div>
					<div class="dv" id="mytext" onclick="text();">Text</div>
				</span></div>
				
				<div class="j7 " guidedhelpid="sharebox_photos">
					<div class="m7"><div class="mB k7"></div>
					<div class="mB l7"></div>
				</div>
				<span role="button" class="d-s aj nqa" tabindex="0" style="-webkit-user-select: none;">
					<div class="yl FD"></div>
						<div class="dv"  id="photo"  onclick="photos();">Photos</div>
				</span>
				</div>
				
				<div class="j7 " guidedhelpid="sharebox_link">
					<div class="m7">
						<div class="mB k7"></div>
						<div class="mB l7"></div>
					</div>
					<span role="button" class="d-s aj mqa" tabindex="0" style="-webkit-user-select: none;">
					<div class="yl kH"></div>
					<div class="dv"  onclick="link();" >Link</div>
					</span>
				</div>
				
				<div class="j7 " guidedhelpid="sharebox_video">
					<div class="m7">
						<div class="mB k7"></div>
						<div class="mB l7"></div></div>
							<span role="button" class="d-s aj pqa" tabindex="0" style="-webkit-user-select: none;">
							<div class="yl mH"></div>
							<div class="dv"  onclick="video();">Video</div>
							</span>
						</div>
			
						
			  </div>
			  <div class="footer-editor">
				<!-- <div role="button" class="send-editor" id="save" name="save" guidedhelpid="sharebutton" aria-disabled="true">Send</div>  -->
<input type="submit" name="mysubmit"  class="send-editor" value="Send"> 
				<div role="button" class="cancel-editor" guidedhelpid="sharebutton" aria-disabled="true">Cancel</div>
			  </div>
			  </div>
			  
			  </form>
			  <!---text editor box--------->
			  
			  
			   <!----------Comments Box------->
			   
			   <?php
			  $admin_id=$_SESSION['adminid'];
			   $get_qry=mysql_query("select * from alerts ORDER BY alerts_id DESC") or die(mysql_error());
			   
			   if(mysql_num_rows($get_qry)>0)
			   {
			   while($get_data=mysql_fetch_array($get_qry))
			   {
			   $usertype=$get_data['alerts_usertype'];
			   $show_data=$get_data['alerts_type'];
			   if($usertype=="admin")
			   {
			   $get_login_data=mysql_query("select * from admin where admin_id=".$admin_id);
			   if(mysql_num_rows($get_login_data)>0)
			   {
			   	  $logged_details=mysql_fetch_array($get_login_data);
			   }
			   }
		
			?>
			   
			  <div class="col-xs-6 col-sm-6 col-md-5 data-box">
			  <div class="panel-top-post">
			  <div class="left-pst-box"><img src="uploads/adminimages/<?php echo $logged_details['admin_image']; ?>"></div>
			  <div class="name-pst-box"><h4 class="name-pst"><?php echo $logged_details['admin_name'];?></h4>
			   <span class="text-info-pst">Shared Post<span class="text-info-pst-a">
			   <a href="#">
			<?php 
			
			$date = $get_data['alerts_date'];
		
$date = strtotime($date);
$var=date('H', $date);
$timevar=date('H:i', $date);
	 if($var<=12)
	 {
	 $show="AM";
	 	echo $timevar.' '.$show;
	 }
	 else if($var>12)
	 {
	  $show="PM";
	 	echo $timevar.' '.$show;
	 }
		?>	
			   </a></span></span> 
				</div>
			  <p class="text-black-pst">
			  
			  			<?php echo $get_data['alerts_text'];?>
			  
			  </p>
			  </div>
			  
			  <div class="img-post">
			  
			  <?php
			  if($show_data=="link")
			  {
			  echo "<b>Link: </b><a href='".$get_data['alerts_data']."' target='_new'>".$get_data['alerts_data']."</a>";
			  }
			  else if($show_data=="photos")
			  {

			  ?>
			  <img src="uploads/alerts/<?php echo $get_data['alerts_data']; ?>" style="max-height:230px; max-width:346px;" class="img-responsive">
			  <?php 
			  } 
			  else if($show_data=="video") 
			  { 
			  ?> 
		<video width="320" height="240" controls>
  <source src="<?php echo $siteurl;?>uploads/alerts/<?php echo $get_data['alerts_data']; ?>" type="video/mp4">

</video>
<?php } ?>

			  </div>
			  
			  </div>
			  
			 <?php 
			     	   }
			   }
			   
			   ?>
			  <!---Comments box--------->
			  
			  
			  
			  </div>
			  <!-------Margin Controler---->
		</li>

		<li data-content="new">
			<!-------Margin Controler---->
			   <div class="col-xs-12 col-sm-12 col-md-12" >
			  <!----------Text Editor Box------->
			  <div class="col-xs-6 col-sm-8 col-md-5 editor-box">
			 Text Editor division Comes Here Just insert the script and div inside this panel
			  </div>
			  <!---text editor box--------->
			  
			  
			   <!----------Comments Box------->
			  <div class="col-xs-6 col-sm-6 col-md-5 data-box">
			  <div class="panel-top-post">
			  <div class="left-pst-box"><img src="img/alert-demo.png"></div>
			  <div class="name-pst-box"><h4 class="name-pst">HCL</h4>
			   <span class="text-info-pst">Shared Publicity<span class="text-info-pst-a"><a href="#">1.45 PM</a></span></span> 
				</div>
			  <p class="text-black-pst">A must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GP</p>
			  </div>
			  <div class="img-post"><img src="img/alert-demo.png" class="img-responsive"></div>
			  </div>
			  <!---Comments box--------->
			  
			   <!----------Comments Box------->
			  <div class="col-xs-6 col-sm-6 col-md-5 data-box">
			  <div class="panel-top-post">
			  <div class="left-pst-box"><img src="img/alert-demo.png"></div>
			  <div class="name-pst-box"><h4 class="name-pst">HCL</h4>
			   <span class="text-info-pst">Shared Publicity<span class="text-info-pst-a"><a href="#">1.45 PM</a></span></span> 
				</div>
			  <p class="text-black-pst">A must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GP</p>
			  </div>
			  <div class="img-post"><img src="img/alert-demo.png" class="img-responsive"></div>
			  </div>
			  <!---Comments box--------->
			  
			  
			   <!----------Comments Box------->
			  <div class="col-xs-6 col-sm-6 col-md-5 data-box">
			  <div class="panel-top-post">
			  <div class="left-pst-box"><img src="img/alert-demo.png"></div>
			  <div class="name-pst-box"><h4 class="name-pst">HCL</h4>
			   <span class="text-info-pst">Shared Publicity<span class="text-info-pst-a"><a href="#">1.45 PM</a></span></span> 
				</div>
			  <p class="text-black-pst">A must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GP.A must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GPA must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GP</p>
			  </div>
			  <div class="img-post"><img src="img/alert-demo.png" class="img-responsive"></div>
			  </div>
			  <!---Comments box--------->
			  
			  
			  <!----------Comments Box------->
			  <div class="col-xs-6 col-sm-6 col-md-5 data-box">
			  <div class="panel-top-post">
			  <div class="left-pst-box"><img src="img/alert-demo.png"></div>
			  <div class="name-pst-box"><h4 class="name-pst">HCL</h4>
			   <span class="text-info-pst">Shared Publicity<span class="text-info-pst-a"><a href="#">1.45 PM</a></span></span> 
				</div>
			  <p class="text-black-pst">A must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GP.A must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GPA must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GP</p>
			  </div>
			  <div class="img-post"><img src="img/alert-demo.png" class="img-responsive"></div>
			  </div>
			  <!---Comments box--------->
			  
			  <!----------Comments Box------->
			  <div class="col-xs-6 col-sm-6 col-md-5 data-box">
			  <div class="panel-top-post">
			  <div class="left-pst-box"><img src="img/alert-demo.png"></div>
			  <div class="name-pst-box"><h4 class="name-pst">HCL</h4>
			   <span class="text-info-pst">Shared Publicity<span class="text-info-pst-a"><a href="#">1.45 PM</a></span></span> 
				</div>
			  <p class="text-black-pst">A must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GP.A must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GPA must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GP</p>
			  </div>
			  <div class="img-post"><img src="img/alert-demo.png" class="img-responsive"></div>
			  </div>
			  <!---Comments box--------->
			  
			  
			  
			  </div>
			  <!-------Margin Controler---->
		</li>

		<li data-content="gallery">
			<!-------Margin Controler---->
			   <div class="col-xs-12 col-sm-12 col-md-12" >
			  <!----------Text Editor Box------->
			  <div class="col-xs-6 col-sm-8 col-md-5 editor-box">
			 Text Editor division Comes Here Just insert the script and div inside this panel
			  </div>
			  <!---text editor box--------->
			  
			  
			   <!----------Comments Box------->
			  <div class="col-xs-6 col-sm-6 col-md-5 data-box">
			  <div class="panel-top-post">
			  <div class="left-pst-box"><img src="img/alert-demo.png"></div>
			  <div class="name-pst-box"><h4 class="name-pst">HCL</h4>
			   <span class="text-info-pst">Shared Publicity<span class="text-info-pst-a"><a href="#">1.45 PM</a></span></span> 
				</div>
			  <p class="text-black-pst">A must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GP</p>
			  </div>
			  <div class="img-post"><img src="img/alert-demo.png" class="img-responsive"></div>
			  </div>
			  <!---Comments box--------->
			  
			   <!----------Comments Box------->
			  <div class="col-xs-6 col-sm-6 col-md-5 data-box">
			  <div class="panel-top-post">
			  <div class="left-pst-box"><img src="img/alert-demo.png"></div>
			  <div class="name-pst-box"><h4 class="name-pst">HCL</h4>
			   <span class="text-info-pst">Shared Publicity<span class="text-info-pst-a"><a href="#">1.45 PM</a></span></span> 
				</div>
			  <p class="text-black-pst">A must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GP</p>
			  </div>
			  <div class="img-post"><img src="img/alert-demo.png" class="img-responsive"></div>
			  </div>
			  <!---Comments box--------->
			  
			  
			   <!----------Comments Box------->
			  <div class="col-xs-6 col-sm-6 col-md-5 data-box">
			  <div class="panel-top-post">
			  <div class="left-pst-box"><img src="img/alert-demo.png"></div>
			  <div class="name-pst-box"><h4 class="name-pst">HCL</h4>
			   <span class="text-info-pst">Shared Publicity<span class="text-info-pst-a"><a href="#">1.45 PM</a></span></span> 
				</div>
			  <p class="text-black-pst">A must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GP.A must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GPA must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GP</p>
			  </div>
			  <div class="img-post"><img src="img/alert-demo.png" class="img-responsive"></div>
			  </div>
			  <!---Comments box--------->
			  
			  
			  <!----------Comments Box------->
			  <div class="col-xs-6 col-sm-6 col-md-5 data-box">
			  <div class="panel-top-post">
			  <div class="left-pst-box"><img src="img/alert-demo.png"></div>
			  <div class="name-pst-box"><h4 class="name-pst">HCL</h4>
			   <span class="text-info-pst">Shared Publicity<span class="text-info-pst-a"><a href="#">1.45 PM</a></span></span> 
				</div>
			  <p class="text-black-pst">A must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GP.A must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GPA must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GP</p>
			  </div>
			  <div class="img-post"><img src="img/alert-demo.png" class="img-responsive"></div>
			  </div>
			  <!---Comments box--------->
			  
			  <!----------Comments Box------->
			  <div class="col-xs-6 col-sm-6 col-md-5 data-box">
			  <div class="panel-top-post">
			  <div class="left-pst-box"><img src="img/alert-demo.png"></div>
			  <div class="name-pst-box"><h4 class="name-pst">HCL</h4>
			   <span class="text-info-pst">Shared Publicity<span class="text-info-pst-a"><a href="#">1.45 PM</a></span></span> 
				</div>
			  <p class="text-black-pst">A must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GP.A must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GPA must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GP</p>
			  </div>
			  <div class="img-post"><img src="img/alert-demo.png" class="img-responsive"></div>
			  </div>
			  <!---Comments box--------->
			  
			  
			  
			  </div>
			  <!-------Margin Controler---->
		</li>

		<li data-content="store">
<!-------Margin Controler---->
			   <div class="col-xs-12 col-sm-12 col-md-12" >
			  <!----------Text Editor Box------->
			  <div class="col-xs-6 col-sm-8 col-md-5 editor-box">
			 Text Editor division Comes Here Just insert the script and div inside this panel
			  </div>
			  <!---text editor box--------->
			  
			  
			   <!----------Comments Box------->
			  <div class="col-xs-6 col-sm-6 col-md-5 data-box">
			  <div class="panel-top-post">
			  <div class="left-pst-box"><img src="img/alert-demo.png"></div>
			  <div class="name-pst-box"><h4 class="name-pst">HCL</h4>
			   <span class="text-info-pst">Shared Publicity<span class="text-info-pst-a"><a href="#">1.45 PM</a></span></span> 
				</div>
			  <p class="text-black-pst">A must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GP</p>
			  </div>
			  <div class="img-post"><img src="img/alert-demo.png" class="img-responsive"></div>
			  </div>
			  <!---Comments box--------->
			  
			   <!----------Comments Box------->
			  <div class="col-xs-6 col-sm-6 col-md-5 data-box">
			  <div class="panel-top-post">
			  <div class="left-pst-box"><img src="img/alert-demo.png"></div>
			  <div class="name-pst-box"><h4 class="name-pst">HCL</h4>
			   <span class="text-info-pst">Shared Publicity<span class="text-info-pst-a"><a href="#">1.45 PM</a></span></span> 
				</div>
			  <p class="text-black-pst">A must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GP</p>
			  </div>
			  <div class="img-post"><img src="img/alert-demo.png" class="img-responsive"></div>
			  </div>
			  <!---Comments box--------->
			  
			  
			   <!----------Comments Box------->
			  <div class="col-xs-6 col-sm-6 col-md-5 data-box">
			  <div class="panel-top-post">
			  <div class="left-pst-box"><img src="img/alert-demo.png"></div>
			  <div class="name-pst-box"><h4 class="name-pst">HCL</h4>
			   <span class="text-info-pst">Shared Publicity<span class="text-info-pst-a"><a href="#">1.45 PM</a></span></span> 
				</div>
			  <p class="text-black-pst">A must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GP.A must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GPA must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GP</p>
			  </div>
			  <div class="img-post"><img src="img/alert-demo.png" class="img-responsive"></div>
			  </div>
			  <!---Comments box--------->
			  
			  
			  <!----------Comments Box------->
			  <div class="col-xs-6 col-sm-6 col-md-5 data-box">
			  <div class="panel-top-post">
			  <div class="left-pst-box"><img src="img/alert-demo.png"></div>
			  <div class="name-pst-box"><h4 class="name-pst">HCL</h4>
			   <span class="text-info-pst">Shared Publicity<span class="text-info-pst-a"><a href="#">1.45 PM</a></span></span> 
				</div>
			  <p class="text-black-pst">A must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GP.A must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GPA must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GP</p>
			  </div>
			  <div class="img-post"><img src="img/alert-demo.png" class="img-responsive"></div>
			  </div>
			  <!---Comments box--------->
			  
			  <!----------Comments Box------->
			  <div class="col-xs-6 col-sm-6 col-md-5 data-box">
			  <div class="panel-top-post">
			  <div class="left-pst-box"><img src="img/alert-demo.png"></div>
			  <div class="name-pst-box"><h4 class="name-pst">HCL</h4>
			   <span class="text-info-pst">Shared Publicity<span class="text-info-pst-a"><a href="#">1.45 PM</a></span></span> 
				</div>
			  <p class="text-black-pst">A must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GP.A must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GPA must read on how to overcome challenges around operational efficiency, cost reduction and enhance customer satisfaction. Check it out: http://okt.to/sFE3GP</p>
			  </div>
			  <div class="img-post"><img src="img/alert-demo.png" class="img-responsive"></div>
			  </div>
			  <!---Comments box--------->
			  
			  
			  
			  </div>
			  <!-------Margin Controler---->		</li>

		
	</ul> <!-- cd-tabs-content -->
</div>
  </div>
  <div class="clearfix"></div>
</div>
</div>
</div>
</div>
</div>


<div id="divdata"></data>
<!--End Content-->
<!--End Container-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src='js/jquery-1.9.1.min.js'></script>
<script src="plugins/jquery/jquery-2.1.0.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/main.js"></script>
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.selectBox.js"></script>
<link type="text/css" rel="stylesheet" href="css/jquery.selectBox.css"/>
<script type="text/javascript">
		  $(document).ready(function(){
            $('select').selectBox({ mobile: true });
			$(".table_st_1 tr:odd").addClass("odd");
			
		});
	
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

jQuery(".editable").click(function(){
	jQuery(".editor-box").addClass("opened-editor");
	jQuery(".footer-editor").css("display", "block");
});

jQuery(".cancel-editor").click(function(){
		jQuery(".editor-box.opened-editor").removeClass("opened-editor");
		jQuery(".footer-editor").css("display", "none");
});

	
	
</script>

<script>
    // $(document).ready(function() {

        // $("#save").click(function (e) {         
          //var content = $('[class^="editable"]').html(); 

// var content1 = $('#content123').val(); 
// var type1 = $("#typename").val();  
// var link1 = $("#link123").val();  


// alert(content1+'..'+type1+'...'+link1);

// $.post("alert_insert.php",{content1:content1,link1:link1,type1:type1},function(data) {  //location.reload();
//$( ".result" ).html('MY ID is - '+data );
// $("#divdata").html(data);
// alert(data);
	// });

	// });
	
// });

</script>

<script>
function text()
{
	$("#typename").val('text');
	$("#photo").hide();
		$("#video").hide();
			$("#link").hide();
}
</script>

<script>
function link()
{
	$("#typename").val('link');
	$("#link").show();
	$("#photo").hide();
		$("#video").hide();
}
</script>
<script>
function video()
{
	$("#typename").val('video');
	$("#video").show();
		$("#link").hide();
	$("#photo").hide();
}
</script>
<script>
function photos()
{
	$("#typename").val('photos');
	$("#photo").show();
		$("#link").hide();
	$("#video").hide();
}
</script>
<?php include("footer.php"); ?>
</body>
</html>
