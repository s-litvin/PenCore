<?php class AppParams
{
	static public $is_ajaxed  = false;
	static public $is_android = false;
	static public $is_admin   = false;

	static public $meta_title;
	static public $meta_keys;
	static public $meta_desc;
	static public $meta_canonical;

	static public $views_dir = 'app/views';
	static public $templates_dir = 'app/views';

	static public $breadcrumbs;

	static public $actual_url;

	static public $controller_url;
	static public $controller_url_with_actions;

	static public $controller_path;
	static public $controller;
	static public $controller_postfix = 'Controller.class.php';

	static public $action;

	public static function add($var, $val)
	{
		self::$$var = $val;
	}

	public static function setController($name)
	{
		self::$controller = ucfirst(strtolower($name));
	}

	public static function setAction($name)
	{
		self::$action = strtolower($name);
	}

}