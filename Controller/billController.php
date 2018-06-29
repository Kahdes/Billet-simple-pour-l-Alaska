<?php

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
		$view = new View('Home', 'Frontend');
		$view->generate(array('bill' => $this->_Bill->getLastBill()));
	}
	
	//LISTE DES BILLETS
	public function billList($page = 0) {
		$page_bill = $this->_Bill->getTotalBills();
		while ($data = $page_bill->fetch()) {
			$liPages = ceil(($data['total']) / 5);
		}

		$view = new View('List', 'Frontend');
		$view->generate(array(
			'bill' => $this->_Bill->getBills($page),
			'liPages' => $liPages
		));
	}	

	//BILLET & COMMENTAIRES
	public function billInfo($id, $page = 0) {
		if ($this->_Bill->checkBill($id)) {		
			$pages = $this->_Comments->getTotalComments($id);
			while ($data = $pages->fetch()) {
				$liPages = ceil(($data['total']) / 5);
			}
			
			$view = new View('Bill', 'Frontend');
			$view->generate(array(
				'bill' => $this->_Bill->getBill($id),
				'list' => $this->_Bill->getBillList(),
				'comments' => $this->_Comments->getComments($id, $page),
				'liPages' => $liPages
			));
		} else {
			$view = new View('Error', 'Frontend');
			$view->generate(array('msg' => "Le billet demandé n'existe pas."));
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