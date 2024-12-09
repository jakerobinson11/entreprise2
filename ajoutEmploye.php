<?php

include "header.php";
require "db.php";

$error = null;
@$nom = strip_tags($_POST["nom"]);
@$prenom = strip_tags($_POST["prenom"]);
@$email = strip_tags($_POST["email"]);
@$password = $_POST["password"];
@$service = strip_tags($_POST["service"]);
@$salaire = strip_tags($_POST["salaire"]);

$avatar = $_FILES["avatar"] ?? null; // Check if 'avatar' exists
$avatarName = $avatar["name"] ?? ""; // Default to an empty string if not set
$avatarSize = $avatar["size"] ?? 0;
$avatarTmp = $avatar["tmp_name"] ?? "";
$avatarError = $avatar["error"] ?? UPLOAD_ERR_NO_FILE;

$tableauExtension = ["png", "jpg", "gif", "jpeg"];

// Only process if $avatarName is not empty
if (!empty($avatarName)) {
    $nameParts = explode(".", $avatarName); // Break filename into parts
    $myExtension = strtolower(end($nameParts)); // Use end() on variable
} else {
    $myExtension = ""; // Default to an empty string
}

$upload = "avatar";

if (!file_exists($upload)) {
    mkdir($upload);
}

if (isset($_POST['envoyer'])) {
    // Validation logic
    if (empty($nom)) {
        $erreur .= "<p>Le Nom est obligatoire</p>";
    } elseif (strlen($nom) < 2 || strlen($nom) > 50) {
        $erreur .= "<p>Le Nom n'est pas conforme</p>";
    }

    if (empty($prenom)) {
        $erreur .= "<p>Veuillez entrer votre prenom</p>";
    } elseif (strlen($prenom) < 2 || strlen($prenom) > 50) {
        $erreur .= "<p>Veuillez entrer un prenom valide</p>";
    }

    if (empty($email)) {
        $erreur .= "<p>Veuillez entrer un email valide</p>";
    }

    if (empty($password)) {
        $erreur .= "<p>Veuillez entrer un mot de passe valide</p>";
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
    }

    if (empty($service)) {
        $erreur .= "<p>Veuillez entrer un service</p>";
    }

    if (empty($salaire)) {
        $erreur .= "<p>Veuillez entrer un salaire</p>";
    }

    // Avatar validation
    if (!empty($avatarName)) {
        if (!in_array($myExtension, $tableauExtension)) {
            $erreur .= "<li>extension n'est pas valide</li>";
        }
        if ($avatarError !== UPLOAD_ERR_OK) {
            $erreur .= "<li>la photo est invalide</li>";
        }
        if ($avatarSize > 4000000) {
            $erreur .= "<li>la taille de la photo ne doit pas depasser 4mb</li>";
        }
    }

    // If no errors, process the data
    if (empty($erreur)) {
        $uniqid = uniqid("avatar--") . "." . $myExtension;
        $fileList = $upload . "/" . $uniqid;
        move_uploaded_file($avatarTmp, $fileList);
    
        try {
            $statement = $pdo->prepare(
                "INSERT INTO employes (email, password, nom, prenom, service, salaire, avatar) 
                 VALUES (:email, :password, :nom, :prenom, :service, :salaire, :avatar)"
            );
            $statement->execute([
                'email' => $email,
                'password' => $hash,
                'nom' => $nom,
                'prenom' => $prenom,
                'service' => $service,
                'salaire' => $salaire,
                'avatar' => $fileList
            ]);
            header("location: employes.php");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ajout Employe</title>
</head>

<body>
    <form id="formulaire" action="" method="post" enctype="multipart/form-data">
        <div>
            <label class="form-label mt-4">Email</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" name="email">
        </div>
        <div>
            <label class="form-label mt-4">Mot de passe</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name="password">

        </div>

        <div>
            <label class="form-label mt-4">Nom</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name="nom">
        </div>

        <div>
            <label class="form-label mt-4">Prenom</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name="prenom">
        </div>

        <div>
            <label class="form-label mt-4">Service</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name="service">
        </div>
        <div>
            <label class="form-label mt-4">Salaire</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name="salaire">
        </div>
        <div>
            <label for="formFile" class="form-label mt-4">Photo de Profil</label>
            <input class="form-control" type="file" id="formFile" name="avatar">
        </div>
        <button type="submit" class="btn btn-primary" name="envoyer">Ajouter Employe</button>
    </form>

    <?php if (!empty($erreur)) { ?>
        <div class="alert alert-dismissible alert-warning">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <h4 class="alert-heading">Warning!</h4>
            <p class="mb-0"></p>
            <?php echo $erreur; ?>
        </div>
    <?php } ?>
</body>

</html>