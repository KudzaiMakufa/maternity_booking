<?php
class Model_Booking extends Model_Crud
{
	protected static $_table_name = 'bookings';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		
		$val->add_field('pregnancy_number', 'Pregnancy Number', 'required|max_length[255]');
		$val->add_field('conception_date', 'Conception Date', 'required');
		$val->add_field('child_birth_date', 'Child Birth Date', 'required');
		$val->add_field('brief_medical_history', 'Brief Medical History', 'required|max_length[255]');

		return $val;
	}

}
