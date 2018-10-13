<?php require_once('inc/init.inc.php');
// variables pour la balise <head>
$descriptionPage = strip_tags($_SESSION['titre']['description']);
$motsClesPage = "Développeur web, 92390, Villeneuve-la-Garenne, Hauts-de-Seine, PHP, MySQL, Laravel, silex, symphony, javascript, jQuery";
$page = "index";

if (!isset($_SESSION['points_forts'])){
    $req = $pdoCV -> query("SELECT * FROM t_points_forts WHERE id_utilisateur='1'");
    $_SESSION['points_forts'] = $req -> fetchAll(PDO::FETCH_ASSOC);
}

include('inc/head.inc.php');
?>

<main id="presentation" class="container">
    <!-- <h1>présentation</h1> -->
    <h1>Présentation</h1>
    <div class="row">
        <div class="col-lg-8">
            <div class="jumbotron presentation shadows">
                <?= $_SESSION['titre']['accroche']  ?>
            </div>
        </div>
        <div class="col-lg-4">

            <div id="forts" class="card shadows">
                <div class="card-header"><h2 class="card-title">Points forts</h2></div>
                <div class="card-body">
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
