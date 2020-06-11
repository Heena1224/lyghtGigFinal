<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class HomeC extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("user/HomeM","hm");
        $this->load->model("user/UserM","um");
        $this->load->model("user/PhotoM","pm");
        
		if(!$this->session->has_userdata("username"))
		{
			redirect("user/UserC");
		}
	}
	public function index()
	{
        $exploreUsers=$this->pm->getMostFollowedUsers($this->session->userdata("user_id"));
        $postData=$this->um->getPosts($this->session->userdata("user_id"));
        //print_r($exploreUsers);
        $reportData=$this->um->getReportData();
        $temp=array(
            "exploreUsers"=>$exploreUsers,
            "postData"=>$postData,
            "reportData"=>$reportData
        );
		$this->load->view("user/home.php",$temp);
	}
	public function follow($uid,$uname,$isFollowed){
		if($isFollowed==0)
			$this->um->followUser($uid,$this->session->userdata("user_id"));
		if($isFollowed==1)
			$this->um->unfollowUser($uid,$this->session->userdata("user_id"));	
		redirect("user/HomeC/loadProfile/$uname");
	}

	public function loadProfile($uname=null)
	{
        if($uname==null)
        {
            $uname=$this->session->userdata("username");

        }
        $uid=$this->um->fetchUserID($uname);
        if($uid==null)
        {
            redirect("user/HomeC/loadProfile/");
        }
        $userData=$this->um->getUserData($uid);
        $userData->typeData=$this->um->getTypeData($uid);
        $userData->defaultAlbumPhotos=$this->um->getDefaultAlbumPhotos($uid);
        $userData->totalPhotos=$this->um->countPhotos($uid);
       // print_r($userData->defaultAlbumPhotos);
        $albumData=$this->um->getAlbumData($uid);
        $reportData=$this->um->getReportData();

        if($albumData!=null)
        {
          foreach ($albumData as $key) {
                $key->photo=$this->um->getAlbumCover($key->album_id);
            }
        } 
       // print_r($albumData);       
        $temp=array(
         "albumData"=>$albumData,
         "userData"=>$userData,
         "reportData"=>$reportData
        );
        $this->load->view("user/profile.php",$temp);   

    }
		
	public function loadEditProfile()
   {
        $user=$this->um->getUserData($this->session->userdata("user_id"));
        $temp=array(
             "user"=>$user
         );
       //print_r($user);
       $this->load->view("user/editProfile.php",$temp);
   }

   public function reportPhoto()
   {
      $data=array(
        "photo_id"=>$this->input->post("photo_id"),
        "reporter_id"=>$this->session->userdata("user_id"),
        "reportee_id"=>$this->input->post("reportee_id"),
        "reason_id"=>$this->input->post("radioReasons")
      );
    
      $this->um->reportPhoto($data);
      redirect("user/HomeC/loadProfile");
   }

   public function changeEditProfile()
   {
    $data=array(
        "user_fname"=>$this->input->post("txtFname"),
        "user_lname"=>$this->input->post("txtLname"),
        "user_address"=>$this->input->post("txtAddress"),
        "user_description"=>$this->input->post("txtDescription")
    );
   $email=array( 
    "user_email"=>$this->input->post("txtEmail")
    ); 
        
       $this->um->changeEditProfile($this->session->userdata("user_id"),$data,$email);
       //print_r($data);
       redirect("user/HomeC/loadEditProfile");
   }

	public function changePassword()
	{
		if(!empty($this->input->post("btnChangePwd")))
        {

        	$curPwd=$this->input->post("txtCurrent");
            $newPwd=$this->input->post("txtNew");
            $confirmPwd=$this->input->post("txtConfirm");
            //echo $curPwd;
            if($newPwd==$confirmPwd)
            {
                if($this->hm->checkCurrentPwd($curPwd,$this->session->userdata("user_id")))
                {
                    $this->hm->updatePwd($newPwd,$this->session->userdata("user_id"));
                    $error="Password has been updated successfully.Please Login Again with your new password
                    !!";
                    $this->session->unset_userdata("user_id");
                    $this->session->unset_userdata("username");
                    $this->session->unset_userdata("user_profile_pic");
                    
                    $this->session->set_flashdata('error',$error);
                    redirect("user/HomeC");                    
                }
                else
                {
                    $error="Current password entered does not match to the existing password. Please try again.";
                }
            }
            else
            {
                $error="The Re-entered new password does not match. Please try again.";
            }
            $temp=array(
                "error"=>$error
            );
            $this->load->view("user/changePwd.php",$temp);
        }
        else
            {
               // echo "hell";
                $this->load->view('user/changePwd.php');
            }
		}


	public function changeProfilePic()
    {
        if(!empty($this->input->post("btnChangeProfile")))
        {
            $config['upload_path']="./resources/user/uploadPhotos/profile";
            $config['allowed_types']='jpg|png|jpeg';
            $config['max_size']=8000;
            $config['max_width']=2048;
            $config['max_height']=2048;

            $this->load->library('upload',$config);

            if(!$this->upload->do_upload('userProfile'))
            {
                $error=array("error"=>$this->upload->display_errors());
            }
            else
            {
                $t=$this->upload->data('file_name');
                $this->um->updateProfilePic($this->session->userdata("user_id"),$t);
                $this->session->set_userdata("user_profile_pic",$t);
                $error=array("error"=>"Photo uploaded Successfully!!");
            }
            $this->output->delete_cache();
          $this->load->view("user/editProfile.php",$error);
        }
        else
        {
            $this->load->view("user/profile.php"); 
        }   

    }

    public function changeCoverPic()
    {
        if(!empty($this->input->post("btnChangeCover")))
        {
            //$config['image_library'] = 'gd2';
            $config['upload_path']="./resources/user/uploadPhotos/cover";
            $config['allowed_types']='jpg|png|jpeg';
            $config['max_size']=8000;
            $config['create_thumb'] = TRUE;
                
            

            $this->load->library('upload',$config);
           // $this->upload->resize();
            if(!$this->upload->do_upload('userCover'))
            {
                $error=array("error"=>$this->upload->display_errors());
            }
            else
            {
                $t=$this->upload->data('file_name');
                $this->um->updateCoverPic($this->session->userdata("user_id"),$t);
                $error=array("error"=>"Photo uploaded Successfully!!");
            }
            $this->output->delete_cache();
            $this->load->view("user/profile.php",$error);
            redirect("user/HomeC/loadProfile");
        }
        else
        {
            $this->load->view("user/profile.php"); 
        }

    }

    public function loadPhotos($aid)
    {
        $uid=$this->um->fetchAlbumOwner($aid);
        
        if($uid==null)
            redirect("user/HomeC");
            $userData=$this->um->getUserData($uid);
            $albumDetails=$this->um->getAlbumDetails($aid,$uid);
        //echo $albumData->album_title;
        if($albumDetails==null)
        {
            redirect("user/HomeC/loadProfile");
        }
       $albumDetails->photoData=$this->um->getPhotoDetails($aid,$uid);
        //print_r($albumDetails);
        $reportData=$this->um->getReportData();

        $t = array(
            'userData'=>$userData,
            'albumDetails' => $albumDetails,
            'reportData'=>$reportData
        );

        $this->load->view("user/photos.php",$t);
        
    }

    public function postComment()
    {
        $this->um->addComment($this->input->post("photo_id"),$this->input->post("cmnt"),$this->session->userData("user_id"));
        
        //print_r($c);
        //$this->load->view("user/photos.php",$c);
    }
    public function getComments()
    {
        $c=$this->um->getComments($this->input->post("photo_id"));
        echo json_encode($c);
    }
    public function getFollowersData()
    {
        $uid=$this->input->post("user_id");
        $followersData=$this->um->getFollowersData($uid);
        echo json_encode($followersData);   
    }
    public function getFollowingData()
    {
        $uid=$this->input->post("user_id");
        $followingData=$this->um->getFollowingData($uid);
        echo json_encode($followingData);   
    }

    public function editCaption()
    {
        $this->um->editCaption($this->input->post("caption"),$this->input->post("photo_id"));
    }
    public function editAlbumDescription()
    {
        $this->um->editAlbumDescription($this->input->post("newDesc"),$this->input->post("album_id"));
    }
    public function editAlbumTitle()
    {
         $this->um->editAlbumTitle($this->input->post("newTitle"),$this->input->post("album_id"));
    }
    public function deleteComment()
    {
        $this->um->deleteComment($this->input->post("comment_id"));
    }
    public function deleteAlbum($aid)
    {
        $this->um->deleteAlbum($aid);
        redirect("user/HomeC/loadProfile");
    }

   public function editComment()
   {
       $this->um->editComment($this->input->post("comment"),$this->input->post("comment_id"));
   }


   public function loadUpload()
   {
       $albumData=$this->um->getAlbumData($this->session->userdata('user_id'));
       $temp=array(
           "albumData"=>$albumData
       );
        $this->load->view("user/upload.php",$temp);
   }
   public function createAlbum(){
       $data=array(
           "album_title"=>$this->input->post("album_title"),
           "album_description"=>$this->input->post("album_description"),
           "user_id"=>$this->session->userdata("user_id")
       );
       $aid=$this->um->createAlbum($data);
       echo $aid;
   }

    public function logout()
	{
		//$this->session->unset_userdata("admin_id");
		$this->session->unset_userdata("user_id");
		$this->session->unset_userdata("username");
        $this->session->unset_userdata("user_profile_pic");

		$this->session->sess_destroy();
		//$this->load->view("login.php");
		redirect("user/UserC");
	}

}
?>