<?php class Index extends AppController
{
	public function view()
	{
		$users = DB::query('SELECT * FROM users');

		$this->setView('index/index', array('users' => $users));
		$this->setTemplate('main', array('p' => 'Template #2'));
	}
}