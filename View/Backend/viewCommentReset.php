<?php $this->title = "Tableau de bord : rétablissement du commentaire"; ?>
<?php $this->description = ""; ?>

<section class="row" id="dashboard-manage">
	<article class="col-xs-12">
		<h1 class="page-header">Gérer les commentaires</h1>
	</article>

	<article class="col-xs-12 bill">
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
		<form action="index.php?action=dashboard&amp;admin=commentReset&amp;id=<?=$_GET['id'];?>" method="post">
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