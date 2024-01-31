<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends MX_Controller {


		public function __construct()
        {
                parent::__construct();

                $this->load->model('classes_mdl');
                $this->module="classes";//current module

             //   Modules::run("auth/isLegal");

                
        }


	
	public function getClasses()
	{
		$classes=$this->classes_mdl->getAll();

		return $classes;

		//print_r($classes);
	}

	public function getSchools($id=false)
	{
		$schools=$this->classes_mdl->getSchools($id);
		return $schools;

	}

	public function getVerifiedSchools()
	{
		$schools=$this->classes_mdl->getVerifiedSchools();
		return $schools;

	}

	public function schoolRegistration()
	{
		$user_id =$this->session->userdata()['user_id'];
		$schoolData=$this->input->post();
		$schoolData['addedBy'] = $user_id;

		$res=$this->classes_mdl->addSchool($schoolData);
		
		if($res){
           $msg ="<h3><font color='green'><i class='fa fa-check'></i> School Created Successfully</font></h3>";

         	$this->db->where('user_id',$user_id);
         	$this->db->update('users', array('school_id'=>$res));

         	$this->db->where('author_id',$user_id );
         	$this->db->update('courses', array('school_id'=>$res));
         	$this->session->set_userdata('school_id',$res);
         }
         else{
         	$msg = "<h3><font color='red'>Process Failed, Try again</font></h3>";
         }

         Modules::run("utility/setFlash",$msg);
         redirect('authoring');
	}








}
