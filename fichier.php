<?php
/* var_dump($_FILES); */
if (isset($_POST["send"])) {
    $file = $_FILES["fichier"];
    $fileName = $file["name"];
    $fileError = $file["error"];
    $fileType = $file["type"];
    $fileTmp = $file["tmp_name"];
    $fileSize = $file["size"];
    $fichierTelechargement = "upload";

    if(!file_exists($fichierTelechargement)){
        mkdir($fichierTelechargement);
    }

    $tableauExtension = ["pdf", "png", "jpg", "gif"];
    $ext = explode(".", $fileName);
    $fileExt = strtolower(end($ext));

    if (in_array($fileExt, $tableauExtension)) {
        if (empty($fileError)) {
            if ($fileSize < 5000000) {
                $uniqid = uniqid("fichier--") . "." . $fileExt;
                $newFileName = $fichierTelechargement . "/" . $uniqid;

                move_uploaded_file($fileTmp, $newFileName);
            } else {
                echo "la taille ne doit pas dipasser 500Ko";
            }
        } else {
            echo "fichier invalide";
        }
    } else {
        echo "extension invalide (pdf, png, jpg, gif)";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="fichier">
        <button type="submit" name="send">Send</button>

    </form>
</body>

</html>