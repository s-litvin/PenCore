<?php class DB extends BasicSingle
{
	protected static $connection = false;

	public function __construct()
	{
		if (!self::$connection) {
			self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			if (mysqli_connect_errno()) {
				throw new Exception('Подключение к серверу MySQL невозможно. Код ошибки: ' . mysqli_connect_error());
			}
		}
	}

	public static function query($str)
	{
		$array = array();
		self::getInstance();
		if ($result = self::$connection->query($str)) {
			if ($result !== true && $result !== false) {
				while ($array[] = $result->fetch_assoc()) {
				}
				array_pop($array);
				$result->close();
			} else $array = $result;
		}
		self::$connection->close();
		return $array;
	}
}