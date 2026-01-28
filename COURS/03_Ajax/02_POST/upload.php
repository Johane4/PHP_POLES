<?php
// Vérifie si un fichier et un nom ont été envoyés
if (isset($_POST['name']) && isset($_FILES['profilePhoto'])) {
    $name = htmlspecialchars($_POST['name']); // Récupère et sécurise le nom
    $file = $_FILES['profilePhoto']; // Récupère le fichier

    // Vérifie que le fichier a bien été uploadé
    if ($file['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "uploads/";
        $uploadFile = $uploadDir . basename($file['name']);

        // Déplace le fichier vers le dossier cible
        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            echo "Données reçues :<br>";
            echo "Nom : $name<br>";
            echo "Fichier uploadé : $uploadFile<br>";
        } else {
            echo "Erreur lors de l'upload du fichier.";
        }
    } else {
        echo "Erreur avec le fichier uploadé.";
    }
} else {
    echo "Données manquantes.";
}
?>
