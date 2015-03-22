<?php class Includer
{
	public static function inc_dir($dir_path)
	{
		foreach (glob($dir_path . '*.php') as $filename)
		{
			require_once $filename;
		}
	}
}