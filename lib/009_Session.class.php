<?php class Session
{
	const FLASH_OK = 'success';
	const FLASH_INFO = 'info';
	const FLASH_ERROR = 'alert ';
	const FLASH_WARNING = 'warning';
	const FLASH_REGULAR = 'secondary';

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

	public static function flash($title, $message = '', $decoration = false)
	{
		if (self::get($title)) {
			$message = self::get($title);
			self::remove($title);
			return $message;
		} else {
			if ($decoration) $message = '<div data-alert class="alert-box radius ' . $decoration . '">'
										. $message . ' <a href="#" class="close">&times;</a></div>';
			self::put($title, $message);
		}
		return '';
	}

	public static function destroy()
	{
		session_destroy();
	}
}