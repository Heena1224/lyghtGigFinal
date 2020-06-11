<?php
	$title="Photos";
?>
<html lang="en">

<head>
		<title><?php echo $title?></title>
	    <?php include_once("topscripts.php")?>
	    <style type="text/css">
	    	.dropdown-item {
			    display: block;
			    width: 100%;
			    padding: 3px 20px;
			    clear: both;
			    font-size: 20px;
			    font-weight: 400;
			    color: #373a3c;
			    text-align: inherit;
			    white-space: nowrap;
			    background: 0 0;
			    border: 0;
			}
	    </style>
		
  </head>

<body>

     <!-- ==============================================
     Navigation Section
     =============================================== -->  
     <?php include_once("header.php")?>
	<?php include_once ("nav.php");?>
	 <!-- ==============================================
	 News Feed Section
	 =============================================== --> 

	<section class="profile-two" style="margin-top: 100px;">
	  	<div class="container-fluid">
	   		<div class="row">

				<div class="col-lg-3">
         			<aside id="leftsidebar" class="sidebar">		  
			  			<ul class="list">
	           				<li>
								<div class="user-info">
						 			<div class="image">
							      		<a href="photo_profile_two.html">
								  			<!--  <img src="<?php echo base_url()?>resources/user/uploadPhotos/<?php echo $albumDetails->photo_path;?>" class="img-responsive img-circle" alt="User"> -->
								  		</a>
									</div>
							    	<div class="detail">
								  		<h2 id="oldAlbumTitle" data-aid="<?=$albumDetails->album_id?>"><strong><?php echo strtoupper($albumDetails->album_title);?></strong></h2>                       
								 	</div>
								 	<div class="row">
								  		<div class="col-12">
										<?php
											if($albumDetails->user_id==$this->session->userData("user_id"))
											{
												?>
												<a id="editAlbumTitle" class="modal-edit" href="#albumTitleModal" data-toggle="modal"><i class="fa fa-edit" style="color:gray;"></i></a>
												<a id="deleteAlbum" class="modal-edit" href="<?=site_url('user/HomeC/deleteAlbum/')?><?=$albumDetails->album_id?>"><i class="fa fa-trash" style="color:red;"></i></a>								
												<?php
											}
										?>
										</div>                                
								 	</div>
								</div>
	          				</li>
	           				<li>
	            				<small class="text-muted"><bold>Description:</bold>
								<?php
									if($albumDetails->user_id==$this->session->userdata("user_id"))
									{
										?>
											<a id="editAlbumDesc" class="modal-edit" href="#descriptionModal" data-toggle="modal"><i class="fa fa-edit" style="color:gray;"></i></a>
										<?php
									}
								?>
								</small><br>
								<span style="font-size:20px;float:right;" id="oldDesc" data-aid="<?=$albumDetails->album_id?>"><?php echo $albumDetails->album_description;?></span>
								<br/>
								
	            		
	            				<hr>                      
	           				</li>                    
	          			</ul>
         			</aside>				
				</div><!--/ col-lg-3-->
		
				<div class="col-lg-9" style="background: #fff;">
				 	<div class="row">
				 		

				  		<?php
			    			if(isset($albumDetails->photoData) && $albumDetails->photoData!= null)
			    			{
			    				foreach ($albumDetails->photoData as $p) {
			    		?>
	    						<div class="col-lg-3">
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
							        	

									 	<a href="#myModal" class="image" data-toggle="modal" data-photo="<?= $p->photo_path;?>" data-pid="<?= $p->photo_id?>" data-cmtcount="<?=$p->totalComments?>" data-likecount="<?=$p->totalLikes?>" data-dt="<?= $p->photo_date;?>" data-userid="<?= $p->user_id?>" data-cap="<?= $p->photo_caption;?>" data-isliked="<?=$p->isLiked?>">
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
							else{
								?><p>No photos in this album.</p><?php
							}
			    		?>
			    	
					</div><!--/ row -->
				</div>

			</div>
		</div>
       		
		</div><!--/ container -->
	</section><!--/ profile -->
	<?php include_once("modal.php")?>
						

     <!-- ==============================================
	 Scripts
	 =============================================== -->
	
	<?php include_once("bottomscripts.php")?>
	
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
		    $(".modal-body #likeCount").text($(this).data("likecount"));		     
		    $.ajax({type:'POST', url: "<?= site_url("user/HomeC/getComments/")?>",data:{photo_id:pid}, success: function(result){
		    $(".modal-body #commentBody").empty();
		    let commentData=JSON.parse(result);
		    $.each(commentData,function(idx,obj){
		    	let c="<li id='"+"liCmnt"+obj.comment_id+"'>";
				c+="<div class='comment-img'>";
				c+="<img src='"+"<?= base_url('resources/user/uploadPhotos/profile/')?>"+obj.user_profile_pic+"' class='img-responsive img-circle' alt='Image'/>";
				c+="</div>";
				c+="<div class='comment-text'>";
				c+="<strong><a href='#'>"+obj.username+"</a></strong>";

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
	$("#btnEditDesc").click(function(){
		let curDesc=$("#oldDesc").text();
		let newDesc=$("#txtNewDesc").val();
		let temp_aid=$("#oldDesc").data("aid");
		if(curDesc!=newDesc)
		{
			$.ajax({type:'POST', url: "<?= site_url("user/HomeC/editAlbumDescription/")?>",data:{newDesc:newDesc,album_id:temp_aid}, success: function(result){
			
  			}});
  			$("#oldDesc").text(newDesc);
  			$("#descriptionModal").modal('toggle');
		}
	});
	$("#btnEditTitle").click(function(){
		let curTitle=$("#oldAlbumTitle").text();
		let newTitle=$("#txtNewAlbumTitle").val();
		let temp_aid=$("#oldAlbumTitle").data("aid");
		if(curTitle!=newTitle)
		{
			$.ajax({type:'POST', url: "<?= site_url("user/HomeC/editAlbumTitle/")?>",data:{newTitle:newTitle,album_id:temp_aid}, success: function(result){
			
  			}});
  			$("#oldAlbumTitle").text(newTitle.toUpperCase());
  			$("#albumTitleModal").modal('toggle');
		}
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

	$(document).on('click',"a.reportDropdown",function() {
		let temp_pid=$(this).data("pid");
		let temp_reportee=$(this).data("rid");
		$("#hfphoto_id").val(temp_pid);
		$("#hfreportee_id").val(temp_reportee);
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


	</script>

  </body>


</html>
