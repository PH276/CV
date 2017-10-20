<?php
require_once('inc/init.inc.php');

$titre_page = 'Expériences - ';
$page = 'experiences';

require_once('inc/head.inc.php');
require_once('inc/nav.inc.php');

$req= $pdoCV->prepare("SELECT * FROM t_experiences");
$req->execute();
$nbr_experiences = $req-> rowCount();
//gestion des contenus de la bdd compétences
//Insertion d'une competence
if(isset($_POST['experience']) ){// si on a posté une nouvelle compétence
    if(!empty($_POST['experience']) && !empty($_POST['c_niveau'])){
        $titre = addslashes($_POST['e_titre']);
        $sous_titre = addslashes($_POST['e_soustitre']);
        $dates = addslashes($_POST['e_dates']);
        $description = addslashes($_POST['e_description']);
        $pdoCV->exec("INSERT INTO t_experiences VALUES (NULL,'$titre','$sous_titre','$dates','$description','1')");//mettre $id_utilisateur quand on l'aura dans la variable de session
        header("location: experiences.php");//pour revenir sur la page
        exit();
    }
}

//suppression d'une compétence

if(isset($_GET['id_experience'])){// on récupère la comp. par son id dans l'URL
    $efface = $_GET['id_experience'];// je mets cela dans une variable

    $req="DELETE FROM t_experience WHERE id_experience = '$efface'";
    $pdoCV->query($req);// on peut utiliser avec exec aussi si on veut
    header("location: experience.php");
}//Ferme le if isset

?>
<section>

    <h2>il <?= ($nbr_experiences==0)?'n\'':''; ?>y a <?= ($nbr_experiences==0)?'aucune':$nbr_experiences; ?> expérience<?= ($nbr_experiences>1)?'s':'' ?></h2>

    <div class="row">
        <div class="col-md-3">
            <table class="table table-bordered">
                <tr>
                    <th>Titre</th>
                    <th>Sous-titre</th>
                    <th>Dates</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                <?php while ($ligne_experience = $req->fetch()) : ?>
                    <tr>
                        <td><?= $ligne_experience['e_titre']; ?></td>
                        <td><?= $ligne_experience['e_soustitre']; ?></td>
                        <td><?= $ligne_experience['e_dates']; ?></td>
                        <td><?= $ligne_experience['e_description']; ?></td>
                        <td class="text-center">
                            <a href="modif_experience.php?id_experience=<?= $ligne_experience['id_experience'] ?>">
                                <button type="button" class="btn btn-info">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </button>
                            </a>
                            <a href="experiences.php?id_experience=<?= $ligne_experience['id_experience'];?>">
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

<!-- <section>
    <h3>Insertion d'une expérience</h3>
    <form method="post" action="" class="form-inline">
        <div class="form-group">
            <input type="text" class="form-control" name="experience" id="experience" placeholder="Inserez une expérience">
        </div>
        <div class="form-group">
            <input type="number" class="form-control" name="c_niveau" id="c_niveau" placeholder="Inserez le niveau">
        </div>
        <button type="submit" class="btn btn-primary">Insérer</button>
    </form>
</section> -->

<?php include ('inc/footer.inc.php') ?>
