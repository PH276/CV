<?php require_once('inc/init.inc.php');
// if (!isset($_SESSION['formations'])){
    $req = $pdoCV -> query("SELECT * FROM t_realisations WHERE id_utilisateur='1' ORDER BY r_dates DESC");
    $_SESSION['realisations'] = $req -> fetchAll(PDO::FETCH_ASSOC);
// }

$page = "réalisations - ";
include('inc/head.inc.php');
?>
<main class="container">
    <h1>Mes réalisations</h1>
    <section class="row">
        <?php foreach ($_SESSION['realisations'] as $formation) : ?>
            <div class="col-md-6">
                <article>
                        <h2><strong><?= $formation['r_titre'] ?></strong></h2>
                        <p><?= $formation['r_dates'] ?> -
                        <?= $formation['r_soustitre'] ?></p>
                        <p><?= $formation['r_description'] ?></p>

                </article>
            </div>
        <?php endforeach; ?>

    </section>
</main>
<?php include('inc/footer.inc.php'); ?>
