<?php
class Model_Doctor extends Model_Crud
{
	protected static $_table_name = 'doctors';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');

		return $val;
	}

}
