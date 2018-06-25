<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Billet simple pour l'Alaska</a>
        </div>
            <li class="navbar-link" id="dashboard">
                <a href="index.php?action=dashboard"><span class="glyphicon glyphicon-inbox"></span> Tableau de bord</a>
            </li>         
            <li class="navbar-link" id="create">
       	        <a href="index.php?action=dashboard&admin=create"><span class="glyphicon glyphicon-book"></span> Créer un billet</a>
            </li>
            <li class="navbar-link" id="edit">
                <a href="index.php?action=dashboard&admin=edit"><span class="glyphicon glyphicon-edit"></span> Editer un billet</a>
            </li>
            <li class="navbar-link" id="delete">
                <a href="index.php?action=dashboard&admin=delete"><span class="glyphicon glyphicon-ban-circle"></span> Supprimer un billet</a>
            </li>
            <li class="navbar-link" id="manage">
                <a href="index.php?action=dashboard&admin=manage"><span class="glyphicon glyphicon-warning-sign"></span> Gérer les commentaires</a>
            </li>
            <li class="navbar-link" id="dashboard-home">
                <a href="index.php"><span class="glyphicon glyphicon-home"></span> Vers le site</a>
            </li>
        </ul>
        <form class="navbar-form navbar-right inline-form" action="index.php" method="post">
            <div class="form-group">
                <button class="btn btn-danger btn-sm" type="submit" value="disconnect" name="disconnect">Se déconnecter</button>
            </div>
        </form>
    </div>
</nav>