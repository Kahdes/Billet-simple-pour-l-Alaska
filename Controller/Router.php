<?php

spl_autoload_register(function($class) {
	require_once($class . '.php');
});

class Router {
	
	private $_adminController;
	private $_billController;
	private $_commentsController;
	private $_panelController;	

	public function __construct() {
		$this->_adminController = new adminController();
		$this->_billController = new billController();
		$this->_commentsController = new commentsController();
		$this->_panelController = new panelController();		
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
					if (isset($_GET['page'])) {
						$page = ((int) $_GET['page']) - 1;
						if ($page < 0) {
							$page = 0;
						}
					} else {
						$page = 0;
					}	
					$this->_billController->billList($page);
				//PAGE : BILLET SPECIFIQUE
				} elseif ($_GET['action'] === 'bill' && isset($_GET['id'])) {
					//SI UN COMMENTAIRE EST ENVOYE
					if (isset($_POST['pseudo']) && isset($_POST['comment'])) {
						$_POST['pseudo'] = trim($_POST['pseudo']);
						$_POST['comment'] = trim($_POST['comment']);
						if (!empty($_POST['pseudo']) && !empty($_POST['comment'])) {
							$this->_commentsController->commentAdd($_GET['id'], $_POST['comment'], $_POST['pseudo']);
							$this->_adminController->success("Votre commentaire a bien été envoyé !", 'Frontend');
						} else {
							$this->_adminController->error("Le commentaire est vide !", 'Frontend');
						}
					} else {
						//SI UNE PAGE EST SPECIFIEE					
						if (isset($_GET['page'])) {
							$page = ((int) $_GET['page']) - 1;
							if ($page < 0) {
								$page = 0;
							}
						} else {
							$page = 0;
						}
						$this->_billController->billInfo($_GET['id'], $page);
					}					
				//PAGE : SIGNALEMENT
				} elseif ($_GET['action'] === 'flag') {
					if (isset($_GET['id'])) {
						if (isset($_POST['flag-confirm'])) {
							$this->_commentsController->commentFlag($_GET['id']);
							$this->_adminController->success("Votre signalement a été pris en compte !", 'Frontend');
						} else {
							$this->_commentsController->commentInfo($_GET['id']);
						}
					}										
				//PAGE : CONNEXION
				} elseif ($_GET['action'] === 'connexion') {
					if (isset($_SESSION['account']) && isset($_SESSION['password'])) {
						$this->_adminController->success("Vous êtes connecté au site !", 'Frontend');
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
											$this->_adminController->success("Le billet vient d'être créé !", 'Backend');
										}
									} else {
										$this->_panelController->create();
									}
								//SI ON EDITE UN BILLET								
								} elseif ($_GET['admin'] === 'edit') {
									if (isset($_GET['id']) && !empty($_GET['id'])) {
										if ($this->_billController->billCheck($_GET['id'])) {
											if (!empty($_POST['edit-title']) && !empty($_POST['edit-body'])) {
												$this->_billController->billEdit($_GET['id'], $_POST['edit-title'], $_POST['edit-body']);
												$this->_adminController->success("Le billet a été modifié !", 'Backend');
											} else {
												$this->_panelController->edit($_GET['id']);
											}											
										} else {
											$this->_adminController->error("Ce billet n'existe pas.", 'Backend');
										}
									} else {
										$this->_adminController->error("L'ID du billet n'est pas spécifié.", 'Backend');
									}
								//SI ON SUPPRIME UN BILLET									
								} elseif ($_GET['admin'] === 'delete') {
									if (isset($_GET['id']) && !empty($_GET['id'])) {
										if ($this->_billController->billCheck($_GET['id'])) {
											if (isset($_POST['delete-bill-confirm'])) {
												$this->_billController->billDelete($_GET['id']);
												$this->_commentsController->commentListDelete($_GET['id']);
												$this->_adminController->success("Ce billet et ses commentaires ont été supprimés !", 'Backend');
											} else {
												$this->_panelController->delete($_GET['id']);
											}											
										} else {
											$this->_adminController->error("Ce billet et ses commentaires n'existent plus.", 'Backend');
										}																	
									} else {
										$this->_adminController->error("L'ID du billet n'est pas spécifié.", 'Backend');
									}
								//PARTIE A AMELIORER
								//SI ON RESET UN COMMENTAIRE							
								} elseif ($_GET['admin'] === 'commentReset') {
									if (isset($_GET['id']) && !empty($_GET['id'])) {
										if ($this->_commentsController->commentCheck($_GET['id'])) {
											if (isset($_POST['reset-comment-confirm'])) {
												$this->_commentsController->commentFlagReset($_GET['id']);
												$this->_adminController->success("Ce commentaire a été rétabli !", 'Backend');
											} else {
												$this->_panelController->commentManage($_GET['id'], 'CommentReset');
											}											
										} else {
											$this->_adminController->error("Ce commentaire n'existe plus.", 'Backend');
										}																	
									} else {
										$this->_adminController->error("L'ID du commentaire n'est pas spécifié.", 'Backend');
									}
								//PARTIE A AMELIORER
								//SI ON SUPPRIMER UN COMMENTAIRE
								} elseif ($_GET['admin'] === 'commentDelete') {
									if (isset($_GET['id']) && !empty($_GET['id'])) {
										if ($this->_commentsController->commentCheck($_GET['id'])) {
											if (isset($_POST['delete-comment-confirm'])) {
												$this->_commentsController->commentDelete($_GET['id']);
												$this->_adminController->success("Ce commentaire a été supprimé !", 'Backend');
											} else {
												$this->_panelController->commentManage($_GET['id'], 'CommentDelete');
											}											
										} else {
											$this->_adminController->error("Ce commentaire n'existe plus.", 'Backend');
										}																	
									} else {
										$this->_adminController->error("L'ID du commentaire n'est pas spécifié.", 'Backend');
									}
								}
							//PAGE : TABLEAU DE BORD PAR DEFAUT
							} else {
								if (isset($_GET['page_comm'])) {
									$page_comm = ((int) $_GET['page_comm']) - 1;
									if ($page_comm < 0) {
										$page_comm = 0;
									}
								} else {
									$page_comm = 0;
								}
								$this->_panelController->dashboard($page_comm);
							}
						//PAGE : ACCES REFUSE
						} else {
							$this->_adminController->error("Votre compte ne possède pas les droits d'administration.", 'Frontend');
						}
					//PAGE : ACCES REFUSE						
					} else {
						$this->_adminController->error("Vous n'avez pas les droits pour accéder à cette page.", 'Frontend');
					}
				//PAGE : ERREUR GENERALE
				} else {
					$this->_adminController->error("La page demandée n'existe pas.", 'Frontend');
				}
			//PAGE : ACCUEIL PAR DEFAUT
			} else {
				$this->_billController->billHome();
			}

		} catch (Exception $e) {
			echo 'Erreur : ' . $e->getMessage();
		}
	}	
	
}