<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginM extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function checkLogin($data)
	{
		$this->db->where($data);
		$x=$this->db->get("tbl_admin");
		if($x->num_rows()>0)
		{
			return $x->result()[0];
		}
		else
			return null;

	}
}
?>