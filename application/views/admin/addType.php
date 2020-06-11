<?php $title="Types";
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
											<h5>User Type</h5>
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
				<div class="card">
					<div class="card-block">
								<form id="main" method="post" action="<?php echo site_url("admin/HomeC/insertType")?>" enctype="multipart/form-data">
									
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Type</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="types" name="txtType" placeholder="Enter type">
											<span class="messages"></span>
										</div>
									</div>

									</div>
									<div class="form-group row">
										<label class="col-sm-2"></label>
										<div class="col-sm-10">
											<button type="submit" name="btnAdd" class="btn btn-primary m-b-0" value="Submit">Add Type</button>
										</div>
									</div>
								</form>
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
