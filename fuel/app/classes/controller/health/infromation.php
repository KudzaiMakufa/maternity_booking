<?php
class Controller_Health_Infromation extends Controller_Template
{

	public function action_index()
	{
		$data['health_infromations'] = Model_Health_Infromation::find_all();
		$this->template->title = "Health_infromations";
		$this->template->content = View::forge('health/infromation/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('health/infromation');

		$data['health_infromation'] = Model_Health_Infromation::find_by_pk($id);

		$this->template->title = "Health_infromation";
		$this->template->content = View::forge('health/infromation/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Health_Infromation::validate('create');

			if ($val->run())
			{
				$health_infromation = Model_Health_Infromation::forge(array(
					'patient' => Input::post('patient'),
					'message' => Input::post('message'),
				));

				if ($health_infromation and $health_infromation->save())
				{
					Session::set_flash('success', 'Added health_infromation #'.$health_infromation->id.'.');
					Response::redirect('health/infromation');
				}
				else
				{
					Session::set_flash('error', 'Could not save health_infromation.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Health_Infromations";
		$this->template->content = View::forge('health/infromation/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('health/infromation');

		$health_infromation = Model_Health_Infromation::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Health_Infromation::validate('edit');

			if ($val->run())
			{
				$health_infromation->patient = Input::post('patient');
				$health_infromation->message = Input::post('message');

				if ($health_infromation->save())
				{
					Session::set_flash('success', 'Updated health_infromation #'.$id);
					Response::redirect('health/infromation');
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

		$this->template->set_global('health_infromation', $health_infromation, false);
		$this->template->title = "Health_infromations";
		$this->template->content = View::forge('health/infromation/edit');

	}

	public function action_delete($id = null)
	{
		if ($health_infromation = Model_Health_Infromation::find_one_by_id($id))
		{
			$health_infromation->delete();

			Session::set_flash('success', 'Deleted health_infromation #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete health_infromation #'.$id);
		}

		Response::redirect('health/infromation');

	}

}
