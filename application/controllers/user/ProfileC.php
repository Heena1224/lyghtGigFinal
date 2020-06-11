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
        
		if(!$this->session->has_userdata("username"))
		{
			redirect("user/UserC");
		}
	}
	public function index()
	{
		$this->load->view("user/home.php");
	}


	public function loadProfile()
	{
		$userData=$this->um->getUserInfo($this->session->userdata("user_id"));
       
        
        $albumData=$this->um->getAlbumData($this->session->userData("user_id"));
        if($albumData!=null)
        {
          foreach ($albumData as $key) {
                $key->photo=$this->um->getAlbumCover($key->album_id);
            }
            $temp=array(
             "albumData"=>$albumData,
             "userData"=>$userData
            );
            $this->load->view("user/profile.php",$temp);   
        }        
        else
        {
           echo "error";
        }

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
        $albumDetails=$this->um->getAlbumDetails($aid,$this->session->userData("user_id"));
        //echo $albumData->album_title;
       $albumDetails->photoData=$this->um->getPhotoDetails($aid,$this->session->userData("user_id"));
        //print_r($albumDetails);
        $t = array(
            'albumDetails' => $albumDetails,
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

    public function editCaption()
    {
        $this->um->editCaption($this->input->post("caption"),$this->input->post("photo_id"));
    }
    public function deleteComment()
    {
        $this->um->deleteComment($this->input->post("comment_id"));
    }

   public function editComment()
   {
       $this->um->editComment($this->input->post("comment"),$this->input->post("comment_id"));
   }




   

}
?>