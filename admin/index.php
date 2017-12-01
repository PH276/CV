<?php require_once('inc/init.inc.php'); ?>
<?php require_once('inc/head.inc.php'); ?>
<?php require_once('inc/nav.inc.php'); ?>
<?php
$req = $pdoCV -> query("SELECT e_titre FROM t_experiences WHERE id_utilisateur='1' LIMIT 0, 3");
$req -> execute();
$experiences = $req->fetchAll(PDO::FETCH_ASSOC);
debug($experiences);
extract ($_SESSION['utilisateur']);
?>
<main id="affichage" class="container-fluid">
    <div class="row">

        <div id="adresse" class="col-md-5 col-md-offset-1">
            <img src="../photos/portrait.png" alt="portrait" width="100"><br>
            <b><?= $prenom ?> <?= $nom ?></b><br>
            <span class="text-leger">
            <?= $adresse ?><br>
            <?= $code_postal ?> <?= $ville ?><br>
            </span>
            <?= wordwrap($telephone, 2, ' ', true)  ?><br>
            <?= wordwrap($autre_tel, 2, ' ', true) ?><br>
            <?= $email ?><br>
            <!-- <div id="introduction">
                <h1>Inline Editor <a class="documentation" href="http://docs.ckeditor.com/#!/guide/dev_inline">Documentation</a></h1>

                <p>
                    <strong>Inline Editing</strong> allows you to edit any element on the page in-place. Inline editor provides a real <abbr title="What You See is What You Get">WYSIWYG</abbr> experience "out of the box", because unlike in <a href="http://sdk.ckeditor.com/samples/classic.html">classic editor</a>,
                    there is no <code>&lt;iframe&gt;</code> element surrounding the editing area. The CSS styles used for editor content are exactly the same as on the target page where this content is rendered!
                </p>

                <h2 class="editor-title">Inline Editing Enabled by Code</h2>

                <p>
                    Press the "Start editing" button below. An editor will be created using the
                    <code><a href="http://docs.ckeditor.com/#!/api/CKEDITOR-method-inline">CKEDITOR.inline()</a></code> method with
                    <code><a href="http://docs.ckeditor.com/#!/api/CKEDITOR.config-cfg-startupFocus">config.startupFocus</a></code>
                    set to <code>true</code>.
                </p>
            </div> -->
        </div>

        <!-- <script>
        // The inline editor should be enabled on an element with "contenteditable" attribute set to "true".
        // Otherwise CKEditor will start in read-only mode.
        var introduction = document.getElementById( 'introduction' );
        introduction.setAttribute( 'contenteditable', true );



        CKEDITOR.inline( 'introduction', {
            // Allow some non-standard markup that we used in the introduction.
            customConfig : 'http://localhost/CV_v2/admin/js/ckeditor_config.js',
            extraAllowedContent: 'a(documentation);abbr[title];code',
            removePlugins: 'stylescombo',
            extraPlugins: 'sourcedialog',
            // Show toolbar on startup (optional).
            startupFocus: false
        } );
        </script> -->
        <div class="col-md-6" >
            <img src="photos/jeremy-thomas-99326.jpg" class="col-md-9 col-md-offset-2" alt="">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?php foreach ($experiences as $experience) {
                echo '<p>' . $experience . '</p>';
            } ?>
        </div>
        <div class="col-md-4">

        </div>
        <div class="col-md-4">

        </div>
    </div>
</main>

<?php include ('inc/footer.inc.php') ?>
