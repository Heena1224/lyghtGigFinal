<?php $title="Upload";
?>
<html lang="en">

<head>
		<title><?=$title;?></title>
	    <?php include_once("topscripts.php")?>
		<link rel="stylesheet" href="<?=base_url()?>resources/user/assets/css/cropper.css">
		<style>
			.container {
			margin: 20px auto;
			max-width: 640px;
			}

			img {
			max-width: 100%;
			}
			.preview {
				overflow: hidden;
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
	 <section class="upload">
	  <div class="container" style="max-width:1000px;">
		<form id="frmUploadPhoto" enctype="multipart/form-data" method="post">	
	   <div class="row">
	   	<div class="col-lg-12 row">
			<div class="col-lg-8">
			<h1 style="font-family: 'Abhaya Libre';color:grey; ">Cropper with fixed crop box</h1>
				<div>
				<img id="image" src="<?=base_url()?>resources/shared/images/picture.jpg" alt="Picture">
				</div>
			</div>
			<div></div>
			<div class="col-lg-4">
			<div class="preview">
			</div>
			</div>
		</div>
		<div class="col-lg-12">
			<input type="file" accept="image/*" name="image" id="file" style="display: none;" onchange="loadFile(event)">
			<p class="kafe-btn kafe-btn-mint-small pull-right btn-sm" style="width:100%"><label for="file" style="cursor: pointer;width:100%;">Select Image</label></p>		   
		</div>
		<div class="col-lg-12">
			<select id="albumDropdown" style="border-radius: 5px;background-color:#f4f4f4;padding:2px 2px 2px 15px;font-family: Rubik;border:none;height: 7%;font-size:20px;margin-bottom: 10px;margin-left:10px;" name="lstSort">

				<option value="-1">Select Album</option>
				<?php
					if($albumData!=null)
					{
						foreach($albumData as $key)
						{
							?>
							<option value="<?=$key->album_id?>"><?=$key->album_title?></option>
							<?php
						}
					}
				?>
			</select>
			<a style="color:black;border:2px solid black;padding:5px;border-radius:3px;"  href="#createAlbumModal" data-toggle="modal">Create New Album <i class="fa fa-plus"></i></a>
		</div>
		<div class="col-lg-12">
				<input type="radio" name="radType" value="hidden"><span style="font-size: 22px;font-family: 'Abhaya Libre';margin-right: 80px;">Add as a private photo(No one can see it except for you)</span>
				<input type="radio" name="radType" value="public" checked><span style="font-size: 22px;font-family: 'Abhaya Libre';">Add as a public photo</span>
		</div>
	    <div class="col-lg-12">  	
	     <div class="box">			
		   <textarea class="form-control no-border" id="txtCap" rows="3" placeholder="Caption here..." style="font-size: 20px;"></textarea>
						
		  <div class="box-footer clearfix">
		   <button type="submit" class="kafe-btn kafe-btn-mint-small pull-right btn-sm" style="width: 100%;" name="btnUpload">Upload</button>
		   
		  </div>
		 </div>	
		 
		</div>
	   </div>
		</form>
	  </div><!--/ container -->
	 </section>		
     <!-- ==============================================
	 Scripts
	 =============================================== -->
	 <div id="createAlbumModal" class="modal fade">
      	<div class="modal-dialog" style="width:35%;">
       		<div class="modal-content">
        		<div class="modal-body">
         			<div class="card">
						<div class="card-block">
							<div class="modal-meta-top">
				 				<center><h2 style="font-family: 'Abhaya Libre';color: grey">Create New Album</h2></center>
	            			</div>
									
							<div class="form-group row" style="margin: 5px 20px 5px 20px;">
								<input class="form-control" type="text" id="txtAlbumTitle" placeholder="Album Title...">
								<textarea rows="5" cols="20" class="form-control" id="txtAlbumDescription" placeholder="Album Description..." required></textarea>
								<button id="btnCreateAlbum" class="kafe kafe-btn-mint-small" value="Submit" style="border-radius: 6px; width:100%;height: 10%; font-size: 14px;">Create</button>
								</center>
							</div>
						</div>
					</div>
        		</div><!--/ modal-body -->
       		</div><!--/ modal-content -->
     	</div><!--/ modal-dialog -->
    </div><!--/ modal -->	
	<?php include_once("bottomscripts.php")?>
	<script src="<?=base_url()?>resources/user/assets/js/cropper.js"></script>
	<script>

		    function each(arr, callback) {
				var length = arr.length;
				var i;

				for (i = 0; i < length; i++) {
					callback.call(arr, arr[i], i, arr);
				}

				return arr;
			}	
			var image = document.querySelector('#image');
		var previews = document.querySelectorAll('.preview');
      	var previewReady = false;      
		var cropper = new Cropper(image, {
			dragMode: 'move',
			aspectRatio: 10 / 9,
			autoCropArea: 0.65,
			restore: false,
			guides: false,
			center: false,
			highlight: false,
			cropBoxMovable: false,
			cropBoxResizable: false,
			toggleDragModeOnDblclick: false,
			ready: function () {
            var clone = this.cloneNode();

            clone.className = '';
            clone.style.cssText = (
              'display: block;' +
              'width: 100%;' +
              'min-width: 0;' +
              'min-height: 0;' +
              'max-width: none;' +
              'max-height: none;'
            );

            each(previews, function (elem) {
              elem.appendChild(clone.cloneNode());
            });
            previewReady = true;
          },

          crop: function (event) {
            if (!previewReady) {
              return;
            }

            var data = event.detail;
            var cropper = this.cropper;
            var imageData = cropper.getImageData();
            var previewAspectRatio = data.width / data.height;
			console.log(cropper.getData());
            each(previews, function (elem) {
              var previewImage = elem.getElementsByTagName('img').item(0);
              var previewWidth = elem.offsetWidth;
              var previewHeight = previewWidth / previewAspectRatio;
              var imageScaledRatio = data.width / previewWidth;

              elem.style.height = previewHeight + 'px';
              previewImage.style.width = imageData.naturalWidth / imageScaledRatio + 'px';
              previewImage.style.height = imageData.naturalHeight / imageScaledRatio + 'px';
              previewImage.style.marginLeft = -data.x / imageScaledRatio + 'px';
              previewImage.style.marginTop = -data.y / imageScaledRatio + 'px';
            });
          },
		});
		let loadFile=function(event)
		{
			let image=document.getElementById("image");
                image.src=URL.createObjectURL(event.target.files[0]);
			if(cropper)
			{
				cropper.destroy();
			}
      		previewReady = false;      
			cropper = new Cropper(image, {
			dragMode: 'move',
			aspectRatio: 10 / 9,
			autoCropArea: 0.65,
			restore: false,
			guides: false,
			center: false,
			highlight: false,
			cropBoxMovable: false,
			cropBoxResizable: false,
			toggleDragModeOnDblclick: false,
			ready: function () {
            var clone = this.cloneNode();

            clone.className = '';
            clone.style.cssText = (
              'display: block;' +
              'width: 100%;' +
              'min-width: 0;' +
              'min-height: 0;' +
              'max-width: none;' +
              'max-height: none;'
			);
			$(".preview img").remove();
            each(previews, function (elem) {
              elem.appendChild(clone.cloneNode());
            });
            previewReady = true;
          },

          crop: function (event) {
            if (!previewReady) {
              return;
            }

            var data = event.detail;
            var cropper = this.cropper;
            var imageData = cropper.getImageData();
            var previewAspectRatio = data.width / data.height;

            each(previews, function (elem) {
              var previewImage = elem.getElementsByTagName('img').item(0);
              var previewWidth = elem.offsetWidth;
              var previewHeight = previewWidth / previewAspectRatio;
              var imageScaledRatio = data.width / previewWidth;

              elem.style.height = previewHeight + 'px';
              previewImage.style.width = imageData.naturalWidth / imageScaledRatio + 'px';
              previewImage.style.height = imageData.naturalHeight / imageScaledRatio + 'px';
              previewImage.style.marginLeft = -data.x / imageScaledRatio + 'px';
              previewImage.style.marginTop = -data.y / imageScaledRatio + 'px';
            });
          },
		});
		};
		$("#frmUploadPhoto").submit(function(e){
			e.preventDefault();
			let cropData=cropper.getData();
			let formData=new FormData();//FormData is basically a class object..every form element stores its data based on this FormData prototype
			if($("#file")[0].files.length>0)			
			{
				let files=$("#file")[0].files[0];
				let size=files.size;
				let photoType = $("input[name='radType']:checked"). val()
				formData.append('imgFile',files);//vishalzyz.doors=4 vishalxyz.append('doors',4)
				formData.append('caption',$("#txtCap").val());
				formData.append('cropData',JSON.stringify(cropData));
				formData.append('album_id',$("#albumDropdown").val());
				formData.append('photo_type',photoType);
				if((Math.round(size/1024))<5120)
				{
					$.ajax({
						url: '<?=site_url("user/PhotoC/upload")?>',
						type: 'post',
						data: formData,
						contentType: false,
						processData: false,
						success: function(response){
							if(response != 0){
								alert("Image uploaded successfully.!");
								window.location.href = "<?=site_url('user/HomeC/loadProfile')?>";
							}else{
								alert("Can not upload image. Try again.");
							}
						},
					});				
				}
				else
				{
					alert("Image is to big. Image size should be less then 5MB");
				}

			}
			else{
				alert("Please select image before uploading.");
			}

			
		});
		$("#btnCreateAlbum").click(function(){
			let at=$("#txtAlbumTitle").val();
			let ad=$("#txtAlbumDescription").val();
			$.ajax({type:'POST', url: "<?= site_url("user/HomeC/createAlbum/")?>",data:{album_title:at,album_description:ad}, success: function(result){
				$('#albumDropdown').append($("<option></option>").attr("value", result).text(at));
				$("#createAlbumModal").modal('toggle');
			}});

		});


	</script>
	<!-- JQuery -->

  </body>

</html>
