<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_orders extends CI_Migration {

	public function up()
	{

		$this->dbforge->add_field(array(
			'ID' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE
			),
			'invoice_id' => array(
				'type' => 'INT',
				'constraint' => 11
			),
			'article' => array(
				'type' => 'VARCHAR',
				'constraint' => '200'
			),
			'description' => array(
				'type' => 'VARCHAR',
				'constraint' => '300'
			),
			'price' => array(
				'type' => 'INT',
				'constraint' => 7
			),
			'quantity' => array(
				'type' => 'INT',
				'constraint' => 5
			),
			'total' => array(
				'type' => 'INT',
				'constraint' => 11
			),
		));
		
	    $this->dbforge->add_key('ID', TRUE); 
		$this->dbforge->create_table('orders');

		//$sql = "ALTER TABLE orders ADD FOREIGN KEY (invoice_id) REFERENCES invoices(ID)";

		//$this->db->query($sql); 

	}

	public function down()
	{
		$this->dbforge->drop_table('orders');
	}
	
   }
	
?>