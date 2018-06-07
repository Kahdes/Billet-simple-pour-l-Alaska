<?php $title = 'Connexion'; ?>
<?php $description = ''; ?>

<?php ob_start(); ?>

	<section class="row" id="connexion-panel">

		<!--FORMULAIRE DE CONNEXION-->
		<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3" id="connexion-sign-in">
			<h3>Se connecter au site :</h3>
			<form action="" method="post">
				<div class="form-group">
					<label for="sign-in-pseudo">Pseudo : </label>
					<input type="text" name="sign-in-pseudo" id="sign-in-pseudo" class="form-control input-lg" required />
				</div>
				
				<div class="form-group">
					<label for="sign-in-password">Mot de passe : </label>
					<div class="input-group">
						<input type="password" name="sign-in-password" id="sign-in-password" class="form-control input-lg" required />
						<span class="input-group-addon glyphicon glyphicon-eye-open show-pass"></span>
					</div>
				</div>

				<div class="form-group">
					<input type="checkbox" name="sign-in-keep" id="sign-in-keep" />
					<label for="sign-in-keep">Rester connecter</label>
				</div>

				<div class="form-group">
					<button class="btn btn-default btn-block" type="submit">Se connecter</button>
				</div>
			</form>
		</div>

		<!--FORMULAIRE DE CREATION DE COMPTE-->
		<!--
		<div class="col-xs-12 col-md-6" id="connexion-sign-up">
			<h3>S'inscrire sur le site :</h3>
			<form action="" method="post">
				<div class="form-group">
					<label for="sign-up-email">E-mail : </label>
					<input type="text" name="sign-up-email" id="sign-up-email" class="form-control input-lg" placeholder="aze@aze.com" required />
				</div>

				<div class="form-group">
					<label for="sign-up-pseudo">Pseudo : </label>
					<input type="text" name="sign-up-pseudo" id="sign-up-pseudo" class="form-control input-lg" required />
				</div>				

				<div class="form-group">
					<label for="sign-up-password">Mot de passe : </label>
					<div class="input-group">
						<input type="password" name="sign-up-password" id="sign-up-password" class="form-control input-lg" required />
						<span class="input-group-addon"><i class="glyphicons glyphicon-eye-open"></i></span>
					</div>					
				</div>

				<div class="form-group">
					<label for="sign-up-password-conf">Veuillez confirmer le mot de passe : </label>
					<div class="input-group">
						<input type="text" name="sign-up-password-conf" id="sign-up-password-conf" class="form-control input-lg" required />
						<span class="input-group-addon"><i class="glyphicons glyphicon-eye-open"></i></span>
					</div>
				</div>

				<div class="form-group">
					<button class="btn btn-default btn-block" type="submit">S'inscrire</button>
				</div>
			</form>
		</div>
		-->
	</section>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>