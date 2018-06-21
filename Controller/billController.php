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

	//PAGE : ACCUEIL + DERNIER BILLET
	//OK
	public function billHome() {
		$bill = $this->_Bill->getLastBill();
		require_once('View/Frontend/viewHome.php');
	}
	
	//PAGE : LISTE DES BILLETS
	//OK
	public function billList() {
		$bill = $this->_Bill->getBillList();
		require_once('View/Frontend/viewList.php');
	}	

	//PAGE : BILLET + COMMENTAIRES
	//OK
	public function billInfo($id, $page) {
		if (!$this->_Bill->checkBill($id)->fetch() === false) {
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

}