<?php $title = "Signaler un commentaire"; ?>
<?php $description = ""; ?>

<?php ob_start(); ?>

<?php require_once('View/banner.php');?>

	<?php
		if (isset($_POST['confirm'])) {
	?>
			<section class="row">
				<article class="alert alert-success">
					<h1 class="panel-heading">Votre signalement a été pris en compte !</h1>
					<p class="panel-body"><a href="index.php?action=billList">Retour à la liste des billets -></a></p>
				</article>
			</section>
	<?php
		} else {
	?>
			<br/>
			<section class="row" id="flagged">
				<div class="col-xs-12 col-md-10 col-md-offset-1">
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
								<em>
									Publié le : <?= htmlspecialchars($c['dateFR']);?>
								</em>
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
				</div>

				<article class="col-xs-12 col-md-10 col-md-offset-1" id="flagged-form">
					<form action="#" method="post">
						<div class="form-group">
							<label for="confirm">Je confirme vouloir signaler ce commentaire : </label>
							<input type="checkbox" name="confirm" id="confirm" required/><br/>
						</div>

						<input class="btn btn-info form-control" type="submit" />

						<br/><br/>
					</form>
				</article>	
			</section>
	<?php
		}
	?>
	

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>