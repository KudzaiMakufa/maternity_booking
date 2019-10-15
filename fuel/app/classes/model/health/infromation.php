<?php
class Model_Health_Infromation extends Model_Crud
{
	protected static $_table_name = 'health_infromations';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('patient', 'Patient', 'required|max_length[255]');
		$val->add_field('message', 'Message', 'required|max_length[255]');

		return $val;
	}

}
