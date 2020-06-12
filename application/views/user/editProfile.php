<?php
	$title="Edit Profile";
?>
<html lang="en">
  
<!-- Mirrored from themashabrand.com/templates/Fluffs/photo_profile_two.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 May 2020 15:30:20 GMT -->
<head>
		<title><?php echo $title?></title>
	    <?php include_once("topscripts.php")?>
	    <style type="text/css">
	    	div.fileinputs {
				position: relative;
			}

			div.fakefile {
				position: absolute;
				top: 0px;
				left: 0px;
				z-index: 1;
			}

			input.file {
				position: relative;
				text-align: right;
				-moz-opacity:0 ;
				filter:alpha(opacity: 0);
				opacity: 0;
				z-index: 2;
			}
		</style>
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
	<section class="profile-two">
	  	<div class="container-fluid">
	   		<div class="row">

				<div class="col-lg-3">
         			<aside id="leftsidebar" class="sidebar">		  
		  				<ul class="list">
           					<li>
								<div class="user-info">
			 						<div class="image">
		      							<a href="#myModal" data-toggle="modal"><img class="img-fluid img-circle" src="<?php echo base_url() ?>resources/user/uploadPhotos/profile/<?php echo $this->session->userdata('user_profile_pic')?>" alt="Image" style="height: 30%;"></a>
			  							</a>
			 						</div>
		     						<div class="detail">
			  							<h4><?php echo $this->session->userdata("username");?></h4>                      
			 						</div>

								</div>
           					</li>                 
          				</ul>
         			</aside>				
				</div><!--/ col-lg-3-->
		
				<div class="col-lg-8" style="margin-top: 30px;margin-left: 20px;">
					<div class="edit-profile-container">
						<div class="block-title" style="background: #0fc19e;padding: 1px;padding-left:20px;padding-right:20px;border-radius: 3px;border:2px solid white; ">
							<h2 style="font-family:'Abhaya Libre';color: white;">

							<i class="fa fa-edit"></i>&nbsp;Edit basic information</h2>
                  			<hr> 
						</div>
						<br>
						<div class="edit-block" style="background-color: #fff;padding: 5px;padding-left:20px;padding-right:20px;border-radius: 3px;border:2px solid #94ecc5;">
							<form method="post" id="frmEP" enctype="multipart/form-data" action="<?php echo site_url("user/HomeC/changeEditProfile")?>">
								<div class="row">
			                      	<div class="form-group col-xs-6">
				                        <label for="firstname" style="color:gray;font-size: 20px;font-family:'Abhaya Libre';">First name</label>
				                        <input class="form-control" type="text" name="txtFname" placeholder="First name" value="<?php echo $user->user_fname; ?>"/>
			                      	</div>
			                      	<div class="form-group col-xs-6">
				                        <label for="lastname" style="color:gray;font-size: 20px;font-family:'Abhaya Libre';">Last name</label>
				                        <input class="form-control" type="text" name="txtLname" placeholder="Last name" value="<?php echo $user->user_lname; ?>" />
			                    	</div>
			                    </div>
			                    <div class="row">
			                      	<div class="form-group col-xs-12">
			                        	<label style="color:gray;font-size: 20px;font-family:'Abhaya Libre';">Email</label>
			                        	<input class="form-control" type="mail" name="txtEmail" placeholder="Enter Email" value="<?php echo $user->user_email; ?>" readonly/>
			                      	</div>
								</div>

			                    <div class="row">
			                      	<div class="form-group col-xs-12">
			                        	<label style="color:gray;font-size: 20px;font-family:'Abhaya Libre';">Username</label>
			                        	<input id="txtUsername" class="form-control" type="text" name="txtUsername" placeholder="Username" value="<?php echo $this->session->userdata("username") ?>" readonly />
			                      	</div>
			                    </div>
			                    <div class="row">
			                      	<div class="form-group col-xs-12">
				                        <label style="color:gray;font-size: 20px;font-family:'Abhaya Libre';">Address</label>
				                        <textarea name="txtAddress" class="form-control" rows="4" cols="10" value=""><?php echo $user->user_address; ?>
				                        </textarea>
			                      	</div>
			                    </div>
			                    <div class="row">
			                      	<div class="form-group col-xs-12">
				                        <label style="color:gray;font-size: 20px;font-family:'Abhaya Libre';">About me</label>
				                        <textarea name="txtDescription" class="form-control" placeholder="Some texts about me" rows="4" cols="50" value=""><?php echo $user->user_description; ?>
				                        </textarea>
			                      	</div>
								</div>
								<div class="row">
									<div class="form-group col-xs-12">
										<input type="text" id="hiddenTypes" name="types" style="display:none;" value="1">
										<label style="color:gray;font-size: 20px;font-family:'Abhaya Libre';">What's your interest?</label>
				                        <span class="autocomplete-select"></span>
									</div>
								</div>
			                    <div class="row">
                      				<div class="form-group col-xs-12">
				                       <button class="kafe-btn kafe-btn-mint btn-block"  id="btnSubmit" type="submit" name="btnChange" style="color:white;font-size: 20px;font-family:'Abhaya Libre';" value="Submit">Edit</button>
				                       
			                      	</div>
                        		</div>
							</form>
						</div>
					</div>
				</div>		
			
       		</div><!--/ row-->	
	 	</div><!--/ container -->
	</section><!--/ profile -->
  
	 <!-- ==============================================
	 Modal Section
	 =============================================== -->
    <div id="typeModal" class="modal fade">
      	<div class="modal-dialog" style="width:30%;">
       		<div class="modal-content">
        		<div class="modal-body">
        			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			 						<span aria-hidden="true">×</span><span class="sr-only">Close</span>
								</button><!--/ button -->
         			<div class="row">
          				
          				<div class="col-md-12 modal-meta">
           					<label style="color:gray;font-size: 20px;font-family:'Abhaya Libre';">Choose Type</label>
       							<select>
       								<option>
       									Photographer
       								</option>
       							</select>
       							<br><br>
       						 <button class="kafe-btn kafe-btn-mint btn-block" type="submit" name="btnChangePwd" style="color:white;font-size: 16px;font-family:'Abhaya Libre';" value="Submit">Change</button>
          				</div><!--/ col-md-4 -->
		  
         			</div><!--/ row -->
        		</div><!--/ modal-body -->
		
       		</div><!--/ modal-content -->
      	</div><!--/ modal-dialog -->
    </div><!--/ modal -->	 
	
	 <div id="myModal" class="modal fade" id="small-M">
      	<div class="modal-dialog modal-sm" style="width:35%;height:25%;">
       		<div class="modal-content">
        		<div class="modal-body">
		
         			<div class="row">
		 
          				<div class="col-md-12 modal-meta">
          					<center>
           					<form id="main" method="post" action="<?php echo site_url("user/HomeC/changeProfilePic")?>" enctype="multipart/form-data" style="align-content: center;">
									<img src="<?=base_url()?>resources/user/uploadPhotos/profile/<?=$this->session->user_profile_pic?>" class="col-sm-12" style="width:90%;height:90%;padding-left: 40px;">

									<br><br>
									<input type="file" class="kafe-btn kafe-btn-mint btn-block" name="userProfile" style="width:90%;height:10%;align-self: center;">
									<i class="fa fa-camera text-muted"></i>
									<br>
									<button type="submit" name="btnChangeProfile" class="kafe-btn kafe-btn-mint btn-block" value="Submit" style="width:90%;height:10%;align-self: center;">Change Picture</button>

										
										
									
								</form>
							</center>
          				</div><!--/ col-md-4 -->
		  
         			</div><!--/ row -->
        		</div><!--/ modal-body -->
		
       		</div><!--/ modal-content -->
      	</div><!--/ modal-dialog -->
    </div><!--/ modal -->   
     <!-- ==============================================
	 Scripts
	 =============================================== -->
	<?php include_once("bottomscripts.php")?>
	<script src="<?=base_url()?>resources/shared/bundle.min.js"></script>
	<script>
		var customIcon = document.createElement('img');
		customIcon.src = '<?=base_url()?>resources/shared/icon.svg';
		var customIconMulti = new SelectPure(".autocomplete-select", {
		options: [
			<?php
				if($typeData!=null)
				{
					foreach($typeData as $key)
					{
						?>
						{
							label: "<?=$key->type_name?>",
							value: "<?=$key->type_id?>",
						},
						<?php
					}
				}	
			?>
		],
		value:[
			<?php
				if($curTypeData!=null)
				{
					foreach($curTypeData as $key)
					{
						?>
						"<?=$key->type_id?>",
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
		$("#frmEP").submit(function(){
			$("#hiddenTypes").val(customIconMulti.value());
			//alert($("#hiddenTypes").val());
		});

	</script>	
<script>
	<?php
		if(isset($error) && !empty($error))
		{
			?>
			alert("<?=$error?>");
			<?php
		}
	?>
	</script>
  </body>

</html>
