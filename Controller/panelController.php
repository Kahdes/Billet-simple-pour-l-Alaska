<?php

require_once('Model/Admin.php');

class panelController {

	private $_Bill;
	private $_Admin;
	private $_Comments;	

	public function __construct() {
		$this->_Bill = new Bill();
		$this->_Admin = new Admin();
		$this->_Comments = new Comments();
	}

//PAGES

	//TABLEAU DE BORD
	public function dashboard($id = 0) {
		$bill = $this->_Bill->getBillList();
		//$pages = $this->_Comments->getTotalFlaggedComments($id);
		$comments = $this->_Comments->getFlaggedComments();
		/*
		while ($data = $pages->fetch()) {
			$liPages = ceil(($data['total']) / 5);
		}
		*/
		require_once('View/Backend/viewDashboard.php');
	}

	//CREATION DE BILLET
	public function create($previsualize = null) {
		if (isset($previsualize)) {
			$bill = $this->_Bill->getLastBill();
		} 
		require_once('View/Backend/viewBillCreate.php');		
	}

	//EDITION DE BILLET
	public function edit($id) {
		$bill = $this->_Bill->getBill($id);
		require_once('View/Backend/viewBillEdit.php');
	}

	//SUPPRESSION DE BILLET
	public function delete($id) {
		if (isset($_POST['delete-confirm'])) {
			$deleted;
		}
		$bill = $this->_Bill->getBill($id);
		require_once('View/Backend/viewBillDelete.php');
	}

	//GESTION DES COMMENTAIRES
	public function commentReset($id) {
		$comment = $this->_Comments->getComment($id);
		require_once('View/Backend/viewCommentReset.php');
	}

	//GESTION DES COMMENTAIRES
	public function commentDelete($id) {
		$comment = $this->_Comments->getComment($id);
		require_once('View/Backend/viewCommentDelete.php');
	}
}
