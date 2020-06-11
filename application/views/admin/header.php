
<nav class="navbar header-navbar pcoded-header">
	<div class="navbar-wrapper">
		<div class="navbar-logo">
			<a href="index.html">
				<img class="img-fluid" src="<?php echo base_url()?>resources/admin/files/assets/images/logo.png" alt="Theme-Logo" />
			</a>
			<a class="mobile-menu" id="mobile-collapse" href="#!">
				<i class="feather icon-menu icon-toggle-right"></i>
			</a>
			<a class="mobile-options waves-effect waves-light">
				<i class="feather icon-more-horizontal"></i>
			</a>
		</div>
		<div class="navbar-container container-fluid">
			<ul class="nav-right">

				<li class="user-profile header-notification">
					<div class="dropdown-primary dropdown">
						<div class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?php echo base_url(); ?>resources/shared/images/<?=$this->session->userdata('admin_profile_pic')?>" class="img-radius" alt="User-Profile-Image">
							<span><?php echo $this->session->userdata("admin_username");?></span>
							<i class="feather icon-chevron-down"></i>
						</div>
						<ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
							<li>
								<a href="<?=site_url('admin/HomeC/changeProfilePic')?>">
								<i class="feather icon-user"></i>Change Profile
								</a>
							</li>
							<li>
								<a href="<?=site_url('admin/HomeC/changePassword')?>">
								<i class="feather icon-user"></i>Change Password
								</a>
							</li>
							<li>
								<a href="<?php echo site_url("admin/HomeC/logout")?>">
								<i class="feather icon-log-out"></i> Logout
								</a>
							</li>
						</ul>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>
