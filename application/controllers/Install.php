<?php

error_reporting(1);

class Install extends CI_Controller {

	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->database('default'); 

		if ($this->config->item('installed') != 'no')
   		{
        	show_404();
    	}

	}
	
	public function index(){
		
		if(isset($_POST['submit'])){

			require_once('application/controllers/inc/Database.php');
			require_once('application/controllers/inc/Config.php'); 
			
			$db_helper = new Database();
			$config_helper = new Config(); 

			$error_message; 

			$conn = $db_helper->checkConnection($_POST['host'], $_POST['username'], $_POST['password'], $_POST['database']); 
		
			
			if($this->validate_input() == FALSE){
				$this->load->view('install');  
			}
			else if(!$conn){
				$data['error_message'] = "Could not establish a connection to the database. Please check your input"; 
				$this->load->view('install', $data);  
			}
			else if(!$config_helper->writeConfig($_POST['host'], $_POST['username'], $_POST['password'], $_POST['database'])){
				 $data['error_message'] = "Could not write settings to the config file located in application/config/database.php. Please check the file permissions."; 
				 $this->load->view('install', $data);  
			}
			else {}

		}
		else {
			$this->load->view("install"); 
		}

 	 }

 	 private function validate_input(){

 	 		$config = array(
							array(
							'field'=>'host',
							'label'=>'host',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'username',
							'label'=>'username',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'password',
							'label'=>'password',
							'rules'=>'trim|required'
						),
						array(
							'field'=>'database',
							'label'=>'database',
							'rules'=>'trim|required'
						)
				); 

			$this->form_validation->set_rules($config);
			
			return $this->form_validation->run();
 	 }

}