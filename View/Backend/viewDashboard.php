<?php $this->title = "Tableau de bord"; ?>
<?php $this->description = ""; ?>

<section class="row" id="dashboard-main">
	<article class="col-xs-12">
		<h1 class="page-header">Tableau de bord</h1>
	</article>

	<article class="col-xs-12 col-md-6 table-responsive" id="dashboard-bills">
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
						<a class="btn btn-info btn-block" href="index.php?action=dashboard&amp;admin=edit&amp;id=<?=$b['id'];?>">Modifier</a>
						<a class="btn btn-danger btn-block" href="index.php?action=dashboard&amp;admin=delete&amp;id=<?=$b['id'];?>">Supprimer</a>
					</td>					
				</tr>
		<?php
			}
		?>
		</table>
	</article>

	<article class="col-xs-12 col-md-6 table-responsive" id="dashboard-comments">
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
						<a class="btn btn-info btn-block" href="index.php?action=dashboard&amp;admin=commentReset&amp;id=<?=$c['id'];?>">Rétablir</a>
						<a class="btn btn-danger btn-block" href="index.php?action=dashboard&amp;admin=commentDelete&amp;id=<?=$c['id'];?>">Supprimer</a>
					</td>					
				</tr>
		<?php
			}
		?>
		</table>

		<div class="col-xs-12 col-md-10 col-md-offset-1" id="comment-pagination">
			<ul class="pagination">
		<?php				
			if (isset($_GET['page_comm'])) {
				$page = (int) $_GET['page_comm'];
			} else {
				$page = 1;
			}

			for ($i = 0; $i < $liPages; $i++) {
				if ($i + 1 === $page || ($page === 0 && $i === $page)) {
		?>
					<li>
						<a id="comment-active" href="index.php?action=dashboard&page_comm=<?=$i+1;?>"><?=$i+1;?></a>
					</li>
		<?php
				} else {
		?>
					<li>
						<a href="index.php?action=dashboard&page_comm=<?=$i+1;?>"><?=$i+1;?></a>
					</li>
		<?php
				}
			}
		?>
				</ul>
			</div>
	</article>	
</section>