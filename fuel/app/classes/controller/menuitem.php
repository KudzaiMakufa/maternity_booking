<?php
class Controller_Menuitem extends Controller_Template
{

	public function action_index()
	{
		$data['menuitems'] = Model_Menuitem::find_all();
		$this->template->title = "Menuitems";
		$this->template->content = View::forge('menuitem/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('menuitem');

		$data['menuitem'] = Model_Menuitem::find_by_pk($id);

		$this->template->title = "Menuitem";
		$this->template->content = View::forge('menuitem/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Menuitem::validate('create');

			if ($val->run())
			{
				$menuitem = Model_Menuitem::forge(array(
					'name' => Input::post('name'),
					'url' => Input::post('url'),
					'role' => Input::post('role'),
					'class' => Input::post('class'),
					'created_at'=>time(),
					'updated_at'=>0,
				));

				if ($menuitem and $menuitem->save())
				{
					Session::set_flash('success', 'Added menuitem #'.$menuitem->id.'.');
					Response::redirect('menuitem');
				}
				else
				{
					Session::set_flash('error', 'Could not save menuitem.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Menuitems";
		$this->template->content = View::forge('menuitem/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('menuitem');

		$menuitem = Model_Menuitem::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Menuitem::validate('edit');

			if ($val->run())
			{
				$menuitem->name = Input::post('name');
				$menuitem->url = Input::post('url');
				$menuitem->role = Input::post('role');
				$menuitem->class = Input::post('class');

				if ($menuitem->save())
				{
					Session::set_flash('success', 'Updated menuitem #'.$id);
					Response::redirect('menuitem');
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

		$this->template->set_global('menuitem', $menuitem, false);
		$this->template->title = "Menuitems";
		$this->template->content = View::forge('menuitem/edit');

	}

	public function action_delete($id = null)
	{
		if ($menuitem = Model_Menuitem::find_one_by_id($id))
		{
			$menuitem->delete();

			Session::set_flash('success', 'Deleted menuitem #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete menuitem #'.$id);
		}

		Response::redirect('menuitem');

	}

}
