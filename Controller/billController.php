<?php

require_once('Model/Bill.php');
require_once('Model/Comments.php');

class billController {
	
	private $_Bill;
	private $_Comments;

	public function __construct() {
		$this->_Bill = new Bill();
		$this->_Comments = new Comments();
	}

//PAGES

	//ACCUEIL & DERNIER BILLET
	public function billHome() {
		$bill = $this->_Bill->getLastBill();
		require_once('View/Frontend/viewHome.php');
	}
	
	//LISTE DES BILLETS
	public function billList() {
		$bill = $this->_Bill->getBillList();
		require_once('View/Frontend/viewList.php');
	}	

	//BILLET & COMMENTAIRES
	public function billInfo($id, $page = 0) {
		if ($this->_Bill->checkBill($id)) {
			$bill = $this->_Bill->getBill($id);
			$list = $this->_Bill->getBillList();			
			$pages = $this->_Comments->getTotalComments($id);
			$comments = $this->_Comments->getComments($id, $page);
			while ($data = $pages->fetch()) {
				$liPages = ceil(($data['total']) / 5);
			}
			require_once('View/Frontend/viewBill.php');
		} else {
			$msg = "Le billet demandé n'existe pas.";
			require_once('View/Frontend/viewError.php');
		}		
	}

//FONCTIONNALITES

	public function billCheck($id) {
		return $this->_Bill->checkBill($id);
	}

	//AJOUTE UN BILLET
	public function billAdd($title, $content) {
		$params = array(
			"titre" => $title,
			"contenu" => $content		
		);

		return $result = $this->_Bill->addBill($params);
	}

	//EDITE UN BILLET
	public function billEdit($id, $title, $content) {
		$params = array(
			"id" => $id,
			"titre" => $title,
			"contenu" => $content
		);

		$this->_Bill->editBill($params);
	}

	//SUPPRIME UN BILLET
	public function billDelete($id) {
		$this->_Bill->deleteBill($id);
	}

}