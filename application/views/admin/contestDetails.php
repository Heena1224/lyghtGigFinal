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

            
          <div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">
      <div class="page-body">
        
        <div class="row">
          <div class="col-sm-12">

            <div class="card">
              <div class="card-header">
                <h5>Contest Details</h5>
                <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
              </div>
              <div class="card-block">
                
                  <div class="form-group row">
                    
                    <div class="col-sm-12">
                      <img src="<?=base_url().'resources/shared/images/competition_cover/'?><?=$contestDetails->competition_cover_pic?>" alt="" class="img-responsive profile-photo" height=400px width=1000px style="opacity: 0.8">
                      <span class="messages"></span>
                    </div>
                  </div>
                    <div class="form-group row">
                     <label class="col-sm-2 col-form-label">Held By:</label>
                    <div class="col-sm-10">
                       <?php
                        if($contestDetails->user_id!=null)
                        {
                          ?>
                            <input type="text" class="form-control" value="<?php echo $contestDetails->username;?>" readonly>
                          <?php
                        }
                        else{
                          ?>
                            
                              <input type="text" class="form-control" value="LyghtGig" readonly>
                          <?php
                        }
                      ?>
                      
                      <span class="messages"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                      <textarea  row=10 cols=25 class="form-control" value="" readonly><?=$contestDetails->description?></textarea> 
                      <span class="messages"></span>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Start Date</label>
                    <div class="col-sm-10">

                      <input type="text" class="form-control" value="<?php echo $contestDetails->start_date;?>" readonly>
                      <span class="messages"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">End Date</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $contestDetails->end_date;?>" readonly>
                      <span class="messages"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Result Date</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $contestDetails->result_date;?>" readonly>
                      <span class="messages"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-sm-2 col-form-label">Winner</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $contestDetails->winner_id;?>" readonly>
                      <span class="messages"></span>
                    </div>
                  </div>
                    <div class="form-group row">
                     <label class="col-sm-2 col-form-label">Runner</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $contestDetails->runner_id;?>" readonly>
                      <span class="messages"></span>
                    </div>
                    </div>
                    <div class="form-group row">
                     <label class="col-sm-2 col-form-label">Total Participants</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $contestDetails->totalParticipants;?>" readonly>
                      <span class="messages"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-sm-2 col-form-label">Total Photos</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $contestDetails->totalPhotos;?>" readonly>
                      <span class="messages"></span>
                    </div>
                  </div>
                  </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                      <a class="mytooltip tooltip-effect-8" data-placement="bottom" href="<?= site_url("admin/ContestC/getParticipantsData/").$contestDetails->competition_id?>">
                      <button type="submit" name="btnChangePwd" class="btn btn-primary m-b-0" style="width: 45%;" value="Submit">View Participants</button><span class="tooltip-content2"><i class="fa fa-users"></i></span></a>
                      <a class="mytooltip tooltip-effect-8"href="<?= site_url("admin/ContestC/getContestPhotos/").$contestDetails->competition_id?>">
                      <button type="submit" name="btnChangePwd" class="btn btn-primary m-b-0" style="width: 45%;" value="Submit">View Photos</button><span class="tooltip-content2"><i class="fa fa-camera"></i></span></a>
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
