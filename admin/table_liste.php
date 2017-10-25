<?php
require_once('inc/init.inc.php');
if (isset($_GET['table'])){
    $_SESSION['table'] = table_choisie($_GET['table']);
    debug($_SESSION);
} else {
    header('index.php');
}

$contenu = table_liste($pdoCV);
header ('location: page_table_bdd.php');
