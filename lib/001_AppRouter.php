<?php class AppRouter
{
	public static function route($path)
	{
		include_once('007_Includer.class.php');
		Includer::inc_dir(CORE_PATH . 'lib/');
		// @todo include only needed libs (отключать все и вести лог ошибок и автоматически создавать файл необходимых либ)
		Includer::inc_dir(ROOTH_PATH . 'app/lib/helpers/');
		Includer::inc_dir(ROOTH_PATH . 'app/lib/models/');

		// controller/action/params
//		preg_match('/^([^\\?]+)\\?(.+)/i', $path, $matches);
		$path_array = explode('/', $path);
		AppParams::$controller = $path_array[0] ? array_shift($path_array) : 'index';
		AppParams::$action     = $path_array[0] ? array_shift($path_array) : 'view';
		AppParams::$controller_path = ROOTH_PATH . 'app/controllers/' . AppParams::$controller . AppParams::$controller_postfix;

		if (!is_file(AppParams::$controller_path)) {
			AppParams::$action = 'nopage';
			AppParams::$controller_path = FT::prepPath('app/controllers/redirect' . AppParams::$controller_postfix);
			AppParams::$controller = 'redirect';
		}

		$params = $path_array; // остатки массива пойдут в качестве параметров

		try {
			// include libs
			include_once(AppParams::$controller_path);
			// new object & check for method exists
			$controller_object = new AppParams::$controller();
			if (!method_exists($controller_object, AppParams::$action)) {
				AppParams::$action = 'view';
			}
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