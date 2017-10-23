<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Logo</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <!-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Link</a></li> -->
                <li><a href="index.php">Accueil</a></li>
                <li><a href="utilisateur.php">Profil</a></li>
                <li class="<?= ($page=='titrailles')?'active':'' ?>"><a href="titre_CV.php">Titrailles</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Parcours<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="experiences.php">Experiences</a></li>
                        <li><a href="realisations.php">Réalisations</a></li>
                        <li><a href="formations.php">Formations</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Compétences<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="competences.php">Compétences</a></li>
                        <li><a href="loisirs.php">Loisirs</a></li>
                        <li><a href="reseaux.php">Réseaux</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tables<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a class="page-table" href="#">Titrailles</a></li>
                        <li><a class="page-table" href="#">Experiences</a></li>
                        <li><a class="page-table" href="#">Réalisations</a></li>
                        <li><a class="page-table" href="#">Formations</a></li>
                        <li><a class="page-table" href="#">Compétences</a></li>
                        <li><a class="page-table" href="#">Loisirs</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Chercher</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="utilisateur.php">Déconnexion</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
