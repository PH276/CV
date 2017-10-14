<?php
require 'header.php';
if (isset($_GET['id_competence']) && !empty($_GET['id_competence'])){
    $id_competence = $_GET['id_competence'];

    $resultat = $pdoCV->prepare("SELECT * FROM t_competences WHERE id_competence = :id_competence");
    $resultat->execute(array(':id_competence' => $id_competence));
    $competence = $resultat->fetch();
    $competence_titre = $competence['competence'];

}

if(isset($_POST['competence']) ){// si on a posté une nouvelle compétence
    if(!empty($_POST['competence']) && !empty($_POST['c_niveau'])){
        $competence_titre = addslashes($_POST['competence']);
        $c_niveau = addslashes($_POST['c_niveau']);
        $pdoCV->exec("UPDATE t_competences SET  competence = '$competence_titre', c_niveau = $c_niveau WHERE id_competence=$id_competence");//mettre $id_utilisateur quand on l'aura dans la variable de session
        header("location: competences.php");//pour revenir sur la page
        exit();

    }
}

?>

<h3>Modification de la compétence <?= $competence_titre ?></h3>

<form method="post" action="">

    <label for="competence">Competence</label>
    <input type="text" name="competence" id="competence" value="<?= $competence['competence'] ?>">
    <input type="text" name="c_niveau" id="c_niveau" value="<?= $competence['c_niveau'] ?>">
    <input type="submit" value="Enregistrer">

</form>


</body>
</html>
