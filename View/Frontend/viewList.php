<?php $title = "Billet simple pour l'Alaska : Liste des billets"; ?>
<?php $description = "Découvrez tous les billets du dernier livre de Jean Forteroche : 'Billet simple pour l'Alaska'"; ?>

<?php ob_start(); ?>

<?php require_once('View/Frontend/banner.php');?>

<section class="row" id="bill-list">
	<br />
	<?php
		$total = 0;
		foreach($bill as $b) {
			$b['contenu'] = substr($b['contenu'], 0, 850);
			$total += 1;
	?>
		<article class="col-xs-12 col-md-8 col-md-offset-2 panel billList-bill">
			<h2 class="panel-header">
				<a class="custom-a" href="index.php?action=bill&amp;id=<?= $b['id'];?>">
					<?= $b['titre'];?>
				</a>
			</h2>
			<hr/>
			<div class="panel-body">
				<?= $b['contenu'];?>... 
				<a class="custom-a" href="index.php?action=bill&amp;id=<?= $b['id'];?>">Lire la suite</a>
				<br/><br/>
				<em class="pull-right">
				Publié le : <?= $b['dateFR'];?>
				</em>
			</div>			
		</article>
	<?php
		}
	?>
</section>

<section class="row" id="bill-list-btn">
	<button class="btn btn-large btn-info" id="prev">&laquo; Précédent</button>
	<span><span id="current-bill">1</span> / <?=$total;?></span>
	<button class="btn btn-large btn-info" id="next">Suivant &raquo;</button>
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>