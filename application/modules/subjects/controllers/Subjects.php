<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends MX_Controller {


		public function __construct()
        {
                parent::__construct();

                $this->load->model('subjects_mdl');
                $this->module="subjects";//current module

             //   Modules::run("auth/isLegal");

                
        }


	
	public function getSubjects()
	{
		$subjects=$this->subjects_mdl->getAll();

		return $subjects;

		//print_r($classes);
	}





}
