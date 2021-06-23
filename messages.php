<?php

session_start();
include("model/Client.php");
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

    <?php require 'view/template/header.php' ?>

    <div class="pt-2 mt-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a class="nav-link px-5" aria-current="page" href="profil.php">Tableau de bord</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-5" href="index.php">Accueil</a><br>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-5" href="messages.php">Vos messages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-5" href="modification.php">Modifications</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-5" href="index.php?d=true">Se déconnecter</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="tableau">
        <div class="panel panel-default">

            <div>Mes Messages</div>
            <div>
                <h3><?php delai(); ?></h3>
            </div>
        </div>
    </div>
    <?php include('view/template/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>


<?php
function delai()
{
    $cli = new Client();
    $res = $cli->livre_emprunt($_SESSION['id_client']);

    foreach ($res as $emprunt) {

        $z = $emprunt['date_emprunt'];
        $DateFin = 8;
        $DateDebut = date("$z");
        $DateFin = date('Y-m-d', strtotime($DateDebut . ' +' . $DateFin . ' days'));


        if ($DateFin < date('Y-m-d')) {
            echo 'Vous avez dépassé le date du retour du livre  ' . $emprunt['ISBN'] . ' .<br/>';
        } else {
        }
    }
}
?>