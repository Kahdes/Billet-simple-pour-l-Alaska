<?php

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
	public function dashboard($p_comm = 0) {
		$pages_comm = $this->_Comments->getTotalFlaggedComments();
		while ($data = $pages_comm->fetch()) {
			$liPages = ceil(($data['total']) / 5);
		}

		$view = new View('Dashboard', 'Backend');
		$view->generate(array(
			'bill' => $this->_Bill->getBillList(),
			'comments' => $this->_Comments->getFlaggedComments($p_comm),
			'liPages' => $liPages
		));
	}

	//CREATION DE BILLET
	public function create() {
		$view = new View('BillCreate', 'Backend');
		$view->generate(array());	
	}

	//EDITION DE BILLET
	public function edit($id) {	
		$view = new View('BillEdit', 'Backend');
		$view->generate(array('bill' => $this->_Bill->getBill($id)));
	}

	//SUPPRESSION DE BILLET
	public function delete($id) {
		$view = new View('BillDelete', 'Backend');
		$view->generate(array('bill' => $this->_Bill->getBill($id)));
	}

	//GESTION COMMENTAIRE
	public function commentManage($id, $action) {
		if ($action === 'CommentReset') {
			$view = new View('CommentReset', 'Backend');
			$view->generate(array('comment' => $this->_Comments->getComment($id)));
		} elseif ($action === 'CommentDelete') {
			$view = new View('CommentDelete', 'Backend');
			$view->generate(array('comment' => $this->_Comments->getComment($id)));
		}
	}
}
