<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_customers extends CI_Migration {

	public function up()
	{

		
		$this->dbforge->add_field(array(
			'ID' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'company' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'city' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'country' => array(
				'type' => 'VARCHAR',
				'constraint' => '200'
			),
			'address' => array(
				'type' => 'VARCHAR',
				'constraint' => '120',
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '120',
			),
			'phone' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),

		));
	
	    $this->dbforge->add_key('ID', TRUE); 
		$this->dbforge->create_table('customers');
	}

	public function down()
	{
		$this->dbforge->drop_table('customers');
	}
	
   }
	
?>