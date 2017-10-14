<?php
require 'connexion.php';

$sql = $pdoCV->query(" SELECT * FROM t_utilisateurs WHERE id_utilisateur='1'");
$ligne_utilisateur = $sql->fetch(PDO::FETCH_ASSOC);

if($sql -> rowCount() > 0){
    echo '<pre>';
    print_r($ligne_utilisateur);
    echo'</pre>';
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styleAdmin.css">
    <title>Admin : <?php echo($ligne_utilisateur['pseudo']); ?></title>
</head>

<body>
    <nav>
    <ul>
        <li><a href="index.php">index.php</a></li>
        <li><a href="competences.php">competences.php</a></li>
    </ul>
</nav>


    <h1>Admin du site cv de <?= $ligne_utilisateur['pseudo']; ?></h1>
    <p>texte</p>
    <hr>
