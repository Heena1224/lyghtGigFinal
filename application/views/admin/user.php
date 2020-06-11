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
											<h5>User Details</h5>
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
						<div class="card">
							<div class="card-header">
								<h5>User Data</h5>							
							</div>
							<div class="card-block">
								<div class="dt-responsive table-responsive">
									<div id="order-table_wrapper" class="dataTables_wrapper dt-bootstrap4">
										
										<div class="row">
											<div class="col-xs-12 col-sm-12">
												<table id="order-table" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="order-table_info">
													<thead>
 														<tr role="row">
 															<th class="sorting" tabindex="0" aria-controls="order-table" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 154px;">ID
 															</th>
 															<th class="sorting_desc" tabindex="0" aria-controls="order-table" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" aria-sort="descending" style="width: 235px;">Username
 															</th>
 															<th class="sorting" tabindex="0" aria-controls="order-table" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 110px;">Email
 															</th>
 															<th class="sorting" tabindex="0" aria-controls="order-table" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 45px;">Status
 															</th>
 															<th class="sorting" tabindex="0" aria-controls="order-table" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 103px;">Profile Pic
 															</th>
 															<th class="sorting" tabindex="0" aria-controls="order-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 71px;">Verification
 															</th>
 															<th class="sorting" tabindex="0" aria-controls="order-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 71px;">Show More
 															</th>
 														</tr>
													</thead>
												<tbody>
												<?php
						                			foreach($user as $u)
									                {
									              ?> 
													<tr role="row" class="odd">
														<td><?php echo $u->user_id;?></td>
														<td class="sorting_1"><?php echo $u->username;?></td>
														<td><?php echo $u->user_email;?></td>
														<td class="">
															<?php
						                		if($u->user_status=="Enabled")
						                		{
						                			?>
						                			<center><label class="label label-inverse-success">Enabled</label></center><br>
						                			<a href="<?php echo site_url('admin/HomeC/changeUserStatus/')?><?=$u->user_id?>/Disabled">
						                			<button class="btn btn-warning waves-effect waves-light" value="Disabled" name="btnDisabled">Disabled</button>
						                			</a>
						                			<a href="<?php echo site_url('admin/HomeC/changeUserStatus/')?><?=$u->user_id?>/Blocked">
						                			<button class="btn btn-danger waves-effect waves-light" value="Disabled" name="btnDisabled">Blocked</button>
						                			</a>
						                			<?php
						                		}
						                		if($u->user_status=="Disabled")
						                		{
						                			?>
						                			<center><label class="label label-inverse-warning">Disabled</label></center><br>
						                			<a href="<?php echo site_url('admin/HomeC/changeUserStatus/')?><?=$u->user_id?>/Enabled">
						                			<button class="btn btn-success waves-effect waves-light" value="Disabled" name="btnDisabled">Enabled</button>
						                			</a>
						                			<a href="<?php echo site_url('admin/HomeC/changeUserStatus/')?><?=$u->user_id?>/Blocked">
						                			<button class="btn btn-danger waves-effect waves-light" value="Disabled" name="btnDisabled">Blocked</button>
						                			</a>
						                			<?php
						                		}
						                		if($u->user_status=="Blocked")
						                		{
						                			?>
						                				<center><label class="label label-inverse-danger">Blocked</label></center><br>
						                				<a href="<?php echo site_url('admin/HomeC/changeUserStatus/')?><?=$u->user_id?>/Disabled">
						                			<button class="btn btn-warning waves-effect waves-light" value="Disabled" name="btnDisabled">Disabled</button>
						                			</a>
						                			<a href="<?php echo site_url('admin/HomeC/changeUserStatus/')?><?=$u->user_id?>/Enabled">
						                			<button class="btn btn-success waves-effect waves-light" value="Disabled" name="btnDisabled">Enabled</button>
						                			</a>
						                			<?php
						                		}

						                	?>

														</td>
														<td><img src="<?=base_url().'resources/user/uploadPhotos/profile/'?><?=$u->user_profile_pic?>" height=100 width=100></td>
														<td><?php
								                		if($u->is_verified==1)
								                		{
								                			?>
								                			<label class="label label-success">Verified</label>
								                			<?php
								                		}
								                		else{
								                			?>
								                				<label class="label label-default">Not Verified</label><br><br>
								                				<a href="<?php echo site_url('admin/HomeC/verifyUser/')?><?=$u->user_id	?>">
								                				<button class="btn waves-effect waves-light btn-success btn-square" value="Verified" style="height: 25px;padding: 1px;width:80px;border-radius: 3px;">Verify</button>
								                				</a>
								                			<?php
								                		}
								                	?>
								                		</td>
								                		<td>
								                			<a class="mytooltip tooltip-effect-8" data-placement="bottom" href="<?= site_url("admin/HomeC/viewPhoto/").$u->user_id?>">View Photos<span class="tooltip-content2"><i class="fa fa-camera"></i></span></a><br>

								                			<a class="mytooltip tooltip-effect-8" href="<?= site_url("admin/HomeC/showMoreDetails/").$u->user_id?>">More Details<span class="tooltip-content2"><i class="fa fa-user"></i></span></a>
								                			
								                		
								                		</td>
													</tr>
													<?php
												}
												?>
												</tbody>

											</table>
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


    <div id="userDataModal" class="modal fade">
      	<div class="modal-dialog">
       		<div class="modal-content">
        		<div class="modal-body">
         			<h2>User Details</h2>
         			<hr>
         			<div class="row">
         				<div class="col-xs-4">
         					<img id="picture" src="" style="height:60%;width:90%;">
         				</div>
         				<div class="col-lg-8">
         					<label>First Name:</label><span id="Fname"></span>
         				</div>
         			</div>
        		</div><!--/ modal-body -->
       		</div><!--/ modal-content -->
     	</div><!--/ modal-dialog -->
    </div><!--/ modal -->	

	<?php include_once("bottomscripts.php")?>
	<script type="text/javascript">
		
		$(document).on("click",".moreData", function () 
		{
			var imagename = $(this).data('photo');
     		$(".modal-body #picture").attr("src","<?= base_url()?>resources/user/uploadPhotos/profile/"+imagename);
		   $(".modal-body #Fname").text($(this).data("Fname"));
		   
		});
	</script>
</body>

</html>
