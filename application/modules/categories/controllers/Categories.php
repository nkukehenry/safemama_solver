<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends MX_Controller {


		public function __construct()
        {
                parent::__construct();

                $this->load->model('categories_mdl');
                $this->module="categories";//current module

             //   Modules::run("auth/isLegal");

                
        }


	
	public function getCategories()
	{
		$categories=$this->categories_mdl->getAll();

		return $categories;

		//print_r($categories);
	}





}
