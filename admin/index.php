<?php require_once('inc/init.inc.php'); ?>
<?php require_once('inc/head.inc.php'); ?>
<?php require_once('inc/nav.inc.php'); ?>
<?php
// $req= $pdoCV->prepare("SELECT * FROM t_competences");
// $req->execute();
// $ligne = $req->fetch(PDO::FETCH_ASSOC);
// debug($req->getColumnMeta(0));
// debug($pdoCV);

 ?>
<main id="affichage" class="container-fluid">
</main>
<div class="">
    <?php
     echo (isset($_SESSION['id']))?'id='.$_SESSION['id']:'';
    ?>
</div>

<?php include ('inc/footer.inc.php') ?>
