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

		$this->_divisions = array('開発部' => '開発部', '総務部' => '総務部');
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
			$this->template->set_global('divisions', $this->_divisions);
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

		$val->add('sex', '性別')
			->add_rule('required');

		$val->add('division', '所属部署')
			->add_rule('required');

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
			$mongodb = \Mongo_Db::instance('default');
			$result = $mongodb->where(array('_id' => new \MongoId($id)))->update('staff',
				array(
					'num'      => Input::post('num'),
					'name'     => Input::post('name'),
					'sex'      => Input::post('sex'),
					'division' => Input::post('division'),
				)
			);

			if ($result === true)
			{

				Session::set_flash('success', e('更新しました!'));
			}
			else
			{
				Session::set_flash('error', e('エラーが発生しました'));
			}
		}
		else
		{
			$mongodb = \Mongo_Db::instance('default');
			$insert_id = $mongodb->insert('staff', array(
				'num'      => Input::post('num'),
				'name'     => Input::post('name'),
				'sex'      => Input::post('sex'),
				'division' => Input::post('division'),
			));

			if ($insert_id !== false)
			{

				Session::set_flash('success', e('登録しました!'));
			}
			else
			{
				Session::set_flash('error', e('エラーが発生しました'));
			}
		}
		Response::redirect('admin/staff/index');
	}

	/**
	 * 削除処理
	 */
	public function action_delete($id)
	{
		$mongodb = \Mongo_Db::instance('default');
		$result = $mongodb->where(array('_id' => new \MongoId($id)))->delete('staff'); // _id指定する場合はpeclのMongoId関数を使用する
		if ($result)
		{
			Session::set_flash('success', e('削除しました!'));
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

		$mongodb = \Mongo_Db::instance('default');
		$staff = $mongodb->get_one('staff', array('_id' => new \MongoId($id)));
		if ($staff === false)
		{
			Session::set_flash('error', e('エラーが発生しました'));
			Response::redirect('admin/staff/index');
		}
		$data['staff'] = $staff;
		$data['divisions'] = $this->_divisions;
		$this->template->content = View::forge('admin/staff/edit', $data);
	}

	/**
	 * 編集確認
	 */
	public function action_editconfirm()
	{
		$val = $this->forge_validation();

		$data = null;
		$data['display_title'] = '社員編集';

		if ($val->run())
		{
			$this->template->content = View::forge('admin/staff/editconfirm', $data);
			$this->template->set_global('input',  $val->validated());
			$this->template->set_global('divisions', $this->_divisions);
		}
		else
		{
			$this->template->content = View::forge('admin/staff/edit', $data);
			$this->template->set_global('data', $data);
			$this->template->content->set_safe('html_error', $val->show_errors());
		}
	}
}