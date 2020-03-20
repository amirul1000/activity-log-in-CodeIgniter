<nav
	class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
	<div
		class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
		<a class="navbar-brand brand-logo" href="<?php echo site_url('homecontroller'); ?>"><img
			src="<?php echo base_url(); ?>public/waveney_taxis_dairy/assets/images/logo.svg"
			alt="logo" /></a> <a class="navbar-brand brand-logo-mini"
			href="index.html"><img
			src="<?php echo base_url(); ?>public/waveney_taxis_dairy/assets/images/logo-mini.png"
			alt="logo" /></a>
	</div>
	<div class="navbar-menu-wrapper d-flex align-items-stretch">
		<button class="navbar-toggler navbar-toggler align-self-center"
			type="button" data-toggle="minimize">
			<span class="mdi mdi-menu"></span>
		</button>
		<div class="search-field d-none d-md-block">
			<form class="d-flex align-items-center h-100" action="#">
				<div class="input-group">
					<div class="input-group-prepend bg-transparent">
						<i class="input-group-text border-0 mdi mdi-magnify"></i>
					</div>
					<input type="text" class="form-control bg-transparent border-0"
						placeholder="Search, bookings or customers...">
				</div>
			</form>
		</div>
		<ul class="navbar-nav navbar-nav-right">

			<li class="nav-item nav-logout d-lg-block"><a class="nav-link"
				href="#"> <i class="mdi mdi-clock-fast"></i> <span
					class="d-none d-lg-block">Today's time $Time </span>
			</a></li>

			<li class="nav-item nav-logout d-lg-block"><a class="nav-link"
				href="#"> <i class="mdi mdi-calendar-text"></i> <span
					class="d-none d-lg-block">Today's date $Date</span>
			</a></li>

			<li class="nav-item nav-profile dropdown"><a
				class="nav-link dropdown-toggle" id="profileDropdown" href="#"
				data-toggle="dropdown" aria-expanded="false">
					<div class="nav-profile-img">
						<!--<img
							src="<?php echo base_url(); ?>public/waveney_taxis_dairy/assets/images/faces/face1.jpg"
							alt="image"> <span class="availability-status online"></span>-->
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
					<div class="nav-profile-text">
						<p class="mb-1 text-black"><?php echo $this->session->userdata['first_name']?> <?php echo $this->session->userdata['last_name']?></p>
					</div>
			</a>
				<div class="dropdown-menu navbar-dropdown"
					aria-labelledby="profileDropdown">
					 <?php
					  if($this->session->userdata['user_type']=='admin'){
				     ?>  
                    <a class="dropdown-item" href="<?php echo site_url('admin/log/index'); ?>"> <i
						class="mdi mdi-cached mr-2 text-success"></i> Activity Log
					</a>
                    <div class="dropdown-divider"></div>
                    <?php
					 }
					?> 
					<a class="dropdown-item" href="<?php echo site_url('admin/profile/index'); ?>"> <i
						class="mdi mdi-face-profile mr-2 text-primary"></i> Profile
					</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="<?php echo site_url('admin/login/do_logout'); ?>"> <i
						class="mdi mdi-logout mr-2 text-primary"></i> Signout
					</a>
				</div></li>



		</ul>
		<button
			class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
			type="button" data-toggle="offcanvas">
			<span class="mdi mdi-menu"></span>
		</button>
	</div>
</nav>