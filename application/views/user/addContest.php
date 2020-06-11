<?php
	$title="Add Contest";
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
				<div class="col-lg-10" style="margin-top: 30px;margin-left: 120px;">
					<div class="edit-profile-container">
						<div class="block-title" style="background: #0fc19e;padding: 1px;padding-left:20px;padding-right:20px;border-radius: 3px;border:2px solid white; ">
							<h2 style="font-family:'Abhaya Libre';color: white;">

							<i class="fa fa-edit"></i>&nbsp;Add Contest Details</h2>
                  			<hr> 
						</div>
						<br>
						<div class="edit-block" style="background-color: #fff;padding: 5px;padding-left:20px;padding-right:20px;border-radius: 3px;border:2px solid #94ecc5;">
							<form method="post" enctype="multipart/form-data" action="<?php echo site_url("user/PhotoC/addContest")?>">
								<div class="row">
			                      	<div class="form-group col-xs-12">
				                        <label for="firstname" style="color:gray;font-size: 20px;font-family:'Abhaya Libre';">Contest Name</label>
				                        <input class="form-control" type="text" name="txtCName" placeholder="Contest Name" value=""/>
			                      	</div>
			                      	
			                    </div>
			                     <div class="row">
			                      	<div class="form-group col-xs-12">
				                        <label style="color:gray;font-size: 20px;font-family:'Abhaya Libre';">Description</label>
				                        <textarea name="txtDescription" class="form-control" rows="4" cols="10" value="" placeholder="Contest Description">
				                        </textarea>
			                      	</div>
			                    </div>
			                    <div class="row">
			                      	<div class="form-group col-xs-12">
			                        	<label style="color:gray;font-size: 20px;font-family:'Abhaya Libre';">Start Date</label>
			                        	<input class="form-control" type="date" name="dateStartDate" placeholder="Select Start Date" value="" />
			                      	</div>
			                    </div>
			                    <div class="row">
			                      	<div class="form-group col-xs-12">
			                        	<label style="color:gray;font-size: 20px;font-family:'Abhaya Libre';">End Date</label>
			                        	<input class="form-control" type="date" name="dateEndDate" placeholder="Select End Date" value="" />
			                      	</div>
			                    </div>
			                   	 <div class="row">
			                      	<div class="form-group col-xs-12">
			                        	<label style="color:gray;font-size: 20px;font-family:'Abhaya Libre';">Result Date</label>
			                        	<input class="form-control" type="date" name="dateResultDate" placeholder="Select Result Date" value="" />
			                      	</div>
			                    </div>	
			                    <div class="row">
			                      	<div class="form-group col-xs-12">
				                        <input type="file" accept="image/*" name="photoCover" id="file" style="display: none;">
										<p class="kafe-btn kafe-btn-mint-small pull-right btn-sm" style="width:100%"><label for="file" style="cursor: pointer;width:100%;">Select Cover Image</label></p>
			                      	</div>
			                    </div>
			                    <div class="row">
                      				<div class="form-group col-xs-12">
				                       <button class="kafe-btn kafe-btn-mint btn-block" type="submit" name="btnCreate" style="color:white;font-size: 20px;font-family:'Abhaya Libre';" value="Submit">Create Contest</button>
				                       
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
  </body>

</html>
