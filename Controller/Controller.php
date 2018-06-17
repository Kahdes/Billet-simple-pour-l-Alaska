<?php

spl_autoload_register(function($class) {
	require_once($class . '.php');
});

class Controller {
	
	private $_billController;
	private $_commentsController;

	public function __construct() {
		$this->_billController = new billController();
		$this->_commentsController = new commentsController();
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
					$maxID = $this->_billController->billMax($id);
					if ($id > 0 && $maxID !== 0) {
						if (isset($_POST['pseudo']) && isset($_POST['comment'])) {
							$pseudo = $_POST['pseudo'];
							$content = $_POST['comment'];
							$this->_commentsController->commentAdd($id, $content, $pseudo);
						} else {
							$this->_billController->billInfo($id);
						}
					} else {
						$errMsg = "Le billet demandé n'existe pas.";
						$this->error($errMsg);
					}
				} elseif ($_GET['action'] === 'flag' && isset($_GET['id'])) {
					$id = (int) $_GET['id'];
					$maxID = $this->_commentsController->commentMax($id);
					if ($id > 0 && $maxID !== 0) {
						if (isset($_POST['confirm'])) {
							$this->_commentsController->commentFlag($id);
						}
						$this->_commentsController->commentInfo($id);
					} else {
						$errMsg = "Le commentaire demandé n'existe pas.";
						$this->error($errMsg);
					}
				} else {
					$errMsg = "La page demandée n'existe pas.";
					$this->error($errMsg);
				}
			} else {
				$this->_billController->billHome();
			}
		} catch (Exception $e) {
			echo 'Erreur : ' . $e->getMessage();
		}
	}

	public function checkPOST($params) {
	}

	public function error($msg) {
		require_once('View/viewError.php');
	}
}