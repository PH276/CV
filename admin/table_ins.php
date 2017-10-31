<?php
require_once('inc/init.inc.php');

// gestion des contenus de la bdd compétences
// Insertion d'une competence
if(!empty($_POST) ){// si on a posté une nouvelle compétence
    $colonnes = implode(', ', array_keys($_POST));
    $marqueurs = implode(",: ", array_keys($_POST));
    $query = 'INSERT INTO '
    . $_SESSION['table']['table']
    . '('
    . implode(', ', array_keys($_POST))
    .', id_utilisateur) VALUES (:'
    . implode(', :', array_keys($_POST))
    . '
    , "1")';

    // $competence = htmlspecialchars($_POST['competence']);
    // $c_niveau = htmlspecialchars($_POST['c_niveau']);
    $resultat = $pdoCV->prepare($query);//mettre l'id de l'utilisateur quand on l'aura dans la variable de session
    foreach($_POST as $key => &$param){
        if (is_null($param)){
            $type = PDO::PARAM_NULL;
        }elseif(is_bool($param)){
            $type = PDO::PARAM_BOOL;
        }elseif(is_int($param)){
            $type = PDO::PARAM_INT;
        }else{
            $type = PDO::PARAM_STR;
        }
        $resultat->bindParam($key, $param, $type);
    }

    $resultat->execute();
}



?>
