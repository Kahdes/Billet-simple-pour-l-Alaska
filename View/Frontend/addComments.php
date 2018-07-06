<section class="row" id="bill-new-comment">
	<article class="col-xs-12 col-md-10 col-md-offset-1">
		<h2>Ajouter un nouveau commentaire :</h3>			
		<br/>

		<form action="#" method="post">				
			<div class="form-group">
				<label for="pseudo">Pseudo : </label><br/>
				<?php
					if (isset($_COOKIE['pseudo'])) {
				?>
					<input class="form-control" type="text" name="pseudo" value="<?=$_COOKIE['pseudo']?>" id="pseudo" placeholder="Anonyme" required />
				<?php
					} else {
				?>
					<input class="form-control" type="text" name="pseudo" id="pseudo" placeholder="Anonyme" required />
				<?php		
					}
				?>				
			</div>

			<div class="form-group">
				<label for="comment">Commentaire : </label><br/>
				<textarea class="form-control" name="comment" id="comment" placeholder="Laissez votre message ici..." required></textarea>
			</div>

			<div class="form-group">
				<label for="comment-confirm">Je confirme l'envoi de ce commentaire : 
				<input type="checkbox" name="comment-confirm" id="comment-confirm" required /></label>		
			</div>	

			<input class="btn btn-info form-control" id="submit" type="submit" />
		</form>
	</article>
</section>