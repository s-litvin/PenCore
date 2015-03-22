<?php class FT
{
	public static function prepUrl($str)
	{
		// @todo deep parse string
		return SITE_URL . '/' . $str;
	}

	public static function prepPath($str)
	{
		return ROOTH_PATH . '/' . $str;
	}
}