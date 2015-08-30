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

	public function get_customer_ID($name){
		
		$Name = $this->db->escape($name); 
		$sql = "SELECT ID from customers WHERE company = $Name";
		$result = $this->db->query($sql)->row_array(); 

		return $result['ID']; 
	}

	public function get_customer_name($id){
		$sql = "SELECT company FROM customers WHERE ID = $id";
		$result = $this->db->query($sql); 

		return $result; 
	}
		
}

?>