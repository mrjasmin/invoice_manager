<?php

class Customer extends MY_Model {
	
	
	protected $_table_name = 'customers';
	protected $_primary_key= "ID";
	protected $_order_by = "ID"; 
	protected $_order_type ="ASC"; 
	
	
	public function get_customers($id = NULL){
		return $this->get($id); 
	}


	public function count_customers(){
		return $this->get_num_rows(); 
	}

	public function update_customer($data){
		$this->update($data); 
	}

	public function insert_customer($data){
		$this->save($data); 
	}
		
}

?>