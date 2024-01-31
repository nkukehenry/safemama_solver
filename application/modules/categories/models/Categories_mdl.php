<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_mdl extends CI_Model {

	
	public function __construct()
        {
                parent::__construct();

               
                $this->categories_tb="categories";//classes table

          

                
        }



        public function getAll(){

        	$query=$this->db->get($this->categories_tb);

        	$categories=$query->result();

        	return $categories;
        }





}
