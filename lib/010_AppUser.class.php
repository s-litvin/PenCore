<?php class AppUser
{
	public static function user($field = false)
	{
		if ($user = Session::get('user')) {
			return $user[$field];
		}
		return false;
	}
}