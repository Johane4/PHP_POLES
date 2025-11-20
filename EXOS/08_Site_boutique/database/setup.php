<?php
$host = 'localhost';
$dbname = '';
$username = 'root'; // Remplace par ton nom d'utilisateur MySQL
$password = ''; // Remplace par ton mot de passe MySQL

try {
    // Connexion à MySQL sans sélectionner de base de données
    $conn = new PDO("mysql:host=$host", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Création de la base de données si elle n'existe pas
    $conn->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    echo "Base de données '$dbname' créée ou déjà existante.<br>";

    // Utilisation de la base de données
    $conn->exec("USE $dbname");

    // Création de la table des produits si elle n'existe pas
    // Table des produits
    $conn->exec("
        CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            description TEXT NOT NULL,
            price DECIMAL(10, 2) NOT NULL,
            image VARCHAR(255) NOT NULL
        )
    ");

    // Table des admins
    $conn->exec("
        CREATE TABLE IF NOT EXISTS admins (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL
        )
    ");

    // Table des clients
    $conn->exec("
        CREATE TABLE IF NOT EXISTS clients (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE
        )
    ");
    echo "Table 'clients' créée ou déjà existante.<br>";
} catch (PDOException $e) {
    echo "Erreur lors de la création de la base de données ou des tables : " . $e->getMessage();
    exit();
}
