<?php class Index extends AppController
{
	public function view()
	{

		$log = DB::query('SELECT * FROM browsing_log LIMIT 20');

		$this->setView('index/index', array('log' => $log));
		$this->setTemplate('main');
	}

}