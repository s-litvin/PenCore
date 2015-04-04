<?php class DB extends BasicSingle
{
	private static $connection = false;

	public function __construct()
	{
		if (!self::$connection) {
			self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			if (mysqli_connect_errno()) {
				throw new Exception('Подключение к серверу MySQL невозможно. Код ошибки: ' . mysqli_connect_error());
			}
		}
	}

	public static function query($str, $type = null, $cache = false)
	{
		$array = array();
		if ($cache && file_exists(DB_CACHE_PATH . md5($str) . '.php')) {
			return unserialize(file_get_contents(DB_CACHE_PATH . md5($str) . '.php'));
		} else {
			self::getInstance();
			$result = self::$connection->query($str);
		}
		if ($result) {
			if ($result !== true && $result !== false) {
				while ($array[] = $result->fetch_assoc()) {
				}
				array_pop($array);
				if (!$type) $array = $array[0];
				$result->close();
			} else $array = $result;
		} else return false;
//		self::$connection->close(); // to destruct
		if ($cache) {
			if (!file_exists(DB_CACHE_PATH)) {
				// @todo RIGHTS!!!! HIDE IT!!!!
			    mkdir(DB_CACHE_PATH, 0777, true);
				file_put_contents(DB_CACHE_PATH . '.htaccess', 'deny from all');
			}
			file_put_contents(DB_CACHE_PATH . md5($str) . '.php', serialize($array));
		}
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

	public static function escape($str)
	{
		return htmlentities($str, ENT_QUOTES, 'UTF-8');
	}
}