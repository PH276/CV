<?php require_once('inc/init.inc.php'); ?>
<?php require_once('inc/head.inc.php'); ?>
<?php require_once('inc/nav.inc.php'); ?>
<main class="container-fluid">

    <div style "display:inline-block">


        <?php

        echo '<table class="table table-bordered">';

        echo '  <tr>';

        foreach($ligne_utilisateur as $indice => $valeur){
            if ($indice!='mdp'){
                echo '<td>';
                echo ($indice=='telephone')?wordwrap($valeur, 2, ' ', true):$valeur;
                echo '</td>';
            }
        }
        echo '  </tr>';
        echo '</table>';


        ?>
    </div>
</main>

<?php include ('inc/footer.inc.php') ?>
