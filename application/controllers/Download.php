<?php

class Download extends CI_Controller {

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
		
	}
	
	public function index(){

	}

	public function downloadXLS($invoice_id, $customer_id){

		$orders = $this->order->get_invoice_order($invoice_id); 
		$invoice = $this->invoice->get_invoices($invoice_id); 
		$customer = $this->customer->get_customers($customer_id); 

		//foreach($orders as $order){
		//	echo $order['article']; 
		//}

		$excelObj = new PHPExcel_Custom(); 
		$excelObj->set_settings($invoice, $orders, $customer); 

	}
	
	public function downloadPDF($invoice_id){

	}

	private function settings(){
		set_include_path(site_url());
		require_once('dist/phpexcel/PHPExcel_Custom.php'); 
	}
	

}