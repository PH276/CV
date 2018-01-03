<?php require_once('inc/init.inc.php');
// variables pour la balise <head>
$descriptionPage = strip_tags($_SESSION['titre']['accroche']);
$motsClesPage = "Développeur web, Développeur full stack, Devops, PHP, MySQL, silex, symphony, javascript, jQuery";
$page = "";

if (!isset($_SESSION['points_forts'])){
    $req = $pdoCV -> query("SELECT * FROM t_points_forts WHERE id_utilisateur='1'");
    $_SESSION['points_forts'] = $req -> fetchAll(PDO::FETCH_ASSOC);
}

include('inc/head.inc.php');
?>

<main id="presentation" class="container">
    <!-- <h1>présentation</h1> -->
    <div class="row">
        <div class="col-md-8">

            <div class="thumbnail presentation shadow">
                <?= $_SESSION['titre']['accroche']  ?>
            </div>
        </div>
        <div class="col-md-4">

            <div id="forts" class="panel panel-info shadow">
                <div class="panel-heading"><h2>Points forts</h2></div>
                <div class="panel-body">
                    <ul>
                        <?php $nbEltPF = count($_SESSION['points_forts']) ?>
                        <li>
                            <?php foreach ($_SESSION['points_forts'] as $key => $pointFort) : ?>

                                <?= $pointFort['point_fort'].(($nbEltPF != $key+1)?",</li><li>":".") ?>


                                <?php endforeach; ?>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <?php include('inc/footer.inc.php'); ?>
