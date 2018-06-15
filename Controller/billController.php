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
	
	public function billList() {
		$bill = $this->_Bill->getBillList();
		require_once('View/viewList.php');
	}	

	public function billMax($id) {
		$idCheck = $this->_Bill->getBillMax($id);
		$a = 0;
		while ($data = $idCheck->fetch()) {
			$a += 1;
		}
		return $a;
	}

	public function billInfo($id) {
		$bill = $this->_Bill->getBillInfo($id);
		$maxID = $this->billMax($id + 1);
		$comments = $this->_Comments->getComments($id);
		require_once('View/viewBill.php');
	}

	public function addComment($id, $content, $pseudo) {
		$params = array(
			"id" => $id,
			"pseudo" => $pseudo,
			"contenu" => $content		
		);		
		$this->_Comments->addComment($params);
		header("Location: index.php?action=bill&id=$id");
	}
}