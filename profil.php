<?php

include "header.php";
require "db.php";

// var_dump($_SESSION);
$stat = $pdo->prepare("SELECT * from employes where id_employes = :id");
$stat->execute([
    "id" => $_SESSION['id']
]);

$employe = $stat->fetch();

?>
<div class="card">
    <form id="update-avatar-form" action="update-avatar.php" method="post" enctype="multipart/form-data">
        <?php if (!empty($employe['avatar'])): ?>
            <img 
                id="profile-avatar" 
                src="<?= htmlspecialchars($employe['avatar']) ?>" 
                alt="Avatar" 
                style="width:200px; cursor: pointer;"
                ondblclick="triggerFileInput()"
            >
        <?php else: ?>
            <img 
                id="profile-avatar" 
                src="default-avatar.png" 
                alt="Default Avatar" 
                style="width:200px; cursor: pointer;"
                ondblclick="triggerFileInput()"
            >
        <?php endif; ?>
        <input 
            type="file" 
            name="avatar" 
            id="avatar-input" 
            style="display: none;" 
            onchange="submitAvatarForm()"
        >
    </form>
    <div class="container">
        <h4><b><?= htmlspecialchars($employe['nom']) ?></b></h4>
        <h4><b><?= htmlspecialchars($employe['prenom']) ?></b></h4>
        <p><?= htmlspecialchars($employe['service']) ?></p>
    </div>
</div>
<script>
function triggerFileInput() {
    document.getElementById('avatar-input').click();
}

function submitAvatarForm() {
    document.getElementById('update-avatar-form').submit();
}
</script>