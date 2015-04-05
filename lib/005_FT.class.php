<?php class FT
{
	public static function prepUrl($str)
	{
		// @todo deep parse string
		if (preg_match('/^http\:\/\//ui', $str)) return $str;
		return SITE_URL . $str;
	}

	public static function prepPath($str)
	{
		return APP_PATH . $str;
	}
	public static function prepDate($timestamp, $format = 'mysql')
	{
		switch ($format) {
			case 'standard':
				$format = 'F j, Y, g:i a'; // March 10, 2001, 5:16 pm
				break;
			case 'graph': $format = 'd M. D';        // 10 Mar. 2001
				break;
			case 'date': $format = 'd.m.Y';         // 10.03.2001
				break;
			case 'date_mysql': $format = 'Y-m-d';         // 2001-03-10
				break;
			case 'time': $format = 'H:i:s';         // 17:16:18
				break;
			case 'mysql': $format = 'Y-m-d H:i:s';   // 2001-03-10 17:16:18 (формат MySQL DATETIME)
				break;
			case 'jp': $format = 'Y/m/d H:i:s';   // 2001/03/10 17:16:18
				break;
			case 'eu': $format = 'd.m.Y H:i:s';   // 10.03.2001 17:16:18
				break;
			case 'usa': $format = 'm/d/Y H:i:s';   // 3/10/2001 17:16:18 (USA)
				break;
			case 'full': $format = 'D M j G:i:s T Y'; // Sat Mar 10 17:16:18 MST 2001
				break;
			case 'day_number': $format = 'jS';              // 10th
				break;
			case 'monolite': $format = 'YmdHis';          // 20010310171618
				break;
			default: $format = 'Y-m-d H:i';       // 2001-03-10 17:16
		}
		return date($format, $timestamp);
	}
}