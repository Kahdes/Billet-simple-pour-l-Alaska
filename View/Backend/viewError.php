<?php $this->title = $msg; ?>
<?php $this->description = ""; ?>

<section class="row" id="error">
	<article class="alert alert-danger">
		<h1 class="panel-heading"><?= $msg;?></h1>
		<p class="panel-body">
			<a class="btn btn-default" href="index.php?action=dashboard">Retour au tableau de bord -></a>
		</p>
	</article>
</section>