<?php
require_once('inc/init.inc.php');

$titre_page = $_SESSION['table']['titre_page'];

require_once('inc/head.inc.php');
require_once('inc/nav.inc.php');

$req= $pdoCV->prepare("SELECT * FROM t_competences");
$req->execute();
$nbr_competences = $req-> rowCount();
//gestion des contenus de la bdd
//Insertion d'une competence
?>
<main class="container-fluid">
    <?= $_SESSION['table']['contenu'] ?>
</main>

<?php include ('inc/footer.inc.php') ?>
