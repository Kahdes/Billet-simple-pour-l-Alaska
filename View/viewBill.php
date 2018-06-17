<?php $title = "Billet simple pour l'Alaske : billet"; ?>
<?php $description = "Découvrez l'histoire du dernier livre de Jean Forteroche : 'Billet simple pour l'Alaska' au travers de ce billet"; ?>

<?php ob_start(); ?>

<?php require_once('View/banner.php');?>

<section class="row" id="bill">
	<article class="col-xs-12">
		<?php
			foreach($bill as $b) {
		?>
				<h1 class="panel-heading" id="bill-title">
					<?= htmlspecialchars($b['titre']);?>					
				</h1>

				<p id="bill-date">
					<em>
						Publié le : <?= htmlspecialchars($b['dateFR']);?>
					</em>
				</p>

				<hr/>
				
				<p class="panel-body" id="bill-body">
					<?= htmlspecialchars($b['contenu']);?> 
					<br/><br/>

			<?php
				if ($id - 1 > 0) {
			?>
					<a href="index.php?action=bill&amp;id=<?= ($id-1); ?>">
						<button class="btn btn-info pull-left"><span class="glyphicon glyphicon-arrow-left"></span> Billet précédent</button>
					</a>
			<?php
				} 
				if ($maxID !== 0) {
			?>
					<a href="index.php?action=bill&amp;id=<?= ($id+1); ?>">
						<button class="btn btn-info pull-right">Billet suivant <span class="glyphicon glyphicon-arrow-right"></span></button>
					</a>
			<?php
				}
			?>
		<?php
			}
		?>
	</article>
</section>

<?php require_once('View/addComments.php'); ?>
<?php require_once('View/comments.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>