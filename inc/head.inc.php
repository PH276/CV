<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Mon CV">

    <!-- reset CSS -->
    <link rel="stylesheet" href="css/reset.css">

    <!-- CSS bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

    <title><?php echo $page."Pascal HUITOREL"; ?></title><!-- Latest compiled and minified CSS -->

</head>
<body>
    <header class="container-fluid">
        <div class="row">

            <div class="col-md-2" id="portrait">
                <a href="index.php">
                    <p>Pascal HUITOREL</p>
                    <img class="cadre-rond" src="photos/portrait.png" alt="portrait">
                </a>
            </div>
            <div class="col-md-8" id="titre">
                <p>Développeur web junior</p>
                <p><span>!!! Site en construction !!!</span></p>
            </div>
            <?php foreach ($_SESSION['logos'] as $logo) : ?>
            <div class="col-md-2" id="icones">
                <div class="col-md-3">
                    <img src="img/<?= $logo['src'] ?>" width="20" alt="<?= $logo['alt'] ?>">
                </div>
            </div>
        <?php endforeach; ?>
        </div>

    </header>

    <nav>
        <ul>
            <li><a href="index.php">Présentation</a></li>
            <li><a href="parcours.php">Parcours professionnel</a></li>
            <li><a href="formations.php">Formations</a></li>
            <li><a href="competences.php">Compétences</a></li>
        </ul>
    </nav>
