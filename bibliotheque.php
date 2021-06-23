<?php

session_start();
include("model/Client.php");
if (!isset($_SESSION['connecter']))
    $_SESSION['connecter'] = false;

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="public/CSS/main.css">
    <title>Bibliothèque Dev PHP</title>
</head>

<body>

    <?php require 'view/template/header.php'; ?>


    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active my-5">
                <img src="OUVRAGES/aleph.jpg" class="d-block mx-auto" width="500" alt="...">
                <div class="carousel-caption d-none d-md-block text-dark">
                    <h5>Aleph</h5>
                    <p>Livre faisant parti de la bibliothèque</p>
                </div>
            </div>
            <div class="carousel-item my-5">
                <img src="OUVRAGES/asterixEnCorse.jpg" class="d-block mx-auto" width="500" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Astérix en Corse</h5>
                    <p>Livre faisant parti de la bibliothèque</p>
                </div>
            </div>
            <div class="carousel-item my-5">
                <img src="OUVRAGES/onepiece.jpg" class="d-block mx-auto" width="500" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>One piece</h5>
                    <p>Livre faisant parti de la bibliothèque</p>
                </div>
            </div>
            <div class="carousel-item my-5">
                <img src="OUVRAGES/bleach.jpg" class="d-block mx-auto" width="500" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Bleach</h5>
                    <p>Livre faisant parti de la bibliothèque</p>
                </div>
            </div>
            <div class="carousel-item my-5">
                <img src="OUVRAGES/dragonball.jpg" class="d-block mx-auto" width="500" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Dragon Ball</h5>
                    <p>Livre faisant parti de la bibliothèque</p>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Précédent</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Suivant</span>
            </button>
        </div>
        <?php include('view/template/footer.php'); ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>