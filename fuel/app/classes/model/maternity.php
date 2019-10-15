<?php
class Model_Maternity extends Model_Crud
{
	protected static $_table_name = 'maternities';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('first_name', 'First Name', 'required|max_length[255]');
		$val->add_field('surname', 'Surname', 'required|max_length[255]');
		$val->add_field('date_of_birth', 'Date Of Birth', 'required');
		$val->add_field('phone_number', 'Phone Number', 'required');
		$val->add_field('nationality', 'Nationality', 'required|max_length[255]');
		$val->add_field('occupation', 'Occupation', 'required|max_length[255]');
		$val->add_field('national_id', 'National Id', 'required|max_length[255]');
		$val->add_field('address', 'Address', 'required|max_length[255]');
		$val->add_field('next_of_kin', 'Next Of Kin', 'required|max_length[255]');
		$val->add_field('phone_no', 'Phone No', 'required');

		return $val;
	}

}
