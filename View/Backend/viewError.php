<?php $title = $msg; ?>
<?php $description = ""; ?>

<?php ob_start(); ?>

<section class="row" id="error">
	<article class="alert alert-danger">
		<h1 class="panel-heading"><?= $msg;?></h1>
		<p class="panel-body">
			<a href="index.php?action=dashboard">Retour au tableau de bord -></a>
		</p>
	</article>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>