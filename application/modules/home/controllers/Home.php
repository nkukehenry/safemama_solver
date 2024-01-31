<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

	
	public function index()
	{
		$data['module']='home';
		$data['view']='sections';

		echo Modules::run("templates/home",$data,true);
	}
}
