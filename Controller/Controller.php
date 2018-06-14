<?php

spl_autoload_register(function($class) {
	require_once($class . '.php');
});

class Controller {
	
	private $_homeController;
	private $_billController;

	public function __construct() {
		$this->_homeController = new homeController();
		$this->_billController = new billController();
	}

	public function request() {
		try {
			if (isset($_GET['action'])) {
				if ($_GET['action'] === 'billList') {
					$this->_billController->billList();
				} elseif ($_GET['action'] === 'connexion') {
					require_once('View/viewConnection.php');
				} elseif ($_GET['action'] === 'bill' && isset($_GET['id'])) {
					$id = (int) $_GET['id'];
					if ($id > 0 && $this->_billController->billMax($id) !== 0) {
						$this->_billController->billInfo($id);
					} else {
						$errMsg = "Le billet demandé n'existe pas.";
						$this->error($errMsg);
					}
				} else {
					$errMsg = "La page demandée n'existe pas.";
					$this->error($errMsg);
				}
			} else {
				$this->_homeController->home();
			}
		} catch (Exception $e) {
			echo 'Erreur : ' . $e->getMessage();
		}
	}

	public function error($msg) {
		require_once('View/viewError.php');
	}
}