<?php

abstract class Model {
	private $_db;

	private function dbConnect() {
		if ($this->_db == null) {
			$this->_db = new PDO('mysql:hostname=localhost;dbname=test;charset=utf8', 'root', '',
						 array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		return $this->_db;
	}

	protected function sqlRequest($sql, $params = null) {
		if ($params == null) {
			$request = $this->dbConnect()->query($sql);
		} else {
			$request = $this->dbConnect()->prepare($sql);
			$request->execute($params);
		}
		return $request;
	}
}