<?php 
	$title="Change Profile Picture";
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
								<h5>Change Profile</h5>
								<!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
							</div>
							<div class="card-block">
								<form id="main" method="post" action="<?php echo site_url("admin/HomeC/changeProfilePic")?>" enctype="multipart/form-data">
									<div class="form-group row"><center>
										<div class="photoDiv col-sm-8">
											<img src="<?=base_url()?>resources/shared/images/<?=$this->session->admin_profile_pic?>" class="col-sm-12">
											<div class="col-sm-12">
												<input type="file" accept="image/*" name="adminProfile" id="file" style="display: none;">
												<p class="btn btn-primary m-b-0" style="width:100%"><label for="file" style="cursor: pointer;width:100%;">Select Image</label></p><br><br><br>
												<button type="submit" name="btnChangeProfile" class="btn btn-primary m-b-0" value="Submit" style="cursor: pointer;width:100%;">Change Picture</button>	
                                                
                                            </div>
                                        </center>
									</div>	
									<div class="form-group row">
										<label class="col-sm-12"></label>
										<div class="col-sm-12">
											
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
