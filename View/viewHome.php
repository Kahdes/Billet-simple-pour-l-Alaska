<?php $title = 'Accueil'; ?>
<?php $description = ''; ?>

<?php ob_start(); ?>

	<header class="row" id="home-banner">
		<div class="col-xs-12" id="home-banner-title">
			<h1 class="page-header">Billet somple pour l'Alaska</h1>	
		</div>

		<div class="col-xs-12" id="home-banner-img">
			<p>
			</p>
		</div>
	</header>

	<section class="row" id="home-last-infos">
		<article class="col-xs-12 order-last col-md-6" id="home-last-bill">
			<?php
				foreach($bill as $b) {
			?>
					<h2 class="panel-heading">
						<a href="index.php?action=bill&amp;id=<?= $b['id'];?>">
							<?= htmlspecialchars($b['titre']);?>
						</a>
					</h2>
					<p class="panel-body">
						<?= htmlspecialchars($b['contenu']);?> 
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

		<article class="col-xs-12 order-first col-md-6" id="home-author">			
			<h2 class="panel-heading">A propos de l'auteur :</h2>
			<blockquote class="panel-body">
				<p>
					"ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
				</p>
				<p class="pull-right">- Jean Forteroche</p>
			</blockquote>
		</article>
	</section>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>