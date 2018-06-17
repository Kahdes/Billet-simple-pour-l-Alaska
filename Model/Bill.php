<?php

require_once('Model/Model.php');

class Bill extends Model {

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

}