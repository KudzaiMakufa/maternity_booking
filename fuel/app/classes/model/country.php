<?php
class Model_Country extends Model_Crud
{
	protected static $_table_name = 'countries';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('country_code', 'Country Code', 'required|max_length[255]');
		$val->add_field('country_name', 'Country Name', 'required|max_length[255]');

		return $val;
	}

}
