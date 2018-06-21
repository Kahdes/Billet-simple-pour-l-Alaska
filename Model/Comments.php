<?php

require_once('Model/Model.php');

class Comments extends Model {

	//CHECK BILLET EXISTANT
	//OK
	public function checkComment($id) {
		$sql = '
			SELECT id
			FROM commentaires
			WHERE id = ?
		';
		$params = array($id);
		return $this->sqlRequest($sql, $params);
	}

	//COMMENTAIRE SPECIFIQUE
	//OK
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

	//LISTE DES COMMENTAIRES D'UN BILLET
	//OK
	public function getComments($id, $page) {
		$start = $page * 5;
		$sql = '
			SELECT id,
				   contenu,
				   pseudo,
				   DATE_FORMAT(date_creation, \'%d/%m/%Y à %H:%i:%s\') AS dateFR
			FROM commentaires
			WHERE id_billet = ?
			ORDER BY dateFR DESC
			LIMIT ' . $start . ',5
		';
		$params = array($id);
		return $this->sqlRequest($sql, $params);
	}

	//TOTAL DE COMMENTAIRES D'UN BILLET
	//OK
	public function getTotalComments($id) {
		$sql = '
			SELECT COUNT(*) AS total
			FROM commentaires
			WHERE id_billet = :id
		';
		$params = array(
			"id" => $id
		);
		return $this->sqlRequest($sql, $params);
	}	

	//AJOUT DE COMMENTAIRE
	public function addComment($params) {
		$sql = '
			INSERT INTO commentaires (id_billet, contenu, pseudo, date_creation, flagged)
			VALUES (:id, :contenu, :pseudo, NOW(), 0)
		';

		$params = array(
			"id" => $params['id'],
			"contenu" => $params['contenu'],
			"pseudo" => $params['pseudo']
		);

		return $this->sqlRequest($sql, $params);
	}

	//SUPPRIME UN COMMENTAIRE
	public function removeComment() {

	}

	//TOTAL DE FLAGS D'UN COMMENTAIRE
	public function getFlags($id) {
		$sql = '
			SELECT flagged
			FROM commentaires
			WHERE id = ?
		';
		$params = array($id);
		return $this->sqlRequest($sql, $params);
	}

	//AJOUT DE FLAG COMMENTAIRE
	public function addFlag($id, $count) {
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