<?php
require_once('inc/init.inc.php');

$titre_page = 'Modification d\'un titre du CV- ';
$page = 'modiftitrecv';

require_once('inc/head.inc.php');
require_once('inc/nav.inc.php');

if(isset($_POST['titre_cv']) ){// si on a posté une nouvelle compétence
    if(!empty($_POST['titre_cv']) && !empty($_POST['accroche']) && !empty($_POST['logo'])){
        $titre_cv = addslashes($_POST['titre_cv']);
        $accroche = addslashes($_POST['accroche']);
        $logo = addslashes($_POST['logo']);
        $pdoCV->exec("UPDATE t_titre_cv SET titre_cv = '$titre_cv', accroche = '$accroche', logo = '$logo' WHERE id_titre_cv=$id_titre_cv");//mettre $id_utilisateur quand on l'aura dans la variable de session
        header("location: titre_cv.php");//pour revenir sur la page
        exit();

    }
}

if (isset($_GET['id_titre_cv']) && !empty($_GET['id_titre_cv'])){
    $id_titre_cv = $_GET['id_titre_cv'];

    $resultat = $pdoCV->prepare("SELECT * FROM t_titre_cv WHERE id_titre_cv = :id_titre_cv");
    $resultat->execute(array(':id_titre_cv' => $id_titre_cv));
    $ligne_titre_cv = $resultat->fetch();
    $titre_cv = $ligne_titre_cv['titre_cv'];
}

?>

<h3>Modification de la compétence <?= $titre_cv ?></h3>

<form method="post" action="" class="form-inline">

<div class="form-group">
    <input class="form-control" type="text" name="titre_cv" id="titre_cv" value="<?= $ligne_titre_cv['titre_cv'] ?>">
</div>
<div class="form-group">
    <input class="form-control" type="text" name="accroche" value="<?= $ligne_titre_cv['accroche'] ?>">
</div>
<div class="form-group">
    <input class="form-control" type="text" name="logo" value="<?= $ligne_titre_cv['logo'] ?>">
</div>
<div class="form-group">
    <input class="form-control" hidden name="id_titre_cv" value="<?= $ligne_titre_cv['id_titre_cv'] ?>">
</div>
 <button type="submit" class="btn btn-primary">Mettre à jour</button>

</form>

<?php include ('inc/footer.inc.php') ?>
