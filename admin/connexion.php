<?php
require_once ('inc/init.inc.php');
$page = 'connexion';

if (isset($_GET['action']) && $_GET['action']=='deconnexion'){
    unset($_SESSION['utilisateur']);
    header('location:connexion.php');
}

if (userAdmin()){
    header('location:utilisateur.php');
}

if (!empty($_POST)){
    debug($_POST);

    // verification pseudo
    if (!empty($_POST['email']) && !empty($_POST['mdp'])){
        $resultat = $pdoCV->prepare("SELECT * FROM t_utilisateurs WHERE email = :email");
        $resultat->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
        $resultat->execute();
        if ($resultat->rowCount() > 0){
            // nous aurions pu proposer 2 à 3 variantes de  son pseudo, en ayant vérifié qu'ils sont dispo
            $ligne_utilisateur = $resultat->fetch(PDO::FETCH_ASSOC);

            if ($ligne_utilisateur['mdp'] == $_POST['mdp']){ // tout est OK
                foreach($ligne_utilisateur as $key => $val){
                    if ($key != 'mdp'){
                        $_SESSION['utilisateur'][$key] = $val;
                    }
                }
                // debug($_SESSION);
                header("location:utilisateur.php");
            }
            else{
                $msg .= '<div class="erreur">mot de passe erroné.</div>';
            }
        }
        else{
            $msg .= '<div class="erreur">L\'email '.$_POST['email'].' n\'existe pas disponible, Veuillez en choisir un autre.</div>';
        }
    }
    else{
        $msg .=  '<div class="erreur">Veuillez renseigner un email et un mot de passe</div>';
    }
    // -----------------------------------------------------------
}

require_once ('inc/head.inc.php');
require_once ('inc/nav.inc.php');
?>

<!--  contenu HTML  -->
<h1>Connexion</h1>
<form method="post" action="">
    <?= $msg; ?>

    <div class="form-group">

    <label for="pseudo">Email :</label>
    <input type="text" id="email" name="email" value="<?= (isset($_POST['email']))?$_POST['email']:'' ?>" >
</div>

<div class="form-group">
    <label for="mdp">Mot de passe :</label>
    <input type="password" id="mdp" name="mdp"  value="<?= (isset($mdp))?$mdp:'' ?>">
</div>

    <input type="submit" class="btn btn-primary" value="Connexion">

</form>

<?php require_once ('inc/footer.inc.php'); ?>
