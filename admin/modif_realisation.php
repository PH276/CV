<?php
require_once('inc/init.inc.php');

$titre_page = 'Modification d\'une réalisation - ';
$page = 'modifrealisation';

require_once('inc/head.inc.php');
require_once('inc/nav.inc.php');

if(isset($_POST['r_titre']) ){// si on a posté une nouvelle compétence
    if(!empty($_POST['r_dates']) && !empty($_POST['r_description']) && !empty($_POST['r_soustitre']) && !empty($_POST['r_titre'])){
        $r_dates = addslashes($_POST['r_dates']);
        $r_description = addslashes($_POST['r_description']);
        $r_soustitre = addslashes($_POST['r_soustitre']);
        $r_titre = addslashes($_POST['r_titre']);
        $id_realisation = $_POST['id_realisation'];
        $pdoCV->exec("UPDATE t_realisations SET r_titre = '$r_titre', r_soustitre = '$r_soustitre' , r_dates = '$r_dates' , r_description = '$r_description' WHERE id_realisation=$id_realisation");//mettre $id_utilisateur quand on l'aura dans la variable de session
        header("location: realisations.php");//pour revenir sur la page
        exit();

    }
}

if (isset($_GET['id_realisation']) && !empty($_GET['id_realisation'])){
    $id_realisation = $_GET['id_realisation'];

    $resultat = $pdoCV->prepare("SELECT * FROM t_realisations WHERE id_realisation = :id_realisation");
    $resultat->execute(array(':id_realisation' => $id_realisation));
    $ligne_realisation = $resultat->fetch();
    $r_titre = $ligne_realisation['r_titre'];
    $r_soustitre = $ligne_realisation['r_soustitre'];
    $r_dates = $ligne_realisation['r_dates'];
    $r_description = $ligne_realisation['r_description'];
}

?>

<h3>Modification de la réalisation <?= $r_titre ?></h3>

<form method="post" action="" class="form-inline">

    <div class="form-group">
        <input class="form-control" type="text" name="r_titre" id="realisation" value="<?= $ligne_realisation['r_titre'] ?>">
    </div>
    <div class="form-group">
        <input class="form-control" type="text" name="r_soustitre" id="realisation" value="<?= $ligne_realisation['r_soustitre'] ?>">
    </div>
    <div class="form-group">
        <input class="form-control" type="text" name="r_dates" id="realisation" value="<?= $ligne_realisation['r_dates'] ?>">
    </div>
    <div class="form-group">
        <input class="form-control" type="text" name="r_description" id="realisation" value="<?= $ligne_realisation['r_description'] ?>">
    </div>
    <div class="form-group">
        <input class="form-control" hidden name="id_realisation" value="<?= $ligne_realisation['id_realisation'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Mettre à jour</button>

</form>

<?php include ('inc/footer.inc.php') ?>
