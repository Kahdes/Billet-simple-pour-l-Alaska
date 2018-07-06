<?php $this->title = "Tableau de bord : création de billet"; ?>
<?php $this->description = ""; ?>

<section class="row" id="dashboard-create">
	<article class="col-xs-12">
		<h1 class="page-header">Créer un billet</h1>
	</article>

	<article class="col-xs-12">
		<form action="index.php?action=dashboard&amp;admin=create" method="post">
			<div class="form-group">
				<label for="create-title">Titre du billet : </label>
				<input type="text" name="create-title" id="create-title" class="form-control input-lg" required />
			</div>
					
			<div class="form-group">
				<label for="create-body">Contenu du billet : </label>
				<textarea name="create-body" id="create-body"></textarea>
			</div>

			<div class="form-group">					
				<label for="create-confirm">Confirmer la création du billet : </label>
				<input type="checkbox" name="create-confirm" id="create-confirm" required />
			</div>

			<div class="form-group">
				<button class="btn btn-success btn-block" type="submit">Créer le billet</button>
			</div>
		</form>
	</article>
</section>