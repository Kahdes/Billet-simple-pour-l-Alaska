<?php $this->title = $msg; ?>
<?php $this->description = ""; ?>

<section class="row" id="success">
	<article class="alert alert-success">
		<h1 class="panel-heading"><?= $msg;?></h1>
		<div class="panel-body">
			<p >
				<a class="btn btn-default" href="index.php?action=dashboard">Retour au tableau de bord -></a>
			</p>
			<p>
				<a class="btn btn-default" href="index.php">Aller vers le site -></a>
			</p>
		</div>
	</article>
</section>