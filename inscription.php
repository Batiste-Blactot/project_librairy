<?php
session_start();


include("model/Client.php");

if (!isset($_SESSION['connecter']))
    $_SESSION['connecter'] = false;


if (!empty($_POST['username']) and !empty($_POST['password']) and !empty($_POST['nom']) and !empty($_POST['datenaissance']) and !empty($_POST['addresse'])) {

    $client = new Client();
    try {
        if (1) {
            $client->inscription($_POST['nom'], $_POST['username'], $_POST['datenaissance'], $_POST['addresse'], $_POST['password']);
        } else {
            throw new Exception('Un probleme s\'est produit lors de votre inscription!!! Veuillez essayer à nouveau de vous inscrire');
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="public/CSS/main.css">
    <title>Bibliothèque Dev PHP</title>
</head>

<body>

    <?php require 'view/template/header.php'; ?>

    <div class="container-fluid text-center">
        <div>
            <div class="text-center">
                <h2 class="mt-3 mb-4">Inscription</h2>

                <form action="inscription.php" method="post" class="text-center">
                    <div class="text-center border border-dark mx-5 mb-3">
                        <div class="my-3">
                            <p>Votre email<span>*</span></p>
                            <input type="text" name="username" id="username" placeholder="Batiste200" required>
                        </div>
                        <div class="my-3">
                            <p>Votre mot de passe<span>*</span></p>
                            <input type="password" name="password" id="password" placeholder="*******" required>
                        </div>
                        <div class="my-3">
                            <p>Votre nom<span>*</span></p>
                            <input type="text" name="nom" id="nom" placeholder="Nom" required>
                        </div>
                        <div class="my-3">
                            <p>Votre date de naissance<span>*</span></p>
                            <input type="date" name="datenaissance" id="datenaissance" placeholder="AAAA-MM-JJ" required>
                        </div>
                        <div class="my-3">
                            <p>Votre adresse postale<span>*</span></p>
                            <input type="text" name="addresse" id="addresse" placeholder="7 rue du marais" required>
                        </div>
                        <div class="my-3">
                            <p>Se rappeler de moi : <input type="checkbox" name="keep" value="true"></p>
                            <button class="btn btn-default border border-dark text-center ms-4 mb-3 px-4" type="submit">Inscription</button><button class="btn btn-default border border-dark text-center ms-4 mb-3 px-4" type="reset">Réinitialiser</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    include('view/template/footer.php')
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>