<?php

require_once('Model/Admin.php');

class adminController {

	private $_Admin;

	public function __construct() {
		$this->_Admin = new Admin();
	}	


	public function session() {
		if (isset($_COOKIE['account']) && isset($_COOKIE['password'])) {
			if (!empty($_COOKIE['account']) && !empty($_COOKIE['password'])) {
				if ($this->checkAdmin($_COOKIE['account'], $_COOKIE['password'])) {
					$this->connectAdminAccount($_COOKIE['account'], $_COOKIE['password']);
				} else {					
					$this->disconnect();					
					$this->error("Ce compte est inconnu");
				}
			}
		}		
		if (!isset($_SESSION)) {
			session_start();									
		}
		if (isset($_POST['disconnect']) && $_POST['disconnect'] === 'disconnect') {
			$this->disconnect();
		}
	}

	/*
	public function session() {
		if (!isset($_SESSION)) {
			session_start();
			if (!empty($_COOKIE['account']) && !empty($_COOKIE['password'])) {
				if ($this->checkAdmin($_COOKIE['account'], $_COOKIE['password'])) {
					$this->connectAdminAccount($_COOKIE['account'], $_COOKIE['password']);
				} else {
					$this->disconnect();
					$_POST['error'] = 'error';
					$this->error("Ce compte est inconnu");
				}
			}						
		}
		if (isset($_POST['disconnect']) && $_POST['disconnect'] === 'disconnect') {
			$this->disconnect();
		}
	}
	*/

	public function disconnect() {
		foreach ($_COOKIE as $key => $value) {
			setcookie($key, '', time() - 365*24*3600, '/');		
			setcookie($key, '', time() - 365*24*3600);
			unset($_COOKIE[$key]);
		}
		if (isset($_SESSION)) {
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			session_destroy();
		}		
	}

	//CHECK DONNEES D'ADMINISTRATEUR
	public function checkAdmin($account, $password) {
		$req = $this->_Admin->isAdminAccount($account);
		$result = $req->fetch();

		$passComp = password_verify($password, $result['p']);

		if ($passComp) {
			return true;
		} else {
			return false;
		}
	}

	//CREATION DONNEES DE SESSION / COOKIES
	public function connectAdminAccount($account, $password, $stay = 0) {
		$req = $this->_Admin->isAdminAccount($account);
		$result = $req->fetch();

		if (isset($_SESSION)) {
			$_SESSION['pseudo'] = $result['pseudo'];
			$_SESSION['account'] = $result['ac'];
			$_SESSION['password'] = $password;
		}		

		if ($stay !== 0) {
			setcookie('pseudo', $_SESSION['pseudo'], time() + 365*24*3600);		
			setcookie('account', $_SESSION['account'], time() + 365*24*3600);
			setcookie('password', $_SESSION['password'], time() + 365*24*3600);		
		}
	}		

	public function connection() {
		require_once('View/Frontend/viewConnection.php');
	}

	public function dashboard() {
		require_once('View/Backend/viewDashboard.php');
	}	

	public function error($message) {
		$msg = $message;
		$_POST['error'] = 'error';
		require_once('View/Frontend/viewError.php');
	}
}
