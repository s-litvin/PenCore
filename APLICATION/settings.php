<?php
define('ROOTH_PATH', dirname(__FILE__) . '/');
define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/');
define('CORE_PATH', '../pencore/');

if ($_SERVER['HTTP_HOST'] == 'pen.loc') {
	define('DB_NAME', 'pen');
	define('DB_USER', 'root');
	define('DB_PASS', '111');
	define('DB_HOST', 'localhost');
} else {
	define('DB_NAME', 'pen');
	define('DB_USER', 'root');
	define('DB_PASS', '111');
	define('DB_HOST', 'localhost');
}

require_once(CORE_PATH . 'core.php');