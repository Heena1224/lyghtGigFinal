<?php $title="Contest";
?>
<html lang="en">

<head>

  	<title><?= $title?></title>
    <?php include_once("topscripts.php")?>
		
</head>

<body>
	<?php include_once("header.php")?>
	<?php include_once ("nav.php");?>
    
	 <!-- ==============================================
	 News Feed Section
	 =============================================== --> 
	<section class="stories">
	  	<div class="container">
	   		<div class="row">
   			<?php
   				if($competitionData==null)
   				{
   					?>
   						<label>No Contests held recently</label>
   					<?php
   				}
   				else{
   					foreach ($competitionData as $key) 
   					{
   					?>

   						<div class="col-lg-4">
		 			<a href="<?php echo site_url("user/PhotoC/loadContestDetails/")."$key->competition_id"?>">
		 				<div class="storybox" 
		   					style="background: linear-gradient( rgba(34,34,34,0.78), rgba(34,34,34,0.78)), url('<?= base_url().'resources/shared/images/competition_cover/'?><?php echo $key->competition_cover_pic;?>') no-repeat;
						          background-size: cover;
				                  background-position: center center;
				                  -webkit-background-size: cover;
				                  -moz-background-size: cover;
				                  -o-background-size: cover;">
          					<div class="story-body text-center">
           						<h2 style="font-family:'Abhaya Libre';"><?=$key->competition_name?></h2>
           						<p style="font-family:'Abhaya Libre';font-size:16px;">Ends at:<?=$key->end_date?></p>
          					</div>		  
		 				</div>
		 			</a>
				</div> 
   					<?php
   					}
   				}
   			?>

	    			
	   		</div>
	 
	   
	  	</div><!--/ container -->
	</section><!--/ newsfeed -->
     <!-- ==============================================
	 Scripts
	 =============================================== -->
	 <?php include_once("bottomscripts.php")?>

  </body>

</html>
