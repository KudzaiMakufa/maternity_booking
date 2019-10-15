<?php
class Controller_User extends Controller_Template
{
	public $template = 'sfv2_landing_tmpl';
	public function action_register()
	{

        
        // create a new user
        Auth::create_user(
            'promisemakufa',
            'pass123',
            'admin@admin.com',
            1,
            array(
                'fullname' => 'P K systems',
            )
        );

        $this->template->title = "User";
        $this->template->content = View::forge('user/register');
    }
    public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Maternity::validate('create');

			if ($val->run())
			{
				

				if(Input::post('password') == Input::post('confirm')){

					 // create a new user
					
					 	$user = Auth::create_user(
						Input::post('phone_number'),
						Input::post('password'),
						Input::post('occupation'),
						1,
						array(
							'national_id' => Input::post('national_id'),
							 'role' => 'patient',
						),
						);

						$maternity = Model_Maternity::forge(array(
						'user_id' => $user,
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
						'updated_at' =>'0' ,

						));

						if($user && $maternity->save() )
						{

						
							Session::set_flash('success', 'Registration completed please login to your account');
							Response::redirect('login');
						
						}

						else
						{
							Session::set_flash('error', 'Could not create user account');
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
		$this->template->content = View::forge('user/create');

	}

	public function action_logout()
	{

			Auth::logout();
				Session::set_flash('success', 'You have been logged off ');
				Response::redirect('login');
		

        $this->template->title = "User";
        $this->template->content = View::forge('test/test');
    }

 
}