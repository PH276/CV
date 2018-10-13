<?php require_once('inc/init.inc.php');
if (!isset($_SESSION['parcours_entreprise'])){
    $req = $pdoCV -> query("SELECT * FROM t_experiences WHERE id_utilisateur='1' AND e_type = 'entreprise' ORDER BY e_dates DESC");
    $_SESSION['parcours_entreprise'] = $req -> fetchAll(PDO::FETCH_ASSOC);
}

if (!isset($_SESSION['parcours_independant'])){
    $req = $pdoCV -> query("SELECT * FROM t_experiences WHERE id_utilisateur='1' AND e_type = 'indépendant'");
    $_SESSION['parcours_independant'] = $req -> fetchAll(PDO::FETCH_ASSOC);
}

$descriptionPage = "Je suis développeur web. J'ai aussi été administrateur système, opérateur réseaux et télécoms, analyste programmeur et technicien en recyclage de PC";
$motsClesPage = "développeur web, développeur PHP, administrateur système, opérateur réseaux et télécoms, analyste programmeur, informaticien polyvalent";
$page = "Parcours - ";
include('inc/head.inc.php');
?>
<main id="parcours" class="container">
    <h1>Parcours professionnel</h1>
    <h2 class="row">En entreprise</h2>
    <section class="row">
        <?php foreach ($_SESSION['parcours_entreprise'] as $parcours) : ?>
            <div class="col-md-4">

                <article class="card shadows my-4 dropdown" >
                    <button class="card-body dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <p><?= $parcours['e_dates'] ?></p>
                        <h3 class="card-title"><strong><?= $parcours['e_titre'] ?></strong></h3>
                        <p><?= $parcours['e_soustitre'] ?></p>
                    </button>

                    <div class="dropdown-menu p-4" aria-labelledby="dropdownMenu2">
                        <?php
                        $posEnvironnement = stripos($parcours['e_description'], 'environnement');
                        $description = str_replace (', -', ',</li><li> -', substr($parcours['e_description'], 0, $posEnvironnement));
                        $environnement = substr($parcours['e_description'], $posEnvironnement);
                        ?>
                        <?= ($posEnvironnement)?"<ul><li>".$description . "</li></ul><br>":$description; ?>

                        <p class="<?= ($posEnvironnement)?'italic':''  ?>"><?= $environnement ?></p>

                    </div>
                </article>
            </div>

        <?php endforeach; ?>

    </section>

    <h2 class="mt-3">En indépendant</h2>
    <section class="row">

        <?php foreach ($_SESSION['parcours_independant'] as $parcours) : ?>
            <div class="col-md-4">

                <article class="card shadows my-4 dropdown" >
                    <button class="card-body dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <p><?= $parcours['e_dates'] ?></p>
                        <h3 class="card-title"><strong><?= $parcours['e_titre'] ?></strong></h3>
                        <p><?= $parcours['e_soustitre'] ?></p>
                    </button>
                    <div class="dropdown-menu p-4" aria-labelledby="dropdownMenu2">
                        <?php $posEnvironnement = stripos($parcours['e_description'], 'environnement'); ?>
                        <?php $description = str_replace (', -', ',</li><li> -', substr($parcours['e_description'], 0, $posEnvironnement)); ?>

                            <?= ($posEnvironnement)?"<ul><li>".$description . "</li></ul><br>":$description; ?>

                            <?php $environnement = substr($parcours['e_description'], $posEnvironnement); ?>
                            <p class="<?= ($posEnvironnement)?'italic':''  ?>"><?= $environnement ?></p>


                        </div>
                    </article>

                </div>
            <?php endforeach; ?>

        </section>

    </main>
    <?php include('inc/footer.inc.php'); ?>
