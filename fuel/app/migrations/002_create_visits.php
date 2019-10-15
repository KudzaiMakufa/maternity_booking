<?php

namespace Fuel\Migrations;

class Create_visits
{
	public function up()
	{
		\DBUtil::create_table('visits', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'date' => array('null' => false, 'type' => 'date'),
			'patient' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'weight' => array('null' => false, 'type' => 'double'),
			'blood_pressure' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'temperature' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'foetus_position' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'brief_notes' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('visits');
	}
}