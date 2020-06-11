<?php 
	$title="Contest";
	$desc="";
	$link="<a href='".site_url("admin/ContestC/showContest")."'>$title</a>";
?>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<title><?php echo $title;?></title>
		<?php include_once("topscripts.php")?>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
											<span><? $desc?></span>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="page-header-breadcrumb">
										<ul class=" breadcrumb breadcrumb-title">
											<li class="breadcrumb-item">
											<a href="index.html"><i class="feather icon-home"></i></a>
											</li>
											<li class="breadcrumb-item"><a href="#!"><?= $link?></a> </li>
										</ul>
									</div>
								</div>
							</div>
						</div>


						<div class="card">
							<div class="card-header">
								<h5>Contest Details</h5>

							</div>
							<div class="card-block">
								<div class="dt-responsive table-responsive">
									<div id="order-table_wrapper" class="dataTables_wrapper dt-bootstrap4">
										
										<div class="row">
											<div class="col-xs-12 col-sm-12">
												<table id="order-table" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="order-table_info">
													<thead>
 														<tr role="row">
 															<th class="sorting" tabindex="0" aria-controls="order-table" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 154px;">Contest ID</th>
 															<th class="sorting" tabindex="0" aria-controls="order-table" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 154px;">Contest</th>
 															<th class="sorting" tabindex="0" aria-controls="order-table" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 154px;">Starting Date</th>
 															<th class="sorting" tabindex="0" aria-controls="order-table" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 154px;">End Date</th>
 															<th class="sorting" tabindex="0" aria-controls="order-table" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 154px;">Result Date</th>
 															

 															<th class="sorting" tabindex="0" aria-controls="order-table" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 154px;"></th>
 															

 														</tr>
													</thead>
												<tbody>
													<?php
														if($contestData!=null)
														{
															foreach ($contestData as $key){
													?>
													<tr role="row" class="odd">
														<td><?=$key->competition_id	?></td>
														<td class="sorting_1"><?=$key->competition_name?></td>
														<td class=""><?=$key->start_date?></td>
														<td><?=$key->end_date?></td>
														<td><?=$key->result_date?></td>
														
														
														<td><a class="mytooltip tooltip-effect-8" href="<?= site_url("admin/ContestC/showContestData/").$key->competition_id?>">More Details<span class="tooltip-content2" data-target="#userDataModal"><i class="fa fa-user"></i></span></a></td>
													</tr>
													<?php

															}
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
