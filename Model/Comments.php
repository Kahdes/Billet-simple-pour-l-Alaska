<?php

require_once('Model/Model.php');

class Comments extends Model {

	//CHECK BILLET EXISTANT
	public function getCommentMax($id) {
		$sql = '
			SELECT id
			FROM commentaires
			WHERE id = ?
		';
		$params = array($id);
		return $this->sqlRequest($sql, $params);
	}

	//LISTE DE COMMENTAIRES D'UN BILLET
	public function getComments($id) {
		$sql = '
			SELECT id,
				   contenu,
				   pseudo,
				   DATE_FORMAT(date_creation, \'%d/%m/%Y à %H:%i:%s\') AS dateFR
			FROM commentaires
			WHERE id_billet = ?
			ORDER BY dateFR DESC
		';
		$params = array($id);
		return $this->sqlRequest($sql, $params);
	}

	//LISTE DE COMMENTAIRES D'UN BILLET
	public function getComment($id) {
		$sql = '
			SELECT id,
				   contenu,
				   pseudo,
				   DATE_FORMAT(date_creation, \'%d/%m/%Y à %H:%i:%s\') AS dateFR
			FROM commentaires
			WHERE id = ?
		';
		$params = array($id);
		return $this->sqlRequest($sql, $params);
	}

	public function addComment($params) {
		$sql = '
			INSERT INTO commentaires (id_billet, contenu, pseudo, date_creation)
			VALUES (:id, :contenu, :pseudo, NOW())
		';

		$params = array(
			"id" => $params['id'],
			"contenu" => $params['contenu'],
			"pseudo" => $params['pseudo']
		);

		return $this->sqlRequest($sql, $params);
	}

	public function getFlags($id) {
		$sql = '
			SELECT flagged
			FROM commentaires
			WHERE id = ?
		';
		$params = array($id);
		return $this->sqlRequest($sql, $params);
	}

	public function flagComment($id, $count) {
		$sql = '
			UPDATE commentaires
			SET flagged = :count
			WHERE id = :id
		';
		$params = array(
			"id" => $id,
			"count" => $count 
		);
		return $this->sqlRequest($sql, $params);
	}
}