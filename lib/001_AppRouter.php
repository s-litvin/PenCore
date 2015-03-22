<?php class AppRouter
{
	public static function route($path)
	{
		include_once('007_Includer.class.php');
		Includer::inc_dir(CORE_PATH . 'lib/');
		// @todo include only needed libs
		Includer::inc_dir(ROOTH_PATH . 'app/lib/helpers/');
		Includer::inc_dir(ROOTH_PATH . 'app/lib/models/');

		// controller/action/params
//		preg_match('/^([^\\?]+)\\?(.+)/i', $path, $matches);
		$path_array = explode('/', $path);
		AppParams::$controller = $path_array[0] ? $path_array[0] : 'index';
		AppParams::$action     = $path_array[1] ? $path_array[1] : 'view';
		AppParams::$controller_path = ROOTH_PATH . 'app/controllers/' . AppParams::$controller . AppParams::$controller_postfix;

		if (!is_file(AppParams::$controller_path)) {
			AppParams::$action = 'nopage';
			AppParams::$controller_path = FT::prepPath('app/controllers/redirect' . AppParams::$controller_postfix);
			AppParams::$controller = 'redirect';
		}

		$params = (isset($path_array[3])) ? $path_array[3] : false;

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