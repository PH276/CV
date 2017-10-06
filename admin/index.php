<?php include('connexion.php');
$resultat = $pdo->query("SELECT * FROM t_utilisateurs");
$utilisateur = $resultat->fetch(PDO::FETCH_ASSOC);
$utilisateurOK = false;
if ($resultat->rowCount()>0){
    $utilisateurOK = true;
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin : <?= ($utilisateurOK)?$utilisateur['pseudo']:''; ?></title>
</head>
<body>
    <h1>Admin <?= ($utilisateurOK)?($utilisateur['prenom'].' '.$utilisateur['nom']):'prénom nom';
     ?></h1>
</body>
</html>
