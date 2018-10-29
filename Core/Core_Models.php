<?php
defined('SECURE') or exit('Nodirect access alowed');
class CoreModels {
	protected $db;
	function __construct() {
		$this->db = Core_Config::dbconf;
	}

	function insert($table, $values, $action) {
		$conn = new mysqli($dbconf['host'], $dbconf['uname'], $dbconf['pass'], $dbconf['dbname']);
		if ($conn->connect_error) {
			die('Connection failed: ' . $conn->connect_error);
		}
		$query = mysqli_query('INSERT INTO ' . $table . ' VALUES (' . $values . ')');
		if ($conn->query($sql) == TRUE) {
			header();
		} else {
			echo 'Error: ' . $sql . '<br>' . $conn->error;
		}
		$conn->close();
	}

	function select() {

	}

	function update() {

	}

	function delete() {

	}
}