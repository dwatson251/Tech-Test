<?php

class App
{

	protected $controller,
			  $method,
			  $url;

	protected $params = [];

	public function __construct()
	{

		$this->_parseUrl();

		/** Set the default controller and method */
		$this->controller = "user";
		$this->method = "index";

		/** Attempt to load the specified controller (If one was set) */
		if($this->_loadController()) {

			/** Then attempt to load the specified method: **/
			$this->_loadControllerMethod();

		} else {

			// Show 404
			echo "404.";
		}

	}

	private function _parseUrl()
	{

		if(isset($_GET['url'])){

            $url = $_GET['url'];

            $url = rtrim($url, '/');

            $url = filter_var($url, FILTER_SANITIZE_URL);

            $url = explode('/', $url);

            $this->url = $url;

       }

       return false;

	}

	private function _loadController()
	{

		$this->controller = ucfirst($this->url[0]) . 'Controller';
		$controllerDir = '../app/controllers/' . $this->controller . '.php';
		
		if(file_exists($controllerDir)) {

			if(require_once $controllerDir) {

				/** Overwrite the contoller property with the and instance of the controller class */
				$this->controller = new $this->controller;

				unset($this->url[0]);

				return true;

			} else {

				return false;
			}

		} else {

			return false;
		}

	}

	private function _loadControllerMethod()
	{

		if(isset($this->url[1]))
		{

			if(method_exists($this->controller, $this->url[1])) {

				$this->method = $this->url[1];
				unset($this->url[1]);
			}
		}

		$this->params = $this->url ? array_values($this->url) : [];

		call_user_func_array([$this->controller, $this->method], $this->params);

	}

}