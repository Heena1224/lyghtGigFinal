<?php $title="My Contests";
?>
<html lang="en">

<head>
		<title><?= $title?></title>
	    <?php include_once("topscripts.php")?>
		<style type="text/css">
			.explorebox:hover{
				opacity: 0.4;
				border:3px black solid;
			}
		</style>
  </head>

<body>
	<?php include_once("header.php")?>
	<?php include_once ("nav.php");?>
	 <!-- ==============================================
	 Home Menu Section
	 =============================================== -->	
<section class="details">
	  <div class="container">
	   <div class="row">
	    <div class="col-lg-12">
		 
          <div class="details-box row">
		   <div class="col-lg-12">
           <div class="content-box">
                <?php
                    if($contestData!=null)
                    {
                        ?>
                            <select id="dropdownContest"  style="border-radius: 5px;background-color:#f4f4f4;padding:2px 2px 2px 15px;font-family: Rubik;border:none;height: 7%;font-size:20px;margin-bottom: 10px;margin-left:10px;">
                                <option value="-1">Select contest</option>
                                <?php
                                    foreach($contestData as $key)
                                    {
                                        ?>
                                        <option value="<?=$key->competition_id?>"><?=$key->competition_name?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        <?php
                    }
                    else echo "You have not created any contests yet.!";
                ?>
           </div><!--/ media -->
		   </div> 
          </div><!--/ details-box -->
          <div class="details-box row">
		   <div class="col-lg-12">
           <div class="content-box" id="contestDetails">
                
           </div><!--/ media -->
		   </div> 
          </div>
		</div>
	   </div>
	  </div><!--/ container -->
	 </section><!--/home-menu -->	
     <?php
        if($contestData!=null)
        {
            $en=json_encode($contestData);
        }
    ?>

	 <!-- ==============================================
	 News Feed Section
	 =============================================== --> 

	<section class="newsfeed">
	  	<div class="container">
	  		
	   		<div class="row" id="loadingContainer">

	   		</div><!--/ row -->
	   
	  	</div><!--/ container -->
	</section><!--/ newsfeed -->
  
	 <!-- ==============================================
	 Modal Section
	 =============================================== -->
     <div id="myModal" class="modal fade">
      	<div class="modal-dialog">
       		<div class="modal-content">
        		<div class="modal-body">
         			<div class="row">
          				<div class="col-lg-12 modal-image">
           					<center><img class="img-responsive" src="" id="picture"/></center><br>
           					<center>Submission ID: <span style="color:black;" id="sub_id"></span></center><br>
                            <center>Submitted By: <span style="color:black;" id="username"></span></center><br>
                            <center>Submission Date: <span style="color:black;" id="sub_date"></span></center><br>	
           					<center>Description:<strong><span id="description"></span></strong></center><br>
           					
          				</div><!--/ col-md-8 -->
         			</div><!--/ row -->
        		</div><!--/ modal-body -->
       		</div><!--/ modal-content -->
     	</div><!--/ modal-dialog -->
    </div><!--/ modal -->	 
    <div id="addWinner" class="modal fade">
      	<div class="modal-dialog" style="width:35%;">
       		<div class="modal-content">
        		<div class="modal-body">
         			<div class="card">
						<div class="card-block">
							<div class="modal-meta-top">
				 				<center><h2>Add Winners</h2></center>
	            			</div>
									
							<div class="form-group row" style="margin: 5px 20px 5px 20px;">
								<form method="post" id="frmAdd" action="<?=site_url('user/HomeC/addWinners')?>">
                                <input type="text" class="form-control" id="winner" name="txtWinner" placeholder="Enter Submission ID of Winner" required>
                                <br>
                                <input type="text" class="form-control" id="runner" name="txtRunner" placeholder="Enter Submission ID of RunnerUp" required>
                                <br>
                                <span>*:You can see submission Id by clicking on any submitted photos</span>
                                <input type="text" style="display:none;" id="hiddencid" name="txtCid">
                                <button type="submit" id="btnAddWinner" class="kafe kafe-btn-mint-small" value="Submit" style="border-radius: 6px; width:30%;height: 10%; font-size: 14px;">Anonunce</button>
                                </form>
                                </center>
							</div>
						</div>
					</div>
        		</div><!--/ modal-body -->
       		</div><!--/ modal-content -->
     	</div><!--/ modal-dialog -->
    </div><!--/ modal -->

    <?php include_once("bottomscripts.php")?>
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
    <script>
    let cd=JSON.parse('<?=$en?>');
    $("#dropdownContest").change(function(){
        let curVal=$(this).val();
        $("#loadingContainer").html("");
        if(curVal!=-1)
        {
            $.each(cd,function(idx,obj){
                if(obj.competition_id==curVal)
                {
                    output="<h1 style='font-family:'Abhaya Libre';color:#0fc19e;'>"+obj.competition_name+"</h1>";
                    output+="<p><h3 style='font-family:'Abhaya Libre';color:grey;'>"+obj.description+"</h3>";
                    output+="<h3 style='font-family:'Abhaya Libre';color:grey;'>Held by:";
                    output+="<h3 style='font-family:'Abhaya Libre';color:grey;'><i class='fa fa-clock'></i>&nbsp;Start Date:&nbsp;<b>"+obj.start_date+"</b></h3>";
                    output+="<h3 style='font-family:'Abhaya Libre';color:grey;'><i class='fa fa-clock'></i>&nbsp;End Date:&nbsp;<b>"+obj.end_date+"</b></h3>";
                    output+="<h3 style='font-family:'Abhaya Libre';color:grey;'><span>Total Participants:"+obj.totalParticipants+"</span></h3>";
                    output+="<h3 style='font-family:'Abhaya Libre';color:grey;'><span>Total Submissions:"+obj.totalSubmissions+"</span></h3>";
                    output+="<button class='kafe-btn kafe-btn-mint-small pull-right btn-sm viewParticipants' style='width: 100%;height: 50px;font-size:24px;font-family:'Abhaya Libre';' data-cid='"+obj.competition_id+"'>View Participants</button><br><br><br>";
                    output+="<button class='kafe-btn kafe-btn-mint-small pull-right btn-sm viewSubmissions' style='width: 100%;height: 50px;font-size:24px;font-family:'Abhaya Libre';' data-cid='"+obj.competition_id+"'>View Submissions</button><br><br><br>";
                    if(obj.winner_id==null || obj.runner_id==null)
                    {
                        output+="<a href='#addWinner' class='addwin' data-toggle='modal' data-cid='"+obj.competition_id+"'><button class='kafe-btn kafe-btn-mint-small pull-right btn-sm' style='width: 100%;height: 50px;font-size:24px;font-family:'Abhaya Libre';'>Add Winners</button></a>";
                    
                    }
                    else
                    {
                        output+="<p class='kafe-btn kafe-btn-mint-small pull-right btn-sm' style='width: 100%;height: 50px;font-size:24px;font-family:'Abhaya Libre';'>Winners Have Already Been selected.!</p>";
                    
                    }
                    $("#contestDetails").html(output);

                }
            });
        }
    });
    $(document).on('click',"button.viewParticipants",function(){
        output="";
        let curVal=$(this).data("cid");
        $.each(cd,function(idx,obj){
            if(obj.competition_id==curVal)
            {
                $.each(obj.participantData,function(idx2,pdata){
                    output+="<div class='col-lg-2'>";
                    output+="<div class='suggestion-box full-width'>";
                    output+="<div class='suggestions-list'>";
                    output+="<div class='suggestion-body'>";
                    output+="<div class='name-box' style='text-align:center;'>";
                    output+="<center><a href='"+"<?=site_url('user/HomeC/loadProfile/')?>"+pdata.username+"'><h4 style='text-align:center;font-size:16px;'>@"+pdata.username+"</h4></a></center>";
                    output+="</div></div></div></div></div>";
                    $("#loadingContainer").html(output);

                });
            }
                
        });
    });
    $(document).on('click',"button.viewSubmissions",function(){
        output="";
        let curVal=$(this).data("cid");
        let  f=0;
        $.each(cd,function(idx,obj){
            if(obj.competition_id==curVal)
            {
                $.each(obj.participantData,function(idx2,pdata){
                    if(pdata.submissionData!=null)
                    {
                        f=1;
                        let url="\'<?=base_url()?>/resources/shared/images/"+pdata.submissionData.photo_path+"\'";
                        output+="<div class='col-lg-4'>";
                        output+="<div class='cardbox-item'>";
                        output+="<a href='#myModal' data-toggle='modal' class='image submission' data-subid='"+pdata.submissionData.submission_id+"' data-username='"+pdata.username+"' data-img='"+pdata.submissionData.photo_path+"' data-desc='"+pdata.submissionData.photo_caption+"' data-subdate='"+pdata.submissionData.submission_date_time+"'>";
                        output+='<div class="explorebox" style="background: linear-gradient( rgba(34,34,34,0.2), rgba(34,34,34,0.2)),url('+url+') no-repeat; background-size: cover;background-position: center center;-webkit-background-size: cover;-moz-background-size: cover;o-background-size: cover;">';
                        output+='<div class="explore-top"><div class="explore-like"><span style="color:black;font-size:16px">Submission ID: '+pdata.submissionData.submission_id+'</span></div></div>';
                        output+="</div></a></div></div></div>";
                        $("#loadingContainer").html(output);
                    }
                });   
            }
        });
        if(f==0)
        {
            $("#loadingContainer").html("<h3>No photos submitted yet.</h3>");
        }
    });

    $(document).on('click',"a.submission",function(){
        $("#myModal #sub_id").text($(this).data("subid"));
        $("#myModal #picture").attr("src","<?= base_url()?>resources/shared/images/"+$(this).data("img"));
		$("#myModal #description").text($(this).data("desc"));
        $("#myModal #username").html("<a href='"+"<?=site_url('user/HomeC/loadProfile/')?>"+$(this).data("username")+"' style='color:black;'>@"+$(this).data("username")+"<a>");
        $("#myModal #sub_date").text($(this).data("subdate"));
        
    });
    $(document).on('click',"a.addwin",function(){
        let cid=$(this).data("cid");
        $("#hiddencid").val(cid);
        alert($("#hiddencid").val());
    });
    $("#frmAdd").submit(function(e){
        //alert();
        let win=$("#winner").val();
        let run=$("#runner").val();
        if(!($.isNumeric(win) && $.isNumeric(run)))
        {
            alert("Enter Valid Submission ID");
            e.preventDefault();
        }
        
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

		  									
										<!--/ cardbox-heading -->
										
											
	
											 
														  
														  
												 





</div>