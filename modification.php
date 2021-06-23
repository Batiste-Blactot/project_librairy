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

    <div class="container-fluid text-center py-5">
        <h2 class="mb-3">Modifier mes informations</h2>
        <form action="" method="post" class="border border-dark mx-5">
            <div class="my-3">
                <p>Nom d'utilisateur<span>*</span> :</p>
                <input type="text" name="username" id="username" value=<?php echo $_SESSION['Email'] ?> onclick="this.value='' " required>
            </div>
            <div class="my-3">
                <p>Mot de passe<span>*</span></p>
                <input type="password" name="password" id="password" value=<?php echo $_SESSION['MDP'] ?> onclick="this.value='' " required>
            </div>
            <div class="my-3">
                <p>Nom<span>*</span></p>
                <input type="text" name="nom" id="nom" value=<?php echo $_SESSION['nom_client'] ?> onclick="this.value='' " required>
            </div>
            <div class="my-3">
                <p>Date de naissance<span>*</span></p>
                <input type="date" name="datenaissance" id="datenaissance" value=<?php echo $_SESSION['date_naissance'] ?> onclick="this.value='' " required>
            </div>
            <div class="my-3">
                <p>Adresse Postale<span>*</span></p>
                <input type="text" name="addresse" id="addresse" value=<?php echo $_SESSION['adresse'] ?> onclick="this.value='' " required>
            </div>
            <div class="my-3">
                <button class="btn btn-default border border-dark text-center ms-4 mb-3 px-4" type="submit">Inscription</button><button class="btn btn-default border border-dark text-center ms-4 mb-3 px-4" type="reset">Réinitialiser</button>
            </div>
        </form>
    </div>
    <?php include('view/template/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>
<?php

if (!empty($_SESSION['id_client']) and !empty($_POST['username']) and !empty($_POST['password']) and !empty($_POST['nom']) and !empty($_POST['datenaissance']) and !empty($_POST['addresse'])) {

    $client = new Client();
    $client->modification($_SESSION['id_client'], $_POST['nom'], $_POST['username'], $_POST['datenaissance'], $_POST['addresse'], $_POST['password']);
    $_SESSION['nom_client'] = $_POST['nom'];
    $_SESSION['Email'] = $_POST['username'];
    $_SESSION['date_naissance'] = $_POST['datenaissance'];
    $_SESSION['adresse'] = $_POST['addresse'];
    $_SESSION['MDP'] = $_POST['password'];
}

?>