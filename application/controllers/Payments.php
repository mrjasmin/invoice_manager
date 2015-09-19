<?php

class Payments extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('payment'); 
		$this->load->model('invoice'); 
	}
	
	public function index(){


	}

	public function new_payment(){ 
			
		$data_array = array('invoice_id' => $_POST['inv_ID'], 'amount' => $_POST['amount'], 'note' => $_POST['note'], 'date' => $_POST['date']); 
		$this->payment->insert_payment($data_array); 
		$this->invoice->update_paid($_POST['inv_ID']); 
		
		redirect('invoices'); 
	}	


	public function get_payments_AJAX(){
		echo json_encode($this->payment->get_payments($_POST['invoice_ID']));  
		
	}

}