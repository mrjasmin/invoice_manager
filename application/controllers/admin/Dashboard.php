<?php

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
	
		$this->load->helper('text');
		$this->load->library('session');
		$this->load->library('encrypt');
		$this->load->helper('form');
		$this->load->model('settings'); 
		$this->load->model('page'); 
		$this->load->model('article'); 
		$this->load->model('user'); 

		}
	
	public function index(){
		
		if($this->session->userdata('logged_in')){

			$data_array['num_pages'] = $this->number_of_pages(); 
			$data_array['num_articles'] = $this->number_of_articles();
			$data_array['num_users'] = $this->number_of_users(); 

			$data_array['num_users'] = $this->number_of_users();

			$data_array['active_user'] = $this->user->get_user_data(); 
			
			$this->load->view('index', $data_array); 
		}
		else {

			$this->load->view('login'); 
		}
		
		
	}
	
	public function settings(){
		
		$data = $this->settings->get_settings(); 

		if($data == NULL){
			$data_array['settings'] = array('id' => 1, 'h2_header' => 'Hello, world!', 'title' => 'LightCMS', 'about_text' => 'This is my blog where you can find articles and tutorials about programming', 'footer_text' => 'Made by Jasmin Krhan',
		 									'meta_title' => 'LightCMS', 'meta_author' => 'Jasmin Krhan', 'meta_content' => 'CMS'); 
			$this->load->view('page_settings', $data_array); 
		}
		else {
			$data_array['settings'] = $data['0'];
			$this->load->view('page_settings', $data_array);  
		}	

		
	}

	public function save_settings(){
		$settings_data = array('id' => 1, 'h2_header' => $_POST['title'], 'about_text'=> $_POST['about'], 
								'footer_text' => $_POST['footer'], 'meta_title' => $_POST['meta_title'], 'meta_author' => $_POST['meta_author'], 
								'meta_content' => $_POST['meta_content'], 'title' => $_POST['page_name']); 	
		
		$this->settings->set_settings($settings_data); 
		redirect('admin/dashboard/settings'); 
	}

	function showUserInfo(){
		
	}

	private function number_of_pages(){
		return $this->page->count_pages(); 
	
	}

	private function number_of_articles(){
		return $this->article->count_articles(); 
	}

	private function number_of_users(){
		return $this->user->count_users(); 
	}

	
}