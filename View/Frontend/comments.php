<section class="row" id="comment-list">
	<article class="col-xs-12 col-md-10 col-md-offset-1">
		<h2>Derniers commentaires :</h2>
		<br/>

		<?php
			foreach($comments as $c) {				 
		?>
				<div class="panel">
					<h3 class="panel-heading" id="comment-title">
						<?= htmlspecialchars($c['pseudo']);?>
						<a href="index.php?action=flag&id=<?=htmlspecialchars($c['id']);?>">
							<span class="pull-right glyphicon glyphicon-flag show-pass flag" title="Signaler ce commentaire" id="flag-<?=$c['id'];?>"></span>
						</a>
					</h3>

					<p id="comment-date">
						<em>Publié le : <?= $c['dateFR'];?></em>
					</p>

					<hr/>
					
					<p class="panel-body" id="comment-body">
						<?=htmlspecialchars($c['contenu']);?><br/><br/>						
					</p>
				</div>
		<?php
			}
		?>

			<div class="col-xs-12 col-md-10 col-md-offset-1" id="comment-pagination">
				<ul class="pagination">
		<?php
				$id = (int) $_GET['id'];
				
				if (isset($_GET['page'])) {
					$page = (int) $_GET['page'];
				} else {
					$page = 1;
				}

				for ($i = 0; $i < $liPages; $i++) {
					if ($i + 1 === $page || ($page === 0 && $i === $page)) {
		?>
						<li>
							<a id="comment-active" href="index.php?action=bill&id=<?=$id;?>&page=<?=$i+1;?>"><?=$i+1;?></a>
						</li>
		<?php
					} else {
		?>
						<li>
							<a href="index.php?action=bill&id=<?=$id;?>&page=<?=$i+1;?>"><?=$i+1;?></a>
						</li>
		<?php
					}
				}
		?>
				</ul>
			</div>			
	</article>
</section>