<?php $title = 'Accueil'; ?>
<?php $description = ''; ?>

<?php ob_start(); ?>

<?php require_once('View/banner.php');?>

	<section class="row" id="home-last-infos">
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
					$b['contenu'] = substr($b['contenu'], 0, 1000);
			?>
					<h3 class="panel-heading">
						<a href="index.php?action=bill&amp;id=<?= $b['id'];?>">
							<?= htmlspecialchars($b['titre']);?>
						</a>
					</h3>
					<p class="panel-body">
						<?= htmlspecialchars($b['contenu']);?>... 
						<a href="index.php?action=bill&amp;id=<?= $b['id'];?>">Lire la suite</a>
						<br/><br/>				
						<em class="pull-right">
							Publié le : <?= htmlspecialchars($b['dateFR']);?>
						</em>
					</p>
			<?php
				}
			?>
		</article>		
	</section>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>