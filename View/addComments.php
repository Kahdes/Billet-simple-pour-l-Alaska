<section class="row" id="bill-new-comment">
	<div class="col-xs-12 col-md-10 col-md-offset-1">
		<h2>Ajouter un nouveau commentaire :</h3>
			
		<br/>

		<form action="#" method="post">
				
			<div class="form-group">
				<label for="pseudo">Pseudo : </label><br/>			
				<input class="form-control" type="text" name="pseudo" id="pseudo" placeholder="Anonyme" required />
			</div>

			<div class="form-group">
				<label for="comment">Commentaire : </label><br/>
				<textarea class="form-control" name="comment" id="comment" placeholder="Laissez votre message ici..." required></textarea>
			</div>

			<div class="form-group">
				<label for="comment-confirm">Je confirme l'envoi de ce commentaire : </label>
				<input type="checkbox" name="comment-confirm" id="comment-confirm" required />
			</div>	

			<input class="btn btn-info form-control" type="submit" />
		</form>
	</div>
</section>