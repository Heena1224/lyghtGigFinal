<?php $title="Profile";
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
						<?php
							if($userData->user_id==$this->session->userdata("user_id"))
							{
								?>
								<a href="#CoverModal" data-toggle="modal">
									<div class="profilebox-large" style="background: linear-gradient( rgba(34,34,34,0.6), rgba(34,34,34,0.6)), url('<?= base_url().'resources/user/uploadPhotos/cover/'?><?php echo $userData->user_cover_pic;?>') no-repeat;
										background-size: cover;
										background-position: center center;
										-webkit-background-size: cover;
										-moz-background-size: cover;
										-o-background-size: cover;">
										
									</div>
								</a>
								<?php
							}
							else{
								?>
									<div class="profilebox-large" style="background: linear-gradient( rgba(34,34,34,0.6), rgba(34,34,34,0.6)), url('<?= base_url().'resources/user/uploadPhotos/cover/'?><?php echo $userData->user_cover_pic;?>') no-repeat;
										background-size: cover;
										background-position: center center;
										-webkit-background-size: cover;
										-moz-background-size: cover;
										-o-background-size: cover;">
										
									</div>

								<?php								
							}
						?>
					</div>
					
	   			
				
		
       		</div><!--/ row-->	
	  	</div><!--/ container -->
	</section><!--/ profile -->
  
	 <!-- ==============================================
	 User Profile Section
	 =============================================== --> 
	<section class="user-profile">
	  	<div class="container-fluid">
	  	 	<div class="row">
	   
	    		<div class="col-lg-12">
		   			<div class="post-content">
		    			<div class="author-post text-center">
		     				<a href="#ProfileModal" data-toggle="modal"><img class="img-fluid img-circle" src="<?php echo base_url() ?>resources/user/uploadPhotos/profile/<?php echo $userData->user_profile_pic?>" alt="Image"></a>
		    			</div><!-- /author -->
		   			</div><!-- /.post-content -->		
				</div><!-- /col-sm-12 -->
		
       		</div><!--/ row-->	
	  	</div><!--/ container -->
	</section><!--/ profile -->
  	
	 <!-- ==============================================
	 User Profile Section
	 =============================================== --> 
	
	 <!-- ==============================================
	 Home Menu Section
	 =============================================== -->	
<section class="details">
	  <div class="container">
	   <div class="row">
	    <div class="col-lg-12">
		 
          <div class="details-box row">
		   <div class="col-lg-9">
           <div class="content-box">
		     <h4><?=$userData->user_fname." ".$userData->user_lname." ( @".$userData->username." )"?>
		     	<?php
		     		if($userData->is_verified==1)
		     		{
		     			?>
		     			<i class="fa fa-check"></i>
		     			<?php
		     		}	
		     	?>
		     </h4>
             <p style="font-size: 22px;font-style:normal; "><?=$userData->user_description?>
             	<?php
             		if($userData->typeData!=null)
             		{
             			foreach ($userData->typeData as $key) {
             				?>
             				<span class="hashtag" style="font-size: 20px;">#<?=$key->type_name?></span>
             				<?php
             			}
             		}
             	?>
             </p>

           </div><!--/ media -->
		   </div> 
		   <div class="col-lg-3">
           <div class="follow-box">
           	<?php
           		if($userData->user_id!=$this->session->userdata("user_id")){
           			?>
   					    <a href="<?=site_url('user/HomeC/follow/')?><?=$userData->user_id?>/<?=$userData->username?>/<?php if(isset($userData->isFollowed))echo $userData->isFollowed;else echo -1;?>" id="btnFollow" class="kafe-btn kafe-btn-mint" data-isfollowed="<?php if(isset($userData->isFollowed))echo $userData->isFollowed;else echo -1;?>">
							<?php
								if($userData->isFollowed==1)
								{
									?>
									<i class="fa fa-check"></i> Following
									<?php
								}
								else{
									?>
									<i class="fa fa-plus"></i> Follow
									<?php
								}
							?>   
						</a>
           			<?php
           		}
           	?>
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
          				<li class="current-menu-item"> <a href="">Albums <span><?=count($albumData)?></span></a></li>
				        <li class="current-menu-item"><a href="">Photos <span><?=$userData->totalPhotos?></span></a></li>
				        <li><a href="javascript:void(0)" id="linkFollowers">Followers <span><?=$userData->totalFollowers?></span></a></li>
				        <li><a href="javascript:void(0)" id="linkFollowing">Following <span><?=$userData->totalFollowing?></span></a></li>
         			</ul>
				</div>
		
	   		</div><!--/row -->
      	</div><!--/container -->
    </section>

	 <!-- ==============================================
	 News Feed Section
	 =============================================== --> 

	<section class="newsfeed">
	  	<div class="container">
	  		
	   		<div class="row" id="loadingContainer">
	   
	    		<?php
	    			if($userData->defaultAlbumPhotos!=null)
	    			{
	    				foreach ($userData->defaultAlbumPhotos as $p) {
	    					?>
	    						<div class="col-lg-4">
			    					<div class="cardbox-heading">
							           <!-- START dropdown-->
							           	<div class="dropdown pull-right">
							            	<button class="btn btn-secondary btn-flat btn-flat-icon" type="button" style="background-color: transparent;font-size: 20px;" data-toggle="dropdown" aria-expanded="false">
									     		<em class="fa fa-ellipsis-v"></em>
											</button>
							            	<div class="dropdown-menu dropdown-scale dropdown-menu-right" role="menu" style="min-width:0px;width:max-content;min-height:0px;height:max-content;padding:0px;position: absolute; transform: translate3d(-25px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
											<?php
													 if($p->user_id==$this->session->userdata('user_id'))
													 {
														 if($p->photo_type=="public")
														 {
															?>
															<a class="dropdown-item" href="<?=site_url('user/PhotoC/hidePhoto_default/').$p->photo_id.'/'.$p->album_id?>"><i class="fa fa-eye-slash" style="text-decoration: none;font-size: 20px;"></i><span style="text-decoration:none;font-size:12px;">hide</span></a>
										 				 
															<?php	 
														 }
														 else{
															?>
															<a class="dropdown-item" href="<?=site_url('user/PhotoC/showPhoto_default/').$p->photo_id.'/'.$p->album_id?>"><i class="fa fa-eye" style="text-decoration: none;font-size: 20px;"></i><span style="text-decoration:none;font-size:12px;">show</span></a>
										 				 
															<?php
														 }
														 ?>
														 <a class="dropdown-item" href="<?=site_url('user/PhotoC/deletePhoto_default/').$p->photo_id.'/'.$p->album_id?>"><i class="fa fa-trash" style="text-decoration: none;font-size: 20px;"></i></a>
										 		
														 <?php
													 }
											?>
												 <a class="dropdown-item reportDropdown" href="#reportModal" data-toggle="modal" data-pid="<?= $p->photo_id?>" data-rid="<?=$p->user_id;?>"><i class="fa fa-exclamation-circle" style="text-decoration: none;font-size: 20px;"></i></a>
							            	</div>
							           	</div><!--/ dropdown -->
							           <!-- END dropdown-->
							           	
							        </div><!--/ cardbox-heading -->
							        <div class="cardbox-item">
							        	

									 	<a href="#myModal" class="image" data-toggle="modal" data-photo="<?= $p->photo_path;?>" data-pid="<?= $p->photo_id?>" data-cmtcount="<?=$p->totalComments?>" data-dt="<?= $p->photo_date;?>" data-userid="<?= $p->user_id?>" data-cap="<?= $p->photo_caption;?>" data-isliked="<?=$p->isLiked?>">
									 		<div class="explorebox" 
									   			style="background: linear-gradient( rgba(34,34,34,0.2), rgba(34,34,34,0.2)), url('<?php echo base_url()?>resources/user/uploadPhotos/<?php echo $p->photo_path?>') no-repeat;
											  		background-size: cover;
											  		background-position: center center;
											  		-webkit-background-size: cover;
											  		-moz-background-size: cover;
											  		-o-background-size: cover;">
									  			<div class="explore-top">
									   				<div class="explore-like"><i class="fa fa-heart"></i> <span><?=$p->totalLikes?></span></div>
									   				

									  			</div>		  
									 		</div>
									 	</a>
								  	</div>
								</div>
	    					<?php
	    					
	    				}
	    			}
	    			if($albumData!=null)
	    			{

	    				foreach ($albumData as $a) {
	    					if($a->photo==null)
	    					{
	    						$tempCover=$a->album_cover;
	    					}
	    					else
	    					{
	    						$tempCover=$a->photo->photo_path;
	    					}

	    					?>

	    					<div class="col-lg-4">
		 						<a href="<?php echo site_url("user/HomeC/loadPhotos/")?><?= $a->album_id;?>">
				 				<div class="explorebox" id="album" style="background: linear-gradient( rgba(34,34,34,0.2), rgba(34,34,34,0.2)), url('<?php echo base_url()?>resources/user/uploadPhotos/<?php echo $tempCover;?>') no-repeat;
						          	background-size: cover;
				                  	background-position: center center;
				                  	-webkit-background-size: cover;
				                  	-moz-background-size: cover;
				                  	-o-background-size: cover;">
					  				 
			 					</div>
		 						</a>
		 						<center><label style="color:gray;font-size: 20px;font-family:'Abhaya Libre';">Album: <?php echo $a->album_title?></label></center>
		 						 
							</div><!--/ col-lg-4 -->

	    					<?php
	    				}
	    			}
	    		?>
	   
	    	
	   		</div><!--/ row -->
	   
	  	</div><!--/ container -->
	</section><!--/ newsfeed -->
  
	 <!-- ==============================================
	 Modal Section
	 =============================================== -->
	 <?php include_once("modal.php")?>

    <?php include_once("bottomscripts.php")?>
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
	



     
    <script type="text/javascript">
		let pid=0;
		$(document).on("click", ".image", function () 
		{
		    var imagename = $(this).data('photo');

		    pid=$(this).data('pid');
		    let uid=$(this).data('userid');
		    let current_uid=<?= $this->session->userdata("user_id")?>;
		    if(uid!=current_uid)
		    {
		    	$(".modal-body #cap #editCap").hide();
		    }
		    $(".modal-body #picture").attr("src","<?= base_url()?>resources/user/uploadPhotos/"+imagename);
		    
		    //alert(pid);
		    $("#linkLike").data("pid",pid);
		    //alert($(this).data("isliked"));
		    if($(this).data("isliked")==1)
		    {
		    	$("#linkLike").text("Unlike");
		    }
		    $(".modal-body #dt").text($(this).data("dt"));
		    $(".modal-body #cap").text($(this).data("cap"));
		    $(".modal-body #cmtCount").text($(this).data("cmtcount"));
		     
		    $.ajax({type:'POST', url: "<?= site_url("user/HomeC/getComments/")?>",data:{photo_id:pid}, success: function(result){
		    $(".modal-body #commentBody").empty();
		    let commentData=JSON.parse(result);
		    $.each(commentData,function(idx,obj){
		    	let c="<li id='"+"liCmnt"+obj.comment_id+"'>";
				c+="<div class='comment-img'>";
				c+="<img src='"+"<?= base_url('resources/user/uploadPhotos/profile/')?>"+obj.user_profile_pic+"' class='img-responsive img-circle' alt='Image'/>";
				c+="</div>";
				c+="<div class='comment-text'>";
				c+="<strong><a href='"+"<?=site_url('user/HomeC/loadProfile/')?>"+obj.username+"'>"+obj.username+"</a></strong>";

				c+="<p>"+obj.comment_data+"</p> <span class='date sub-text'>"+obj.comment_date+"</span>";
				
				let curCmntUid=obj.user_id;
				if(curCmntUid==current_uid || uid==current_uid)
				{
					c+="&nbsp;<a class='modal-delete delCmnt' href='#' data-cid='"+obj.comment_id+"'><i class='fa fa-trash'></i></a>";
					if(curCmntUid==current_uid)
					{
						c+="&nbsp;<a class='modal-edit editCmnt' href='#CommentModal' data-toggle='modal' data-cid='"+obj.comment_id+"' data-cmnt='"+obj.comment_data+"'><i class='fa fa-edit'></i></a>";
					}
					
				}
				
				
				c+="</div>";
				c+="</li>";
				$(".modal-body #commentBody").append(c);

		    });


    		
  			}});
		    
		    
	});
	$(".modal-body #comm").click(function(){
		let cmntText=$(".modal-body #txtcmnt").val();
		    $.ajax({type:'POST', url: "<?= site_url("user/HomeC/postComment/")?>",data:{cmnt:cmntText,photo_id:pid}, success: function(result){
    			
  			}});
  			let c="<li>";
			c+="<div class='comment-img'>";
			c+="<img src='"+"<?= base_url('resources/user/uploadPhotos/profile/')?><?= $this->session->userdata('user_profile_pic')?>"+"' class='img-responsive img-circle' alt='Image'/>";
			c+="</div>";
			c+="<div class='comment-text'>";
			c+="<strong><a href='#'>"+"<?php echo $this->session->userdata('username')?>"+"</a></strong>";
			c+="<p>"+cmntText+"</p> <span class='date sub-text'>just now</span>";
			c+="</div>";
			c+="</li>";
			$(".modal-body #commentBody").append(c);
			$(".modal-body #txtcmnt").val("");
			$("#myModal").modal('toggle');
	});

	

	

	$("#editCap").click(function() {
		let curCap=$(".modal-body #cap").text();
		$("#txtNewCap").val(curCap);
	});
	$("#btnEdit").click(function(){
		let curCap=$(".modal-body #cap").text();
		let newCap=$("#txtNewCap").val();
		
		if(curCap!=newCap)
		{
			$.ajax({type:'POST', url: "<?= site_url("user/HomeC/editCaption/")?>",data:{caption:newCap,photo_id:pid}, success: function(result){
    			
  			}});
  			$("#cap").text(newCap);
  			$("#CaptionModal").modal('toggle');
		}
	});

	$(document).on('click',"a.reportDropdown",function() {
		let temp_pid=$(this).data("pid");
		let temp_reportee=$(this).data("rid");
		$("#hfphoto_id").val(temp_pid);
		$("#hfreportee_id").val(temp_reportee);
	});




	$(document).on('click',"a.editCmnt",function(){
		//alert();
		$("#txtNewComment").val($(this).data("cmnt"));
		$("#txtNewComment").data("oldCmnt",$(this).data("cmnt"));
		$("#txtNewComment").data("cid",$(this).data("cid"));
		
	});
	$("#btnEditCmnt").click(function(){
		let newComment=$("#txtNewComment").val();
		let oldComment=$("#txtNewComment").data("oldCmnt");
		let cid=$("#txtNewComment").data("cid");
		//alert(oldComment+" "+cid);
		if(oldComment!=newComment)
		{
			$.ajax({type:'POST', url: "<?= site_url("user/HomeC/editComment/")?>",data:{comment:newComment,comment_id:cid}, success: function(result){
  			}});
  			$("#CommentModal").modal('toggle');
  			$("#myModal").modal('toggle');
  				
		}
	});


	$(document).on('click',"a.delCmnt",function(){
		let cid=$(this).data("cid");
		$.ajax({type:'POST', url: "<?= site_url("user/HomeC/deleteComment/")?>",data:{comment_id:cid}, success: function(result){
    			$("#liCmnt"+cid).remove();
  		}});
		//alert($(this).data("cid"));

	});
	$("#linkLike").click(function(){
		let photoid=$(this).data("pid");
		let linkText=$(this).text();
		if (linkText=="Unlike")
		{
			$.ajax({type:'POST', url: "<?= site_url("user/PhotoC/unlikePhoto/")?>",data:{photo_id:photoid}, success: function(result){
    			$("#linkLike").text("Like");
    		
  		}});
		}
		else
		{
			$.ajax({type:'POST', url: "<?= site_url("user/PhotoC/likePhoto/")?>",data:{photo_id:photoid}, success: function(result){
    			$("#linkLike").text("Unlike");
    			
  			}});
		}
	});
	$("#linkFollowers").click(function(){
		let  temp_uid="<?=$userData->user_id?>";
		$("#loadingContainer").html("");
		$.ajax({type:'POST', url: "<?= site_url("user/HomeC/getFollowersData/")?>",data:{user_id:temp_uid}, success: function(result){
			let followersData=JSON.parse(result);
		    $.each(followersData,function(idx,obj){
				let output="<div class='col-lg-3'>";
		 		output+="<div class='tr-section'>";
		  		output+="<div class='tr-post'>";
		   		output+="<div class='entry-header'>";
				output+="<div class='entry-thumbnail'>";
			    output+="<a href='#'><img class='img-fluid' src='"+"<?=base_url('resources/user/uploadPhotos/cover/')?>"+obj.user_cover_pic+"' alt='Image'></a>";
		    	output+="</div><!-- /entry-thumbnail -->";
		        output+="</div><!-- /entry-header -->";
		   		output+="<div class='post-content'>";
		    	output+="<div class='author-post text-center'>";
		     	output+="<a href='#'><img class='img-fluid rounded-circle' src='"+"<?=base_url('resources/user/uploadPhotos/profile/')?>"+obj.user_profile_pic+"' alt='Image'></a>";
		    	output+="</div><!-- /author -->";
				output+="<div class='card-content'>";
			 	output+="<a href='"+"<?=site_url('user/HomeC/loadProfile/')?>"+obj.username+"'><h4>"+obj.user_fname+" "+obj.user_lname+"</h4></a>";
		     	output+="<span>@"+obj.username+"</span><br><br>";
				output+="</div>";
				output+="</a>";		  
		   		output+="</div><!-- /.post-content -->	";								
		  		output+="</div><!-- /.tr-post -->";	
			    output+="</div><!-- /.tr-post -->";	
				output+="</div>";
				$("#loadingContainer").append(output);
			});
			
			
				
    			
  		}});		
	});
	$("#linkFollowing").click(function(){
		let  temp_uid="<?=$userData->user_id?>";
		$("#loadingContainer").html("");
		$.ajax({type:'POST', url: "<?= site_url("user/HomeC/getFollowingData/")?>",data:{user_id:temp_uid}, success: function(result){
			let followingData=JSON.parse(result);
		    $.each(followingData,function(idx,obj){
				let output="<div class='col-lg-3'>";
		 		output+="<div class='tr-section'>";
		  		output+="<div class='tr-post'>";
		   		output+="<div class='entry-header'>";
				output+="<div class='entry-thumbnail'>";
			    output+="<a href='#'><img class='img-fluid' src='"+"<?=base_url('resources/user/uploadPhotos/cover/')?>"+obj.user_cover_pic+"' alt='Image'></a>";
		    	output+="</div><!-- /entry-thumbnail -->";
		        output+="</div><!-- /entry-header -->";
		   		output+="<div class='post-content'>";
		    	output+="<div class='author-post text-center'>";
		     	output+="<a href='#'><img class='img-fluid rounded-circle' src='"+"<?=base_url('resources/user/uploadPhotos/profile/')?>"+obj.user_profile_pic+"' alt='Image'></a>";
		    	output+="</div><!-- /author -->";
				output+="<div class='card-content'>";
			 	output+="<a href='"+"<?=site_url('user/HomeC/loadProfile/')?>"+obj.username+"'><h4>"+obj.user_fname+" "+obj.user_lname+"</h4></a>";
		     	output+="<span>@"+obj.username+"</span><br><br>";
				output+="</div>";
				output+="</a>";		  
		   		output+="</div><!-- /.post-content -->	";								
		  		output+="</div><!-- /.tr-post -->";	
			    output+="</div><!-- /.tr-post -->";	
				output+="</div>";
				$("#loadingContainer").append(output);
			});
			
			
				
    			
  		}});		
	});

	</script>

  </body>

</html>
