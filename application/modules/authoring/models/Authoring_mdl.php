<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authoring_mdl extends CI_Model {

	

	//insert new course
	public function saveCourse($coursedata)
	{

	   $saved=$this->db->insert('courses',$coursedata);

	   return $saved;
		
	}
	


//update course
	public function saveEdits($coursedata)
	{

	  $this->db->where('course_id',$coursedata['course_id']);

	   $saved=$this->db->update('courses',$coursedata);

	   return $saved;
		
	}

	public function getSubscribers($schoolId){

		$this->db->where('school_id',$schoolId);
		//$this->db->where('user_id !='.$this->session->userdata()['user_id']);
		$qry = $this->db->get('users');
		return $qry->result();
	}


}
