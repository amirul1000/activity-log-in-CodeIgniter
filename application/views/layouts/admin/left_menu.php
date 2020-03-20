<nav class="sidebar sidebar-offcanvas" id="sidebar">
	<ul class="nav">
		<li class="nav-item nav-profile"><a href="<?php echo site_url('admin/profile/index'); ?>" class="nav-link">
				<div class="nav-profile-image">
					<!--<img
						src="<?php echo base_url(); ?>public/waveney_taxis_dairy/assets/images/faces/face1.jpg"
						alt="profile"> <span class="login-status online"></span>-->
					<!--change to offline or busy as needed-->
                       <?php
						if (is_file(APPPATH . '../public/' . $this->session->userdata['file_picture']) && file_exists(APPPATH . '../public/' . $this->session->userdata['file_picture'])) {
							?>
							  <img class="availability-status online"
								src="<?php echo base_url().'public/'.$this->session->userdata['file_picture']?>"
								alt="">
						<?php
						} else {
							?>
							  <img class="availability-status online"
								src="<?php echo base_url()?>public/uploads/no_image.jpg">
						<?php
						}
						?>
				</div>
				<div class="nav-profile-text d-flex flex-column">
					<span class="font-weight-bold mb-2"><?php echo $this->session->userdata['first_name']?> <?php echo $this->session->userdata['last_name']?></span>
				</div> <i
				class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
		</a></li>
		<li class="nav-item"><a class="nav-link" href="<?php echo site_url('homecontroller'); ?>"> <span
				class="menu-title">Dashboard</span> <i
				class="mdi mdi-home menu-icon"></i>
		</a></li>


		<li class="nav-item"><a class="nav-link collapsed"
			data-toggle="collapse" href="#Diary" aria-expanded="false"
			aria-controls="ui-basic"> <span class="menu-title">Diary</span> <i
				class="menu-arrow"></i> <i class="mdi mdi mdi-animation menu-icon"></i>
		</a>
			<div class="collapse" id="Diary" style="">
				<ul class="nav flex-column sub-menu">
					<li class="nav-item"><a class="nav-link" href="<?php echo site_url('homecontroller'); ?>">Find a Day</a></li>
					<!--<li class="nav-item"><a class="nav-link" href="">Find a Week</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Find a Month</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Find a Year</a></li>-->
				</ul>
			</div></li>
             <?php
			   if($this->session->userdata['user_type']=='admin'){
		     ?>  
        <li class="nav-item"><a class="nav-link collapsed"
			data-toggle="collapse" href="#Bookings" aria-expanded="false"
			aria-controls="ui-basic"> <span class="menu-title">Company</span> <i
				class="menu-arrow"></i> <i class="mdi mdi-calendar-check menu-icon"></i>
		</a>
			<div class="collapse" id="Bookings" style="">
				<ul class="nav flex-column sub-menu">
					<li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/company/index'); ?>">View Company</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/company/save'); ?>">Add a Company</a></li>
					<!--<li class="nav-item"><a class="nav-link" href="#">Edit a Booking</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Delete a Booking</a></li>-->
				</ul>
			</div></li>   
         <?php
            }
		 ?>      
		<li class="nav-item"><a class="nav-link collapsed"
			data-toggle="collapse" href="#Bookings" aria-expanded="false"
			aria-controls="ui-basic"> <span class="menu-title">Bookings</span> <i
				class="menu-arrow"></i> <i class="mdi mdi-calendar-check menu-icon"></i>
		</a>
			<div class="collapse" id="Bookings" style="">
				<ul class="nav flex-column sub-menu">
					<li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/bookings/index'); ?>">View Bookings</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/bookings/save'); ?>">Add a Booking</a></li>
					<!--<li class="nav-item"><a class="nav-link" href="#">Edit a Booking</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Delete a Booking</a></li>-->
				</ul>
			</div></li>
         <?php
			 if($this->session->userdata['user_type']=='admin'){
		   ?>  
		<li class="nav-item"><a class="nav-link collapsed"
			data-toggle="collapse" href="#Customers" aria-expanded="false"
			aria-controls="ui-basic"> <span class="menu-title">Customers</span> <i
				class="menu-arrow"></i> <i
				class="mdi mdi mdi-account-settings menu-icon"></i>
		</a>
			<div class="collapse" id="Customers" style="">
				<ul class="nav flex-column sub-menu">
					<li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/customers/index'); ?>">View Customer</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/customers/save'); ?>">Add a Customer</a></li>
					<!--<li class="nav-item"><a class="nav-link" href="#">Edit a Customer</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Delete a Customer</a></li>-->
				</ul>
			</div></li>

		<li class="nav-item"><a class="nav-link collapsed"
			data-toggle="collapse" href="#Staff" aria-expanded="false"
			aria-controls="ui-basic"> <span class="menu-title">Staff</span> <i
				class="menu-arrow"></i> <i
				class="mdi mdi mdi-account-switch menu-icon"></i>
		</a>
			<div class="collapse" id="Staff" style="">
				<ul class="nav flex-column sub-menu">
					<li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/users/index'); ?>">View Staff</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/users/save'); ?>">Add Staff Member</a></li>
					<!--<li class="nav-item"><a class="nav-link" href="#">Edit Staff Member</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Delete Staff
							Member</a></li>-->
				</ul>
			</div></li>
         <?php
		 }
		?> 
      
		<li class="nav-item"><a class="nav-link" href="#"> <span
				class="menu-title">General Information</span> <i
				class="mdi mdi-clipboard-text menu-icon"></i>
		</a></li>

         <?php
			 if($this->session->userdata['user_type']=='admin'){
		   ?>  
		<li class="nav-item"><a class="nav-link collapsed"
			data-toggle="collapse" href="#Settings" aria-expanded="false"
			aria-controls="ui-basic"> <span class="menu-title">Settings</span> <i
				class="menu-arrow"></i> <i class="mdi mdi-settings menu-icon"></i>
		</a>
			<div class="collapse" id="Settings" style="">
				<ul class="nav flex-column sub-menu">
					<li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/log/index'); ?>">View System Log</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php echo site_url('admin/download/index'); ?>">Download Database</a></li>
				</ul>
			</div></li>
        <?php
		 }
		?> 
	</ul>
</nav>