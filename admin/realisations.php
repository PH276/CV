<?php
require_once('inc/init.inc.php');

$titre_page = 'Réalisation - ';
$page = 'realisation';

require_once('inc/head.inc.php');
require_once('inc/nav.inc.php');

$req= $pdoCV->prepare("SELECT * FROM t_realisations");
$req->execute();
$nbr_realisations = $req-> rowCount();
//gestion des contenus de la bdd compétences
//Insertion d'une realisation
if(isset($_POST['r_titre']) ){// si on a posté une nouvelle compétence

    if(!empty($_POST['r_dates']) && !empty($_POST['r_description']) && !empty($_POST['r_soustitre']) && !empty($_POST['r_titre'])){
        $r_dates = addslashes($_POST['r_dates']);
        $r_description = addslashes($_POST['r_description']);
        $r_soustitre = addslashes($_POST['r_soustitre']);
        $r_titre = addslashes($_POST['r_titre']);
        $pdoCV->exec("INSERT INTO t_realisations VALUES (NULL,'$r_titre','$r_soustitre','$r_dates','$r_description','1')");//mettre $id_utilisateur quand on l'aura dans la variable de session
        header("location: realisations.php");//pour revenir sur la page
        exit();

    }
}//Ferme le if isset POST

//suppression d'une réalisation

if(isset($_GET['id_realisation'])){// on récupère la comp. par son id dans l'URL
    $efface = $_GET['id_realisation'];// je mets cela dans une variable

    $req="DELETE FROM t_realisations WHERE id_realisation = '$efface'";
    $pdoCV->query($req);// on peut utiliser avec exec aussi si on veut
    header("location: realisations.php");

}//Ferme le if isset GET

?>
<section>

    <h2>il y a <?= ($nbr_realisations==0)?'aucune':$nbr_realisations; ?> réalisation<?= ($nbr_realisations>1)?'s':'' ?></h2>

    <div class="row">
        <div class="col-md-3">
            <table class="table table-bordered">
        <tr>

            <th>titre</th>
            <th>sous-titre</th>
            <th>dates</th>
            <th>description</th>
            <th>Actions</th>
        </tr>
        <?php while($ligne_realisation = $req->fetch()) : ?>

            <tr>
                <td><?= $ligne_realisation['r_titre']; ?></td>
                <td><?= $ligne_realisation['r_soustitre']; ?></td>
                <td><?= $ligne_realisation['r_dates']; ?></td>
                <td><?= $ligne_realisation['r_description']; ?></td>
                <td>
                <a href="modif_realisation.php?id_realisation=<?= $ligne_realisation['id_realisation'] ?>">
                    <button type="button" class="btn btn-info">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </button>
                </a>
                <a href="realisations.php?id_realisation=<?= $ligne_realisation['id_realisation'];?>">
                    <button type="button" class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </a>
            </td>

            </tr>
        <?php endwhile; ?>
    </table>

            </div>
        </div>
    </section>
    <section>

    <h3>Insertion d'une réalisation</h3>

    <form method="post" action="" class="form-inline">

    <div class="form-group">
        <input  class="form-control" type="text" name="r_titre" id="realisation" placeholder="Inserez un titre">
    </div>
    <div class="form-group">
        <input class="form-control"  type="text" name="r_soustitre" id="realisation" placeholder="Inserez un sous-titre">
    </div>
    <div class="form-group">
        <input class="form-control"  type="text" name="r_dates" id="realisation" placeholder="Inserez une (ou des) date(s)">
    </div>
    <div class="form-group">
        <input class="form-control"  type="text" name="r_description" id="realisation" placeholder="Inserez une description">
    </div>
    <button type="submit" class="btn btn-primary">Insérer</button>
    </form>
</section>

<?php include ('inc/footer.inc.php') ?>
