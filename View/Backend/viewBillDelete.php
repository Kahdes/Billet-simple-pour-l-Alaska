<?php $title = "Tableau de bord : suppression de billet"; ?>
<?php $description = ""; ?>

<?php ob_start(); ?>

<section class="row" id="dashboard-delete">
	<article class="col-xs-12">
		<h1 class="page-header">Supprimer un billet</h1>
	</article>

	<article class="col-xs-12" id="bill">
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

	<article class="col-xs-12">
		<br/>
		<form action="index.php?action=dashboard&admin=delete&id=<?=$_GET['id']?>" method="post">
			<div class="form-group">
				<label for="delete-bill-confirm">Confirmer la suppression du billet et de ses commentaires : </label>
				<input type="checkbox" name="delete-bill-confirm" id="delete-bill-confirm" required />
			</div>			

			<div class="form-group">
				<button class="btn btn-danger btn-block" type="submit">Supprimer le billet</button>
			</div>
		</form>
	</article>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>