<?php
class Model_Visit extends Model_Crud
{
	protected static $_table_name = 'visits';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('date', 'Date', 'required');
		$val->add_field('patient', 'Patient', 'required|max_length[255]');
		$val->add_field('weight', 'Weight', 'required');
		$val->add_field('blood_pressure', 'Blood Pressure', 'required|max_length[255]');
		$val->add_field('temperature', 'Temperature', 'required|max_length[255]');
		$val->add_field('foetus_position', 'Foetus Position', 'required|max_length[255]');
		$val->add_field('brief_notes', 'Brief Notes', 'required|max_length[255]');

		return $val;
	}

}
