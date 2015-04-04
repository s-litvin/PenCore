<?php class Validate
{
	public static function _makePass($str)
	{
		return md5($str . '8KJn0daKjQwzxSnf234');
	}

	public static function email($email)
	{
		return preg_match('/^[\w\D]+@[\w]+.[\w\D]{0,2}$/ui', $email);
	}
	public static function pass($pass)
	{
		if (strlen($pass) < 6) return false;
		return true;
	}
}