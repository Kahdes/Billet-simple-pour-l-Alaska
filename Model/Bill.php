<?php

require_once('Model/Model.php');

class Bill extends Model {
	
	//DERNIER BILLET DU SITE
	public function getLastBill() {
		$sql = '
			SELECT id,
				   titre,
				   contenu,
				   DATE_FORMAT(date_creation, \'%d/%m/%Y à %H:%i:%s\') AS dateFR
			FROM billets
			ORDER BY id DESC
			LIMIT 0,1
		';
		return $this->sqlRequest($sql);
	}

	//LISTE DE TOUS LES BILLETS
	public function getBillList() {
		$sql = '
			SELECT id,
				   titre,
				   contenu,
				   DATE_FORMAT(date_creation, \'%d/%m/%Y à %H:%i:%s\') AS dateFR
			FROM billets
			ORDER BY id DESC
		';
		return $this->sqlRequest($sql);
	}

	//INFORMATIONS DE BILLET
	public function getBillInfo($id) {
		$sql = '
			SELECT id,
				   titre,
				   contenu,
				   DATE_FORMAT(date_creation, \'%d/%m/%Y à %H:%i:%s\') AS dateFR
			FROM billets
			WHERE id = ?
		';
		$params = array($id);
		return $this->sqlRequest($sql, $params);
	}

	//CHECK BILLET EXISTANT
	public function getBillMax($id) {
		$sql = '
			SELECT id
			FROM billets
			WHERE id = ?
		';
		$params = array($id);
		return $this->sqlRequest($sql, $params);
	}	

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

	public function signalBIll($sql) {

	}
}