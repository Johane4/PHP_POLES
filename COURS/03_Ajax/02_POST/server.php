<?php
// Récupère les données JSON envoyées par Fetch
$data = json_decode(file_get_contents('php://input'), true);

// Vérifie si les données sont valides
if ($data && isset($data['name'], $data['email'])) {
    $name = htmlspecialchars($data['name']); // Sécurise les données pour un affichage HTML
    $email = htmlspecialchars($data['email']);

    // Réponse formatée
    echo "Données reçues : Nom - $name, Email - $email";
} else {
    // Si les données sont manquantes ou invalides
    echo "Données invalides ou manquantes.";
}
?>
