<!-- REQUETE FETCH SIMPLE AFFICHAGE TEXTE -->

<?php
//echo "Bonjour à tous !!";
?>


<!-- ENCODAGE STRING-->

<?php
// Récupérer les paramètres depuis l'URL
$name = $_GET['name'] ?? 'Inconnu';
$email = $_GET['email'] ?? 'Non fourni';

// Réponse au client
//echo "Nom : $name, Email : $email";
?>


<!-- ENCODAGE JSON -->
<?php
// Récupérer le paramètre JSON encodé depuis l'URL
$encodedJson = $_GET['data'] ?? '{}';

// Décoder le JSON (sans urldecode ici)
$user = json_decode($encodedJson, true);
var_dump($user);
// Construire une réponse texte simple
$name = $user['name'] ?? 'Inconnu';
$email = $user['email'] ?? 'Non fourni';

echo "Nom : $name, Email : $email";
?>