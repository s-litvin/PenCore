<?php class Session
{
	public static function put($name, $value)
	{
		$_SESSION[$name] = $value;
	}

	public static function get($name)
	{
		return $_SESSION[$name] ? $_SESSION[$name] : false;
	}

	public static function remove($name)
	{
		unset($_SESSION[$name]);
	}
}