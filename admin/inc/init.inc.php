<?php
require_once('parametres.inc.php');
require_once('fonctions.inc.php');

// initialisation de variables
$titre_page = '';
$page = '';

// Connexion à la base de donnée
$pdoCV = new PDO("mysql:host=".HOST.";dbname=".BDD, USER , PASSWORD, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// récupération de l'utilisateur principal (le 1er de la table)
$sql = $pdoCV->query(" SELECT * FROM t_utilisateurs WHERE id='1'");
$ligne_utilisateur = $sql->fetch(PDO::FETCH_ASSOC);
