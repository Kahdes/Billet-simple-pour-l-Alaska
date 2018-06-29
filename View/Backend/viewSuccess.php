<?php $this->title = $msg; ?>
<?php $this->description = ""; ?>

<section class="row" id="success">
	<article class="alert alert-success">
		<h1 class="panel-heading"><?= $msg;?></h1>
		<p class="panel-body">
			<a href="index.php?action=dashboard">Retour au tableau de bord -></a>
			<br/>
			<a href="index.php">Aller vers le site -></a>
		</p>
	</article>
</section>