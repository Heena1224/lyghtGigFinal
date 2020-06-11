<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
class HomeM extends CI_Model
{
	
	function __construct()
	{
		
	}
	public function checkCurrentPwd($curPwd,$id)
	{
		$this->db->where("user_id",$id);
		$this->db->where("user_pwd",$curPwd);
		$x=$this->db->get("tbl_user_login");
		if($x->num_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function updatePwd($newPwd,$id)
	{
		$this->db->set("user_pwd",$newPwd);
		$this->db->where("user_id",$id);
		$this->db->update("tbl_user_login");
	}
}
?>