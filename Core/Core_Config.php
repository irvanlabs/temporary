<?php
defined('SECURE') or exit('Nodirect access alowed');
class CoreConfig {
	private $dbconf = [
		'dbname' = '',
		'pass' = '',
		'uname' = '',
		'host' = ''
	];

	define('BASEURL', '');
}

$Core_Config = new CoreConfig();