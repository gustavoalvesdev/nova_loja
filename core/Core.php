<?php 

class Core {

	public function run() {

		$url = '/' . (isset($_GET['q']) ? $_GET['q'] : '');

		$params = array();

		if (!empty($url) && $url != '/') {

			$url = explode('/', $url);
			array_shift($url);

			$currentControllerFile = ucfirst($url[0]).'Controller';
			$currentController = ucfirst($url[0]).'Controller';
			array_shift($url);

			if (isset($url[0]) && $url[0] != '/') {

				$currentAction = $url[0];
				array_shift($url);
			} else {
				$currentAction = 'index';
			}

			if (count($url) > 0) {
				$params = $url;
			}

		}  else {
			$currentController = 'HomeController';
			$currentAction = 'index';
		}

		if (!file_exists('controllers/' . $currentController . '.php')) {
			$currentController = 'NotFoundController';
			$currentAction = 'index';
		}

		$c = new $currentController();

		if (!method_exists($c, $currentAction)) {
			$currentAction = 'index';
		}

		call_user_func_array(array($c, $currentAction), $params);


	}

}
