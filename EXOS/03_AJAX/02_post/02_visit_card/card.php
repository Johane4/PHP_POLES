<?php
// Vérifier si les données sont envoyées
if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['job']) && isset($_FILES['logo'])) {
    // Récupérer et sécuriser les données
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $job = htmlspecialchars(trim($_POST['job']));

    // Validation des champs
    if (empty($name) || empty($email) || empty($phone) || empty($job)) {
        echo "<p style='color: red;'>Erreur : Tous les champs sont obligatoires.</p>";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color: red;'>Erreur : L'adresse email n'est pas valide.</p>";
        exit;
    }

    if (!preg_match("/^[0-9\s\-]+$/", $phone)) {
        echo "<p style='color: red;'>Erreur : Le numéro de téléphone n'est pas valide.</p>";
        exit;
    }

    $file = $_FILES['logo'];
    if ($file['error'] !== UPLOAD_ERR_OK) {
        echo "<p style='color: red;'>Erreur : Impossible de télécharger le fichier.</p>";
        exit;
    }

    $upload = 'imgs/';
    $uploadedFile = $upload . basename($file['name']);
    move_uploaded_file($file['tmp_name'], $uploadedFile);

    // Réponse avec carte de visite formatée
    echo "<div style='border: 1px solid black; padding: 10px; max-width: 300px; background: rgb(210,39,114); background: linear-gradient(90deg, rgba(210,39,114,1) 0%, rgba(231,151,136,1) 40%, rgba(230,109,36,1) 71%)'>
            <h2>Carte de visite</h2>
            <img src='$uploadedFile' alt='Logo' style='width: 100px; height: auto; margin-bottom: 10px;'>
            <p><strong>Nom :</strong> $name</p>
            <p><strong>Email :</strong> $email</p>
            <p><strong>Téléphone :</strong> $phone</p>
            <p><strong>Poste :</strong> $job</p>
          </div>";
} else {
    // Si les données ne sont pas envoyées correctement
    echo "<p style='color: red;'>Erreur : Veuillez soumettre le formulaire correctement.</p>";
}
?>
