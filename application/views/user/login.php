<!DOCTYPE html>
<?php $title="lyghtGig"
?>
<html lang="en">
 
<head>
	        <title><?php echo $title?></title>

	  <!-- ==============================================
		Meta Tags
		=============================================== -->
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta property="og:title" content="" />
        <meta property="og:url" content="" />
        <meta property="og:description" content="" />		
		
		<!-- ==============================================
		Favicons
		=============================================== --> 
		<link rel="icon" href="<?php echo base_url()?>resources/user/assets/img/logo.html">
		<link rel="apple-touch-icon" href="<?php echo base_url()?>resources/user/img/favicons/apple-touch-icon.html">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url()?>resources/user/img/favicons/apple-touch-icon-72x72.html">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url()?>resources/user/img/favicons/apple-touch-icon-114x114.html">
		
	    <!-- ==============================================
		CSS
		=============================================== -->
        <link type="text/css" href="<?php echo base_url()?>resources/user/assets/css/demos/photo.css" rel="stylesheet" />
				
		<!-- ==============================================
		Feauture Detection
		=============================================== -->
		<script src="<?php echo base_url()?>resources/user/assets/js/modernizr-custom.html"></script>
	
		
		
  </head>

<body>

	 <!-- ==============================================
	 Header Section
	 =============================================== -->
     <section class="login">
      <div class="container">
       <div class="banner-content">
	   
		  <h1><i class="fa fa-camera"></i><?php echo $title?></h1>
		  <form method="post" class="form-signin" enctype="multipart/form-data" action="<?php echo site_url("user/UserC/validateLogin")?>">
		   <h3 class="form-signin-heading">Please sign in</h3>
		   <div class="form-group">
		    <input name="txtUsername" type="text" class="form-control" placeholder="Username">
		   </div>
		   <div class="form-group">
		    <input type="password" class="form-control" name="txtPassword" placeholder="Password">
		   </div>
		   <button class="kafe-btn kafe-btn-mint btn-block" type="submit" name="submit">Sign in</button>
		   <br/>
		   <a class="btn btn-dark " href="<?php echo site_url("user/UserC/loadRegister")?>" role="button">Don't have an account yet? Register Here.</a>
		   <a class="btn btn-dark " href="#generatePasswordModal"  data-toggle="modal" role="button">Forgot your password?</a>
		  </form>
		
       </div><!--/. banner-content -->
      </div><!-- /.container -->
     </section> 
  
	<div id="generatePasswordModal" class="modal fade">
				<div class="modal-dialog" style="width:35%;">
					<div class="modal-content">
						<div class="modal-body">
							<div class="card" >
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									<span aria-hidden="true" style="margin:2px 2px 2px 2px;">×</span><span class="sr-only">Close</span>
								</button>
								<div class="card-block" >
									<form method="post" enctype="multipart/form-data" action="<?= site_url("user/UserC/sendPassword/")?>">
										<div class="form-group row" style="margin: 5px 20px 5px 20px;"><br><br>
											<center><label style="color:gray;font-size: 20px;font-family:'Abhaya Libre';">Recover your password<br><h4>Enter your E-mail id below and login using the password sent on your mail.</h4><br>
											<input type="mail" id="txtUserEmail" name="txtUserEmail" placeholder="Enter your email here" style="width: 100%;height: 10%;border-radius: 5px;" ></label></center>
										</div><br>
										<div class="form-group row" style="margin: 5px 20px 5px 20px;">

											<center>
												<button class="kafe-btn kafe-btn-mint btn-block" type="submit" id="btnSend" style="color:white;font-size: 12px;font-family:'Abhaya Libre';" value="Submit">Send</button>
											</center>
										</div>

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


	<script src="<?php echo base_url()?>resources/user/assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url()?>resources/user/assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>resources/user/assets/js/base.js"></script>
	


  </body>

<!-- Mirrored from themashabrand.com/templates/Fluffs/photo_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 May 2020 15:31:05 GMT -->
</html>
