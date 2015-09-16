<?php

class Payment extends MY_Model {
	
	
	protected $_table_name = 'payments';
	protected $_primary_key= "ID";
	protected $_order_by = "ID"; 
	protected $_order_type ="ASC"; 
	

	public function get_payment($invoice_id = NULL){
	
		return $this->get($invoice_id); 
	}


	public function update_payment($data, $id){
		$this->update($data, $id); 
	}

	public function insert_payment($data){
		$this->save($data); 
	}
}

?>