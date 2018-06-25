<?php $title = $msg; ?>
<?php $description = ""; ?>

<?php ob_start(); ?>

<?php require_once('View/Frontend/banner.php');?>

<section class="row" id="error">
	<article class="alert alert-danger">
		<h1 class="panel-heading"><?= $msg;?></h1>
		<p class="panel-body">
			<a href="index.php">Retour à l'accueil -></a>
		</p>
	</article>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>