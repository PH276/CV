<?php require_once('header.php');

$req= $pdoCV->prepare("SELECT * FROM t_titre_CV");
$req->execute();
$nbr_titre_cv = $req-> rowCount();
//gestion des contenus de la bdd compétences
//Insertion d'une titre_CV
if(isset($_POST['titre_cv']) ){// si on a posté une nouvelle compétence
    if(!empty($_POST['titre_cv']) && !empty($_POST['accroche']) && !empty($_POST['logo'])){
        $titre_cv = addslashes($_POST['titre_cv']);
        $accroche = addslashes($_POST['accroche']);
        $logo = addslashes($_POST['logo']);
        $pdocv->exec("INSERT INTO t_titre_cv VALUES (NULL,'$titre_cv','$accroche','$logo','1')");//mettre $id_utilisateur quand on l'aura dans la variable de session
        header("location: titre_cv.php");//pour revenir sur la page
        exit();

    }
}

//suppression d'une compétence

if(isset($_GET['id_titre_cv'])){// on récupère la comp. par son id dans l'URL
    $efface = $_GET['id_titre_cv'];// je mets cela dans une variable

    $req="DELETE FROM t_titre_cv WHERE id_titre_cv = '$efface'";
    $pdocv->query($req);// on peut utiliser avec exec aussi si on veut
    header("location: titre_cv.php");

}//Ferme le if isset

?>

    <h2>Il <?= ($nbr_titre_cv==0)?'n\'':$nbr_titre_cv; ?>y a <?= ($nbr_titre_cv==0)?'aucun':$nbr_titre_cv; ?> titre cv<?= ($nbr_titre_cv>1)?'s':'' ?></h2>

    <table border=2>

        <tr>

            <th>titre</th>
            <th>accroche</th>
            <th>logo</th>
            <th>Suppression</th>
            <th>Modification</th>
        </tr>
        <?php while($ligne_titre_cv = $req->fetch()) : ?>

            <tr>
                <td><?= $ligne_titre_cv['titre_cv']; ?></td>
                <td><?= $ligne_titre_cv['accroche']; ?></td>
                <td><?= $ligne_titre_cv['logo']; ?></td>
                <td><a href="titre_cv.php?id_titre_cv=<?= $ligne_titre_cv['id_titre_cv'];?>">Supprimer</a></td>
                <td><a href="modif_titre_cv.php?id_titre_cv=<?= $ligne_titre_cv['id_titre_cv'] ?>">Modifier</a></td>

            </tr>
        <?php endwhile; ?>
    </table>
    <hr>

    <h3>Insertion d'un titre cv</h3>

    <form method="post" action="">

        <label for="titre_cv">titre CV</label>
        <input type="text" name="titre_cv" id="titre_cv" placeholder="Inserez un titre cv">
        <input type="text" name="accroche" placeholder="Inserez une accroche">
        <input type="text" name="logo" placeholder="Inserez un logo">
        <input type="submit" value="Insérez">

    </form>
<?php include ('footer.php') ?>
