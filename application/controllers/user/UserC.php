<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserC extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("user/UserM","um");
		if($this->session->has_userdata("username"))
		{
			redirect("user/HomeC");
		}
	}
	public function index()
	{
		$this->load->view("user/login.php");
	}
	public function validatelogin()
	{
		$data=array(
			"username"=>$this->input->post("txtUsername"),
			"user_pwd"=>$this->input->post("txtPassword")
		);
		//print_r($data);
		$x=$this->um->checkLogin($data);
		//print_r($x);
		if($x!=null)
		{
			$this->session->set_userdata("user_id",$x->user_id);
			$this->session->set_userdata("username",$x->username);
			$this->session->set_userdata("user_profile_pic",$x->user_profile_pic);
			$this->session->set_userdata("is_verified",$x->is_verified);
			redirect("user/HomeC");
		}
		else
		{
			if($this->input->post("txtUsername")=="")
			{
				$e="Enter username to login.!";
			}
			else if($this->input->post("txtPassword")=="")
			{
				$e="Enter password to login.!";
			}
			else{
				$e="Login Failed. Enter valid credentials";
			}
			$data=array(
				"error"=>$e
			);
			$this->load->view("user/login.php",$data);
		}
	}
	public function loadRegister()
	{
		$error=$this->session->flashdata("error");
		$temp=array(
			"error"=>$error
		);
		$this->load->view("user/register.php",$temp);
	}
	public function addUser()
	{
		$img=$_FILES['photoProfile']['name'];
		if($_FILES['photoProfile']['name']!="")
			copy($_FILES['photoProfile']['tmp_name'],$_SERVER['DOCUMENT_ROOT']."/lyghtGigFinal/resources/user/uploadPhotos/profile/".$img)or die($_FILES['photoProfile']['error']);
		$formData=array(
			"username"=>$this->input->post("txtUsername"),
			"user_fname"=>$this->input->post("txtFname"),
			"user_lname"=>$this->input->post("txtLname"),
			"user_gender"=>$this->input->post("radioGender"),
			"user_bdate"=>$this->input->post("dateBdate"),
			"user_email"=>$this->input->post("txtEmail"),
			"user_address"=>$this->input->post("txtAddress"),
			"user_profile_pic"=>$img
		);
		if(!$this->um->checkUniqueUsername($formData["username"]))
		{
			$error="This Username already exists,try another username.";
			$this->session->set_flashdata("error",$error);//jya sudhi reidrect thai tya sudhi e store rakhse n 2nd redirect ma e data jatu rai
			redirect("user/UserC/loadRegister");
		}
		else if(!$this->um->checkUniqueEmail($formData["user_email"]))
		{
			$error="This Email already exists,try another email.";
			$this->session->set_flashdata("error",$error);
			redirect("user/UserC/loadRegister");
		}
		else
		{
			//echo "hello";
			$pwd=$this->um->insertUser($formData);
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
			$this->email->to($formData["user_email"]);
			

			$this->email->subject('Email Test');
			$this->email->message('Hello <strong>'.$formData["username"]."</strong>, <br>Welcome to lyghtgig.<br>Please login using password: <strong>".$pwd."</strong> ,to activate your account. You can change it later after login.");
			$this->email->send();
			//echo $this->email->print_debugger();
			redirect("user/UserC");
		}
		
	}

	
}
?>
