<?php

class Controller_Base extends Controller_Template {

	public function before()
	{
		parent::before();

		// Assign current_user to the instance so controllers can use it
		if (Config::get('auth.driver', 'Simpleauth') == 'Ormauth')
		{
			$this->current_user = Auth::check() ? Model\Auth_User::find_by_username(Auth::get_screen_name()) : null;
		}
		else
		{
			$this->current_user = Auth::check() ? Model_Admin::find_by_username(Auth::get_screen_name()) : null;
		}

		// Set a global variable so views can use it
		View::set_global('current_user', $this->current_user);
	}

}