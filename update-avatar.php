<?php
session_start();
require "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['avatar'])) {
    $avatar = $_FILES['avatar'];
    $uploadDir = 'avatar/';
    $allowedExtensions = ['png', 'jpg', 'jpeg', 'gif'];
    $error = null;

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (!empty($avatar['name'])) {
        $fileExtension = strtolower(pathinfo($avatar['name'], PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $allowedExtensions)) {
            $error = "Invalid file type. Allowed types: png, jpg, jpeg, gif.";
        } elseif ($avatar['size'] > 4000000) {
            $error = "File size exceeds 4MB.";
        } elseif ($avatar['error'] !== UPLOAD_ERR_OK) {
            $error = "Error uploading the file.";
        } else {
            $newFilename = uniqid("avatar--") . "." . $fileExtension;
            $filePath = $uploadDir . $newFilename;
            move_uploaded_file($avatar['tmp_name'], $filePath);

            // Update the database
            $stmt = $pdo->prepare("UPDATE employes SET avatar = :avatar WHERE id_employes = :id");
            $stmt->execute([
                'avatar' => $filePath,
                'id' => $_SESSION['id']
            ]);

            // Redirect back to profile page
            header("Location: profil.php");
            exit;
        }
    } else {
        $error = "No file uploaded.";
    }

    if ($error) {
        echo $error;
    }
}