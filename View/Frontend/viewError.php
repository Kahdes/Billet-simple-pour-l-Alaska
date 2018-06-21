<?php $title = $msg; ?>
<?php $description = ""; ?>

<?php ob_start(); ?>

<?php require_once('View/Frontend/banner.php');?>

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