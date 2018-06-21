<?php

require_once('Model/Model.php');

class Admin extends Model {

	public function isAdminAccount($account) {
		$sql = '
			SELECT id,
			       pseudo,
				   password AS p,
				   account_identifier AS ac
			FROM comptes
			WHERE account_identifier = :account
		';
		$params = array(
			"account" => $account
		);
		return $this->sqlRequest($sql, $params);
	}
	
}