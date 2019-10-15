<?php
class Controller_Country extends Controller_Template
{

	public function action_index()
	{
		$data['countries'] = Model_Country::find_all();
		$this->template->title = "Countries";
		$this->template->content = View::forge('country/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('country');

		$data['country'] = Model_Country::find_by_pk($id);

		$this->template->title = "Country";
		$this->template->content = View::forge('country/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Country::validate('create');

			if ($val->run())
			{
				$country = Model_Country::forge(array(
					'country_code' => Input::post('country_code'),
					'country_name' => Input::post('country_name'),
				));

				if ($country and $country->save())
				{
					Session::set_flash('success', 'Added country #'.$country->id.'.');
					Response::redirect('country');
				}
				else
				{
					Session::set_flash('error', 'Could not save country.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Countries";
		$this->template->content = View::forge('country/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('country');

		$country = Model_Country::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Country::validate('edit');

			if ($val->run())
			{
				$country->country_code = Input::post('country_code');
				$country->country_name = Input::post('country_name');

				if ($country->save())
				{
					Session::set_flash('success', 'Updated country #'.$id);
					Response::redirect('country');
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

		$this->template->set_global('country', $country, false);
		$this->template->title = "Countries";
		$this->template->content = View::forge('country/edit');

	}

	public function action_delete($id = null)
	{
		if ($country = Model_Country::find_one_by_id($id))
		{
			$country->delete();

			Session::set_flash('success', 'Deleted country #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete country #'.$id);
		}

		Response::redirect('country');

	}

}
