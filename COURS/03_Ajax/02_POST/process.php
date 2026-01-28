
<?php
// POST DE DONNÉES SIMPLES
// Récupérer directement les données POST
$name = $_POST['name'] ?? 'Anonyme';
$email = $_POST['email'] ?? 'Inconnu';

// Réponse texte simple
echo "Données reçues : Nom - " . htmlspecialchars($name) . ", Email - " . htmlspecialchars($email);
?>
