<?php

namespace Fuel\Migrations;

class Create_maternities
{
	public function up()
	{
		\DBUtil::create_table('maternities', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'first_name' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'surname' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'date_of_birth' => array('null' => false, 'type' => 'date'),
			'phone_number' => array('null' => false, 'type' => 'double'),
			'nationality' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'occupation' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'pregrancy_number' => array('null' => false, 'type' => 'double'),
			'conception_date' => array('null' => false, 'type' => 'date'),
			'child_birth_date' => array('null' => false, 'type' => 'date'),
			'national_id' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'address' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'next_of_kin' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'phone_no' => array('null' => false, 'type' => 'double'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('maternities');
	}
}