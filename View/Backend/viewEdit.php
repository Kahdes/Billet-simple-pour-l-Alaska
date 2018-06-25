<?php $title = "Tableau de bord : édition de billet"; ?>
<?php $description = ""; ?>

<?php ob_start(); ?>

<section class="row" id="dashboard-edit">
	<article class="col-xs-12">
		<h1 class="page-header">Editer un billet</h1>
	</article>

	<article class="col-xs-12">
	</article>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>