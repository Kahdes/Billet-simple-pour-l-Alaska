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

	public function infoBill($sql, $billID) {

	}

	public function manageBill($action) {
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

		return $this->sqlRequest($sql, $params);
	}

	public function signalBIll($sql) {

	}
}