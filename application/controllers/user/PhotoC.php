<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class PhotoC extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("user/PhotoM","pm");
		$this->load->model("user/UserM","um");
       $this->load->model("user/HomeM","hm");
        
		if(!$this->session->has_userdata("username"))
		{
			redirect("user/UserC");
		}
	}

	public function likePhoto()
	{
		
		$this->pm->likePhoto($this->input->post("photo_id"),$this->session->userdata("user_id"));
		
	}

	public function unlikePhoto()
	{
		$this->pm->unlikePhoto($this->input->post("photo_id"),$this->session->userdata("user_id"));
		
	}

	

	public function loadExplore()
	{
		$sortOption=-1;
		$cats=null;
		if(!empty($this->input->post("btnSearch")))
		{
			$sortOption=$this->input->post("lstSort");

		}
		//$exploreUsers=$this->pm->getUserData($this->session->userdata("user_id"));
		$exploreUsers=$this->pm->getMostFollowedUsers($this->session->userdata("user_id"));
		$photoData=$this->pm->getAllPhotoData($sortOption);

		//print_r($photoData);
		 $reportData=$this->um->getReportData();
		 $category=$this->pm->getCategoryData(); 
		 //print_r($category); 
		$temp=array(
			"exploreUsers"=>$exploreUsers,
			"photoData"=>$photoData,
			"reportData"=>$reportData,
			"category"=>$category
		);
		//print_r($photoData);
		$this->load->view("user/explore.php",$temp);
		
	}
	public function hidePhoto($pid,$aid)
	{
		$this->pm->hidePhoto($pid);
		redirect("user/HomeC/loadPhotos/$aid");
	}
	public function showPhoto($pid,$aid)
	{
		$this->pm->showPhoto($pid);
		redirect("user/HomeC/loadPhotos/$aid");
	}
	public function hidePhoto_default($pid,$aid)
	{
		$this->pm->hidePhoto($pid);
		redirect("user/HomeC/loadProfile");
	}
	public function showPhoto_default($pid,$aid)
	{
		$this->pm->showPhoto($pid);
		redirect("user/HomeC/loadProfile");
	}
	public function deletePhoto($pid,$aid){
		$this->pm->deletePhoto($pid);
		redirect("user/HomeC/loadPhotos/$aid");
	}
	public function deletePhoto_default($pid,$aid){
		$this->pm->deletePhoto($pid);
		redirect("user/HomeC/loadProfile");
	}
	public function upload()
	{
		$filename=$_FILES['imgFile']['name'];
		$caption=$_POST['caption'];
		$pt=$_POST['photo_type'];
		$cropData=json_decode($_POST['cropData']);
		$aid=$_POST["album_id"];
		echo $aid;
		$location=$_SERVER['DOCUMENT_ROOT']."/lyghtgig/resources/user/uploadPhotos/";
		$uploadOk=1;
		$imageFileType=pathinfo($location.$filename,PATHINFO_EXTENSION);
		$valid_extensions=array("jpg","jpeg","png");
		if(!in_array(strtolower($imageFileType),$valid_extensions))
		{
			$uploadOk=0;
		}
		if($uploadOk==0)
		{
			echo $uploadOk;
		}
		else{
			date_default_timezone_set("Asia/Kolkata");
			$newFname=$this->session->userdata("username").date("d_m_y_h_i_s").".".strtolower($imageFileType);
			if(move_uploaded_file($_FILES['imgFile']['tmp_name'],$location.$newFname))
			{
				$im=imagecreatefromjpeg($location.$newFname);
				$im3=imagecreatetruecolor($cropData->width,$cropData->height);
					header("Content-type: image/png");
					imagecopy($im3,$im,0,0,$cropData->x,$cropData->y,$cropData->width,$cropData->height);
					imagepng($im3,$location.$newFname);
					imagedestroy($im3);
					imagedestroy($im);
					$data=array(
						"photo_caption"=>$caption,
						"user_id"=>$this->session->userdata("user_id"),
						"photo_path"=>$newFname,
						"album_id"=>$aid,
						"photo_type"=>$pt
					);
					$this->pm->upload($data);
					echo $uploadOk;

			}
			else{
				echo $uploadOk;
			}
		}
	}


	public function loadContest()
	{
		$competitionData=$this->pm->getCompetitionData();
		$temp=array(
			"competitionData"=>$competitionData
		);
		//print_r($temp);
		$this->load->view("user/contest.php",$temp);
	}

	public function loadContestDetails($contest_id)
	{
		$contestDetails=$this->pm->getContestDetails($contest_id);
		$temp=array(
			"contestDetails"=>$contestDetails,
			"is_a_participant"=>$this->pm->checkParticipant($this->session->userdata('user_id'),$contest_id),
			"photoDetails"=>$this->pm->getContestPhotos($contest_id)
		);
		//print_r($temp["photoDetails"]);
		$this->load->view("user/contestDetails.php",$temp);

	}
	public function addContest()
	{
		if($this->input->post("btnCreate")!="")
		{
			$img=$_FILES['photoCover']['name'];
		copy($_FILES['photoCover']['tmp_name'],$_SERVER['DOCUMENT_ROOT']."/lyghtgig/resources/shared/images/competition_cover/".$img)or die($_FILES['photoCover']['error']);
			$data=array(

			"competition_name"=>$this->input->post("txtCName"),
			"description"=>$this->input->post("txtDescription"),
			"start_date"=>$this->input->post("dateStartDate"),
			"end_date"=>$this->input->post("dateEndDate"),
			"result_date"=>$this->input->post("dateResultDate"),
			"competition_cover_pic"=>$img,
			"user_id"=>$this->session->userdata("user_id")

		);
			$cid=$this->pm->createContest($data);
			redirect("user/PhotoC/loadContestDetails/".$cid);
		}
		else{
			$this->load->view("user/addContest.php");
		}
		
	}
	public function addParticipant()
	{

		if(!$this->pm->checkParticipant($this->session->userdata("user_id"),$this->input->post("contest_id")))
		{
			$data=array(
				"competition_id"=>$this->input->post("contest_id"),
				"user_id"=>$this->session->userdata("user_id")
			);
			$this->pm->addParticipant($data);
		}
		else
		{
			echo "You have already participated in this Contest";
		}
	}
	public function submitPhoto($contest_id)
	{
		$img=$_FILES['photoContestPic']['name'];
		copy($_FILES['photoContestPic']['tmp_name'],$_SERVER['DOCUMENT_ROOT']."/lyghtgig/resources/shared/images/".$img)or die($_FILES['photoContestPic']['error']);
		$data = array(
			"participant_id" =>$this->pm->getParticipantId($this->session->userdata("user_id"),$contest_id),
			"photo_path"=>$img,
			"photo_caption"=>$this->input->post("txtCaption")
		);
		//print_r($data);
		$this->pm->submitPhoto($data);
		redirect("user/PhotoC/loadContestDetails/".$contest_id);
	}
}
