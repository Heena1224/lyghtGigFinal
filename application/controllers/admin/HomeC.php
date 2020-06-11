<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeC extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata("admin_username"))
		{
			redirect("admin/LoginC");
		}
		$this->load->model("admin/HomeM","hm");

	}
	public function index()
	{
        $temp = array(
            'users' =>$this->hm->getUserStatus()
        );
        //print_r($temp);
		$this->load->view("admin/home.php",$temp);
	}
        /*  =======
        Load Users====*/
	public function loadUser()
	{
		$this->load->view("admin/user.php");
	}

    
     
    public function showUser()
    {

        $userdata=$this->hm->displayUser();
        if($userdata!=null)
        {
            $temp=array(
                "user"=>$userdata
            );
        }
        else
        {
            $temp=array(
                "error"=>"Query returned null data!"
            );
        }
        $this->load->view("admin/user.php",$temp);
    }
    public function showMoreDetails($uid)
    {
        $temp=array(
            "userDetails"=>$this->hm->getUserData($uid)
        );
        //print_r($temp["contestDetails"]);
        $this->load->view("admin/userProfile.php",$temp);
    }
    public function changeUserStatus($uid,$newStatus)
    {
        if($newStatus=="Blocked")
        {
            $userdata=$this->hm->getUserData($uid);
            $this->load->library('email');

            $config['protocol']    = 'smtp';
            $config['smtp_host']    = 'ssl://smtp.gmail.com';
            $config['smtp_port']    = '465';
            $config['smtp_timeout'] = '7';
            $config['smtp_user']    = 'vishalrana.jpdawar@gmail.com';
            $config['smtp_pass']    = 'rvprana9894999';
            $config['charset']    = 'utf-8';
            $config['newline']    = "\r\n";
            $config['mailtype'] = 'html'; // or html
            $config['validation'] = TRUE; // bool whether to validate email or not      

            $this->email->initialize($config);

            $this->email->from('vishalrana.jpdawar@gmail.com', 'lyghtGig');
            $this->email->to($userdata->user_email);
            

            $this->email->subject('Blocking your Account');
            $this->email->message('Hello <strong>'.$userdata->username.'</strong>, <br>Sorry to inform you that your account has been blocked due to violation of community guidelines and websites protocols.');
            $this->email->send();
            //echo $this->email->print_debugger();
        }
        $this->hm->changeUserStatus($uid,$newStatus);
        redirect("admin/HomeC/showUser");

    }

    public function verifyUser($uid)
    {
            $userdata=$this->hm->getUserData($uid);
            $this->load->library('email');

            $config['protocol']    = 'smtp';
            $config['smtp_host']    = 'ssl://smtp.gmail.com';
            $config['smtp_port']    = '465';
            $config['smtp_timeout'] = '7';
            $config['smtp_user']    = 'vishalrana.jpdawar@gmail.com';
            $config['smtp_pass']    = 'rvprana9894999';
            $config['charset']    = 'utf-8';
            $config['newline']    = "\r\n";
            $config['mailtype'] = 'html'; // or html
            $config['validation'] = TRUE; // bool whether to validate email or not      

            $this->email->initialize($config);

            $this->email->from('vishalrana.jpdawar@gmail.com', 'lyghtGig');
            $this->email->to($userdata->user_email);
            

            $this->email->subject('Verifed User');
            $this->email->message('Hello <strong>'.$userdata->username.'</strong>, <br>Congratulations!<br>We are happy to announce you as a verified user of lyghtGig!<br><strong>lyghtGig</strong> ');
            $this->email->send();
            //echo $this->email->print_debugger();
        $this->hm->verifyUser($uid);
        redirect("admin/HomeC/showUser");

    }

    

     /*  =======
        Logout====*/
	public function logout()
	{
		$this->session->unset_userdata("admin_id");
		$this->session->unset_userdata("admin_username");
        $this->session->unset_userdata("admin_profile_pic");
		$this->session->sess_destroy();
		redirect("admin/LoginC");
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
                if($this->hm->checkCurrentPwd($curPwd,$this->session->userdata("admin_id")))
                {
                    $this->hm->updatePwd($newPwd,$this->session->userdata("admin_id"));
                    $error="Password has been updated successfully.Please Login Again with your new password
                    !!";
                    $this->session->unset_userdata("admin_id");
                    $this->session->unset_userdata("admin_username");
                    $this->session->unset_userdata("admin_profile_pic");
                    
                    $this->session->set_flashdata('error',$error);
                    redirect("Admin/HomeC");                    
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
            $this->load->view("admin/changePwd.php",$temp);
        }
        else
        {
               // echo "hell";
            $this->load->view('admin/changePwd.php');
        }
	}
		
	public function changeProfilePic()
    {
      
        if(!empty($this->input->post("btnChangeProfile")))
        {
            $config['upload_path']="./resources/shared/images";
            $config['allowed_types']='jpg|png|jpeg';
            $config['max_size']=8000;
            $config['max_width']=2048;
            $config['max_height']=2048;
            
            $this->load->library('upload',$config);

            if(!$this->upload->do_upload('adminProfile'))
            {
                $error=array("error"=>$this->upload->display_errors());
            }
            else
            {
                $t=$this->upload->data('file_name');
                $this->session->set_userdata("admin_profile_pic",$t);
                $error=array("error"=>"Photo uploaded Successfully!!");
            }
            $this->output->delete_cache();
          $this->load->view("admin/changeProfile.php",$error);
        }
        else
        {
            $this->load->view("admin/changeProfile.php"); 
        }

    }
    public function showType()
    {
        $temp=array(
            "types"=>$this->hm->displayTypes()
        );
        $this->load->view("admin/displayTypes.php",$temp);
    }
    public function loadAddType()
    {
        $this->load->view("admin/addType.php");
    }
    public function insertType()
    {
        $data=array(
            "type_name"=>$this->input->post("txtType")
        );
        $this->hm->addTypes($data);
        redirect("admin/HomeC/showType");
    }
    public function removeType($id)
    {
        $data=array
        (
            "type_id"=>$id
        );
        $this->hm->deleteType($data);
        redirect("admin/HomeC/showType");
    }

    public function showUserType($data)
    {
        $usertypes=$this->hm->displayUserType($data);
         if($usertypes!=null)
        {
            $temp=array(
                "user"=>$usertypes
            );
           // print_r($temp);
            $this->load->view("admin/user.php",$temp);
        }
        else
        {
            $temp=array(
                "error"=>"No data found!"
            );
            redirect("admin/HomeC/showType");
        }
        
    }


    public function showCategory()
    {
        $temp=array(
            "cats"=>$this->hm->displayCats()
        );
        $this->load->view("admin/displayCategory.php",$temp);
    }

    public function loadAddCats()
    {
        $this->load->view("admin/addCategory");
    }
    public function insertCategory()
    {
        $data=array(
            "cat_name"=>$this->input->post("txtCat"),
            "cat_description"=>$this->input->post("txtDes"),
            "cat_status"=>$this->input->post("txtStatus")
        );
        $this->hm->addCats($data);
        redirect("admin/HomeC/showCategory");
    }
    public function removeCategory($id)
    {
        $data=array
        (
            "cat_id"=>$id
        );
        $this->hm->deleteCats($data);
        redirect("admin/HomeC/showCategory");
    }


    public function loadPhotos()
    {
        $temp=array(
            "pic"=>$this->hm->displayPhoto()
        );
       //print_r($temp["pic"]);
        $this->load->view("admin/displayPhotos",$temp);
    }   

    public function viewPhoto($uid)
    {
        $data=array(
            "user_id"=>$uid
        );

        $d=$this->hm->displayUserPhoto($data);
        if($d!=null)
        {
            $temp=array(
                "pic"=>$d
            );
            //print_r($temp);
            $this->load->view("admin/displayPhotos.php",$temp);
        }
        else
        {
            $temp=array(
                "error"=>"No data found!"
            );
            redirect("admin/HomeC/showUser");
        }
        
    }

    public function viewCatPhoto($id)
    {
        $data=array(
            "cat_id"=>$id
        );
        $d=$this->hm->displayCatPhoto($data);
        //print_r($d);
        if($d!=null)
        {
            $temp=array(
                "pic"=>$d
            );
        $this->load->view("admin/displayPhotos.php",$temp);
        }
        else
        {
            $temp=array(
                "error"=>"No data found!"
            );
            redirect("admin/HomeC/showCategory");
        }

        //$this->load->view("admin/displayPhotos",$temp);
    }
    public function loadReports()
    {
        $report=$this->hm->displayReports();
        $temp=array(
            "report"=>$report
        );
        //print_r($report);
        $this->load->view("admin/manageReports",$temp);
    }
    public function acceptReport($rid,$pid,$reportee_id)
    {
        $userdata=$this->hm->getUserData($reportee_id);
    
        $this->load->library('email');

            $config['protocol']    = 'smtp';
            $config['smtp_host']    = 'ssl://smtp.gmail.com';
            $config['smtp_port']    = '465';
            $config['smtp_timeout'] = '7';
            $config['smtp_user']    = 'vishalrana.jpdawar@gmail.com';
            $config['smtp_pass']    = 'rvprana9894999';
            $config['charset']    = 'utf-8';
            $config['newline']    = "\r\n";
            $config['mailtype'] = 'html'; // or html
            $config['validation'] = TRUE; // bool whether to validate email or not      

            $this->email->initialize($config);

            $this->email->from('vishalrana.jpdawar@gmail.com', 'lyghtGig');
            $this->email->to($userdata->user_email);
            //print_r($x);

            $this->email->subject('Report Email');
            $this->email->message('Hello '.$userdata->username.', <br>This mail is from lyghtGig to inform you that we deleted the picture <strong></strong> because it violated the policies of our website.');
            $this->email->send();
            $this->hm->reportDelete($rid,$pid);
           //  print_r($x);
        redirect("admin/HomeC/loadReports");
    }

        public function rejectReport($rid,$pid,$reporter_id)
    {
        $userdata=$this->hm->getUserData($reporter_id);
        
        $this->load->library('email');

            $config['protocol']    = 'smtp';
            $config['smtp_host']    = 'ssl://smtp.gmail.com';
            $config['smtp_port']    = '465';
            $config['smtp_timeout'] = '7';
            $config['smtp_user']    = 'vishalrana.jpdawar@gmail.com';
            $config['smtp_pass']    = 'rvprana9894999';
            $config['charset']    = 'utf-8';
            $config['newline']    = "\r\n";
            $config['mailtype'] = 'html'; // or html
            $config['validation'] = TRUE; // bool whether to validate email or not      

            $this->email->initialize($config);

            $this->email->from('vishalrana.jpdawar@gmail.com', 'lyghtGig');
            $this->email->to($userdata->user_email);
        //print_r($x);

            $this->email->subject('Report Email');
            
            $this->email->message('Hello '.$userdata->username.' , <br>This mail is from lyghtGig to inform you that  your request to delete the picture is not fulfilled .<br>The picture <strong></strong> does not violate the policies of our website.');
           // echo $this->email->print_debugger();
            $this->email->send();
            $this->hm->rejectReport($rid,$pid);
        redirect("admin/HomeC/loadReports");
    }
}
?>