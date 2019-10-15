<?php

namespace Fuel\Migrations;

class Create_health_infromations
{
	public function up()
	{
		\DBUtil::create_table('health_infromations', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'patient' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'message' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('health_infromations');
	}
}