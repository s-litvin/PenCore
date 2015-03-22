<?php class Redirect extends AppController
{
	public function nopage()
	{
		$this->setView('404/404');
	}
}