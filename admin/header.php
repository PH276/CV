<?php
require 'connexion.php';

$sql = $pdoCV->query(" SELECT * FROM t_utilisateurs WHERE id_utilisateur='1'");
$ligne_utilisateur = $sql->fetch(PDO::FETCH_ASSOC);

// if($sql -> rowCount() > 0){
//     echo '<pre>';
//     print_r($ligne_utilisateur);
//     echo'</pre>';
// }
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/styleAdmin.css">
    <title>Admin : <?php echo($ligne_utilisateur['pseudo']); ?></title>
</head>

<body>
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
            <li><a href="utilisateur.php">Utilisateur</a></li>
            <li><a href="titre_CV.php">Titre CV</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Parcours<span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="realisations.php">Réalisations</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Compétences<span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="competences.php">Compétences</a></li>
                  <li><a href="loisirs.php">Loisirs</a></li>
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-left">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Déconnexion</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <h1>Admin du site cv de <?= $ligne_utilisateur['pseudo']; ?></h1>
    <p>texte</p>
    <hr>
