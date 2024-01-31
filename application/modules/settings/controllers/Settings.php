<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MX_Controller {

	public function __construct()
        {
                parent::__construct();

                $this->load->model('settings_mdl');
                $this->module="settings";

                
        }

	
	public function getAll()
	{
		$settings=$this->settings_mdl->getAll();

		return $settings;
		
	}


	
    public function getBy_id($loc_id)
	{
		$data['settings']=$this->settings_mdl->getBy_id($set_id);

		return $data;
		
	}

 public function configure()
	    {
		$data['module']=$this->module;
		$data['view']="configure";
		$data['page']="General Settings";

		echo Modules::run("templates/admin",$data);
	}


public function saveSettings()
	    {
		
		$postData=$this->input->post();

		

		$res=$this->settings_mdl->saveSettings($postData);

		if($res=='ok'){

			echo "Settings successfully updated";

		}

		else{

			echo "Operation failed, please try again";

		}
	}







}
