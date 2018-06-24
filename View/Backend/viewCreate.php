<?php $title = "Tableau de bord : création de billet"; ?>
<?php $description = ""; ?>

<?php ob_start(); ?>

<section class="row" id="bill">
	<article class="col-xs-12">
		<h1 class="page-header">Créer un billet</h1>
		<p>
			<a href="index.php">Aller vers le site -></a><br/>
			<a href="index.php?action=dashboard">Retour au tableau de bord -></a>
		</p>
	</article>

	<article class="col-xs-12">
		<form action="index.php" method="post">
			<div class="form-group">
				<label for="create-title">Titre du billet : </label>
				<input type="text" name="sign-account" id="sign-account" class="form-control input-lg" required />
			</div>
					
			<div class="form-group">
				<label for="create-body">Contenu du billet : </label>
				<textarea name="create-body" id="create-body" required>
					
				</textarea>
			</div>

			<div class="form-group">					
				<label for="create-confirm">Confirmer la création du billet : </label>
				<input type="checkbox" name="create-confirm" id="create-confirm" />
			</div>

			<div class="form-group">
				<button class="btn btn-info btn-block" type="submit">Se connecter</button>
			</div>
		</form>
	</article>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>