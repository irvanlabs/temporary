<?php
defined('SECURE') or exit('Nodirect access alowed');
class CoreRoutes {
	protected $url;
	protected $controller = 'home';
	protected $method = 'index';
	protected $params = [];

	function __construct() {
		$this->parseURL();
		$this->setController();
		$this->setMethod();
		$this->setParams();

		if (file_exists('App/Controllers/' . $this->controller . '.php')) {
			require_once 'App/Controllers/' . $this->controller . '.php';
			$this->controller = new $this->controller;
			$func = $this->method;
			if (method_exists($this->controller, $this->method)) {
				$this->controller::$func();
			} else {
				echo $this->route404();
			}
		} else {
			echo $this->route404();
		}
	}

	function parseURL() {
		$this->url = $_SERVER['REQUEST_URI'];
		$this->url = filter_var($this->url, FILTER_SANITIZE_URL);
		$this->url = preg_replace('/\/+/', '/', $this->url);
		$this->url = rtrim($this->url, '/');
		$this->url = ltrim($this->url, '/');
		$this->url = explode('/', $this->url);
		unset($this->url[0]);
	}

	function setController() {
		if (count($this->url) >= 1) {
			$this->controller = $this->url[1];
		}
		unset($this->url[1]);
	}

	function setMethod() {
		if (count($this->url) >= 1) {
			$this->method = $this->url[2];
		}
		unset($this->url[2]);
	}

	function setParams() {
		if (!empty($this->url)) {
			$this->params = array_values($this->url);
		}
		unset($this->url);
	}

	function route404() {
		$err = <<<'ERR'
<!DOCTYPE html>
<html>
    <head>
        <title>
            ERROR 404
        </title>
        <style type="text/css">
            html, body{margin: 0px;padding: 0px;font-family: tahoma,arial,sans-serif;text-align: center;background: #afafaf;}
            .container{margin: 7rem 0rem 0rem 0rem;display: inline-block;}
            h1{margin: 0px;padding: 0px;}
            .special{font-size: 600%;border-top: 0.2rem solid black;border-bottom: 0.2rem solid black;}
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Are you lost?</h1>
            <h1 class="special">404</h1>
            <h1>NOT FOUND</h1>
        </div>
    </body>
</html>
ERR;
		return ($err);
	}
}

$Core_Routes = new CoreRoutes;