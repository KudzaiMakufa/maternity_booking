<?php

class Controller_Pregstat extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Pregstat &raquo; Index';
		$this->template->content = View::forge('pregstat/index', $data);
	}

}
