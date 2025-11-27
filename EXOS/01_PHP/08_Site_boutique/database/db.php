<?php
$host = 'localhost';
$dbname = '';
$username = 'root'; // Remplace par ton nom d'utilisateur MySQL
$password = ''; // Remplace par ton mot de passe MySQL

try {
    // Connexion à la base de données avec PDO
    $conn = new PDO("mysql:host=localhost;dbname=", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Si la connexion réussit
    echo "Connexion à la base de données réussie.";
} catch (PDOException $e) {
    // Gestion des erreurs
    echo "Erreur de connexion : " . $e->getMessage();
    exit();
}
