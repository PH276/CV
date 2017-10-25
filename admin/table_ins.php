<?php
require_once('inc/init.inc.php');


//gestion des contenus de la bdd compétences
//Insertion d'une competence
if(isset($_POST['competence']) ){// si on a posté une nouvelle compétence
    if(!empty($_POST['competence']) && !empty($_POST['c_niveau'])){
        $competence = htmlspecialchars($_POST['competence']);
        $c_niveau = htmlspecialchars($_POST['c_niveau']);
        $pdoCV->exec("INSERT INTO t_competences VALUES (NULL,'$competence','$c_niveau','1')");//mettre l'id de l'utilisateur quand on l'aura dans la variable de session
        header("location: competences.php");//pour revenir sur la page
        exit();

    }
}


?>
