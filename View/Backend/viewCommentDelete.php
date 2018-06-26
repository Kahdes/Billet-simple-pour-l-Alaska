<?php $title = "Tableau de bord : suppression du commentaire"; ?>
<?php $description = ""; ?>

<?php ob_start(); ?>

<section class="row" id="dashboard-manage">
	<article class="col-xs-12">
		<h1 class="page-header">Gérer les commentaires</h1>
	</article>
</section>

<section class="row" id="dashboard-manage-comment">
	<article class="col-xs-12">
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
</section>

<section class="row" id="dashboard-manage-options">
	<article class="col-xs-12">
		<form action="index.php?action=dashboard&admin=commentDelete&id=<?=$_GET['id'];?>" method="post">
			<div class="form-group">
				<label for="delete-comment-confirm">Confirmer la suppression du commentaire : </label>
				<input type="checkbox" name="delete-comment-confirm" id="delete-comment-confirm" required />
			</div>

			<div class="form-group">
				<button class="btn btn-danger col-xs-12" name="reset" type="submit">Supprimer le commentaire</button>
			</div>
		</form>
	</article>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>