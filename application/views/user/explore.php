<?php $title="Explore";
?>
<html lang="en">
<head>
		<title><?php echo $title;?></title>
	    <!-- ==============================================
		Meta Tags
		=============================================== -->
		<?php include_once("topscripts.php")?>

		   <script type="javascript" src="<?php echo base_url()?>resources/user/assets/js/chosen.jquery.min.js"></script>
		   <script type="javascript" src="<?php echo base_url()?>resources/user/assets/js/bootstrap.min.js"></script>
    <link href="<?php echo base_url()?>resources/user/assets/css/chosen.min.js?>" rel="stylesheet">
	<style>
			body {
				font-family: "Roboto", sans-serif;
			}

			.select-wrapper {
				margin: auto;
				max-width: 600px;
				width: calc(100% - 40px);
			}

			.select-pure__select {
				align-items: center;
				background: #f9f9f8;
				border-radius: 4px;
				border: 1px solid rgba(0, 0, 0, 0.15);
				box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
				box-sizing: border-box;
				color: #363b3e;
				cursor: pointer;
				display: flex;
				font-size: 16px;
				font-weight: 500;
				justify-content: left;
				min-height: 44px;
				padding: 5px 10px;
				position: relative;
				transition: 0.2s;
				width: 100%;
			}

			.select-pure__options {
				border-radius: 4px;
				border: 1px solid rgba(0, 0, 0, 0.15);
				box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
				box-sizing: border-box;
				color: #363b3e;
				display: none;
				left: 0;
				max-height: 221px;
				overflow-y: scroll;
				position: absolute;
				top: 50px;
				width: 100%;
				z-index: 5;
			}

			.select-pure__select--opened .select-pure__options {
				display: block;
			}

			.select-pure__option {
				background: #fff;
				border-bottom: 1px solid #e4e4e4;
				box-sizing: border-box;
				height: 44px;
				line-height: 25px;
				padding: 10px;
			}

			.select-pure__option--disabled {
				color: #e4e4e4;
			}

			.select-pure__option--selected {
				color: #e4e4e4;
				cursor: initial;
				pointer-events: none;
			}

			.select-pure__option--hidden {
				display: none;
			}

			.select-pure__selected-label {
				align-items: 'center';
				background: #5e6264;
				border-radius: 4px;
				color: #fff;
				cursor: initial;
				display: inline-flex;
				justify-content: 'center';
				margin: 5px 10px 5px 0;
				padding: 3px 7px;
			}

			.select-pure__selected-label:last-of-type {
				margin-right: 0;
			}

			.select-pure__selected-label i {
				cursor: pointer;
				display: inline-block;
				margin-left: 7px;
			}

			.select-pure__selected-label img {
				cursor: pointer;
				display: inline-block;
				height: 18px;
				margin-left: 7px;
				width: 14px;
			}

			.select-pure__selected-label i:hover {
				color: #e4e4e4;
			}

			.select-pure__autocomplete {
				background: #f9f9f8;
				border-bottom: 1px solid #e4e4e4;
				border-left: none;
				border-right: none;
				border-top: none;
				box-sizing: border-box;
				font-size: 16px;
				outline: none;
				padding: 10px;
				width: 100%;
			}

			.select-pure__placeholder--hidden {
				display: none;
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
	<section class="newsfeed">
	  	<div class="container">
	  
	   		<div class="row top-row">
	   			<?php
	   				if($exploreUsers!=null)
	   				{
	   					foreach ($exploreUsers as $ul) 
	   					{
							if($ul->userData!=null)
							{
								?>


								<div class="col-lg-3">
									 <div class="tr-section">
										  <div class="tr-post">
											   <div class="entry-header">
												<div class="entry-thumbnail">
													 <a href="#"><img class="img-fluid" src="<?php echo base_url() ?>resources/user/uploadPhotos/cover/<?php echo $ul->userData->user_cover_pic?>" alt="Image"></a>
												</div><!-- /entry-thumbnail -->
											   </div><!-- /entry-header -->
											   <div class="post-content">
												<div class="author-post text-center">
													 <a href="#"><img class="img-fluid rounded-circle" src="<?php echo base_url() ?>resources/user/uploadPhotos/profile/<?php echo $ul->userData->user_profile_pic?>" alt="Image"></a>
												</div><!-- /author -->
												<div class="card-content" style="margin-bottom: 10px;">
													<a href="<?=site_url('user/HomeC/loadProfile/'.$ul->userData->username)?>">
													 <h4><?=$ul->userData->user_fname." ".$ul->userData->user_lname?></h4></a>
													 <span>@<?= $ul->userData->username;?></span>
												</div>
												 <a href="<?=site_url('user/HomeC/follow/'.$ul->userData->user_id.'/'.$ul->userData->username.'/0')?>" class="kafe-btn kafe-btn-mint-small full-width"> Follow
												 </a>		  
											   </div><!-- /.post-content -->									
										  </div><!-- /.tr-post -->	
									 </div><!-- /.tr-post -->	
								</div><!-- /col-sm-3 -->
		
									   <?php
							}
	   					}
	   				}
	   			?>
	   		</div>

	   		<div class="row search-row">
	    		<div class="col-lg-12">
		 			<div class="tr-section">	<center>
				   		<div class="search-dashboard" style="margin:30px 30px 30px 30px;">
           					<form method="post" id="frmSearch" action="<?=site_url("user/PhotoC/loadExplore")?>" enctype="multipart/form-data" name="framework_form">
								<div class="form-group">
									<input type="text" id="hiddenTypes" name="types" style="display:none;" value="1">
									<label style="color:gray;font-size: 20px;font-family:'Abhaya Libre';">Select Category</label>
									<span class="autocomplete-select"></span>
								</div>
							    <div class="form-group">
                				<select style="border-radius: 5px;background-color:#f4f4f4;padding:2px 2px 2px 15px;font-family: Rubik;border:none;height: 7%;font-size:20px;margin-bottom: 10px;margin-left:10px;" name="lstSort">

                					<option value="-1">Sort By:Recommanded</option>
                					<option value="1">Most Liked</option>
                					<option value="2">Latest Photos</option>
                					<option value="3">Oldest Photos</option>
                				</select>
                				<button name="btnSearch" type="submit" value="submit" style="background-color: transparent;border: none;color:gray;font-family: Rubik;font-size: 20px;">SEARCH<i class="fa fa-search"></i></button>
                				</div>	
	          				</form>
      					</div>		
      					</center>					
	     			</div><!-- /.tr-post -->
				</div><!-- /col-sm-6 -->
				
	   		</div>
	  
			<div class="row one-row">
	    		<div class="col-lg-12">
	     			<h4>Explore Section</h4>
				</div>
	   		</div>
	  
	   		<div class="row">
	   
	    		<?php
	    			if($photoData!=null)
	    			{
	    				foreach($photoData as $key)
	    				{

	    					?>
	    					<div class="col-lg-4">
			    					<div class="cardbox-heading">
							           <!-- START dropdown-->
							           	<div class="dropdown pull-right">
							            	<button class="btn btn-secondary btn-flat btn-flat-icon" type="button" style="background-color: transparent;font-size: 20px;" data-toggle="dropdown" aria-expanded="false">
									     		<em class="fa fa-ellipsis-v"></em>
											</button>
							            	<div class="dropdown-menu dropdown-scale dropdown-menu-right" role="menu" style="min-width:0px;width:max-content;min-height:0px;height:max-content;padding:0px;position: absolute; transform: translate3d(-25px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
										 		<a class="dropdown-item reportDropdown" href="#reportModal" data-toggle="modal" data-pid="<?= $key->photo_id?>" data-rid="<?=$key->user_id;?>"><i class="fa fa-exclamation-circle" style="text-decoration: none;font-size: 20px;"></i></a>
							            	</div>
							           	</div><!--/ dropdown -->
							           <!-- END dropdown-->
							           	
							        </div><!--/ cardbox-heading -->
							        <div class="cardbox-item">
									 	<a href="#myModal" class="image" data-toggle="modal" data-photo="<?= $key->photo_path;?>" data-uphoto="<?php echo $key->photoOwnerData->user_profile_pic?>" data-uname="<?php echo $key->photoOwnerData->username;?>" data-pid="<?= $key->photo_id?>" data-cmtcount="<?=$key->totalComments?>" data-likecount="<?=$key->totalLikes?>" data-dt="<?= $key->photo_date;?>" data-userid="<?= $key->user_id?>" data-cap="<?= $key->photo_caption;?>" data-isliked="<?=$key->isLiked?>">
									 		<div class="explorebox" 
									   			style="background: linear-gradient( rgba(34,34,34,0.2), rgba(34,34,34,0.2)), url('<?php echo base_url()?>resources/user/uploadPhotos/<?php echo $key->photo_path?>') no-repeat;
											  		background-size: cover;
											  		background-position: center center;
											  		-webkit-background-size: cover;
											  		-moz-background-size: cover;
											  		-o-background-size: cover;">
									  			<div class="explore-top">
									   				<div class="explore-like"><i class="fa fa-heart"></i> <span><?=$key->totalLikes?></span></div>
									   				

									  			</div>		  
									 		</div>
									 	</a>
								  	</div>
								</div>
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
    <div id="myModal" class="modal fade">
      	<div class="modal-dialog">
       		<div class="modal-content">
        		<div class="modal-body">
         			<div class="row">
          				<div class="col-md-8 modal-image">
           					<img class="img-responsive" src="" id="picture"/><br>
           					<center><a style="color:black;" id="linkLike">Like</a></center>
           					<center><strong><span id="cap"></span></strong>&nbsp; &nbsp;
           					<a  id="editCap" style="color: gray;" class='modal-edit' href='#CaptionModal' data-toggle="modal"><i class='fa fa-edit'></i></a></center>
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
     <!-- ==============================================
	 Scripts
	 =============================================== -->
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
					c+="<a href='"+"<?=site_url('user/HomeC/loadProfile/')?>"+obj.username+"'><img src='"+"<?= base_url('resources/user/uploadPhotos/profile/')?>"+obj.user_profile_pic+"' class='img-responsive img-circle' alt='Image'/>";
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
				c+="<a href='"+"<?=site_url('user/HomeC/loadProfile/')?>"+"<?=$this->session->userdata('username')?>"+"'><img src='"+"<?= base_url('resources/user/uploadPhotos/profile/')?><?= $this->session->userdata('user_profile_pic')?>"+"' class='img-responsive img-circle' alt='Image'/>";
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
	<script src="<?=base_url()?>resources/shared/bundle.min.js"></script>
<script>
	 var customIcon = document.createElement('img');
      customIcon.src = '<?=base_url()?>resources/shared/icon.svg';
      var customIconMulti = new SelectPure(".autocomplete-select", {
        options: [
			<?php
				if($catData!=null)
				{
					foreach($catData as $key)
					{
						?>
						{
							label: "<?=$key->cat_name?>",
							value: "<?=$key->cat_id?>",
						},
						<?php
					}
				}	
			?>
        ],
        multiple: true,
		autocomplete:true,
        inlineIcon: customIcon,
        onChange: value => { console.log(value);},
        classNames: {
          select: "select-pure__select",
          dropdownShown: "select-pure__select--opened",
          multiselect: "select-pure__select--multiple",
          label: "select-pure__label",
          placeholder: "select-pure__placeholder",
          dropdown: "select-pure__options",
          option: "select-pure__option",
          autocompleteInput: "select-pure__autocomplete",
          selectedLabel: "select-pure__selected-label",
          selectedOption: "select-pure__option--selected",
          placeholderHidden: "select-pure__placeholder--hidden",
          optionHidden: "select-pure__option--hidden",
        },
      });
      var resetCustomMulti = function() {
        customIconMulti.reset();
      };
	  $("#frmSearch").submit(function(){
		  $("#hiddenTypes").val(customIconMulti.value());
	  });

</script>	
  </body>

</html>
