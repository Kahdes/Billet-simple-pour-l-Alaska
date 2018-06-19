<?php

require_once('Model/Comments.php');

class commentsController {
	
	private $_Comments;

	public function __construct() {
		$this->_Comments = new Comments();
	}

	//CHECK COMMENTAIRE EXISTANT
	public function commentMax($id) {
		$idCheck = $this->_Comments->getCommentMax($id);
		$a = 0;
		while ($data = $idCheck->fetch()) {
			$a += 1;
		}
		return $a;
	}

	//AJOUT DE FLAG COMMENTAIRE
	public function commentFlag($id) {
		$result = $this->_Comments->getFlags($id);
		while ($data = $result->fetch()) {
			$flag = $data['flagged'];
			$flag++;
		}
		$this->_Comments->flagComment($id, $flag);
	}

	//PAGE : COMMENTAIRE SPECIFIQUE
	public function commentInfo($id) {
		$comment = $this->_Comments->getComment($id);
		require_once('View/viewFlagged.php');
	}	

	//REDIRECTION : AJOUT DE COMMENTAIRE
	public function commentAdd($id, $content, $pseudo) {
		$params = array(
			"id" => htmlspecialchars($id),
			"pseudo" => htmlspecialchars($pseudo),
			"contenu" => htmlspecialchars($content)		
		);		
		$this->_Comments->addComment($params);
	}

}