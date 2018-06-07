<?php $title = "Billet simple pour l'Alaske : Liste des billets"; ?>
<?php $description = "Découvrez l'histoire du dernier livre de Jean Forteroche : 'Billet simple pour l'Alaska' au travers de ce billet"; ?>

<?php ob_start(); ?>

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
				
				<p class="panel-body" id="bill-body">
					<?= htmlspecialchars($b['contenu']);?> 
					<br/><br/>				
					
				</p>
		<?php
			}
		?>
	</article>
</section>

<!--FAIRE UN INCLUDE FORMULAIRE + TINYMCE ?-->

<section class="row" id="bill-new-comment">
	
</section>

<!--FAIRE UN INCLUDE LISTE DE COMM. ?-->
<section class="row" id="bill-comment-list">
	
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>