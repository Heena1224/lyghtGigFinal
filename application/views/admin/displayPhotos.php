<?php 
	$title="Photos";
	$desc="";
	$link="<a href='".site_url("admin/HomeC/showPhotos")."'>$title</a>";
	if(isset($pic))
	{
		//pic array object che
		//print_r($pic);
	}
	else
	{
		echo "Null";
	}
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
											<h5><?php echo $title?></h5>
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
											<li class="breadcrumb-item"><a href="#!"><?= $link ?></a> </li>
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
					
					<div class="card-block table-border-style" >
						<br><br>
						<?php 
							$cnt=0;
						?>
						<div class="row" style="margin-bottom: 20px;margin-top:10px;height: 100%;">
							<?php 

								foreach($pic as $p)
								{
									
									if($cnt==3)
									{
								?>
									</div>

									<div class="row" style="margin-bottom:20px;margin-top:10px;height: 100%;">

							<?php
								}
							?>
							
								<div class="col-sm-4">
									<center>
									<a href="<?= site_url("admin/HomeC/showPhotoDetails").$p->photo_id?>?>" class="image" data-photo="<?= $p->photo_path;?>" data-un="<?= $p->username?>" data-cap="<?= $p->photo_caption; ?>" data-dt="<?= $p->photo_date;?>" data-uid="<?= $p->user_id;?>" data-pt="<?= $p->photo_type;?>" data-alb_id="<?= $p->album_id;?>" data-alb="<?= $p->album_title;?>" data-toggle="modal" data-target="#myModal">
										<img style="height:300px;width:85%;" src="<?php echo base_url().'resources/user/uploadPhotos/'?><?php echo $p->photo_path?>" >
									</a>
									</center>
								</div>
								
							<?php 
								$cnt++;
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

<div id="styleSelector">
</div>

</div>
</div>
</div>
</div>



<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-lg">
     
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        	<center><h3><b>Photograph Details</b></h3></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="background-color:white;">
        		<div class="row">   
        			<div class="col-sm-6">
        				<img id="picture" style="height:350px;width:90%;" src="" >
        				<div class="card-footer">
        					<center><b><p id="cap"></p></b></center>
        				</div>
        			</div>
        			<div class="col-sm-4">
        				<h5><i class="fa fa-heart"></i> &nbsp; <span id="likeCount"></span>
        					 <i class="fa fa-comments"></i>
        				</h5>
        				<h2><span></span></h2>
        				<h4>By:<span id="un"></span></h4>
        				<br>
        				
        					<label>Date:</label>&nbsp;<span id="dt"></span><br>
        					<label>User ID:</label>&nbsp;<span id="uid"></span><br>
        					<label>Photo Type:</label>&nbsp;<span id="pt"></span><br>
        					<label>Album:</label>&nbsp;<span id="alb_id"></span>&nbsp;<span id="alb"></span>
        				
        			</div>
        		</div>
        </div>
        
      </div> 
    </div>
</div> 


	<?php include_once("bottomscripts.php")?>
	<script type="text/javascript">
		$(document).on("click", ".image", function () {
     var imagename = $(this).data('photo');
     $(".modal-body #picture").attr("src","<?= base_url()?>resources/user/uploadPhotos/"+imagename);
     $(".modal-body #cap").text($(this).data("cap"));
     $(".modal-body #un").text($(this).data("un"));
     $(".modal-body #dt").text($(this).data("dt"));
     $(".modal-body #uid").text($(this).data('uid'));
     $(".modal-body #pt").text($(this).data('pt'));
     $(".modal-body #alb_id").text($(this).data('alb_id'));
     $(".modal-body #alb").text($(this).data('alb'));
     
	});

	</script>
</body>

</html>
