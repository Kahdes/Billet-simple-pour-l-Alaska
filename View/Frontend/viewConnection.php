<?php $title = "Billet simple pour l'Alaska : Connexion"; ?>
<?php $description = ""; ?>

<?php ob_start(); ?>	

<?php require_once('View/Frontend/banner.php');?>

<section class="row" id="connexion-panel">
	<article class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3" id="connexion-sign-in">
		<h3>Se connecter au site :</h3>
		<form action="index.php" method="post">
			<div class="form-group">
				<label for="sign-account">Compte : </label>
				<input type="text" name="sign-account" id="sign-account" class="form-control input-lg" required />
			</div>
					
			<div class="form-group">
				<label for="sign-password">Mot de passe : </label>
				<input type="password" name="sign-password" id="sign-password" class="form-control input-lg" required />
			</div>

			<div class="form-group">					
				<label for="sign-stay">Rester connecter : </label>
				<input type="checkbox" name="sign-stay" id="sign-stay" />
			</div>

			<div class="form-group">
				<button class="btn btn-info btn-block" type="submit">Se connecter</button>
			</div>
		</form>
	</article>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>