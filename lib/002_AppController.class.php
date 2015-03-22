<?php class AppController
{
	protected $_default_action = 'view';
	protected $_view_params = array();


	public static function setTemplate($template, $params = array())
	{
		return AppDesigner::setTemplate($template, $params);
	}

	public static function setView($view, $params = array())
	{
		return AppDesigner::setView($view, $params);
	}
}