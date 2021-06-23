<?php
session_start();


if (!isset($_SESSION['connecter'])) {
    $_SESSION['connecter'] = false;
}
include("model/Client.php");
include("model/Livre.php");

$livreinfo = new Livre();
$client1 = new Client();
$unSeulLivre = $livreinfo->afficher_infolivre($_GET['ISBN']);
foreach ($unSeulLivre as $livre) {
}

if (isset($_POST['emprunter'])) {

    if ($_SESSION['Nb_emprunt'] < 10) {

        $_SESSION['Nb_emprunt']++;
        $livre['etat'] = 1;
        $client1->emprunter_Livre($_GET['ISBN'], $_SESSION['id_client'], $_SESSION['Nb_emprunt']);
    } else {
?>
        <script type="text/javascript">
            window.alert('Vous avez atteint la limite, vous ne pouvez plus emprunter !');
        </script>
<?php   }
} ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="public/CSS/main.css">
</head>

<body>
    <?php require 'view/template/header.php' ?>

    <div class="container-fluid">
        <h2 class="mt-3">Livre</h2>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-4 img-livre">
                <div class="container">
                    <?php echo '<img src=' . $livre['img_livre'] . ' alt="" width=200 />'; ?>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 paragraphe">
                <div>
                    <div class="caption">
                        <h3 class="nom-livre"><?php echo $livre['titre_livre']; ?></h3>
                        <p><?php echo $livre['Paragraphe']; ?></p>
                        <button class="btn btn-default border border-dark text-center ms-4 mb-3 px-4"><a href="index.php?chercher=<?php echo $livre['type_livre'] ?>" class="text-dark" style="text-decoration: none;">Retour</a></button>

                        <?php if ($_SESSION['connecter'] == true) {
                            if ($livre['etat'] == 0) { ?>

                                <form method="post" action="">

                                    <button class="btn btn-default border border-dark text-center ms-4 mb-3 px-4" name="emprunter" type="submit">Emprunter</button>

                                </form>

                        <?php }
                        } ?></p>
                    </div>
                </div>
                <div class="panel panel-default">
                    <table class="table">
                        <tr>
                            <th>ISBN</th>
                            <th>EMPLACEMENT</th>
                            <th>ETAT</th>
                        </tr>
                        <tr>
                            <td><?php echo $livre['ISBN']; ?></td>
                            <td><?php echo $livre['Emplacement'] ?></td>
                            <td><?php if ($livre['etat'] == 1) {
                                    echo "Deja emprunte";
                                } else {
                                    echo "Disponible";
                                } ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div>
            <div class="row">
                <?php
                $lesauteur = $livreinfo->afficher_info_auteur($_GET['ISBN']);
                foreach ($lesauteur as $auteur) {
                ?>
                    <div class="col-sm-6 col-md-4 img-auteur">
                        <h3>Auteur</h3>
                        <div>
                            <?php echo '<img src=' . $auteur['img_auteur'] . ' alt="" />'; ?>
                            <div class="caption">
                                <h3 class="mb-4"><?php echo $auteur['nom_auteur'] . " " . $auteur['prenom_auteur']; ?></h3>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php include('view/template/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>