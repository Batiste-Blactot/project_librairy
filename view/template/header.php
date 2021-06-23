<div class="container-fluid bg-floral text-white p-3">
    <div>
        <h1 class="text-orange">Bibliothèque Dev PHP</h1>
        <h1 class="text-end text-orange pb-2">Bibliotheque du développeur</h1>
    </div>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid ">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link text-dark px-5 fs-3" aria-current="page" href="index.php">Accueil</a>
                    </li>
                    <?php

                    if (!$_SESSION['connecter']) { /* Si l'utilisateur est connecté on ne l'affiche pas sinon on l'afficge */
                    ?>
                        <li class="nav-item">
                            <a class="nav-link text-dark px-5 fs-3" href="inscription.php">Inscription</a>
                        </li>
                    <?php
                    }
                    ?>

                    <li class="nav-item">
                        <a class="nav-link text-dark px-5 fs-3" href="apropos">A propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark px-5 fs-3" href="#">Catalogue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark px-5 fs-3" href="bibliotheque.php">La bibliothèque</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    if (!$_SESSION['connecter']) {
    ?>
        <form method="post" action="">
            <input type="text" name="email" placeholder="votre email ou nom d'utilisateur" required />
            <input type="password" name="pwd" placeholder="votre mot de passe" required />
            <input type="submit" value="Connexion" />
        </form>

    <?php
    } else {
    ?>
        <div class="mt-3 text-center">
            <button type="button" class="mx-5"><a href="profil.php" class="text-dark " style="text-decoration: none;">Votre profil</a></button>
            <button type="button" class="mx-5"><a href="index.php?d=true" class="text-dark " style="text-decoration: none;">Se déconnecter</a></button>
        </div>
    <?php
    }
    ?>

</div>