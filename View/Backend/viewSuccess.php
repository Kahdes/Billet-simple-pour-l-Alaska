<?php $title = $msg; ?>
<?php $description = ""; ?>

<?php ob_start(); ?>

<section class="row" id="success">
	<article class="alert alert-success">
		<h1 class="panel-heading"><?= $msg;?></h1>
		<p class="panel-body">
			<a href="index.php?action=dashboard">Retour au tableau de bord -></a>
			<br/>
			<a href="index.php">Aller vers le site -></a>
		</p>
	</article>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>