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