<?php
require_once('settings.php');

try {
	AppRouter::route($_SERVER['REQUEST_URI']);
} catch (Exception $e){
	echo 'Error: ',  $e->getMessage(), "\n";
}