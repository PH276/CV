<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="author" lang="fr" content="Pascal HUITOREL">
    <meta name="keywords" content="<?= $motsClesPage ?>">
    <meta name="description" content="<?= $descriptionPage ?>">
    <!-- reset CSS -->
    <link rel="icon" href="logo.png" >
    <!-- <link rel="icon" href="favicon.ico" /> -->
    <link rel="stylesheet" href="css/reset.css">

    <!-- CSS bootstrap -->

    <link href="https://fonts.googleapis.com/css?family=Charmonman|Cookie|Dancing+Script|Grand+Hotel|Homemade+Apple|Lobster+Two|Mr+Dafoe|Pacifico|Parisienne|Rochester|Shadows+Into+Light|Tangerine|Yellowtail" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">

    <?php
    $page = ($page == "index")?"Développeur PHP Full stack - ":$page;
    ?>
    <title><?= $page . $_SESSION['utilisateur']['prenom'] . ' ' . $_SESSION['utilisateur']['nom'] ; ?></title><!-- Latest compiled and minified CSS -->

</head>
<body>
    <header class="container-fluid">
        <div class="row">
            <div class="col-lg-2" id="portrait">
                <a href="index.php">
                    <p class="text-center"><strong><?= $_SESSION['utilisateur']['prenom'] . ' ' . $_SESSION['utilisateur']['nom'] ?></strong></p>
                </a>
            </div>

            <div class="col-lg-8" id="titre">
                <p><strong><?= $_SESSION['titre']['titre_cv']?></strong></p>
                <!-- <p><span>!!! Site en construction !!!</span></p> -->
            </div>
            <div class="col-lg-2">
                <ul id="icones" class="row">
                    <?php foreach ($_SESSION['logos'] as $logo) : ?>
                        <li class="col-lg-2 col-sm-1 col-3 py-1">
                            <img src="img/<?= $logo['src'] ?>"  alt="<?= $logo['alt'] ?>" title="<?= $logo['alt'] ?>">
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

    </header>

    <nav class="navbar navbar-expand-lg py-lg-0">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>                <!-- <a class="navbar-brand" href="#">Brand</a> -->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <!-- <li class="active"><a href="index.php">Link <span class="sr-only">(current)</span></a></li> -->
                    <li class="nav-item <?= ($page=='Développeur web - ')?'active':'' ?>"><a href="index.php" class="nav-link px-3">Accueil<span class="sr-only">(current)</span></a></li>
                    <li class="nav-item <?= ($page=='Parcours - ')?'active':'' ?>"><a href="parcours.php" class="nav-link px-3">Parcours professionnel</a></li>
                    <li class="nav-item <?= ($page=='Formations - ')?'active':'' ?>"><a href="formations.php" class="nav-link px-3">Formations</a></li>
                    <li class="nav-item <?= ($page=='Compétences - ')?'active':'' ?>"><a href="competences.php" class="nav-link px-3">Compétences</a></li>
                    <li class="nav-item <?= ($page=='Centres d\'intérêt - ')?'active':'' ?>"><a href="interets.php" class="nav-link px-3">Centres d'intérêt</a></li>
                </ul>
                <ul class="navbar-nav mr-0">
                    <li class="nav-item <?= ($page=='Contact - ')?'active':'' ?>"><a class="nav-link" href="contact.php">Contact</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
