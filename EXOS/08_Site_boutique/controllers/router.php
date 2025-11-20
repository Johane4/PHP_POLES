<?php
echo "router ok <br>";
ini_set('display_errors', 1);
error_reporting(E_ALL);

var_dump("SERVER URI " . $_SERVER['REQUEST_URI']);


// router.php : Gère les routes du projet

include __DIR__ . '/adminController.php';
include __DIR__ . '/productController.php';
include __DIR__ . '/cartController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
var_dump("le URI de base est " . $uri . " fin de URI -");

// Simplifier l'URI en supprimant le préfixe
// $baseUri = '/PHP_POLES/EXOS/08_Site_boutique';
$baseUri = '/08_Site_boutique';

if (strpos($uri, $baseUri) === 0) {
    $uri = substr($uri, strlen($baseUri));
}

echo 'URI : ' . $uri . '<br>'; // Affiche l'URI pour vérification

if ($uri === '') {
    $uri = '/';
}

// Routes disponibles
$routes = [
    '/'                => 'home',
    '/product'         => 'viewProduct',
    '/cart/add'        => 'addToCart',
    '/cart'            => 'showCart',
    '/checkout'        => 'checkout',
    '/admin'           => 'adminController.php',
    '/admin/dashboard' => 'dashboard',
    '/admin/register'  => 'handleRegister',  // Inscription admin
    '/admin/login'     => 'handleLogin',     // Connexion admin
    '/admin/orders'    => 'viewOrders',
];

// Gestion des routes
if (array_key_exists($uri, $routes)) { // Vérifie si l'URI demandée existe dans les routes définies
    $functionName = $routes[$uri]; // Récupère le nom de la fonction associée à l'URI
    if (function_exists($functionName)) { // Vérifie si la fonction existe
        $functionName(); // Appelle la fonction correspondante
    } else {
        // Si la fonction n'existe pas, affiche un message d'erreur
        echo 'Fonction non trouvée : ' . htmlspecialchars($functionName);
        exit;
    }
} else {
    // Si l'URI demandée n'existe pas dans les routes, affiche un message d'erreur
    echo 'Route inconnue : ' . htmlspecialchars($uri);
    include __DIR__ . '/../views/404.php'; // Page 404 pour les routes inexistantes
}
