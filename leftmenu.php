<?php


?>
<div id="sidebar-left" class="col-xs-2 col-sm-2" style="background-image: url(img/navbar-backgr.png);  ">
        	<a href="home.php" class="active dashboard ajax-link">
						<i class="fa fa-dashboard" style="margin-left: 5px;"></i>
						<span class="hidden-xs">Dash boards</span>
					</a>
			<ul class="nav main-menu">
				
				<li class="dropdown">
					<a href="javascript:void(0)" class="dropdown-toggle">
						<i class="fa fa-user"></i>
						<span class="hidden-xs">Visitor Management</span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="Add_visitor.php">Add Visitors</a></li>
						<li><a href="visitorschedule.php">PreSchedule</a></li>
						<li><a href="VisitorManagement.php">View Visitor</a></li>
					
					</ul>
				</li>
				<li class="dropdown">
					<a href="javascript:void(0)" class="dropdown-toggle">
						<i class="fa fa-user"></i>
						<span class="hidden-xs">Location Management</span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="add_block.php">Add Block</a></li>
					    <li><a href="add_floor.php">Add Floor</a></li>
					    <li><a href="add_flat.php">Add Flat</a></li>
						 <li><a href="add_facility.php">Add Facility</a></li>
					</ul>
				</li>
				
				<!--
					<li class="dropdown">
					<a href="javascript:void(0)" class="dropdown-toggle">
						<i class="fa fa-user"></i>
						<span class="hidden-xs">Floor</span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="add_floor.php">Add Floor</a></li>
					
					
					</ul>
				</li>
					<li class="dropdown">
					<a href="javascript:void(0)" class="dropdown-toggle">
						<i class="fa fa-user"></i>
						<span class="hidden-xs">Flat</span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="add_flat.php">Add Flat</a></li>
					
					
					</ul>
				</li>
				-->
				
				<li class="dropdown">
					<a href="javascript:void(0)" class="dropdown-toggle">
						<i class="fa fa-users"></i>
						 <span class="hidden-xs">Staff Mangement</span>
					</a>
                    <ul class="dropdown-menu">
						<li><a href="SecurityManagement_AddPersonal.php">Add Staff </a></li>
						<li><a href="SecurityManagement_ViewPersonal123.php">View Staff</a></li> 
					<!--<li><a href="SecurityManagement_ViewPersonal.php">View Staff</a></li>-->
						
						<li><a href="agency.php">Add Agency</a></li>
						<li><a href="SecurityManagement_ContractHire.php">Contract Hire</a></li>
								<li><a href="add_vendor.php">Add Vendor</a></li>
						<!--<li><a href="">Contract Hire</a></li> -->
					</ul>
					
				</li>
				<li class="dropdown">
					<a href="javascript:void(0)" class="dropdown-toggle">
						<i class="fa fa-users"></i>
						 <span class="hidden-xs">Owners management</span>
					</a>
                    <ul class="dropdown-menu">
				<li><a href="add_owner.php">Add Owner</a></li>
					<!--	<li><a href="view_owner.php"> View Owners</a></li> -->
											<li><a href="view_owner123.php">View Owners </a></li> 
							
					</ul>
					
				</li>
				<li class="dropdown">
					<a href="javascript:void(0)" class="dropdown-toggle">
						<i class="fa fa-envelope"></i>
						 <span class="hidden-xs">SMS Broadcasting</span>
					</a>
                     <ul class="dropdown-menu">
						<li><a href="SMSCampaign.php">SMS Campaign</a></li>
						<li><a href="SMSReport1.php">SMS Report</a></li>
					</ul>
					
				</li>
					<li class="dropdown">
					<a href="javascript:void(0)" class="dropdown-toggle">
						<i class="fa fa-envelope"></i>
						 <span class="hidden-xs">Email Broadcasting</span>
					</a>
                     <ul class="dropdown-menu">
						<li><a href="EmailCampaign.php">Email Campaign</a></li>
						<li><a href="EmailReport.php">Email Report</a></li>
					</ul>
					
				</li>
				<li class="dropdown">
					<a href="alert.php" class="dropdown-toggle">
						<i class="fa fa-bell"></i>
						 <span class="hidden-xs">Alerts & Notifications</span>
					</a>
					
				</li>
				
				
				
		
				<li class="dropdown">
					<a href="javascript:void(0)" class="dropdown-toggle">
						<i class="fa fa-list-alt"></i>
						<span class="hidden-xs">Maintenance</span>
					</a>
                     <ul class="dropdown-menu">
						<!--<li><a href="Collection.php">Collection</a></li> -->
						
						 	<li><a href="setup.php">SetUp</a></li>
							<li><a href="Maintainance_Expenditure.php">Expenditure</a></li>
								<li><a href="apartment_details.php">Maintenance Metric</a></li>
						
                      
						 <!--  	<li><a href="apartment_details.php">Apartment Details</a></li> -->
						<li><a href="generate_invoice.php">Generate Invoice</a></li>
							<li><a href="#">Generate TDS</a></li>
					</ul>
					
					
					
				</li>
				
				
			<!--	<li class="dropdown">
					<a href="collections.php" class="dropdown-toggle">
						<i class="fa fa-list-alt"></i>
						 <span class="hidden-xs">Collections</span>
					</a>
					
				</li> -->
				
				
				<li class="dropdown">
							<a href="javascript:void(0)" class="dropdown-toggle">
						<i class="fa fa-money"></i>
						<span class="hidden-xs">Cash Management</span>
					</a>
					  <ul class="dropdown-menu">
				<li><a href="collections.php">Collections</a></li>
              <li><a href="account_debit_transactions.php"> Transaction Details</a></li>
			             <!--   <li><a href="account_credit_transactions.php">Account Credit Transactions</a></li> -->
					</ul>
					
				</li>
				
				
						<li class="dropdown">
							<a href="javascript:void(0)" class="dropdown-toggle">
						<i class="fa fa-ticket"></i>
						<span class="hidden-xs">Ticket Management</span>
					</a>
					  <ul class="dropdown-menu">
				<li><a href="MaintainanceReportedIssues.php">Create Ticket</a></li>
              <li><a href="MaintainanceReportedIssuesview.php">View Tickets</a></li>
					</ul>
					
				</li>
											<li>
					<a href="campaign.php">
						<i class="fa fa-list-alt"></i>
						<span class="hidden-xs">Campaign</span>
					</a>
              
					
					
				</li>
				
						<li>
					<a href="facility_booking.php">
						<i class="fa fa-list-alt"></i>
						<span class="hidden-xs">Facility Booking</span>
					</a>
              
					
					
				</li>
				
					<li>
					<a href="add_society_members.php">
						<i class="fa fa-list-alt"></i>
						<span class="hidden-xs">Add Society Members </span>
					</a>
              
					
					
				</li> 
		
				
		
					<li class="dropdown">
							<a href="javascript:void(0)" class="dropdown-toggle">
						<i class="fa fa-list-alt"></i>
						<span class="hidden-xs">Payment Gateway</span>
					</a>
					  <ul class="dropdown-menu">
				<li><a href="#">Payment Details</a></li>
        
					</ul>
					
				</li>
				
				
				
					<li class="dropdown">
							<a href="javascript:void(0)" class="dropdown-toggle">
						<i class="fa fa-list-alt"></i>
						<span class="hidden-xs">Website Details</span>
					</a>
					  <ul class="dropdown-menu">
				<li><a href="create_website.php">Create Website</a></li>
        		<li><a href="websites_list.php">View Websites List</a></li>
					</ul>
					
				</li>
				
					<li class="dropdown">
					<a href="video_surveillance.php" class="dropdown-toggle">
						<i class="fa fa-bell"></i>
						 <span class="hidden-xs">Video Surveillance</span>
					</a>
					
				</li>
		
        </div>