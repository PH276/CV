<?php require_once('inc/init.inc.php');
$page = "";
if (!isset($_SESSION['points_forts'])){
    $req = $pdoCV -> query("SELECT * FROM t_points_forts WHERE id_utilisateur='1'");
    $_SESSION['points_forts'] = $req -> fetchAll(PDO::FETCH_ASSOC);
}

if (!isset($_SESSION['interets'])){
    $req = $pdoCV -> query("SELECT * FROM t_interets WHERE id_utilisateur='1'");
    $_SESSION['interets'] = $req -> fetchAll(PDO::FETCH_ASSOC);
}


include('inc/head.inc.php');


?>
<main id="presentation" class="container">
    <?php echo password_hash("SJpc5029", PASSWORD_DEFAULT); ?>

    <h1>présentation</h1>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <section class="thumbnail presentation">
                <?= $_SESSION['titre']['accroche']  ?>
                <!-- <p>Je suis passionné d'informatique, plus précisément de programmation.</p>
                <p>Mon projet est de devenir développeur web.</p>
                <p>
                    Pour commencer, j'ai créé mon premier site web (<a href="https://mypetstar.fr" target="_blank">mypetstar.fr</a>) pour CRIS Production à sa grande satisfaction.
                    <br>
                    Pour renforcer mes compétences, je suis actuellement en formation d'intégrateur développeur web.
                </p> -->
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-md-offset-1">

            <section id="forts" class="panel panel-info">
                <div class="panel-heading"><h2>Points forts</h2></div>
                <div class="panel-body">
                    <ul>
                        <?php foreach ($_SESSION['points_forts'] as $pointFort) : ?>

                            <li><?= $pointFort['point_fort'] ?></li>

                        <?php endforeach; ?>

                    </ul>
                </div>

            </section>
        </div>
        <div class="col-md-4 col-md-offset-3">

            <section id="interets" class="panel panel-info">
                <div class="panel-heading"><h2>Centres d'intérêt</h2></div>
                <div class="panel-body">

                    <ul>
                        <?php foreach ($_SESSION['interets'] as $interet) : ?>

                            <li><?= $interet['centre'] ?></li>

                        <?php endforeach; ?>
                    </ul>
                </div>
            </section>
        </div>
    </div>
</main>
<?php include('inc/footer.inc.php'); ?>
