<?php

require_once('Model/Model.php');

class Bill extends Model {

	//CHECK BILLET EXISTANT
	//OK
	public function checkBill($id) {
		$sql = '
			SELECT id
			FROM billets
			WHERE id = ?
		';
		$params = array($id);
		return $this->sqlRequest($sql, $params);
	}

	//INFORMATIONS DE BILLET
	//OK
	public function getBill($id) {
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
	
	//DERNIER BILLET DU SITE
	//OK
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
	//OK
	public function getBillList() {
		$sql = '
			SELECT id,
				   titre,
				   contenu,
				   DATE_FORMAT(date_creation, \'%d/%m/%Y à %H:%i:%s\') AS dateFR
			FROM billets
			ORDER BY id
		';
		return $this->sqlRequest($sql);
	}

	//AJOUTE UN BILLET
	public function addBill() {

	}	

	//SUPPRIME UN BILLET + COMMENTAIRES ASSOCIES
	public function removeBill() {

	}	

	//MODIFIE LE CONTENU D'UN BILLET
	public function modifyBill() {

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

}