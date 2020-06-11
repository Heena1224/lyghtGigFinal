<?php $title="Change Password";
?>
<html lang="en">

<head>
		<title><?= $title;?></title>
		 <?php include_once("topscripts.php")?>
<body>
	<?php include_once("header.php")?>
	<?php include_once ("nav.php");?>
	 <!-- ==============================================
	 News Feed Section
	 =============================================== --> 
	 
  
	 <!-- ==============================================
	 User Profile Section
	 =============================================== --> 
	<section class="user-profile" style="margin-top: 180px;">
	  	<div class="container-fluid">
	  	 	<div class="row">
	   
	    		<div class="col-lg-3">
		   			<div class="post-content">
		    			<div class="author-post text-center">
		     				<a href="#"><img class="img-fluid img-circle" src="<?php echo base_url() ?>resources/user/uploadPhotos/profile/<?php echo $this->session->userdata('user_profile_pic')?>" alt="Image"></a>
		    			</div><!-- /author -->
		   			</div><!-- /.post-content -->		
				</div><!-- /col-sm-3 -->
				<div class="col-lg-9">
					<div class="menu-category">
         				<div class="card-header">
		 						<center><h3><strong>Change Password</strong></h3></center>
						</div>
						<center>
						<div class="card-block" style="width:60%;">

							<form id="main" method="post" action="<?php echo site_url("user/HomeC/changePassword")?>" enctype="multipart/form-data" >
									
		   						<div class="form-group">
		   							<div class="row">
		   								<div class="col-sm-4" style="text-align: left; font-size: 18px;margin-top: 4px;">
		   									<label>Current Password:</label>
		   								</div>
		   								<div class="col-sm-8">
		    									<input name="txtCurrent" type="password" class="form-control" placeholder="Current Password">
		    							</div>
		    						</div>
		   						</div>
		   						<div class="form-group">
		   							<div class="row">
		   								<div class="col-sm-4" style="text-align: left;font-size: 18px;margin-top: 4px;">
		   									<label>New Password:</label>
		   								</div>
		   								<div class="col-sm-8">
		    								<input name="txtNew" type="password" class="form-control" placeholder="New Password">
		    							</div>
		    						</div>
		   						</div>
		   						<div class="form-group">
		   							<div class="row">
		   								<div class="col-sm-4" style="text-align: left;font-size: 18px;margin-top: 4px;">
		  									<label>Confirm Password:</label>
		   								</div>
		   								<div class="col-sm-8">
		    								<input type="password" class="form-control" name="txtConfirm" placeholder="Confirm Password">
		    							</div>
		    						</div>
		   						</div>
		   							<button class="kafe-btn kafe-btn-mint btn-block" type="submit" name="btnChangePwd" value="Submit">Change Password</button>
		   								
							</form>
						</div>
						</center>
					</div>
				</div>

				</div>
		
       		</div><!--/ row-->	
	  	</div><!--/ container -->
	</section><!--/ profile -->
  
	 <!-- ==============================================
	 User Profile Section
	 =============================================== --> 
	
	

	 <!-- ==============================================
	 Chang  Profile Section
	 =============================================== --> 

	 		
	
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
	   
     <?php include_once("bottomscripts.php")?>

  </body>

</html>
