<?php $title = "Tableau de bord : rétablissement du commentaire"; ?>
<?php $description = ""; ?>

<?php ob_start(); ?>

<section class="row" id="dashboard-manage">
	<article class="col-xs-12">
		<h1 class="page-header">Gérer les commentaires</h1>
	</article>

	<article class="col-xs-12" id="bill">
		<?php
			foreach($comment as $c) {
		?>
			<h1 class="panel-heading" id="bill-title">
				<?= $c['pseudo'];?>					
			</h1>

			<p id="bill-date">
				<em>
					Publié le : <?= $c['dateFR'];?>
				</em>
			</p>

			<hr/>
					
			<div class="panel-body" id="bill-body">
				<?= $c['contenu'];?> 
				<br/><br/>
			</div>
		<?php
			}
		?>
	</article>

	<article class="col-xs-12">
		<br/>
		<form action="index.php?action=dashboard&admin=commentReset&id=<?=$_GET['id'];?>" method="post">
			<div class="form-group">
				<label for="reset-comment-confirm">Confirmer le rétablissement du commentaire : </label>
				<input type="checkbox" name="reset-comment-confirm" id="reset-comment-confirm" required />
			</div>

			<div class="form-group">
				<button class="btn btn-info btn-block" type="submit">Rétablir le commentaire</button>
			</div>
		</form>
	</article>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>