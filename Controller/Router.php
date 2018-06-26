<?php

spl_autoload_register(function($class) {
	require_once($class . '.php');
});

class Router {
	
	private $_billController;
	private $_adminController;
	private $_panelController;
	private $_commentsController;

	public function __construct() {
		$this->_billController = new billController();
		$this->_adminController = new adminController();
		$this->_panelController = new panelController();
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
						$this->_adminController->frontSuccess("Votre commentaire a bien été envoyé !");
					} else {
						$this->_billController->billInfo($_GET['id'], $page);
					}					
				//PAGE : SIGNALEMENT
				} elseif ($_GET['action'] === 'flag' && isset($_GET['id'])) {
					if (!empty($_POST['confirm'])) {
						$this->_commentsController->commentFlag($_GET['id']);
						$this->_adminController->frontSuccess("Votre signalement a été pris en compte !");
					} else {
						$this->_commentsController->commentInfo($_GET['id']);
					}					
				//PAGE : CONNEXION
				} elseif ($_GET['action'] === 'connexion') {
					if (isset($_SESSION['account']) && isset($_SESSION['password'])) {
						$this->_adminController->frontSuccess("Vous êtes connecté au site !");
					} else {
						$this->_adminController->connection();
					}					
				//PAGE : TABLEAU DE BORD 
				} elseif ($_GET['action'] === 'dashboard') {
					if (isset($_SESSION['account']) && isset($_SESSION['password'])) {
						if ($this->_adminController->checkAdmin($_SESSION['account'], $_SESSION['password'])) {
							if (isset($_GET['admin'])) {
								//SI ON CREE UN BILLET
								if ($_GET['admin'] === 'create') {
									if (!empty($_POST['create-title']) && !empty($_POST['create-body'])) {
										if (isset($_POST['create-confirm'])) {
											$this->_billController->billAdd($_POST['create-title'], $_POST['create-body']);
											$this->_adminController->backSuccess("Le billet vient d'être créé !");
										}
									} else {
										$this->_panelController->create();
									}
								//SI ON EDITE UN BILLET								
								} elseif ($_GET['admin'] === 'edit') {
									if (isset($_GET['id'])) {
										if ($this->_billController->billCheck($_GET['id'])) {
											if (!empty($_POST['edit-title']) && !empty($_POST['edit-body'])) {
												$this->_billController->billEdit($_GET['id'], $_POST['edit-title'], $_POST['edit-body']);
												$this->_adminController->backSuccess("Le billet a été modifié !");
											} else {
												$this->_panelController->edit($_GET['id']);
											}											
										} else {
											$this->_adminController->backError("Ce billet n'existe pas.");
										}
									}
								//SI ON SUPPRIME UN BILLET									
								} elseif ($_GET['admin'] === 'delete') {
									if (isset($_GET['id'])) {
										if ($this->_billController->billCheck($_GET['id'])) {
											if (isset($_POST['delete-bill-confirm'])) {
												$this->_billController->billDelete($_GET['id']);
												$this->_commentsController->commentListDelete($_GET['id']);
												$this->_adminController->backSuccess("Ce billet et ses commentaires ont été supprimés !");
											} else {
												$this->_panelController->delete($_GET['id']);
											}											
										} else {
											$this->_adminController->backError("Ce billet et ses commentaires n'existent plus.");
										}																	
									}
								//PARTIE A AMELIORER
								//SI ON RESET UN COMMENTAIRE								
								} elseif ($_GET['admin'] === 'commentReset') {
									if (isset($_GET['id'])) {
										if ($this->_commentsController->commentCheck($_GET['id'])) {
											if (isset($_POST['reset-comment-confirm'])) {
												$this->_commentsController->commentFlagReset($_GET['id']);
												$this->_adminController->backSuccess("Ce commentaire a été rétabli !");
											} else {
												$this->_panelController->commentReset($_GET['id']);
											}											
										} else {
											$this->_adminController->backError("Ce commentaire n'existe plus.");
										}																	
									}
								//PARTIE A AMELIORER
								//SI ON SUPPRIMER UN COMMENTAIRE
								} elseif ($_GET['admin'] === 'commentDelete') {
									if (isset($_GET['id'])) {
										if ($this->_commentsController->commentCheck($_GET['id'])) {
											if (isset($_POST['delete-comment-confirm'])) {
												$this->_commentsController->commentDelete($_GET['id']);
												$this->_adminController->backSuccess("Ce commentaire a été supprimé !");
											} else {
												$this->_panelController->commentDelete($_GET['id']);
											}											
										} else {
											$this->_adminController->backError("Ce commentaire n'existe plus.");
										}																	
									}
								}
							//PAGE : TABLEAU DE BORD PAR DEFAUT
							} else {
								$this->_panelController->dashboard();
							}
						} else {
							$this->_adminController->frontError("Vous n'avez pas les droits pour accéder à cette page.");
						}
					//PAGE : ACCES REFUSE						
					} else {
						$this->_adminController->frontError("Vous n'avez pas les droits pour accéder à cette page.");
					}
				//PAGE : ERREUR GENERALE
				} else {
					$this->_adminController->frontError("La page demandée n'existe pas.");
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