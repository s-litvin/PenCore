<?php class F
{
	public static function get($name)
	{
		if (isset($_GET[$name])) return $_GET[$name];
		if (isset($_POST[$name])) return $_POST[$name];
		return false;
	}
}