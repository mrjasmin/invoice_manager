<?php

class MY_Model extends CI_Model {

	protected $_table_name = '';
	protected $_primary_key= "id";
	protected $_order_by = "";
    protected $_order_type ="DESC"; 	
	
	
	function __construct(){
		parent::__construct(); 
	}
	
	public function get($id = NULL){
		
		if($id == NULL){
			
			$this->db->order_by($this->_order_by, $this->_order_type); 
			$query = $this->db->get($this->_table_name); 
			return $query->result_array();
			
		}
		else {
			$query = $this->db->get_where($this->_table_name, array($this->_primary_key=>$id)); 
			return $query->first_row('array'); 
		}
		
	}

	public function save($data){
		
		$this->db->insert($this->_table_name, $data); 
		
	}
	
	public function get_where() {null; }
	
	public function delete($id){
		$this->db->where($this->_primary_key, $id);
		$this->db->delete($this->_table_name); 
		
	}
	
	public function get_num_rows(){
		return $this->db->count_all($this->_table_name); 
	}		

	public function update($data, $id){	
		$this->db->where($this->_primary_key, $id);
		$this->db->update($this->_table_name, $data); 

	}

}