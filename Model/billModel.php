<?php

require_once('Model/Model.php');

class billModel extends Model {

	public function homeBill() {
		$sql = '
			SELECT id,
				   titre,
				   contenu,
				   DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS dateFR
			FROM billets
			ORDER BY id DESC
			LIMIT 0,1
		';

		return $this->sqlRequest($sql);
	}

	public function listBills() {
		$sql = '
			SELECT id,
				   titre,
				   contenu,
				   DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS dateFR
			FROM billets
			ORDER BY id DESC
		';

		return $this->sqlRequest($sql);
	}

	public function infoBill($id) {
		$sql = '
			SELECT id,
				   titre,
				   contenu,
				   DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS dateFR
			FROM billets
			WHERE id = ?
		';

		$params = array($id);

		return $this->sqlRequest($sql, $params);
	}

	//PROCHAIN
	public function commBill($id) {
		$sql = '
			SELECT c.id AS id,
				   c.contenu AS contenu,
				   c.pseudo AS pseudo,
				   DATE_FORMAT(c.date_creation, \'%d/%m/%Y\') AS dateFR
			FROM commentaires AS c
			INNER JOIN billets AS b
			ON c.id_billet = b.id
			WHERE b.id = ?
			ORDER BY dateFR DESC
		';

		$params = array($id);

		return $this->sqlRequest($sql, $params);
	}

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

	public function signalBIll($sql) {

	}
}