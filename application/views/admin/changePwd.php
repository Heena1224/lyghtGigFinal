<?php 
	$title="Change Password";
	$desc="";
	$link="<a href='".site_url("admin/HomeC/changePassword")."'>$title</a>";
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
											<h5><?= $title?></h5>
											<span><?= $desc ?></span>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="page-header-breadcrumb">
										<ul class=" breadcrumb breadcrumb-title">
											<li class="breadcrumb-item">
											<a href="index.html"><i class="feather icon-home"></i></a>
											</li>
											<li class="breadcrumb-item"><?= $link ?></li>
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
					<div class="col-sm-12">

						<div class="card">
							<div class="card-header">
								<h5>Change Password</h5>
								<!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
							</div>
							<div class="card-block">
								<form id="main" method="post" action="<?php echo site_url("admin/HomeC/changePassword")?>" enctype="multipart/form-data">
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Current Passwrod</label>
										<div class="col-sm-10">
											<input type="password" class="form-control" id="password" name="txtCurrent" placeholder="Enter current password">
											<span class="messages"></span>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">New Password</label>
										<div class="col-sm-10">
											<input type="password" class="form-control" id="password" name="txtNew" placeholder="Enter new password">
											<span class="messages"></span>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Confirm Password</label>
										<div class="col-sm-10">
											<input type="password" class="form-control" id="repeat-password" name="txtConfirm" placeholder="Re-enter new password">
											<span class="messages"></span>
										</div>
									</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2"></label>
										<div class="col-sm-10">
											<button type="submit" name="btnChangePwd" class="btn btn-primary m-b-0" value="Submit">Change Password</button>
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
</div>
</div>

<div id="styleSelector">
</div>

</div>
</div>
</div>
</div>
	<script>
		 <?php
                if(isset($error) && !empty($error))
                {
                    ?>
                        let err="<?=$error?>";
                        alert(err);
                    <?php
                }
            ?>
	</script>

	<?php include_once("bottomscripts.php")?>
</body>

</html>
