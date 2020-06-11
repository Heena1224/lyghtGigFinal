<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeM extends CI_Model
{
	
	function __construct()
	{
	
	}

	public function getUserStatus()
	{
		$this->db->select("ul.username,up.user_profile_pic,ul.user_id,ul.user_status");
		$this->db->from("tbl_user_login as ul");
		$this->db->join("tbl_user_profile as up","up.user_id=ul.user_id");
		$this->db->where("ul.user_status","Disabled");
		$x=$this->db->get();
		if($x->num_rows()>0)
		{
			return $x->result();
		}
		else
		{
			return false;
		} 
	}
	public function checkCurrentPwd($curPwd,$id)
	{
		$this->db->where("admin_id",$id);
		$this->db->where("admin_pwd",$curPwd);
		$x=$this->db->get("tbl_admin");
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
		$this->db->set("admin_pwd",$newPwd);
		$this->db->where("admin_id",$id);
		$this->db->update("tbl_admin");
	}

	public function displayUser() //($data)
	{
		$this->db->select("l.user_id,l.username,l.user_email,l.user_status,p.user_fname,p.user_lname,p.user_gender,p.user_bdate,p.user_profile_pic,p.user_cover_pic,p.user_address,p.is_verified");
		$this->db->from("tbl_user_login as l");
		$this->db->join("tbl_user_profile as p","l.user_id=p.user_id");
		$x=$this->db->get();
		if($x->num_rows()>0)
		{
			return $x->result();
		}
		else
		{
			return null;
		}
	}

	public function changeUserStatus($uid,$newStatus)
	{
		$this->db->set("user_status",$newStatus);
		$this->db->where("user_id",$uid);
		$this->db->update("tbl_user_login");
	}

	public function verifyUser($uid)
	{
		$this->db->set("is_verified",1);
		$this->db->where("user_id",$uid);
		$this->db->update("tbl_user_profile");
	}
	public function getUserData($uid)
	{
		$this->db->select("ul.*,up.*");
		$this->db->from("tbl_user_login as ul");
		$this->db->join("tbl_user_profile as up","up.user_id=ul.user_id");
		//$this->db->join("tbl_user_type as t","t.user_id=ul.user_id");
		$this->db->where("ul.user_id",$uid);
		$x=$this->db->get("tbl_user_login");
		if($x->num_rows()>0)
		{
			return $x->result()[0];
		}
		else
		{
			return null;
		}
		
	}
	
	public function displayTypes()
	{
		return $this->db->get("tbl_type")->result();
	}
	public function addTypes($data)
	{
		return $this->db->insert("tbl_type",$data);
	}
	public function deleteType($data)
	{
		return $this->db->delete("tbl_type",$data);
	}
	public function displayUserType($data)
	{
		// {select * from tbl_user_type ut,tbl_user_login ul,tbl_user_profile up where ut.user_id=ul.user_id and ul.user_id=up.user_id

		$this->db->select("ul.user_id,ul.username,ul.user_email,ul.user_status,up.user_fname,up.user_lname,up.user_gender,up.user_bdate,up.user_profile_pic,up.user_cover_pic,up.user_address,up.is_verified");
		$this->db->from("tbl_user_type ut");
		$this->db->join("tbl_user_login ul","ut.user_id=ul.user_id");
		$this->db->join("tbl_user_profile up","ul.user_id=up.user_id");
		//$this->db->join("tbl_type tt","tt.type_id=ut.type_id");
		$this->db->where("ut.type_id",$data);
		$x=$this->db->get();
		if($x->num_rows()>0)
		{
			//print_r($x->result());
			return $x->result();
		}
		else
		{
			return null;
		}
        
	}

	public function displayCats()
	{
		return $this->db->get("tbl_category")->result();
	}
	public function addCats($data)
	{
		return $this->db->insert("tbl_category",$data);
	}
	public function deleteCats($data)
	{
		return $this->db->delete("tbl_category",$data);
	}

	public function displayPhoto()
	{
		
		$this->db->select("ul.user_id,ul.username,p.photo_id,p.photo_date,p.photo_caption,p.photo_path,p.album_id,p.photo_type,p.photo_status,a.album_title");
		$this->db->from("tbl_photo as p");
		$this->db->join("tbl_album as a","a.album_id=p.album_id");
		$this->db->join("tbl_user_login as ul","ul.user_id=p.user_id");
		$this->db->order_by("p.photo_date", "desc");
		$x=$this->db->get();
		if($x->num_rows()>0)
			return $x->result();
		else return null;
	}
	
	public function displayCatPhoto($data)
	{
		$this->db->select("ul.user_id,ul.username,p.photo_id,p.photo_date,p.photo_caption,p.photo_path,p.album_id,p.photo_type,p.photo_status,c.cat_name,c.cat_description,c.cat_status,a.album_title");
		$this->db->from("tbl_photo_category as pc");
		$this->db->join("tbl_photo as p","p.photo_id=pc.photo_id");
		$this->db->join("tbl_album as a","p.album_id=a.album_id");
		$this->db->join("tbl_category as c","c.cat_id=pc.cat_id");
		$this->db->join("tbl_user_login as ul","ul.user_id=p.user_id");
		$this->db->where("pc.cat_id",$data["cat_id"]);
		$x=$this->db->get();
		//$x=$this->db->get();
		if($x->num_rows()>0)
			return $x->result();
		else return null;
	}
	public function displayUserPhoto($data)
	{
		
		$this->db->select("ul.user_id,ul.username,p.photo_id,p.photo_date,p.photo_caption,p.photo_path,p.album_id,p.photo_type,p.photo_status,a.album_title");
		$this->db->from("tbl_photo as p");
		$this->db->join("tbl_album as a","a.album_id=p.album_id");
		$this->db->join("tbl_user_login as ul","ul.user_id=p.user_id");
		$this->db->where("p.user_id",$data["user_id"]);
		$this->db->order_by("p.photo_date", "desc");
		$x=$this->db->get();
		if($x->num_rows()>0)
			return $x->result();
		else return null;
	}

	public function displayReports()
	{
		$this->db->select("r.*,rr.*,p.*,ul.*");
		$this->db->from("tbl_report as r");
		$this->db->join("tbl_photo as p","r.photo_id=p.photo_id");
		$this->db->join("tbl_report_reason as rr","r.reason_id=rr.reason_id");
		$this->db->join("tbl_user_login as ul","r.reporter_id=ul.user_id");
		//$this->db->join("tbl_user_login as ul","rr.reportee_id=ul.user_id");
		$x=$this->db->get();
		if($x->num_rows()>0)
			return $x->result();
		else return null;

	}

	public function reportDelete($rid,$pid)
	{
		$this->db->set("report_status","Accepted");
		$this->db->where("report_id",$rid);
		$this->db->update("tbl_report");
		$this->deletePhoto($pid);
	}
	public function deletePhoto($pid)
	{
		$this->db->set("photo_status","Deleted");
		$this->db->where("photo_id",$pid);
		$this->db->update("tbl_photo");
	}
	public function rejectReport($rid,$pid)
	{
		$this->db->set("report_status","Rejected");
		$this->db->where("report_id",$rid);
		$this->db->update("tbl_report");
		$this->activePhoto($pid);
	}
	public function activePhoto($pid)
	{
		$this->db->set("photo_status","Active");
		$this->db->where("photo_id",$pid);
		$this->db->update("tbl_photo");
	}
}
?>

