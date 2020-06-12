<?php
if($exploreUsers!=null)
{
	foreach ($exploreUsers as $ul) 
	{
	 if($ul->userData!=null)
	 {
		?>
		 <div class="suggestions-list">
		 <div class="suggestion-body">
			<a href="<?=site_url('user/HomeC/loadProfile/'.$ul->userData->username)?>"><img class="img-responsive img-circle" src="<?php echo base_url()?>resources/user/uploadPhotos/profile/<?php echo $ul->userData->user_profile_pic?>" alt="Image"></a>
			<div class="name-box">
			<a href="<?=site_url('user/HomeC/loadProfile/'.$ul->userData->username)?>"><h4><?=$ul->userData->user_fname." ".$ul->userData->user_lname?></h4></a>
				<span>@<?= $ul->userData->username?></span>
			</div>
			<span><a href="<?=site_url('user/HomeC/follow/'. $ul->userData->user_id.'/'.$ul->userData->username.'/0')?>"><i class="fa fa-plus"></i></a></span>			
		 </div>		
		<?php
			if($ul->mostLikedPhotos!=null)
			{
				?>
					<div class="trending-box">
						<div class="row">
						<?php
							$count=0;
							foreach($ul->mostLikedPhotos as $k)
							{

								?>
								<div class="col-lg-6">
									<a href="#"><img style="height:120px;width:180px;" src="<?=base_url()?>resources/user/uploadPhotos/<?=$k->photo_path?>" class="img-responsive" alt="Image"></a>
								</div>
								
								<?php
							
							}
						?>
						</div>
					</div>
				<?php
			}

	 }
	}
}
?>
