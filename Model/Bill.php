<?php

require_once('Model/Model.php');

class Bill extends Model {

//TESTS

	//CHECK BILLET EXISTANT
	public function checkBill($id) {
		$sql = '
			SELECT id
			FROM billets
			WHERE id = ?
		';
		$params = array($id);
		return $this->sqlRequest($sql, $params);
	}

//GENERAL

	//INFORMATIONS DE BILLET
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
			ORDER BY id
		';
		return $this->sqlRequest($sql);
	}

//ADMINISTRATEUR

	//AJOUTE UN BILLET
	public function addBill($params) {
		$sql = '
			INSERT INTO billets (titre, contenu, date_creation)
			VALUES (:titre, :contenu, NOW())
		';
		$params = array(
			"titre" => $params['titre'],
			"contenu" => $params['contenu']
		);
		return $this->sqlRequest($sql, $params);
	}		

	//MODIFIE LE CONTENU D'UN BILLET
	public function editBill($params) {
		$sql = '
			UPDATE billets
			SET titre         = :titre,
			    contenu       = :contenu,
			    date_creation = NOW()
			WHERE id = :id
		';
		$params = array(
			"titre" => $params['titre'],
			"contenu" => $params['contenu'],
			"id" => $params['id']
		);
		return $this->sqlRequest($sql, $params);
	}	

	//SUPPRIME UN BILLET
	public function deleteBill($id) {
		$sql = '
			DELETE FROM billets
			WHERE id = :id
		';
		$params = array(
			"id" => $id
		);
		return $this->sqlRequest($sql, $params);
	}	

}