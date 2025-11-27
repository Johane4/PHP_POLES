<?php
session_start();

include_once __DIR__ . '/../database/db.php';
$baseUri = '/08_Site_boutique';



function handleRegister()
{
    global $conn, $baseUri;
    $errors = [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if (empty($username)) {
            $errors[] = "Le nom d'utilisateur est requis.";
        }
        // Vérifie si l'email inséré répond au bon format (@ présent, domaine ok ex: email.com..)
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Une adresse e-mail valide est requise.";
        }
        if (empty($password) || mb_strlen($password) < 6) {
            $errors[] = "Le mot de passe doit contenir au moins 6 caractères.";
        }

        if (empty($errors)) {
            // PHP utilisera l'algo le plus sûr et recommandé, aujourd'hui avec PHP 8 c'est bcrypt
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            try {
                $query = "INSERT INTO admins (username, email, password) VALUES (:username, :email, :password)";
                $result = $conn->prepare($query);
                $result->bindParam(':username', $username);
                $result->bindParam(':email', $email);
                $result->bindParam(':password', $hashedPassword);
                if ($result->execute()) {
                    header("Location: " . $baseUri . "/admin/login");
                    exit();
                }
            } catch (PDOException $e) {
                $errors[] = "Erreur lors de l'inscription : " . $e->getMessage();
            }
        }
    }
    include __DIR__ . '/../views/admin/register.php';
}

function handleLogin()
{
    global $conn, $baseUri;
    $errors = [];
    if (isset($_POST['login']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if (empty($email)) {
            $errors[] = "L'email est requis.";
        }
        if (empty($password)) {
            $errors[] = "Le mot de passe est requis.";
        }

        try {
            $query = "SELECT * FROM admins WHERE email = :email";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($admin && password_verify($password, $admin['password'])) {
                $_SESSION['admin'] = $admin['username'];
                header('Location: ' . $baseUri . '/admin/dashboard');
                exit();
            } else {
                $errors[] = "Email ou mot de passe incorrect.";
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la connexion : " . $e->getMessage();
        }
    }
    include __DIR__ . '/../views/admin/login.php';
}

function dashboard()
{
    global $conn, $baseUri;
    if (!isset($_SESSION['admin'])) {
        header("Location: " . $baseUri . "/admin/login");
        exit();
    }

    try {
        $query = "SELECT * FROM products";
        $stmt = $conn->query($query);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $errors[] = "Erreur lors de la récupération des produits: " . $e->getMessage();
    }

    include __DIR__ . '/../views/admin/dashboard.php';
}

function getOrders()
{
    global $conn;
    try {
        $stmt = $conn->prepare("SELECT orders.id AS order_id, orders.client_name, orders.client_email, orders.total_price, orders.quantity, products.name AS product_name 
            FROM orders
            JOIN products ON orders.product_id = products.id
            ORDER BY orders.id, products.name");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des commandes : " . $e->getMessage();
        return [];
    }
}

// Fonction pour afficher les commandes
function viewOrders()
{
    // global $baseUri;
    $orders = getOrders();
    include __DIR__ . '/../views/admin/orders.php'; // Nouvelle vue pour les commandes
}

function logout()
{
    global $baseUri;
    // Si un admin est connecté, on le déconnecte
    if (isset($_SESSION['admin'])) {

        // On supprime uniquement la variable admin
        unset($_SESSION['admin']);

        // On vide totalement le tableau de session
        $_SESSION = [];

        // Suppression du cookie de session
        setcookie(
            session_name(),
            '',
            time() - 3600,
        );

        header("Location: " . $baseUri);
        exit();
    }
}
