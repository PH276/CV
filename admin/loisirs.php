<?php require_once('header.php');

$req= $pdoCV->prepare("SELECT * FROM t_loisirs");
$req->execute();
$nbr_loisirs = $req-> rowCount();
//gestion des contenus de la bdd compétences
//Insertion d'une loisir
if(isset($_POST['loisir']) ){// si on a posté une nouvelle compétence
    if(!empty($_POST['loisir'])){
        $loisir = addslashes($_POST['loisir']);
        $pdoCV->exec("INSERT INTO t_loisirs VALUES (NULL,'$loisir','1')");//mettre $id_utilisateur quand on l'aura dans la variable de session
        header("location: loisirs.php");//pour revenir sur la page
        exit();
    }
}

//suppression d'une compétence
if(isset($_GET['id_loisir'])){// on récupère la comp. par son id dans l'URL
    $efface = $_GET['id_loisir'];// je mets cela dans une variable

    $req="DELETE FROM t_loisirs WHERE id_loisir = '$efface'";
    $pdoCV->query($req);// on peut utiliser avec exec aussi si on veut
    header("location: loisirs.php");

}//Ferme le if isset

?>

    <h2>il y a <?= ($nbr_loisirs==0)?'aucun':$nbr_loisirs; ?> loisir<?= ($nbr_loisirs>1)?'s':'' ?></h2>

    <table border=2>
        <tr>
            <th>Loisirs</th>
            <th>Suppression</th>
            <th>Modification</th>
        </tr>
        <?php while($ligne_loisir = $req->fetch()) : ?>

            <tr>
                <td><?= $ligne_loisir['loisir']; ?></td>
                <td><a href="loisirs.php?id_loisir=<?= $ligne_loisir['id_loisir'];?>">Supprimer</a></td>
                <td><a href="modif_loisir.php?id_loisir=<?= $ligne_loisir['id_loisir'] ?>">Modifier</a></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <hr>

    <h3>Insertion d'un loisir</h3>

    <form method="post" action="">
        <label for="loisir">loisir</label>
        <input type="text" name="loisir" id="loisir" placeholder="Inserez une loisir">
        <input type="submit" value="Inserez">
    </form>

<?php include ('footer.php') ?>
