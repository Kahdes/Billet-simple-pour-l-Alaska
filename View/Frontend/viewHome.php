<?php $this->title = "Billet simple pour l'Alaska : Accueil"; ?>
<?php $this->description = "Découvrez le dernier livre de Jean Forteroche : 'Billet somple pour l'Alaska'"; ?>

<section class="row" id="home">
	<article class="col-xs-12" id="home-author">
		<h2 class="panel-heading">A propos de l'auteur :</h2>
		<blockquote class="panel-body">
			"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
			<br/>
			<p class="pull-right">- Jean Forteroche</p>
		</blockquote>
	</article>

	<article class="col-xs-12" id="home-last-bill">
		<h2 class="panel-heading">Dernier billet paru :</h2>
		<?php
			foreach($bill as $b) {
			$b['contenu'] = substr($b['contenu'], 0, 850);
			$space = strrpos($b['contenu'], ' ');
		?>
				<h3 class="panel-heading">
					<a class="custom-a" href="index.php?action=bill&amp;id=<?= $b['id'];?>">
						<?= $b['titre'];?>
					</a>
				</h3>

				<div class="panel-body">
					<?= substr($b['contenu'], 0, $space);?>... 
					<a class="custom-a" href="index.php?action=bill&amp;id=<?= $b['id'];?>">Lire la suite</a>
					<br/><br/>				
					<em class="pull-right">Publié le : <?= $b['dateFR'];?></em>
				</div>
		<?php
			}
		?>
	</article>
</section>