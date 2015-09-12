<?php

class Download extends CI_Controller {

	private $excelObj;

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('customer');
		$this->load->model('order');
		$this->load->model('invoice');
		$this->load->helper('directory');
		
		//Configure PHPExcel
		$this->settings(); 

		$this->excelObj = new PHPExcel_Custom(); 
		
	}
	
	public function index(){

	}

	public function downloadXLS($invoice_id, $customer_id){

		$this->setSettings($invoice_id, $customer_id); 
		$this->excelObj->downloadFileXLS(); 

	}

	private function setSettings($invoice_id, $customer_id){
		
		$orders = $this->order->get_invoice_order($invoice_id); 
		$invoice = $this->invoice->get_invoices($invoice_id); 
		$customer = $this->customer->get_customers($customer_id); 

		$this->excelObj->set_settings($invoice, $orders, $customer); 
	}
	
	public function downloadPDF($invoice_id, $customer_id){
		$this->setSettings($invoice_id, $customer_id);  
		$this->excelObj->downloadFilePDF(); 	
	}

	private function settings(){
		set_include_path(site_url());
		require_once('dist/phpexcel/PHPExcel_Custom.php'); 
	}
	

	public function savePDF(){

		$this->setSettings($_POST['inv_id'], $_POST['c_id']); 
		$this->excelObj->savePDF(); 

	}

}