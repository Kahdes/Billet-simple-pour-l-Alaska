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
	public function dashboard() {
		$bill = $this->_Bill->getLastBill();
		require_once('View/Backend/viewDashboard.php');
	}

	//CREATION DE BILLET
	public function create() {
		require_once('View/Backend/viewCreate.php');
	}

	//EDITION DE BILLET
	public function edit() {
		require_once('View/Backend/viewEdit.php');
	}

	//SUPPRESSION DE BILLET
	public function delete() {
		require_once('View/Backend/viewDelete.php');
	}

	//GESTION DES COMMENTAIRES
	public function manage() {
		require_once('View/Backend/viewManage.php');
	}
}
