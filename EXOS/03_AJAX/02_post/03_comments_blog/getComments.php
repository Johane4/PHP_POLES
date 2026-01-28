<?php

require 'database/database.php';

try {
    $query = $pdo->query("SELECT pseudo, comment, created_at FROM comments ORDER BY created_at DESC");
    $comments = $query->fetchAll();

    echo json_encode($comments);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Erreur lors de la récupération des commentaires.']);
    exit;
}
?>
