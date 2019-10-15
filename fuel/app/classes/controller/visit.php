<?php
class Controller_Visit extends Controller_Template
{

	public function action_index()
	{
		list(, $userid) = Auth::get_user_id();
		
		$data['visits'] = Model_Visit::find(array('where'=>array('user_id'=>$userid)));
		$this->template->title = "Visits";
		$this->template->content = View::forge('visit/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('visit');

		$data['visit'] = Model_Visit::find_by_pk($id);

		$this->template->title = "Visit";
		$this->template->content = View::forge('visit/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Visit::validate('create');

			if ($val->run())
			{
				$visit = Model_Visit::forge(array(
					'user_id'=> Input::post('patient'),
					'date' => Input::post('date'),
					'patient' => Input::post('patient'),
					'weight' => Input::post('weight'),
					'blood_pressure' => Input::post('blood_pressure'),
					'temperature' => Input::post('temperature'),
					'foetus_position' => Input::post('foetus_position'),
					'brief_notes' => Input::post('brief_notes'),
					'created_at' => time(),
					'updated_at' =>'0' 
				));

				if ($visit and $visit->save())
				{
					Session::set_flash('success', 'Added visit #'.$visit->id.'.');
					Response::redirect('visit');
				}
				else
				{
					Session::set_flash('error', 'Could not save visit.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Visits";
		$this->template->content = View::forge('visit/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('visit');

		$visit = Model_Visit::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Visit::validate('edit');

			if ($val->run())
			{
				$visit->date = Input::post('date');
				$visit->patient = Input::post('patient');
				$visit->weight = Input::post('weight');
				$visit->blood_pressure = Input::post('blood_pressure');
				$visit->temperature = Input::post('temperature');
				$visit->foetus_position = Input::post('foetus_position');
				$visit->brief_notes = Input::post('brief_notes');

				if ($visit->save())
				{
					Session::set_flash('success', 'Updated visit #'.$id);
					Response::redirect('visit');
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

		$this->template->set_global('visit', $visit, false);
		$this->template->title = "Visits";
		$this->template->content = View::forge('visit/edit');

	}

	public function action_delete($id = null)
	{
		if ($visit = Model_Visit::find_one_by_id($id))
		{
			$visit->delete();

			Session::set_flash('success', 'Deleted visit #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete visit #'.$id);
		}

		Response::redirect('visit');

	}

}
