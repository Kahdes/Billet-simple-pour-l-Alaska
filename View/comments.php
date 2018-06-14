<section class="row" id="comment-list">
	<div class="col-xs-12 col-md-10 col-md-offset-1">
		<h2>Derniers commentaires :</h1>
		<br/>

		<?php
			foreach($comments as $c) {
		?>
			<article class="panel">
				<h3 class="panel-heading" id="comment-title">
					<?= htmlspecialchars($c['pseudo']);?>
					<span class="pull-right glyphicon glyphicon-flag show-pass flag" title="Signaler ce commentaire"></span>
				</h3>

				<p id="comment-date">
					<em>
						Publié le : <?= htmlspecialchars($c['dateFR']);?>
					</em>
				</p>

				<hr/>
				
				<p class="panel-body" id="comment-body">
					<?= htmlspecialchars($c['contenu']);?> 
					<br/><br/>
				</p>
			</article>
		<?php
			}
		?>
	</div>
</section>