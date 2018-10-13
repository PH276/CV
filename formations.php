<?php require_once('inc/init.inc.php');
if (!isset($_SESSION['formations'])){
    $req = $pdoCV -> query("SELECT * FROM t_formations WHERE id_utilisateur='1' ORDER BY f_dates DESC");
    $_SESSION['formations'] = $req -> fetchAll(PDO::FETCH_ASSOC);
}

$descriptionPage = "Mes formations en informatique ainsi que celles en électrotechnique";
$motsClesPage = "License MIAGE, DUT RT, DUT GEII, Bac F3, BEP et CAP d'électrotechnique";
$page = "Formations - ";
include('inc/head.inc.php');
?>
<main class="container">
    <h1>Formations</h1>
    <div class="row">
        <?php foreach ($_SESSION['formations'] as $formation) : ?>
            <div class="col-lg-4">
                <article class="card shadows my-4">
                    <div class="card-header">
                        <h2><strong><?= $formation['f_titre'] ?></strong></h2>
                        <p><?= $formation['f_dates'] ?> -
                            <?= $formation['f_soustitre'] ?></p>
                    </div>
                    <?php if ($formation['f_description']) : ?>
                    <div class="card-body">
                        <p><?= $formation['f_description'] ?></p>

                    </div>
                <?php endif; ?>
                </article>
            </div>
        <?php endforeach; ?>

    </div>
</main>
<?php include('inc/footer.inc.php'); ?>
