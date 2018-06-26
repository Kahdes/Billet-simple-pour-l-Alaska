<?php $title = "Tableau de bord : création de billet"; ?>
<?php $description = ""; ?>

<?php ob_start(); ?>

<section class="row" id="dashboard-create">
	<article class="col-xs-12">
		<h1 class="page-header">Créer un billet</h1>
	</article>

	<?php
		if (isset($bill)) {
			foreach($bill as $b) {
	?>
				<section id="bill">
					<h2>Aperçu du billet :</h2>
					<article class="col-xs-12">						
						<h1 class="panel-heading" id="bill-title"><?= $b['titre'];?></h1>

						<p id="bill-date">
							<em>Publié le : <?= $b['dateFR'];?></em>
						</p>

						<hr/>
							
						<div class="panel-body" id="bill-body">
							<?= $b['contenu'];?> 
							<br/><br/>
						</div>
					</article>
				</section>	
	<?php
			}
		} else {
	?>
			<article class="col-xs-12">
				<br/>
				<form action="index.php?action=dashboard&admin=create" method="post">
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
	<?php
		}
	?>	
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>