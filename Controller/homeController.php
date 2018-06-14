<?php

require_once('Model/Bill.php');

class homeController {
	
	private $_Bill;

	public function __construct() {
		$this->_Bill = new Bill();
	}

	public function home() {
		$bill = $this->_Bill->getLastBill();
		require_once('View/viewHome.php');
	}
}