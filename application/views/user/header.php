  	<header class="tr-header">
	    <nav class="navbar navbar-default">
	       	<div class="container-fluid">
		    	<div class="navbar-header">
				 	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
					  <span class="sr-only">Toggle navigation</span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
			 		</button>
			 		<a class="navbar-brand" href="index.html"><i class="fab fa-instagram"></i><!-- <?php echo $title?> --></a>
				</div><!-- /.navbar-header -->
				<div class="navbar-left">
			 		<div class="collapse navbar-collapse" id="navbar-collapse">
			  			<ul class="nav navbar-nav">
		  				</ul>
		 			</div>
				</div><!-- /.navbar-left -->
				<div class="navbar-right">                          
					<ul class="nav navbar-nav">
					   <li>
					   		<div class="search-dashboard" >
               					<form>
                    				<input placeholder="Search here" type="text" >
                    				<button type="submit"><i class="fa fa-search"></i></button>
              				 	</form>
          					</div>							
		   				</li>

		   				<li class="dropdown notification-list">
		    				<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
								 <i class="fa fa-bell noti-icon"></i>
								 <span class="badge badge-danger badge-pill noti-icon-badge">4</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-lg">
             
			 					<div class="dropdown-item noti-title">
								  	<h6 class="m-0">
									   	<span class="pull-right">
									    	<a href="#" class="text-dark"><small>Clear All</small></a> 
									   	</span>Notification
			  						</h6>
			 					</div>

			 					<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 416.983px;">
			  						<div class="slimscroll" style="max-height: 230px; overflow: hidden; width: auto; height: 416.983px;">
			  			 				<div id="Slim">
			    							<a href="javascript:void(0);" class="dropdown-item notify-item">
				 								<div class="notify-icon bg-success"><i class="fa fa-comment"></i></div>
				 								<p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">1 min ago</small></p>
											</a><!--/ dropdown-item-->
											<a href="javascript:void(0);" class="dropdown-item notify-item">
				 								<div class="notify-icon bg-success"><i class="fa fa-user-plus"></i></div>
				 								<p class="notify-details">Grace Flake followed you.<small class="text-muted">5 hours ago</small></p>
											</a><!--/ dropdown-item-->
											<a href="javascript:void(0);" class="dropdown-item notify-item">
												<div class="notify-icon bg-success"><i class="fa fa-heart"></i></div>
												<p class="notify-details">Carlos Crouch liked your photo.<small class="text-muted">3 days ago</small></p>
											</a><!--/ dropdown-item-->
											<a href="javascript:void(0);" class="dropdown-item notify-item">
											 	<div class="notify-icon bg-success"><i class="fa fa-comment"></i></div>
											 	<p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">4 days ago</small></p>
											</a><!--/ dropdown-item-->
											<a href="javascript:void(0);" class="dropdown-item notify-item">
											 	<div class="notify-icon bg-success"><i class="fa fa-user-plus"></i></div>
											 	<p class="notify-details">Maureen Hilda followed you.<small class="text-muted">7 days ago</small></p>
											</a><!--/ dropdown-item-->
											<a href="javascript:void(0);" class="dropdown-item notify-item">
												<div class="notify-icon bg-success"><i class="fa fa-heart"></i></div>
												<p class="notify-details">Carlos Crouch liked your photo.<small class="text-muted">13 days ago</small></p>
											</a><!--/ dropdown-item-->
			   							</div><!--/ .Slim-->
			  		 					<div class="slimScrollBar" style="background: rgb(158, 165, 171) none repeat scroll 0% 0%; width: 8px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;">
			  		 						
			  		 					</div>
			   							<div class="slimScrollRail" style="width: 8px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;">		
			   							</div>
			  						</div><!--/ .slimscroll-->
			 					</div><!--/ .slimScrollDiv-->
			 					<a href="photo_notifications.html" class="dropdown-item text-center notify-all">
			 						View all <i class="fa fa-arrow-right"></i>
			 					</a><!-- All-->
            				</div><!--/ dropdown-menu-->
		   				</li>

		   				
		  
		 				<li class="dropdown mega-avatar">
		  					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		   						<span class="avatar w-32"><img src="<?php echo base_url()?>resources/user/uploadPhotos/profile/<?=$this->session->userdata('user_profile_pic')?>" class="img-resonsive img-circle" width="25" height="25" alt="..."></span>
		   						<!-- hidden-xs hides the username on small devices so only the image appears. -->
		   						<span class="hidden-xs">
								<?php echo $this->session->userdata("username");?>
		   						</span>
		  					</a>
		  					<div class="dropdown-menu w dropdown-menu-scale pull-right">
		   						<?php
		   							if($this->session->userdata("is_verified")==1)
		   							{
		   								?>
		   								<a class="dropdown-item" href="<?php echo site_url("user/PhotoC/addContest")?>"><span>Create Contest</span></a>
		   						<?php
		   							}
		   						?>
							   	<a class="dropdown-item" href="<?php echo site_url("user/HomeC/changePassword")?>"><span>Change Password</span></a> 
							   	<a class="dropdown-item" href="<?php echo site_url("user/HomeC/loadEditProfile")?>"><span>Edit Profile</span></a> 
		   						<div class="dropdown-divider"></div>
		   						<a class="dropdown-item" href="<?php echo site_url("user/HomeC/logout")?>">Sign out</a>
		  					</div>
		 				</li><!-- /navbar-item -->	
		 
		 			</ul><!-- /.sign-in -->   
				</div><!-- /.nav-right -->
       		</div><!-- /.container -->
      	</nav><!-- /.navbar -->
    </header><!-- Page Header --> 