<?php

class Order extends MY_Model {
	
	
	protected $_table_name = 'orders';
	protected $_primary_key= "ID";
	protected $_order_by = "ID"; 
	protected $_order_type ="ASC"; 
	
	
	public function get_order($id = NULL){
		return $this->get($id); 
	}


	public function count_order(){
		return $this->get_num_rows(); 
	}

	public function update_order($data){
		$this->update($data); 
	}

	public function insert_order($data){
		$this->save($data); 
	}

	public function get_invoice_order($invoice_id){
		$sql = "SELECT * FROM orders WHERE invoice_id = $invoice_id"; 
		return $this->db->query($sql)->result('array'); 
	}
		
}

?>