<?php include('connexion.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php     $resultat = $pdo->query("SELECT * FROM t_utilisateurs");
        $utilisateur = $resultat->fetch(PDO::FETCH_ASSOC);
 ?>
    <title>Admin : <?= $utilisateur['pseudo'] ?></title>
</head>
<body>
    <h1>Admin <?= $utilisateur['prenom'].' '.$utilisateur['nom'] ?></h1>
</body>
</html>
