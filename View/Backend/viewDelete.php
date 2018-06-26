<?php $title = "Tableau de bord : suppression de billet"; ?>
<?php $description = ""; ?>

<?php ob_start(); ?>

<section class="row" id="dashboard-delete">
	<article class="col-xs-12">
		<h1 class="page-header">Supprimer un billet</h1>
	</article>
</section>

<section class="row" id="bill">
	<article>
	<?php
		foreach($bill as $b) {
	?>
		<h1 class="panel-heading" id="bill-title">
			<?= $b['titre'];?>					
		</h1>

		<p id="bill-date">
			<em>
				Publié le : <?= $b['dateFR'];?>
			</em>
		</p>

		<hr/>
				
		<div class="panel-body" id="bill-body">
			<?= $b['contenu'];?> 
			<br/><br/>
		</div>
	<?php
		}
	?>
	</article>
</section>

<section class="row">
	<article class="col-xs-12">
		<form action="index.php?action=dashboard&admin=delete&id=<?=$_GET['id']?>" method="post">
			<label for="delete-bill-confirm">Confirmer la suppression du billet et de ses commentaires : </label>
			<input type="checkbox" name="delete-bill-confirm" id="delete-bill-confirm" required />

			<div class="form-group">
				<button class="btn btn-danger btn-block" type="submit">Supprimer le billet</button>
			</div>
		</form>
	</article>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>