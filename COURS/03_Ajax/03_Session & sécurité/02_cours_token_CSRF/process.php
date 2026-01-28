<?php

require 'csrf.php';
require_once 'database.php';


// Vérifie si la requête est POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données envoyées
    $title = trim($_POST['title']);
    $csrf_token = $_POST['csrf_token'];

    // Vérifie la validité du token CSRF
    if (empty($csrf_token) || !validateCsrfToken($csrf_token)) {
        echo json_encode([
            'success' => false, 
            'message' => 'Erreur : token CSRF invalide ou manquant.'
        ]);
        exit; 
    }

    // Vérifie que le titre est fourni
    if (empty($title)) {
        echo json_encode([
            'success' => false, 
            'message' => 'Erreur : le titre est requis.'
        ]);
        exit; 
    }

    // Insertion dans la BDD
    try {
        $stmt = $pdo->prepare("INSERT INTO articles (title) VALUES (:title)");
        $stmt->execute(['title' => $title]);

        echo json_encode(['success' => true, 'message' => 'Article ajouté avec succès !']);
    } catch (PDOException $e) {
        echo json_encode([
            'success' => false, 
            'message' => 'Erreur lors de l\'ajout à la base de données.'
        ]);
    }
    exit; // Arrête l'exécution après la réponse
}

// Récupération de tous les articles
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $result = $pdo->query("SELECT title FROM articles");
        $articles = $result->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($articles);
    } catch (PDOException $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Erreur lors de la récupération des articles.'
        ]);
    }
    exit; 
}

// Si la méthode HTTP n'est pas reconnue
echo json_encode(['success' => false, 'message' => 'Méthode non supportée.']);
exit;
