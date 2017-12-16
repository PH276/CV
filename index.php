<?php require_once('inc/init.inc.php');
// variables pour la balise <head>
$descriptionPage = strip_tags($_SESSION['titre']['accroche']);
$motsClesPage = "Développeur web, Développeur full stack, Devops, PHP, MySQL, silex, symphony, javascript, jQuery";
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
    <h1>présentation</h1>
    <div class="row">
        <div class="col-md-12">

            <section class="thumbnail presentation shadow">
                <?= $_SESSION['titre']['accroche']  ?>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-md-offset-1">

            <section id="forts" class="panel panel-info shadow">
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

            <section id="interets" class="panel panel-info shadow">
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
