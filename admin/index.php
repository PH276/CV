<?php require_once('inc/init.inc.php'); ?>
<?php require_once('inc/head.inc.php'); ?>
<?php require_once('inc/nav.inc.php'); ?>
<?php
// $req= $pdoCV->prepare("SELECT * FROM t_competences");
// $req->execute();
// $ligne = $req->fetch(PDO::FETCH_ASSOC);
// debug($req->getColumnMeta(0));
// debug($pdoCV);
extract ($_SESSION['utilisateur']);
 ?>
<main id="affichage" class="container-fluid">
    <div class="row">
        <div id="adresse" class="col-md-5 col-md-offset-1">
            <img src="../photos/portrait.png" alt="portrait" width="100"><br>
            <b><?= $prenom ?> <?= $nom ?></b><br>
            <?= $adresse ?><br>
            <?= $code_postal ?> <?= $ville ?><br>
            <?= wordwrap($telephone, 2, ' ', true)  ?><br>
            <?= wordwrap($autre_tel, 2, ' ', true) ?><br>
            <?= $email ?><br>
        </div>
        <div class="col-md-6" >
            <img src="photos/jeremy-thomas-99326.jpg" class="col-md-8 col-md-offset-2" alt="">
        </div>
    </div>
</main>

<?php include ('inc/footer.inc.php') ?>
