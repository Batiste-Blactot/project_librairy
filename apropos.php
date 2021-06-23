<?php
session_start();

include("model/Client.php");
if (!isset($_SESSION['connecter']))
    $_SESSION['connecter'] = false; //pour la premier fois 


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="public/CSS/main.css">
    <title>Bibliotheque Dev PHP</title>
</head>

<body>
    <?php require 'view/template/header.php'; ?>
    <div class="container-fluid">
        <div class="text-center my-4">
            <h2>A propos de nous</h2>
            <p>La bibliothèque publique de Dévilles-les-Rouen s'engage à favoriser un milieu propice à l'apprentissage et au développement.
                Les usagers provenant de la communauté ainsi que des régions environnantes y trouveront un milieu chaleureux permettant
                l'enrichissement intellectuel et social.
            </p>
        </div>
        <div class="text-center my-5">
            <img src="public/IMG/biblio.jpg" alt="">
        </div>
        <?php
        include('view/template/footer.php');
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>