<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_users extends CI_Migration {

	public function up()
	{

		
		$this->dbforge->add_field(array(
			'ID' => array(
				'type' => 'INT',
				'constraint' => 6,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'username' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => '200'
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
				
		));
	
	    $this->dbforge->add_key('ID', TRUE); 
		$this->dbforge->create_table('users');
	}

	public function down()
	{
		$this->dbforge->drop_table('users');
	}
	
   }
	
?>