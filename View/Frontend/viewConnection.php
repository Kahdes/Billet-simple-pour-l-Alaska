<?php $title = "Billet simple pour l'Alaska : Connexion"; ?>
<?php $description = ""; ?>

<?php ob_start(); ?>	

<?php require_once('View/Frontend/banner.php');?>

<?php
	if (!isset($_SESSION['account']) && !isset($_SESSION['password'])) {
?>
		<section class="row" id="connexion-panel">
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3" id="connexion-sign-in">
				<h3>Se connecter au site :</h3>
				<form action="index.php?action=connexion" method="post">
					<div class="form-group">
						<label for="sign-account">Compte : </label>
						<input type="text" name="sign-account" id="sign-account" class="form-control input-lg" required />
					</div>
					
					<div class="form-group">
						<label for="sign-password">Mot de passe : </label>
						<div class="input-group">
							<input type="password" name="sign-password" id="sign-password" class="form-control input-lg" required />
							<span class="input-group-addon glyphicon glyphicon-eye-open show-pass"></span>
						</div>
					</div>

					<div class="form-group">					
						<label for="sign-stay">Rester connecter : </label>
						<input type="checkbox" name="sign-stay" id="sign-stay" />
					</div>

					<div class="form-group">
						<button class="btn btn-info btn-block" type="submit">Se connecter</button>
					</div>
				</form>
			</div>
		</section>
<?php
	} else {
?>
		<section class="row">
			<article class="alert alert-success">
				<h1 class="panel-heading">Vous êtes connecté au site !</h1>
				<form action="index.php" method="post">
					<div class="form-group">
						<button class="btn btn-danger btn-block" type="submit">Se déconnecter</button>
					</div>
				</form>
			</article>
		</section>
<?php
	}
?>	

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>