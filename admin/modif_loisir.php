<?php
require_once('inc/init.inc.php');

$titre_page = 'Modification d\'un loisir - ';
$page = 'modifloisir';

require_once('inc/head.inc.php');
require_once('inc/nav.inc.php');

if(isset($_POST['loisir']) ){// si on a posté une nouvelle compétence
    if(!empty($_POST['loisir'])){
        $loisir = addslashes($_POST['loisir']);
        $id_loisir = addslashes($_POST['id_loisir']);
        $pdoCV->exec("UPDATE t_loisirs SET  loisir = '$loisir' WHERE id_loisir=$id_loisir");//mettre $id_utilisateur quand on l'aura dans la variable de session
        header("location: loisirs.php");//pour revenir sur la page
        exit();

    }
}

if (isset($_GET['id_loisir'])){
    $id_loisir = $_GET['id_loisir'];

    $resultat = $pdoCV->prepare("SELECT * FROM t_loisirs WHERE id_loisir = :id_loisir");
    $resultat->execute(array(':id_loisir' => $id_loisir));
    $ligne_loisir = $resultat->fetch();
    $loisir = $ligne_loisir['loisir'];
}

?>

<h3>Modification de la compétence <?= $loisir ?></h3>

<form method="post" action="" class="form-inline">
    <div class="form-group">
        <input class="form-control" type="text" name="loisir" id="loisir" value="<?= $ligne_loisir['loisir'] ?>">
    </div>
    <div class="form-group">
        <input class="form-control" hidden name="id_loisir" value="<?= $ligne_loisir['id_loisir'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Mettre à jour</button>

</form>


<?php include ('inc/footer.inc.php') ?>
