<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Billet simple pour l'Alaska</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="navbar-link" id="accueil">
                    <a href="index.php"><span class="glyphicon glyphicon-home"></span> Accueil</a>
                </li>
                <li class="navbar-link" id="billList">
                    <a href="index.php?action=billList"><span class="glyphicon glyphicon-book"></span> Liste des billets</a>
                </li>
<?php
    if (isset($_SESSION['account']) && isset($_SESSION['password'])) {
?>
                <li class="navbar-link" id="gestion">
                    <a href="index.php?action=dashboard"><span class="glyphicon glyphicon-bookmark"></span> Gestion</a>
                </li>
<?php
    }
?>
            </ul>
<?php
    if (isset($_SESSION['account']) && isset($_SESSION['password'])) {
?>
            <form class="navbar-form navbar-right inline-form" action="index.php" method="post">
                <div class="form-group">
                    <button class="btn btn-danger btn-sm" type="submit" value="disconnect" name="disconnect">Déconnexion</button>
                </div>
            </form>
<?php
    }
?>
        </div>
    </div>
</nav>