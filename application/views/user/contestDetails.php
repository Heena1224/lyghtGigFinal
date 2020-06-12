<?php $title="Contest Details";
?>
<html lang="en">

<head>
		<title><?= $title?></title>
	    <?php include_once("topscripts.php")?>
		<style type="text/css">
			.explorebox:hover{
				opacity: 0.4;
				border:3px black solid;
			}
		</style>
  </head>

<body>
	<?php include_once("header.php")?>
	<?php include_once ("nav.php");?>
	 <!-- ==============================================
	 News Feed Section
	 =============================================== --> 
	<section class="profile">
	  	<div class="container-fluid">
	   		<div class="row">
	   			
	   				<div class="col-lg-12">
								
						<div class="profilebox-large" style="background: linear-gradient( rgba(34,34,34,0.6), rgba(34,34,34,0.6)), url('<?= base_url().'resources/shared/images/competition_cover/'?><?= $contestDetails->competition_cover_pic;?>') no-repeat;
							background-size: cover;
							background-position: center center;
							-webkit-background-size: cover;
							-moz-background-size: cover;
							-o-background-size: cover;">
							
						</div>
								
					</div>
					
	   			
				
		
       		</div><!--/ row-->	
	  	</div><!--/ container -->
	</section><!--/ profile -->
  
	
	
	 <!-- ==============================================
	 Home Menu Section
	 =============================================== -->	
	<section class="details">
	  	<div class="container">
		   	<div class="row">
		    	<div class="col-lg-12">
			 
	          		<div class="details-box row">
			   			<div class="col-lg-12">
	           				<div class="content-box">
			   					<h1 style="font-family:'Abhaya Libre';color:#0fc19e;"><?=$contestDetails->competition_name?></h1>
	             				<p><h3 style="font-family:'Abhaya Libre';color:grey;"><?=$contestDetails->description?></h3>
	             					<h3 style="font-family:'Abhaya Libre';color:grey;">Held by:
	             						<?php
	             							if($contestDetails->orgData["org_type"]=="User")
	             							{
	             								?>
	             								<a href="<?= site_url('user/HomeC/loadProfile/'.$contestDetails->orgData["org_name"])?>"><label style="color:#0fc19e;"><?= $contestDetails->orgData["org_name"]?></label></a>
	             								<?php

	             							}
	             							else{
	             								?>
	             									<label><?= $contestDetails->orgData["org_name"]?></label>
	             								<?php
	             							}
	             						?>
	             						
	             					</h3>
	             					<h3 style="font-family:'Abhaya Libre';color:grey;"><i class="fa fa-clock"></i>&nbsp;Start Date:&nbsp;<b> <?=$contestDetails->start_date;?></b></h3>
	             					<h3 style="font-family:'Abhaya Libre';color:grey;"><i class="fa fa-clock"></i>&nbsp;End Date:&nbsp;<b> <?=$contestDetails->end_date;?></b></h3>
	             					
	             					<?php
	             						date_default_timezone_set("Asia/Kolkata");
										$cdt=date("Y-m-d h:i:s");
										$btnStatus="disabled";
										if($cdt<$contestDetails->start_date)
										{
											$btnStatus="";
										}

	             					?>

	             					<button class="kafe-btn kafe-btn-mint-small pull-right btn-sm" <?=$btnStatus?> id="btnParticipate" style="width: 100%;height: 7%;font-size:24px;font-family:'Abhaya Libre';">
	             						<?php
	             							if($btnStatus=="disabled")
	             							{
	             								echo "Registration Closed!";
	             							}
	             							else
	             							{
	             								echo "Participate";	
	             							}
	             					?>
	             						
	             					</button>
		             				<?php
		             					if($cdt>$contestDetails->start_date && $is_a_participant==1 && $cdt<$contestDetails->end_date &&$has_submission==0)
		             					{
		             						?><br><br><br>
		             						<a href="#participateModal" data-toggle="modal"><button class="kafe-btn kafe-btn-mint-small pull-right btn-sm" id="btnUploadPhoto" style="width: 100%;height: 7%;font-size:24px;font-family:'Abhaya Libre';"> Submit Your Photo</button></a>
		             						<?php
										 }
										 else if($has_submission==1){
											?><br><br><br>
											<a href="#!"><button class="kafe-btn kafe-btn-mint-small pull-right btn-sm" style="width: 100%;height: 7%;font-size:24px;font-family:'Abhaya Libre';"> You have already submitted your photo</button></a>
											<?php
										 }
		             				?>	             					
	             				</p>

	           				</div><!--/ media -->
			   			</div> 
			   			<div class="col-lg-3">
	           				<div class="follow-box">
	         
	           				</div><!--/ dropdown -->
			   			</div>
	          		</div><!--/ details-box -->
			  
				</div>
		   	</div>
	  	</div><!--/ container -->
	</section><!--/home-menu -->	

	<section class="home-menu">
      	<div class="container">
       		<div class="row">

        		<div class="menu-category">
         			<ul class="menu">
          				<li><i class="fa fa-users" style="color:#0fc19e;"></i>&nbsp;<span><?=$contestDetails->totalParticipants?></span>Photographers Registered</li>
          				<li><i class="fa fa-camera" style="color:#0fc19e;"></i>&nbsp;<span><?=count($submissionData)?></span>Photos Entered</li>
          				
         			</ul>
				</div>
		
	   		</div><!--/row -->
      	</div><!--/container -->
    </section>
	<section class="newsfeed">
	  	<div class="container">
		  <div class="row" id="loadingContainer">
		  <?php
						if($submissionData!=null)
						{
							foreach ($submissionData as $s) {
								?>
									<div class="col-lg-4">
										<!--/ cardbox-heading -->
										<div class="cardbox-item">
											
	
											 <a href="#myModal" class="image" data-toggle="modal">
												 <div class="explorebox" 
													   style="background: linear-gradient( rgba(34,34,34,0.2), rgba(34,34,34,0.2)), url('<?php echo base_url()?>resources/shared/images/<?php echo $s->photo_path?>') no-repeat;
														  background-size: cover;
														  background-position: center center;
														  -webkit-background-size: cover;
														  -moz-background-size: cover;
														  -o-background-size: cover;">
												 </div>
											 </a>
										  </div>
									</div>
								<?php
								
							}
						}
		  
		  ?>
		  </div>
		</div>
	</section>
			
	 <!-- ==============================================
	 News Feed Section
	 =============================================== --> 

	<section class="newsfeed">
	  	<div class="container">
	  		
	   		<div class="row" id="loadingContainer">
	   
	    	
	   		</div><!--/ row -->
	   
	  	</div><!--/ container -->
	</section><!--/ newsfeed -->
  
	 <!-- ==============================================
	 Modal Section
	 =============================================== -->

	 <div id="participateModal" class="modal fade">
		<div class="modal-dialog" style="width:35%;">
			<div class="modal-content">
				<div class="modal-body">
					<div class="card">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span aria-hidden="true">×</span><span class="sr-only">Close</span>
						</button>
						<div class="card-block">

							<div class="modal-meta-top"><center>
								<h2 id="compName" style="font-family:'Abhaya Libre';color:grey;">ENTER CONTEST</h2></center>
							</div>
												
							<div class="form-group row" style="margin: 5px 20px 5px 20px;">
								<form method="post" enctype="multipart/form-data" action="<?php echo site_url('user/PhotoC/submitPhoto/'.$contestDetails->competition_id)?>">
								
								<textarea rows="5" cols="20" class="form-control" id="txtCaption" name="txtCaption" placeholder="Enter Caption"></textarea>
								
								<input type="file" accept="image/*" name="photoContestPic" id="file" style="display: none;" >
								<p class="kafe-btn kafe-btn-mint-small pull-right btn-sm" style="width:100%"><label for="file" style="cursor: pointer;width:100%;">Select Image</label></p><br>		   
								

								<span class="messages"></span><br><center>
								<button type="submit" id="btnEdit" class="kafe kafe-btn-mint-small" value="Submit" style="border-radius: 6px; width:100%;height: 10%; font-size: 14px;font-family:'Abhaya Libre';">Submit</button>
								</form>
							</div>


						</div>
					</div>
				</div><!--/ modal-body -->
			</div><!--/ modal-content -->
		</div><!--/ modal-dialog -->
	</div><!--/ modal -->	

    <?php include_once("bottomscripts.php")?>
    <script type="text/javascript">
    	 //$(".modal-body #dt").text($(this).data("dt"));
    	 $(".modal-meta-top #compName").text($(this).data("compName"));

    	 $("#btnParticipate").click(function() {

    	 	$.ajax({type:'POST', url: "<?= site_url("user/PhotoC/addParticipant/")?>",data:{contest_id:"<?=$contestDetails->competition_id?>"},success: function(result){
    			if(result!="")
				alert(result+" Once the contest starts, you can submit your entry.!");
				
  		}});
    	 })
    </script>
  </body>

</html>
