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

	public function request() {
		try {
			//SESSION
			$this->_adminController->session();

			//CONNEXION
			if (!empty($_POST['sign-account']) && !empty($_POST['sign-password'])) {
				$account = $_POST['sign-account'];
				$password = $_POST['sign-password'];
				if (isset($_POST['sign-stay'])) {
					$stay = 1;
				} else {
					$stay = 0;
				}
				if ($this->_adminController->checkAdmin($account, $password)) {
					$this->_adminController->connectAdminAccount($account, $password, $stay);
				}	
			}

			//URL : ACTION INITIALE
			if (isset($_GET['action'])) {
				//PAGE : LISTE DES BILLETS
				if ($_GET['action'] === 'billList') {					
					$this->_billController->billList();
				//PAGE : BILLET SPECIFIQUE
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
				//PAGE : SIGNALEMENT
				} elseif ($_GET['action'] === 'flag' && isset($_GET['id'])) {
					if (!empty($_POST['confirm'])) {
						$this->_commentsController->commentFlag($_GET['id']);
					}
					$this->_commentsController->commentInfo($_GET['id']);
				//PAGE : CONNEXION
				} elseif ($_GET['action'] === 'connexion') {					
					$this->_adminController->connection();
				//PAGE : TABLEAU DE BORD 
				} elseif ($_GET['action'] === 'dashboard') {
					if (isset($_SESSION['account']) && isset($_SESSION['password'])) {
						if ($this->_adminController->checkAdmin($_SESSION['account'], $_SESSION['password'])) {
							$this->_adminController->dashboard();
						} else {
							$this->_adminController->error("Votre compte n'est pas autorisé à accéder à cette page.");
						}						
					} else {
						$this->_adminController->error("Vous n'avez pas les droits pour accéder à cette page.");
					}
				//PAGE : ERREUR GENERALE
				} else {
					$this->_adminController->error("La page demandée n'existe pas.");
				}
			//PAGE : ACCUEIL PAR DEFAUT
			} elseif (!isset($_POST['error'])) {
				$this->_billController->billHome();
			}

		} catch (Exception $e) {
			echo 'Erreur : ' . $e->getMessage();
		}
	}	
	
}