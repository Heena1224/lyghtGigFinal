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
	public function upload($data,$cats=null)
	{
		if($data['album_id']==-1)
		{
			$aid=$this->fetchDefaultAlbumID($data['user_id']);
			$data['album_id']=$aid;
			echo $aid;
		}
		$this->db->insert("tbl_photo",$data);
		$pid=$this->db->insert_id();
		if($cats!=null)
		{
			foreach($cats as $c)
			{
				$d=array(
					"photo_id"=>$pid,
					"cat_id"=>$c
				);
				$this->db->insert("tbl_photo_category",$d);
			}
		}

	}
	public function getAllPhotoData($sortOption=-1,$cats=null)
	{
/*		$this->db->select();
		$this->db->from("tbl_photo as tp");
		
		$this->db->where("tp.photo_type","public");
		
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
		else return null;*/

/*			$this->db->select("tl.photo_id,COUNT(tl.user_id) as totalLikes,tp.*");
			$this->db->from("tbl_likes as tl");
			$this->db->group_by("tl.photo_id");
			if($sortOption==1)
			$this->db->order_by("totalLikes","desc");
			if($sortOption==2)
			$this->db->order_by("tp.photo_date","desc");
			if($sortOption==3)
			$this->db->order_by("tp.photo_date");
			$this->db->join("tbl_photo as tp","tp.photo_id=tl.photo_id");
			$x=$this->db->get();
			if($x->num_rows()>0)
			{
				return $x->result();
			}
			else return null;*/

			if($cats==null){
				$this->db->select("tp.*,COUNT(tl.user_id) as totalLikes");
				$this->db->from("tbl_photo as tp");
				$this->db->join("tbl_likes as tl","tl.photo_id=tp.photo_id");
				//print_r($cats);
	
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
			else{
				$this->db->select("tp.*,,COUNT(tl.user_id) as totalLikes");
				$this->db->from("tbl_photo_category as tpc");
				foreach($cats as $c)
				{
					$this->db->or_where("tpc.cat_id",$c);
				}
				$this->db->join("tbl_photo as tp","tp.photo_id=tpc.photo_id");
				$this->db->where("tp.photo_status","active");
				$this->db->where("tp.photo_type","public");
				$this->db->join("tbl_likes as tl","tl.photo_id=tp.photo_id and tpc.photo_id=tl.photo_id");
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
					//print_r($x);
					return $x;
				}
				else return null;
			}

			
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

	public function getCompetitionData($lim=null)
	{
		date_default_timezone_set("Asia/Kolkata");
		$cd=date("Y-m-d h:i:s");
		$this->db->select("c.*");
		$this->db->from("tbl_competition as c");
		if($lim!=null)
		$this->db->where("c.start_date>'".$cd."'");
		$this->db->order_by("c.start_date","desc");
		if($lim!=null)
		$this->db->limit($lim);
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
			//$x->totalPhotos=$this->countPhotos($contest_id,$photo_id);
			return $x;
		}
		else
		{
			return null;
		}
	}
	public function getSubmissionData($cid)
	{
		$this->db->select("ts.*,tp.competition_id,tup.user_id,tup.user_fname,tup.user_lname,tup.user_profile_pic,tup.user_cover_pic");
		$this->db->from("tbl_submission as ts");
		$this->db->join("tbl_participant as tp","tp.participant_id=ts.participant_id");
		$this->db->join("tbl_user_profile as tup","tup.user_id=tp.user_id");
		$this->db->where("tp.competition_id",$cid);
		$x=$this->db->get();
		if($x->num_rows()>0)
		{
			return $x->result();
		}
		else return null;
	}
	public function countParticipants($cid)
	{
		$this->db->where("competition_id",$cid);
		return $this->db->get("tbl_participant")->num_rows();
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
	public function getUserContestData($uid)
	{
		$this->db->where("user_id",$uid);
		$x=$this->db->get("tbl_competition");
		if($x->num_rows()>0)
		{
			$x=$x->result();
			foreach($x as $contest)
			{
				$contest->participantData=$this->getParticipantData($contest->competition_id);
				$contest->totalParticipants=$this->countParticipants($contest->competition_id);
				$contest->totalSubmissions=$this->countSubmissions($contest->competition_id);
				
			}
			return $x;
		}
		else return null;
	}
	public function countSubmissions($cid)
	{
		$this->db->select();
		$this->db->from("tbl_participant as tp");
		$this->db->where("tp.competition_id",$cid);
		$this->db->join("tbl_submission as ts","ts.participant_id=tp.participant_id");
		$x=$this->db->get();
		if($x->num_rows()>0)
			return $x->num_rows();
		else return 0;
	}
	public function checkSubmission($uid,$cid)
	{
		$this->db->select();
		$this->db->where("tp.user_id",$uid);
		$this->db->where("tp.competition_id",$cid);
		$this->db->from("tbl_participant as tp");
		$this->db->join("tbl_submission as ts","ts.participant_id=tp.participant_id");
		$x=$this->db->get();
		if($x->num_rows()>0)
			return 1;
		else return 0;
	}
	public function getParticipantData($cid)
	{
		$this->db->select("tp.participant_id,tp.competition_id,tul.user_id,tul.username,tup.user_profile_pic,tup.user_cover_pic");
		$this->db->from("tbl_participant as tp");
		$this->db->join("tbl_user_login as tul","tul.user_id=tp.user_id");
		$this->db->join("tbl_user_profile as tup","tup.user_id=tul.user_id and tup.user_id=tp.user_id");
		$this->db->where("tp.competition_id",$cid);
		$x=$this->db->get();
		if($x->num_rows()>0)
		{
			$x=$x->result();
			foreach($x as $key)
			{
				$key->submissionData=$this->getUserSubmissionData($key->participant_id);
			}
			return $x;
		}
		else{
			return null;
		}

	}
	public  function getUserSubmissionData($pid)
	{
		$this->db->where("participant_id",$pid);
		$x=$this->db->get("tbl_submission");
		if($x->num_rows()>0)
		{
			return $x->result()[0];
		}
		else return null;
	}
	// public function countPhotos($contest_id,$pid)
	// {
	// 	$this->db->where("competition_id",$contest_id);
	// 	$this->db->where("photo_path",$pid);
	// 	$x=$this->db->get("tbl_submission");
	// 	return $x->num_rows();
	// }
}