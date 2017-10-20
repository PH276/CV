<?php
require_once('inc/init.inc.php');

$titre_page = 'Compétences - ';
$page = 'competences';

require_once('inc/head.inc.php');
require_once('inc/nav.inc.php');

?>
<section>

    <h2>il <?= ($nbr_competences==0)?'n\'':''; ?>y a <?= ($nbr_competences==0)?'aucune':$nbr_competences; ?> compétence<?= ($nbr_competences>1)?'s':'' ?></h2>

    <div class="row">
        <div class="col-md-3">
            <table class="table table-bordered">
                <tr>
                    <th>Compétences</th>
                    <th>Niveau en %</th>
                    <th>Actions</th>
                </tr>
                <?php while ($ligne_competence = $req->fetch()) : ?>

                    <tr>
                        <td><?= $ligne_competence['competence']; ?></td>
                        <td><?= $ligne_competence['c_niveau']; ?></td>
                        <td class="text-center">
                            <a href="modif_competence.php?id_competence=<?= $ligne_competence['id_competence'] ?>">
                                <button type="button" class="btn btn-info">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </button>
                            </a>
                            <a href="competences.php?id_competence=<?= $ligne_competence['id_competence'];?>">
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

    <h3>Insertion d'une compétence</h3>
    <form method="post" action="" class="form-inline">
        <div class="form-group">

            <input type="text" class="form-control" name="competence" id="competence" placeholder="Inserez une compétence">
        </div>
        <div class="form-group">
            <input type="number" class="form-control" name="c_niveau" id="c_niveau" placeholder="Inserez le niveau">
        </div>
        <button type="submit" class="btn btn-primary">Insérer</button>

    </form>
</section>



<?php include ('inc/footer.inc.php') ?>
