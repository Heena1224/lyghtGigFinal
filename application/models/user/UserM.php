<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserM extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function checkLogin($data)
	{
		$this->db->select("ul.*,up.user_profile_pic,up.user_cover_pic");
		$this->db->from("tbl_user_login as ul");
		$this->db->join("tbl_user_profile as up","up.user_id=ul.user_id");
		$this->db->where("ul.username",$data["username"]);
		$this->db->where("ul.user_pwd",$data["user_pwd"]);
		$x=$this->db->get();
		if($x->num_rows()>0)
		{
			$x=$x->result()[0];
			$x->is_verified=$this->checkVerified($x->user_id);
			return $x;
		}
		else
		{
			return null;
		}

	}
	public function checkVerified($uid)
	{
		$this->db->where("user_id",$uid);
		$x=$this->db->get("tbl_user_profile");
		if($x->num_rows()>0)
		{
			return $x->result()[0]->is_verified;
		}
		else{
			return 0;
		}
	}
	public function countFollowers($uid)
	{
		$this->db->where("user_id",$uid);
		$x=$this->db->get("tbl_followers");
		return $x->num_rows();
	}
	public function countFollowing($fid)
	{
		$this->db->where("follower_id",$fid);
		$x=$this->db->get("tbl_followers");
		return $x->num_rows();
	}
	
	public function getUserData($uid)
	{
		$this->db->select("ul.*,up.*");
		$this->db->from("tbl_user_profile as up");
		$this->db->join("tbl_user_login as ul","ul.user_id=up.user_id");
		$this->db->where("ul.user_id",$uid);
		$this->db->where("ul.user_status","Enabled");
		$x=$this->db->get();
		if($x->num_rows()>0)
		{
			$x=$x->result()[0];
			$x->totalFollowers=$this->countFollowers($x->user_id);
			$x->totalFollowing=$this->countFollowing($x->user_id);
			if($uid!=$this->session->userdata("user_id"))
			{
				$x->isFollowed=$this->checkFollow($uid,$this->session->userdata("user_id"));
			}
			return $x;
		}
		else
		{
			return null;
		}
		
		
	}
	public function followUser($uid,$fid)
	{
		$this->db->insert("tbl_followers",array("user_id"=>$uid,"follower_id"=>$fid));
	}
	public function unfollowUser($uid,$fid)
	{
		$this->db->where("user_id",$uid);
		$this->db->where("follower_id",$fid);
		$this->db->delete("tbl_followers");
	}
	public function checkFollow($uid,$fid)
	{
		$this->db->where("user_id",$uid);
		$this->db->where("follower_id",$fid);
		$x=$this->db->get("tbl_followers");
		if($x->num_rows()>0)
			return 1;
		else return 0;
	}
	public function checkEnabled($uid)
	{
		$this->db->where("user_id",$uid);
		$this->db->where("user_status","Enabled");
		$x=$this->db->get("tbl_user_login");
		if($x->num_rows()>0)
			return 1;
		else return 0;
	}
	public function getTypeData($uid)
	{
		$this->db->select("t.type_id,t.type_name");
		$this->db->from("tbl_user_type as ut");
		$this->db->join("tbl_type as t","t.type_id=ut.type_id");
		$this->db->where("ut.user_id",$uid);
		$x=$this->db->get();
		if($x->num_rows()>0)
			return $x->result();
		else return null;
	}
	public function getDefaultAlbumPhotos($uid)
	{
		$this->db->select("tp.*");
		$this->db->from("tbl_album as ta");
		$this->db->join("tbl_photo as tp","ta.album_id=tp.album_id");
		$this->db->where("tp.user_id",$uid);
		$this->db->where("ta.album_title","default");
		$this->db->where("tp.photo_status","active");
		if($uid!=$this->session->userdata("user_id"))
			$this->db->where("tp.photo_type","public");
		$this->db->order_by("tp.photo_date","desc");
		$x=$this->db->get();
		if($x->num_rows()>0)
		{
			$photos=$x->result();
			foreach ($photos as $key) 
			{
				$key->totalComments=$this->getCommentsCount($key->photo_id);
				$key->totalLikes=$this->countLikes($key->photo_id);
				$key->isLiked=$this->checkLike($key->photo_id);
			}
			return $x->result();
		}

	}
	public function fetchUserID($uname)
	{
		$this->db->select("user_id");
		$this->db->where("username",$uname);
		$this->db->where("user_status","Enabled");
		$x=$this->db->get("tbl_user_login");
		if($x->num_rows()>0)
		{
			return $x->result()[0]->user_id;
		}
		else
			return null;
	}
	public function countLikes($pid)
	{
		$this->db->where("photo_id",$pid);
		$x=$this->db->get("tbl_likes");
		if($x->num_rows()>0)
		{
			return $x->num_rows();
		}
		else return 0;
	}
	public function countPhotos($uid)
	{
		$this->db->where("user_id",$uid);
		$this->db->where("photo_status","active");
		if($uid!=$this->session->userdata("user_id"))
		{
			$this->db->where("photo_type","public");
		}		
		$x=$this->db->get("tbl_photo");
		if($x->num_rows()>0)
			return $x->num_rows();
		else return 0;
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
	public function getLikedUsers($pid)
	{
		$this->db->select("tl.user_id");
		$this->db->from("tbl_likes as tl");
		$this->db->where("tl.photo_id",$pid);
		$x=$this->db->get();
		if($x->num_rows())
			return $x->result();
		else return null;
	}

	public function changeEditProfile($uid,$data,$email)
	{
		//return $this->db->where($uid)->update("tbl_user_profile",$data);
		$this->db->set("user_fname",$data["user_fname"]);
		$this->db->set("user_lname",$data["user_lname"]);
		$this->db->set("user_address",$data["user_address"]);
		$this->db->set("user_description",$data["user_description"]);
		$this->db->where("user_id",$uid);
		$this->db->update("tbl_user_profile");

		$this->db->set("user_email",$email["user_email"]);
		$this->db->where("user_id",$uid);
		$this->db->update("tbl_user_login");
	}
	/*to register*/
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
			"user_cover_pic"=>$data["user_cover_pic"],
			"user_address"=>$data["user_address"],
			"is_verified"=>"0"

		);
		$this->db->insert("tbl_user_profile",$t);
		$albumData=array(
			"album_title"=>"default",
			"user_id"=>$user_id
		);
		$this->db->insert("tbl_album",$albumData);
		return $temp["user_pwd"];
		
	}

	public function sendPassword($data)
	{
		$letters="ABCDEFGHIJKLMOPQRSTEabcXZYdefghijklmonxzy";
		$len=strlen($letters);
		$temp=array(
			"user_pwd"=>"".$letters[rand(0,$len-1)].rand(10,99).$letters[rand(0,$len-1)].rand(100,999)
		);
		$this->db->set("user_pwd",$temp["user_pwd"]);
		$this->db->where("user_email",$data["user_email"]);
		$this->db->update("tbl_user_login");
		
		return $temp["user_pwd"];

	}
	public function createDefaultAlbum($uid)
	{
		$albumData=array(
			"album_title"=>"default",
			"user_id"=>$uid,
			"album_cover"=>"album_cover.jpg"
		);
		$this->db->insert("tbl_album",$albumData);
	}
	public function updateProfilePic($uid,$path)
	{
		$this->db->set("user_profile_pic",$path);
		$this->db->where("user_id",$uid);
		$this->db->update("tbl_user_profile");
	}
	public function updateCoverPic($uid,$path)
	{
		$this->db->set("user_cover_pic",$path);
		$this->db->where("user_id",$uid);
		$this->db->update("tbl_user_profile");
	}
	public function getAlbumData($uid,$lim=0)
	{
		$this->db->where("user_id",$uid);
		$this->db->where("album_title !=","default");
		$this->db->where("album_status","active");
		if($uid!=$this->session->userdata("user_id"))
		{
			$this->db->where("album_type","public");
		}
		$x=$this->db->get("tbl_album");

		if($x->num_rows()>0)
		{
			if($lim!=0)
				return $x->result()[$lim];
			else
				return $x->result();
		}
		else return null;
	}
	public function createAlbum($data)
	{
		$this->db->insert("tbl_album",$data);
		return $this->db->insert_id();
	}

	public function fetchAlbumOwner($aid)
	{
		$this->db->select("tul.user_id");
		$this->db->from("tbl_user_login as tul");
		$this->db->join("tbl_album as ta","ta.user_id=tul.user_id");
		$this->db->where("ta.album_id",$aid);;
		$x=$this->db->get();
		if($x->num_rows()>0)
		{
			return $x->result()[0]->user_id;
		}
		else return null;
	}

	public function getAlbumDetails($aid,$uid)
	{
		$this->db->where("album_id",$aid);
		$this->db->where("user_id",$uid);
		$this->db->where("album_status","active");
		$x=$this->db->get("tbl_album");
		if($x->num_rows()>0)
		{
			return $x->result()[0];
		}
		else return null;
	}

	public function getReportData()
	{
		$x=$this->db->get("tbl_report_reason");
		if($x->num_rows()>0)
		{
			return $x->result();
		}
		else return null;
	}
	public function reportPhoto($data)
	{
		$this->db->insert("tbl_report",$data);
	}

	public function getPhotoDetails($aid,$uid)
	{
		$this->db->where("album_id",$aid);
		$this->db->where("user_id",$uid);
		$this->db->where("photo_status","active");
		if($uid!=$this->session->userdata('user_id'))
			$this->db->where("photo_type","public");
		$this->db->order_by("photo_date","desc");		
		$x=$this->db->get("tbl_photo");

		if($x->num_rows()>0)
		{
			$photos=$x->result();
			foreach ($photos as $key) 
			{
				$key->totalComments=$this->getCommentsCount($key->photo_id);
				$key->totalLikes=$this->countLikes($key->photo_id);
				$key->isLiked=$this->checkLike($key->photo_id);
			}
			return $x->result();
		}
		else return null;
			
	}

	public function getCommentsCount($pid)
	{
		$this->db->where("photo_id",$pid);
		$x=$this->db->get("tbl_comment");
		return $x->num_rows();
	}
	public function getComments($pid)
	{
		$this->db->select("c.*,ul.username,up.user_profile_pic");
		$this->db->from("tbl_comment as c");
		$this->db->join("tbl_user_login as ul","ul.user_id=c.user_id");
		$this->db->join("tbl_user_profile as up","up.user_id=ul.user_id and up.user_id=c.user_id");
		$this->db->where("c.photo_id",$pid);
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
	public function getFollowersData($uid)
	{
		$this->db->select("ul.user_id,ul.username,up.user_fname,up.user_lname,up.user_profile_pic,up.user_cover_pic");
		$this->db->from("tbl_followers as f");
		$this->db->join("tbl_user_login as ul","ul.user_id=f.follower_id");
		$this->db->join("tbl_user_profile as up","up.user_id=f.follower_id and up.user_id=ul.user_id");
		$this->db->where("f.user_id",$uid);
		$this->db->where("ul.user_status","Enabled");
		$x=$this->db->get();
		if($x->num_rows()>0)
		{
			$x=$x->result();
			foreach($x as $key)
			{
				$key->isFollowed=$this->checkFollow($key->user_id,$uid);
			}
			return $x;
		}
		else return null;

	}
	public function getFollowingData($uid)
	{
		$this->db->select("ul.user_id,ul.username,up.user_fname,up.user_lname,up.user_profile_pic,up.user_cover_pic");
		$this->db->from("tbl_followers as f");
		$this->db->join("tbl_user_login as ul","ul.user_id=f.user_id");
		$this->db->join("tbl_user_profile as up","up.user_id=f.user_id and up.user_id=ul.user_id");
		$this->db->where("f.follower_id",$uid);
		$this->db->where("ul.user_status","Enabled");
		$x=$this->db->get();
		if($x->num_rows()>0)
		{
			$x=$x->result();
			foreach($x as $key)
			{
				$key->isFollowed=$this->checkFollow($key->user_id,$uid);
			}
			return $x;
		}
		else return null;

	}
	public function getUserInfo($uid)
	{
		$this->db->select("user_cover_pic");
		$this->db->where("user_id",$uid);
		$y=$this->db->get("tbl_user_profile");
		if($y->num_rows()>0)
		{
			
			return $y->result()[0];
		}
		else 
			return null;
	}
	
	public function getAlbumCover($aid)
	{
		$this->db->select("photo_path");
		$this->db->where("album_id",$aid);
		$x=$this->db->get("tbl_photo");
		if($x->num_rows()>0)
		{
			return $x->result()[0];
		}
		else
			return null;
	}

	public function addComment($pid,$cmnt,$uid)
	{
		$data=array(
			"comment_data"=>$cmnt,
			"photo_id"=>$pid,
			"user_id"=>$uid
		);
		$this->db->insert("tbl_comment",$data);
	}

	public function editCaption($cap,$pid)
	{
		$this->db->set("photo_caption",$cap);
		$this->db->where("photo_id",$pid);
		$this->db->update("tbl_photo");
	}
	public function editAlbumDescription($desc,$aid)
	{
		$this->db->set("album_description",$desc);
		$this->db->where("album_id",$aid);
		$this->db->update("tbl_album");
	}
	public function editAlbumTitle($title,$aid)
	{
		$this->db->set("album_title",$title);
		$this->db->where("album_id",$aid);
		$this->db->update("tbl_album");
	}
	public function deleteAlbum($aid)
	{
		$this->db->set("album_status","deleted");
		$this->db->where("album_id",$aid);
		$this->db->update("tbl_album");
	}

	public function deleteComment($cid)
	{
		$this->db->where("comment_id",$cid);
		$this->db->delete("tbl_comment");
	}
	public function editComment($cmt,$cid)
	{
		$this->db->set("comment_data",$cmt);
		$this->db->where("comment_id",$cid);
		$x=$this->db->update("tbl_comment");
		//print_r($x);
	}

	public function getPosts($uid)
	{
		/*$this->db->select("tp.*");
		$this->db->from("tbl_followers as tf");
		$this->db->join("tbl_photo as tp","tf.user_id=tp.user_id");
		$this->db->where("tp.photo_type","public");
		$this->db->where("tp.photo_status","active");
		$this->db->where("tf.follower_id",$uid);
		$this->db->order_by("tp.photo_date","desc");
		$x=$this->db->get();
		if($x->num_rows()>0)
		{
			$photos=$x->result();
			foreach ($photos as $key) 
			{
				$key->totalComments=$this->getCommentsCount($key->photo_id);
				$key->totalLikes=$this->countLikes($key->photo_id);
				$key->isLiked=$this->checkLike($key->photo_id);
				$key->ownerData=$this->getUserData($key->user_id);
				$key->catData=$this->getCatData($key->photo_id);
			}
			return $photos;
		}
		else return null;*/

		$this->db->select("");
		$this->db->from("tbl_photo as tp");
		$this->db->where("tp.user_id IN (select user_id from tbl_followers where follower_id=".$uid." and user_id IN (select user_id from tbl_user_login where user_status='Enabled'))");
		$this->db->where("tp.photo_type","public");
		$this->db->where("tp.photo_status","active");	
		$this->db->order_by("tp.photo_date","desc");
		$x=$this->db->get();
		if($x->num_rows()>0)
		{
			$photos=$x->result();
			foreach ($photos as $key) 
			{
				$key->totalComments=$this->getCommentsCount($key->photo_id);
				$key->totalLikes=$this->countLikes($key->photo_id);
				$key->isLiked=$this->checkLike($key->photo_id);
				$key->ownerData=$this->getUserData($key->user_id);
				$key->catData=$this->getCatData($key->photo_id);
			}
			return $photos;
		}
		else return null;

	}

	function getCatData($pid)
	{
		$this->db->select();
		$this->db->from("tbl_category as tc");
		$this->db->join("tbl_photo_category as tpc","tc.cat_id=tpc.cat_id");
		$this->db->where("tpc.photo_id",$pid);
		$this->db->where("tc.cat_status","active");
		$x=$this->db->get();
		if($x->num_rows()>0)
		{
			return $x->result();
		}
		else
			return null;
	}


}
?>