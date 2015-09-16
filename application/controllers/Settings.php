<?php


class Settings extends CI_Controller {

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
		
			$this->load->view('settings', $data_array);  
		}
		else {
		
		}
	
	}


	public function paypal_settings(){

		if($this->session->userdata('logged_in')){
			$data_array['total_invoices'] = $this->invoice->count_invoices(); 
			$data_array['active_invoices'] = $this->invoice->count_active_invoices();
			$data_array['total_customers'] = $this->customer->count_customers(); 
			$data_array['recent_invoices'] = $this->invoice->most_recent_invoices(4); 
			$data_array['expiring_invoices'] = $this->invoice->get_exipring_in(5); 
		
			$this->load->view('paypal_settings', $data_array);  
		}
		else {
		
		}
	
	}
	    
}