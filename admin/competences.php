<?php require_once('header.php');

$req= $pdoCV->prepare("SELECT * FROM t_competences");
$req->execute();
$nbr_competences = $req-> rowCount();
//gestion des contenus de la bdd compétences
//Insertion d'une competence
if(isset($_POST['competence']) ){// si on a posté une nouvelle compétence
    if(!empty($_POST['competence']) && !empty($_POST['c_niveau'])){
        $competence = addslashes($_POST['competence']);
        $c_niveau = addslashes($_POST['c_niveau']);
        $pdoCV->exec("INSERT INTO t_competences VALUES (NULL,'$competence','$c_niveau','1')");//mettre $id_utilisateur quand on l'aura dans la variable de session
        header("location: competences.php");//pour revenir sur la page
        exit();

    }
}

//suppression d'une compétence

if(isset($_GET['id_competence'])){// on récupère la comp. par son id dans l'URL
    $efface = $_GET['id_competence'];// je mets cela dans une variable

    $req="DELETE FROM t_competences WHERE id_competence = '$efface'";
    $pdoCV->query($req);// on peut utiliser avec exec aussi si on veut
    header("location: competences.php");

}//Ferme le if isset

?>

    <h2>il y a <?= $nbr_competences; ?> compétence<?= ($nbr_competences>1)?'s':'' ?></h2>

    <table border=2>

        <tr>

            <th>Compétences</th>
            <th>Niveau en %</th>
            <th>Suppression</th>
            <th>Modification</th>
        </tr>
        <?php while($ligne_competence = $req->fetch()) : ?>

            <tr>
                <td><?= $ligne_competence['competence']; ?></td>
                <td><?= $ligne_competence['c_niveau']; ?></td>
                <td><a href="competences.php?id_competence=<?= $ligne_competence['id_competence'];?>">Supprimer</a></td>
                <td><a href="modif_competence.php?id_competence=<?= $ligne_competence['id_competence'] ?>">Modifier</a></td>

            </tr>
        <?php endwhile; ?>
    </table>
    <hr>

    <h3>Insertion d'une compétence</h3>

    <form method="post" action="competences.php">

        <label for="competence">Competence</label>
        <input type="text" name="competence" id="competence" placeholder="Inserez une compétence">
        <input type="text" name="c_niveau" id="c_niveau" placeholder="Inserez le niveau">
        <input type="submit" value="Inserez">

    </form>


</body>
</html>
