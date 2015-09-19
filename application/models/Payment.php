<?php

class Payment extends MY_Model {
	
	
	protected $_table_name = 'payments';
	protected $_primary_key= "ID";
	protected $_order_by = "ID"; 
	protected $_order_type ="ASC"; 
	

	public function get_payments($invoice_id = NULL){
		if($invoice_id == NULL){
			return $this->get($invoice_id); 
		}
		else {
			$sql = "SELECT * FROM payments WHERE invoice_id = $invoice_id";
			return $this->db->query($sql)->result('array'); 
		}
	
	}


	public function update_payment($data, $id){
		$this->update($data, $id); 
	}

	public function insert_payment($data){
		$this->save($data); 
	}
}

?>