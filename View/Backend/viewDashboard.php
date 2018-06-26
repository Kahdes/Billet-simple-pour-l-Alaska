<?php $title = "Tableau de bord"; ?>
<?php $description = ""; ?>

<?php ob_start(); ?>

<section class="row" id="dashboard-main">
	<article class="col-xs-12">
		<h1 class="page-header">Tableau de bord</h1>
	</article>

	<section class="col-xs-12 col-md-6 table-responsive" id="dashboard-bills">
		<table class="col-xs-12 table table-bordered table-striped table-condensed">
			<caption><h2>Liste des billets :</h2></caption>
			<tr>
				<th class="col-xs-9 ">Billet</th>
				<th class="col-xs-3">Action</th>
			</tr>
		<?php
			foreach($bill as $b) {
		?>
				<tr>
					<td>
						<h4 class="word-break">
							<a class="custom-a" href="index.php?action=bill&amp;id=<?= $b['id'];?>">
								<?= $b['titre'];?>
							</a>
						</h4>
						<p class="pull-left"><em><?= $b['dateFR'];?></em></p>
					</td>
					<td>
						<a class="btn btn-info btn-block" href="index.php?action=dashboard&admin=edit&id=<?=$b['id'];?>">Modifier</a>
						<a class="btn btn-danger btn-block" href="index.php?action=dashboard&admin=delete&id=<?=$b['id'];?>">Supprimer</a>
					</td>					
				</tr>
		<?php
			}
		?>
		</table>
	</section>

	<section class="col-xs-12 col-md-6 table-responsive" id="dashboard-comments">
		<table class="col-xs-12 table table-bordered table-striped table-condensed">
			<caption><h2>Commentaires signalés :</h2></caption>
			<tr>
				<th class="col-xs-9 word-break">Commentaire</th>
				<th class="col-xs-3">Action</th>
			</tr>
		<?php
			foreach($comments as $c) {
		?>
				<tr>
					<td>
						<h4>
							<a class="custom-a" href="index.php?action=flag&amp;id=<?= $c['id'];?>">
								<?= $c['pseudo'];?>
							</a>
						</h4>
						<p>Signalé <strong><?= $c['flagged'];?></strong> fois</p>
					</td>
					<td>
						<a class="btn btn-info btn-block" href="index.php?action=dashboard&admin=commentReset&id=<?=$c['id'];?>">Rétablir</a>
						<a class="btn btn-danger btn-block" href="index.php?action=dashboard&admin=commentDelete&id=<?=$c['id'];?>">Supprimer</a>
					</td>					
				</tr>
		<?php
			}
		?>
		</table>
	</section>	
</section>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>