<?php $title = "Signaler un commentaire"; ?>
<?php $description = ""; ?>

<?php ob_start(); ?>

<?php require_once('View/Frontend/banner.php');?>

<section class="row" id="flagged">
	<article class="col-xs-12 col-md-10 col-md-offset-1">
		<h2>Signaler ce commentaire :</h2>
		<br/>
		<?php
			foreach($comment as $c) {
		?>
			<article class="panel">
				<h3 class="panel-heading" id="comment-title">
					<?= htmlspecialchars($c['pseudo']);?>
				</h3>

				<p id="comment-date">
					<em>Publié le : <?= htmlspecialchars($c['dateFR']);?></em>
				</p>

				<hr/>
							
				<p class="panel-body" id="comment-body">
					<?= htmlspecialchars($c['contenu']);?> 
					<br/><br/>
				</p>
			</article>
		<?php
		}
		?>
	</article>

	<article class="col-xs-12 col-md-10 col-md-offset-1" id="flagged-form">
		<form action="#" method="post">
			<div class="form-group">
				<label for="flag-confirm">Je confirme le signalement : </label>
				<input type="checkbox" name="flag-confirm" id="flag-confirm" required/><br/>
			</div>

			<input class="btn btn-info form-control" type="submit" />

			<br/><br/>
		</form>
	</article>	
</section>	

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>