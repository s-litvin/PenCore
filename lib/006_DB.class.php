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

	public static function query($str, $type = false)
	{
		$array = array();
		self::getInstance();
		if ($result = self::$connection->query($str)) {
			if ($result !== true && $result !== false) {
				while ($array[] = $result->fetch_assoc()) {
				}
				array_pop($array);
				if (!$type) $array = $array[0];
				$result->close();
			} else $array = $result;
		} else return false;
//		self::$connection->close();
		return $array;
	}

	public static function insert($table, $rows)
	{
		if (!$table || !is_array($rows)) return false;
		foreach($rows as $field => $value) {
			$fields[] = $field;
			$values[] = $value;
		}
		if (!$fields || !$values) return false;
		return DB::query('INSERT INTO ' . $table . ' (' . implode(',', $fields) . ') VALUES ("' . implode('", "', $values) . '");');
	}
}