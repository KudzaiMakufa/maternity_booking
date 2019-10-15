<?php
class Controller_Appointment extends Controller_Template
{

	public function action_index()
	{
			list(, $userid) = Auth::get_user_id();
		$data['appointments'] = Model_Appointment::find(array('where'=>array('user_id'=>$userid),'order_by'=>array('id'=>'desc')));
		$this->template->title = "Appointments";
		$this->template->content = View::forge('appointment/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('appointment');

		$data['appointment'] = Model_Appointment::find_by_pk($id);

		$this->template->title = "Appointment";
		$this->template->content = View::forge('appointment/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Appointment::validate('create');

			if ($val->run())
			{
				$appointment = Model_Appointment::forge(array(
					'date' => Input::post('date'),
					'time' => Input::post('time'),
					'user_id' => Input::post('user_id'),
					'doctor' => Input::post('doctor'),
					'isread' => false,
					'created_at' => time(),
					'updated_at' => 0,
				));



				if ($appointment and $appointment->save())
				{
					Session::set_flash('success', 'Added appointment #'.$appointment->id.'.');
					Response::redirect('appointment');
				}
				else
				{
					Session::set_flash('error', 'Could not save appointment.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Appointments";
		$this->template->content = View::forge('appointment/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('appointment');

		$appointment = Model_Appointment::find_one_by_id($id);

		$appointment->isread = 1;

		if ($appointment->save())
		{
			Session::set_flash('success', 'Marked Appointment as read #'.$id);
			Response::redirect('appointment');
		}
		else
		{
			Session::set_flash('error', 'Nothing updated.');
			Response::redirect('appointment');
		}

		

		$this->template->set_global('appointment', $appointment, false);
		$this->template->title = "Appointments";
		$this->template->content = View::forge('appointment/edit');

	}

	public function action_delete($id = null)
	{
		if ($appointment = Model_Appointment::find_one_by_id($id))
		{
			$appointment->delete();

			Session::set_flash('success', 'Deleted appointment #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete appointment #'.$id);
		}

		Response::redirect('appointment');

	}

}
