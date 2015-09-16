<?php

class Invoice extends MY_Model {
	
	
	protected $_table_name = 'invoices';
	protected $_primary_key= "ID";
	protected $_order_by = "ID"; 
	protected $_order_type ="ASC"; 
	
	
	public function get_invoices($id = NULL){

		if($id == NULL){
			$sql = "SELECT invoices.*, customers.company FROM invoices JOIN customers ON invoices.customer = customers.ID"; 
			return $this->db->query($sql)->result('array'); 
		}
		else {
			$query = $this->db->get_where($this->_table_name, array($this->_primary_key=>$id)); 
			return $query->first_row('array'); 
		}
		

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
		$sql = "SELECT invoices.*, customers.company FROM invoices JOIN customers ON invoices.customer = customers.ID ORDER BY date_created DESC LIMIT $num;";
		return $this->db->query($sql)->result('array'); 
	}

	public function insert_total_price($id, $total){
		$sql = "UPDATE invoices SET total = $total WHERE ID = $id;";
		$this->db->query($sql); 
	}

	public function get_exipring_in($days){

		$sql = "SELECT invoices.*, customers.company FROM invoices JOIN customers ON invoices.customer = customers.ID WHERE date_due - CURDATE() BETWEEN 1 AND $days;"; 

		return $this->db->query($sql)->result('array'); 

	}

	public function change_status($id, $new_status){
		$this->db->set('status', $new_status); 
		$this->db->where($this->_primary_key, $id); 
		$this->db->update($this->_table_name); 
	}

	public function update_paid($inv_id){

		$sql_total_paid = "SELECT SUM(amount) AS total_paid_sum FROM payments WHERE invoice_id = $inv_id"; 
		
		$amount_paid = $this->db->query($sql_total_paid)->row()->total_paid_sum; 

		$sql = "UPDATE invoices SET paid_amount = $amount_paid WHERE ID = $inv_id"; 
	
		$this->db->query($sql); 
	
	}
		
}

?>