<!-- REQUETE FETCH SIMPLE AFFICHAGE TEXTE -->

<?php
echo "Bonjour à tous !!";
?>


<!-- ENCODAGE STRING-->

<?php
// Récupérer les paramètres depuis l'URL
$name = $_GET['name'] ?? 'Inconnu';
$email = $_GET['email'] ?? 'Non fourni';

// Réponse au client
echo "Nom : $name, Email : $email";
?>