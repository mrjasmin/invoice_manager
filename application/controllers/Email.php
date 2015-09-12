<?php

class Email extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('customer');
		$this->load->library('email');
	}
	
	public function index(){

	

	//$this->email->send();

	//echo $this->email->print_debugger();*/

	}

	public function send_email(){

		$this->set_settings(); 
		$this->format_email(); 
		$this->attachInvoice($_POST['id']); 

		if($this->email->send()){
			//redirect('invoices'); 
			echo "OK"; 
			
		}
		else {
			echo $this->email->print_debugger();
		}

	
	}

	private function format_email(){

		$this->email->from('jasmin.krhan@gmail.com', 'Jasmin');
		$this->email->to($_POST['to']); 
		//$this->email->cc('another@another-example.com'); 
		//$this->email->bcc('them@their-example.com'); 

		$this->email->subject($_POST['subject']);
		$this->email->message($_POST['message']);	
		
	}

	private function attachInvoice($id){	
		$path = site_url('uploads/invoices/invoice' . $id. '.pdf'); 
		$this->email->attach($path); 
	}


	private function set_settings(){
		$config = Array(
    		'protocol' => 'smtp',
    		'smtp_host' => 'ssl://smtp.gmail.com',
    		'smtp_port' => 465,
    		'smtp_user' => 'jasmin.krhan',
    		'smtp_pass' => 'jasmin_mujesira',
    		'mailtype'  => 'html'
			);

	   $this->email->initialize($config);
	   $this->email->set_newline("\r\n");

	}

}