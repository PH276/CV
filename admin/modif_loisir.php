<?php
require 'header.php';
if(isset($_POST['loisir']) ){// si on a posté une nouvelle compétence
    if(!empty($_POST['loisir'])){
        $loisir = addslashes($_POST['loisir']);
        $id_loisir = addslashes($_POST['id_loisir']);
        $pdoCV->exec("UPDATE t_loisirs SET  loisir = '$loisir' WHERE id_loisir=$id_loisir");//mettre $id_utilisateur quand on l'aura dans la variable de session
        header("location: loisirs.php");//pour revenir sur la page
        exit();

    }
}

if (isset($_GET['id_loisir'])){
    $id_loisir = $_GET['id_loisir'];

    $resultat = $pdoCV->prepare("SELECT * FROM t_loisirs WHERE id_loisir = :id_loisir");
    $resultat->execute(array(':id_loisir' => $id_loisir));
    $ligne_loisir = $resultat->fetch();
    $loisir = $ligne_loisir['loisir'];
}

?>

<h3>Modification de la compétence <?= $loisir ?></h3>

<form method="post" action="">

    <label for="loisir">Loisir</label>
    <input type="text" name="loisir" id="loisir" value="<?= $ligne_loisir['loisir'] ?>">
    <input hidden name="id_loisir" value="<?= $ligne_loisir['id_loisir'] ?>">
    <input type="submit" value="Mettre à jour">

</form>


</body>
</html>
