<?php $title = "Billet simple pour l'Alaske : billet"; ?>
<?php $description = "Découvrez l'histoire du dernier livre de Jean Forteroche : 'Billet simple pour l'Alaska' au travers de ce billet"; ?>

<?php ob_start(); ?>

<?php require_once('View/Frontend/banner.php');?>

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
				</p>
				
				<div id="bill-pagination">
					<ul class="pagination">

			<?php
				$count = 1;
				foreach ($list as $l) {
					if ($l['id'] === $_GET['id']) {
			?>
						<li id="bill-<?=$l['id'];?>">
							<a id="bill-active" href="index.php?action=bill&amp;id=<?= $l['id'];?>" title="Vers '<?=$l['titre'];?>'"><?=$count;?></a>
						</li>
			<?php
					} else {
			?>
						<li id="bill-<?=$l['id'];?>">
							<a href="index.php?action=bill&amp;id=<?= $l['id'];?>" title="Vers '<?=$l['titre'];?>'"><?=$count;?></a>
						</li>
			<?php
					}
			?>
										
			<?php
				$count++;
				} 
			?>
					</ul>
				</div>
				
		<?php
			}
		?>
	</article>
</section>

<?php require_once('View/Frontend/addComments.php'); ?>
<?php require_once('View/Frontend/comments.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>