<?php

require('Controller/Controller.php');

try {
	if (isset($_GET['action'])) {
		if ($_GET['action'] === 'billList') {
			billList();
		} elseif ($_GET['action'] === 'connexion') {
			require_once('View/viewConnection.php');
		} elseif ($_GET['action'] === 'bill' && isset($_GET['id'])) {
			$id = (int) $_GET['id'];
			if ($id > 0 && billMax($id) !== 0) {
				billInfo($id);
			} else {
				$errMsg = "Le billet demandé n'existe pas.";	
				error($errMsg);
			}
		} else {
			$errMsg = "La page demandée n'existe pas.";
			error($errMsg);
		}
	} else {
		home();
	}
} catch (Exception $e) {
	echo 'Erreur : ' . $e->getMessage();
}