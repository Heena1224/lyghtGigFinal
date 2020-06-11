<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContestC extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata("admin_username"))
		{
			redirect("admin/LoginC");
		}
		$this->load->model("admin/ContestM","cm");

	}
	public function index()
	{
		
		 $this->load->view("admin/home.php");
	}
    public function showContest()
    {
        $temp=array(
            "contestData"=>$this->cm->displayContest(),

        );
        //print_r($temp);
       $this->load->view("admin/displayContest.php",$temp);
    }
    public function showContestData($contest_id)
    {
    	$temp=array(
            "contestDetails"=>$this->cm->displayContestData($contest_id)
        );
        $this->load->view("admin/contestDetails.php",$temp);
    }
    public function getParticipantsData($contest_id)
    {

    	 
    	 	$participants=$this->cm->getParticipantsData($contest_id);
         if($participants==null)
        {

            $temp=array(
                "error"=>"No data found!"
            );
            redirect("admin/ContestC/showContestData");
            
        }
        else
        {
        	$temp=array(
                "user"=>$participants
            );
            //print_r($temp);
            $this->load->view("admin/user.php",$temp);
        }
    	

    }
    
}
?>