<?php

class Index extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('encrypt');
		$this->load->model('user');
		$this->load->model('invoice');
		$this->load->model('customer');
		$this->load->helper('date');
	}
	
	function index(){
		if($this->session->userdata('logged_in')){
			$data_array['total_invoices'] = $this->invoice->count_invoices(); 
			$data_array['active_invoices'] = $this->invoice->count_active_invoices();
			$data_array['total_customers'] = $this->customer->count_customers(); 
			$data_array['recent_invoices'] = $this->invoice->most_recent_invoices(4); 
			$data_array['expiring_invoices'] = $this->invoice->get_exipring_in(5); 
		
			$this->load->view('dashboard', $data_array);  
		}
		else {
			$this->login(); 
		}


	
	}
	    
	private function login(){
		
			$config = array(
					array(
						'field'=>'username',
						'label'=>'username',
						'rules'=>'trim|min_length[6]|required'
					),
					array('field'=>'password',
						'label'=>'password',
						'rules'=>'trim|min_length[6]|required'
					)
				); 
			
			$this->form_validation->set_rules($config);
			$validation = $this->form_validation->run();
		
			if ($validation == FALSE)
			{
				$this->load->view('login.php');
			}
			else
			{	
				$result = $this->user->login($_POST['username'], $_POST['password']);
				$data['error'] = 0;
			
				if($result != 0){
					$session_data = array(
									'username'=> $_POST['username'],
									'logged_in'=> TRUE); 
				     
				 
                    $data["name"] = $_POST['username']; 


					$this->session->set_userdata($session_data); 
					
					$data_array['total_invoices'] = $this->invoice->count_invoices(); 
					$data_array['active_invoices'] = $this->invoice->count_active_invoices();
					$data_array['total_customers'] = $this->customer->count_customers(); 
					$data_array['recent_invoices'] = $this->invoice->most_recent_invoices(4); 


					$this->load->view('dashboard', $data_array); 

				}
				else {
				   
					$data['error'] = 1;
					$this->load->view('login', $data); 
				}
			}
	}
	
	function logout(){
		$this->user->logout(); 
		redirect(base_url('Index')); 
	}

}