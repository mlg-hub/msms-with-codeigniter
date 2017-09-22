<?php
class MY_Controller extends CI_Controller{

	public function __construct(){
		parent::__construct();


		//loop to get all the settings
		foreach ($this->Setting_model->get_global_settings() as $result){
			$this->global_data[$result->key] = $result->value;
		}
	}
}