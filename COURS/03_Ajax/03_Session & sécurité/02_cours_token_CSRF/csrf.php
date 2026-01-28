<?php
session_start();

// Génère un token CSRF unique et le stocke dans la session
function generateCsrfToken() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// Vérifie si le token CSRF envoyé est valide
function validateCsrfToken($token) {
    return $token === $_SESSION['csrf_token'];
}
?>
