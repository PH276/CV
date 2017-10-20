<?php
require_once('inc/init.inc.php');

$titre_page = 'Modification d\'une compétence - ';
$page = 'modifcompetence';

require_once('inc/head.inc.php');
require_once('inc/nav.inc.php');

if(isset($_POST['competence']) ){// si on a posté une nouvelle compétence
    if(!empty($_POST['competence']) && !empty($_POST['c_niveau'])){
        $competence = addslashes($_POST['competence']);
        $c_niveau = addslashes($_POST['c_niveau']);
        $id_competence = addslashes($_POST['id_competence']);
        $pdoCV->exec("UPDATE t_competences SET  competence = '$competence', c_niveau = $c_niveau WHERE id_competence=$id_competence");//mettre $id_utilisateur quand on l'aura dans la variable de session
        header("location: competences.php");//pour revenir sur la page
        exit();

    }
}

if (isset($_GET['id_competence']) && !empty($_GET['id_competence'])){
    $id_competence = $_GET['id_competence'];

    $resultat = $pdoCV->prepare("SELECT * FROM t_competences WHERE id_competence = :id_competence");
    $resultat->execute(array(':id_competence' => $id_competence));
    $ligne_competence = $resultat->fetch();
    $competence = $ligne_competence['competence'];
}

?>

<h3>Modification de la compétence <?= $competence ?></h3>

<form method="post" action="" class="form-inline">

    <div class="form-group">
        <input class="form-control"  type="text" name="competence" id="competence" value="<?= $ligne_competence['competence'] ?>">
    </div>
    <div class="form-group">
        <input class="form-control"  type="number" name="c_niveau" value="<?= $ligne_competence['c_niveau'] ?>">
    </div>
    <div class="form-group">
        <input class="form-control"  hidden name="id_competence" value="<?= $ligne_competence['id_competence'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Mettre à jour</button>

</form>

<?php include ('inc/footer.inc.php') ?>
