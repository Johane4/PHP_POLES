<?php
// utilisée car soucis d'erreur affichée comme quoi une session est déjà active malgré la déconnexion de l'admin
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include '../inc/header.php';

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     // Vérification simple (à remplacer par une vraie vérification)
//     if ($username == 'admin' && $password == 'admin') {
//         $_SESSION['admin'] = true;
//         header("Location: dashboard.php");
//         exit();
//     } else {
//         echo "<p>Identifiants invalides.</p>";
//     }
// }
?>

<h2>Se connecter</h2>

<?php if (!empty($errors)): ?>
    <div class="error-messages">
        <?php foreach ($errors as $error): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form method="POST" action="<?php echo $baseUri; ?>/admin/login">
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" required>
    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" required>
    <input type="submit" name="login" value="Se connecter" />
</form>
<?php include '../inc/footer.php'; ?>