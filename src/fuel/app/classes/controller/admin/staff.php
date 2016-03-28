<?php
/**
 * 社員管理コントローラー
 *
 * @author
 * @since
 */
class Controller_Admin_Staff extends Controller_Admin
{
	private $_divisions;

	public function before()
	{
		parent::before();
		$this->template->title = '社員管理';

		// 部署データ設定
		$divisions = Model_Division::find('all');
		foreach ($divisions as $division)
		{
			$divisions_data[$division->id] = $division->name;
		}
		$this->_divisions = $divisions_data;
	}

	/**
	 * 一覧
	 */
	public function action_index()
	{
		$mongodb = \Mongo_Db::instance('default');
		$staffs = $mongodb->get('staff');

		$data = null;
		$data['staffs'] = $staffs;

		$data['display_title'] = '社員一覧';
		$this->template->content = View::forge('admin/staff/index', $data);
	}

	/**
	 * 新規登録ページ
	 */
	public function action_add()
	{
		$data = null;
		$data['display_title'] = '社員登録';

		$data['divisions'] = $this->_divisions;
		$this->template->content = View::forge('admin/staff/add', $data);
	}

	/**
	 * 登録確認
	 */
	public function action_addconfirm()
	{
		$val = $this->forge_validation();

		$data = null;

		if ($val->run())
		{
			$data['display_title'] = '社員登録';
			$this->template->content = View::forge('admin/staff/addconfirm', $data);
			$this->template->set_global('divisions', $this->_divisions);
			$this->template->set_global('input',  $val->validated());
		}
		else
		{
			$data['display_title'] = '社員登録';
			$this->template->content = View::forge('admin/staff/add', $data);
			$this->template->content->set_safe('html_error', $val->show_errors());
		}
	}

	public function forge_validation()
	{
		$val = Validation::forge();

		$val->add('id', 'ID');

		$val->add('num', '社員番号')
			->add_rule('trim')
			->add_rule('required')
			->add_rule('max_length', 4);

		$val->add('name', '名前')
			->add_rule('trim')
			->add_rule('required')
			->add_rule('max_length', 20);

		$val->add('sex', '性別');

		$val->add('division_id', '所属部署');

		return $val;
	}

	/**
	 * 新規登録処理
	 */
	public function action_send()
	{
		if (!Security::check_token())
		{
			return 'ページ遷移が正しくありません';
		}

		$data['display_title'] = '社員登録';

		$val = $this->forge_validation();
		if (!$val->run())
		{
			$this->template->content = View::forge('admin/staff/add', $data);
			$this->template->content->set_safe('html_error', $val->show_errors());
		}

		$id = Input::post('id');
		if (isset($id))
		{
			$staff = Model_Staff::find($id);
			$staff->num          = Input::post('num');
			$staff->name         = Input::post('name');
			$staff->sex          = Input::post('sex');
			$staff->division_id = Input::post('division_id');
		}
		else
		{
			$staff = Model_Staff::forge(array(
				'num'          => Input::post('num'),
				'name'         => Input::post('name'),
				'sex'          => Input::post('sex'),
				'division_id' => Input::post('division_id'),
			));
		}

		if ($staff->save())
		{
			Session::set_flash('success', e('登録しました!'));
		}
		else
		{
			Session::set_flash('error', e('エラーが発生しました'));
		}
		Response::redirect('admin/staff/index');
	}

	/**
	 * 削除処理
	 */
	public function action_delete($id)
	{
		$staff = Model_Staff::find($id);
		if ($staff->delete())
		{
			Session::set_flash('success', e('登録しました!'));
		}
		else
		{
			Session::set_flash('error', e('エラーが発生しました'));
		}
		Response::redirect('admin/staff/index');
	}

	/**
	 * 詳細ページ
	 */
	public function action_view($id)
	{
		$data = null;
		$data['display_title'] = '社員詳細';
		$data['divisions'] = $this->_divisions;

		$staff = Model_Staff::find($id);
		if (!isset($staff))
		{
			Session::set_flash('error', e('エラーが発生しました'));
			Response::redirect('admin/staff/index');
		}
		$data['staff'] = $staff;
		$this->template->content = View::forge('admin/staff/view', $data);
	}

	/**
	 * 編集ページ
	 */
	public function action_edit($id)
	{
		$data = null;
		$data['display_title'] = '社員編集';

		$data['divisions'] = $this->_divisions;

		$staff = Model_Staff::find($id);
		if (!isset($staff))
		{
			Session::set_flash('error', e('エラーが発生しました'));
			Response::redirect('admin/staff/index');
		}
		$data['staff'] = $staff;
		$this->template->content = View::forge('admin/staff/edit', $data);
	}

	/**
	 * 編集確認
	 */
	public function action_editconfirm()
	{
		$val = $this->forge_validation();

		$data = null;

		if ($val->run())
		{
			$data['display_title'] = '社員編集';
			$this->template->content = View::forge('admin/staff/editconfirm', $data);
			$this->template->set_global('divisions', $this->_divisions);
			$this->template->set_global('input',  $val->validated());
		}
		else
		{
			$data['display_title'] = '社員編集';
			$this->template->content = View::forge('admin/staff/edit', $data);
			$this->template->set_global('data', $data);
			$this->template->content->set_safe('html_error', $val->show_errors());
		}
	}
}