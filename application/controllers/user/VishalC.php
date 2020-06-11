<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class VishalC extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("user/VishalM","vm");
		if($this->session->has_userdata("username"))
			redirect("user/HomeC");
	}
	public function addUser()
	{
		$img=$_FILES['photoProfile']['name'];
		copy($_FILES['photoProfile']['tmp_name'],"C:/xampp/htdocs/lyghtgig/resources/shared/images/".$img)or die($_FILES['photoProfile']['error']);
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
		if(!$this->vm->checkUniqueUsername($formData["username"]))
		{
			$error="This Username already exists,try another username.";
			$this->session->set_flashdata("error",$error);//jya sudhi reidrect thai tya sudhi e store rakhse n 2nd redirect ma e data jatu rai
			redirect("user/UserC/loadRegister");
		}
		else if(!$this->vm->checkUniqueEmail($formData["user_email"]))
		{
			$error="This Email already exists,try another email.";
			$this->session->set_flashdata("error",$error);
			redirect("user/UserC/loadRegister");
		}
		else
		{
			//echo "hello";
			$this->vm->insertUser($formData);
			redirect("user/UserC");
		}

	}
	
}
?>
