<?php

session_start();

include("model/Client.php");
include("model/Livre.php");



if (isset($_GET['passer'])) {

    if ($_GET['passer'] == 'next') {
        $_SESSION['next'] = $_SESSION['next'] + 6;
        $_SESSION['nex'] = $_SESSION['nex'] + 6;
    } else {
        if ($_GET['passer'] == 'previous') {
            $_SESSION['next'] = $_SESSION['next'] - 6;
            $_SESSION['nex'] = $_SESSION['nex'] - 6;
        }
    }
}


//la verfication de variable session et et verfier resevoir la variable b
if (isset($_SESSION['connecter'])) {
    if (isset($_GET['d'])) {
        session_destroy();
        $_SESSION['connecter'] = false;
    }
}

//S'il n'y a pas de variable 'connecter' alors la connexion n'est pas == à true
if (!isset($_SESSION['connecter']))
    $_SESSION['connecter'] = false;

//Pour faire la connexion on vérifie si les variables ont bien été remplies
if (!empty($_POST['email']) and !empty($_POST['pwd'])) {
    $client1 = new Client();
    //On vérifie que l'utilisateur / client existe
    if ($client = $client1->valide($_POST['email'], $_POST['pwd'])) {

        $_SESSION['connecter'] = true;
        foreach ($client as $client_connecter) {
            //On stocke toutes les variables dans les variables SESSIONS
            $_SESSION['id_client'] = $client_connecter['id_client'];
            $_SESSION['nom_client'] = $client_connecter['nom_client'];
            $_SESSION['Email'] = $client_connecter['Email'];
            $_SESSION['date_naissance'] = $client_connecter['date_naissance'];
            $_SESSION['adresse'] = $client_connecter['adresse'];
            $_SESSION['MDP'] = $client_connecter['MDP'];
            $_SESSION['Nb_emprunt'] = $client_connecter['Nb_emprunt'];
            $_SESSION['Date_inscription'] = $client_connecter['Date_inscription'];
        }
    } else {

?>
        <script type="text/javascript">
            window.alert('email ou mot de passe incorrect! ');
        </script>
<?php

    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="public/CSS/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Viaoda+Libre&display=swap" rel="stylesheet">
    <title>Bibliotheque Dev PHP</title>
</head>

<body>

    <?php require 'view/template/header.php'; ?>

    <div class="container-fluid row">

        <?php
        include('view/template/menu.php');
        ?>

        <div class="col-lg-9 mt-5 mx-auto">
            <div>
                <div class="row ">


                    <?php
                    $liv = new Livre();


                    if (isset($_GET['passer']) and $_GET['passer'] == 'next') {
                        $liv->next($_SESSION['next'], $_SESSION['nex']);
                    } else {
                        if (isset($_GET['passer']) and $_GET['passer'] == 'previous') {
                            $liv->previous($_SESSION['next'], $_SESSION['nex']);
                        } else {

                            $_SESSION['next'] = 0;
                            $_SESSION['nex'] = 9;
                        }
                    }

                    if (empty($_GET['chercher'])) {
                        $_GET['chercher'] = "Roman";
                    }

                    $leslivre = $liv->afficher($_GET['chercher'], $_SESSION['next'], $_SESSION['nex']);
                    $annule_next = 0;
                    foreach ($leslivre as $livre) {

                    ?>
                        <div class="col-sm-6 col-md-6 book1 text-center border border-dark bg-white ">
                            <div>
                                <?php echo '<img src=' . $livre['img_livre'] . ' alt="" width=200 class="my-3"/>'; ?>

                                <div class="caption">
                                    <h2 class="text-center text-orange "><?php echo $livre['titre_livre'] ?></h2>
                                    <p class="text-center fs-5"><?php echo $livre['Paragraphe'] ?>"</p>


                                    <button><a href="consultation.php?ISBN=<?php echo $livre['ISBN'] ?>" class="text-dark" style="text-decoration: none;">Consulter</a></button><button><?php if ($_SESSION['connecter'] == true && $livre['etat'] == 0) { ?><a href="consultation.php?ISBN=<?php echo $livre['ISBN'] ?>" class="text-dark" style="text-decoration: none;">emprunter</a></button>


                                <?php } ?></button>
                                </div>
                            </div>
                        </div>

                    <?php $annule_next++;
                    } ?>

                </div>

                <ul class=" pager">

                    <?php if ($_SESSION['next'] != 0) { ?>
                        <button><a href="index.php?chercher=<?php echo $_GET['chercher']; ?>&passer=previous" class="text-dark" style="text-decoration: none;">Previous</a></li></button>

                    <?php }
                    if ($annule_next >= 6) {
                    ?>
                        <button><a href="index.php?chercher=<?php echo $_GET['chercher']; ?>&passer=next" class="text-dark" style="text-decoration: none;">Next</a></button>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>


    <?php
    include('view/template/footer.php');

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>