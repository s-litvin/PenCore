<?php
// вынести в корневую папку сайта и вызывать хуком из битбакета (в .htacces должно стоять исклучение от редиректа) 
if (preg_match('/bitbucket.org$/ui', gethostbyaddr($_SERVER['REMOTE_ADDR']))) {
	$ROOT_PATH = dirname(__FILE__) . '/';
	$settings = array('app_path' => 'application/',
	                  'core_path' => 'pencore/');

	function removeDirAndSubdirs($dir)
	{
		if (is_dir($dir)) {
			$objects = scandir($dir);
			foreach ($objects as $object) {
				if ($object != "." && $object != "..") {
					if (filetype($dir . "/" . $object) == "dir") {
						removeDirAndSubdirs($dir . "/" . $object);
					} else {
						unlink($dir . "/" . $object);
					}
				}
			}
			reset($objects);
			rmdir($dir);
		}
	}

	$arch_file = 'tmp.zip';
	if (isset($_GET['core']) && $_GET['core']) {
		$url = 'https://bitbucket.org/s_litvin/pencore/get/HEAD.zip';
		$dir = $settings['core_path'];
		$remove_to_root = false;
	} else {
		$url = 'https://bitbucket.org/s_litvin/pen.hol.es/get/HEAD.zip';
		$dir = $settings['app_path'];
		$remove_to_root = true;
	}

	if (is_dir($ROOT_PATH . 'old_' . $dir)) {
		removeDirAndSubdirs($ROOT_PATH . 'old_' . $dir);
	}

	$fp = fopen($arch_file, "w");

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_USERPWD, "robo_reader:6dbdc633575b5166f25f6c071f854c93");
	curl_setopt($ch, CURLOPT_FILE, $fp);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	$resp = curl_exec($ch);

	$zip = new ZipArchive;
	if ($zip->open($arch_file) === true) {
		$subfolder_name = $zip->getNameIndex(0);
		$zip->extractTo($ROOT_PATH);
		$zip->close();
		if (is_dir($ROOT_PATH . $dir)) {
			rename($ROOT_PATH . $dir, $ROOT_PATH . 'old_' . $dir);
		}
		rename($ROOT_PATH . $subfolder_name, $ROOT_PATH . $dir);

		if ($remove_to_root) {

		}
	}
}
?>