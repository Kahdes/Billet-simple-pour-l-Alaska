<?php $title = "Billet simple pour l'Alaske : Liste des billets"; ?>
<?php $description = "Découvrez l'histoire du dernier livre de Jean Forteroche : 'Billet simple pour l'Alaska' au travers de ce billet"; ?>

<?php ob_start(); ?>

<br/>

<section class="row" id="bill">
	<article class="col-xs-12 panel">
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
					
				</p>
		<?php
			}
		?>

	</article>
</section>

<hr/>

<!--FAIRE UN INCLUDE FORMULAIRE + TINYMCE ?-->
<?php require_once('View/addComments.php'); ?>

<!--FAIRE UN INCLUDE LISTE DE COMM. ?-->
<?php require_once('View/comments.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>