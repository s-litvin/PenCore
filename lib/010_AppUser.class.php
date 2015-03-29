<?php class AppUser
{
	private static $_browsers = array(
		'Opera' => 1,
		'Chrome' => 2,
		'MSIE' => 3,
		'Safari' => 4,
		'Firefox' => 5,
		'Yandex' => 7
	);

	private static $_unknow_browser = 6;
	
	public static function user($field = false)
	{
		if ($user = Session::get('user')) {
			return $user[$field];
		}
		return false;
	}

	public static function ip()
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) return $_SERVER['HTTP_CLIENT_IP'];
		if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) return $_SERVER['HTTP_X_FORWARDED_FOR'];
		return $ip=$_SERVER['REMOTE_ADDR'];
	}

	public static function browser()
	{
		foreach(self::$_browsers as $browser_name => $id) {
			if (stristr($_SERVER['HTTP_USER_AGENT'], $browser_name)) return $id;
		}
		return self::$_unknow_browser;
	}

	public static function getCookie($name)
	{
		return (isset($_COOKIE[$name])) ? $_COOKIE[$name] : false;
	}

	public static function setCookie($name, $value = 1, $lifetime = 0x6FFFFFFF)
	{
		setcookie($name, $value , $lifetime);
	}
}