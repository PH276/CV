<?php require_once('inc/init.inc.php');
if (!isset($_SESSION['competences'])){
    $req = $pdoCV -> query("SELECT * FROM t_competences WHERE id_utilisateur='1'");
    $_SESSION['competences'] = $req -> fetchAll(PDO::FETCH_ASSOC);
}

$page = "Compétences - ";
include('inc/head.inc.php');
?>
<main class="container">
    <h1>compétences</h1>
    <section class="row">
        <?php foreach ($_SESSION['competences'] as $competence) : ?>
            <div class="col-md-3">
                <article class="panel panel-info">
                    <div class="panel-heading">
                        <h2><strong><?= $competence['competence'] ?></strong></h2>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <?php $description = str_replace (', ', ',</li><li>', $competence['c_description']) ?>
                            <li>
                                <?= $description.'.' ?>
                            </li>
                        </ul>
                    </div>
                </article>
            </div>
        <?php endforeach; ?>
    </section>
</main>
<?php include('inc/footer.inc.php'); ?>
