<?php
//definition pour les emprunt et definition pour l'utilisateur
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
    <div class="container-fluid">
        <div class="text-center">Mes Emprunts</div>
        <table class="table mx-auto text-center">
            <tr>
                <th>Code : </th>
                <th>Nom du livre</th>
                <th>Type de livre</th>
                <th>Date de l'emprunt</th>
                <th>Date de retour</th>
            </tr>
            <?php
            $client1 = new Client();
            $resulta = $client1->livre_emprunt($_SESSION['id_client']);
            foreach ($resulta as $emprunt) {

                $z = $emprunt['date_emprunt'];
                $DateFin = 8;
                $DateDebut = date("$z");
                $DateFin = date('Y-m-d', strtotime($DateDebut . ' +' . $DateFin . ' days'));
                echo "<tr><td>" . $emprunt['ISBN'] . "</td><td>" . $emprunt['titre_livre'] . "</td><td>" . $emprunt['type_livre'] . "</td><td>" . $emprunt['date_emprunt'] . "</td><td>" . $DateFin . "</td></tr>";
            }
            ?>
        </table>
    </div>
    </div>
    <?php require 'view/template/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>