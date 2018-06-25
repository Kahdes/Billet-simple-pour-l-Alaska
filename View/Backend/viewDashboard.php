<?php $title = "Tableau de bord"; ?>
<?php $description = ""; ?>

<?php ob_start(); ?>

<section class="row" id="dashboard-main">
	<article class="col-xs-12">
		<h1 class="page-header">Tableau de bord</h1>
	</article>

	<section class="col-xs-12" id="dashboard-infos">
		<article class="col-xs-6" id="dashboard-last-bill">
		<h2 class="panel-heading">Dernier billet paru :</h2>			
		<?php
			foreach($bill as $b) {
			$b['contenu'] = substr($b['contenu'], 0, 850);
		?>
				<h3 class="panel-heading">
					<a class="custom-a" href="index.php?action=bill&amp;id=<?= $b['id'];?>">
						<?= htmlspecialchars($b['titre']);?>
					</a>
				</h3>
				<p class="panel-body">
					<?= htmlspecialchars($b['contenu']);?>... 
					<a class="custom-a" href="index.php?action=bill&amp;id=<?= $b['id'];?>">Lire la suite</a>
					<br/><br/>				
					<em class="pull-right">
						Publié le : <?= htmlspecialchars($b['dateFR']);?>
					</em>
				</p>
		<?php
			}
		?>				
		</article>

		<article class="col-xs-6" id="dashboard-flagged-comment">
			<h2 class="panel-heading">Commentaire le plus signalé :</h2>			
		</article>
	</section>
	
	<section class="col-xs-12" id="dashboard-actions">
		<article class="col-xs-12" id="dashboard-bill-actions">
			<h2>Billets :</h1>
			<p>
				<a class="btn btn-success" href="index.php?action=dashboard&admin=create">Créer un billet</a>
				<a class="btn btn-info" href="index.php?action=dashboard&admin=edit">Editer un billet</a>
				<a class="btn btn-danger" href="index.php?action=dashboard&admin=delete">Supprimer un billet</a>
			</p>
		</article>

		<article class="col-xs-12" id="dashboard-comment-actions">
			<h2>Commentaires :</h1>
			<p>
				<a class="btn btn-warning" href="index.php?action=dashboard&admin=manage">Gérer les signalements</a>
			</p>
		</article>
	</section>

	
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>