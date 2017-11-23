<?php require_once('inc/init.inc.php'); ?>
<?php require_once('inc/head.inc.php'); ?>
<?php require_once('inc/nav.inc.php'); ?>
<main class="container-fluid">

    <div>

        <?php

        echo '<table class="table table-bordered">';

        echo '  <tr>';

        foreach($ligne_utilisateur as $indice => $valeur){
            if ($indice!='mdp'){
                if ($valeur != null) {
                    echo '<td>';
                    echo ($indice=='telephone' || $indice=='autre_tel')?wordwrap($valeur, 2, ' ', true):$valeur;
                    echo '</td>';
                }
            }
        }
        echo '  </tr>';
        echo '</table>';


        ?>
    </div>
</main>

<?php include ('inc/footer.inc.php') ?>
