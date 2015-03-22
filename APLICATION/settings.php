<?php
define('ROOTH_PATH', dirname(__FILE__));
define('SITE_URL', $_SERVER['HTTP_HOST']);
define('CORE_PATH', '../pencore/');

if ($_SERVER['HTTP_HOST'] == 'chat.loc') {
	define('DB_NAME', 'chat');
	define('DB_USER', 'root');
	define('DB_PASS', '111');
	define('DB_HOST', 'localhost');
}

require_once(CORE_PATH . 'core.php');