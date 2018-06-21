<?php

require_once('Model/Comments.php');

class commentsController {
	
	private $_Comments;

	public function __construct() {
		$this->_Comments = new Comments();
	}

	//PAGE : COMMENTAIRE SPECIFIQUE
	//OK
	public function commentInfo($id) {
		if (!$this->_Comments->checkComment($id)->fetch() === false) {
			$comment = $this->_Comments->getComment($id);
			require_once('View/Frontend/viewFlagged.php');
		} else {
			$msg = "Le commentaire demandé n'existe pas.";
			require_once('View/Frontend/viewError.php');
		}		
	}	

	//FONCTIONNALITE : AJOUT DE FLAG COMMENTAIRE
	//OK
	public function commentFlag($id) {
		$result = $this->_Comments->getFlags($id);
		while ($data = $result->fetch()) {
			$flag = $data['flagged'];
			$flag++;
		}

		$this->_Comments->addFlag($id, $flag);
	}	

	//FONCTIONNALITE : AJOUT DE COMMENTAIRE
	//OK
	public function commentAdd($id, $content, $pseudo) {
		$params = array(
			"id" => htmlspecialchars($id),
			"pseudo" => htmlspecialchars($pseudo),
			"contenu" => htmlspecialchars($content)		
		);

		$this->_Comments->addComment($params);
	}

}