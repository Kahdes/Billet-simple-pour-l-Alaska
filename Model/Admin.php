<?php

require_once('Model/Model.php');

class Admin extends Model {
	
	//POUR ADMIN
	public function manageBill($action, $params) {
		if ($action === 'add') {
			$sql = '
				INSERT INTO billets (titre, contenu, date_creation)
				VALUES (:titre, :contenu, :date_creation)
			';
		} elseif ($action === 'remove') {
			$sql = '
				DELETE FROM billets
				WHERE id = :id
			';
		} elseif ($action === 'modify') {
			$sql = '
				UPDATE billets
				SET titre         = :titre
				    contenu       = :contenu
				    date_creation = :date_creation
			';
		} else {
			throw new Exception("Action de billet inconnue");	
		}

		$params = array(
			"titre" => $params['titre'],
			"contenu" => $params['contenu'],
			"date_creation" => $params['date_creation'],
			"id" => $params['id']
		);

		return $this->sqlRequest($sql, $params);
	}	
}