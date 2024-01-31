<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classes_mdl extends CI_Model {

	
	public function __construct()
        {
                parent::__construct();
                $this->classes_tb="classes";//classes table
                $this->schools_tb="schools";//classes table
        }

        public function getAll(){

        	$query=$this->db->get($this->classes_tb);
        	$classes=$query->result();
        	return $classes;
        }
        public function getSchools($id = false){

                if($id)
                 $this->db->where('school_id',$id);
                $query=$this->db->get($this->schools_tb);
                $schools=$query->result();

                if($id)
                  $schools = $query->row();
          
                return $schools;
        }

        public function getVerifiedSchools(){

                $this->db->where('isVerified',1);
                $query=$this->db->get($this->schools_tb);
                $schools=$query->result();
                return $schools;
        }

     public function addSchool($data){
         $this->db->insert($this->schools_tb,$data);
         return $this->db->insert_id();
     }




}
