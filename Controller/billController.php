<?php

require_once('Model/billModel.php');

class billController {
	private $_billModel;

	public function __construct() {
		$this->_billModel = new billModel();
	}

	public function home() {
		return $this->_billModel->homeBill();
	}

	public function billList() {
		return $this->_billModel->listBills();
	}

	public function billInfo($id) {
		return $this->_billModel->infoBill($id);
	}
}