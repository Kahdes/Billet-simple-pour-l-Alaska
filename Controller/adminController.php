<?php

require_once('Model/Admin.php');

class adminController {

	private $_Admin;

	public function __construct() {
		$this->_Admin = new Admin();
	}	

	function connectAdminAccount($account, $password, $stay = 0) {
		$req = $this->_Admin->isAdminAccount($account);
		$result = $req->fetch();

		$passComp = password_verify($password, $result['p']);

		if ($passComp) {
			$_SESSION['account'] = $result['ac'];
			$_SESSION['password'] = $password;
			if ($stay !== 0) {					
				setcookie('account', $_SESSION['account'], time() + 365*24*3600);
				setcookie('password', $_SESSION['password'], time() + 365*24*3600);
			}				
		}		
	}
}
