<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Comments extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
                        'nick' => array(
				'type' => 'VARCHAR',
				'constraint' => '100'
			),
                        'comment' => array(
				'type' => 'VARCHAR',
				'constraint' => '1000'
			),
			'pubdate' => array(
				'type' => 'DATE'
			),
                        'slug' => array(
				'type' => 'VARCHAR',
                                'constraint' => '100'
			),
                        'page' => array(
				'type' => 'VARCHAR',
                                'constraint' => '50'
			),
		));
                $this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('comments');
	}

	public function down()
	{
		$this->dbforge->drop_table('comments');
	}
}