<?php
if (isset($_POST['name']) && isset( $_POST['email']) && isset($_POST['message'])) {
    // Récupérer et sécuriser les données
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Vérifier si tous les champs sont remplis
    if (empty($name) || empty($email) || empty($message)) {
        echo "Erreur : Tous les champs sont obligatoires.";
        exit;
    }

    // Valider le format de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Erreur : L'adresse email n'est pas valide.";
        exit;
    }

    // Réponse de confirmation
    echo "Merci, $name. Votre message a bien été reçu. Nous vous répondrons à $email.";
} else {
    // Si les champs requis ne sont pas définis
    echo "Erreur : Veuillez soumettre le formulaire correctement.";
}
