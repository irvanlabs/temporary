<?php
defined('SECURE') or exit('Nodirect access alowed');
class CoreController {
	function view($file, $data = []) {
		require 'App/views/' . $file . '.php';
	}

	function showErr($errtype = '', $errmsg = '', $link = BASEURL) {
		switch (TRUE) {
		case file_exists('App/Views/error/' . $errtype . '.html'):
			require 'App/Views/error/' . $errtype . '.html';
			break;

		case file_exists('App/Views/error/' . $errtype . '.php'):
			require 'App/Views/error/' . $errtype . '.php';
			break;

		default:
			echo $errtype . '<br>' . $errmsg;
			break;
		}
	}
}