<?php $this->title = "Billet simple pour l'Alaska : Liste des billets"; ?>
<?php $this->description = "Découvrez tous les billets du dernier livre de Jean Forteroche : 'Billet simple pour l'Alaska'"; ?>

<section class="row" id="bill-list">
	<article class="col-xs-12 col-md-10 col-md-offset-1">
		<h2 class="page-header">Liste des derniers billets :</h2>
	</article>

	<?php
		foreach($bill as $b) {
	?>
		<article class="col-xs-12 col-md-8 col-md-offset-2 panel">
			<h3 class="panel-header">
				<a class="custom-a" href="index.php?action=bill&amp;id=<?= $b['id'];?>">
					<?= $b['titre'];?>
				</a>
			</h3>
			<hr/>
			<div class="panel-body">
				<?= substr(strip_tags($b['contenu']), 0, 850) . '...';?>
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

	<div class="col-xs-12 col-md-10 col-md-offset-1" id="bill-pagination">
		<ul class="pagination">
	<?php				
		if (isset($_GET['page'])) {
			$page = (int) $_GET['page'];
		} else {
			$page = 1;
		}

		for ($i = 0; $i < $liPages; $i++) {
			if ($i + 1 === $page || ($page === 0 && $i === $page)) {
	?>
				<li>
					<a id="bill-active" href="index.php?action=billList&page=<?=$i+1;?>"><?=$i+1;?></a>
				</li>
		<?php
			} else {
		?>
				<li>
					<a href="index.php?action=billList&page=<?=$i+1;?>"><?=$i+1;?></a>
				</li>
		<?php
				}
			}
		?>
		</ul>
	</div>
</section>