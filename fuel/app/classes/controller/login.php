<?php
class Controller_Login extends Controller_Template
{
	public $template = 'sfv2_landing_tmpl';

	public function action_index()														
	{ 
		

		if (Input::method() == 'POST')
		{
			$val = Model_Login::validate('create');
			$userid = null ;

			if ($val->run())
			{
				$username = Input::post('username');
				$password = Input::post('password');


				if (Auth::login($username, $password))
				{
						$rolename = Auth::get_profile_fields('role') ;
						if($rolename == 'patient'){
							Response::redirect('booking/create');
						}
						else{
							Response::redirect('visit/create');
						}
					
				}
				else{
					Session::set_flash('error', 'Incorrect Username or Password');
				}
				
			}
			else
			{
				Session::set_flash('error', $val->error());
			}

		
	}
	$this->template->title = "User Login";
	$this->template->content = View::forge('user/guest_form');
	
	}	

}
