<?php $title="lyghtGig";
?>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <title><?php echo $title;?></title>
    <?php include_once("topscripts.php")?>

  </head>
<body>

  <div class="loader-bg">
    <div class="loader-bar"></div>
  </div>

  <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
        <?php include_once("header.php")?>
      </div>

      <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
          <?php include_once("nav.php")?>
          <div class="pcoded-content">

            <div class="page-header card">
              <div class="row align-items-end">
                <div class="col-lg-8">
                  <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                      <h5>User Details</h5>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                      <li class="breadcrumb-item">
                      <a href="index.html"><i class="feather icon-home"></i></a>
                      </li>
                      <li class="breadcrumb-item"><a href="#!">Dashboard</a> </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="timeline-nav-bar hidden-sm hidden-xs">
            <div class="row" style="background-image: url('<?=base_url().'resources/user/uploadPhotos/cover/'?><?=$userDetails->user_cover_pic?>'');">
              <div class="col-md-3">
                <div class="profile-info" style="margin-left: 50px;">
                  <img src="<?=base_url().'resources/user/uploadPhotos/profile/'?><?=$userDetails->user_profile_pic?>" alt="" class="img-responsive profile-photo" height=170px width=170px style="border-radius:100px;"/>
                  
                  <hr>
                </div>
              </div>
              <div class="col-md-9" style="" >
                  <h2 style="margin-top: 20px;margin-left:  20px;"><?=$userDetails->user_fname;?>&nbsp;<?=$userDetails->user_lname;?></h3>

                  <h3 class="text-muted" style="margin: 20px 20px 20px 20px;"><?=$userDetails->username;?></h3>
              </div>
              
            </div>
          </div><!--Timeline Menu for Large Screens End-->

          <div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">
      <div class="page-body">
        
        <div class="row">
          <div class="col-sm-12">

            <div class="card">
              <div class="card-header">
                <h5>User Details</h5>
                <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
              </div>
              <div class="card-block">
                
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Cover Picture:</label>
                    <div class="col-sm-10">
                      <img src="<?=base_url().'resources/user/uploadPhotos/cover/'?><?=$userDetails->user_cover_pic?>" alt="" class="img-responsive profile-photo" height=200px width=800px style="opacity: 0.6">
                      <span class="messages"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?=$userDetails->user_description?>" readonly>
                      <span class="messages"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Gender:</label>
                    <div class="col-sm-10">
                      <?php
                        if($userDetails->user_gender=='M')
                        {
                          ?>
                           <input type="text" class="form-control" value="Male" readonly>
                          <?php
                        }
                        else{
                          ?>
                          <input type="text" class="form-control" value="Female" readonly>
                          <?php
                        }
                      ?>
                      <span class="messages"></span>
                    </div>

                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">BirthDate</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" value="<?php echo $userDetails->user_bdate;?>" readonly>
                      <span class="messages"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-sm-2 col-form-label">Verified:</label>
                    <div class="col-sm-10">
                      <?php

                        if($userDetails->is_verified==1)
                        {
                          ?>
                          <label class="label label-success">Verified</label>
                          <?php
                        }
                        else{
                          ?>
                            <label class="label label-default">Not Verified</label><br><br>
                            
                            </a>
                          <?php
                        }
                                  
                      ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                      <?php
                        if($userDetails->user_status=='Enabled')
                        {
                          ?>
                            <label class="label label-inverse-primary">Enabled</label>
                          <?php
                        }
                        else if($userDetails->user_status=='Disabled')
                        {
                          ?>
                            <label class="label label-inverse-warning">Disabled</label>
                          <?php
                        }
                        else{
                          ?>
                            <label class="label label-inverse-danger">Blocked</label>
                          <?php
                        }
                      ?>

                      <span class="messages"></span>
                    </div>
                  </div>
                  
                  
                
              </div>
            </div>
          </div>
        </div>
        
        
      </div>
    </div>
  </div>
</div>

          
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


</div>
</div>
</div>
</div>


  <?php include_once("bottomscripts.php")?>
 
</body>

</html>
