<?php
require 'database/database.php';

if (isset($_POST['pseudo'], $_POST['comment'])) {
    $pseudo = htmlspecialchars(trim($_POST['pseudo']));
    $comment = htmlspecialchars(trim($_POST['comment']));

    if (empty($pseudo) || empty($comment)) {
        echo json_encode(['success' => false, 'message' => 'Tous les champs sont obligatoires.']);
        exit;
    }

    try {
        $result = $pdo->prepare("INSERT INTO comments (pseudo, comment) VALUES (:pseudo, :comment)");
        $result->execute(['pseudo' => $pseudo, 'comment' => $comment]);

        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'ajout du commentaire.']);
        exit;
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Données invalides.']);
}
?>
