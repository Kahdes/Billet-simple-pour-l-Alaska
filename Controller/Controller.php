<?php

spl_autoload_register(function($class) {
	require_once($class . '.php');
});

//ACCUEIL + DERNIER BILLET + RECHERCHE ?
function home() {
	$billController = new billController();
	$bill = $billController->home();
	require_once('View/viewHome.php');
}

//PAGE LISTE DE TOUS LES BILLETS
function billList() {
	$billController = new billController();
	$bill = $billController->billList();
	require_once('View/viewList.php');
}

//PAGE SPECIFIQUE DE BILLET + COMMENTAIRES
function billInfo($id) {
	$billController = new billController();
	$bill = $billController->billInfo($id);
	$comments = $billController->billComm($id);
	require_once('View/viewBill.php');
}

//FONCTION ANTI-GRIEF ID DE BILLET INCONNU
function billMax($id) {
	$billController = new billController();
	$idCheck = $billController->billMax($id);
	$a = 0;
	while ($data = $idCheck->fetch()) {
		$a += 1;
	}
	return $a;
}

//CONNEXION + INSCRIPTION
function connexion() {

}

//CREATION + MODIFICATION + SUPPRESSION DE BILLETS
function manageBills() {

}

//ERREUR
function error($msg) {
	require_once('View/viewError.php');
}
