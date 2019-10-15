<?php
class Controller_Maternity extends Controller_Template
{

	public function action_index()
	{
		$data['maternities'] = Model_Maternity::find_all();
		$this->template->title = "Maternity Bookings";
		$this->template->content = View::forge('maternity/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('maternity');

		$data['maternity'] = Model_Maternity::find_by_pk($id);

		$this->template->title = "Maternity";
		$this->template->content = View::forge('maternity/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Maternity::validate('create');

			if ($val->run())
			{
				$maternity = Model_Maternity::forge(array(
					'first_name' => Input::post('first_name'),
					'surname' => Input::post('surname'),
					'date_of_birth' => Input::post('date_of_birth'),
					'phone_number' => Input::post('phone_number'),
					'nationality' => Input::post('nationality'),
					'occupation' => Input::post('occupation'),
					'national_id' => Input::post('national_id'),
					'address' => Input::post('address'),
					'next_of_kin' => Input::post('next_of_kin'),
					'phone_no' => Input::post('phone_no'),
					'created_at' => time(),
					'updated_at' =>'0' 

					
				));

				if(Input::post('password') == Input::post('confirm')){

					 // create a new user
					 if(Auth::create_user(
						Input::post('phone_number'),
						'pass123',
						Input::post('occupation'),
						1,
						array(
							'national_id' => Input::post('national_id'),
						)
					) && $maternity->save() ){

						
							Session::set_flash('success', 'Added maternity #'.$maternity->id.'.');
							Response::redirect('maternity');
					
					
						
					}
					else{
						Session::set_flash('error', 'Could not book maternity.');
					}
			

				}
				else{

					Session::set_flash('error', 'Passwords do not match ');
					
				}


				
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Maternity Booking";
		$this->template->content = View::forge('maternity/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('maternity');

		$maternity = Model_Maternity::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Maternity::validate('edit');

			if ($val->run())
			{
				$maternity->first_name = Input::post('first_name');
				$maternity->surname = Input::post('surname');
				$maternity->date_of_birth = Input::post('date_of_birth');
				$maternity->phone_number = Input::post('phone_number');
				$maternity->nationality = Input::post('nationality');
				$maternity->occupation = Input::post('occupation');
				$maternity->national_id = Input::post('national_id');
				$maternity->address = Input::post('address');
				$maternity->next_of_kin = Input::post('next_of_kin');
				$maternity->phone_no = Input::post('phone_no');

				if ($maternity->save())
				{
					Session::set_flash('success', 'Updated maternity #'.$id);
					Response::redirect('maternity');
				}
				else
				{
					Session::set_flash('error', 'Nothing updated.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->set_global('maternity', $maternity, false);
		$this->template->title = "Maternities";
		$this->template->content = View::forge('maternity/edit');

	}

	public function action_delete($id = null)
	{
		if ($maternity = Model_Maternity::find_one_by_id($id))
		{
			$maternity->delete();

			Session::set_flash('success', 'Deleted maternity #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete maternity #'.$id);
		}

		Response::redirect('maternity');

	}

}
