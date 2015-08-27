<?php

class User extends MY_Model {
	
	
	protected $_table_name = 'users';
	protected $_primary_key= "ID";
	protected $_order_by = "ID"; 
	protected $_order_type ="ASC"; 
	
	
	public function login($username, $pw){
		$this->db->select()->from('users');
		$this->db->where('username', $username);
		
		$query = $this->db->get();

		
		if($query != NULL){
			$this->db->select('password')->from('users')->where('username', $username);
		
			$password = $this->db->get()->first_row('array')['password']; 
			//$decrypted_pw = $this->encrypt->decode($password); 
					
			if($pw == $password){
				return true; 
			}	
		}
		else {
	         return false; 
		}
	 }
	
	
	public function logout(){
		 $this->session->sess_destroy(); 
	}

	public function get_users(){
	
		return $this->get(); 
	}


	public function count_users(){
		return $this->get_num_rows(); 
	}

	public function get_user_data(){
		return $this->session->userdata('username');
	}
	
}

?>