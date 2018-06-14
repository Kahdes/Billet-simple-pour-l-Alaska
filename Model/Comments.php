<?php

require_once('Model/Model.php');

class Comments extends Model {

	//LISTE DE COMMENTAIRES D'UN BILLET
	public function getComments($id) {
		$sql = '
			SELECT id,
				   contenu,
				   pseudo,
				   DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS dateFR
			FROM commentaires
			WHERE id_billet = ?
			ORDER BY dateFR DESC
		';
		$params = array($id);
		return $this->sqlRequest($sql, $params);
	}

	public function addComment($params) {
		$sql = '
			INSERT INTO commentaires (id_billet, contenu, pseudo, date_creation)
			VALUES (:id, :contenu, :pseudo, :dateFR)
		';

		$params = array(
			"id" => $params['id'],
			"auteur" => $params['auteur'],
			"contenu" => $params['contenu'],
			"date_creation" => $params['date_creation']
		);

		return $this->sqlRequest($sql, $params);
	}
}