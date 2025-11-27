<?php
session_start(); // on démarre la session

// On vide toutes les données de session
$_SESSION = [];

// On supprime le cookie de session côté navigateur
setcookie(session_name(), '', time() - 3600);

// On Détruit la session côté serveur
session_destroy();

// Et on redirige vers la page d'accueil ou autre au choix
header("Location: index.php");
exit();
