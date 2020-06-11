<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContestM extends CI_Model
{
	
	function __construct()
	{
	
	}
	public function displayContest()
	{
		$this->db->select("ul.*,c.*");
		$this->db->from("tbl_competition as c");
		$this->db->join("tbl_user_login as ul","ul.user_id=c.user_id");
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
	
	public function displayContestData($contest_id)
	{
		$this->db->select("ul.*,c.*");
		$this->db->from("tbl_competition as c");
		$this->db->join("tbl_user_login as ul","ul.user_id=c.user_id");
		$this->db->where("competition_id",$contest_id);
		$x=$this->db->get();
		if($x->num_rows()>0)
		{
			$x=$x->result()[0];
			$x->totalParticipants=$this->countParticipants($contest_id);
			$x->totalPhotos=$this->countPhotos($contest_id);
			return $x;
		}
		else
		{
			return null;
		}
	}

	public function countPhotos($contest_id)
	{
		$this->db->where("competition_id",$contest_id);
		$x=$this->db->get("tbl_submission");
		return $x->num_rows();
	}
	public function countParticipants($contest_id)
	{
		$this->db->where("competition_id",$contest_id);
		$x=$this->db->get("tbl_participant");
		return $x->num_rows();
	}
	public function getParticipantsData($contest_id)
	{
		$this->db->select("ul.*,c.*,up.*");
		$this->db->from("tbl_participant as c");
		$this->db->join("tbl_user_login as ul","ul.user_id=c.user_id");
		$this->db->join("tbl_user_profile as up","up.user_id=ul.user_id");
		$this->db->where("competition_id",$contest_id);
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
}
?>

