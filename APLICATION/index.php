<?php
require_once('settings.php');

try {
	AppRouter::route($_REQUEST['url']);
} catch (Exception $e){
	echo 'Error: ',  $e->getMessage(), "\n";
}