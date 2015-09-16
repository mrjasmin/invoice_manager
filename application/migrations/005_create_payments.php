<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_payments extends CI_Migration {

	public function up()
	{

		$this->dbforge->add_field(array(
			'ID' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true, 
				'auto_increment' => TRUE
			),
			'invoice_id' => array(
				'type' => 'INT',
				'constraint' => 11
			),
			'amount' => array(
				'type' => 'INT',
				'constraint' => 11
			),
			'note' => array(
				'type' => 'VARCHAR',
				'constraint' => '500'
			),
			'date' => array(
				'type' => 'date'
			)
		));
		
	    $this->dbforge->add_key('ID', TRUE); 
		$this->dbforge->create_table('payments');

		$sql = "ALTER TABLE payments ADD FOREIGN KEY (invoice_id) REFERENCES invoices(ID)";

		$this->db->query($sql); 


	}

	public function down()
	{
		$this->dbforge->drop_table('payments');
	}
	
   }
	
?>