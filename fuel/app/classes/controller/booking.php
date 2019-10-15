<?php
class Controller_Booking extends Controller_Template
{
	
	public function action_index()
	{
		list(, $userid) = Auth::get_user_id();
		$data['bookings'] = Model_Booking::find(array('where'=>array('user_id'=>$userid)));
		$this->template->title = "Bookings";
		$this->template->content = View::forge('booking/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('booking');

		$data['booking'] = Model_Booking::find_by_pk($id);

		$this->template->title = "Booking";
		$this->template->content = View::forge('booking/view', $data);

	}

	public function action_create()
	{
		list(, $userid) = Auth::get_user_id();
		
	
		if (Input::method() == 'POST')
		{
			
			$val = Model_Booking::validate('create');

			if ($val->run())
			{
				$booking = Model_Booking::forge(array(
					'user_id' => $userid,
					'pregnancy_number' => Input::post('pregnancy_number'),
					'conception_date' => Input::post('conception_date'),
					'child_birth_date' => Input::post('child_birth_date'),
					'brief_medical_history' => Input::post('brief_medical_history'),
					'created_at' => time(),
					'updated_at' => time(),
				));

				if ($booking and $booking->save())
				{
					Session::set_flash('success', 'Added booking #'.$booking->id.'.');
					Response::redirect('booking');
				}
				else
				{
					Session::set_flash('error', 'Could not save booking.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Bookings";
		$this->template->content = View::forge('booking/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('booking');

		$booking = Model_Booking::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Booking::validate('edit');

			if ($val->run())
			{
				
				$booking->pregnancy_number = Input::post('pregnancy_number');
				$booking->conception_date = Input::post('conception_date');
				$booking->child_birth_date = Input::post('child_birth_date');
				$booking->brief_medical_history = Input::post('brief_medical_history');

				if ($booking->save())
				{
					Session::set_flash('success', 'Updated booking #'.$id);
					Response::redirect('booking');
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

		$this->template->set_global('booking', $booking, false);
		$this->template->title = "Bookings";
		$this->template->content = View::forge('booking/edit');

	}

	public function action_delete($id = null)
	{
		if ($booking = Model_Booking::find_one_by_id($id))
		{
			$booking->delete();

			Session::set_flash('success', 'Deleted booking #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete booking #'.$id);
		}

		Response::redirect('booking');

	}

}
