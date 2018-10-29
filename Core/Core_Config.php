<?php
defined('SECURE') or exit('Nodirect access alowed');
class CoreConfig {
	private $dbconf;
	function __construct() {
		$this->dbconf = [
			'host' => '',
			'uname' => '',
			'pass' => '',
			'dbname' => '',
		];
	}
}
$Core_Config = new CoreConfig;