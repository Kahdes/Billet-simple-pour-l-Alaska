<?php

require_once('Model/Model.php');

class Comments extends Model {

	//PROCHAIN
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
}