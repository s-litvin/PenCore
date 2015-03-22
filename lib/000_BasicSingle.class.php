<?php class BasicSingle
{
	protected static $_instance = false;

	function __construct()
	{}

	function getInstance()
	{
		if (!self::$_instance) {
			static::$_instance = new static();
		}
		return static::$_instance;
	}

}