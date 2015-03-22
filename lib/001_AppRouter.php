<?php class AppRouter
{
	public static function route($path)
	{
		include_once('000_BasicSingle.class.php');
		include_once('002_AppController.class.php');
		include_once('003_AppDesigner.class.php');
		include_once('004_AppParams.class.php');
		include_once('005_FT.class.php');
		include_once('006_DB.class.php');
		// prep path
		// explode, prep and check for isset controller

		//@todo full path parse with params and hash's
		$path_array = explode('/', $path);
		AppParams::$controller = $path_array[1];
		AppParams::$action     = $path_array[2];
		AppParams::$controller_path = ROOTH_PATH . '/app/controllers/' . AppParams::$controller . AppParams::$controller_postfix;

		if (!is_file(AppParams::$controller_path)) {
			AppParams::$action = 'view';
			AppParams::$controller_path = FT::prepPath('app/controllers/index' . AppParams::$controller_postfix);
			AppParams::$controller = 'index';
		}

		try {
			// include libs
			include_once(AppParams::$controller_path);
			// new object
			$controller_object = new AppParams::$controller();
			$result = $controller_object->{AppParams::$action}($params);
			ob_start();
			AppDesigner::getHtml();
			$html = ob_get_contents();
			ob_end_clean();
			echo $html;
		} catch (Exception $e) {
			throw $e;
		}
	}
}