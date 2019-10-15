<?php

namespace Fuel\Migrations;

class Create_appointments
{
	public function up()
	{
		\DBUtil::create_table('appointments', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'date' => array('null' => false, 'type' => 'date'),
			'time' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'user_id' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'doctor' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'read' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('appointments');
	}
}