<?php $this->title = "Tableau de bord : édition de billet"; ?>
<?php $this->description = ""; ?>

<section class="row" id="dashboard-edit">
	<article class="col-xs-12">
		<h1 class="page-header">Editer un billet</h1>
	</article>

	<?php
		foreach($bill as $b) {
	?>
	<article class="col-xs-12">
		<form action="index.php?action=dashboard&admin=edit&id=<?=$_GET['id']?>" method="post">
			<div class="form-group">
				<label for="edit-title">Titre du billet : </label>
				<input type="text" name="edit-title" id="edit-title" value="<?=$b['titre'];?>" class="form-control input-lg" required />
			</div>
					
			<div class="form-group">
				<label for="edit-body">Contenu du billet : </label>
				<textarea name="edit-body" id="edit-body"><?=$b['contenu'];?></textarea>
			</div>

			<div class="form-group">					
				<label for="edit-confirm">Confirmer la modification du billet : </label>
				<input type="checkbox" name="edit-confirm" id="edit-confirm" required />
			</div>

			<div class="form-group">
				<button class="btn btn-info btn-block" type="submit">Modifier le billet</button>
			</div>
		</form>
	</article>
	<?php
		}
	?>	
</section>