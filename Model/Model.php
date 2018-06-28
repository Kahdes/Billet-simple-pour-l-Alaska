<?php

require_once('Configuration.php');

abstract class Model {
	private static $db;

	private static function dbConnect() {
		if (self::$db == null) {
            $dsn = Configuration::get("dsn");
            $login = Configuration::get("login");
            $mdp = Configuration::get("mdp");
            self::$db = new PDO($dsn, $login, $mdp, 
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		return self::$db;
	}

	protected function sqlRequest($sql, $params = null) {
		if ($params == null) {
			$request = self::dbConnect()->query($sql);
		} else {
			$request = self::dbConnect()->prepare($sql);
			$request->execute($params);
		}
		return $request;
	}

	protected function check($result) {
		if ($result->fetch()) {
			return true;
		} else {
			return false;
		}
	}
}