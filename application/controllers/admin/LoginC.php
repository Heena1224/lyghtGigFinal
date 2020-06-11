<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LoginC extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("admin/LoginM","lm");
		if($this->session->has_userdata("admin_username"))
		 	redirect("admin/HomeC");

	}
	public function index()
	{
		$this->load->view("admin/login.php");

	}

	public function validateLogin()
	{
		$data=array(
			"admin_username"=>$this->input->post("txtUsername"),
			"admin_pwd"=>$this->input->post("txtPwd")
		);
		$x=$this->lm->checkLogin($data);
		print_r($x);
		if($x!=null)
		{
			$this->session->set_userdata("admin_id",$x->admin_id);
			$this->session->set_userdata("admin_username",$x->admin_username);
			$this->session->set_userdata("admin_profile_pic",$x->admin_profile_pic);
			redirect("admin/HomeC");
		}
		else
		{
			$temp=array(
				"error"=>"Invalid login credentials. Please try again."
			);
			$this->load->view("admin/login.php",$temp);
		}
	}
	

}
?>