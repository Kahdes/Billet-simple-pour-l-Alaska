<?php $title = "Billet simple pour l'Alaske : Liste des billets"; ?>
<?php $description = "Découvrez tous les billets du dernier livre de Jean Forteroche : 'Billet simple pour l'Alaska'"; ?>

<?php ob_start(); ?>

<?php require_once('View/banner.php');?>

<br/>

<section class="row">
	<article class="alert alert-danger">
		<h1 class="panel-heading">Erreur</h1>
		<p class="panel-body">
			<?= $msg;?>
		</p>
	</article>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>