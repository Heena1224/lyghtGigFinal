<?php 
	$title="Types";
	$desc="";
	$link="<a href='".site_url("admin/HomeC/showReport")."'>$title</a>";
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
					<div class="card-header">
						<h5>Types</h5>
						<span>use class <code>table-hover</code> inside table element</span>
						<div class="card-header-right"> <ul class="list-unstyled card-option"> <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li> <li><i class="feather icon-maximize full-card"></i></li> <li><i class="feather icon-minus minimize-card"></i></li> <li><i class="feather icon-refresh-cw reload-card"></i></li> <li><i class="feather icon-trash close-card"></i></li> <li><i class="feather icon-chevron-left open-card-option"></i></li> </ul> </div>
					</div>
					<div class="card-block table-border-style">
						<div class="table-responsive">
							<!-- <a href="<?php echo site_url('admin/HomeC/loadAddType')?>">
							<button class="btn waves-effect waves-light btn-primary" name="btnAdd"><i class="fa fa-plus-circle"></i>Add Type</button>
							</a> -->

								<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle"></i>Add Type</button>

							<br><br>
							<table class="table table-hover">
								<thead>
									<tr>
										<th>Type ID</th>
										<th>Type</th>
									</tr>
								</thead>
								<tbody>
									<?php
						                foreach($types as $u)
						                {
						              ?> 
						              <tr>
						                <td><?php echo $u->type_id;?></td>
						   				<td><?php echo $u->type_name;?></td>
						   				<td><a href="<?php echo site_url('admin/HomeC/removeType/'.$u->type_id)?>">
											<button class="btn waves-effect waves-light btn-danger" name="btnDelete"><i name="icon-trash" class="feather icon-trash close-card"></i></button>
											</a>
											<a href="<?php echo site_url('admin/HomeC/showUserType/'.$u->type_id)?>">
											<button class="btn waves-effect waves-light btn-primary" name="btnShow"><i class="fa fa-users" name="fa fa-users"></i></button>
											</a></td>
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

<div id="styleSelector">
</div>

</div>
</div>
</div>
</div>

		
	<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        	

        	<form id="main" method="post" action="<?php echo site_url("admin/HomeC/insertType")?>" enctype="multipart/form-data">
									
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Type</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="types" name="txtType" placeholder="Enter type">
						<span class="messages"></span>
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

	<?php include_once("bottomscripts.php")?>
</body>

</html>
