<?php

class Customers extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('customer');
	}
	
	public function index(){

		if($this->session->userdata('logged_in')){
			$data_array['customers'] = $this->customer->get_customers(); 
			$this->load->view('customers', $data_array); 
		}

		else {
			$this->load->view('login'); 
		}

	 }
   
    public function new_customer_form(){
    	$this->load->view('new_customer'); 
    }


    public function new_customer(){

	    $config = array(
					array(
						'field'=>'company',
						'label'=>'company',
						'rules'=>'trim|required'
					),
					array(
						'field'=>'city',
						'label'=>'city',
						'rules'=>'trim|required'
					),
					array(
						'field'=>'email',
						'label'=>'email',
						'rules'=>'trim|required|valid_email'
					),
					array(
						'field'=>'address',
						'label'=>'address',
						'rules'=>'trim|required'
					),
					array(
						'field'=>'country',
						'label'=>'country',
						'rules'=>'trim|required'
					)
		); 

		$this->form_validation->set_rules($config);
		$validation = $this->form_validation->run();

		$data_array = array('company' => $_POST['company'], 
						'city' => $_POST['city'], 
						'address'=> $_POST['address'], 
						'country'=> $_POST['country'], 
						'phone'=> $_POST['phone'], 
						'email'=> $_POST['email']);  

		if($validation == FALSE){
			$this->new_customer_form(); 
		}	
		else {
			
			$this->customer->insert_customer($data_array); 
			redirect('customers'); 
		}
    }

    public function get_customers(){
    	$this->customer->get_customers(); 
    }

}