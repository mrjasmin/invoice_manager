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

	public function update_invoice($data, $id){
		$this->update($data, $id); 
	}

	public function insert_invoice($data){
		$this->save($data); 
	}


	public function delete_invoice($id){
		$this->delete($id); 
	}
	

	public function count_active_invoices(){

		$sql = "SELECT * FROM invoices WHERE `status`= 'Active'";
		return $this->db->query($sql)->num_rows(); 
	}

	public function most_recent_invoices($num){
		$sql = "SELECT * FROM `invoices` ORDER BY date_created DESC LIMIT $num;";
		return $this->db->query($sql)->result('array'); 
	}

	public function insert_total_price($id, $total){
		$sql = "UPDATE invoices SET total = $total WHERE ID = $id;";
		$this->db->query($sql); 
	}

	public function get_exipring_in($days){

		$sql = "SELECT * FROM $this->_table_name WHERE date_due - CURDATE() BETWEEN 1 AND $days;"; 

		return $this->db->query($sql)->result('array'); 

	}
		
}

?>