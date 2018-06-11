<?php $title = "Billet simple pour l'Alaske : Liste des billets"; ?>
<?php $description = "Découvrez tous les billets du dernier livre de Jean Forteroche : 'Billet simple pour l'Alaska'"; ?>

<?php ob_start(); ?>

<section class="row">
	<br />
	<?php
		foreach($bill as $b) {
			$b['contenu'] = substr($b['contenu'], 0, 1000);
	?>
		<article class="col-xs-12 col-md-10 col-md-offset-1 panel">
			<h2 class="panel-header">
				<a href="index.php?action=bill&amp;id=<?= $b['id'];?>">
					<?= htmlspecialchars($b['titre']);?>
				</a>
			</h2>
			<p class="panel-body">
				<?= htmlspecialchars($b['contenu']);?>... 
				<a href="index.php?action=bill&amp;id=<?= $b['id'];?>">Lire la suite</a>
				<br/><br/>
				<em class="pull-right">
				Publié le : <?= htmlspecialchars($b['dateFR']);?>
				</em>
			</p>			
		</article>
	<?php
		}
	?>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>