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
   	<section class="login" style="background:none;">
      	<div class="container">
       		<div class="banner-content" style="width: 100%;">
		 		<h1><i class="fa fa-camera"></i><?php echo $title;?></h1>
		  			<form method="post" id="frmSignIn" class="form-signin" enctype="multipart/form-data" action="<?php echo site_url("user/UserC/addUser")?>" style="max-width:100%;">
		   				<h3 class="form-signin-heading">Please register</h3>
		   				<div class="form-group row">
		   					<label class="col-sm-4 col-form-label">Username:</label>
		   					<div class="col-sm-8">
								<input name="txtUsername" type="text" class="form-control" placeholder="User Name" required>
							</div>
		   				</div>
		   				<div class="form-group row">
		   					<label class="col-sm-4 col-form-label">First Name:</label>
		   					<div class="col-sm-8">
								<input name="txtFname" type="text" class="form-control" placeholder="First Name" required>
							</div>
		   				</div>
		   				<div class="form-group row">
		   					<label class="col-sm-4 col-form-label">Last Name:</label>
		   					<div class="col-sm-8">
		    					<input name="txtLname" type="text" class="form-control" placeholder="Last Name" required>
		    				</div>
		   				</div>
		   				<div class="form-group row">
		   					<label class="col-sm-4 col-form-label">Gender</label>
		   					<div class="col-sm-8 row">
		   						<div class="col-sm-6">
			    					<input name="radioGender" type="radio" class="form-control" value="Male" required>Male
			    				</div>
			    				<div class="col-sm-6">
			    					<input name="radioGender" type="radio" class="form-control" value="Female">Female
			    				</div>
			    			</div>
		   				</div>
		   				<div class="form-group row">
		   					<label class="col-sm-4 col-form-label">Birthdate:</label>
		   					<div class="col-sm-8">
		    					<input name="dateBdate" type="date" class="form-control" required>
		    				</div>
		   				</div>
		   				<div class="form-group row">
		   					<label class="col-sm-4 col-form-label">Email:</label>
		   					<div class="col-sm-8">
		    					<input name="txtEmail" id="email" type="mail" class="form-control" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$">
		    				</div>
		   				</div>
		   				<div class="form-group row">
		   					<label class="col-sm-4 col-form-label">Address:</label>
		   					<div class="col-sm-8">
			   					<textarea name="txtAddress" class="form-control" placeholder="Address" required>
			   					</textarea>
			   				</div>
		   				</div>
		   				<!-- <div class="form-group">
		    				<select name="selectStatus">
		    					<option value="Active">Active</option>
		    					<option value="Deleted">Deleted</option>
		    					<option value="Disabled">Disabled</option>
		   				</div> -->
		   				<div class="form-group row">
		   					<label class="col-sm-4 col-form-label">Profile Pic:</label>
		   					<div class="col-sm-8">
		   						<input type="file" name="photoProfile" class="form-control">
		   					</div>
		   				</div>
		   				<button class="kafe-btn kafe-btn-mint btn-block" type="submit" name="subm">Sign Up</button>
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
	<script>
			/*$("#frmSignIn").submit(function(e){
				var VAL = $("#email").val();
				alert(VAL);

				var email = new RegExp("/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i");

				if (email.test(VAL)) {

				}
				else{
					alert("Enter a valid email.!");
					return false;
				}
			});*/
	</script>
  </body>

</html>
