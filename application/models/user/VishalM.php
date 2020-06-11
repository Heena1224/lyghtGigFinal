<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
	class VishalM extends CI_Model
	{

		public function checkUniqueUsername($un)
		{
			$this->db->where("username",$un);
			$x=$this->db->get("tbl_user_login");
			if($x->num_rows()>0)
			{
				return false;
			}
			
			return true;
		}
		public function checkUniqueEmail($email)
		{

			$this->db->where("user_email",$email);
			$x=$this->db->get("tbl_user_login");
			if($x->num_rows()>0)
			{
				return false;
			}
			return true;
		}
		public function insertUser($data)
		{

			$letters="ABCDEFGHIJKLMOPQRSTEabcXZYdefghijklmonxzy";
			$len=strlen($letters);
			$temp=array(
				"username"=>$data["username"],
				"user_email"=>$data["user_email"],
				"user_pwd"=>"".$letters[rand(0,$len-1)].rand(10,99).$letters[rand(0,$len-1)].rand(100,999),
				"user_status"=>"Disabled"
			);
			$this->db->insert("tbl_user_login",$temp);
			$user_id=$this->db->insert_id();
			$t=array(
				"user_id"=>$user_id,
				"user_fname"=>$data["user_fname"],
				"user_lname"=>$data["user_lname"],
				"user_description"=>"",
				"user_gender"=>$data["user_gender"],
				"user_bdate"=>$data["user_bdate"],
				"user_profile_pic"=>$data["user_profile_pic"],
				"user_cover_pic"=>"",
				"user_address"=>$data["user_address"],
				"is_verified"=>"Yes"

			);
			$this->db->insert("tbl_user_profile",$t);
			
		}
	}
?>