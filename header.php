<?php

session_start();

if(!empty($_GET["flag"])){
    session_unset();
    unset($_SESSION);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/cyborg/bootstrap.min.css">
    <title>Entreprise</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">entreprise</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Entreprise
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ajoutEmploye.php">Ajouter Employe</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="employes.php">List Employe</a>
                    </li>
                    <?php if (!empty($_SESSION["id"])) {
                    ?>
                        <a class="nav-link" href="header.php?flag=true">Deconnexion</a>
                        <a class="nav-link" href="profil.php">Mon Profil</a>
                    <?php

                    } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="connexion.php">Inscription / Connexion</a>
                        </li>
                    <?php
                    } ?>
                </ul>
            </div>
        </div>
    </nav>

</body>

</html>