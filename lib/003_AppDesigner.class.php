<?php class AppDesigner extends BasicSingle
{

	public static function getHtml()
	{
		header('Content-Type: text/html; charset="utf-8"');
		echo self::parseAll();
	}

	private function parseAll()
	{
		$view = (self::getInstance()->_template['view']) ? self::_subParse(true) : '';

		if (!self::getInstance()->_template['template']['name']) {
			self::setTemplate('main');
		}
		$template = (self::getInstance()->_template['template']) ? self::_subParse() : '';

		return preg_replace('/{@view@}/', $view, $template);
	}

	private function _subParse($view = false)
	{
		$type = ($view) ? 'view' : 'template';
		$dir = ($view) ? AppParams::$views_dir : AppParams::$templates_dir;
		$_file = FT::prepPath($dir . '/' . self::getInstance()->_template[$type]['name'] . '.html.php');
		if (!is_file($_file)) {
			throw new Exception($type . ' file not found in: ' . $_file);
		}

		foreach (self::getInstance()->_template[$type]['params'] AS $var => $val) {
			${$var} = $val;
		}

		ob_start();
		include $_file;
		$html = ob_get_contents();
		ob_end_clean();
		return $html;
	}

	public static function setTemplate($name, $params = array())
	{
		$tmp['name'] = $name;
		$tmp['params'] = $params;
		self::getInstance()->_template['template'] = $tmp;
	}

	public static function setView($name, $params = array())
	{
		$tmp['name'] = $name;
		$tmp['params'] = $params;
		self::getInstance()->_template['view'] = $tmp;
	}
}