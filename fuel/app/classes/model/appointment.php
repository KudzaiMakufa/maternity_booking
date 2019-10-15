<?php
class Model_Appointment extends Model_Crud
{
	protected static $_table_name = 'appointments';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('date', 'Date', 'required');
		$val->add_field('time', 'Time', 'required|max_length[255]');
		//$val->add_field('user_id', 'User Id', 'required|valid_string[numeric]');
		$val->add_field('doctor', 'Doctor', 'required|max_length[255]');
		//$val->add_field('read', 'Read', 'required|max_length[255]');

		return $val;
	}

}
