<?php

class Helper extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('customer');
		$this->load->model('invoice');
		$this->load->model('order');
	}
	
	public function index(){
	
	}
	

}