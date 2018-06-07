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

//CONNEXION + INSCRIPTION
function connexion() {

}

//PAGE SPECIFIQUE DE BILLET + COMMENTAIRES
function billInfo() {

}

//CREATION + MODIFICATION + SUPPRESSION DE BILLETS
function manageBills() {

}

//ERREUR
function error($msg) {
	require_once('View/viewError.php');
}
