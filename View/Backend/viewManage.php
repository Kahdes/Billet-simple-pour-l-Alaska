<?php $title = "Tableau de bord : gestion des signalements"; ?>
<?php $description = ""; ?>

<?php ob_start(); ?>

<section class="row" id="bill">
	<article class="col-xs-12">
		<h1 class="page-header">Tableau de bord</h1>
		<p>
			<a href="index.php">Aller vers le site -></a><br/>
			<a href="index.php?action=dashboard">Retour au tableau de bord -></a>
		</p>
	</article>

	<article class="col-xs-12">
		<h2>Billets</h1>
		<p>
			<a class="btn btn-success" href="index.php?action=dashboard&admin=create">Créer un billet</a>
			<a class="btn btn-info" href="index.php?action=dashboard&admin=edit">Editer un billet</a>
			<a class="btn btn-danger" href="index.php?action=dashboard&admin=delete">Supprimer un billet</a>
		</p>
	</article>

	<article class="col-xs-12">
		<h2>Commentaires</h1>
		<p>
			<a class="btn btn-warning" href="index.php?action=dashboard&admin=manage">Gérer les signalements</a>
		</p>
	</article>

	<article class="col-xs-12">
		
		
	</article>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>