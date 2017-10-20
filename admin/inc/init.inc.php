<?php
require_once('parametres.inc.php');
require_once('fonctions.inc.php');

// initialisation de variables
$titre_page = '';
$page = '';

// Connexion à la base de donnée
$pdoCV = new PDO("mysql:host=".HOST.";dbname=".BDD, USER , PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

$sql = $pdoCV->query(" SELECT * FROM t_utilisateurs WHERE id_utilisateur='1'");
$ligne_utilisateur = $sql->fetch(PDO::FETCH_ASSOC);
// if($sql -> rowCount() > 0){
//     debug($ligne_utilisateur);
// }
