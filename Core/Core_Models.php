<?php
defined('SECURE') or exit('Nodirect access alowed');
class CoreModels {
	protected $db;
	protected $conn;
	function __construct() {
		$this->db = Core_Config::dbconf;
		$this->conn = new mysqli($this->db['host'], $this->db['uname'], $this->db['pass'], $this->db['dbname']);
		if ($conn->connect_error) {
			die('Something wrong with our server <br>' . $conn->connect_error);
		}
	}

	function insert($table, $values) {
		if (is_null($table)) {
			$query = 'You can\'t insert into null table <br>';
		} else {
			$query = $this->conn->query("INSERT INTO $table VALUES ($values)");
		}
		return $query;
		$this->conn->close();
	}

	function select($table, $what = '*', $where, $limit = 0) {
		if (is_null($table)) {
			$query = 'You can\'t select from null table <br>';
		} else {
			$query = $this->conn->query("SELECT $what FROM $table where $where LIMIT $limit");
		}
		return $query;
		$this->conn->close();
	}

	function update() {
		return $query;
		$this->conn->close();
	}

	function delete($table, $what = '*', $where, $limit = 0) {
		if (is_null($table)) {
			$query = 'You can\'t delete from null table <br>';
		} else {
			$query = $this->conn->query("DELETE $what FROM $where LIMIT $limit");
		}
		return $query;
		$this->conn->close();
	}
}

$Core_Models = new CoreModels();