<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class PhotoM extends CI_Model
{
	
	public function likePhoto($pid,$uid)
	{
		$data=array(
			"photo_id"=>$pid,
			"user_id"=>$uid
		);
		$this->db->insert("tbl_likes",$data);
	}

	public function unlikePhoto($pid,$uid)
	{
		$this->db->where("photo_id",$pid);
		$this->db->where("user_id",$uid);
		$this->db->delete("tbl_likes");
	}

	public function getMostFollowedUsers($uid)
	{
		
		$this->load->model('user/UserM', 'um');
		$this->db->select("tf.user_id,count(tf.follower_id) as totalfollowers");
		$this->db->where("tf.user_id !=",$this->session->userdata("user_id"));
		$this->db->group_by("tf.user_id");
		$this->db->order_by("totalfollowers","desc");
		$x=$this->db->get("tbl_followers as tf",5);
		if($x->num_rows()>0)
		{
			$x=$x->result();
			
			foreach ($x as $key) {
				$cf=$this->um->checkFollow($key->user_id,$uid);
				$ef=$this->um->checkEnabled($key->user_id);
				if($cf==0 && $ef==1){
					$key->userData=$this->getUserData($key->user_id);
					$key->mostLikedPhotos=$this->getMostLikesPhotos($key->user_id,2);
				}
				else	
					$key->userData=null;
			}
			return $x;
		}
		else
			return null;
	}
	public  function getMostLikesPhotos($uid,$limit)
	{
		$this->db->select("tp.*,COUNT(tl.user_id) as totalLikes");
		$this->db->from("tbl_likes as tl");
		$this->db->where("tl.photo_id IN (SELECT photo_id from tbl_photo where user_id=".$uid.")");
		$this->db->group_by("tl.photo_id");
		$this->db->order_by("totalLikes","desc");
		$this->db->limit(2);
		$this->db->join("tbl_photo as tp","tp.photo_id=tl.photo_id");
		$this->db->where("tp.photo_status='active' and tp.photo_type='public'");
		return $this->db->get()->result();
	}
	public function getAllCats(){
		$x=$this->db->get("tbl_category");
		if($x->num_rows()>0)
		{
			return$x->result();
		}
		else return null;
	}
	public function fetchDefaultAlbumID($uid){
		$this->db->select("album_id");
		$this->db->where("album_title","default");
		$this->db->where("user_id",$uid);
		$x=$this->db->get("tbl_album")->result()[0];
		return $x->album_id;
	}
	public function upload($data)
	{
		if($data['album_id']==-1)
		{
			$aid=$this->fetchDefaultAlbumID($data['user_id']);
			$data['album_id']=$aid;
			echo $aid;
		}
		$this->db->insert("tbl_photo",$data);

	}
	public function getAllPhotoData($sortOption=-1)
	{

		$this->db->select("tp.*,COUNT(tl.user_id) as totalLikes");
		$this->db->from("tbl_photo as tp");
		$this->db->join("tbl_likes as tl","tl.photo_id=tp.photo_id");
		$this->db->where("tp.photo_status","active");
		$this->db->where("tp.photo_type","public");
		$this->db->group_by("tp.photo_id");
		if($sortOption==1)
		$this->db->order_by("totalLikes","desc");
		if($sortOption==2)
		$this->db->order_by("tp.photo_date","desc");
		if($sortOption==3)
		$this->db->order_by("tp.photo_date");
		$x=$this->db->get();
		if($x->num_rows()>0)
		{
			$x=$x->result();
			foreach($x as $key)
			{
				$key->photoOwnerData=$this->getUserData($key->user_id);
				$key->categoryData=$this->getCatData($key->photo_id);
				$key->totalComments=$this->getCommentsCount($key->photo_id);
				$key->isLiked=$this->checkLike($key->photo_id);
			}
			return $x;
		}
		else return null;
			
	}
	public function checkLike($pid)
	{
		$this->db->select("tl.user_id");
		$this->db->from("tbl_likes as tl");
		$this->db->where("tl.photo_id",$pid);
		$this->db->where("tl.user_id",$this->session->userdata("user_id"));
		$x=$this->db->get();
		if($x->num_rows())
			return 1;
		else return 0;
	}
	public function getCommentsCount($pid)
	{
		$this->db->where("photo_id",$pid);
		$x=$this->db->get("tbl_comment");
		return $x->num_rows();
	}
	public function getCategoryData()
	{
		return $this->db->get("tbl_category")->result();
	}
	function getCatData($pid)
	{
		$this->db->select();
		$this->db->from("tbl_category as tc");
		$this->db->join("tbl_photo_category as tpc","tc.cat_id=tpc.cat_id");
		$this->db->where("tpc.photo_id",$pid);
		$x=$this->db->get();
		if($x->num_rows()>0)
		{
			return $x->result();
		}
		else
			return null;
	}
	function getUserData($uid)
	{
		$this->db->select("tl.username,tl.user_id,tp.user_fname,tp.user_lname,tp.user_profile_pic,tp.user_cover_pic");
		$this->db->from("tbl_user_login as tl");
		$this->db->join("tbl_user_profile as tp","tl.user_id=tp.user_id");
		$this->db->where("tl.user_id",$uid);
		$this->db->where("tl.user_status","Enabled");
		$x=$this->db->get();
		if($x->num_rows()>0)
		{
			return $x->result()[0];
		}
		else return null;
	}
	function hidePhoto($pid)
	{
		$this->db->set("photo_type","hidden");
		$this->db->where("photo_id",$pid);
		$this->db->update("tbl_photo");
	}
	function showPhoto($pid)
	{
		$this->db->set("photo_type","public");
		$this->db->where("photo_id",$pid);
		$this->db->update("tbl_photo");
	}
	function deletePhoto($pid)
	{
		$this->db->set("photo_status","deleted");
		$this->db->where("photo_id",$pid);
		$this->db->update("tbl_photo");
	}
	public function getAdminData()
	{
		$this->db->select("a.admin_profile_pic");
		$x=$this->db->get("tbl_admin as a");
		//print_r($x);	
		if($x->num_rows()>0)
		{
			return false;
		}
		
		return true;

	}

	public function getCompetitionData()
	{
		$this->db->select("c.*");
		$this->db->from("tbl_competition as c");
		$this->db->order_by("competition_id","desc");
		$x=$this->db->get();
		if($x->num_rows()>0)
		{
			//print_r($x);
			return $x->result();
		}
		else
		{
			return null;
		}
	}
	public function getContestDetails($contest_id)
	{
		$this->db->select("c.*");
		$this->db->from("tbl_competition as c");
		
		$this->db->where("c.competition_id",$contest_id);
		$x=$this->db->get();
		if($x->num_rows()>0)
		{
			//print_r($x);
			$x=$x->result()[0];
			if($x->admin_id!=null)
			{
				$x->orgData=array(
					'org_name'=>"Lyghtgig",
					'org_id'=>$x->admin_id,
					'org_type'=>'Admin'
				);
			}
			if($x->user_id!=null)
			{
				$this->load->model("user/UserM","um");
				$ud=$this->um->getUserData($x->user_id);
				$x->orgData=array(
					'org_name'=>$ud->username,
					'org_id'=>$x->user_id,
					'org_type'=>'User'
				);

			}
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

	public function createContest($data)
	{
		$this->db->insert("tbl_competition",$data);
		return $this->db->insert_id();
	}

	public function checkParticipant($uid,$contest_id)
	{
		$this->db->where("user_id",$uid);
		$this->db->where("competition_id",$contest_id);
		$x=$this->db->get("tbl_participant");
		if($x->num_rows()>0)
		{
			return 1;
		}
		else{
			return 0;
		}
	}

	public function addParticipant($data)
	{
		$this->db->insert("tbl_participant",$data);
		//return $this->db->insert_id();
	}

	public function getParticipantId($uid,$contest_id)
	{
		$this->db->select("participant_id");
		$this->db->where("user_id",$uid);
		$this->db->where("competition_id",$contest_id);
		$x=$this->db->get("tbl_participant");
		return $x->result()[0]->participant_id;
	}
	public function submitPhoto($data)
	{
		$this->db->inserT("tbl_submission",$data);
	}
	public function getContestPhotos($contest_id)
	{
		$this->db->where("competition_id",$contest_id);
		$x=$this->db->get("tbl_submission");
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