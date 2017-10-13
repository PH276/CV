<?php include ('header.php');

echo '<table border="1">';

echo '<tr>';

foreach($ligne_utilisateur as $indice => $valeur){
    echo '<td>' . $valeur. '</td>';
}
echo '</tr>';
echo '</table>';


?>
<hr>
</body>
</html>
