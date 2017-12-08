<footer class="container-fluid">
    <div class="row">

        <div class="col-md-3">
            <!-- <div class="col-md-3" id="adresse"> -->
            <ul>
                <li>Pascal HUITOREL</li>
                <li><?= $_SESSION['utilisateur']['adresse'] ?><li>
                    <li><?= $_SESSION['utilisateur']['code_postal'] ?> <?= $_SESSION['utilisateur']['ville'] ?></li>
                    <li><a href="tel:<?= $_SESSION['utilisateur']['telephone'] ?>">
                        <?= wordwrap($_SESSION['utilisateur']['telephone'], 2, ' ', true)  ?></a>
                    </li>
                    <li><a href="tel:<?= $_SESSION['utilisateur']['autre_tel'] ?>">
                        <?= wordwrap($_SESSION['utilisateur']['autre_tel'], 2, ' ', true)  ?></a>
                    </li>


                    <li><a href="mailto:<?= $_SESSION['utilisateur']['email'] ?>">
                        <?= $_SESSION['utilisateur']['email'] ?></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 text-center">
                <a href="doc/HUITORELPascalDeveloppeurWebCV.pdf" target="_blank">Mon CV en document</a>
            </div>
            <div class="col-md-3 text-right" id="logos_reseaux">
                <ul>

                    <?php foreach ($_SESSION['logos_reseaux'] as $reseau) : ?>
                        <?php

                        // $img = ($reseau['logo'] == '')?'':"img/" . $reseau['logo'];
                        $logo = (substr($reseau['logo'], 0, 3) == "fa-")?
                        "<i class='fa " . $reseau['logo'] . " fa-2x' aria-hidden='true'></i>":
                        "<img width='20' src='img/" . $reseau['logo'] . "' alt=''>";
                        ?>

                        <li><a href="<?= $reseau['lien'] ?>" target="_blank"><?= $logo ?></a></li>

                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>

        <script src = "https://use.fontawesome.com/0c1a81064b.js"></script>

    </footer>
</body>
</html>
