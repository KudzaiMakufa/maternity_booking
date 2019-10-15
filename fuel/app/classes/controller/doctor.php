<?php
class Controller_Doctor extends Controller_Template
{

	public function action_index()
	{
		$data['doctors'] = Model_Doctor::find_all();
		$this->template->title = "Doctors";
		$this->template->content = View::forge('doctor/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('doctor');

		$data['doctor'] = Model_Doctor::find_by_pk($id);

		$this->template->title = "Doctor";
		$this->template->content = View::forge('doctor/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Doctor::validate('create');

			if ($val->run())
			{
				$doctor = Model_Doctor::forge(array(
					'name' => Input::post('name'),
					'created_at'=>time(),
					'updated_at'=>0,
				));

				if ($doctor and $doctor->save())
				{
					Session::set_flash('success', 'Added doctor #'.$doctor->id.'.');
					Response::redirect('doctor');
				}
				else
				{
					Session::set_flash('error', 'Could not save doctor.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Doctors";
		$this->template->content = View::forge('doctor/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('doctor');

		$doctor = Model_Doctor::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Doctor::validate('edit');

			if ($val->run())
			{
				$doctor->name = Input::post('name');

				if ($doctor->save())
				{
					Session::set_flash('success', 'Updated doctor #'.$id);
					Response::redirect('doctor');
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

		$this->template->set_global('doctor', $doctor, false);
		$this->template->title = "Doctors";
		$this->template->content = View::forge('doctor/edit');

	}

	public function action_delete($id = null)
	{
		if ($doctor = Model_Doctor::find_one_by_id($id))
		{
			$doctor->delete();

			Session::set_flash('success', 'Deleted doctor #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete doctor #'.$id);
		}

		Response::redirect('doctor');

	}

}
