<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_invoices extends CI_Migration {

	public function up()
	{

		$this->dbforge->add_field(array(
			'ID' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'date_created' => array(
				'type' => 'DATE'
			),
			'date_due' => array(
				'type' => 'DATE'
			),
			'billing_company' => array(
				'type' => 'VARCHAR',
				'constraint' => '200'
			),
			'reference_number' => array(
				'type' => 'VARCHAR',
				'constraint' => '120',
			),
			'customer' => array(
			   'type' => 'INTEGER',
			   'constraint' => '11',
			),
			'tax' => array(
				'type' => 'INTEGER',
			),
			'discount' => array(
				'type' => 'INTEGER',
			),
			'total' => array(
				'type' => 'INTEGER',
			),
			'paid_amount' => array(
				'type' => 'INTEGER',
			),
			'status' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
			),

		));
		

	    $this->dbforge->add_key('ID', TRUE); 
		$this->dbforge->create_table('invoices');

		//Add foreign key
		$sql = "ALTER TABLE invoices ADD FOREIGN KEY (customer) REFERENCES customers(ID)";
		$this->db->query($sql); 

		//Create trigger for deleting orders automatically when removin a invoice
		$trigger = "CREATE TRIGGER 'delete_orders' AFTER DELETE ON 'invoices' FOR EACH ROW BEGIN DELETE FROM orders WHERE orders.invoice_id = old.ID; END";
		$this->db->query($trigger); 

	}

	public function down()
	{
		$this->dbforge->drop_table('invoices');
	}
	
   }
	
?>