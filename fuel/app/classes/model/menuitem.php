<?php
class Model_Menuitem extends Model_Crud
{
	protected static $_table_name = 'menuitems';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('url', 'Url', 'required|max_length[255]');
		$val->add_field('role', 'Role', 'required|max_length[255]');
		$val->add_field('class', 'Class', 'required|max_length[255]');

		return $val;
	}

}
