<?php $title = "Tableau de bord"; ?>
<?php $description = ""; ?>

<?php ob_start(); ?>

<section class="row" id="bill">
	<article class="col-xs-12">
		<p>
			<a href="index.php">Aller vers le site -></a>
		</p>
	</article>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>