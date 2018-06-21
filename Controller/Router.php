<?php

spl_autoload_register(function($class) {
	require_once($class . '.php');
});

class Router {
	
	private $_billController;
	private $_adminController;
	private $_commentsController;

	public function __construct() {
		$this->_billController = new billController();
		$this->_adminController = new adminController();
		$this->_commentsController = new commentsController();
	}

	public function connection() {
		require_once('View/Frontend/viewConnection.php');
	}

	public function error($msg) {
		require_once('View/Frontend/viewError.php');
	}

	public function session() {
		if (!isset($_SESSION)) {
			session_start();
			if (isset($_COOKIE['account']) && isset($_COOKIE['password'])) {
				$this->_adminController->connectAdminAccount($_COOKIE['account'], $_COOKIE['password']);
			}						
		}
	}

	public function request() {
		try {
			//SESSION
			$this->session();
			//ACTION INITIALE
			if (isset($_GET['action'])) {
				if ($_GET['action'] === 'billList') {					
					$this->_billController->billList();
				//PAGE DE BILLET SPECIFIQUE
				} elseif ($_GET['action'] === 'bill' && isset($_GET['id'])) {
					//SI UNE PAGE EST SPECIFIEE
					if (isset($_GET['page'])) {
						$page = ((int) $_GET['page']) - 1;
						if ($page < 0) {
							$page = 0;
						}
					} else {
						$page = 0;
					}
					//SI UN COMMENTAIRE EST ENVOYE
					if (!empty($_POST['pseudo']) && !empty($_POST['comment'])) {
						$this->_commentsController->commentAdd($_GET['id'], $_POST['comment'], $_POST['pseudo']);
					}	
					$this->_billController->billInfo($_GET['id'], $page);
				//PAGE DE SIGNALEMENT
				} elseif ($_GET['action'] === 'flag' && isset($_GET['id'])) {
					if (!empty($_POST['confirm'])) {
						$this->_commentsController->commentFlag($_GET['id']);
					}
					$this->_commentsController->commentInfo($_GET['id']);
				//PAGE DE CONNEXION
				} elseif ($_GET['action'] === 'connexion') {
					if (!empty($_POST['sign-account']) && !empty($_POST['sign-password'])) {
						if (isset($_POST['sign-stay'])) {
							$stay = 1;
						} else {
							$stay = 0;
						}
						$account = $_POST['sign-account'];
						$password = $_POST['sign-password'];
						$this->_adminController->connectAdminAccount($account, $password, $stay);
					}
					$this->connection();
				} else {
					$errMsg = "La page demandée n'existe pas.";
					$this->error($errMsg);
				}
			//PAGE D'ACCUEIL PAR DEFAUT
			} else {
				$this->session();
				$this->_billController->billHome();
			}
		} catch (Exception $e) {
			echo 'Erreur : ' . $e->getMessage();
		}
	}	
	
}