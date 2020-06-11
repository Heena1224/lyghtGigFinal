
<?php $title="lyghtGig";
?>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<title><?php echo $title;?></title>
		<?php include_once("topscripts.php")?>

	</head>
<body>

<div class="loader-bg">
	<div class="loader-bar"></div>
</div>

<div id="pcoded" class="pcoded">
	<div class="pcoded-overlay-box"></div>
		<div class="pcoded-container navbar-wrapper">
			<?php include_once("header.php")?>
		</div>

		<div class="pcoded-main-container">
			<div class="pcoded-wrapper">
				<?php include_once("nav.php")?>
				<div class="pcoded-content">
					<div class="page-header card">
						<div class="row align-items-end">
							<div class="col-lg-8">
								<div class="page-header-title">
									<i class="feather icon-home bg-c-blue"></i>
									<div class="d-inline">
										<h5>Dashboard</h5>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="page-header-breadcrumb">
									<ul class=" breadcrumb breadcrumb-title">
										<li class="breadcrumb-item">
										<a href="index.html"><i class="feather icon-home"></i></a>
										</li>
										<li class="breadcrumb-item"><a href="#!">Dashboard</a> </li>
									</ul>
								</div>
							</div>
						</div>
					</div>



					<div class="pcoded-inner-content">
						<div class="main-body">
							<div class="page-wrapper">
								<div class="page-body">	
									<div class="row">
										<div class="col-xl-3 col-md-6">
											<div class="card prod-p-card card-red">
												<div class="card-body">
													<div class="row align-items-center m-b-30">
														<div class="col">
															<h6 class="m-b-5 text-white">Total Users</h6>
															<h3 class="m-b-0 f-w-700 text-white"></h3>
														</div>
													<div class="col-auto">
														<i class="fas fa-users text-c-red f-18"></i>
													</div>
												</div>
												<p class="m-b-0 text-white"><span class="label label-danger m-r-10">+11%</span>From Previous Month</p>
											</div>
										</div>
									</div>

									<div class="col-xl-3 col-md-6">
										<div class="card prod-p-card card-green">
											<div class="card-body">
												<div class="row align-items-center m-b-30">
													<div class="col">
														<h6 class="m-b-5 text-white">Total Albums</h6>
														<h3 class="m-b-0 f-w-700 text-white">0</h3>
													</div>
													<div class="col-auto">
														<i class="fas fa-folder text-c-green f-18"></i>
													</div>
												</div>
												<p class="m-b-0 text-white"><span class="label label-success m-r-10">+52%</span>From Previous Month</p>
											</div>
										</div>
									</div>
									<div class="col-xl-3 col-md-6">
										<div class="card prod-p-card card-blue">
											<div class="card-body">
												<div class="row align-items-center m-b-30">
													<div class="col">
									 					<h6 class="m-b-5 text-white">Total Photos</h6>
														<h3 class="m-b-0 f-w-700 text-white">15,830</h3>
													</div>
												<div class="col-auto">
													<i class="fas fa-camera-retro text-c-blue f-18"></i>
												</div>
											</div>
											<p class="m-b-0 text-white"><span class="label label-primary m-r-10">+12%</span>From Previous Month</p>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-6">
									
									<div class="card prod-p-card card-yellow">
										<div class="card-body">
											<div class="row align-items-center m-b-30">
												<div class="col">
													<h6 class="m-b-5 text-white">Total Contests</h6>
													<h3 class="m-b-0 f-w-700 text-white"></h3>
												</div>
												<div class="col-auto">
													<i class="fas fa-film text-c-yellow f-18"></i>
												</div>
											</div>
											<p class="m-b-0 text-white"><span class="label label-warning m-r-10">+52%</span>From Previous Month</p>
										</div>
									</div>
								</div>


							
							

							</div>
							<div  class="row">
								<div class="col-md-12 col-lg-6">
									<div class="card new-cust-card">
										<div class="card-header">
											<h5>New Users!</h5>
												<div class="card-header-right">
													<ul class="list-unstyled card-option">
														<li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i>
														</li>
														<li><i class="feather icon-maximize full-card"></i>
														</li>
														<li><i class="feather icon-minus minimize-card"></i></li>
														<li><i class="feather icon-refresh-cw reload-card"></i></li>
														<li><i class="feather icon-trash close-card"></i></li>
														<li><i class="feather icon-chevron-left open-card-option"></i></li>
													</ul>
												</div>
										</div>
										<div class="card-block">
											<?php
												if($users!=null)
												{
													foreach ($users as $key) 
													{
														?>
														<div class="align-middle m-b-35">
												<img src="<?=base_url().'resources/user/uploadPhotos/profile/'?><?=$key->user_profile_pic?>" alt="user image" class="img-radius img-40 align-top m-r-15">
												<div class="d-inline-block">
													<a href="<?= site_url("admin/HomeC/showUser/").$key->user_id?>"><h6><?=$key->username;?></h6></a>
													<p class="text-muted m-b-0"><?php echo $key->user_status; ?></p>
													<span class="status active"></span>
												</div>
											</div>
														<?php
													}
													
												}
												else{
													?>
														<label>No data Found</label>
													<?php
												}
											?>
											
										</div>
										
									</div>
								</div>
								<div class="col-md-12 col-lg-6">
									<div class="card new-cust-card">
										<div class="card-header">
											<h5>Idle Reports!</h5>
												<div class="card-header-right">
													<ul class="list-unstyled card-option">
														<li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i>
														</li>
														<li><i class="feather icon-maximize full-card"></i>
														</li>
														<li><i class="feather icon-minus minimize-card"></i></li>
														<li><i class="feather icon-refresh-cw reload-card"></i></li>
														<li><i class="feather icon-trash close-card"></i></li>
														<li><i class="feather icon-chevron-left open-card-option"></i></li>
													</ul>
												</div>
										</div>
										<div class="card-block">
											<?php
												if($users!=null)
												{
													foreach ($users as $key) 
													{
														?>
														<div class="align-middle m-b-35">
												<img src="<?=base_url().'resources/user/uploadPhotos/profile/'?><?=$key->user_profile_pic?>" alt="user image" class="img-radius img-40 align-top m-r-15">
												<div class="d-inline-block">
													<a href="<?= site_url("admin/HomeC/showUser/").$key->user_id?>"><h6><?=$key->username;?></h6></a>
													<p class="text-muted m-b-0"><?php echo $key->user_status; ?></p>
													<span class="status active"></span>
												</div>
											</div>
														<?php
													}
													
												}
												else{
													?>
														<label>No data Found</label>
													<?php
												}
											?>
											
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<div id="styleSelector">
</div>

</div>
</div>
</div>
</div>

	<?php include_once("bottomscripts.php")?>
</body>

</html>
