<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects_mdl extends CI_Model {

	
	public function __construct()
        {
                parent::__construct();

               
                $this->subjects_tb="subjects";//classes table

          

                
        }



        public function getAll(){

        	$query=$this->db->get($this->subjects_tb);

        	$subjects=$query->result();

        	return $subjects;
        }





}
