<?php $title="lyghtGig";?>
<html lang="en">
  

<head>
	    <title><?php echo $title;?></title>
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

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->	
		  
  </head>

<body  style="background:linear-gradient( rgba(34,34,34,0.7), rgba(34,34,34,0.7) ), url('<?=base_url()?>resources/user/assets/img/bg/10.jpg') no-repeat center center fixed;">

	 <!-- ==============================================
	 Header Section  user/UserC/addUser
	 =============================================== -->
   	<section class="login" style="background:none;margin-top: none;">
      	<div class="container">
       		<div class="banner-content" style="width: 100%;margin-top: none;">
		 		<h1>New User on <?php echo $title;?>?</h1><br>
		  			<form method="post" class="form-signin" enctype="multipart/form-data" action="<?php echo site_url("user/UserC/addUser")?>" style="max-width:100%;font-size: 12px;">
		   				<div class="form-group row">
		   					
								<input name="txtUsername" type="text" class="form-control" placeholder="User Name" required="ENter your Username">
							
		   				</div>
		   				<div class="form-group row">
		   					
								<input name="txtFname" type="text" class="form-control" placeholder="First Name">
							
		   				</div>
		   				<div class="form-group row">
		   					
		    					<input name="txtLname" type="text" class="form-control" placeholder="Last Name">
		    				
		   				</div>
		   				<div class="form-group row">
		   						
		   						<div class="col-sm-6">
			    					<input name="radioGender" type="radio" class="form-control" value="Male">Male
			    				</div>
			    				<div class="col-sm-6">
			    					<input name="radioGender" type="radio" class="form-control" value="Female">Female
			    				</div>
			  				
		   				</div>
		   				<div class="form-group row">
		   					
		    					<input name="dateBdate" type="date" class="form-control">
		    			
		   				</div>
		   				<div class="form-group row">
		   					
		    					<input name="txtEmail" type="mail" class="form-control" placeholder="Enter Your Email Here">
		    			
		   				</div>
		   				<div class="form-group row">
		   					
			   					<textarea name="txtAddress" class="form-control" placeholder="Enter your Address">
			   					</textarea>
			   		
		   				</div>
		   				<!-- <div class="form-group">
		    				<select name="selectStatus">
		    					<option value="Active">Active</option>
		    					<option value="Deleted">Deleted</option>
		    					<option value="Disabled">Disabled</option>
		   				</div> -->
		   				<div class="form-group row">
		   				
		   						<input type="file" accept="image/*" name="photoProfile" id="file" style="display: none;">
								<p class="kafe-btn kafe-btn-mint-small pull-right btn-sm" style="width:100%"><label for="file" style="cursor: pointer;width:100%;">Select Profile Image</label></p>
		   					
		   				</div>
		   				<button class="kafe-btn kafe-btn-mint btn-block" type="submit" name="submit" style="width:100%; ">Sign Up</button>
		   				<br/>
						<a class="btn btn-dark " href="<?php echo site_url("user/UserC")?>" role="button">Already have an account? Click Here.</a>
						
		  			</form>
		
       		</div><!--/. banner-content -->
      	</div><!-- /.container -->
    </section> 
  
	 <script type="text/javascript">
	 	<?php 
	 		if(isset($error)&& !empty($error))
	 		{
	 			?>
	 			let err="<?php echo $error;?>";
	 			alert(err);
	 			<?php
	 		}
	 	?>
	 </script>
	 
     <!-- ==============================================
	 Scripts
	 =============================================== -->
	<script src="<?php echo base_url()?>resources/user/assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url()?>resources/user/assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>resources/user/assets/js/base.js"></script>

  </body>

</html>
