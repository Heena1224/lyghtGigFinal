<?php $title="lyghtGig";
?>
<html lang="en">
  <head>
  		<title><?php echo $title?></title>
	    <?php include_once("topscripts.php")?>
  </head>

<body>

     <!-- ==============================================
     Header Section
     =============================================== -->  

  	<?php include_once("header.php")?>
	<?php include_once("nav.php")?>	
  
	 <!-- ==============================================
	 News Feed Section
	 =============================================== --> 
	<section class="newsfeed">
	  	<div class="container-fluid">
	   		<div class="row">
	    		<div class="col-lg-3">
		 			<?php include_once("left-sidebar.php")?>
				</div><!--/ col-lg-3 -->
	    		<div class="col-lg-6">
         			<?php
         				if($postData!=null)
         				{
         					foreach ($postData as $p) {
         						if($p->ownerData!=null)
         						{
         							?>
         							<div class="cardbox">
		 
					          				<div class="cardbox-heading">
					           					<!-- START dropdown-->
					           					<div class="dropdown pull-right">
					            					<button class="btn btn-secondary btn-flat btn-flat-icon" type="button" data-toggle="dropdown" aria-expanded="false">
							     						<em class="fa fa-ellipsis-h"></em>
													</button>
					            					<div class="dropdown-menu dropdown-scale dropdown-menu-right" role="menu" style="position: absolute; transform: translate3d(-136px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
											         	<?php
											         		if($p->ownerData->user_id==$this->session->user_id)
											         		{
											         			?>
											         				<a class="dropdown-item" href="#">Hide post</a>		
											         			<?php
											         		}
											         	?>
													 	<a class="dropdown-item" href="#">Stop following</a>
													 	<a class="dropdown-item reportDropdown" href="#reportModal" data-toggle="modal" data-pid="<?=$p->photo_id?>" data-rid="<?=$p->ownerData->user_id?>">Report</a>
					            					</div>
					           				 	</div><!--/ dropdown -->
					           					<!-- END dropdown-->
					           					<div class="media m-0" >
					            					<div class="d-flex mr-3" >
								 						<a href="<?=site_url("user/HomeC/loadProfile/")?><?=$p->ownerData->username?>"><img class="img-responsive img-circle" src="<?php echo base_url()?>resources/user/uploadPhotos/profile/<?=$p->ownerData->user_profile_pic?>" alt="User"></a>
													</div>
					            					<div class="media-body">
													<a href="<?=site_url("user/HomeC/loadProfile/")?><?=$p->ownerData->username?>"><p class="m-0"><?=$p->ownerData->username?></p></a>
														<small><span><?=$p->photo_date;?></span></small>
					            					</div>
					           					</div><!--/ media -->
					          				</div><!--/ cardbox-heading -->
					          
							  				<div class="cardbox-item">
							   					<a href="#myModal" class="image" data-toggle="modal" data-photo="<?=$p->photo_path?>" data-uphoto="<?php echo $p->ownerData->user_profile_pic?>" data-uname="<?php echo $p->ownerData->username;?>" data-pid="<?= $p->photo_id?>" data-cmtcount="<?=$p->totalComments?>" data-likecount="<?=$p->totalLikes?>" data-dt="<?=$p->photo_date?>" data-userid="<?=$p->ownerData->user_id?>" data-cap="<?=$p->photo_caption?>" data-isliked="<?=$p->isLiked?>">
							    					<img class="img-responsive" src="<?php echo base_url()?>resources/user/uploadPhotos/<?=$p->photo_path?>" alt="MaterialImg" style="height: 600px;width:540px;margin:auto;">
							   					</a> 
					          				</div><!--/ cardbox-item -->
						      			
					          				<div class="cardbox-like">
							   					<ul>
													<li><a href="#"><i class="fa fa-heart"></i></a><span><?=$p->totalLikes?></span></li>
												    <li><a href="#" title="" class="com"><i class="fa fa-comments"></i></a> <span class="span-last"><?=$p->totalComments?></span></li>
							   					</ul>
					          				</div><!--/ cardbox-like -->			  
					                
							 			</div><!--/ cardbox -->	
         							<?php
         						}
         					}
         				}
         			?>
				</div><!--/ col-lg-6 -->
				<div class="col-lg-3">
		
         			<div class="suggestion-box full-width">
						<?php include_once("right-sidebar.php");?>
					</div>	
				</div>

       
		
        	
		
		
		</div>
		
	   </div><!--/ row -->
	  </div><!--/ container -->
	 </section><!--/ newsfeed -->
  
	 <!-- ==============================================
	 Modal Section
	 =============================================== -->
   	
	 <div id="myModal" class="modal fade">
      	<div class="modal-dialog">
       		<div class="modal-content">
        		<div class="modal-body">
         			<div class="row">
          				<div class="col-md-8 modal-image">
           					<img class="img-responsive" src="" id="picture"/><br>
           					<center><a style="color:black;" id="linkLike">Like</a></center>
           					<center><strong><span id="cap"></span></strong>&nbsp; &nbsp;
           					</center>
          				</div><!--/ col-md-8 -->
          				<div class="col-md-4 modal-meta">
           					<div class="modal-meta-top">
            					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			 						<span aria-hidden="true">×</span><span class="sr-only">Close</span>
								</button><!--/ button -->
            					<div class="img-poster clearfix">
	             					<a href="#"><img class="img-responsive img-circle" id="uprofile" src="" alt="Image"/></a>
	             					<strong><a href="#" id="uname"></a></strong>
	             					<span id="dt"></span><br/>
			     					<a href="#" class="kafe kafe-btn-mint-small"><i class="fa fa-check-square"></i> Following</a>
	            				</div><!--/ img-poster -->
			  
	            				<ul class="img-comment-list" id="commentBody">
	             					<?php
	             						if(isset($comments))
	             						{
	             							foreach ($comments as $c) 
	             							{
	             					?>
	             						<li>
	              						<div class="comment-img">
	               							<img src="assets/img/users/17.jpg" class="img-responsive img-circle" alt="Image"/>
	              						</div>
	              						<div class="comment-text">
	               							<strong><a href="#"></a></strong>
	               							<p id="comData"><?php echo $c->comment_data?></p> <span class="date sub-text" id="comDate"><?php echo $comment->c_date?> </span>
	              						</div>
	             					</li><!--/ li -->

	             					<?php
	             							}
	             						}
	             					?>

	             
	            				</ul><!--/ comment-list -->
			  
            					<div class="modal-meta-bottom">
			 						<ul>
			  							<li>
				  							<a class="modal-like" href="#"><i class="fa fa-heart"></i></a><span class="modal-one" id="likeCount"> 786,286</span> | 
				      						<a class="modal-comment" href="#"><i class="fa fa-comments"></i></a><span id="cmtCount"></span> 
				      					</li>
				  						<li>
				   							<span class="thumb-xs">
												<img class="img-responsive img-circle" src="<?php echo base_url(); ?>resources/user/uploadPhotos/profile/<?=$this->session->userdata('user_profile_pic')?>">
				   							</span>
			   								<div class="comment-body">
			   									
			   										<input id="txtcmnt" class="form-control input-sm" type="text" placeholder="Write your comment...">
			   										<br>
			   										<button id="comm" name="btnComment" value="Comment" class="kafe kafe-btn-mint-small" style="border-radius: 5px; width:100%;height: 8%; font-size: 14px;border:none;">Comment</button>
			   									

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


   	
     <?php include_once("bottomscripts.php")?>
	 <script type="text/javascript">
		let pid=0;
		$(document).on("click", ".image", function () 
		{
		    var imagename = $(this).data('photo');
		    var user_profile=$(this).data('uphoto');
		    pid=$(this).data('pid');
		    let uid=$(this).data('userid');
		    let current_uid=<?= $this->session->userdata("user_id")?>;
		    if(uid!=current_uid)
		    {
		    	$(".modal-body #cap #editCap").hide();
		    }
		    $(".modal-body #picture").attr("src","<?= base_url()?>resources/user/uploadPhotos/"+imagename);
		     $(".modal-body #uprofile").attr("src","<?= base_url()?>resources/user/uploadPhotos/profile/"+user_profile);
		    
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
			
		    $(".modal-body #uname").text($(this).data("uname"));
		    $.ajax({type:'POST', url: "<?= site_url("user/HomeC/getComments/")?>",data:{photo_id:pid}, success: function(result){
		    $(".modal-body #commentBody").empty();
		    let commentData=JSON.parse(result);
		    $.each(commentData,function(idx,obj){
		    	let c="<li id='"+"liCmnt"+obj.comment_id+"'>";
				c+="<div class='comment-img'>";
				c+="<a href='"+"<?=site_url('user/HomeC/loadProfile/')?>"+obj.username+"'><img src='"+"<?= base_url('resources/user/uploadPhotos/profile/')?>"+obj.user_profile_pic+"' class='img-responsive img-circle' alt='Image'/></a>";
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
			c+="<strong><a href='"+"<?=site_url('user/HomeC/loadProfile/')?>"+"<?=$this->session->userdata('username')?>"+"'>"+"<?php echo $this->session->userdata('username')?>"+"</a></strong>";
			c+="<p>"+cmntText+"</p> <span class='date sub-text'>just now</span>";
			c+="</div>";
			c+="</li>";
			$(".modal-body #commentBody").append(c);
			$(".modal-body #txtcmnt").val("");
			$("#myModal").modal('toggle');
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


	</script>
  </body>
</html>
