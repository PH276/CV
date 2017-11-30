<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

    <?php
    $title = (isset($_SESSION['utilisateur']))?'Admin : '.$_SESSION['utilisateur']['pseudo']:$title;
    ?>

    <title id="title"><?= $title ?></title>
</head>
<body>
