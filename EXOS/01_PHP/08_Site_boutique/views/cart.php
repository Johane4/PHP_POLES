<?php
// utilisée car soucis d'erreur affichée comme quoi une session est déjà active malgré la déconnexion de l'admin
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include '../inc/header.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

echo "<h2>Votre panier</h2>";

if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product) {
        echo "<p>Produit : " . htmlspecialchars($product['name']) . "<br>Quantité : " . htmlspecialchars($product['quantity']) . "<br>Prix unitaire : " . htmlspecialchars($product['price']) . " €</p>";
    }
} else {
    echo "<h3>Votre panier est vide.</h3>";
}
?>

<a href="<?php echo $baseUri; ?>/checkout">Valider la commande</a>

<?php include '../inc/footer.php'; ?>