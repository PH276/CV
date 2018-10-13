<footer>
    <div class="container">
        <div class="row justify-content-end">

            <div class="col-6 text-center">
                <a href="doc/HUITORELPascalDeveloppeurPHPFullstackCV.pdf" target="_blank">Mon CV en document</a>
            </div>
            <div class="col-6 text-center" id="logos_reseaux">
                <ul>

                    <?php foreach ($_SESSION['logos_reseaux'] as $reseau) : ?>
                        <?php

                        $logo = (substr($reseau['logo'], 0, 3) == "fa-")?
                        "<i class='fa " . $reseau['logo'] . " fa-2x' aria-hidden='true'></i>":
                        "<img width='20' src='img/" . $reseau['logo'] . "' alt=''>";
                        ?>

                        <li><a href="<?= $reseau['lien'] ?>" target="_blank"><?= $logo ?></a></li>

                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src = "https://use.fontawesome.com/0c1a81064b.js"></script>

    <!-- <script src = "js/js.js"></script> -->


</footer>
</body>
</html>
