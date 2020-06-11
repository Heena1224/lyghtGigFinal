<?php $title="lyghtGig"
?>
<html lang="en">
  
<head>

	    <!-- ==============================================
		Title and Meta Tags
		=============================================== -->
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title?></title>
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
		  <form method="post" class="form-signin" action="<?php echo site_url("admin/LoginC/validateLogin")?>" enctype="multipart/form-data" style="width:50%;">
		   <h3 class="form-signin-heading">Please sign in</h3>
		   <div class="form-group">
		    <input name="txtUsername" type="text" class="form-control" placeholder="Email">
		   </div>
		   <div class="form-group">
		    <input type="password" class="form-control" name="txtPwd" placeholder="Password">
		   </div>
		   <button class="kafe-btn kafe-btn-mint btn-block" type="submit" name="subm">Sign in</button>
		  </form>
		
       </div><!--/. banner-content -->
      </div><!-- /.container -->
     </section> 
  
	 
	 
     <!-- ==============================================
	 Scripts
	 =============================================== -->
	 <script>
	 	<?php
	 		if(isset($error) && !empty($error))
	 		{
	 			?>
	 				let err="<?php echo $error;?>";
	 				alert(err);
	 			<?php
	 		}
	 	?>
	 </script>
	<script src="<?php echo base_url()?>resources/user/assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url()?>resources/user/assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>resources/user/assets/js/base.js"></script>
  </body>
</html>
