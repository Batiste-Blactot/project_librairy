<?php



$bdd = new PDO('mysql:host=localhost;dbname=biblio', 'root', '');
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../CSS/theme.css" />
    <title>Biblio_Admin_Web</title>

<body>
    <div class="container-fluid">
        <div>
            <h1 class="text-orange">Bibliothèque Dev PHP</h1>
            <h1 class="text-end text-orange pb-2">Bibliotheque du développeur</h1>
        </div>

    </div>

    <div>
        <?php
        if (isset($_POST['search'])) {
            $valueToSearch = $_POST['valueToSearch'];
            //rechercher dans toutes les colonnes
            $q = "SELECT * FROM client 
    WHERE  Nb_emprunt!=0 
    AND id_client LIKE '%" . $valueToSearch . "%'";
            $search_result = filtrerTable($q);
        } else {
            $q = "SELECT * 
    FROM client 
    WHERE Nb_emprunt!=0
    ORDER BY id_client ";
            $search_result = filtrerTable($q);
        }


        function filtrerTable($q)
        {
            //fct pour l'execution de la requete
            $bdd = new PDO('mysql:host=localhost;dbname=biblio', 'root', '');
            $filter_result = $bdd->query($q);
            return $filter_result;
        }

        ?>

        <div>
            <form method="POST" action="#">
                <div class="col-lg-3">
                    <div class="input-group">
                        <input type="text" name="valueToSearch" class="form-control" placeholder="Tapez un id ...">
                        <span class="input-group-btn">

                            <input class="btn btn-default" type="submit" name="search" value="  Go ! "></input>
                            <a href="index.php"><button class="btn btn-default" type="button">Reset!</button></a>
                        </span>
                    </div>
                </div>


                <br>
                <br>
                <table class="table">
                    <tr>
                        <th>Id client</th>
                        <th>Nom client</th>
                        <th>Email</th>
                        <th>Nombre emprunt</th>
                        <th>ISBN</th>
                        <th>Titre du livre</th>
                        <th>Rendre le livre</th>
                    </tr>
                    <?php

                    while ($row = $search_result->fetch()) :
                    ?>
                        <tr>
                            <td><?php echo $row['id_client']; ?></td>
                            <td><?php echo $row['nom_client']; ?></td>
                            <td><?php echo $row['Email']; ?></td>
                            <td><?php echo $row['Nb_emprunt']; ?></td>
                            <td>

                                <?php
                                $req2 = $bdd->query('SELECT * FROM emprunter e
    JOIN livre l
    ON l.ISBN=e.ISBN
    WHERE l.etat!=0 AND id_client = ' . $row['id_client'] . ' ');
                                while ($donnee = $req2->fetch()) :
                                    echo $donnee['ISBN']; ?>
                                    <br>
                                <?php endwhile;
                                echo "</td><td>" ?>
                                <?php
                                $req2 = $bdd->query('SELECT * FROM emprunter e
    JOIN livre l
    ON l.ISBN=e.ISBN
    WHERE l.etat!=0 AND id_client = ' . $row['id_client'] . ' ');
                                while ($donnee = $req2->fetch()) :
                                    echo $donnee['titre_livre']; ?>
                                    <br>
                                <?php endwhile; ?>

                            </td>

                            <td>
                                <?php

                                $req3 = $bdd->query('SELECT * FROM emprunter e
    JOIN livre l
    ON l.ISBN=e.ISBN
    WHERE l.etat!=0 AND id_client = ' . $row['id_client'] . ' ');
                                while ($donnee = $req3->fetch()) :
                                ?>
                                    <a href="index.php?id_client=<?php echo $donnee['id_client']; ?>&ISBN=<?php echo $donnee['ISBN']; ?>&supp=ok">Supprimer</a>
                                    <br>

                                <?php
                                endwhile;
                                ?>

                            </td>
                        </tr>

                    <?php
                    endwhile;
                    ?>

                    <?php
                    if (isset($_GET['supp'])) {
                        //echo $_GET['id_client'];
                        $a = $bdd->query('UPDATE client SET Nb_emprunt =Nb_emprunt -1 WHERE id_client=' . $_GET['id_client'] . '');
                        $data = $a->fetch();
                        //echo $data['Nb_emprunt'];

                        $b = $bdd->query('UPDATE LIVRE SET etat=0 WHERE ISBN =' . $_GET['ISBN'] . '');
                        $data1 = $b->fetch();

                        $c = $bdd->query('DELETE FROM emprunter WHERE ISBN=' . $_GET['ISBN'] . '');
                        $data2 = $c->fetch();
                        header('Location: index.php');
                    }
                    ?>
                </table>
            </form>
        </div>
        <div></div>
    </div>

    <?php require 'view/template/footer.php' ?>

    <script type="text/javascript" src="CSS/bootstrap/js/bootstrap.min.js">
    </script>
</body>

</html>