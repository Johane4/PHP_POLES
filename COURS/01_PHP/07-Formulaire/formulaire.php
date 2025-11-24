<?php
session_start();

$message = '';

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
var_dump(__DIR__);
var_dump((dirname($_SERVER['REQUEST_URI'])));
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'enregistrement</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="header-img">
        <img src="./img/logo_poleS.png" alt="Logo PoleS">
    </div>
    <form method="POST" action="formulaireController.php">
        <h1>Ajouter un employé</h1>

        <!-- Erreur d'insertion à corriger de mon côté ! -->

        <!-- Message d'erreur ou succès -->
        <?php if (!empty($message)): ?>
            <div class="message <?php strpos($message, 'Erreur') ? 'success' : 'error' ?>"><?= $message ?></div>
        <?php endif; ?>

        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom">

        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom">

        <div class="radio-group">
            <label>Sexe</label><br>
            <input type="radio" name="sexe" value="m" checked> Homme
            <input type="radio" name="sexe" value="f"> Femme
        </div>

        <label for="service">Service</label>
        <input type="text" id="service" name="service">

        <label for="date_embauche">Date d'embauche</label>
        <input type="text" id="date_embauche" name="date_embauche" placeholder="jj-mm-aaaa">

        <label for="salaire">Salaire</label>
        <input type="text" id="salaire" name="salaire">

        <input type="submit" value="Enregistrer">
    </form>

    <!-- <form action="formulaireController.php" method="POST" enctype="multipart/form-data">
        <label for="photo">Ajouter ou changer de photo de profil</label>
        <input type="file" name="photo" id="photo"> -->

    <!-- Sélection de l'employé -->
    <!-- <label for="employe">Choisissez l'employé :</label>
        <select name="employe_id" id="employe_id" required>
            <option value="">-- Sélectionnez un employé --</option> -->
    <?php
    // Récupérer tous les employés depuis la base de données
    // $stmt = $pdo->query("SELECT id, prenom, nom FROM employes");
    // var_dump(($stmt));
    // if (!$stmt) {
    //     print_r($pdo->errorInfo());
    // }
    // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //     echo "<option value='{$row['id']}'>{$row['prenom']} {$row['nom']}</option>";
    // }
    // 
    ?>
    <!-- </select>

        <input type="submit" value="Changer de photo" name="submit_photo">
    </form> -->
</body>

</html>