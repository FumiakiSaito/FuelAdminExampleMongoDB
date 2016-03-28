<?php
use Fuel\Core\Config;
class Controller_Admin extends Controller_Base
{
	public $template = 'admin/template';
	public function before()
	{
		parent::before();

		if (Request::active()->controller !== 'Controller_Admin' or ! in_array(Request::active()->action, array('login', 'logout'))) {
			if (Auth::check()) {
				$admin_group_id = Config::get('auth.driver', 'Simpleauth') == 'Ormauth' ? 6 : 100;
				if ( ! Auth::member($admin_group_id)) {
					Session::set_flash('error', e('You don\'t have access to the admin panel'));
					Response::redirect('/');
				}
			} else {
				Response::redirect('admin/login');
			}
		}
	}

	public function action_login()
	{
		Auth::check() and Response::redirect('admin');

		$val = Validation::forge();

		if (Input::method() == 'POST') {
			$val->add('account', 'ユーザーID')->add_rule('required');
			$val->add('password', 'パスワード')->add_rule('required');

			if ($val->run()) {
				$auth = Auth::instance();

				if (Auth::check() or $auth->login(Input::post('account'), Input::post('password'))) {
					if (Config::get('auth.driver', 'Simpleauth') == 'Ormauth') {
						$current_user = Model\Auth_User::find_by_username(Auth::get_screen_name());
					} else {
						$current_user = Model_Admin::find_by_username(Auth::get_screen_name());
					}
					Session::set_flash('success', e('Welcome, '.$current_user->username));
					Response::redirect('admin');
				} else {
					$this->template->set_global('login_error', 'ユーザーIDまたはパスワードの入力に誤りがあります。');
				}
			}
		}

		$this->template->title = Config::get('title') . ' - ログイン';
		$this->template->content = View::forge('admin/login', array('val' => $val), false);
	}

	/**
	 * The logout action.
	 *
	 * @access  public
	 * @return  void
	 */
	public function action_logout()
	{
		Auth::logout();
		Response::redirect('admin');
	}

	/**
	 * The index action.
	 *
	 * @access  public
	 * @return  void
	 */
	public function action_index()
	{
		$this->template->title = 'ホーム';
		$this->template->content = View::forge('admin/dashboard');
	}

}
