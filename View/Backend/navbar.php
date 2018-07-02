<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Billet simple pour l'Alaska</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse-2">
            <ul class="nav navbar-nav">
                <li class="navbar-link" id="dashboard">
                    <a href="index.php?action=dashboard"><span class="glyphicon glyphicon-inbox"></span> Tableau de bord</a>
                </li>         
                <li class="navbar-link" id="create">
                    <a href="index.php?action=dashboard&admin=create"><span class="glyphicon glyphicon-book"></span> Créer un billet</a>
                </li>
                <li class="navbar-link" id="dashboard-home">
                    <a href="index.php"><span class="glyphicon glyphicon-home"></span> Site</a>
                </li>
            </ul>
            <form class="navbar-form navbar-right inline-form" action="index.php" method="post">
                <div class="form-group">
                    <button class="btn btn-danger btn-sm" type="submit" value="disconnect" name="disconnect">Déconnexion</button>
                </div>
            </form>
        </div>
    </div>
</nav>