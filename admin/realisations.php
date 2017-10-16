<?php require_once('header.php');

$req= $pdoCV->prepare("SELECT * FROM t_realisations");
$req->execute();
$nbr_realisations = $req-> rowCount();
//gestion des contenus de la bdd compétences
//Insertion d'une realisation
if(isset($_POST['r_titre']) ){// si on a posté une nouvelle compétence

    if(!empty($_POST['r_dates']) && !empty($_POST['r_description']) && !empty($_POST['r_soustitre']) && !empty($_POST['r_titre'])){
        $r_dates = addslashes($_POST['r_dates']);
        $r_description = addslashes($_POST['r_description']);
        $r_soustitre = addslashes($_POST['r_soustitre']);
        $r_titre = addslashes($_POST['r_titre']);
        $pdoCV->exec("INSERT INTO t_realisations VALUES (NULL,'$r_titre','$r_soustitre','$r_dates','$r_description','1')");//mettre $id_utilisateur quand on l'aura dans la variable de session
        header("location: realisations.php");//pour revenir sur la page
        exit();

    }
}//Ferme le if isset POST

//suppression d'une réalisation

if(isset($_GET['id_realisation'])){// on récupère la comp. par son id dans l'URL
    $efface = $_GET['id_realisation'];// je mets cela dans une variable

    $req="DELETE FROM t_realisations WHERE id_realisation = '$efface'";
    $pdoCV->query($req);// on peut utiliser avec exec aussi si on veut
    header("location: realisations.php");

}//Ferme le if isset GET

?>

    <h2>il y a <?= ($nbr_realisations==0)?'aucune':$nbr_realisations; ?> réalisation<?= ($nbr_realisations>1)?'s':'' ?></h2>

    <table border=2>

        <tr>

            <th>titre</th>
            <th>sous-titre</th>
            <th>dates</th>
            <th>description</th>
            <th>suppression</th>
            <th>modification</th>
        </tr>
        <?php while($ligne_realisation = $req->fetch()) : ?>

            <tr>
                <td><?= $ligne_realisation['r_titre']; ?></td>
                <td><?= $ligne_realisation['r_soustitre']; ?></td>
                <td><?= $ligne_realisation['r_dates']; ?></td>
                <td><?= $ligne_realisation['r_description']; ?></td>
                <td><a href="realisations.php?id_realisation=<?= $ligne_realisation['id_realisation'];?>">Supprimer</a></td>
                <td><a href="modif_realisation.php?id_realisation=<?= $ligne_realisation['id_realisation'] ?>">Modifier</a></td>

            </tr>
        <?php endwhile; ?>
    </table>
    <hr>

    <h3>Insertion d'une réalisation</h3>

    <form method="post" action="">

        <label for="realisation">réalisation</label>
        <input type="text" name="r_titre" id="realisation" placeholder="Inserez un titre">
        <input type="text" name="r_soustitre" id="realisation" placeholder="Inserez un sous-titre">
        <input type="text" name="r_dates" id="realisation" placeholder="Inserez une (ou des) date(s)">
        <input type="text" name="r_description" id="realisation" placeholder="Inserez une description">
        <input type="submit" value="Inserez">

    </form>


<?php include ('footer.php') ?>
