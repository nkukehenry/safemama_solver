<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends MX_Controller {

	
	public function home($data)
	{
		$this->load->view('home',$data);
	}

	public function general($data)
	{
		$this->load->view('general',$data);
	}


	public function author($data)
	{
		$this->load->view('author',$data);
	}

	

}
