<?php

class Invoices extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('customer');
		$this->load->model('invoice');
		$this->load->model('order');
	}
	
	public function index(){

		if($this->session->userdata('logged_in')){
			$data_array['invoices'] = $this->invoice->get_invoices(); 
			$data_array['customers'] = $this->customer->get_customers(); 
			$this->load->view('invoices', $data_array); 
		}

		else {
			$this->load->view('login'); 
		}

	}


	public function new_invoice_form(){
		$data_array['customers'] = $this->customer->get_customers(); 
		$this->load->view('new_invoice', $data_array); 
	}


	public function new_invoice(){

		$customer_id = $this->customer->get_customer_ID($_POST['customerOption']); 
	
		$data_array = array('billing_company' => $_POST['company'], 'date_created' => $_POST['date_created'], 
			'date_due' => $_POST['date_due'], 'reference_number' => $_POST['reference_number'],
			'customer' => $customer_id, 'total' => 34, 'paid_amount' => 23, 'status' => 'Active' ); 	

    	//Insert invoice into database
		$this->invoice->insert_invoice($data_array); 

		$lastID =  $this->db->insert_id(); 

		$this->insertOrders($lastID); 

		redirect('invoices'); 

	}

	private function insertOrders($id){

		extract($_POST); 

		$totalOrder = sizeof($article); 

		for($i = 0; $i<$totalOrder; $i++){

			$total = $price[$i] * $quantity[$i];
			$disc = 1 - $discount[$i]/100; 
			$Tax = $tax[$i]/100; 
			$sumTax = $total * $Tax; 
		
			$sum = ($total + $sumTax) * $disc;  

			$data_array = array('article' => $article[$i], 'description' => $description[$i], 'quantity' => $quantity[$i],
				'price' => $price[$i], 'tax' => $tax[$i], 'discount' => $discount[$i], 'invoice_id' => $id,
				'total' => $sum);  

			$this->order->insert_order($data_array); 

		}
	}

	public function delete_invoice($id){
		$this->invoice->delete_invoice($id); 
	}


	public function edit_invoice($id){
		
	}

}