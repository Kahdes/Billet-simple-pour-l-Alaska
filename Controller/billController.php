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

	//CHECK BILLET EXISTANT + BOUTON BILLET SUIVANT
	public function billMax($id) {
		$idCheck = $this->_Bill->getBillMax($id);
		$a = 0;
		while ($data = $idCheck->fetch()) {
			$a += 1;
		}
		return $a;
	}

	//PAGE : ACCUEIL + DERNIER BILLET
	public function billHome() {
		$bill = $this->_Bill->getLastBill();
		require_once('View/viewHome.php');
	}
	
	//PAGE : LISTE DES BILLETS
	public function billList() {
		$bill = $this->_Bill->getBillList();
		require_once('View/viewList.php');
	}	

	//PAGE : BILLET + COMMENTAIRES
	public function billInfo($id, $page) {
		$max = $this->billMax($id + 1);
		$bill = $this->_Bill->getBillInfo($id);
		$pages = $this->_Comments->getTotalComments($id);
		$liPages = 0;
		while ($data = $pages->fetch()) {
			$total = (int) $data['total'];
			$liPages = ceil($total / 5);
		}
		$comments = $this->_Comments->getComments($id, $page);
		require_once('View/viewBill.php');
	}

}