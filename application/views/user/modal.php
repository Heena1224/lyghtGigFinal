
    <div id="ProfileModal" class="modal fade" id="small-M">
      	<div class="modal-dialog modal-sm" style="width:30%;height:25%;">
       		<div class="modal-content">
        		<div class="modal-body">
		
         			<div class="row">
		 
          				<div class="col-sm-12 modal-meta" >
          					<center>
           					<form id="main" method="post" action="<?php echo site_url("user/HomeC/changeProfilePic")?>" enctype="multipart/form-data">
									<img src="<?=base_url()?>resources/user/uploadPhotos/profile/<?=$userData->user_profile_pic?>" class="col-sm-12" style="width:90%;height:90%;">
									<br>
									<!-- <input type="file" name="userProfile">
									<br>
									<button type="submit" name="btnChangeProfile" class="kafe-btn kafe-btn-mint btn-block" value="Submit">Change Picture</button>

										 -->
										
									
								</form>
							</center>
          				</div><!--/ col-md-4 -->
		  
         			</div><!--/ row -->
        		</div><!--/ modal-body -->
		
       		</div><!--/ modal-content -->
      	</div><!--/ modal-dialog -->
    </div><!--/ modal -->	 

	<?php
		if($userData->user_id==$this->session->userData("user_id"))
		{
			?>
				    <div id="CoverModal" class="modal fade" id="small-M">
						<div class="modal-dialog modal-sm" style="width:50%;height:30%;">
							<div class="modal-content">
								<div class="modal-body">
						
									<div class="row">
						
										<div class="col-md-8 modal-meta">
											<center>
											<form id="main" method="post" action="<?php echo site_url("user/HomeC/changeCoverPic")?>" enctype="multipart/form-data">
													<img src="<?=base_url()?>resources/user/uploadPhotos/cover/<?=$userData->user_cover_pic?>" class="col-sm-12">
													<br>
													<input type="file" name="userCover">
													<br>
													<button type="submit" name="btnChangeCover" class="kafe-btn kafe-btn-mint btn-block" value="Submit">Change Picture</button>

														
														
													
												</form>
											</center>
										</div><!--/ col-md-4 -->
						
									</div><!--/ row -->
								</div><!--/ modal-body -->
						
							</div><!--/ modal-content -->
						</div><!--/ modal-dialog -->
					</div><!--/ modal -->	
			<?php
		}
	?>

    <div id="myModal" class="modal fade">
      	<div class="modal-dialog">
       		<div class="modal-content">
        		<div class="modal-body">
         			<div class="row">
          				<div class="col-md-8 modal-image">
           					<img class="img-responsive" src="" id="picture"/><br>
           					<center><a style="color:black;" id="linkLike">Like</a></center>	
           					<center><strong><span id="cap"></span></strong>&nbsp; &nbsp;
								<?php
									if($userData->user_id==$this->session->userdata("user_id"))
									{
										?>
										<a  id="editCap" style="color: gray;" class='modal-edit' href='#CaptionModal' data-toggle="modal"><i class='fa fa-edit'></i></a>
										<?php
									}
								?>   
							</center>
           					
          				</div><!--/ col-md-8 -->
          				<div class="col-md-4 modal-meta">
           					<div class="modal-meta-top">
            					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			 						<span aria-hidden="true">×</span><span class="sr-only">Close</span>
								</button><!--/ button -->
            					<div class="img-poster clearfix">
	             					<a href="#"><img class="img-responsive img-circle" src="<?php echo base_url(); ?>resources/user/uploadPhotos/profile/<?=$userData->user_profile_pic?>" alt="Image"/></a>
	             					<strong><a href="<?=site_url('user/HomeC/loadProfile/')?><?=$userData->username?>"><?= $userData->username?></a></strong>
	             					<span id="dt"></span><br/>
			     					<a href="#" class="kafe kafe-btn-mint-small"><i class="fa fa-check-square"></i> Following</a>
	            				</div><!--/ img-poster -->
			  
	            				<ul class="img-comment-list" id="commentBody">

	            				</ul><!--/ comment-list -->
			  
            					<div class="modal-meta-bottom">
			 						<ul>
			  							<li>
			  								<a class="modal-like" href="#"><i class="fa fa-heart"></i></a><span class="modal-one" id="likeCount"></span> | 
				      						<a class="modal-comment" href="#"><i class="fa fa-comments"></i></a><span id="cmtCount"></span> 
				      					</li>
				  						<li>
				   							<span class="thumb-xs">
												<img class="img-responsive img-circle" src="<?php echo base_url(); ?>resources/user/uploadPhotos/profile/<?=$this->session->userdata('user_profile_pic')?>">
				   							</span>
			   								<div class="comment-body">
			   									
			   										<input id="txtcmnt" class="form-control input-sm" type="text" placeholder="Write your comment...">
			   										<br>
			   										<button id="comm" name="btnComment" value="Comment" class="kafe kafe-btn-mint-small" style="border-radius: 6px; width:50%;height: 10%; font-size: 14px;">Comment</button>
			   									

			   								</div><!--/ comment-body -->	
              							</li>				
             						</ul>				
            					</div><!--/ modal-meta-bottom -->
           					</div><!--/ modal-meta-top -->
          				</div><!--/ col-md-4 -->
         			</div><!--/ row -->
        		</div><!--/ modal-body -->
       		</div><!--/ modal-content -->
     	</div><!--/ modal-dialog -->
    </div><!--/ modal -->	 
	 



	<?php
		if($userData->user_id==$this->session->userData("user_id"))
		{
			?>
			<div id="CaptionModal" class="modal fade">
				<div class="modal-dialog" style="width:35%;">
					<div class="modal-content">
						<div class="modal-body">
							<div class="card">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									<span aria-hidden="true">×</span><span class="sr-only">Close</span>
								</button>
								<div class="card-block">

									<div class="modal-meta-top">
										<center><h2>Change Caption</h2></center>
									</div>
											
												<div class="form-group row" style="margin: 5px 20px 5px 20px;">
													<textarea rows="5" cols="20" class="form-control" id="txtNewCap" name="txtCaption" placeholder="Enter Caption"></textarea>
													

													<span class="messages"></span><br><center>
													<button type="submit" id="btnEdit" class="kafe kafe-btn-mint-small" value="Submit" style="border-radius: 6px; width:30%;height: 10%; font-size: 14px;">Edit</button>
													</center>
												</div>


										</div>
							</div>
						</div><!--/ modal-body -->
					</div><!--/ modal-content -->
				</div><!--/ modal-dialog -->
			</div><!--/ modal -->	
			<?php
		}
	?>

    <div id="CommentModal" class="modal fade">
      	<div class="modal-dialog" style="width:35%;">
       		<div class="modal-content">
        		<div class="modal-body">
         			<div class="card">
						<div class="card-block">
							<div class="modal-meta-top">
				 				<center><h2>Edit Comment</h2></center>
	            			</div>
									
							<div class="form-group row" style="margin: 5px 20px 5px 20px;">
								<textarea rows="5" cols="20" class="form-control" id="txtNewComment" name="txtComment" placeholder="Edit your Comment"></textarea>
								

								<span class="messages"></span><br><center>
								<button type="submit" id="btnEditCmnt" class="kafe kafe-btn-mint-small" value="Submit" style="border-radius: 6px; width:30%;height: 10%; font-size: 14px;">Edit</button>
								</center>
							</div>
						</div>
					</div>
        		</div><!--/ modal-body -->
       		</div><!--/ modal-content -->
     	</div><!--/ modal-dialog -->
    </div><!--/ modal -->	 
  

    <div id="reportModal" class="modal fade">
      	<div class="modal-dialog" style="width:40%;">
      		
       		<div class="modal-content">
       			<div class="modal-meta-top">
      				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			 		<span aria-hidden="true" style="padding-right: 10px;">×</span><span class="sr-only">Close</span>
					</button>
				
					<h2 style="color:gray;font-family:'Abhaya Libre';padding-left: 10px; ">Please select your report issue here</h2><hr>
	            
      			</div>
        		<div class="modal-body">
         			<div class="card">
         				
						<div class="card-block">
						<form method="post" enctype="multipart/form-data" action="<?php echo site_url("user/HomeC/reportPhoto")?>">
							<?php
								if($reportData!=null)

								{
									foreach ($reportData as $r) {
									?>
										<label style="color:gray;font-size: 20px;font-family:'Abhaya Libre';">
											<input type="radio" name="radioReasons" value="<?= $r->reason_id;?>"><?= $r->reason;?>
										</label><br>
									<?php

									}
								}
							?>
							<input type="text" name="photo_id" id="hfphoto_id" style="display: none;" value="0">
							<input type="text" name="reportee_id" id="hfreportee_id" style="display: none;" value="0">
							<span class="messages"></span><br><center>
							<button type="submit" id="btnReport" class="kafe kafe-btn-mint-small" value="Submit" style="border-radius: 6px; width:30%;height: 10%; font-size: 14px;border:none;">Report</button>
							</center>
						</form>
						</div>
					</div>
        		</div><!--/ modal-body -->
       		</div><!--/ modal-content -->
     	</div><!--/ modal-dialog -->
    </div><!--/ modal -->	

	<div id="descriptionModal" class="modal fade">
      	<div class="modal-dialog" style="width:35%;">
       		<div class="modal-content">
        		<div class="modal-body">
         			<div class="card">
         				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			 				<span aria-hidden="true">×</span><span class="sr-only">Close</span>
						</button>
						<div class="card-block">

							<div class="modal-meta-top">
				 				<center><h2>Change Description</h2></center>
	            			</div>
									
										<div class="form-group row" style="margin: 5px 20px 5px 20px;">
											<textarea rows="5" cols="20" class="form-control" id="txtNewDesc" name="txtDescription" placeholder="Enter Description"></textarea>
											<span class="messages"></span><br><center>
											<button type="submit" id="btnEditDesc" class="kafe kafe-btn-mint-small" value="Submit" style="border-radius: 6px; width:30%;height: 15%; font-size: 14px;">Edit</button>
											</center>
										</div>


								</div>
					</div>
        		</div><!--/ modal-body -->
       		</div><!--/ modal-content -->
     	</div><!--/ modal-dialog -->
    </div><!--/ modal -->

	<div id="albumTitleModal" class="modal fade">
      	<div class="modal-dialog" style="width:35%;">
       		<div class="modal-content">
        		<div class="modal-body">
         			<div class="card">
         				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			 				<span aria-hidden="true">×</span><span class="sr-only">Close</span>
						</button>
						<div class="card-block">

							<div class="modal-meta-top">
				 				<center><h2>Change Album Title</h2></center>
	            			</div>
									
										<div class="form-group row" style="margin: 5px 20px 5px 20px;">
											<textarea rows="5" cols="20" class="form-control" id="txtNewAlbumTitle" name="txtTitle" placeholder="Enter Album Title"></textarea>
											<span class="messages"></span><br><center>
											<button type="submit" id="btnEditTitle" class="kafe kafe-btn-mint-small" value="Submit" style="border-radius: 6px; width:30%;height: 15%; font-size: 14px;">Edit</button>
											</center>
										</div>


								</div>
					</div>
        		</div><!--/ modal-body -->
       		</div><!--/ modal-content -->
     	</div><!--/ modal-dialog -->
    </div><!--/ modal -->
