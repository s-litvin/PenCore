<?php class AppRouter
{
	public static function route($path)
	{
		include_once('007_Includer.class.php');
		Includer::inc_dir(CORE_PATH . 'lib/');
		// @todo include only needed libs (отключать все и вести лог ошибок и автоматически создавать файл необходимых либ)
		Includer::inc_dir(APP_PATH . 'app/lib/helpers/');
		Includer::inc_dir(APP_PATH . 'app/lib/models/');


		// controller/action/params
//		preg_match('/^([^\\?]+)\\?(.+)/i', $path, $matches);
		$path_array = explode('/', $path);
		$tmp = $path_array[0] ? array_shift($path_array) : 'index';
		AppParams::setController($tmp);
		$tmp = ($path_array[0] && !preg_match('/\..*$/', $path_array[0])) ? array_shift($path_array) : 'view';
		AppParams::setAction($tmp);
		AppParams::$controller_path = APP_PATH . 'app/controllers/' . AppParams::$controller . AppParams::$controller_postfix;

		if (!is_file(AppParams::$controller_path)) {
			AppParams::setAction('nopage');
			AppParams::setController('redirect');
			AppParams::$controller_path = APP_PATH . 'app/controllers/' . AppParams::$controller . AppParams::$controller_postfix;
		}

		$params = $path_array; // остатки массива пойдут в качестве параметров

		try {
			// include libs
			include_once(AppParams::$controller_path);
			// new object & check for method exists
			$controller_object = new AppParams::$controller();
			AppUser::$_user = new AppUser();
			if (!method_exists($controller_object, AppParams::$action)) {
				AppParams::setAction('view');
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

	public static function redirect($url = '')
	{
		header('Location:' . FT::prepUrl($url));
		exit;
	}
}