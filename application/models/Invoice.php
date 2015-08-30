<?php

class Invoice extends MY_Model {
	
	
	protected $_table_name = 'invoices';
	protected $_primary_key= "ID";
	protected $_order_by = "ID"; 
	protected $_order_type ="ASC"; 
	
	
	public function get_invoices($id = NULL){
		return $this->get($id); 
	}


	public function count_invoices(){
		return $this->get_num_rows(); 
	}

	public function update_invoice($data){
		$this->update($data); 
	}

	public function insert_invoice($data){
		$this->save($data); 
	}
		
}

?>